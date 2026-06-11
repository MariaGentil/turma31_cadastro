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
    $endereço = readline ('Digite o endereço do aluguel: ');
    $fatura = readline  ('Digite a fatura do aluguel: ');
    $inicio = readline  ('Digite a data de inicio do pagamento do aluguel: ');
    $vencimento = readline  ('Digite o vencimento da fatura do aluguel: ');

    $aluguel =[
        'nome' => $nome,
        'endereço' => $endereço,
        'fatura' => $fatura,
        'vencimento' => $vencimento,
        'inicio' => $inicio
];
    $jsonAlugueis = file_get_contents('./db/alugueis.json');
    $alugueis = json_decode($jsonAlugueis, true);

    $alugueis[] = $aluguel;
    
    $json = json_encode ($aluguel, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    file_put_contents('./db/alugueis.json', $json);

    echo "Aluguel registrado!\n";
}

   function ListarAlugueis()
{
    $jsonAlugueis = file_get_contents('./db/alugueis.json');
    $alugueis = json_decode($jsonAlugueis, true);

    echo "---------------------------\n";

    foreach ($alugueis as $a){
    echo "Nome: " . $a['nome'] . "| Endereço: " . $a['endereço'] . "| Fatura: " . $a['fatura'] . "| Início do pagamento: " . $a['inicio'] . "| Vencimento: " . $a['vencimento'] . "\n";
}
    echo "---------------------------\n";
}

   function ExcluirAlugueis()
{
   $jsonAlugueis = file_get_contents('./db/alugueis.json');
    $alugueis = json_decode($jsonAlugueis, true);
 
    $endereço = readline ("Digite o endereço do imovél: ");
     
    $ex_alugueis = [];
    $cadastrado = false;

    foreach($alugueis as $a){
    if ($a['endereço'] != $endereço){
    $ex_alugueis[] = $a;
}
    else{
    $cadastrado = true;
}
}
    if ($cadastrado){

    $json= json_encode($ex_alugueis, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    file_put_contents('./db/alugueis.json',$json);

    "Aluguel excluído!\n";
}
    else{
    "Aluguel não registrado!";
}
}