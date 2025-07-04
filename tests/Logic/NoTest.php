<?php

/*
 * SPDX-FileCopyrightText: Copyright (c) 2025 Kanstantsin Mesnik
 * SPDX-License-Identifier: MIT
 */
declare(strict_types=1);

namespace Mono\Tests\Logic;

use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Mono\Logic\No;

final class NoTest extends TestCase
{
    #[Test]
    public function returnsFalseAlways(): void
    {
        $this->assertFalse(
            (new No())->value(),
            'Expected No to always return false'
        );
    }
}
