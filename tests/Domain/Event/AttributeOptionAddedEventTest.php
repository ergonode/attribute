<?php

/**
 * Copyright © Bold Brand Commerce Sp. z o.o. All rights reserved.
 * See license.txt for license details.
 */

declare(strict_types = 1);

namespace Ergonode\Attribute\Tests\Domain\Event;

use Ergonode\Attribute\Domain\Event\AttributeOptionAddedEvent;
use Ergonode\Attribute\Domain\ValueObject\OptionInterface;
use Ergonode\Attribute\Domain\ValueObject\OptionKey;
use PHPUnit\Framework\TestCase;

/**
 */
class AttributeOptionAddedEventTest extends TestCase
{
    /**
     */
    public function testEventCreation(): void
    {
        /** @var OptionKey $key */
        $key = $this->createMock(OptionKey::class);
        /** @var OptionInterface $option */
        $option = $this->createMock(OptionInterface::class);
        $event = new AttributeOptionAddedEvent($key, $option);
        $this->assertEquals($key, $event->getKey());
        $this->assertEquals($option, $event->getOption());
    }
}
