<?php

/*
 * SPDX-FileCopyrightText: Copyright (c) 2025 Kanstantsin Mesnik
 * SPDX-License-Identifier: MIT
 */
declare(strict_types=1);

namespace Paira\Tests\Shared\Internal\Scalar;

use Paira\Shared\Internal\Scalar\FalseBool;
use Paira\Shared\Internal\Scalar\NotBool;
use Paira\Shared\Internal\Scalar\TrueBool;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

class NotBoolTest extends TestCase
{
    #[Test]
    public function notOfTrueIsFalse(): void
    {
        $this->assertFalse(new NotBool(new TrueBool())->value());
    }

    #[Test]
    public function notOfFalseIsTrue(): void
    {
        $this->assertTrue(new NotBool(new FalseBool())->value());
    }
}
