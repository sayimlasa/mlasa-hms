<?php

use App\Models\Masters\Currency;

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

function can($permmision = ""): bool
{
    return \Illuminate\Support\Facades\Gate::allows('action', $permmision);
}

function remove_commas($v)
{
    return str_replace(',', '', $v);
}

// function getBaseCurrency()
// {
//     $basecurrency = Currency::query()->where('base', true)->first();
//     return $basecurrency;
// }

function mydebug($v)
{
    echo "<pre>";
    print_r($v);
    die();
}
