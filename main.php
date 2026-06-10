<?php

include './modulos/clientes/gerenciarClientes.php';
include './modulos/carros/gerenciarCarros.php';
include './modulos/alugueis/gerenciarAlugueis.php';

echo "Bem vindo ao ALUCAR-D\n";

$clientes =[];
$carros = [];
$alugueis = [];

do{
"------------------\n";
echo "1- Clientes\n";
echo "2- Carros \n";
echo "3- Alugueis\n";
echo "0- SAIR\n";
"-----------------\n";

$entrada = readline("Escolha uma das opções:\n");

switch ($entrada){
    case '1':
    gerenciarClientes();
    break;

    case '2':
    gerenciarCarros();
    break;

    case '3':
    gerenciarAlugueis();
    break;

    case '0':
    echo "Saindo...\n";
    break;

    default:
    echo "Entrada inválida!\n";
}

} while ($entrada !='0');


