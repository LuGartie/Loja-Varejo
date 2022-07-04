<?php
namespace APP\Controller;

require_once '../../vendor/autoload.php';

use APP\Model\Valido;
use APP\Model\Provider;
use APP\Model\Product;
use APP\Model\Address;


use APP\Utils\Redirect;
if(empty($_POST)){
    Redirect::redirect(
        type: 'error',
        message:'Requisição invalida.'
    );
}

$name = $_POST["name"];
$cnpj = $_POST["cnpj"];
$publicPlace = $_POST["publicPlace"];
$streetNumber = $_POST["streetNumber"];
$neighborhood = $_POST["neighborhood"];
$city = $_POST["city"];
$postalCode = $_POST["postalCode"];

$erro = array();

if(!Valido::validName($name))
{
    array_push($erro, 'O nome do fornecedor deve conter ao menos 5 caracteres entre letras e números!');
}

if(!Valido::validCNPJ($cnpj))
{
    array_push($erro, 'O CNPJ deve possuir 13 números!');
}

if(!Valido::validName($publicPlace))
{
    array_push($erro, 'O nome da rua deve conter ao menos 5 caracteres entre letras e números!');
}

if(!Valido::validNumber($streetNumber))
{
    array_push($erro, 'O número da rua deve ser positivo!');
}

if(!Valido::validName($neighborhood))
{
    array_push($erro, 'O nome do bairro deve conter ao menos 5 caracteres entre letras e números!');
}

if(!Valido::validName($city))
{
    array_push($erro, 'O nome da cidade deve conter ao menos 5 caracteres entre letras e números!');
}

if(!Valido::validPostalCode($postalCode))
{
    array_push($erro, 'O código postal deve conter 8 dígitos!');
}

if($erro) //*Array não vázio igual a positivo
{
    Redirect::redirect(
        message: $erro,
        type:'warning'
    );
}else{
    $address= new Address(
            publicPlace: $publicPlace,
            streetNumber: $streetNumber,
            neighborhood: $neighborhood,
            city: $city,
            postalCode: $postalCode,
    );
    $provider = new Provider(
            name: $name,
            cnpj: $cnpj,
    );
    echo "<pre>";
    var_dump($provider);
    echo "</pre>";
    exit;
    Redirect::redirect(message: 'Produto cadastrado com sucesso');
}

