<?php

/*
 * SPDX-FileCopyrightText: Copyright (c) 2025 Kanstantsin Mesnik
 * SPDX-License-Identifier: MIT
 */
declare(strict_types=1);

namespace Paira\Tests\Shared\Internal\Logic;

use Paira\Shared\Internal\Logic\IsUrl;
use Paira\Shared\Internal\Text\TextOf;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

final class IsUrlTest extends TestCase
{
    #[Test]
    public function returnsTrueWhenTextIsValidUrl(): void
    {
        $this->assertTrue(
            new IsUrl(new TextOf('https://example.com'))->value(),
            'Expected true for valid URL "https://example.com"'
        );
    }

    #[Test]
    public function returnsFalseWhenTextIsInvalidUrl(): void
    {
        $this->assertFalse(
            new IsUrl(new TextOf('not-a-valid-url'))->value(),
            'Expected false for invalid URL "not-a-valid-url"'
        );
    }
}
