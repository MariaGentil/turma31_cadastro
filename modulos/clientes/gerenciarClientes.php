<?php

function gerenciarClientes()
{

echo "1- Listar cliente\n";
echo "2- Cadastrar cliente\n";
echo "3- Excluir cliente\n";
echo "0- Voltar ao menu\n";

$opções = readline("Escolha qual opção deseja:\n");

switch ($opções){
    case '1':
        echo "Listando cliente...\n";  
        listaClientes();
        break;

    case '2':
        echo "Cadastrando cliente...\n";  
        cadastraCliente();  
    break;

    case '3':
        echo "Excluindo cliente...\n";  
    break;

    case '0':
        echo "Voltando...\n";  
    break;
    
    default:
        echo "Entrada inválida!\n";
    break;
}
}

function cadastraCliente()
{
    $nome = readline('Escreva o nome do cliente: ');
    $email = readline('Escreva o email do cliente: ');

    $cliente =[
        'nome' => $nome,
        'email' => $email
    ];

    $jsonClientes = file_get_contents('./db/clientes.json');

    echo $jsonClientes; exit;
    $clientes = json_decode($jsonClientes, true);
    
    $clientes[] = $cliente;
    
    $json = json_encode($clientes, JSON_PRETTY_PRINT);
    file_put_contents('./db/clientes.json', $json);

    echo "Cliente registrado!\n";
}

function listaClientes()
{
    $jsonClientes= file_get_contents('./db/clientes.json');
    $clientes = json_decode($jsonClientes, true);
    echo "---------------------------\n";

    foreach ($clientes as $c){
        echo "Nome: " . $c['nome'] . " | Email: " . $c['email'] . "\n";
    }
    echo "---------------------------\n";
}




