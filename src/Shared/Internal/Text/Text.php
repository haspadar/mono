<?php

/*
 * SPDX-FileCopyrightText: Copyright (c) 2025 Kanstantsin Mesnik
 * SPDX-License-Identifier: MIT
 */
declare(strict_types=1);

namespace Paira\Shared\Internal\Text;

/**
 * Represents a string value.
 *
 * Used for composition and decoration of string-based logic.
 *
 */
interface Text
{
    /**
     * Returns the string value represented by this object.
     */
    public function value(): string;
}
