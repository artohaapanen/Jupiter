<?php

namespace App\Form;

use App\Entity\Kuntopiste;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class KuntopisteetType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nimi')
            ->add('hiihtokilometrit')
            ->add('juoksukilometrit')
            ->add('kavelykilometrit')
            ->add('kuntopisteet')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Kuntopiste::class,
        ]);
    }
}
