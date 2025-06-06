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
 * Example:
 * $text = new Alphanumeric(new TextOf('abc123XYZ'));
 * echo $text->value(); // 'abc123XYZ'
 *
 * @throws Exception If the text contains non-alphanumeric characters.
 *
 * @since 0.1
 */
final readonly class Alphanumeric implements Text
{
    /**
     * @throws Exception
     */
    public function __construct(private Text $text)
    {
        if (!preg_match('/^[a-zA-Z0-9]+\z/', $this->text->value())) {
            throw new Exception(sprintf(
                'Text must be alphanumeric. Got: "%s"',
                $this->text->value()
            ));
        }
    }

    #[Override]
    public function value(): string
    {
        return $this->text->value();
    }
}
