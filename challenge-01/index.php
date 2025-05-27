<?php

function findPoint($strArr)
{
    $arr1 = array_map('trim', explode(',', $strArr[0]));
    $arr2 = array_map('trim', explode(',', $strArr[1]));

    $intersection = array_intersect($arr1, $arr2);

    if (empty($intersection)) {
        return "false";
    }
    return implode(',', $intersection);
}

echo findPoint(['1, 3, 4, 7, 13', '1, 2, 4, 13, 15']);

