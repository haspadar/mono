<?php

/*
 * SPDX-FileCopyrightText: Copyright (c) 2025 Kanstantsin Mesnik
 * SPDX-License-Identifier: MIT
 */
declare(strict_types=1);

namespace Paira\Shared\Internal\Scalar;

use Override;

/**
 * A boolean that evaluates a callback when its value is requested.
 *
 * Wraps a callable that returns a boolean result.
 * Used to defer computation of a logical condition.
 *
 * Example:
 * new LazyBool(fn() => $user->isBlocked())
 *
 * @since 0.1
 */
final readonly class LazyBool implements Boolean
{
    /**
     * @var callable(): bool
     */
    private mixed $callback;

    public function __construct(callable $callback)
    {
        $this->callback = $callback;
    }

    #[Override]
    public function value(): bool
    {
        return ($this->callback)();
    }
}
