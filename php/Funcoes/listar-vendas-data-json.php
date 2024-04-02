<?php


include_once("../../conexao/conexao.php");
$conecta = Conectar();
$data_venda = $_POST['data_venda'];

$sql = "SELECT *
FROM vendas,cliente
WHERE vendas.data_venda = '$data_venda'
AND vendas.hora_venda BETWEEN '10:00:00' AND '23:59:59'
AND cliente.cod_cliente = vendas.cod_cliente";

$stm = $conecta->prepare($sql);
$stm->execute();
$retorno = $stm->fetchAll(PDO::FETCH_ASSOC);
$retornoJson = json_encode($retorno);
echo $retornoJson;
