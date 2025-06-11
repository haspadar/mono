<?php

/*
 * SPDX-FileCopyrightText: Copyright (c) 2025 Kanstantsin Mesnik
 * SPDX-License-Identifier: MIT
 */
declare(strict_types=1);

namespace Paira\Shared\Internal\Text;

use Paira\Exception;

/**
 * {@see Text}, validated to match email format.
 *
 * @throws Exception If the text is not a valid email.
 *
 * @psalm-pure
 * @since 0.1
 */
final readonly class Email extends TextEnvelope
{
    /**
     * @throws Exception
     */
    #[\Override]
    public function value(): string
    {
        if (!filter_var($this->origin->value(), FILTER_VALIDATE_EMAIL)) {
            throw new Exception(sprintf(
                'Invalid email format. Got: "%s"',
                $this->origin->value()
            ));
        }

        return $this->origin->value();
    }
}
