<?php

namespace Cable8mm\ArrayFlatten\Tests;

use PHPUnit\Framework\TestCase;

use function Cable8mm\ArrayFlatten\array_flatten;

final class ArrayFlattenTest extends TestCase
{
    public function test_flatten_1()
    {
        $in = [
            [null, ['' => null]],
            ['', ['' => '']],
            [0, ['' => 0]],
            [3.14, ['' => 3.14]],
            ['test', ['' => 'test']],
            [false, ['' => false]],
        ];

        $actual = array_flatten($in);

        $expected = [null, '', 0, 3.14, 'test', false];

        $this->assertEquals($expected, $actual);
    }

    public function test_flatten_2()
    {
        $in = [
            [null, '-', ':', [':' => null]],
            ['', '', '/', ['/' => '']],
            [0, '.', 'global', ['global' => 0]],
            [3.14, '', 'local', ['local' => 3.14]],
            ['test', 'sep', '', ['' => 'test']],
            [false, '', '_', ['_' => false]],
        ];

        $actual = array_flatten($in);

        $expected = [null, '-', ':', '', '/', 0, '.', 'global', 3.14, 'local', 'test', 'sep', false, '_'];

        $this->assertEquals($expected, $actual);
    }

    public function test_flatten_3()
    {
        $in = [
            [[], []],
            [[['a' => 1], ['b' => 2]], ['0.a' => 1, '1.b' => 2]],
            [[0], ['0' => 0]],
            [[1, 2], ['0' => 1, '1' => 2]],
            [
                [1, 2, [3, 4]],
                ['0' => 1, '1' => 2, '2.0' => 3, '2.1' => 4],
            ],
            [
                ['a' => 1, 2, 'b' => [3, 'c' => 4]],
                ['a' => 1, '0' => 2, 'b.0' => 3, 'b.c' => 4],
            ],
            [
                ['a' => 1, 'b' => 2, 'c' => ['d' => [3, 4], 'e' => ['f' => 5, 'g' => 6]]],
                ['a' => 1, 'b' => 2, 'c.d.0' => 3, 'c.d.1' => 4, 'c.e.f' => 5, 'c.e.g' => 6],
            ],
        ];

        $actual = array_flatten($in);

        $expected = [1, 2, 0, 3, 4, 5, 6];

        $this->assertEquals($expected, $actual);
    }

    public function test_flatten_4()
    {
        $in = [
            [null, '-', ':', [':' => null]],
            ['', '', '/', ['/' => '']],
            [0, '.', 'global', ['global' => 0]],
            [3.14, '', 'local', ['local' => 3.14]],
            ['test', 'sep', '', ['' => 'test']],
            [false, '', '_', ['_' => false]],
        ];

        $actual = array_flatten($in);

        $expected = [null, '-', ':', '', '/', 0, '.', 'global', 3.14, 'local', 'test', 'sep', false, '_'];

        $this->assertEquals($expected, $actual);
    }

    public function test_flatten_5()
    {
        $in = [1, [2, [3, [4, [5], 6], 7], 8], 9];

        $actual = array_flatten($in);

        $expected = [1, 2, 3, 4, 5, 6, 7, 8, 9];

        $this->assertEquals($expected, $actual);
    }
}
