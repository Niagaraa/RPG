<?php

namespace App\Form;

use App\Entity\Character;
use App\Entity\Rp;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RpType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('character', EntityType::class, [
                'class' => Character::class,
                'choice_label' => 'name',
                'label' => 'Personnage'
            ])
            ->add('title', TextType::class, [
                'label' => 'Titre du RP'
            ])
            ->add('partner', TextType::class, [
                'label' => 'Nom du partenaire'
            ])
            ->add('lastAnswer', DateType::class, [
                'label' => 'Dernière réponse'
            ])
            ->add('mustAnswering', ChoiceType::class, [
                'label' => 'Qui doit répondre ?',
                'choices' => [
                    'Moi' => 'Moi',
                    'Mon partenaire' => 'Mon partenaire'
                ]
            ])
            ->add('isEvent', ChoiceType::class, [
                'label' => 'Event ou RP normal ?',
                'choices' => [
                    'Normal' => 'Normal',
                    'Event' => 'Event'
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Rp::class,
        ]);
    }
}
