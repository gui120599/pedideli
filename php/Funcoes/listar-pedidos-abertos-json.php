<?php


include_once("../../conexao/conexao.php");
$conecta = Conectar();

$sql = "SELECT *
FROM pedidos, opcoes_entrega , cliente 
WHERE pedidos.status_pedido = 'Aberto' 
AND cliente.cod_cliente = pedidos.cod_cliente 
AND opcoes_entrega.cod_opcao_entrega = pedidos.cod_opcao_entrega ORDER BY cod_pedido DESC LIMIT 150";

$stm = $conecta->prepare($sql);
$stm->execute();
$retorno = $stm->fetchAll(PDO::FETCH_ASSOC);
$retornoJson = json_encode($retorno);
echo $retornoJson;
