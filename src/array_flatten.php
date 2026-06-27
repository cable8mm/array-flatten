<?php

namespace Cable8mm\ArrayFlatten;

/**
 * Flatten nested arrays and keep the first occurrence of each scalar value.
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

    flatten_array($array, $return);

    return $return;
}

/**
 * Recursively flatten an array while preserving the first occurrence order.
 *
 * @param  array  $array  The array to flatten.
 * @param  array<int, mixed>  $return  The flattened output.
 *
 * @return void
 */
function flatten_array(array $array, array &$return): void
{
    foreach ($array as $value) {
        if (is_array($value)) {
            flatten_array($value, $return);

            continue;
        }

        if (! in_array($value, $return, true)) {
            $return[] = $value;
        }
    }
}
