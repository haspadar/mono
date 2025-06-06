<?php
/*
 * SPDX-FileCopyrightText: Copyright (c) 2025 Kanstantsin Mesnik
 * SPDX-License-Identifier: MIT
 */
declare(strict_types=1);

namespace Paira\Tests\Shared\Internal\Text;

use Paira\Exception;
use Paira\Shared\Internal\Text\Alphanumeric;
use Paira\Shared\Internal\Text\TextOf;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

final class AlphanumericTest extends TestCase
{
    #[Test]
    public function alphanumericIsAccepted(): void
    {
        $this->assertSame(
            'abc123XYZ',
            new Alphanumeric(new TextOf('abc123XYZ'))->value()
        );
    }

    #[Test]
    #[DataProvider('invalidAlphanumericProvider')]
    public function nonAlphanumericThrowsException(string $input): void
    {
        $this->expectException(Exception::class);
        new Alphanumeric(new TextOf($input))->value();
    }

    public static function invalidAlphanumericProvider(): array
    {
        return [
            'symbols' => ['abc-123!'],
            'leading_ws' => [' abc123'],
            'trailing_ws' => ['abc123 '],
            'newline' => ["abc123\n"],
            'tab' => ["\tabc123"],
            'punctuation' => ['abc.123'],
        ];
    }
}
