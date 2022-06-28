<?php

namespace APP\Model;

class Valido
{
    public static function validName(string $name):bool
    {
        return mb_strlen($name) > 4;
    }

    public static function validNumber(int|float $value)
    {
        return $value > 0;
    }

    public static function validBarCode(string $barCode):bool
    {
        return mb_strlen($barCode) == 13 && mb_substr($barCode, 0, 3) == '789';
    }
}