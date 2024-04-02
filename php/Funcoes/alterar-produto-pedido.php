<?php
include_once("../../conexao/conexao.php");

$cod_produto_pedido = $_POST['cod_produto_pedido'];
$quantidade_produto = $_POST['quantidade_produto'];
$valor_total_produto = $_POST['valor_total_produto'];
$observacao_produto = $_POST['observacao_produto'];

$sql = "UPDATE produtos_pedido 
SET quantidade_produto = '$quantidade_produto',
valor_total_produto = '$valor_total_produto', 
observacao_produto_pedido = '$observacao_produto' 
WHERE cod_produto_pedido = $cod_produto_pedido ";
$resultado_usuario = mysqli_query($conn, $sql);
//Verifica se ele realmente inseriu uma nova linha no banco de dados
if (mysqli_affected_rows($conn) > 0) {
    echo '<p>Produto alterado com sucesso!</p>';
} else {
    echo '<p>Erro ao abrir solicitação! </p>';
    echo $sql_formulario;
}