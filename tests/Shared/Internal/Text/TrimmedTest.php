<?php
/*
 * SPDX-FileCopyrightText: Copyright (c) 2025 Kanstantsin Mesnik
 * SPDX-License-Identifier: MIT
 */
declare(strict_types=1);

namespace Paira\Tests\Shared\Internal\Text;

use Paira\Shared\Internal\Text\TextOf;
use Paira\Shared\Internal\Text\Trimmed;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

final class TrimmedTest extends TestCase
{
    #[Test]
    public function trimsLeadingAndTrailingSpaces(): void
    {
        $this->assertSame(
            'hello  world',
            new Trimmed(new TextOf('  hello  world  '))->value()
        );
    }

    #[Test]
    public function emptyStringRemainsEmpty(): void
    {
        $this->assertSame(
            '',
            new Trimmed(new TextOf('   '))->value()
        );
    }
}
