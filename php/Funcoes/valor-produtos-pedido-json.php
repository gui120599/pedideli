<?php

$cod_pedido = $_POST['cod_pedido'];

include_once("../../conexao/conexao.php");
$conecta = Conectar();
$sql = "SELECT SUM(valor_total_produto) AS valor_total_produtos 
FROM `produtos_pedido` 
WHERE cod_pedido = $cod_pedido 
AND status_produto_pedido='Inserido' ";

$stm = $conecta->prepare($sql);
$stm->execute();
$retorno = $stm->fetchAll(PDO::FETCH_ASSOC);
$retornoJson = json_encode($retorno);
echo $retornoJson;
