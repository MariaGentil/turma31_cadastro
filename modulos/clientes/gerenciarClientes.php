<?php

require_once __DIR__ . '/../../conexao.php';

function gerenciarClientes()
{

echo "1- Cadastrar cliente\n";
echo "2- Listar cliente\n";
echo "3- Excluir cliente\n";
echo "0- Voltar ao menu\n";

$opções = readline("Escolha qual opção deseja: ");

switch ($opções){
    case '1':  
        CadastrarClientes();
    break;

    case '2':
        ListarClientes();  
    break;

    case '3':
        ExcluirClientes();
    break;

    case '0':
        echo "Voltando...\n";  
    break;
    
    default:
        echo "Entrada inválida!\n";
    break;
}
}

    function CadastrarClientes()
{
    $pdo = conn();

    $nome = readline  ('Escreva o nome do cliente: ');
    $email = readline ('Escreva o email do cliente: ');
    
    $cliente =[
        'nome' => $nome,
        'email' => $email
];
    $pdo->query("INSERT INTO clientes (nome, email) 
    VALUES ('$nome', '$email')");

    echo "Cliente registrado!\n";
}

    function ListarClientes()
{
    $pdo = conn();

    $pdo->query("SELECT * FROM clientes");
    
    echo "---------------------------\n";

    foreach ($pdo as $p){
        echo "iD: " . $p['id'] . " | Nome: " . $p['nome'] . " | Email: " . $p['email'] . "\n";
}
    echo "---------------------------\n";
}

    function ExcluirClientes()
{
    $pdo = conn();

    $id = readline ("Digite o ID do cliente para ser excluído: ");
        
    $result = $pdo->query("DELETE FROM clientes WHERE id = '$id' ");

    if ($result->rowCount() > 0){
        echo  "Cliente excluído!\n";
}
    else{
    echo  "Cliente não excluído!\n";
}
}