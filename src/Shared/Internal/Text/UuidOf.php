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
 * {@see Text} that must match a valid UUID v1–v5 format.
 *
 * Example:
 * $text = new UuidOf(new TextOf('550e8400-e29b-41d4-a716-446655440000'));
 * echo $text->value(); // '550e8400-e29b-41d4-a716-446655440000'
 *
 * @throws Exception If the string is not a valid UUID.
 *
 * @since 0.1
 */
final readonly class UuidOf implements Text
{
    /**
     * @throws Exception
     */
    public function __construct(private Text $text)
    {
        if (!preg_match('/^[0-9a-fA-F]{8}-[0-9a-fA-F]{4}-[1-5][0-9a-fA-F]{3}-[89abAB][0-9a-fA-F]{3}-[0-9a-fA-F]{12}$/', $this->text->value())) {
            throw new Exception(sprintf(
                'Invalid UUID format. Got: "%s"',
                $text->value()
            ));
        }
    }

    #[Override]
    public function value(): string
    {
        return $this->text->value();
    }
}
