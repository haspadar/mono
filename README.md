# 🧱 Brick

[![PHP Version](https://img.shields.io/badge/PHP-8.4-blue)](https://www.php.net/releases/8.4/)
[![Code Style](https://img.shields.io/badge/Code%20Style-PSR--12-blue)](https://github.com/FriendsOfPHP/PHP-CS-Fixer)
[![CI](https://github.com/haspadar/brick/actions/workflows/ci.yml/badge.svg)](https://github.com/haspadar/brick/actions/workflows/ci.yml)
[![PHP Metrics](https://img.shields.io/badge/Metrics-phpmetrics%203.0-blue)](https://phpmetrics.org/)

[![Tests](https://img.shields.io/badge/Tests-Passing-brightgreen)](https://github.com/haspadar/brick/actions/workflows/ci.yml)
[![Coverage](https://codecov.io/gh/haspadar/brick/branch/main/graph/badge.svg)](https://codecov.io/gh/haspadar/brick)
[![PHPStan Level](https://img.shields.io/badge/PHPStan-Level%209-brightgreen)](https://phpstan.org/)
[![Psalm](https://img.shields.io/badge/psalm-level%208-brightgreen)](https://psalm.dev)
[![Psalm Type Coverage](https://shepherd.dev/github/haspadar/brick/coverage.svg)](https://shepherd.dev/github/haspadar/brick)
[![Mutation MSI](https://img.shields.io/badge/Mutation%20MSI-100%25-brightgreen)](https://infection.github.io/)

---

## 📦 About

**Brick** is a library of immutable value objects that wrap primitive types like `string`, `int`, `bool`, and `array`.

Instead of passing around loose values, you use small, self-contained wrappers like:

- `NonBlank`, `Trimmed`, `TruncatedRight` (strings)
- `Yes`, `IsEmail`, `ThrowsIf` (logic)
- `Mapped`, `SequenceOf` (collections)

Each class encapsulates one behavior and can be composed with others to form robust, intention-revealing objects.

---

## 🧠 Philosophy

- ❌ No `null`, `static`, `if`, `foreach`, or shared state
- ✅ One object = one responsibility
- ✅ Final classes, immutability by default
- ✅ Composition over inheritance
- ✅ Behavior and data live together

Inspired by [Elegant Objects](https://www.yegor256.com/elegant-objects.html) and [cactoos](https://github.com/yegor256/cactoos).

---

## ✨ Example

```php
use Brick\Text\NonBlank;
use Brick\Text\TruncatedRight;
use Brick\Text\Trimmed;

$text = new NonBlank(
    new TruncatedRight(
        new Trimmed("  Hello, world!  "),
        5
    )
);

echo $text->toString(); // "Hello"
```

Each wrapper adds one behavior:

- `Trimmed` removes whitespace
- `TruncatedRight` shortens the string
- `NonBlank` ensures the result is not empty

All wrappers implement the same interface and can be freely composed.

---

## 🧱 Modules

- **Text** — `Trimmed`, `Uppercased`, `TruncatedRight`, `HtmlSanitized`, `LengthOf`, `Preview`, `TextOf`, `NonBlank`
- **Logic** — `Yes`, `No`, `ThrowsIf`, `IsEmpty`, `IsEmail`, `IsUuid`, `LogicEnvelope`
- **Iterable** — `Sequence`, `SequenceOf`, `Mapped`, `Filtered`
- **Number** — *(coming soon)* `Positive`, `NonZero`, `Rounded`, etc.

---

## 🧪 Quality & CI

Every push and pull request is checked via GitHub Actions:

- ✅ Static analysis with [PHPStan](https://phpstan.org/) (level 9) and [Psalm](https://psalm.dev/) (level 8)
- ✅ Type coverage report via [Shepherd](https://shepherd.dev/)
- ✅ Code style check with [PHP-CS-Fixer](https://github.com/FriendsOfPHP/PHP-CS-Fixer) (only changed files)
- ✅ Unit tests with [PHPUnit](https://phpunit.de)
- ✅ Code coverage via [Codecov](https://codecov.io/)
- ✅ Mutation testing with [Infection](https://infection.github.io)
- ✅ Composer validation, platform checks, security audit
- ✅ Automatic refactoring via [Rector](https://github.com/rectorphp/rector)

---

## 📥 Installation

```bash
composer require haspadar/brick
```

Requires PHP 8.4 or higher.

---

## 📄 License

[MIT](LICENSE)
