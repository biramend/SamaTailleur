<?php

namespace App\Form;

use App\Entity\MesureHomme;
use App\Entity\Client;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;


class MesureHommeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('epaule')
            ->add('mass_courte')
            ->add('mass_long')
            ->add('mass_troiscart')
            ->add('tourede_mass')
            ->add('poigner')
            ->add('coup')
            ->add('poitrine')
            ->add('longboubou')
            ->add('demi_saison')
            ->add('trois_cart')
            ->add('ceinture')
            ->add('longueur_pantalon')
            ->add('cuisse')
            ->add('anche')
            ->add('client',EntityType::class,[
                'class'=> Client::class,
                'expanded'=>true,
                'multiple'=>true,
                'required'=>false
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => MesureHomme::class,
        ]);
    }
}
