<?php
include_once("../../conexao/conexao.php");
$conecta = Conectar();
$status_venda = 'Iniciada';
$sql = "INSERT INTO vendas (status_venda) VALUES ('$status_venda')";
$resultado_usuario = mysqli_query($conn, $sql);
//Verifica se ele realmente inseriu uma nova linha no banco de dados
if (mysqli_affected_rows($conn) > 0) {
    //Retorna com cod do pedido que acabou de inserir
    $sql_cod = "SELECT cod_venda FROM vendas ORDER BY cod_venda DESC LIMIT 1";
    $stm = $conecta->prepare($sql_cod);
    $stm->execute();
    $retorno = $stm->fetchAll(PDO::FETCH_ASSOC);
    $retornoJson = json_encode($retorno);
    echo $retornoJson;
} else {
    echo '<p>Erro ao abrir solicitação! </p>';
    echo $sql_formulario;
}