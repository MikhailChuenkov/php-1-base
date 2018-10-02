<?php

function sum($a, $b)
{
    return $a + $b;
}
function subt($a, $b)
{
    return $a - $b;
}
function mult($a, $b)
{
    return $a * $b;
}
function divis($a, $b)
{
    if ($b != 0) {
        return $a / $b;
    } else {
        return "Делить на ноль нельзя";
    }
}

function mathOperation($arg1, $arg2, $operation)
{
    switch ($operation) {
        case "sum":
            return sum($arg1, $arg2);
        case "subt":
            return subt($arg1, $arg2);
        case "mult":
            return mult($arg1, $arg2);
        case "divis":
            return divis($arg1, $arg2);
    }
}

