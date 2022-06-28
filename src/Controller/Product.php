<?php
namespace APP\Controller;

require_once '../../vendor/autoload.php';

use APP\Model\Valido;
use APP\Utils\Redirect;
use APP\Utils\Valid;

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
if(!Valido::validNumber($barCode))
{
    array_push($erro, 'O código de barras não atende aos parametros estabelecidos!');
}

if($erro) //*Array não vázio igual a positivo
{
    Redirect::redirect(message: $erro,type:'error');
}else{
    Redirect::redirect(message: 'Produto cadastrado com sucesso');
}