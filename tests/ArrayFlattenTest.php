<?php

namespace Cable8mm\ArrayFlatten\Tests;

use PHPUnit\Framework\TestCase;

use function Cable8mm\ArrayFlatten\array_flatten;

final class ArrayFlattenTest extends TestCase
{
    public function test_flatten(): void
    {
        $cases = [
            'preserves scalar order' => [
                'input' => [1, [2, [3, [4, [5], 6], 7], 8], 9],
                'expected' => [1, 2, 3, 4, 5, 6, 7, 8, 9],
            ],
            'keeps the first occurrence only' => [
                'input' => [
                    1,
                    [1, 2],
                    ['nested' => [2, 3]],
                    [3, ['deep' => 1]],
                    4,
                ],
                'expected' => [1, 2, 3, 4],
            ],
            'flattens empty arrays' => [
                'input' => [[], []],
                'expected' => [],
            ],
            'flattens nested indexed arrays' => [
                'input' => [
                    [1, 2, [3, 4]],
                ],
                'expected' => [1, 2, 3, 4],
            ],
            'flattens nested associative arrays' => [
                'input' => [
                    [
                        'a' => 1,
                        'b' => 2,
                        'c' => [
                            'd' => [3, 4],
                            'e' => [
                                'f' => 5,
                                'g' => 6,
                            ],
                        ],
                    ],
                ],
                'expected' => [1, 2, 3, 4, 5, 6],
            ],
            'keeps scalar values and type fidelity' => [
                'input' => [
                    [null, ['' => null]],
                    ['', ['' => '']],
                    [0, ['' => 0]],
                    [3.14, ['' => 3.14]],
                    ['test', ['' => 'test']],
                    [false, ['' => false]],
                ],
                'expected' => [null, '', 0, 3.14, 'test', false],
            ],
            'preserves mixed nested values' => [
                'input' => [
                    [null, '-', ':', [':' => null]],
                    ['', '', '/', ['/' => '']],
                    [0, '.', 'global', ['global' => 0]],
                    [3.14, '', 'local', ['local' => 3.14]],
                    ['test', 'sep', '', ['' => 'test']],
                    [false, '', '_', ['_' => false]],
                ],
                'expected' => [null, '-', ':', '', '/', 0, '.', 'global', 3.14, 'local', 'test', 'sep', false, '_'],
            ],
        ];

        foreach ($cases as $label => $case) {
            $this->assertSame($case['expected'], array_flatten($case['input']), $label);
        }
    }
}
