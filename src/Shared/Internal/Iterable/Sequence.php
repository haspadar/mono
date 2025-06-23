<?php

/*
 * SPDX-FileCopyrightText: Copyright (c) 2025 Kanstantsin Mesnik
 * SPDX-License-Identifier: MIT
 */
declare(strict_types=1);

namespace Paira\Shared\Internal\Iterable;

use IteratorAggregate;
use Traversable;

/**
 * A lazily-evaluated sequence of values.
 *
 * @template T
 * @extends IteratorAggregate<int, T>
 * @psalm-pure
 * @since 0.1
 */
interface Sequence extends IteratorAggregate
{
    /**
     * @return Traversable<int, T>
     */
    #[\Override]
    public function getIterator(): Traversable;
}
