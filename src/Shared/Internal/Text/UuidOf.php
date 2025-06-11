<?php

/*
 * SPDX-FileCopyrightText: Copyright (c) 2025 Kanstantsin Mesnik
 * SPDX-License-Identifier: MIT
 */
declare(strict_types=1);

namespace Paira\Shared\Internal\Text;

use Paira\Exception;

/**
 * {@see Text} that must match a valid UUID v1–v5 format.
 *
 * @throws Exception If the string is not a valid UUID.
 *
 * @psalm-pure
 * @since 0.1
 */
final readonly class UuidOf extends TextEnvelope
{
    /**
     * @throws Exception
     */
    #[\Override]
    public function value(): string
    {
        if (!preg_match('/^[0-9a-fA-F]{8}-[0-9a-fA-F]{4}-[1-5][0-9a-fA-F]{3}-[89abAB][0-9a-fA-F]{3}-[0-9a-fA-F]{12}$/', $this->origin->value())) {
            throw new Exception(sprintf(
                'Invalid UUID format. Got: "%s"',
                $this->origin->value()
            ));
        }

        return $this->origin->value();
    }
}
