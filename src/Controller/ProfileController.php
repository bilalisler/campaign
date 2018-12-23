<?php
/**
 * Created by PhpStorm.
 * User: bilalisler
 * Date: 12/23/18
 * Time: 4:49 PM
 */

namespace App\Controller;


use App\Entity\Messages;
use App\Entity\User;
use App\Form\UserFormType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/profile")
 *
 * Class ProfileController
 * @package App\Controller
 */
class ProfileController extends AbstractController
{
    /**
     * @Route("/account", name="customer_profile")
     */
    public function profileShow(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $user = $this->getUser();

        if(empty($user) || !($user instanceof User)){
            throw new NotFoundHttpException("Kullanıcı Bulunamadı...");
        }

        $userForm = $this->createForm(UserFormType::class,$user,['method' => 'POST']);
        $userForm->handleRequest($request);

        if($userForm->isSubmitted() && $userForm->isValid()){
            /**
             * @var $formData User
             */
            $formData = $userForm->getData();

            $em->persist($formData);
            $em->flush();
        }

        return $this->render('user/profile.html.twig', [
            'user' => $user,
            'userForm' => $userForm->createView()
        ]);
    }

    /**
     * @Route("/messages", name="customer_messages")
     */
    public function messagesShow(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $user = $this->getUser();

        if(empty($user) || !($user instanceof User)){
            throw new NotFoundHttpException("Kullanıcı Bulunamadı...");
        }

        $qb = $em->getRepository("App:Messages")->createQueryBuilder("m");
        $messages = $qb
            ->where($qb->expr()->eq("m.user",":user"))
            ->setParameter("user",$user->getId())
            ->andWhere($qb->expr()->isNull("m.parent"))
            ->getQuery()
            ->getResult()
        ;

        return $this->render('user/messages.html.twig', [
            'messages' => $messages
        ]);
    }

    /**
     * @Route("/message-detail", name="customer_message_detail")
     */
    public function messageDetail(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $user = $this->getUser();

        if(empty($user) || !($user instanceof User)){
            throw new NotFoundHttpException("Kullanıcı Bulunamadı...");
        }

        $messageId = $request->query->get("m",null);

        $qb = $em->getRepository("App:Messages")->createQueryBuilder("m");
        $messageDetails = $qb
            ->where($qb->expr()->eq("m.user",":user"))
            ->setParameter("user",$user)
            ->andWhere($qb->expr()->eq("m.parent",":message_id"))
            ->setParameter("message_id",$messageId)
            ->orderBy("m.createdAt","ASC")
            ->getQuery()
            ->getResult()
        ;

        return $this->render('user/message_detail.html.twig', [
            'messageDetails' => $messageDetails,
            'parentMessageId' => $messageId,
            'user' => $user
        ]);
    }

    /**
     * @Route("/fetch-messages", name="fetch_customer_messages", options={"expose":true})
     */
    public function fetchMessages(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $messageId = $request->query->get("m",null);

        $qb = $em->getRepository("App:Messages")->createQueryBuilder("m");
        $messageDetails = $qb
            ->andWhere($qb->expr()->eq("m.parent",":message_id"))
            ->setParameter("message_id",$messageId)
            ->orderBy("m.createdAt","ASC")
            ->getQuery()
            ->getResult()
        ;

        $view = $this->renderView("user/include/message-history.html.twig",[
            'messageDetails' => $messageDetails
        ]);

        return new JsonResponse([
            'status' => 'success',
            'view' => $view
        ]);
    }

    /**
     * @Route("/send-message", name="customer_send_message",options={"expose":true})
     */
    public function sendMessage(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $user = $this->getUser();

        if(empty($user) || !($user instanceof User)){
            throw new NotFoundHttpException("Kullanıcı Bulunamadı...");
        }

        $parentId = $request->request->getInt("parent_id");
        $message = $request->request->get("message");

        try{
            $parentMessage = $em->getRepository("App:Messages")->find($parentId);

            $messageObj = new Messages();
            $messageObj->setIsRead(0);
            $messageObj->setMessage($message);
            $messageObj->setParent($parentMessage);
            $messageObj->setShop($parentMessage->getShop());
            $messageObj->setUser($user);
            $messageObj->setSenderUserId($user);
            $messageObj->setCreatedAt(new \DateTime("now"));

            $em->persist($messageObj);
            $em->flush();

            return new JsonResponse([
                'status' => 'success',
                'message' => 'Mesajınız iletildi.'
            ]);
        }catch (\Exception $e){
            return new JsonResponse([
                'status' => 'error',
                'message' => 'Mesajınız İletilemedi :(',
                'error_detail' => $e->getMessage()
            ]);
        }
    }
}