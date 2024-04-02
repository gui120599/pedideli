<?php

$cod_cliente = $_POST['cod_cliente'];

include_once("../../conexao/conexao.php");
$conecta = Conectar();
$sql = "SELECT * FROM cliente";
$sql_where = "SELECT * FROM cliente WHERE cod_cliente = $cod_cliente ";

if (empty($cod_cliente)) {
    $stm = $conecta->prepare($sql);
    $stm->execute();
}else{
    $stm = $conecta->prepare($sql_where);
    $stm->execute();
}
$retorno = $stm->fetchAll(PDO::FETCH_ASSOC);
$retornoJson = json_encode($retorno);
echo $retornoJson;
