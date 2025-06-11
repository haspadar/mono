<?php

/*
 * SPDX-FileCopyrightText: Copyright (c) 2025 Kanstantsin Mesnik
 * SPDX-License-Identifier: MIT
 */
declare(strict_types=1);

namespace Paira\Tests\Shared\Internal\Text;

use Paira\Shared\Internal\Text\Preview;
use Paira\Shared\Internal\Text\TextOf;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

final class PreviewTest extends TestCase
{
    #[Test]
    public function returnsOriginalTextWhenShorterThanLimit(): void
    {
        $this->assertSame(
            'short',
            new Preview(new TextOf('short'), 10)->value()
        );
    }

    #[Test]
    public function returnsOriginalTextWhenEqualToLimit(): void
    {
        $this->assertSame(
            'exactly10!',
            new Preview(new TextOf('exactly10!'), 10)->value()
        );
    }

    #[Test]
    public function shortensTextAndAddsEllipsisWhenExceedsLimit(): void
    {
        $this->assertSame(
            'this is a…',
            new Preview(new TextOf('this is a long string'), 10)->value()
        );
    }

    #[Test]
    public function worksWithMultibyteCharacters(): void
    {
        $this->assertSame(
            'Вітаю…',
            new Preview(new TextOf('Вітаю, даражэнькі'), 6)->value()
        );
    }

    #[Test]
    public function truncatesToDefaultMaxLengthOf50(): void
    {
        $this->assertSame(
            str_repeat('a', 49) . '…',
            new Preview(new TextOf(str_repeat('a', 100)))->value()
        );
    }

    #[Test]
    public function returnsOnlyEllipsisIfLimitIsOne(): void
    {
        $this->assertSame(
            '…',
            new Preview(new TextOf('abcdef'), 1)->value()
        );
    }

    #[Test]
    public function returnsEmptyStringIfLimitIsZero(): void
    {
        $this->assertSame(
            '',
            new Preview(new TextOf('abcdef'), 0)->value()
        );
    }
}
