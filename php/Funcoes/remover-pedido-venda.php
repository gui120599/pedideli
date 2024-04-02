<?php
include_once("../../conexao/conexao.php");

$cod_pedido = $_POST['cod_pedido'];
$cod_venda = $_POST['cod_venda'];
$status_pedido_venda = 'Removido';

$sql = "UPDATE pedidos_venda SET status_pedido_venda='$status_pedido_venda' WHERE cod_pedido = $cod_pedido AND cod_venda = $cod_venda";
$resultado_usuario = mysqli_query($conn, $sql);
//Verifica se ele realmente inseriu uma nova linha no banco de dados
if (mysqli_affected_rows($conn) > 0) {
    //echo '<p>Cargo inserido com sucesso!</p>';
} else {
    echo '<p>Erro ao abrir solicitação! </p>';
    echo $sql_formulario;
}
