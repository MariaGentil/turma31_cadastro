<?php

function gerenciarAlugueis()
{

echo "1- Cadastrar aluguel\n";
echo "2- Listar aluguel\n";
echo "3- Excluir aluguel\n";
echo "0- Voltar ao menu\n";

$opções = readline("Escolha qual opção deseja:\n");

switch ($opções){
    case '1':
        CadastrarAlugueis();
    break;

    case '2':
        ListarAlugueis();
    break;

    case '3':
        ExcluirAlugueis();
    break;

    case '0':
    echo "Voltando...\n";  
    break;
    
    default:
    echo "Entrada inválida!\n";
    break;
}
}

    function CadastrarAlugueis()
{
    $nome = readline  ('Digite o nome do cliente: ');
    $placa = readline ('Digite a placa do carro: ');
    $marca = readline  ('Digite a marca do carro: ');
    $inicio = readline  ('Digite a data de inicio do pagamento do carro alugado: ');
    $fim = readline ("Digite o fim do pagamento do carro alugado: ");

    $aluguel =[

        'id' => str_split( uniqid(),4)[2],
        'nome' => $nome,
        'placa' => $placa,
        'marca' => $marca,
        'inicio' => $inicio,
        'fim' => $fim
];
    $jsonAlugueis = file_get_contents('./db/alugueis.json');
    $alugueis = json_decode($jsonAlugueis, true);

    $alugueis[] = $aluguel;
    
    $json = json_encode ($alugueis, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    file_put_contents('./db/alugueis.json', $json);
        
    echo "Carro alugado em nome de " .  $aluguel['nome'] . "!" . "  ". "Id: " . $aluguel['id'] . "\n";
}

   function ListarAlugueis()
{
    $jsonAlugueis = file_get_contents('./db/alugueis.json');
    $alugueis = json_decode($jsonAlugueis, true);

    echo "-------------------------------------------------------------------------------------------------------------------\n";

    foreach ($alugueis as $a){
    echo "Id: " . $a['id'] . "| Nome: " . $a['nome'] . "| Placa: " . $a['placa'] . "| Marca:" . $a['marca']. "| Início do pagamento: " . $a['inicio'] . "| Fim do pagamento: " . $a['fim'] . "\n";
}
    echo "--------------------------------------------------------------------------------------------------------------------\n";
}

   function ExcluirAlugueis()
{
   $jsonAlugueis = file_get_contents('./db/alugueis.json');
    $alugueis = json_decode($jsonAlugueis, true);
 
    $id = readline ("Digite o id do carro: ");
     
    $ex_alugueis = [];
    $cadastrado = false;

    foreach($alugueis as $a){
    if ($a['id'] != $id){
    $ex_alugueis[] = $a;
}
    else{
    $cadastrado = true;
}
}
    if ($cadastrado) {

    $json= json_encode($ex_alugueis, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    file_put_contents('./db/alugueis.json',$json);

    echo "Aluguel excluído!\n";
}
    else{
    echo "Aluguel não registrado!";
}
}