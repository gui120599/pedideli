<?php

$cod_pedido = $_POST['cod_pedido'];

include_once("../../conexao/conexao.php");
$conecta = Conectar();

$sql = "SELECT produtos_pedido.cod_produto_pedido, produtos.cod_produto,  produtos.descricao_produto, produtos_pedido.quantidade_produto, produtos.preco_venda, produtos_pedido.valor_total_produto, produtos_pedido.observacao_produto_pedido
FROM produtos_pedido,produtos 
WHERE cod_pedido = $cod_pedido
AND status_produto_pedido = 'Inserido'
AND produtos.cod_produto = produtos_pedido.cod_produto";

$stm = $conecta->prepare($sql);
$stm->execute();
$retorno = $stm->fetchAll(PDO::FETCH_ASSOC);
$retornoJson = json_encode($retorno);
echo $retornoJson;
