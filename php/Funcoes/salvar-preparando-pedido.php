<?php
include_once("../../conexao/conexao.php");
$cod_pedido = $_POST['cod_pedido'];

$sql = "UPDATE pedidos 
SET status_pedido = 'Preparando'
WHERE cod_pedido = $cod_pedido";

$resultado_usuario = mysqli_query($conn, $sql);
//Verifica se ele realmente inseriu uma nova linha no banco de dados
if (mysqli_affected_rows($conn) > 0) {
    echo 'Pedido atualizado com sucesso!';
} else {
    echo 'Erro ao abrir solicitação!';
    echo $sql_formulario;
}
