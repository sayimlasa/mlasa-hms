<?php
function formatNo($n, $dec = 2): string
{
    return number_format($n, $dec);
}

function fDate($d, $formart = "d M Y"): string
{
    return date($formart, strtotime($d));
}

function selected($v1 = "", $v2 = ""): string
{
    return $v1 == $v2 ? 'selected' : '';
}

