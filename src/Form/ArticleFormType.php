<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class ArticleFormType extends AbstractType
{
	// Rakentaa lomakkeen
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('task', TextType::class, [
                'attr' => [
                    'placeholder' => 'Kirjoita tehtävä tähän',
                    'class' => 'custom_class'
                ]
            ])
            ->add('dueDate', DateType::class)
            ->add('save', SubmitType::class, [
                'label' => 'Create Task',
                // bootstrap: 'attr => [class => 'btn btn-success']
            ])
        ;
    }

     public function new(EntityManagerInterface $em)
    {
        $form = $this->createForm(ArticleFormType::class);
        return $this->render('harjoitus/harj8.html.twig', [
            'articleForm' => $form->createView()
        ]);
    }
}
