<?php

/*
 * SPDX-FileCopyrightText: Copyright (c) 2025 Kanstantsin Mesnik
 * SPDX-License-Identifier: MIT
 */
declare(strict_types=1);

namespace Paira\Shared\Internal\Text;

use Paira\Exception;

/**
 * {@see Text} that is not empty or whitespace-only.
 *
 * Trims the text and throws if the result is an empty string.
 *
 * Example:
 * $text = new NotEmpty(new TextOf(' non-empty '));
 * echo $text->value(); // ' non-empty '
 *
 * @psalm-pure
 * @throws Exception If the trimmed text is empty.
 *
 * @since 0.1
 */
final readonly class NotEmpty extends TextEnvelope
{
    /**
     * @throws Exception
     */
    #[\Override]
    public function value(): string
    {
        if (new Trimmed($this->origin)->value() === '') {
            throw new Exception(sprintf(
                'Text cannot be empty or only whitespace. Got: "%s"',
                $this->origin->value()
            ));
        }

        return $this->origin->value();
    }
}
