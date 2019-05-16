<?php
/**
 * Created by PhpStorm.
 * User: yesser
 * Date: 27/04/19
 * Time: 01:51 م.
 */

namespace App\Form\Type;

use App\Entity\Link;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\UrlType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class LinkType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', TextType::class, [
                'label' => 'Title:'
            ])
            ->add('external', ChoiceType::class, [
                'label' => false,
                'expanded' => true,
                'choices' => [
                    'Internal Link' => false,
                    'External Link' => true,
                ],
                'choice_attr' => [
                    'class' => 'link-type',
                ],
                'label_attr' => [
                    'class' => 'btn-group btn-group-toggle',
                    'data-toggle' => 'buttons',
                ]
            ])
            ->add('url', UrlType::class, [
                'label' => 'External URL',
                'attr' => ['placeholder' => 'https://']
            ])
            ->add('redirection', ChoiceType::class, [
                'label' => 'Internal target',
                'required' => false,
                'choices' => [
                    'Home' => 'Home',
                    'Blog' => 'Blog',
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Link::class,
            'validation_groups' => function (FormInterface $form) {
                /** @var Link $link */
                $link = $form->getData();
                $groups = ['Default'];
                if ($link->getExternal()) {
                    $groups[] = 'isExternal';
                } else {
                    $groups[] = 'isInternal';
                }

                return $groups;
            },
        ]);
    }

    public function getBlockPrefix()
    {
        return 'link';
    }
}
