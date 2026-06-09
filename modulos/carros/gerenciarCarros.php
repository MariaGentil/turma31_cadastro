<?php

function gerenciarCarros()
{

echo "1- Listar carro\n";
echo "2- Cadastrar carro\n";
echo "3- Excluir carro\n";
echo "0- Voltar ao menu\n";

$opções = readline("Escolha qual opção deseja:\n");

switch ($opções){
    case '1':
    echo "Listando carro...\n";  
    break;

    case '2':
    echo "Cadastrando carro...\n";  
    break;

    case '3':
    echo "Excluindo carro...\n";  
    break;

    case '0':
    echo "Voltando...\n";  
    break;
    
    default:
    echo "Entrada inválida!\n";
    break;
}
}