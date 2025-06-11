<?php

/*
 * SPDX-FileCopyrightText: Copyright (c) 2025 Kanstantsin Mesnik
 * SPDX-License-Identifier: MIT
 */
declare(strict_types=1);

namespace Paira\Shared\Internal\Scalar;

use Override;

/**
 * A scalar that returns a boolean value.
 *
 * @extends Scalar<bool>
 */
interface Boolean extends Scalar
{
    #[Override]
    public function value(): bool;
}
