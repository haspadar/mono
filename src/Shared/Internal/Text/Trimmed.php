<?php
/*
 * SPDX-FileCopyrightText: Copyright (c) 2025 Kanstantsin Mesnik
 * SPDX-License-Identifier: MIT
 */
declare(strict_types=1);

namespace Paira\Shared\Internal\Text;

use Override;

/**
 * {@see Text} without leading or trailing whitespace.
 *
 * Applies {@see trim()} to the original text.
 *
 * Example:
 * $text = new Trimmed(new TextOf('  hello  '));
 * echo $text->value(); // 'hello'
 *
 * @since 0.1
 */
final readonly class Trimmed implements Text
{
    public function __construct(private Text $text)
    {
    }

    #[Override]
    public function value(): string
    {
        return trim($this->text->value());
    }
}
