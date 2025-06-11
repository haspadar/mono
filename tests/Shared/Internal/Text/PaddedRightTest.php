<?php

/*
 * SPDX-FileCopyrightText: Copyright (c) 2025 Kanstantsin Mesnik
 * SPDX-License-Identifier: MIT
 */
declare(strict_types=1);

namespace Paira\Tests\Shared\Internal\Text;

use Paira\Shared\Internal\Text\PaddedRight;
use Paira\Shared\Internal\Text\TextOf;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

final class PaddedRightTest extends TestCase
{
    #[Test]
    public function padsWithZerosToRight(): void
    {
        $this->assertSame(
            '12000',
            new PaddedRight(new TextOf('12'), 5, '0')->value()
        );
    }

    #[Test]
    public function padsWithSpacesToRight(): void
    {
        $this->assertSame(
            'abc   ',
            new PaddedRight(new TextOf('abc'), 6, ' ')->value()
        );
    }

    #[Test]
    public function notPadsForLong(): void
    {
        $this->assertSame(
            'foobar',
            new PaddedRight(new TextOf('foobar'), 4, '*')->value()
        );
    }

    #[Test]
    public function padsEmptyString(): void
    {
        $this->assertSame(
            '...',
            new PaddedRight(new TextOf(''), 3, '.')->value()
        );
    }
}
