<?php

namespace App\Form;

use App\Entity\DomainName;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class DomainNameFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, [
                'label'=>'nom',
                'required' => true
            ])
            ->add('host', TextType::class, [
                'label' => 'hôte',
                'required' => true

            ])
            ->add('creationDate', DateType::class, [
                'label' => 'date de création',
                'html5' => true,
                'widget' => 'single_text',
                'required' => true

            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => DomainName::class,
        ]);
    }
}
