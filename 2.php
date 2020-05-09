<?php
function balik($input)
{
    $panjang = count($input);
    for ($i = 0; $i < $panjang / 2; $i++) {

        $temp = $input[$i];
        $input[$i] = $input[$panjang - $i - 1];
        $input[$panjang - $i - 1] = $temp;
    }
    print_r($input);
}

$input = [19, 22, 3, 28, 26, 17, 18, 4, 28, 0];
balik($input);