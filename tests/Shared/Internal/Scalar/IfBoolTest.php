<?php

/*
 * SPDX-FileCopyrightText: Copyright (c) 2025 Kanstantsin Mesnik
 * SPDX-License-Identifier: MIT
 */
declare(strict_types=1);

namespace Paira\Tests\Shared\Internal\Scalar;

use Paira\Shared\Internal\Scalar\BoolOf;
use Paira\Shared\Internal\Scalar\FalseBool;
use Paira\Shared\Internal\Scalar\IfBool;
use Paira\Shared\Internal\Scalar\TrueBool;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

class IfBoolTest extends TestCase
{
    #[Test]
    public function returnsTrueBranch(): void
    {
        $scalar = new IfBool(
            new TrueBool(),
            new BoolOf(true),
            new BoolOf(false)
        );

        $this->assertTrue($scalar->value());
    }

    #[Test]
    public function returnsFalseBranch(): void
    {
        $scalar = new IfBool(
            new FalseBool(),
            new BoolOf(true),
            new BoolOf(false)
        );

        $this->assertFalse($scalar->value());
    }
}
