<?php

namespace App\Form;

use App\Entity\ProductComments;
use App\Entity\ProductsImages;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\CallbackTransformer;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Vich\UploaderBundle\Form\Type\VichFileType;

class CommentType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->setAction($options["action"])
            ->add('user',TextType::class, [
                "label" => "Email",
                "attr" => array(
                    "class" => "form-control"
                )
            ])
            ->add('ipAddress', HiddenType::class, [])
            ->add('comment', TextareaType::class, [
                "label" => "Yorumunuz",
                "attr" => array(
                    "class" => "form-control"
                )
            ])
            ->add('submit',SubmitType::class,[
                "label" => "Gönder",
                "attr" => array(
                    "style" => "margin-top:10px",
                    "class" => "btn btn-success"
                )
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => ProductComments::class,
            'action' => null
        ]);
    }
}
