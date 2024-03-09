<?php

namespace Cable8mm\ArrayFlatten;

/**
 * Flatten nested arrays.  * array_flatten([1, [2, [3, [4, [5], 6], 7], 8], 9]); //=> [1, 2, 3, 4, 5, 6, 7, 8, 9]
 *
 * @param  array  $array  The nested arrays
 * @return array The array to flatten
 *
 * @example array_flatten([1, [2, [3, [4, [5], 6], 7], 8], 9]);
 * //=> [1, 2, 3, 4, 5, 6, 7, 8, 9]
 */
function array_flatten(array $array): array
{
    $return = [];

    array_walk_recursive($array, function ($a) use (&$return) {
        $return[] = $a;
    });

    return array_raw_unique($return);
}

/**
 * Extend array_unique() to include null and space values. array_raw_unique([1, 2, 2, null, null, '', '', 9]); //=> [1, 2, null, '', '', 9]
 *
 * @param  array  $array  The array
 * @return array The unique array even if it contains null and space values
 *
 * @example array_raw_unique([1, 2, 2, null, null, '', '', 9]);
 * //=> [1, 2, null, '', '', 9]
 */
function array_raw_unique(array $array): array
{
    $out = [];

    $count = count($array);

    for ($i = 0; $i < $count; $i++) {
        $item = array_shift($array);

        if (count($out) === 0) {
            $out[] = $item;

            continue;
        }

        $isDuplicate = false;

        foreach ($out as $o) {
            if ($o === $item) {
                $isDuplicate = true;

                break;
            }
        }

        if (! $isDuplicate) {
            $out[] = $item;
        }
    }

    return $out;
}
