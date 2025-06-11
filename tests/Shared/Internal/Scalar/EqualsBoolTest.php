<?php

/*
 * SPDX-FileCopyrightText: Copyright (c) 2025 Kanstantsin Mesnik
 * SPDX-License-Identifier: MIT
 */
declare(strict_types=1);

namespace Paira\Tests\Shared\Internal\Scalar;

use Paira\Shared\Internal\Scalar\BoolOf;
use Paira\Shared\Internal\Scalar\EqualsBool;
use Paira\Shared\Internal\Text\TextOf;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

/**
 *
 *
 * @since 0.1
 */
class EqualsBoolTest extends TestCase
{
    #[Test]
    public function returnsTrueIfValuesAreEqual(): void
    {
        $bool = new EqualsBool(
            new BoolOf(true),
            new BoolOf(1)
        );

        $this->assertTrue($bool->value());
    }

    #[Test]
    public function returnsFalseIfValuesAreNotEqual(): void
    {
        $bool = new EqualsBool(
            new BoolOf(false),
            new BoolOf(true)
        );

        $this->assertFalse($bool->value());
    }

    #[Test]
    public function returnsTrueForEqualStrings(): void
    {
        $bool = new EqualsBool(
            new TextOf('yes'),
            new TextOf('yes')
        );

        $this->assertTrue($bool->value());
    }

    #[Test]
    public function returnsFalseForDifferentStrings(): void
    {
        $bool = new EqualsBool(
            new TextOf('yes'),
            new TextOf('no')
        );

        $this->assertFalse($bool->value());
    }
}
