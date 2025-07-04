<?php

/*
 * SPDX-FileCopyrightText: Copyright (c) 2025 Kanstantsin Mesnik
 * SPDX-License-Identifier: MIT
 */
declare(strict_types=1);

namespace Mono\Logic;

use Mono\Scalar\Scalar;

/**
 * A logical boolean component.
 *
 * Represents a boolean condition.
 *
 * @extends Scalar<bool>
 * @psalm-pure
 */
interface Logic extends Scalar
{
    /**
     * Whether the condition is logically true.
     */
    #[\Override]
    public function value(): bool;

}
