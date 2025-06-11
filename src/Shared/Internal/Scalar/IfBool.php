<?php

/*
 * SPDX-FileCopyrightText: Copyright (c) 2025 Kanstantsin Mesnik
 * SPDX-License-Identifier: MIT
 */
declare(strict_types=1);

namespace Paira\Shared\Internal\Scalar;

use Override;

/**
 *
 * @template T
 * @implements Scalar<T>
 *
 * @since 0.1
 */
final readonly class IfBool implements Scalar
{
    /**
     * @param Boolean $condition The condition to evaluate
     * @param Scalar $onTrue The scalar to return if condition is true
     * @param Scalar $onFalse The scalar to return if condition is false
     */
    public function __construct(
        private Boolean $condition,
        private Scalar $onTrue,
        private Scalar $onFalse
    ) {
    }

    /**
     * @return T
     */
    #[Override]
    public function value(): mixed
    {
        return $this->condition
            ? $this->onTrue
            : $this->onFalse;
    }
}
