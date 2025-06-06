<?php
/*
 * SPDX-FileCopyrightText: Copyright (c) 2025 Kanstantsin Mesnik
 * SPDX-License-Identifier: MIT
 */
declare(strict_types=1);

namespace Paira\Tests\Shared\Internal\Text;

use Paira\Shared\Internal\Text\TextOf;
use Paira\Shared\Internal\Text\HtmlSanitized;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

final class HtmlSanitizedTest extends TestCase
{
    #[Test]
    public function htmlAndTagsAreSanitized(): void
    {
        $this->assertSame(
            'alert(&quot;XSS&quot;)bold &amp; &quot;quote&quot;',
            new HtmlSanitized(new TextOf('<script>alert("XSS")</script><b>bold</b> & "quote"'))->value()
        );
    }

    #[Test]
    public function plainTextIsUnchanged(): void
    {
        $this->assertSame(
            'safe text 123',
            new HtmlSanitized(new TextOf('safe text 123'))->value()
        );
    }
}
