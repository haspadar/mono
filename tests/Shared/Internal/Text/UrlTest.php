<?php

/*
 * SPDX-FileCopyrightText: Copyright (c) 2025 Kanstantsin Mesnik
 * SPDX-License-Identifier: MIT
 */
declare(strict_types=1);

namespace Paira\Tests\Shared\Internal\Text;

use Paira\Exception;
use Paira\Shared\Internal\Text\TextOf;
use Paira\Shared\Internal\Text\Url;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

final class UrlTest extends TestCase
{
    #[Test]
    public function validUrlIsAccepted(): void
    {
        $text = new TextOf('https://example.com');
        $url = new Url($text);
        $this->assertSame('https://example.com', $url->value());
    }

    #[Test]
    public function invalidUrlThrowsException(): void
    {
        $this->expectException(Exception::class);
        new Url(new TextOf('not-a-valid-url'))->value();
    }
}
