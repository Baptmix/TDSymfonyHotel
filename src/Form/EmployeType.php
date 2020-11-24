<?php

namespace App\Form;

use App\Entity\Employe;
use App\Entity\User;
use App\Form\Field\RoleChoiceType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EmployeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom')
            ->add('prenom')
            ->add('email')
            ->add('password')
            ->add('roles', ChoiceType::class, [
                'choices'  => [
                    'Administrateur' => '["ROLE_ADMIN"]',
                    'Utilisateur' => '["ROLE_USER"]',
                ],
            ])
            ->add('role', RoleChoiceType::class)
            ->add('sauvegarder', SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
