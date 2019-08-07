<?php

namespace App\Form;

use App\Entity\Henkilo;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class LampotilaType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('etunimi')
            ->add('sukunimi')
            ->add('email')
            ->add('save', SubmitType::class, ['label' => 'Lähetä tiedot'])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Henkilo::class,
        ]);
    }
}
