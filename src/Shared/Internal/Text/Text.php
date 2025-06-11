<?php

/*
 * SPDX-FileCopyrightText: Copyright (c) 2025 Kanstantsin Mesnik
 * SPDX-License-Identifier: MIT
 */
declare(strict_types=1);

namespace Paira\Shared\Internal\Text;

use Override;
use Paira\Shared\Internal\Scalar\Scalar;

/**
 * A scalar that represents a string value.
 *
 * Implementations provide lazy or decorated string values.
 *
 * @extends Scalar<string>
 *
 * @since 0.1
 */
interface Text extends Scalar
{
    #[Override]
    public function value(): string;
}
