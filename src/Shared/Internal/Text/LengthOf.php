<?php

/*
 * SPDX-FileCopyrightText: Copyright (c) 2025 Kanstantsin Mesnik
 * SPDX-License-Identifier: MIT
 */
declare(strict_types=1);

namespace Paira\Shared\Internal\Text;

/**
 * Length of {@see Text}, measured in multibyte characters.
 *
 * Calculates and compares the number of characters in a text.
 *
 * Example:
 * $length = new LengthOf(new TextOf('Прывітанне'));
 * echo $length->value(); // 10
 *
 * @since 0.1
 */
final readonly class LengthOf
{
    public function __construct(protected Text $origin)
    {
    }

    public function value(): int
    {
        return mb_strlen($this->origin->value());
    }

    public function isLessThanOrEqual(int $max): bool
    {
        return $this->value() <= $max;
    }

    public function isGreaterThan(int $max): bool
    {
        return $this->value() > $max;
    }
}
