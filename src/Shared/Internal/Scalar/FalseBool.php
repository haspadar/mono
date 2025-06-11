<?php

/*
 * SPDX-FileCopyrightText: Copyright (c) 2025 Kanstantsin Mesnik
 * SPDX-License-Identifier: MIT
 */
declare(strict_types=1);

namespace Paira\Shared\Internal\Scalar;

use Override;

/**
 * A scalar that always returns `false`.
 *
 * @since 0.1
 */
final readonly class FalseBool implements Boolean
{
    #[Override]
    public function value(): bool
    {
        return false;
    }
}
