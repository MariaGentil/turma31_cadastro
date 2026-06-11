<?php

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
    $nome = readline  ('Escreva o nome do cliente: ');
    $email = readline ('Escreva o email do cliente: ');

    $cliente =[
        'id' => str_split( uniqid(),4)[2],
        'nome' => $nome,
        'email' => $email
];
    $jsonClientes = file_get_contents('./db/clientes.json');
    $clientes = json_decode($jsonClientes, true);
    
    $clientes[] = $cliente;
    
    $json = json_encode($clientes, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    file_put_contents('./db/clientes.json', $json);

    echo "Cliente registrado!\n";
}

    function ListarClientes()
{
    $jsonClientes= file_get_contents('./db/clientes.json');
    $clientes = json_decode($jsonClientes, true);
    
    echo "---------------------------\n";

    foreach ($clientes as $c){
        echo "iD: " . $c['id'] . " | Nome: " . $c['nome'] . " | Email: " . $c['email'] . "\n";
    }
    echo "---------------------------\n";
}

    function ExcluirClientes()
{
    $jsonClientes = file_get_contents('./db/clientes.json');
    $clientes = json_decode($jsonClientes, true);

    $id = readline ("Digite o ID do cliente para ser excluído: ");
        
    $ex_clientes = [];
    $encontrado = false;

    foreach ($clientes as $i){
    if ($i['id'] != $id){
    $ex_clientes[] = $i;
}   
    else{
    $encontrado = true;
}
}
    if ($encontrado){
    $json = json_encode($ex_clientes, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    file_put_contents('./db/clientes.json', $json);

    echo  "Cliente excluído!\n";
}
    else{
    echo "Cliente não cadastrado!\n";
}
}