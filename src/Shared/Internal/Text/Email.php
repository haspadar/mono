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
 * {@see Text}, validated to match email format.
 *
 * Example:
 * $text = new Email(new TextOf('user@example.com'));
 * echo $text->value(); // 'user@example.com'
 *
 * @throws Exception If the text is not a valid email.
 *
 * @since 0.1
 */
final readonly class Email implements Text
{
    /**
     * @throws Exception
     */
    public function __construct(private Text $email)
    {
        if (!filter_var($this->email->value(), FILTER_VALIDATE_EMAIL)) {
            throw new Exception(sprintf(
                'Invalid email format. Got: "%s"',
                $this->email->value()
            ));
        }
    }

    #[Override]
    public function value(): string
    {
        return $this->email->value();
    }
}
