<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom', TextType::class, [
                'label' => 'Nom',
                'attr' => [
                    'placeholder' => 'Saisir votre nom'
                ]
            ])
            ->add('prenom', TextType::class, [
                'label' => 'Prénom',
                'attr' => [
                    'placeholder' => 'Saisir votre Prénom'
                ]
            ])
            ->add('email', EmailType::class, [
                'label' => 'E-mail',
                'attr' => [
                    'placeholder' => 'example@example.com'
                ]

            ])
            ->add('objet', ChoiceType::class, [
                'label' => 'Objet',
                'choices' => [
                    '' => null,
                    'Demande de renseignement' => 'Renseignement',
                    'Prendre rendez-vous' => 'Rendez-vous',
                    'Demande de SAV' => 'SAV'

                        ]

                ])
            // ->add('Me recontacter', ChoiceType::class, [
            //     'choices' => [
            //         'Oui' => 'true',
            //         'Non' => 'false'
            //     ]
            // ])
            ->add('message', TextareaType::class, [
                'label' => 'Votre message'
            ])
            ->add('envoyer', SubmitType::class, [
                'label' => 'Envoyer'
            ])
            ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}
