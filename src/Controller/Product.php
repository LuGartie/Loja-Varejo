<?php
namespace APP\Controller;

require_once '../../vendor/autoload.php';

use APP\Model\Valido;
use APP\Utils\Redirect;
use APP\Model\Product;
use APP\Model\Provider;

if(empty($_POST)){
    Redirect::redirect(
        type: 'error',
        message:'Requisição invalida.'
    );
}

$productName = $_POST["name"];
$productQuantity = $_POST["quantity"];
$productCost = $_POST["cost"];
$productProvider = $_POST["provider"];
$barCode = $_POST["barCode"];

$erro = array();

if(!Valido::validname($productName))
{
    array_push($erro, 'O nome do produto deve conter ao menos 5 caracteres entre letras e números!');
}
if(!Valido::validNumber($productQuantity))
{
    array_push($erro,  'Deve haver ao menos 1 produto em estoque para ser validado!');
}
if(!Valido::validNumber($productCost))
{
    array_push($erro,  'O custo de aquisição deve ser superior a R$ 0.00!');
}
if(!Valido::validBarCode($barCode))
{
    array_push($erro, 'O código de barras não atende aos parametros estabelecidos!
    Ele deve iniciar com "789" para se adequar a norma brasileira e possuir 13 digitos.');
}

if($erro) //*Array não vázio igual a positivo
{
    Redirect::redirect(message: $erro,type:'error');
}else{
    $product = new Product(
        name: $productName,
        barCode: $barCode,
        fixedCost:0.5,
        cost: $productCost,
        tributes:0.75,
        quantity:$productQuantity,
        provider:new Provider(
            name: $name,
            cnpj: $cnpj,
            address:new Address(
                publicPlace: $publicPlace,
                streetNumber: $streetNumber,
                neighborhood: $neighborhood,
                city: $city,
                postalCode: $postalCode,
            ),
        ),
    );
    echo "<pre>";
    var_dump($product);
    echo "</pre>";
    exit;
    Redirect::redirect(message: 'Produto cadastrado com sucesso');
}
?>