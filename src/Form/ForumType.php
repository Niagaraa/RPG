<?php

namespace App\Form;

use App\Entity\Forum;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ForumType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class, [
                'label' => 'Nom du forum',
//                'label_attr' => [
//                    'class' => 'w-25'
//                ]
            ])
            ->add('address', TextType::class, [
                'label' => 'Adresse du forum',
                'required' => false,
//                'label_attr' => [
//                    'class' => 'w-25'
//                ]
            ])
            ->add('button', TextType::class, [
                'label' => 'Bouton de partenariat',
                'required' => false,
//                'label_attr' => [
//                    'class' => 'w-25'
//                ]
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Forum::class,
        ]);
    }
}
