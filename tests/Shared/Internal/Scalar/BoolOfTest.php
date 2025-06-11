<?php

/*
 * SPDX-FileCopyrightText: Copyright (c) 2025 Kanstantsin Mesnik
 * SPDX-License-Identifier: MIT
 */
declare(strict_types=1);

namespace Paira\Tests\Shared\Internal\Scalar;

use Paira\Shared\Internal\Scalar\BoolOf;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

final class BoolOfTest extends TestCase
{
    #[Test]
    public function returnsTrueForTrue(): void
    {
        $this->assertTrue(new BoolOf(true)->value());
    }

    #[Test]
    public function returnsFalseForFalse(): void
    {
        $this->assertFalse(new BoolOf(false)->value());
    }

    #[Test]
    public function returnsTrueForOne(): void
    {
        $this->assertTrue(new BoolOf(1)->value());
    }

    #[Test]
    public function returnsFalseForZero(): void
    {
        $this->assertFalse(new BoolOf(0)->value());
    }

    #[Test]
    public function returnsTrueForNonZeroInt(): void
    {
        $this->assertTrue(new BoolOf(42)->value());
    }
}
