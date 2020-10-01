<?php

/**
 * Copyright © Bold Brand Commerce Sp. z o.o. All rights reserved.
 * See LICENSE.txt for license details.
 */

namespace Ergonode\Attribute\Domain\Query;

use Ergonode\Attribute\Domain\ValueObject\AttributeCode;
use Ergonode\Attribute\Domain\ValueObject\AttributeType;
use Ergonode\Attribute\Domain\ValueObject\OptionInterface;
use Ergonode\Attribute\Domain\ValueObject\OptionKey;
use Ergonode\Attribute\Domain\View\AttributeViewModel;
use Ergonode\Core\Domain\ValueObject\Language;
use Ergonode\SharedKernel\Domain\Aggregate\AttributeGroupId;
use Ergonode\SharedKernel\Domain\Aggregate\AttributeId;
use Ergonode\SharedKernel\Domain\Aggregate\UnitId;
use Ergonode\SharedKernel\Domain\Aggregate\MultimediaId;

/**
 */
interface AttributeQueryInterface
{
    /**
     * @param AttributeCode $code
     *
     * @return bool
     */
    public function checkAttributeExistsByCode(AttributeCode $code): bool;

    /**
     * @param AttributeCode $code
     *
     * @return null|AttributeViewModel
     */
    public function findAttributeByCode(AttributeCode $code): ?AttributeViewModel;

    /**
     * @param AttributeCode $code
     *
     * @return null|AttributeId
     */
    public function findAttributeIdByCode(AttributeCode $code): ?AttributeId;

    /**
     * @param AttributeId $id
     *
     * @return AttributeType|null
     */
    public function findAttributeType(AttributeId $id): ?AttributeType;

    /**
     * @param AttributeId $attributeId
     *
     * @return array|null
     */
    public function getAttribute(AttributeId $attributeId): ?array;

    /**
     * @return string[]
     */
    public function getAllAttributeCodes(): array;

    /**
     * @param array $types
     *
     * @return string[]
     */
    public function getDictionary(array $types = []): array;

    /**
     * @param array $types
     *
     * @return array
     */
    public function getAttributeCodes(array $types = []): array;

    /**
     * @param AttributeId $id
     * @param OptionKey   $key
     *
     * @return OptionInterface
     */
    public function findAttributeOption(AttributeId $id, OptionKey $key): ?OptionInterface;

    /**
     * @param UnitId $id
     *
     * @return array
     */
    public function findAttributeIdsByUnitId(UnitId $id): array;

    /**
     * @param AttributeGroupId $id
     *
     * @return array
     */
    public function findAttributeIdsByAttributeGroupId(AttributeGroupId $id): array;

    /**
     * @param MultimediaId $id
     *
     * @return array
     */
    public function getMultimediaRelation(MultimediaId $id): array;

    /**
     * @param Language    $language
     * @param string|null $search
     * @param int|null    $limit
     * @param string|null $field
     * @param string|null $order
     *
     * @return array
     */
    public function autocomplete(
        Language $language,
        string $search = null,
        int $limit = null,
        string $field = null,
        ?string $order = 'ASC'
    ): array;
}
