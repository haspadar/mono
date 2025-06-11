<?php

/*
 * SPDX-FileCopyrightText: Copyright (c) 2025 Kanstantsin Mesnik
 * SPDX-License-Identifier: MIT
 */
declare(strict_types=1);

namespace Paira\Tests\Shared\Internal\Scalar;

use Paira\Shared\Internal\Scalar\FalseBool;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

class FalseBoolTest extends TestCase
{
    #[Test]
    public function alwaysReturnsFalse(): void
    {
        $this->assertFalse(new FalseBool()->value());
    }
}
