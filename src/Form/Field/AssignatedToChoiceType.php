<?php

namespace App\Form\Field;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AssignatedToChoiceType extends EntityType
{
    public function configureOptions(OptionsResolver $resolver): void
    {
        parent::configureOptions($resolver);
        $resolver->setDefaults([
            'class' => \App\Entity\Employe::class,
            'multiple' => false,
            'choice_label' => 'nom',
        ]);
    }
}