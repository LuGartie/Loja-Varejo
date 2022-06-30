<?php
namespace APP\Controller;

require_once '../../vendor/autoload.php';

use APP\Model\Provider;
use APP\Utils\Redirect;
use APP\Model\Address;
use APP\Model\Valido;

if(empty($_POST)){
    Redirect::redirect(
        type: 'error',
        message:'Requisição invalida.'
    );
}

$Cnpj = $_POST["cnpj"];
$ProviderName = $_POST["name"];
$Address = $_POST["address"];

//*Validação a fazer
$erro = array();
if(!Valido::validname($name))
{
    array_push($erro, 'O nome do produto deve conter ao menos 5 caracteres entre letras e números!');
}
//*Validação a fazer

if($erro) //*Array não vázio igual a positivo
{
    Redirect::redirect(message: $erro,type:'error');
}else{
    $provider = new Provider(
        name: $name,
        cnpj: $cnpj,
        address:new Address() //*argumentos a escrever?
    );
    echo "<pre>";
    var_dump($provider);
    echo "</pre>";
    exit;
}

