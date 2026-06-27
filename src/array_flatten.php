<?php

namespace Cable8mm\ArrayFlatten;

/**
 * Flatten nested arrays and deduplicate scalar values by strict comparison.
 *
 * @param  array  $array  The nested arrays.
 * @return array The flattened array.
 *
 * @example array_flatten([1, [2, [3, [4, [5], 6], 7], 8], 9]);
 * //=> [1, 2, 3, 4, 5, 6, 7, 8, 9]
 */
function array_flatten(array $array): array
{
    $return = [];
    $seen = [];

    array_walk_recursive($array, function ($value) use (&$return, &$seen): void {
        if ($value === null) {
            $key = 'null';
        } elseif (is_bool($value)) {
            $key = $value ? 'bool:1' : 'bool:0';
        } elseif (is_int($value)) {
            $key = 'int:'.$value;
        } elseif (is_float($value)) {
            $key = 'float:'.sprintf('%.17F', $value);
        } else {
            $key = 'string:'.$value;
        }

        if (! array_key_exists($key, $seen)) {
            $seen[$key] = true;
            $return[] = $value;
        }
    });

    return $return;
}
