<?php
/**
 * Copyright © Bold Brand Commerce Sp. z o.o. All rights reserved.
 * See LICENSE.txt for license details.
 */

declare(strict_types = 1);

namespace Ergonode\Attribute\Infrastructure\Factory\Command\Update;

use Ergonode\Attribute\Application\Model\Attribute\UnitAttributeFormModel;
use Ergonode\Attribute\Infrastructure\Factory\Command\UpdateAttributeCommandFactoryInterface;
use Ergonode\Core\Domain\ValueObject\TranslatableString;
use Ergonode\EventSourcing\Infrastructure\DomainCommandInterface;
use Ergonode\SharedKernel\Domain\Aggregate\AttributeId;
use Symfony\Component\Form\FormInterface;
use Ergonode\Attribute\Domain\Entity\Attribute\ImageAttribute;
use Ergonode\Attribute\Domain\Command\Attribute\Update\UpdateImageAttributeCommand;
use Ergonode\Attribute\Application\Model\Attribute\AttributeFormModel;

/**
 */
class UpdateImageAttributeCommandFactory implements UpdateAttributeCommandFactoryInterface
{
    /**
     * @param string $type
     *
     * @return bool
     */
    public function support(string $type): bool
    {
        return $type === ImageAttribute::TYPE;
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
        /** @var AttributeFormModel $data */
        $data = $form->getData();

        return new UpdateImageAttributeCommand(
            $id,
            new TranslatableString($data->label),
            new TranslatableString($data->hint),
            new TranslatableString($data->placeholder),
            $data->multilingual,
            $data->groups,
        );
    }
}
