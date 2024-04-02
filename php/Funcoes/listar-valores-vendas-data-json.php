<?php


include_once("../../conexao/conexao.php");
$conecta = Conectar();
$data_venda = $_POST['data_venda'];

$sql = "SELECT SUM(vendas.valor_pagamento_dinheiro) AS dinheiro, 
SUM(vendas.valor_troco) AS troco, 
SUM(vendas.valor_pagamento_dinheiro - vendas.valor_troco) AS total_dinheiro,
SUM(vendas.valor_pagamento_pix) AS pix, 
SUM(vendas.valor_pagamento_cartao_debito) as cartao_debito, 
SUM(vendas.valor_pagamento_cartao_credito) as cartao_credito, 
SUM(vendas.valor_desconto) as desconto, 
SUM(vendas.valor_total_venda) as total_vendas, 
COUNT(pedidos_venda.cod_pedido) as qtd_pedidos, 
COUNT(vendas.cod_venda) as qtd_vendas
FROM vendas, pedidos_venda
WHERE data_venda = '$data_venda'
AND vendas.status_venda = 'Finalizada'
AND vendas.hora_venda BETWEEN '18:00:00' AND '23:59:59'
AND vendas.cod_venda = pedidos_venda.cod_venda";

$stm = $conecta->prepare($sql);
$stm->execute();
$retorno = $stm->fetchAll(PDO::FETCH_ASSOC);
$retornoJson = json_encode($retorno);
echo $retornoJson;
