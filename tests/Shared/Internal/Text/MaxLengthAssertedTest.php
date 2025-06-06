<?php
/*
 * SPDX-FileCopyrightText: Copyright (c) 2025 Kanstantsin Mesnik
 * SPDX-License-Identifier: MIT
 */
declare(strict_types=1);

namespace Paira\Tests\Shared\Internal\Text;

use Paira\Exception;
use Paira\Shared\Internal\Text\MaxLengthAsserted;
use Paira\Shared\Internal\Text\TextOf;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

final class MaxLengthAssertedTest extends TestCase
{
    #[Test]
    public function allowsTextShorterThanMax(): void
    {
        $this->assertSame(
            'short',
            new MaxLengthAsserted(new TextOf('short'), 10)->value()
        );
    }

    #[Test]
    public function allowsTextEqualToMax(): void
    {
        $this->assertSame(
            'exactly10',
            new MaxLengthAsserted(new TextOf('exactly10'), 10)->value()
        );
    }

    #[Test]
    public function throwsIfTextExceedsMax(): void
    {
        $this->expectException(Exception::class);
        new MaxLengthAsserted(new TextOf('this is too long'), 5);
    }
}
