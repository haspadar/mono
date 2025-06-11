<?php

/*
 * SPDX-FileCopyrightText: Copyright (c) 2025 Kanstantsin Mesnik
 * SPDX-License-Identifier: MIT
 */
declare(strict_types=1);

namespace Paira\Shared\Internal\Text;

use Paira\Exception;

/**
 * {@see Text} that must be a valid URL.
 *
 * Validates the string using {@see FILTER_VALIDATE_URL}.
 *
 * @throws Exception If the URL is invalid.
 *
 * @psalm-pure
 * @since 0.1
 */
final readonly class Url extends TextEnvelope
{
    /**
     * @throws Exception
     */
    #[\Override]
    public function value(): string
    {
        if (!filter_var($this->origin->value(), FILTER_VALIDATE_URL)) {
            throw new Exception(sprintf(
                'Invalid URL format. Got: "%s"',
                $this->origin->value()
            ));
        }

        return $this->origin->value();
    }
}
