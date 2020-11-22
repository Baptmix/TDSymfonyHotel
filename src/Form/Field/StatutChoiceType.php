<?php

namespace App\Form\Field;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class StatutChoiceType extends EntityType
{
    public function configureOptions(OptionsResolver $resolver): void
    {
        parent::configureOptions($resolver);
        $resolver->setDefaults([
            'class' => \App\Entity\Statut::class,
            'multiple' => false,
            'choice_label' => 'nom',
        ]);
    }
}