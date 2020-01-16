<?php
/**
 * Copyright © Bold Brand Commerce Sp. z o.o. All rights reserved.
 * See LICENSE.txt for license details.
 */

declare(strict_types = 1);

namespace Ergonode\Attribute\Domain\Factory\Group;

use Ergonode\Attribute\Domain\Entity\AttributeGroup;
use Ergonode\Attribute\Domain\Entity\AttributeGroupId;
use Ergonode\Attribute\Domain\ValueObject\AttributeGroupCode;
use Ergonode\Core\Domain\ValueObject\TranslatableString;

/**
 */
class AttributeGroupFactory
{
    /**
     * @param AttributeGroupId   $id
     * @param AttributeGroupCode $code
     * @param TranslatableString $name
     *
     * @return AttributeGroup
     *
     * @throws \Exception
     */
    public function create(AttributeGroupId $id, AttributeGroupCode $code, TranslatableString $name): AttributeGroup
    {
        return new AttributeGroup(
            $id,
            $code,
            $name
        );
    }
}
