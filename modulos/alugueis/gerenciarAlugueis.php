<?php

require_once __DIR__ . '/../../conexao.php';

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
    $pdo = conn();
    
    $nome_cliente = readline  ('Digite o nome do cliente: ');
    $marca = readline  ('Digite a marca do carro: ');
    $modelo = readline ('Digite o modelo do carro: ');
    $inicio_pagamento = readline  ('Digite a data de inicio do pagamento do carro alugado: ');
    $fim_pagamento = readline ("Digite o fim do pagamento do carro alugado: ");

    $aluguel =[

        'nome_cliente' => $nome_cliente,
        'marca' => $marca,
        'modelo' => $modelo,
        'inicio_pagamento' => $inicio_pagamento,
        'fim_pagamento' => $fim_pagamento
];
    $pdo->query("INSERT INTO alugueis (nome_cliente, marca, modelo, inicio_pagamento, fim_pagamento)
                 VALUES ('$nome_cliente', '$marca', '$modelo', '$inicio_pagamento', '$fim_pagamento')");
        
     echo "Carro alugado!" . "\n";
}

   function ListarAlugueis()
{
    $pdo = conn();
    
    $pdo->query("SELECT nome_cliente, marca, modelo, inicio_pagamento, fim_pagamento FROM alugueis");

     echo "-------------------------------------------------------------------------------------------------------------------\n";

    foreach ($pdo as $a){
     echo "Id: " . $a['id'] . "| Nome: " . $a['nome_cliente'] . "| Marca: " . $a['marca'] . "| Modelo:" . $a['modelo']. "| Início do pagamento: " . $a['inicio_pagamento'] . "| Fim do pagamento: " . $a['fim_pagamento'] . "\n";
}
     echo "--------------------------------------------------------------------------------------------------------------------\n";
}

   function ExcluirAlugueis()
{
   $pdo = conn();
 
    $id = readline ("Digite o id do carro: ");
     
    $fim = $pdo->query("DELETE FROM alugueis WHERE id = '$id'");

    if ($fim->rowCount() > 0){

     echo "Aluguel excluído!\n";
}
    else{

      echo "Aluguel não registrado!";
}
}