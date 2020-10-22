<?php
/**
 * Copyright © Bold Brand Commerce Sp. z o.o. All rights reserved.
 * See LICENSE.txt for license details.
 */

declare(strict_types = 1);

namespace Ergonode\Attribute\Infrastructure\Factory\Command\Update;

use Ergonode\Attribute\Application\Model\Attribute\TextareaAttributeFormModel;
use Ergonode\Attribute\Domain\Command\Attribute\Update\UpdateTextareaAttributeCommand;
use Ergonode\Attribute\Domain\Entity\Attribute\TextareaAttribute;
use Ergonode\Attribute\Domain\ValueObject\AttributeScope;
use Ergonode\Attribute\Infrastructure\Factory\Command\UpdateAttributeCommandFactoryInterface;
use Ergonode\Core\Domain\ValueObject\TranslatableString;
use Ergonode\EventSourcing\Infrastructure\DomainCommandInterface;
use Ergonode\SharedKernel\Domain\Aggregate\AttributeId;
use Symfony\Component\Form\FormInterface;
use Ergonode\SharedKernel\Domain\Aggregate\AttributeGroupId;

class UpdateTextareaAttributeCommandFactory implements UpdateAttributeCommandFactoryInterface
{
    /**
     * @param string $type
     *
     * @return bool
     */
    public function support(string $type): bool
    {
        return $type === TextareaAttribute::TYPE;
    }

    /**
     * @param AttributeId   $id
     * @param FormInterface $form
     *
     * @return DomainCommandInterface
     *
     */
    public function create(AttributeId $id, FormInterface $form): DomainCommandInterface
    {
        /** @var TextareaAttributeFormModel $data */
        $data = $form->getData();

        $groups = [];
        foreach ($data->groups as $group) {
            $groups[] = new AttributeGroupId($group);
        }

        return new UpdateTextareaAttributeCommand(
            $id,
            new TranslatableString($data->label),
            new TranslatableString($data->hint),
            new TranslatableString($data->placeholder),
            new AttributeScope($data->scope),
            $data->parameters->richEdit,
            $groups,
        );
    }
}
