<?php
/*
 * SPDX-FileCopyrightText: Copyright (c) 2025 Kanstantsin Mesnik
 * SPDX-License-Identifier: MIT
 */
declare(strict_types=1);

namespace Paira\Tests\Shared\Internal\Text;

use Paira\Shared\Internal\Text\TextOf;
use Paira\Shared\Internal\Text\TruncatedRight;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

final class TruncatedRightTest extends TestCase
{
    #[Test]
    public function truncatesLong(): void
    {
        $this->assertSame(
            'abc',
            new TruncatedRight(new TextOf('abcdef'), 3)->value()
        );
    }

    #[Test]
    public function notTruncatedShort(): void
    {
        $this->assertSame(
            'abc',
            new TruncatedRight(new TextOf('abc'), 5)->value()
        );
    }

    #[Test]
    public function returnsEmpty(): void
    {
        $this->assertSame(
            '',
            new TruncatedRight(new TextOf(''), 5)->value()
        );
    }

    #[Test]
    public function emptyIfZeroLength(): void
    {
        $this->assertSame(
            '',
            new TruncatedRight(new TextOf('abc'), 0)->value()
        );
    }
}
