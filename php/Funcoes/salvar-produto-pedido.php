<?php
include_once("../../conexao/conexao.php");

$cod_produto = $_POST['cod_produto'];
$cod_pedido = $_POST['cod_pedido'];
$quantidade_produto = $_POST['quantidade_produto'];
$valor_total_produto = $_POST['valor_total_produto'];
$observacao_produto = $_POST['observacao_produto'];
$status_produto_pedido = 'Inserido';

$sql = "INSERT INTO produtos_pedido(
    cod_produto,
    cod_pedido,
    quantidade_produto,
    valor_total_produto,
    observacao_produto_pedido,
    status_produto_pedido)
    VALUES(
        $cod_produto,
        $cod_pedido,
        '$quantidade_produto',
        '$valor_total_produto',
        '$observacao_produto',
        '$status_produto_pedido')";

$resultado_usuario = mysqli_query($conn, $sql);
//Verifica se ele realmente inseriu uma nova linha no banco de dados
if (mysqli_affected_rows($conn) > 0) {
    echo '<p>Produto inserido com sucesso!</p>';
} else {
    echo '<p>Erro ao abrir solicitação! </p>';
    echo $sql_formulario;
}
