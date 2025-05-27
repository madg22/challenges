<?php

function noIterate($strArr)
{
    $n = $strArr[0];
    $k = $strArr[1];

    // Contar los caracteres requeridos en K
    $charCountK = array_count_values(str_split($k));
    $required = count($charCountK);

    $left = 0;
    $right = 0;
    $formed = 0;
    $windowCounts = [];
    $minLen = PHP_INT_MAX;
    $minWindow = "";

    $nLength = strlen($n);

    while ($right < $nLength) {
        $char = $n[$right];
        if (isset($charCountK[$char])) {
            if (!isset($windowCounts[$char])) $windowCounts[$char] = 0;
            $windowCounts[$char]++;
            if ($windowCounts[$char] == $charCountK[$char]) {
                $formed++;
            }
        }

        while ($formed == $required && $left <= $right) {
            $windowLen = $right - $left + 1;
            if ($windowLen < $minLen) {
                $minLen = $windowLen;
                $minWindow = substr($n, $left, $windowLen);
            }

            $leftChar = $n[$left];
            if (isset($charCountK[$leftChar])) {
                $windowCounts[$leftChar]--;
                if ($windowCounts[$leftChar] < $charCountK[$leftChar]) {
                    $formed--;
                }
            }
            $left++;
        }

        $right++;
    }

    return $minWindow;
}

echo noIterate(["ahffaksfajeeubsne", "jefaa"]);

