<?php

namespace App\Form;

use App\Entity\Categories;
use App\Entity\Equipes;
use App\Entity\Joueurs;
use Doctrine\ORM\EntityRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class JoueursTypeEdit extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom',TextType::class,[
                'label'=>false,
                'required'=> true,
                'attr'=>[
                    'class'=> 'input',
                    'placeholder'=> 'Écrivez le nom du joueur'
                ]
            ])
            ->add('prenom',TextType::class,[
                'label'=>false,
                'required'=> true,
                'attr'=>[
                    'class'=> 'input',
                    'placeholder'=> 'Écrivez le prénom du joueur'
                ]
            ])

            ->add('poste',ChoiceType::class,[
                'attr' => [
                    'class' => 'input',
                    'placeholder' => "Écrivez le titre de l’article"
                ],
                'label'=>false,
                'required'=>true,
                'choices'=>[
                    'Gardien'=> 'Gardien',
                    'Joueur'=>'Joueur'                ]
            ])
            ->add('equipe',EntityType::class,[
                'required'=>false,
                'class'=>Equipes::class,
                'label'=>false,
                'empty_data' => null,
                'placeholder' => "Choisissez une equipe associée",
            ])

            ->add('imagePortrait',FileType::class,[
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
            'data_class' => Joueurs::class,
        ]);
    }
}
