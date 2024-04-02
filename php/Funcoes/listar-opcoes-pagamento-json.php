<?php

$cod_opcao_pagamento = $_POST['cod_opcao_pagamento'];

include_once("../../conexao/conexao.php");
$conecta = Conectar();
$sql = "SELECT * FROM opcoes_pagamento";
$sql_where = "SELECT * FROM opcoes_pagamento WHERE cod_opcao_pagamento = $cod_opcao_pagamento ";
if (empty($cod_opcao_entrega)) {
    $stm = $conecta->prepare($sql);
    $stm->execute();
} else {
    $stm = $conecta->prepare($sql_where);
    $stm->execute();
}
$retorno = $stm->fetchAll(PDO::FETCH_ASSOC);
$retornoJson = json_encode($retorno);
echo $retornoJson;
