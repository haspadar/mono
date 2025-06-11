<?php

/*
 * SPDX-FileCopyrightText: Copyright (c) 2025 Kanstantsin Mesnik
 * SPDX-License-Identifier: MIT
 */
declare(strict_types=1);

namespace Paira\Shared\Internal\Text;

/**
 * {@see Text} preview truncated to a max length with ellipsis.
 *
 * If the text exceeds the limit, it is truncated and suffixed with '…'.
 *
 * Example:
 * $text = new Preview(new TextOf('Hello, world!'), 8);
 * echo $text->value(); // 'Hello, w…'
 *
 * @psalm-pure
 * @since 0.1
 */
final readonly class Preview extends TextEnvelope
{
    public function __construct(
        Text $origin,
        private int $limit = 50
    ) {
        parent::__construct($origin);
    }

    #[\Override]
    public function value(): string
    {
        if ($this->limit < 1) {
            return '';
        }

        if (new LengthOf($this->origin)->isLessThanOrEqual($this->limit)) {
            return $this->origin->value();
        }

        return new TruncatedRight($this->origin, $this->limit - 1)->value() . '…';
    }
}
