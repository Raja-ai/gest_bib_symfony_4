<?php

namespace App\Form;

use App\Entity\MaisonEdt;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MaisonEdtType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('designMaisonEdt')
            ->add('adresse')
            ->add('email')
            ->add('siteWeb')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => MaisonEdt::class,
        ]);
    }
}
