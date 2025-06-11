<?php

/*
 * SPDX-FileCopyrightText: Copyright (c) 2025 Kanstantsin Mesnik
 * SPDX-License-Identifier: MIT
 */
declare(strict_types=1);

namespace Paira\Shared\Internal\Text;

namespace Paira\Shared\Internal\Text;

/**
 * {@see Text} sanitized for HTML output.
 *
 * Strips all tags and escapes special characters using {@see htmlspecialchars}.
 *
 * Example:
 * $text = new HtmlSanitized(new TextOf('<b>John & "Jane"</b>'));
 * echo $text->value(); // 'John &amp; &quot;Jane&quot;'
 *
 * @psalm-pure
 * @since 0.1
 */
final readonly class HtmlSanitized extends TextEnvelope
{
    #[\Override]
    public function value(): string
    {
        return htmlspecialchars(
            strip_tags($this->origin->value()),
            ENT_QUOTES | ENT_HTML5,
            'UTF-8'
        );
    }
}
