<?php

namespace App\Form;

use App\Entity\Product;
use Doctrine\DBAL\Types\TextType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProductType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title',TextType::class, [
                'required' => true,
                'label' => 'Titre du produit',
                'attr' => [
                    'placeholder' => 'ex. Ce produit est pour vous'
                ]
            ])
            ->add('description', TextType::class, [
                'required' => true,
                'attr' => [
                    'placeholder' => 'Le meilleur produit'
            ]
            ])
            ->add('price',MoneyType::class, [
                'required' => true,
                'attr' => [
                    'placeholder' => 'ex.: 99,00',
                    'min' => 0
                ]
            ])
            ->add('gender',ChoiceType::class, [
                'label' => 'Gender',
                'choices' => [
                    'Unisexe' => null,
                    'Homme' => true,
                    'Femme' => false,
    ]
                    ])

            ->add('category',ChoiceType::class, [
                'required' => true,
                'choices' => [
                    'Autres' => null,

                ]

                ])
            ->add('img1', FileType::class, [
                'required' => true,
                'mapped' => false,
                'label' => 'Photo 1',
                'attr' => [
                    'placeholder' => 'ex.: produit1-1.png'
                ]
            ])
            ->add('img2', FileType::class, [
                'required' => false,
                'mapped' => false,
                'label' => 'Photo 2',
                'attr' => [
                    'placeholder' => 'ex.: produit1-2.png'
                ]
            ])
            ->add('save', SubmitType::class, [
                'label' => 'Valider'
            ])
        ;

    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Product::class,
        ]);
    }
}
