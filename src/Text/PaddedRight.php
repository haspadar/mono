<?php

/*
 * SPDX-FileCopyrightText: Copyright (c) 2025 Kanstantsin Mesnik
 * SPDX-License-Identifier: MIT
 */
declare(strict_types=1);

namespace Mono\Text;

use Mono\Text;

/**
 * {@see Text} with right padding.
 *
 * Pads the text to the specified length with the given character using {@see str_pad()}.
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
        Text $origin,
        int $length,
        string $padChar
    ) {
        parent::__construct(
            new TextOf(
                str_pad(
                    $origin->value(),
                    $length,
                    $padChar,
                    STR_PAD_RIGHT
                )
            )
        );
    }
}
