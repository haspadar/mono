<?php

/*
 * SPDX-FileCopyrightText: Copyright (c) 2025 Kanstantsin Mesnik
 * SPDX-License-Identifier: MIT
 */
declare(strict_types=1);

namespace Paira\Shared\Internal\Text;

use Override;

/**
 * {@see Text} in lowercase.
 *
 * Converts the given text to lowercase using multibyte support.
 *
 * Example:
 * $text = new Lowercased(new TextOf('ЎСЁ БУДЗЕ!'));
 * echo $text->value(); // 'ўсё будзе!'
 *
 * @since 0.1
 */
final readonly class Lowercased extends TextEnvelope
{
    #[Override]
    public function value(): string
    {
        return mb_strtolower($this->origin->value());
    }
}
