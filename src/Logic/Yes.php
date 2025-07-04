<?php

/*
 * SPDX-FileCopyrightText: Copyright (c) 2025 Kanstantsin Mesnik
 * SPDX-License-Identifier: MIT
 */
declare(strict_types=1);

namespace Mono\Logic;

/**
 * {@see Logic} that always returns true.
 *
 * Useful in testing or as a default condition.
 *
 * @psalm-pure
 * @internal
 */
final readonly class Yes implements Logic
{
    #[\Override]
    public function value(): bool
    {
        return true;
    }
}
