<?php
include_once("../../conexao/conexao.php");

date_default_timezone_set('America/Sao_Paulo');
$data_hora_cancelamento = date('Y-m-d H:i:s');
$cod_pedido = $_POST['cod_pedido'];
$observacao_cancelamento = $_POST['observacao_cancelamento'];


$sql = "UPDATE pedidos 
SET status_pedido = 'Cancelado',
data_hora_cancelamento = '$data_hora_cancelamento',
observacao_cancelamento = '$observacao_cancelamento'
WHERE cod_pedido = $cod_pedido";

$resultado_usuario = mysqli_query($conn, $sql);
//Verifica se ele realmente inseriu uma nova linha no banco de dados
if (mysqli_affected_rows($conn) > 0) {
    echo 'Pedido Cancelado com sucesso!';
} else {
    echo 'Erro ao abrir solicitação!';
    echo $sql_formulario;
}
