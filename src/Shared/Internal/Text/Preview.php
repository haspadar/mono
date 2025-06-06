<?php
/*
 * SPDX-FileCopyrightText: Copyright (c) 2025 Kanstantsin Mesnik
 * SPDX-License-Identifier: MIT
 */
declare(strict_types=1);

namespace Paira\Shared\Internal\Text;

use Override;

/**
 * {@see Text} preview truncated to a max length with ellipsis.
 *
 * If the text exceeds the limit, it is truncated and suffixed with '…'.
 *
 * Example:
 * $text = new Preview(new TextOf('Hello, world!'), 8);
 * echo $text->value(); // 'Hello, w…'
 *
 * @since 0.1
 */
final readonly class Preview implements Text
{
    public function __construct(
        private Text $text,
        private int $limit = 50
    ) {
    }

    #[Override]
    public function value(): string
    {
        if ($this->limit < 1) {
            return '';
        }

        if (new LengthOf($this->text)->isLessThanOrEqual($this->limit)) {
            return $this->text->value();
        }

        return new TruncatedRight($this->text, $this->limit - 1)->value() . '…';
    }
}
