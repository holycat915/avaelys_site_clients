<?php

namespace App\Form\Type;

use App\Entity\Video;
use App\Entity\Visibility;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;


class VideoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('Title', TextType::class, [
                'label' => 'Titre (obligatoire)',
            ] )
            ->add('description', TextareaType::class, [
                'attr' => [
                    'class' => 'form-control'
                ],
                'label' => 'Description',
                'required' => false
            ])
            ->add('thumbnail', FileType::class, [
                'label' => 'Miniature',
                'required' => false
            ])
            ->add('videoFile', FileType::class, [
                'label' => 'Vidéo',
            ])
            ->add('visibility', EntityType::class, [
                'class' => Visibility::class,
                'choice_label' => 'label',
                'expanded' => true,
                'multiple' => false,
                'label' => 'Visibilité'
            ] )
            ->add('save', SubmitType::class, [
                'attr' => [
                    'class' => 'btn btn-primary'
                ],
                'label' => 'Enregistrer'
            ])

        ;
    }


    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Video::class,
        ]);
    }




}