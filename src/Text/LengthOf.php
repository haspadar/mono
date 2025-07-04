<?php

/*
 * SPDX-FileCopyrightText: Copyright (c) 2025 Kanstantsin Mesnik
 * SPDX-License-Identifier: MIT
 */
declare(strict_types=1);

namespace Mono\Text;

/**
 * Length of {@see Text}, measured in multibyte characters.
 *
 * Example:
 * $length = new LengthOf(new TextOf('Прывітанне'));
 * echo $length->value(); // 10
 *
 * @psalm-pure
 * @since 0.1
 */
final readonly class LengthOf
{
    public function __construct(private Text $origin)
    {
    }

    public function value(): int
    {
        return mb_strlen($this->origin->value(), 'UTF-8');
    }
}
