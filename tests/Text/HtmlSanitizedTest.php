<?php

/*
 * SPDX-FileCopyrightText: Copyright (c) 2025 Kanstantsin Mesnik
 * SPDX-License-Identifier: MIT
 */
declare(strict_types=1);

namespace Mono\Tests\Text;

use Mono\Text\HtmlSanitized;
use Mono\Text\TextOf;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

final class HtmlSanitizedTest extends TestCase
{
    #[Test]
    public function returnsSanitizedTextWhenHtmlTagsArePresent(): void
    {
        $this->assertSame(
            'alert(&quot;XSS&quot;)bold &amp; &quot;quote&quot;',
            new HtmlSanitized(new TextOf('<script>alert("XSS")</script><b>bold</b> & "quote"'))->value(),
            'Expected sanitized output with HTML tags and special characters'
        );
    }

    #[Test]
    public function returnsSameTextWhenInputIsPlain(): void
    {
        $this->assertSame(
            'safe text 123',
            new HtmlSanitized(new TextOf('safe text 123'))->value(),
            'Expected unchanged output for plain text'
        );
    }
}
