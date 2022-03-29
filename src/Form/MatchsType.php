<?php

namespace App\Form;

use App\Entity\Adversaires;
use App\Entity\Categories;
use App\Entity\Equipes;
use App\Entity\Matchs;
use Doctrine\ORM\EntityRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MatchsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('DateMatch', DateTimeType::class,[
                'widget'=> 'single_text',
                'required'=>true,
                'attr'=>[
                    'class'=>'input'
                ]
            ])
            ->add('lieuDuMatch',ChoiceType::class,[
                'attr' => [
                    'class' => 'input',
                    'placeholder' => "Écrivez le titre de l’article"
                ],
                'label'=>false,
                'required'=>true,
                'choices'=>[
                    'Domicile'=> 'Domicile',
                    'Extérieur'=>'Extérieur'                ]
            ])

            ->add('resultatSagc',NumberType::class,[
                'required'=>false,
                'attr' => [
                    'class' => 'input',
                    'placeholder' => "Écrivez le score du SAGC"
                ],
            ])
            ->add('resultatAdversaire',NumberType::class,[
                'required'=>false,
                'attr' => [
                    'class' => 'input',
                    'placeholder' => "Écrivez le score adverse"
                ],
            ])
            ->add('equipe',EntityType::class,[
                'required'=>true,
                'class'=>Equipes::class,
                'label'=>false,
                'empty_data' => null,
                'placeholder' => "Equipe du SAGC",
            ])
            ->add('adversaire',EntityType::class,[
                'required'=>true,
                'class'=>Adversaires::class,
                'label'=>false,
                'empty_data' => null,
                'placeholder' => "Equipe adverse",
            ])


        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Matchs::class,
        ]);
    }
}
