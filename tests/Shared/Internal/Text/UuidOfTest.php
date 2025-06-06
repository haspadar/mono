<?php
/*
 * SPDX-FileCopyrightText: Copyright (c) 2025 Kanstantsin Mesnik
 * SPDX-License-Identifier: MIT
 */
declare(strict_types=1);

namespace Paira\Tests\Shared\Internal\Text;

use Faker\Factory;
use Paira\Exception;
use Paira\Shared\Internal\Text\TextOf;
use Paira\Shared\Internal\Text\UuidOf;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
final class UuidOfTest extends TestCase
{
    #[Test]
    public function validUuidIsAccepted(): void
    {
        $uuid = Factory::create()->uuid;
        $this->assertSame(
            $uuid,
            new UuidOf(new TextOf($uuid))->value()
        );
    }

    #[Test]
    #[DataProvider('invalidUuidProvider')]
    public function throwsExceptionOnInvalidUuid(string $input): void
    {
        $this->expectException(Exception::class);
        new UuidOf(new TextOf($input));
    }

    public static function invalidUuidProvider(): iterable
    {
        return [
            'too short' => ['123'],
            'invalid prefix' => ['xx3c1aa80-1234-5678-89ab-123456789012'],
            'non-hex chars' => ['g3c1aa80-1234-5678-89ab-123456789012'],
            'missing dashes' => ['3c1aa801234567889ab123456789012'],
            'valid uuid with prefix' => ['!!!3c1aa80-1234-5678-89ab-123456789012'],
            'newline padded' => ["3c1aa80-1234-5678-89ab-123456789012\n"],
            'uuid with prefix' => ['abc123e4567-e89b-12d3-a456-426614174000'],
            'uuid with suffix' => ['123e4567-e89b-12d3-a456-426614174000xyz'],
        ];
    }
}
