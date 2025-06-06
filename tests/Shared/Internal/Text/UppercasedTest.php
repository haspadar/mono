<?php
/*
 * SPDX-FileCopyrightText: Copyright (c) 2025 Kanstantsin Mesnik
 * SPDX-License-Identifier: MIT
 */
declare(strict_types=1);

namespace Paira\Tests\Shared\Internal\Text;

use Paira\Shared\Internal\Text\TextOf;
use Paira\Shared\Internal\Text\Uppercased;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

final class UppercasedTest extends TestCase
{
    #[Test]
    public function convertsLowercaseToUppercase(): void
    {
        $this->assertSame(
            'HELLO',
            new Uppercased(new TextOf('hello'))->value()
        );
    }

    #[Test]
    public function handlesMixedCase(): void
    {
        $this->assertSame(
            'HELLO WORLD',
            new Uppercased(new TextOf('HeLLo WoRLD'))->value()
        );
    }

    #[Test]
    public function supportsMultibyteCharacters(): void
    {
        $this->assertSame(
            'ПРИВЕТ',
            new Uppercased(new TextOf('привет'))->value()
        );
    }
}
