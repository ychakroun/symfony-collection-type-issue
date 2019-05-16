<?php

namespace App\Form\Type;

use App\Entity\Footer;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints as Assert;

class FooterType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('links', CollectionType::class, [
                'entry_type' => LinkType::class,
                'allow_add' => true,
                'allow_delete' => true,
                'delete_empty' => true,
                'attr' => [
                    'class' => 'collection',
                ],
                'by_reference' => false,
                'constraints' => [
                    new Assert\Valid()
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Footer::class
        ]);
    }

    public function getBlockPrefix()
    {
        return 'footer';
    }
}
