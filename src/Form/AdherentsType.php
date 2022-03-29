<?php

namespace App\Form;

use App\Entity\Adherents;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AdherentsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom', TextType::class, [
                'label' => false,
                'required'=>true,
                'attr' => [
                    'class' => 'normal-size form_input',
                    'placeholder' => 'Écrivez votre nom'
                ]
            ])
            ->add('prenom', TextType::class, [
                'label' => false,
                'required'=>true,
                'attr' => [
                    'class' => 'normal-size form_input',
                    'placeholder' => 'Écrivez votre prénom'
                ]
            ])
            ->add('genre', ChoiceType::class, [
                'attr' => [
                    'class' => 'medium-size form_select',
                    'placeholder' => 'selectionnez votre genre',
                ],
                'label' => false,
                'required' => true,
                'choices' => [
                    'Masculin' => 'Masculin',
                    'Féminin' => 'Féminin']
            ])
            ->add('lieuDeNaissance', TextType::class, [
                'label' => false,
                'required'=>true,
                'attr' => [
                    'class' => 'normal-size form_input',
                    'placeholder' => 'Écrivez votre lieu de naissance'
                ]
            ])
            ->add('departementDeNaissance', NumberType::class, [
                'label' => false,
                'required'=>true,
                'attr' => [
                    'class' => 'small-size form_input',
                    'placeholder' => 'Département'
                ]
            ])
            ->add('adresse', TextType::class, [
                'label' => false,
                'required'=>true,
                'attr' => [
                    'class' => 'normal-size form_input',
                    'placeholder' => 'Écrivez le numéro et le nom de la voie '
                ]
            ])
            ->add('ville', TextType::class, [
                'label' => false,
                'required'=>true,
                'attr' => [
                    'class' => 'normal-size form_input',
                    'placeholder' => 'Écrivez la ville'
                ]
            ])
            ->add('codePostal', TextType::class, [
                'label' => false,
                'required'=>true,
                'attr' => [
                    'class' => 'small-size form_input',
                    'placeholder' => 'Écrivez le code postal'
                ]
            ])
            ->add('nationalite', TextType::class, [
                'label' => false,
                'required'=>true,
                'attr' => [
                    'class' => 'small-size form_input',
                    'placeholder' => 'Votre nationalité'
                ]
            ])
            ->add('dateDeNaissance', DateType::class, [
                'widget' => 'single_text',
                'required' => true,
                'required'=>true,
                'attr' => [
                    'class' => 'medium-size form_input'
                ]
            ])
            ->add('discipline', ChoiceType::class, [
                'attr' => [
                    'class' => 'form_select',
                ],
                'placeholder' => "Choisissez une discipline",
                'label' => true,
                'required' => true,
                'choices' => [
                    'patin a roulette' => 'patin a roulette',
                    'hockey' => 'hockey']
            ])
            ->add('email', EmailType::class, [
                'label' => false,
                'required'=>true,
                'attr' => [
                    'class' => 'normal-size form_input',
                    'placeholder' => 'nom@exemple.com'
                ]
            ])
            ->add('telephone', TelType::class, [
                'label' => false,
                'required'=>true,
                'attr' => [
                    'class' => 'small-size form_input',
                    'placeholder' => '06 54 87 25 59'
                ]
            ])
            ->add('nomDupere', TextType::class, [
                'label' => false,
                'required'=>true,
                'attr' => [
                    'class' => 'normal-size form_input',
                    'placeholder' => 'Écrivez le nom'
                ]
            ])
            ->add('prenomDuPere', TextType::class, [
                'label' => false,
                'required'=>true,
                'attr' => [
                    'class' => 'normal-size form_input',
                    'placeholder' => 'Écrivez le prénom'
                ]
            ])
            ->add('telephoneDuPere', TelType::class, [
                'label' => false,
                'required'=>true,
                'attr' => [
                    'class' => 'small-size form_input',
                    'placeholder' => '06 54 87 25 59'
                ]
            ])
            ->add('adresseDuPere', TextType::class, [
                'label' => false,
                'required'=>true,
                'attr' => [
                    'class' => 'normal-size form_input',
                    'placeholder' => 'Écrivez le numéro et le nom de la voie '
                ]
            ])
            ->add('villeDuPere', TextType::class, [
                'label' => false,
                'required'=>true,
                'attr' => [
                    'class' => 'normal-size form_input',
                    'placeholder' => 'Écrivez la ville'
                ]
            ])
            ->add('codePostalDuPere', TextType::class, [
                'label' => false,
                'required'=>true,
                'attr' => [
                    'class' => 'normal-size form_input',
                    'placeholder' => 'Écrivez le code postal'
                ]
            ])
            ->add('professionDuPere', TextType::class, [
                'label' => false,
                'required'=>true,
                'attr' => [
                    'class' => 'normal-size form_input',
                    'placeholder' => 'Écrivez la profession'
                ]
            ])
            ->add('nomDeLaMere', TextType::class, [
                'label' => false,
                'required'=>true,
                'attr' => [
                    'class' => 'normal-size form_input',
                    'placeholder' => 'Écrivez le nom'
                ]
            ])
            ->add('prenomDeLaMere', TextType::class, [
                'label' => false,
                'required'=>true,
                'attr' => [
                    'class' => 'normal-size form_input',
                    'placeholder' => 'Écrivez le prénom'
                ]
            ])
            ->add('telephoneDeLaMere', TelType::class, [
                'label' => false,
                'required'=>true,
                'attr' => [
                    'class' => 'small-size form_input',
                    'placeholder' => '06 54 87 25 59'
                ]
            ])
            ->add('adresseDeLaMere', TextType::class, [
                'label' => false,
                'required'=>true,
                'attr' => [
                    'class' => 'normal-size form_input',
                    'placeholder' => 'Écrivez le numéro et le nom de la voie '
                ]
            ])
            ->add('villeDeLaMere', TextType::class, [
                'label' => false,
                'required'=>true,
                'attr' => [
                    'class' => 'normal-size form_input',
                    'placeholder' => 'Écrivez la ville'
                ]
            ])
            ->add('codePostalDeLaMere', TextType::class, [
                'label' => false,
                'required'=>true,
                'attr' => [
                    'class' => 'normal-size form_input',
                    'placeholder' => 'Écrivez le code postal'
                ]
            ])
            ->add('professionDeLaMere', TextType::class, [
                'label' => false,
                'required'=>true,
                'attr' => [
                    'class' => 'normal-size form_input',
                    'placeholder' => 'Écrivez la profession'
                ]
            ])
            ->add('modaliteDePratique', ChoiceType::class, [
                'choices' => [
                    'j\'accepte' => 1,
                    'je n\'accepte pas' => 0,
                ],
                'choice_attr' =>
                    ['class' => 'input'],
                'label' => false,
                'required'=>true,
                'expanded' => true,
                'attr' => ['class' => 'input',
                ]
            ])
            ->add('autorisationPriseDeVue', ChoiceType::class, [
                'choices' => [
                    'j\'accepte' => 1,
                    'je n\'accepte pas' => 0,
                ],
                'choice_attr' =>
                    ['class' => 'input'],
                'label' => false,
                'required'=>true,
                'expanded' => true,
                'attr' => ['class' => 'input',
                ]
            ])
            ->add('autorisationActiviteSagc', ChoiceType::class, [
                'choices' => [
                    'j\'accepte' => 1,
                    'je n\'accepte pas' => 0,
                ],
                'choice_attr' =>
                    ['class' => 'input'],
                'label' => false,
                'required'=>true,
                'expanded' => true,
                'attr' => ['class' => 'input',
                ]
            ])
            ->add('connaissanceInfoNoticeAssuranceDommageCorpo', ChoiceType::class, [
                'choices' => [
                    'j\'accepte' => 1,
                    'je n\'accepte pas' => 0,
                ],
                'choice_attr' =>
                    ['class' => 'input'],
                'label' => false,
                'required'=>true,
                'expanded' => true,
                'attr' => ['class' => 'input',
                ]
            ])
            ->add('autorisationDeQuitterLesLieuxEnFinActivite', ChoiceType::class, [
                'choices' => [
                    'j\'accepte' => 1,
                    'je n\'accepte pas' => 0,
                ],
                'choice_attr' =>
                    ['class' => 'input'],
                'label' => false,
                'required'=>true,
                'expanded' => true,
                'attr' => ['class' => 'input',
                ]
            ])
            ->add('autorisationPratiqueANiveauSup', ChoiceType::class, [
                'choices' => [
                    'j\'accepte' => 1,
                    'je n\'accepte pas' => 0,
                ],
                'choice_attr' =>
                    ['class' => 'input'],
                'label' => false,
                'required'=>true,
                'expanded' => true,
                'attr' => ['class' => 'input',
                ]
            ])
            ->add('autorisationPriseEnChargeMedicaleAccident', ChoiceType::class, [
                'choices' => [
                    'j\'accepte' => 1,
                    'je n\'accepte pas' => 0,
                ],
                'choice_attr' =>
                    ['class' => 'input'],
                'label' => false,
                'required'=>true,
                'expanded' => true,
                'attr' => ['class' => 'input',
                ]
            ])
            ->add('engagementDeplacementCompetition', ChoiceType::class, [
                'choices' => [
                    'j\'accepte' => 1,
                    'je n\'accepte pas' => 0,
                ],
                'choice_attr' =>
                    ['class' => 'input'],
                'label' => false,
                'required'=>true,
                'expanded' => true,
                'attr' => ['class' => 'input',
                ]
            ])
            ->add('connaissanceReglementInterieur', ChoiceType::class, [
                'choices' => [
                    'j\'accepte' => 1,
                    'je n\'accepte pas' => 0,
                ],
                'choice_attr' =>
                    ['class' => 'input'],
                'label' => false,
                'required'=>true,
                'expanded' => true,
                'attr' => ['class' => 'input',
                ]
            ])
            ->add('certificationSurHonneurExcactitdueRenseignement', ChoiceType::class, [
                'choices' => [
                    'j\'accepte' => 1,
                    'je n\'accepte pas' => 0,
                ],
                'choice_attr' =>
                    ['class' => 'input'],
                'label' => false,
                'required'=>true,
                'expanded' => true,
                'attr' => ['class' => 'input',
                ]
            ])
            ->add('photoIdentite', FileType::class, [
                'attr' => [
                    'class' => 'super-size form_input'
                ],
                'mapped' => false,
                'required' => false,
                'multiple' => false,
            ])
            ->add('certificatMedical', FileType::class, [
                'attr' => [
                    'class' => 'super-size form_input'
                ],
                'mapped' => false,
                'required' => false,
                'multiple' => false,
            ])
            ->add('questionnaireSanteSport', FileType::class, [
                'attr' => [
                    'class' => 'super-size form_input'
                ],
                'mapped' => false,
                'required' => false,
                'multiple' => false,
            ])
            ->add('attestationSanteSport', FileType::class, [
                'attr' => [
                    'class' => 'super-size form_input'
                ],
                'mapped' => false,
                'required' => false,
                'multiple' => false,
            ])
            ->add('locationDePatin', ChoiceType::class, [
                'choices' => [
                    'oui' => 1,
                    'non' => 0,
                ],
                'choice_attr' =>
                    ['class' => 'input'],
                'label' => false,
                'required'=>true,
                'expanded' => true,
                'attr' => ['class' => 'input',
                ]
            ])
            ->add('pointureDesPatins', ChoiceType::class, [
                'attr' => [
                    'class' => 'medium-size form_select',
                ],
                'placeholder' => "Choisissez une pointure",
                'label' => false,
                'required' => false,
                'choices' => [
                    '20' => '20', '21' => '21', '22' => '22', '23' => '23', '24' => '24', '25' => '25', '26' => '26', '27' => '27', '28' => '28', '29' => '29',
                    '30' => '20', '31' => '31', '32' => '32', '33' => '33', '34' => '34', '35' => '35', '36' => '36', '37' => '37', '38' => '38', '39' => '39',
                    '40' => '40', '41' => '41', '42' => '42', '43' => '43', '44' => '44', '45' => '45', '46' => '46', '47' => '47', '48' => '48', '49' => '49',
                    '50' => '50',
                ]
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Adherents::class,
        ]);
    }
}
