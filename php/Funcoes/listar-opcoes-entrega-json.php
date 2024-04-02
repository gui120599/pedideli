<?php

$cod_opcao_entrega = $_POST['cod_opcao_entrega'];

include_once("../../conexao/conexao.php");
$conecta = Conectar();
$sql = "SELECT * FROM opcoes_entrega";
$sql_where = "SELECT * FROM opcoes_entrega WHERE cod_opcao_entrega = $cod_opcao_entrega ";
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
