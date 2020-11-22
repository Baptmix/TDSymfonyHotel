<?php

namespace App\Form;

use App\Entity\Chambre;
use App\Entity\Statut;
use App\Form\Field\AssignatedToChoiceType;
use App\Form\Field\StatutChoiceType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ChambreType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('numero')
            ->add('etage')
            ->add('statut', StatutChoiceType::class)
            ->add('assignedTo', AssignatedToChoiceType::class)
            ->add('sauvegarder', SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Chambre::class,
        ]);
    }
}
