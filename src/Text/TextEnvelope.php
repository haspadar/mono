<?php

/*
 * SPDX-FileCopyrightText: Copyright (c) 2025 Kanstantsin Mesnik
 * SPDX-License-Identifier: MIT
 */
declare(strict_types=1);

namespace Solo\Text;

/**
 * Envelope for {@see Text}, delegating all calls to the origin.
 *
 * @codeCoverageIgnore
 */
abstract readonly class TextEnvelope implements Text
{
    public function __construct(protected Text $origin)
    {
    }

    #[\Override]
    public function value(): string
    {
        return $this->origin->value();
    }

    #[\Override]
    public function __toString(): string
    {
        return $this->value();
    }
}
