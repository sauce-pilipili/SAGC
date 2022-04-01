<?php

namespace App\Form;

use App\Entity\Infos;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\File;

class InfosType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name',TextType::class,[
                'label'=>false,
                'required'=> true,
                'attr'=>[
                    'class'=> 'input',
                    'placeholder'=> 'Écrivez le nom du document'
                ]
            ])
            ->add('document',FileType::class,[
                'attr' => [
                    'class' => 'input',
                ],
                'constraints' => [
                    new File([
                        'maxSize' => '4000k',
                        'mimeTypes' => [
                            'application/pdf',
                            'application/x-pdf',
                        ],
                        'mimeTypesMessage' => 's\'il vous plait nserez un document valide',
                    ])
                ],
                'label' => false,
                'multiple' => false,
                'mapped' => false,
                'required' => true
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Infos::class,
        ]);
    }
}
