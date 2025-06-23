<?php

/*
 * SPDX-FileCopyrightText: Copyright (c) 2025 Kanstantsin Mesnik
 * SPDX-License-Identifier: MIT
 */
declare(strict_types=1);

namespace Paira\Shared\Internal\Logic;

/**
 * A logical boolean component.
 *
 * Represents a boolean condition.
 *
 * @psalm-pure
 */
interface Logic
{
    /**
     * Whether the condition is logically true.
     */
    public function value(): bool;

}
