<?php

/*
 * SPDX-FileCopyrightText: Copyright (c) 2025 Kanstantsin Mesnik
 * SPDX-License-Identifier: MIT
 */
declare(strict_types=1);

namespace Paira\Shared\Internal\Text;

/**
 * Right-padded string using {@see str_pad()}.
 *
 * Pads the string to the specified length with the given character.
 *
 * Example:
 * $text = new PaddedRight(new TextOf('foo'), 6, '.');
 * echo $text->value(); // 'foo...'
 *
 * @psalm-pure
 * @since 0.1
 */
final readonly class PaddedRight extends TextEnvelope
{
    public function __construct(
        Text $text,
        private int $length,
        private string $padChar,
    ) {
        parent::__construct($text);
    }

    #[\Override]
    public function value(): string
    {
        return str_pad(
            $this->origin->value(),
            $this->length,
            $this->padChar,
            STR_PAD_RIGHT
        );
    }
}
