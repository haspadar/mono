<?php
/*
 * SPDX-FileCopyrightText: Copyright (c) 2025 Kanstantsin Mesnik
 * SPDX-License-Identifier: MIT
 */
declare(strict_types=1);

namespace Paira\Tests\Shared\Internal\Text;

use Paira\Exception;
use Paira\Shared\Internal\Text\NotEmpty;
use Paira\Shared\Internal\Text\TextOf;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

final class NotEmptyTest extends TestCase
{
    #[Test]
    public function nonEmptyIsAccepted(): void
    {
        $this->assertSame(
            'hello',
            new NotEmpty(new TextOf('hello'))->value()
        );
    }

    #[Test]
    public function whitespacesIsAccepted(): void
    {
        $this->assertSame(
            '  valid  ',
            new NotEmpty(new TextOf('  valid  '))->value()
        );
    }

    #[Test]
    #[DataProvider('emptyStringsProvider')]
    public function notEmptyThrowsException(string $input): void
    {
        $this->expectException(Exception::class);
        new NotEmpty(new TextOf($input));
    }

    public static function emptyStringsProvider(): array
    {
        return [
            [''],
            ['   '],
            ["\n"],
            ["\t"],
        ];
    }
}
