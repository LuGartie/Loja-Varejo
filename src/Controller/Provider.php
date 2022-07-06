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

use APP\Utils\Redirect;

$providerName = $_POST["name"];
$providerCnpj = $_POST["cnpj"];
$providerPublicPlace = $_POST["publicPlace"];
$providerStreetNumber = $_POST["streetNumber"];
$providerNeighborhood = $_POST["neighborhood"];
$providerCity = $_POST["city"];
$providerPostalCode = $_POST["postalCode"];

$erro = array();

if(!Valido::validName($providerName))
{
    array_push($erro, 'O nome do fornecedor deve conter ao menos 5 caracteres entre letras e números!');
}

if(!Valido::validCNPJ($providerCnpj))
{
    array_push($erro, 'O CNPJ deve possuir 13 números!');
}

if(!Valido::validName($providerPublicPlace))
{
    array_push($erro, 'O nome da rua deve conter ao menos 5 caracteres entre letras e números!');
}

if(!Valido::validNumber($providerStreetNumber))
{
    array_push($erro, 'O número da rua deve ser positivo!');
}

if(!Valido::validName($providerNeighborhood))
{
    array_push($erro, 'O nome do bairro deve conter ao menos 5 caracteres entre letras e números!');
}

if(!Valido::validName($providerCity))
{
    array_push($erro, 'O nome da cidade deve conter ao menos 5 caracteres entre letras e números!');
}

if(!Valido::validPostalCode($providerPostalCode))
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
        publicPlace: $providerPublicPlace,
        streetNumber: $providerStreetNumber,
        neighborhood: $providerNeighborhood,
        city: $providerCity,
        postalCode: $providerPostalCode,
    );
    $provider = new Provider(
        name: $providerName,
        cnpj: $providerCnpj,
        address: $address,
    );
    
    Redirect::redirect(message: 'Fornecedor cadastrado com sucesso');
}

