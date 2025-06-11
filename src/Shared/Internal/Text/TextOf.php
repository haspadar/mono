<?php

/*
 * SPDX-FileCopyrightText: Copyright (c) 2025 Kanstantsin Mesnik
 * SPDX-License-Identifier: MIT
 */
declare(strict_types=1);

namespace Paira\Shared\Internal\Text;

use Override;

/**
 * Text of a plain string.
 *
 * @since 0.1
 */
final readonly class TextOf implements Text
{
    public function __construct(private string $origin)
    {
    }

    #[Override]
    public function value(): string
    {
        return $this->origin;
    }
}
