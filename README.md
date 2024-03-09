# Array Flatten

[![code-style](https://github.com/cable8mm/array-flatten/actions/workflows/code-style.yml/badge.svg)](https://github.com/cable8mm/array-flatten/actions/workflows/code-style.yml)
[![run-tests](https://github.com/cable8mm/array-flatten/actions/workflows/run-tests.yml/badge.svg)](https://github.com/cable8mm/array-flatten/actions/workflows/run-tests.yml)
![Packagist Version](https://img.shields.io/packagist/v/cable8mm/array-flatten)
![Packagist Downloads](https://img.shields.io/packagist/dt/cable8mm/array-flatten)
![Packagist Dependency Version](https://img.shields.io/packagist/dependency-v/cable8mm/array-flatten/php)
![Packagist Stars](https://img.shields.io/packagist/stars/cable8mm/array-flatten)
![Packagist License](https://img.shields.io/packagist/l/cable8mm/array-flatten)

Flatten nested arrays.

We have provided the API Documentation on the web. For more information, please visit https://www.palgle.com/array-flatten/ ❤️

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
