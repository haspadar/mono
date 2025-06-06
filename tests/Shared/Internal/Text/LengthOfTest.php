<?php
/*
 * SPDX-FileCopyrightText: Copyright (c) 2025 Kanstantsin Mesnik
 * SPDX-License-Identifier: MIT
 */
declare(strict_types=1);

namespace Paira\Tests\Shared\Internal\Text;

use Paira\Shared\Internal\Text\LengthOf;
use Paira\Shared\Internal\Text\TextOf;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

final class LengthOfTest extends TestCase
{
    #[Test]
    public function asciiString(): void
    {
        $this->assertSame(5, new LengthOf(new TextOf('hello'))->value());
    }

    #[Test]
    public function multibyteString(): void
    {
        $this->assertSame(
            6,
            new LengthOf(new TextOf('привет'))->value()
        );
    }

    #[Test]
    public function emptyString(): void
    {
        $this->assertSame(
            0,
            new LengthOf(new TextOf(''))->value()
        );
    }

    #[Test]
    public function confirmsLessThanOrEqual(): void
    {
        $length = new LengthOf(new TextOf('abc'));
        $this->assertTrue($length->isLessThanOrEqual(3));
    }

    #[Test]
    public function confirmsGreaterThan(): void
    {
        $length = new LengthOf(new TextOf('1234'));
        $this->assertTrue($length->isGreaterThan(3));
    }
}
