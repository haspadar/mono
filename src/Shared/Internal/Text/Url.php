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
 * {@see Text} that must be a valid URL.
 *
 * Validates the string using {@see FILTER_VALIDATE_URL}.
 *
 * Example:
 * $text = new Url(new TextOf('https://example.com'));
 * echo $text->value(); // 'https://example.com'
 *
 * @throws Exception If the URL is invalid.
 *
 * @since 0.1
 */
final readonly class Url implements Text
{
    /**
     * @throws Exception
     */
    public function __construct(private Text $url)
    {
        if (!filter_var($this->url->value(), FILTER_VALIDATE_URL)) {
            throw new Exception(sprintf(
                'Invalid URL format. Got: "%s"',
                $this->url->value()
            ));
        }
    }

    #[Override]
    public function value(): string
    {
        return $this->url->value();
    }
}
