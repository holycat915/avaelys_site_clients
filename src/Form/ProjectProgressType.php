<?php

namespace App\Form;

use App\Entity\DomainName;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProjectProgressType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('domainName', EntityType::class, [
                'attr' => [
                    'class' => 'form-select',
                ],
                'label' => 'Nom du projet',
                'class' => DomainName::class,
                'choice_label' => 'name',
            ])
            ->add('projectStep', IntegerType::class, [
                'attr' => [
                    'class' => 'form-select',
                    'label' => 'Étape du projet',

                ]
        ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}
