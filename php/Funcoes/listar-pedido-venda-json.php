<?php

$cod_venda = $_POST['cod_venda'];

include_once("../../conexao/conexao.php");
$conecta = Conectar();

$sql = "SELECT *, pedidos_venda.cod_pedido, pedidos_venda.valor_total_pedido, opcoes_entrega.descricao_opcao_entrega, cliente.nome_cliente
FROM pedidos_venda,opcoes_entrega,cliente, pedidos
WHERE cod_venda = $cod_venda
AND pedidos_venda.status_pedido_venda = 'Inserido'
AND pedidos.cod_pedido = pedidos_venda.cod_pedido
AND opcoes_entrega.cod_opcao_entrega = pedidos.cod_opcao_entrega
AND  cliente.cod_cliente = pedidos.cod_cliente";

$stm = $conecta->prepare($sql);
$stm->execute();
$retorno = $stm->fetchAll(PDO::FETCH_ASSOC);
$retornoJson = json_encode($retorno);
echo $retornoJson;
