<?php
include_once("../../conexao/conexao.php");

date_default_timezone_set('America/Sao_Paulo');
$data_hora_finalizacao = date('Y-m-d H:i:s');
$cod_venda = $_POST['cod_venda'];

$sql = "SELECT * FROM pedidos_venda where cod_venda=$cod_venda AND status_pedido_venda ='Inserido'";
$resultado = mysqli_query($conn, $sql);
$i = 0;
while ($row_resultado = mysqli_fetch_assoc($resultado)) {
    $cod_pedido = $row_resultado['cod_pedido'];
    $sql = "UPDATE pedidos 
SET status_pedido = 'Finalizado',
data_hora_finalizacao = '$data_hora_finalizacao'
WHERE cod_pedido = $cod_pedido";

    $resultado_usuario = mysqli_query($conn, $sql);
    //Verifica se ele realmente inseriu uma nova linha no banco de dados
    if (mysqli_affected_rows($conn) > 0) {
        echo "Pedido $cod_pedido finalizado com sucesso!";
    } else {
        echo 'Erro ao abrir solicitação!';
        echo $sql_formulario;
    }
}
