<?php

/*
 * SPDX-FileCopyrightText: Copyright (c) 2025 Kanstantsin Mesnik
 * SPDX-License-Identifier: MIT
 */
declare(strict_types=1);

namespace Paira\Shared\Internal\Scalar;

/**
 * A boolean that returns true if two scalar values are equal.
 *
 * Compares the values of two {@see Scalar<T>} instances using `==`.
 *
 * @template T
 *
 * @psalm-pure
 * @since 0.1
 */
final readonly class SameBool implements Boolean
{
    /**
     * @param Scalar<T> $left
     * @param Scalar<T> $right
     */
    public function __construct(
        private Scalar $left,
        private Scalar $right
    ) {
    }

    #[\Override]
    public function value(): bool
    {
        return $this->left->value() === $this->right->value();
    }
}
