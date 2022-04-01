<?php

namespace App\Form;

use App\Entity\Equipes;
use App\Entity\EquipesCategories;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EquipesTypeEdit extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom',TextType::class,[
                'label'=>false,
                'required'=> true,
                'attr'=>[
                    'class'=> 'input',
                    'placeholder'=> 'Écrivez le nom de l\'équipe'
                ]
            ])
            ->add('categorie',EntityType::class,[
                'required'=>false,
                'class'=>EquipesCategories::class,
                'label'=>false,
                'empty_data' => null,
                'placeholder' => "Choisissez une catégorie associée",
            ])
            ->add('photoEquipe',FileType::class,[
                'attr' => [
                    'class' => 'inputfile',

                ],
                'label' => false,
                'multiple' => false,
                'mapped' => false,
                'required' => false
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Equipes::class,
        ]);
    }
}
