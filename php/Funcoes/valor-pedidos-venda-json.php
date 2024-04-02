<?php

$cod_venda = $_POST['cod_venda'];

include_once("../../conexao/conexao.php");
$conecta = Conectar();
$sql = "SELECT SUM(valor_total_pedido) AS valor_total_pedidos
FROM `pedidos_venda` 
WHERE cod_venda = $cod_venda 
AND status_pedido_venda='Inserido' ";

$stm = $conecta->prepare($sql);
$stm->execute();
$retorno = $stm->fetchAll(PDO::FETCH_ASSOC);
$retornoJson = json_encode($retorno);
echo $retornoJson;
