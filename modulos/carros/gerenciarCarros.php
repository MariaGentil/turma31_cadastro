<?php

require_once __DIR__ . '/../../conexao.php';

function gerenciarCarros()
{

echo "1- Cadastrar carro\n";
echo "2- Listar carro\n";
echo "3- Excluir carro\n";
echo "0- Voltar ao menu\n";

$opções = readline("Escolha qual opção deseja: ");

switch ($opções){
    case '1':
        CadastrarCarros();
    break;

    case '2':
        ListarCarros();
    break;

    case '3':
        ExcluirCarros();
    break;

    case '0':
    echo "Voltando...\n";  
    break;
    
    default:
    echo "Entrada inválida!\n";
    break;
}
}

    function CadastrarCarros()
{
    $pdo = conn();
    $marca = readline  ('Digite a marca do carro: ');
    $modelo = readline ('Digite o modelo do carro: ');
    $placa = readline  ('Digite a placa do carro: ');
    
    $carro =[
        'Marca' => $marca,
        'Modelo' => $modelo,
        'Placa' => $placa
];
    $pdo->query("INSERT INTO carros (marca, modelo, placa)
                 VALUES ('$marca', '$modelo', '$placa')");

    echo "Carro registrado!\n";
}
    
    function ListarCarros()
{
    $pdo = conn();

    $pdo->query("SELECT * FROM carros ");

    echo "---------------------------\n";

    
    foreach ($pdo as $v){
    echo "Marca: " . $v['Marca'] . "| Modelo: " . $v['Modelo'] . " | Placa: " . $v['Placa'] . "\n";
}
    echo "---------------------------\n";
}

    function ExcluirCarros()
{
    $pdo = conn();

    $id = readline('Digite o id do carro para ser excluído: ');

   $resultado = $pdo->query("DELETE FROM carros WHERE id = '$id'");

   if($resultado->rowCount() >  0){
       
    echo "Carro excluído!\n";
}
   else{
    echo "Carro não excluído!\n";
}
}