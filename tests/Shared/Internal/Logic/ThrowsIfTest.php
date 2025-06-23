<?php

/*
 * SPDX-FileCopyrightText: Copyright (c) 2025 Kanstantsin Mesnik
 * SPDX-License-Identifier: MIT
 */
declare(strict_types=1);

namespace Paira\Tests\Shared\Internal\Logic;

use Paira\Exception;
use Paira\Shared\Internal\Logic\No;
use Paira\Shared\Internal\Logic\ThrowsIf;
use Paira\Shared\Internal\Logic\Yes;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

final class ThrowsIfTest extends TestCase
{
    #[Test]
    public function throwsWhenConditionIsTrue(): void
    {
        $this->expectException(Exception::class);
        new ThrowsIf(new Yes(), '')->whenTrue();
    }

    #[Test]
    public function throwsWhenConditionIsFalse(): void
    {
        $this->expectException(Exception::class);
        new ThrowsIf(new No(), '')->whenFalse();
    }

    #[Test]
    public function doesNotThrowWhenCheckingTrueButConditionIsFalse(): void
    {
        new ThrowsIf(new No(), '')->whenTrue();
        $this->assertTrue(true, 'Expected no exception to be thrown');
    }

    #[Test]
    public function doesNotThrowWhenCheckingFalseButConditionIsTrue(): void
    {
        new ThrowsIf(new Yes(), '')->whenFalse();
        $this->assertTrue(true, 'Expected no exception to be thrown');
    }
}
