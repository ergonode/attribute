<?php

/**
 * Copyright © Bold Brand Commerce Sp. z o.o. All rights reserved.
 * See LICENSE.txt for license details.
 */

declare(strict_types = 1);

namespace Ergonode\Attribute\Infrastructure\JMS\Serializer\Handler;

use Ergonode\Attribute\Domain\ValueObject\AttributeGroupCode;
use JMS\Serializer\Context;
use JMS\Serializer\GraphNavigatorInterface;
use JMS\Serializer\Handler\SubscribingHandlerInterface;
use JMS\Serializer\Visitor\DeserializationVisitorInterface;
use JMS\Serializer\Visitor\SerializationVisitorInterface;

class AttributeGroupCodeHandler implements SubscribingHandlerInterface
{
    /**
     * @return array
     */
    public static function getSubscribingMethods(): array
    {
        $methods = [];
        $formats = ['json', 'xml', 'yml'];

        foreach ($formats as $format) {
            $methods[] = [
                'direction' => GraphNavigatorInterface::DIRECTION_SERIALIZATION,
                'type' => AttributeGroupCode::class,
                'format' => $format,
                'method' => 'serialize',
            ];

            $methods[] = [
                'direction' => GraphNavigatorInterface::DIRECTION_DESERIALIZATION,
                'type' => AttributeGroupCode::class,
                'format' => $format,
                'method' => 'deserialize',
            ];
        }

        return $methods;
    }

    /**
     * @param SerializationVisitorInterface $visitor
     * @param AttributeGroupCode            $attributeCode
     * @param array                         $type
     * @param Context                       $context
     *
     * @return string
     */
    public function serialize(
        SerializationVisitorInterface $visitor,
        AttributeGroupCode $attributeCode,
        array $type,
        Context $context
    ): string {
        return $attributeCode->getValue();
    }

    /**
     * @param DeserializationVisitorInterface $visitor
     * @param mixed                           $data
     * @param array                           $type
     * @param Context                         $context
     *
     * @return AttributeGroupCode
     */
    public function deserialize(
        DeserializationVisitorInterface $visitor,
        $data,
        array $type,
        Context $context
    ): AttributeGroupCode {
        return new AttributeGroupCode($data);
    }
}
