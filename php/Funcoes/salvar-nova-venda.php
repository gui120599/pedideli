<?php
include_once("../../conexao/conexao.php");

date_default_timezone_set('America/Sao_Paulo');


$cod_venda = $_POST['cod_venda'];
$cod_cliente = $_POST['cod_cliente'];
$descricao_pagamento = $_POST['descricao_pagamento'];
$valor_dinheiro = $_POST['valor_dinheiro'];
$valor_pix = $_POST['valor_pix'];
$valor_cartao_debito = $_POST['valor_cartao_debito'];
$valor_cartao_credito = $_POST['valor_cartao_credito'];
$valor_troco = $_POST['valor_troco'];
$valor_pedidos = $_POST['valor_pedidos'];
$valor_desconto = $_POST['valor_desconto'];
$valor_total = $_POST['valor_total'];
$status_venda = 'Finalizada';
$data_venda = date('Y-m-d');
$hora_venda = date('H:i:s');

$sql = "UPDATE vendas 
SET cod_cliente = '$cod_cliente',
descricao_pagamento = '$descricao_pagamento',
valor_pagamento_dinheiro = '$valor_dinheiro',
valor_pagamento_pix = '$valor_pix',
valor_pagamento_cartao_debito = '$valor_cartao_debito',
valor_pagamento_cartao_credito = '$valor_cartao_credito',
valor_troco = '$valor_troco',
valor_pedidos = '$valor_pedidos',
valor_desconto = '$valor_desconto',
valor_total_venda = '$valor_total',
status_venda = '$status_venda',
data_venda = '$data_venda',
hora_venda = '$hora_venda'
WHERE cod_venda = $cod_venda";

$resultado_usuario = mysqli_query($conn, $sql);
//Verifica se ele realmente inseriu uma nova linha no banco de dados
if (mysqli_affected_rows($conn) > 0) {
    echo '<p>Venda Finalizada com sucesso!</p>';
} else {
    echo '<p>Erro ao abrir solicitação! </p>';
    echo $sql_formulario;
}
