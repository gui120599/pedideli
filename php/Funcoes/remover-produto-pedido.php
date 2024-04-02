<?php
include_once("../../conexao/conexao.php");

$cod_produto_pedido = $_POST['cod_produto_pedido'];
$cod_pedido = $_POST['cod_pedido'];
$status_produto_pedido = 'Removido';

$sql = "UPDATE produtos_pedido SET status_produto_pedido='$status_produto_pedido' WHERE cod_produto_pedido = $cod_produto_pedido AND cod_pedido = $cod_pedido";
$resultado_usuario = mysqli_query($conn, $sql);
//Verifica se ele realmente inseriu uma nova linha no banco de dados
if (mysqli_affected_rows($conn) > 0) {
    //echo '<p>Cargo inserido com sucesso!</p>';
} else {
    echo '<p>Erro ao abrir solicitação! </p>';
    echo $sql_formulario;
}
