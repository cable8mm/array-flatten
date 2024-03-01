<?php

namespace Cable8mm\ArrayFlatten;

function array_flatten(array $array): array
{
    $return = [];

    array_walk_recursive($array, function ($a) use (&$return) {
        $return[] = $a;
    });

    return array_raw_unique($return);
}

function array_raw_unique(array $array)
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
