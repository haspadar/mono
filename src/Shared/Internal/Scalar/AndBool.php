<?php

/*
 * SPDX-FileCopyrightText: Copyright (c) 2025 Kanstantsin Mesnik
 * SPDX-License-Identifier: MIT
 */
declare(strict_types=1);

namespace Paira\Shared\Internal\Scalar;

/**
 * A boolean that is true if both operands are true.
 *
 * Performs logical AND over two {@see Boolean} scalars.
 *
 * @psalm-pure
 * @since 0.1
 */
final readonly class AndBool implements Boolean
{
    public function __construct(
        private Boolean $left,
        private Boolean $right
    ) {
    }

    #[\Override]
    public function value(): bool
    {
        return $this->left->value() && $this->right->value();
    }
}
