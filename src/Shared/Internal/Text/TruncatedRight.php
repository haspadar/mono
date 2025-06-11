<?php

/*
 * SPDX-FileCopyrightText: Copyright (c) 2025 Kanstantsin Mesnik
 * SPDX-License-Identifier: MIT
 */
declare(strict_types=1);

namespace Paira\Shared\Internal\Text;

use Override;

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

final readonly class TruncatedRight extends TextEnvelope
{
    public function __construct(
        Text $text,
        private int  $length
    ) {
        parent::__construct($text);
    }

    #[Override]
    public function value(): string
    {
        return mb_substr($this->origin->value(), 0, $this->length);
    }
}
