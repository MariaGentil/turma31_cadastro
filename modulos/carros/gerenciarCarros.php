<?php

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

 function CadastrarCarros()
{
    $placa = readline    ('Digite a placa do carro: ');
    $modelo = readline ('Digite o modelo do carro: ');
    $marca = readline  ('Digite a marca do carro: ');

    $carro =[
        'Placa' => $placa,
        'Modelo' => $modelo,
        'Marca' => $marca
    ];

    $jsonCarros = file_get_contents('./db/carros.json');
    $carros = json_decode($jsonCarros, true);
    
    $carros[] = $carro;
    
    $json = json_encode ($carros, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    file_put_contents('./db/carros.json', $json);

    echo "Carro registrado!\n";
}
    
  function ListarCarros()
{
    $jsonCarros = file_get_contents('./db/carros.json');
    $carros = json_decode($jsonCarros, true);

    echo "---------------------------\n";
    
    foreach ($carros as $v){
    echo "Placa: " . $v['Placa'] . "| Modelo: " . $v['Modelo'] . " | Marca: " . $v['Marca'] . "\n";
}
    echo "---------------------------\n";
}
