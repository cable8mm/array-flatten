# Array Flatten

[![Tests](https://github.com/cable8mm/array-flatten/actions/workflows/tests.yml/badge.svg)](https://github.com/cable8mm/array-flatten/actions/workflows/tests.yml)
[![PHP Linting (Pint)](https://github.com/cable8mm/array-flatten/actions/workflows/coding-style-php.yml/badge.svg)](https://github.com/cable8mm/array-flatten/actions/workflows/coding-style-php.yml)
[![Latest Stable Version](http://poser.pugx.org/cable8mm/array-flatten/v)](https://packagist.org/packages/cable8mm/array-flatten)
[![Total Downloads](http://poser.pugx.org/cable8mm/array-flatten/downloads)](https://packagist.org/packages/cable8mm/array-flatten)
[![release date](https://img.shields.io/github/release-date/cable8mm/array-flatten)](https://github.com/cable8mm/array-flatten/releases)
![GitHub License](https://img.shields.io/github/license/cable8mm/array-flatten)
[![PHP Version Require](http://poser.pugx.org/cable8mm/array-flatten/require/php)](https://packagist.org/packages/cable8mm/array-flatten)

> Flatten nested arrays.

## Installation

```sh
composer require cable8mm/array-flatten
```

## Usage

```php
use function Cable8mm\ArrayFlatten\array_flatten;

array_flatten([1, [2, [3, [4, [5], 6], 7], 8], 9]);
//=> [1, 2, 3, 4, 5, 6, 7, 8, 9]
```

## License

The Array Flatten is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT).
