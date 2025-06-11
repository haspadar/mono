<?php

/*
 * SPDX-FileCopyrightText: Copyright (c) 2025 Kanstantsin Mesnik
 * SPDX-License-Identifier: MIT
 */
declare(strict_types=1);

namespace Paira\Tests\Shared\Internal\Scalar;

use Paira\Shared\Internal\Scalar\BoolOf;
use Paira\Shared\Internal\Scalar\SameBool;
use Paira\Shared\Internal\Text\TextOf;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

/**
 *
 *
 * @since 0.1
 */
class SameBoolTest extends TestCase
{
    #[Test]
    public function returnsTrueIfValuesAreStrictlyEqual(): void
    {
        $this->assertTrue(
            new SameBool(
                new BoolOf(true),
                new BoolOf(true)
            )->value()
        );
    }

    #[Test]
    public function returnsFalseForDifferentTypes(): void
    {
        $this->assertFalse(
            new SameBool(
                new TextOf('1'),
                new BoolOf(true)
            )->value()
        );
    }

    #[Test]
    public function returnsFalseIfValuesAreNotEqual(): void
    {
        $this->assertFalse(
            new SameBool(
                new BoolOf(false),
                new BoolOf(true)
            )->value()
        );
    }

    #[Test]
    public function returnsTrueForStrictlyEqualStrings(): void
    {
        $this->assertTrue(
            new SameBool(
                new TextOf('yes'),
                new TextOf('yes')
            )->value()
        );
    }

    #[Test]
    public function returnsFalseForDifferentStrings(): void
    {
        $this->assertFalse(
            new SameBool(
                new TextOf('yes'),
                new TextOf('no')
            )->value()
        );
    }

    #[Test]
    public function returnsFalseForSameStringDifferentScalarType(): void
    {
        $this->assertFalse(
            new SameBool(
                new TextOf('1'),
                new BoolOf(true)
            )->value()
        );
    }
}
