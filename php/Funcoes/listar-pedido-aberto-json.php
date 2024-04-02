<?php
$cod_pedido = $_POST['cod_pedido'];

include_once("../../conexao/conexao.php");
$conecta = Conectar();

$sql = "SELECT *, SUM(ppd.quantidade_produto) AS qtd_total_produtos 
FROM pedidos pd 
JOIN opcoes_entrega oe ON oe.cod_opcao_entrega = pd.cod_opcao_entrega 
JOIN cliente c ON c.cod_cliente = pd.cod_cliente 
JOIN produtos_pedido ppd ON ppd.cod_pedido = pd.cod_pedido 
JOIN usuarios u ON u.cod_usuario = pd.cod_usuario 
WHERE pd.status_pedido = 'Aberto' 
AND ppd.status_produto_pedido = 'Inserido' 
AND pd.cod_pedido = $cod_pedido 
ORDER BY pd.cod_pedido ASC;";

$stm = $conecta->prepare($sql);
$stm->execute();
$retorno = $stm->fetchAll(PDO::FETCH_ASSOC);
$retornoJson = json_encode($retorno);
echo $retornoJson;
