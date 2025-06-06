<?php
/*
 * SPDX-FileCopyrightText: Copyright (c) 2025 Kanstantsin Mesnik
 * SPDX-License-Identifier: MIT
 */
declare(strict_types=1);

namespace Paira\Shared\Internal\Text;

final readonly class PaddedRight
{
    /**
     * Right-padded string using {@see str_pad()}.
     *
     * Pads the string to the specified length with the given character.
     *
     * Example:
     * $text = new PaddedRight('foo', 6, '.');
     * echo $text->value(); // 'foo...'
     *
     * @since 0.1
     */
    public function __construct(
        private string $text,
        private int $length,
        private string $padChar,
    ) {
    }

    public function value(): string
    {
        return str_pad($this->text, $this->length, $this->padChar, STR_PAD_RIGHT);
    }
}
