<?php

declare(strict_types=1);

namespace Paira\Tests\Shared\Internal\Logic;

use Paira\Shared\Internal\Logic\IsAlphanumeric;
use Paira\Shared\Internal\Text\TextOf;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

final class IsAlphanumericTest extends TestCase
{
    #[Test]
    public function returnsTrueWhenTextIsAlphanumeric(): void
    {
        $this->assertTrue(
            new IsAlphanumeric(new TextOf('abc123XYZ'))->value(),
            'Expected true for alphanumeric string "abc123XYZ"'
        );
    }

    #[Test]
    #[DataProvider('nonAlphanumericStrings')]
    public function returnsFalseWhenTextIsNotAlphanumeric(string $input): void
    {
        $this->assertFalse(
            new IsAlphanumeric(new TextOf($input))->value(),
            'Expected false for non-alphanumeric string: "' . $input . '"'
        );
    }

    public static function nonAlphanumericStrings(): array
    {
        return [
            'contains symbols' => ['abc-123!'],
            'leading whitespace' => [' abc123'],
            'trailing whitespace' => ['abc123 '],
            'contains newline' => ["abc123\n"],
            'contains tab' => ["\tabc123"],
            'contains punctuation' => ['abc.123'],
        ];
    }
}
