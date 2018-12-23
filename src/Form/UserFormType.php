<?php

namespace App\Form;

use App\Entity\ProductsImages;
use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\CallbackTransformer;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Vich\UploaderBundle\Form\Type\VichFileType;

class UserFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->setMethod($options['method'])
            ->add('firstName', TextType::class, ['label' => 'Ad','attr' => ['class' => 'form-control']])
            ->add('lastName', TextType::class, ['label' => 'Soyad','attr' => ['class' => 'form-control']])
            ->add('phone', TextType::class, ['label' => 'Telefon','attr' => ['class' => 'form-control','id' => 'Phone']])
            ->add('address', TextType::class, ['label' => 'Adres','attr' => ['class' => 'form-control']])
            ->add('longitude', TextType::class, ['label' => 'Enlem','attr' => ['class' => 'form-control']])
            ->add('latitude', TextType::class, ['label' => 'Boylam','attr' => ['class' => 'form-control']])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
            'method' => 'POST'
        ]);
    }
}
