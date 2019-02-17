<?php

namespace App\Form;

use App\Entity\Color;
use App\Entity\ExampleEntity;
use App\Entity\Shape;
use App\Entity\Size;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Count;
use Symfony\Component\Validator\Constraints\NotNull;

class ExampleEntityType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add(
                'colors',
                EntityType::class,
                ['class'       => Color::class,
                 'expanded'    => true,
                 'multiple'    => true,
                 'required'    => true,
                 'constraints' => new Count(['min' => 1])
                ]
            )
            ->add(
                'shapes',
                EntityType::class,
                ['class' => Shape::class, 'expanded' => true, 'multiple' => true, 'required' => false]
            )
            ->add(
                'size',
                EntityType::class,
                ['class'       => Size::class,
                 'expanded'    => true,
                 'multiple'    => false,
                 'required'    => true,
                 'constraints' => [new NotNull()]
                ]
            );
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(
            [
                'data_class' => ExampleEntity::class,
            ]
        );
    }
}
