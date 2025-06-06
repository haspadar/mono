<?php
/*
 * SPDX-FileCopyrightText: Copyright (c) 2025 Kanstantsin Mesnik
 * SPDX-License-Identifier: MIT
 */
declare(strict_types=1);

namespace Paira\Shared\Internal\Text;

/**
 * String truncated from the right.
 *
 * Uses {@see mb_substr()} to return at most `$length` characters from the left.
 *
 * Example:
 * $text = new TruncatedRight(new TextOf('hello world'), 5);
 * echo $text->value(); // 'hello'
 *
 * @since 0.1
 */

final readonly class TruncatedRight
{
    public function __construct(
        private Text $text,
        private int  $length
    ) {
    }

    public function value(): string
    {
        return mb_substr($this->text->value(), 0, $this->length);
    }
}
