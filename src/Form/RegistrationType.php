<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TextType;


class RegistrationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('email', TextType::class, 
                [
                    'label' => FALSE
                ]
            )
            ->add('username',TextType::class, 
                [
                    'label' => FALSE
                ]
            )
            ->add('password',PasswordType::class, 
            [
                'label' => FALSE
            ])
            ->add('confirm_password',PasswordType::class, 
            [
                'label' => FALSE
            ])

        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
