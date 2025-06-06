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
 * {@see Text} that throws if its length exceeds a limit.
 *
 * Validates the number of characters using {@see LengthOf}.
 *
 * Example:
 * $text = new MaxLengthAsserted(new TextOf('hello'), 10);
 * echo $text->value(); // 'hello'
 *
 * @throws Exception If the text exceeds the length limit.
 *
 * @since 0.1
 */

final readonly class MaxLengthAsserted implements Text
{
    /**
     * @throws Exception
     */
    public function __construct(
        private Text $text,
        private int $limit
    ) {
        $length = new LengthOf($this->text);
        if ($length->isGreaterThan($this->limit)) {
            throw new Exception(sprintf(
                'Text exceeds maximum length of %d (got %d): "%s..."',
                $this->limit,
                $length->value(),
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
