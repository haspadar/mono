<?php

/*
 * SPDX-FileCopyrightText: Copyright (c) 2025 Kanstantsin Mesnik
 * SPDX-License-Identifier: MIT
 */
declare(strict_types=1);

namespace Paira\Tests\Shared\Internal\Scalar;

use Paira\Shared\Internal\Scalar\FalseBool;
use Paira\Shared\Internal\Scalar\OrBool;
use Paira\Shared\Internal\Scalar\TrueBool;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

class OrBoolTest extends TestCase
{
    #[Test]
    public function trueOrTrueIsTrue(): void
    {
        $this->assertTrue(
            new OrBool(new TrueBool(), new TrueBool())->value()
        );
    }

    #[Test]
    public function trueOrFalseIsTrue(): void
    {
        $this->assertTrue(
            new OrBool(new TrueBool(), new FalseBool())->value()
        );
    }

    #[Test]
    public function falseOrTrueIsTrue(): void
    {
        $this->assertTrue(
            new OrBool(new FalseBool(), new TrueBool())->value()
        );
    }

    #[Test]
    public function falseOrFalseIsFalse(): void
    {
        $this->assertFalse(
            new OrBool(new FalseBool(), new FalseBool())->value()
        );
    }
}
