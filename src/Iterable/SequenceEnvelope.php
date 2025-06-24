<?php

/*
 * SPDX-FileCopyrightText: Copyright (c) 2025 Kanstantsin Mesnik
 * SPDX-License-Identifier: MIT
 */
declare(strict_types=1);

namespace Brick\Iterable;

use Iterator;

/**
 * Base class for {@see Sequence} implementations.
 *
 * @template T
 * @implements Sequence<T>
 */
abstract class SequenceEnvelope implements Sequence
{
    /**
     * @param Sequence<T> $origin
     */
    public function __construct(private Sequence $origin)
    {
    }

    /**
     * @return Iterator<T>
     */
    #[\Override]
    public function getIterator(): Iterator
    {
        return $this->origin->getIterator();
    }
}
