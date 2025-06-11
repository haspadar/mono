<?php

/*
 * SPDX-FileCopyrightText: Copyright (c) 2025 Kanstantsin Mesnik
 * SPDX-License-Identifier: MIT
 */
declare(strict_types=1);

namespace Paira\Shared\Internal\Scalar;

/**
 * A lazy-evaluated scalar value.
 *
 * Implementations of this interface represent deferred computations
 * that return a value of type T when requested via {@see value()}.
 *
 * @template T
 * @since 0.1
 */
interface Scalar
{
    /**
     * Computes or returns the wrapped value.
     *
     * @return T
     */
    public function value(): mixed;
}
