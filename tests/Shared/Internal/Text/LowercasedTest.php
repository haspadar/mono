<?php

/*
 * SPDX-FileCopyrightText: Copyright (c) 2025 Kanstantsin Mesnik
 * SPDX-License-Identifier: MIT
 */
declare(strict_types=1);

namespace Paira\Tests\Shared\Internal\Text;

use Paira\Shared\Internal\Text\Lowercased;
use Paira\Shared\Internal\Text\TextOf;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

final class LowercasedTest extends TestCase
{
    #[Test]
    public function convertsUppercaseToLowercase(): void
    {
        $this->assertSame(
            'hello',
            new Lowercased(new TextOf('HELLO'))->value()
        );
    }

    #[Test]
    public function handlesMixedCase(): void
    {
        $this->assertSame(
            'hello world',
            new Lowercased(new TextOf('HeLLo WoRLD'))->value()
        );
    }

    #[Test]
    public function supportsMultibyteCharacters(): void
    {
        $this->assertSame(
            'привет',
            new Lowercased(new TextOf('ПРИВЕТ'))->value()
        );
    }
}
