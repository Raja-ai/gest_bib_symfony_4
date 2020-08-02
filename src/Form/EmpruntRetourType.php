<?php

namespace App\Form;

use App\Entity\EmpruntRetour;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use App\Entity\Livre;
use App\Entity\Etudiant;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
class EmpruntRetourType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('dateEmprunt',DateType::class,['widget' => 'single_text'])
            ->add('dateRetour',DateType::class,['widget' => 'single_text'])
            ->add('etatRetour')
            ->add('livre',EntityType::class,[
                'class' => Livre::class,
                //'multiple' => true,
                'choice_label' => function (Livre $a) {
                    return $a->getIdLivre() . ' | ' . $a->getTitre();
                }
            ])
            ->add('etudiant',EntityType::class,[
                'class' => Etudiant::class,
                //'multiple' => true,
                'choice_label' => function (Etudiant $a) {
                    return $a->getcin() . ' | ' . $a->getnomPrenom();
                }
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => EmpruntRetour::class,
        ]);
    }
}
