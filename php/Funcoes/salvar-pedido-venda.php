<?php
include_once("../../conexao/conexao.php");

$cod_venda = $_POST['cod_venda'];
$cod_pedido = $_POST['cod_pedido'];
$valor_total_pedido = $_POST['valor_total_pedido'];
$status_pedido_venda = 'Inserido';

$sql = "INSERT INTO pedidos_venda(
    cod_venda,
    cod_pedido,
    valor_total_pedido,
    status_pedido_venda)
    VALUES(
        $cod_venda,
        $cod_pedido,
        '$valor_total_pedido',
        '$status_pedido_venda')";

$resultado_usuario = mysqli_query($conn, $sql);
//Verifica se ele realmente inseriu uma nova linha no banco de dados
if (mysqli_affected_rows($conn) > 0) {
    echo '<p>Pedido inserido com sucesso!</p>';
} else {
    echo '<p>Erro ao abrir solicitação! </p>';
    echo $sql_formulario;
}
