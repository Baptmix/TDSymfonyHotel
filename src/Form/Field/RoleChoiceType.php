<?php

namespace App\Form\Field;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RoleChoiceType extends EntityType
{
    public function configureOptions(OptionsResolver $resolver): void
    {
        parent::configureOptions($resolver);
        $resolver->setDefaults([
            'class' => \App\Entity\Role::class,
            'multiple' => false,
            'choice_label' => 'nom',
        ]);
    }
}