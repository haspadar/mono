<?php

/*
 * SPDX-FileCopyrightText: Copyright (c) 2025 Kanstantsin Mesnik
 * SPDX-License-Identifier: MIT
 */
declare(strict_types=1);

namespace Paira\Shared\Internal\Text;

use Override;

/**
 * {@see Text} in uppercase.
 *
 * Converts the given text to uppercase using multibyte support.
 *
 * Example:
 * $text = new Uppercased(new TextOf('hello Ў'));
 * echo $text->value(); // 'HELLO Ў'
 *
 * @since 0.1
 */
final readonly class Uppercased extends TextEnvelope
{
    #[Override]
    public function value(): string
    {
        return mb_strtoupper($this->origin->value());
    }
}
