<?php

namespace APP\Model;

class Valido
{
    //*Product
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

    //*Provider
    public static function validCNPJ(string $cnpj):bool
    {
        return mb_strlen($cnpj) == 14;
    }

    //*Address
    public static function validStreetNumber(int $streetNumber)
    {
        return $streetNumber > 0;
    }
    public static function validPublicPlace(string $publicPlace):bool
    {
        return mb_strlen($publicPlace) > 4;
    }
    public static function validNeighborhood(string $neighborhood):bool
    {
        return mb_strlen($neighborhood) > 4;
    }
    public static function validCity(string $city):bool
    {
        return mb_strlen($city) > 4;
    }
    public static function validPostalCode(string $postalCode):bool
    {
        return mb_strlen($postalCode) == 4;
    }
}