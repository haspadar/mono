<?php

/*
 * SPDX-FileCopyrightText: Copyright (c) 2025 Kanstantsin Mesnik
 * SPDX-License-Identifier: MIT
 */
declare(strict_types=1);

namespace Paira\Shared\Internal\Text;

/**
 * {@see Text} without leading or trailing whitespace.
 *
 * Applies {@see trim()} to the original text.
 *
 * Example:
 * $text = new Trimmed(new TextOf('  hello  '));
 * echo $text->value(); // 'hello'
 *
 * @psalm-pure
 * @since 0.1
 */
final readonly class Trimmed extends TextEnvelope
{
    #[\Override]
    public function value(): string
    {
        return trim($this->origin->value());
    }
}
