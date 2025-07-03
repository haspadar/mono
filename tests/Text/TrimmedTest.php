<?php

/*
 * SPDX-FileCopyrightText: Copyright (c) 2025 Kanstantsin Mesnik
 * SPDX-License-Identifier: MIT
 */
declare(strict_types=1);

namespace Solo\Tests\Text;

use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Solo\Text\TextOf;
use Solo\Text\Trimmed;

final class TrimmedTest extends TestCase
{
    #[Test]
    public function returnsTextWithoutLeadingAndTrailingSpaces(): void
    {
        $this->assertSame(
            'hello  world',
            new Trimmed(new TextOf('  hello  world  '))->value(),
            'Expected leading and trailing spaces to be removed'
        );
    }

    #[Test]
    public function returnsEmptyStringWhenInputIsWhitespaceOnly(): void
    {
        $this->assertSame(
            '',
            new Trimmed(new TextOf('   '))->value(),
            'Expected empty string when input contains only spaces'
        );
    }
}
