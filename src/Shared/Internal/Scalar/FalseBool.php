<?php

/*
 * SPDX-FileCopyrightText: Copyright (c) 2025 Kanstantsin Mesnik
 * SPDX-License-Identifier: MIT
 */
declare(strict_types=1);

namespace Paira\Shared\Internal\Scalar;

/**
 * A scalar that always returns `false`.
 *
 * @psalm-pure
 * @since 0.1
 */
final readonly class FalseBool implements Boolean
{
    #[\Override]
    public function value(): bool
    {
        return false;
    }
}
