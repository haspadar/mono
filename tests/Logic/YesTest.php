<?php

/*
 * SPDX-FileCopyrightText: Copyright (c) 2025 Kanstantsin Mesnik
 * SPDX-License-Identifier: MIT
 */
declare(strict_types=1);

namespace Mono\Tests\Logic;

use Mono\Logic\Yes;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

final class YesTest extends TestCase
{
    #[Test]
    public function returnsTrueAlways(): void
    {
        $this->assertTrue(
            (new Yes())->value(),
            'Expected Yes to always return true'
        );
    }
}
