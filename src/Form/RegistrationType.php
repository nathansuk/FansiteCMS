<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RegistrationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('username', TextType::class, [
                'label' => 'Pseudo',
                'attr' => [
                    'placeholder' => 'Pseudo'
                ],
                'row_attr' => [
                    'class' => 'form--block'
                ]
            ])
            ->add('email', EmailType::class, [
                'label' => 'Adresse mail',
                'attr' => [
                    'placeholder' => 'Renseigne une adresse mail valide !'
                ],
                'row_attr' => [
                    'class' => 'form--block'
                ]
            ])
            ->add('password', PasswordType::class, [
                'label' => 'Mot de passe',
                'attr' => [
                    'placeholder' => 'Utilise un mot de passe sécurisé !'
                ],
                'row_attr' => [
                    'class' => 'form--block'
                ]
            ])
            ->add('confirm_password', PasswordType::class, [
                'label' => 'Confirmation du mot de passe',
                'attr' => [
                    'placeholder' => 'Confirme le mot de passe'
                ],
                'row_attr' => [
                    'class' => 'form--block'
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
