<?php

namespace App\Form;

use App\Entity\Livre;
use App\Entity\Theme;
use App\Entity\Auteur;
use App\Entity\MaisonEdt;
use App\Entity\MotCle;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;


class LivreType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('titre')
            ->add('nbrePages')
            ->add('prix')
            ->add('dateAchat',DateType::class,[
                'widget' => 'single_text'
            ])
            ->add('disponible')
            ->add('couverture',FileType::class,array('data_class'=>null))
            ->add('lienTelechargement')
            ->add('nbreTelechargement')
            ->add('etatLivre', ChoiceType::class, [
                'choices' => [
                    'B (bonne état)' => true,
                    'M (mausaive état)' => false
                ]
            ])
            ->add('auteur',EntityType::class, [
                // looks for choices from this entity
                'class' => Auteur::class,
                // uses the User.username property as the visible option string
                'choice_label' => 'nomPrenom',
               'label' => 'Auteur'
                // used to render a select box, check boxes or radios
                // 'multiple' => true,
                // 'expanded' => true,
            ])
            ->add('maisonEdt',EntityType::class,[
                'class' => MaisonEdt::class,
                //'multiple' => true,
                'choice_label' => function (MaisonEdt $a) {
                    return $a->getIdMaisonEdt() . ' | ' . $a->getDesignMaisonEdt();
                }
            ])
            ->add('theme',EntityType::class, [
                // looks for choices from this entity
                'class' => Theme::class,
            
                // uses the User.username property as the visible option string
                'choice_label' => function (Theme $a) {
                    return  $a->getDesignTheme();
                }
            ])
            ->add('motCle',EntityType::class, [
                'class' => MotCle::class, 
                 'multiple' => true,
                'choice_label' => function (MotCle $a) {
                    return $a->getIdMotCle() . ' | ' . $a->getDesignMotCle();
                }
            ]
                )
                // uses the User.username property as the visible option string
                  
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Livre::class,
        ]);
    }
}
