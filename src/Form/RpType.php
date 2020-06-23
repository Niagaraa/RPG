<?php

namespace App\Form;

use App\Entity\Rp;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RpType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title')
            ->add('partner')
            ->add('lastAnswer')
            ->add('mustAnswering')
            ->add('isEvent')
            ->add('character')
            ->add('forum')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Rp::class,
        ]);
    }
}
