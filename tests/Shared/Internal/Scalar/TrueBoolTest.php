<?php

/*
 * SPDX-FileCopyrightText: Copyright (c) 2025 Kanstantsin Mesnik
 * SPDX-License-Identifier: MIT
 */
declare(strict_types=1);

namespace Paira\Tests\Shared\Internal\Scalar;

use Paira\Shared\Internal\Scalar\TrueBool;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

class TrueBoolTest extends TestCase
{
    #[Test]
    public function alwaysReturnsTrue(): void
    {
        $this->assertTrue(new TrueBool()->value());
    }
}
