<?php

/*
 * SPDX-FileCopyrightText: Copyright (c) 2025 Kanstantsin Mesnik
 * SPDX-License-Identifier: MIT
 */
declare(strict_types=1);

namespace Paira\Shared\Internal\Scalar;

use Override;

/**
 * A boolean that wraps a native `bool` value.
 *
 * This is a simple wrapper for primitive boolean literals.
 * Use when a native `true` or `false` needs to be treated as a {@see Boolean} object.
 *
 * Example:
 * new BoolOf(true)
 *
 * @since 0.1
 */
final readonly class BoolOf implements Boolean
{
    public function __construct(
        private bool|int $value
    ) {
    }

    #[Override]
    public function value(): bool
    {
        return (bool) $this->value;
    }
}
