<?php

/*
 * SPDX-FileCopyrightText: Copyright (c) 2025 Kanstantsin Mesnik
 * SPDX-License-Identifier: MIT
 */
declare(strict_types=1);

namespace Paira\Tests\Shared\Internal\Scalar;

use Paira\Shared\Internal\Scalar\AndBool;
use Paira\Shared\Internal\Scalar\FalseBool;
use Paira\Shared\Internal\Scalar\TrueBool;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

class AndBoolTest extends TestCase
{
    #[Test]
    public function trueAndTrueIsTrue(): void
    {
        $this->assertTrue(
            new AndBool(new TrueBool(), new TrueBool())->value()
        );
    }

    #[Test]
    public function falseAndTrueIsFalse(): void
    {
        $this->assertFalse(
            new AndBool(new FalseBool(), new TrueBool())->value()
        );
    }

    #[Test]
    public function trueAndFalseIsFalse(): void
    {
        $this->assertFalse(
            new AndBool(new TrueBool(), new FalseBool())->value()
        );
    }

    #[Test]
    public function falseAndFalseIsFalse(): void
    {
        $this->assertFalse(
            new AndBool(new FalseBool(), new FalseBool())->value()
        );
    }
}
