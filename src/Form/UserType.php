<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom',TextType::class,[
                'label'=>false,
                'attr'=>[
                    'class'=> 'input',
                    'placeholder'=> 'Écrivez le nom du membre'
                ]
            ])
            ->add('prenom',TextType::class,[
                'label'=>false,
                'attr'=>[
                    'class'=> 'input',
                    'placeholder'=> 'Écrivez le prénom du membre'
                ]
            ])
            ->add('email',EmailType::class,[
                'label'=>false,
                'attr'=>[
                    'class'=> 'input',
                    'placeholder'=> 'Écrivez l\'adresse mail'
                ]
            ])
            ->add('roles', ChoiceType::class, ['choices' =>
                [
                    'Administrateur' => 'ROLE_ADMIN',
                    'Adhérent' => 'ROLE_ADHERENT',
                    'Gestionnaire de la boutique' => 'ROLE_GESTIONNAIRE',
                    'Responsable d\'équipe' => 'ROLE_RESPONSABLE',
                    'Joueurs' => 'ROLE_JOUEUR',
                ],
                'mapped'=>false,
                'label'=> false,
                'required'  => true,
                'multiple' => false
            ])
            ->add('password',PasswordType::class,[
                'label'=>false,
                'attr'=>[
                    'class'=> 'input',
                    'placeholder'=> 'Écrivez le mot de passe'
                ]
            ])
            ->add('telephone',TelType::class,[
                'label'=>false,
                'attr'=>[
                    'class'=> 'input',
                    'placeholder'=> 'Écrivez le numléro de téléphone'
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
