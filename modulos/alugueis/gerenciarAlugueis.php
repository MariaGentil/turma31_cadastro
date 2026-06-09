<?php

function gerenciarAlugueis()
{

echo "1- Listar aluguel\n";
echo "2- Cadastrar aluguel\n";
echo "3- Excluir aluguel\n";
echo "0- Voltar ao menu\n";

$opções = readline("Escolha qual opção deseja:\n");

switch ($opções){
    case '1':
    echo "Listando aluguel...\n";  
    break;

    case '2':
    echo "Cadastrando aluguel...\n";  
    break;

    case '3':
    echo "Excluindo aluguel...\n";  
    break;

    case '0':
    echo "Voltando...\n";  
    break;
    
    default:
    echo "Entrada inválida!\n";
    break;
}
}