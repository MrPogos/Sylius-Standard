<?php

declare(strict_types=1);
namespace App\Form\Extension\Product;

use Sylius\Bundle\ProductBundle\Form\Type\ProductType;
use Symfony\Component\Form\AbstractTypeExtension;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;

class ProductTypeExtension extends AbstractTypeExtension
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->addEventListener(FormEvents::PRE_SET_DATA, function (FormEvent $event) {
            $productVariant = $event->getData();
            $event->getForm()
                ->add('color', ChoiceType::class, [
                    'choices' => [
                        'red' => 'red',
                        'blue' => 'blue',
                        'green' => 'green'
                    ],
                ]);
        });
    }

    public function getExtendedType(): string
    {
        return ProductType::class;
    }

    public static function getExtendedTypes(): iterable
    {
        return [ProductType::class];
    }
}
