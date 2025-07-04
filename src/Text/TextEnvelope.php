<?php

/*
 * SPDX-FileCopyrightText: Copyright (c) 2025 Kanstantsin Mesnik
 * SPDX-License-Identifier: MIT
 */
declare(strict_types=1);

namespace Mono\Text;

use Mono\Text;

/**
 * Envelope for {@see Text}, delegating all calls to the origin.
 *
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
}
