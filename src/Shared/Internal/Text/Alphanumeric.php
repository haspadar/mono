<?php

/*
 * SPDX-FileCopyrightText: Copyright (c) 2025 Kanstantsin Mesnik
 * SPDX-License-Identifier: MIT
 */
declare(strict_types=1);

namespace Paira\Shared\Internal\Text;

use Override;
use Paira\Exception;

/**
 * {@see Text} that accepts only alphanumeric characters (A–Z, a–z, 0–9).
 *
 * @throws Exception If the text contains non-alphanumeric characters.
 *
 * @since 0.1
 */
final readonly class Alphanumeric extends TextEnvelope
{
    #[Override]
    public function value(): string
    {
        if (!preg_match('/^[a-zA-Z0-9]+\z/', $this->origin->value())) {
            throw new Exception(sprintf(
                'Text must be alphanumeric. Got: "%s"',
                $this->origin->value()
            ));
        }

        return $this->origin->value();
    }
}
