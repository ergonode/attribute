<?php

/**
 * Copyright © Bold Brand Commerce Sp. z o.o. All rights reserved.
 * See license.txt for license details.
 */

declare(strict_types = 1);

namespace Ergonode\Attribute\Application\Form;

use Ergonode\Attribute\Application\Form\Event\AttributeFormSubscriber;
use Ergonode\Attribute\Application\Form\Model\UpdateAttributeFormModel;
use Ergonode\Attribute\Application\Form\Type\AttributeGroupType;
use Ergonode\Attribute\Application\Form\Type\AttributeOptionType;
use Ergonode\Attribute\Application\Form\Type\AttributeTypeType;
use Ergonode\Core\Application\Form\Type\TranslationType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 */
class AttributeUpdateForm extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array                $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add(
                'type',
                AttributeTypeType::class
            )
            ->add(
                'groups',
                AttributeGroupType::class
            )
            ->add(
                'label',
                TranslationType::class
            )
            ->add(
                'hint',
                TranslationType::class
            )
            ->add(
                'placeholder',
                TranslationType::class
            )
            ->add(
                'parameters',
                AttributeParametersForm::class
            )
            ->add(
                'options',
                CollectionType::class,
                [
                    'allow_add' => true,
                    'allow_delete' => true,
                    'entry_type' => AttributeOptionType::class,
                ]
            )
            ->addEventSubscriber(new AttributeFormSubscriber());
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => UpdateAttributeFormModel::class,
            'translation_domain' => 'attribute',
        ]);
    }

    /**
     * @return null|string
     */
    public function getBlockPrefix(): ?string
    {
        return null;
    }
}
