<?php
/*
 * SPDX-FileCopyrightText: Copyright (c) 2025 Kanstantsin Mesnik
 * SPDX-License-Identifier: MIT
 */
declare(strict_types=1);

namespace Paira\Tests\Shared\Internal\Text;

use Paira\Exception;
use Paira\Shared\Internal\Text\Email;
use Paira\Shared\Internal\Text\TextOf;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

final class EmailTest extends TestCase
{
    #[Test]
    public function validEmailIsAccepted(): void
    {
        $this->assertSame(
            'user@example.com',
            new Email(new TextOf('user@example.com'))->value()
        );
    }

    #[Test]
    public function invalidEmailThrowsException(): void
    {
        $this->expectException(Exception::class);
        new Email(new TextOf('not-an-email'));
    }
}
