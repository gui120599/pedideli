<?php
include_once("../../conexao/conexao.php");

date_default_timezone_set('America/Sao_Paulo');


$cod_pedido = $_POST['cod_pedido'];
$cod_cliente = $_POST['cod_cliente'];
$cod_opcao_entrega = $_POST['cod_opcao_entrega'];
$descricao_endereco_entrega = $_POST['descricao_endereco_entrega'];
$descricao_pagamento = $_POST['descricao_pagamento'];
$observacao_pagamento = $_POST['observacao_pagamento'];
$valor_produtos = $_POST['valor_produtos'];
$valor_desconto = $_POST['valor_desconto'];
$valor_total = $_POST['valor_total'];
$status_pedido = 'Aberto';
$data_hora_abertura = date('Y-m-d H:i:s');
$cod_usuario = $_POST['cod_usuario'];

$sql = "UPDATE pedidos 
SET cod_cliente = '$cod_cliente',
cod_opcao_entrega = '$cod_opcao_entrega',
descricao_endereco_entrega = '$descricao_endereco_entrega',
descricao_pagamento = '$descricao_pagamento',
observacao_pagamento = '$observacao_pagamento',
valor_produtos = '$valor_produtos',
valor_desconto = '$valor_desconto',
valor_total = '$valor_total',
status_pedido = '$status_pedido',
data_hora_abertura = '$data_hora_abertura',
cod_usuario = '$cod_usuario'
WHERE cod_pedido = $cod_pedido";

$resultado_usuario = mysqli_query($conn, $sql);
//Verifica se ele realmente inseriu uma nova linha no banco de dados
if (mysqli_affected_rows($conn) > 0) {
    echo '<p>Pedido aberto com sucesso!</p>';
} else {
    echo '<p>Erro ao abrir solicitação! </p>';
    echo $sql_formulario;
}
