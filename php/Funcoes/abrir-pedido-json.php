<?php
include_once("../../conexao/conexao.php");
$conecta = Conectar();
date_default_timezone_set('America/Sao_Paulo');
$data_hora_abertura = date('Y-m-d H:i:s');
$status_pedido = 'Iniciado';
$sql = "INSERT INTO pedidos (data_hora_abertura,status_pedido) VALUES ('$data_hora_abertura','$status_pedido')";
$resultado_usuario = mysqli_query($conn, $sql);
//Verifica se ele realmente inseriu uma nova linha no banco de dados
if (mysqli_affected_rows($conn) > 0) {
    //Retorna com cod do pedido que acabou de inserir
    $sql_cod = "SELECT cod_pedido FROM pedidos ORDER BY cod_pedido DESC LIMIT 1";
    $stm = $conecta->prepare($sql_cod);
    $stm->execute();
    $retorno = $stm->fetchAll(PDO::FETCH_ASSOC);
    $retornoJson = json_encode($retorno);
    echo $retornoJson;
} else {
    echo '<p>Erro ao abrir solicitação! </p>';
    echo $sql_formulario;
}