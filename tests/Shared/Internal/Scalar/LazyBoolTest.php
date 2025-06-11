<?php
/*
 * SPDX-FileCopyrightText: Copyright (c) 2025 Kanstantsin Mesnik
 * SPDX-License-Identifier: MIT
 */
declare(strict_types=1);

namespace Paira\Tests\Shared\Internal\Scalar;

use Paira\Shared\Internal\Scalar\LazyBool;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

final class LazyBoolTest extends TestCase
{
    #[Test]
    public function returnsTrueFromCallback(): void
    {
        $this->assertTrue(
            new LazyBool(fn() => true)->value()
        );
    }

    #[Test]
    public function returnsFalseFromCallback(): void
    {
        $this->assertFalse(
            new LazyBool(fn() => false)->value()
        );
    }
}