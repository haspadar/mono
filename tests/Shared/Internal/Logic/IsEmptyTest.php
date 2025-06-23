<?php

declare(strict_types=1);

namespace Paira\Tests\Shared\Internal\Logic;

use Paira\Shared\Internal\Logic\IsEmpty;
use Paira\Shared\Internal\Text\TextOf;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

final class IsEmptyTest extends TestCase
{
    #[Test]
    public function returnsFalseWhenTextIsNonEmpty(): void
    {
        $this->assertFalse(
            new IsEmpty(new TextOf('hello'))->value(),
            'Expected false for non-empty string "hello"'
        );
    }

    #[Test]
    public function returnsFalseWhenTextContainsSpaces(): void
    {
        $this->assertFalse(
            new IsEmpty(new TextOf('  valid  '))->value(),
            'Expected false for string with surrounding spaces'
        );
    }

    #[Test]
    #[DataProvider('emptyTextVariants')]
    public function returnsTrueWhenTextIsEmpty(string $input): void
    {
        $this->assertTrue(
            new IsEmpty(new TextOf($input))->value(),
            'Expected true for empty-like string: "' . \addcslashes($input, "\t\n\r") . '"'
        );
    }

    public static function emptyTextVariants(): array
    {
        return [
            'empty string' => [''],
            'spaces only' => ['   '],
            'newline only' => ["\n"],
            'tab only' => ["\t"],
        ];
    }
}
