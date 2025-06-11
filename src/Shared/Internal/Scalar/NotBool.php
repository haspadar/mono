<?php

/*
 * SPDX-FileCopyrightText: Copyright (c) 2025 Kanstantsin Mesnik
 * SPDX-License-Identifier: MIT
 */
declare(strict_types=1);

namespace Paira\Shared\Internal\Scalar;

/**
 * A boolean that negates the value of another {@see Boolean}.
 *
 * Returns true if the wrapped boolean is false, and false otherwise.
 *
 * @psalm-pure
 * @since 0.1
 */
final readonly class NotBool implements Boolean
{
    public function __construct(
        private Boolean $origin
    ) {
    }

    #[\Override]
    public function value(): bool
    {
        return !$this->origin->value();
    }
}
