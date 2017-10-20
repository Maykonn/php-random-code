<?php
$codesQdy = 10000;
$codeSize = 16;
$showBlocks = true;
$blockSize = 4;
$chars = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ";

for($i = 0; $i < $codesQdy; $i++) {
    $code = '';
    $charsSize = strlen($chars) - 1;

    $h = str_pad(dechex($i), $codeSize / 2, 0, STR_PAD_LEFT);
    for($j = 0; $j < $codeSize; $j++) {
        $fm = ($j % $blockSize) == 0;
        if($showBlocks === true) {
            if($j > 0 && $fm) {
                $code .= '-';
            }
        }

        $tm = $j / 2;
        if($fm) {
            $code .= ($h[$tm] != '0' ? $h[$tm] : $chars[mt_rand($codeSize, $charsSize)]);
        } elseif(($j - ($blockSize - 1)) % $blockSize == 0) {
            $key = (int) floor($tm);
            $code .= ($h[$key] != '0' ? $h[$key] : $chars[mt_rand($codeSize, $charsSize)]);
        } else {
            $code .= $chars[mt_rand(0, $charsSize)];
        }
    }

    echo strtoupper($code) . "<br>";
}
