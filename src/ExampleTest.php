<?php

declare(strict_types=1);

namespace Paira;

use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

/**
 * @codeCoverageIgnore
 */
final class ExampleTest extends TestCase
{
    #[Test]
    public function itAlwaysReturnsTrue(): void
    {
        $example = new Example();
        $this->assertTrue($example->alwaysTrue());
    }
}
