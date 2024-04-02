<?php

$cod_categoria = $_POST['cod_categoria'];

include_once("../../conexao/conexao.php");
$conecta = Conectar();
$sql = "SELECT * FROM categoria_produtos";
$sql_where = "SELECT * FROM categoria_produtos WHERE cod_categoria = $cod_categoria ";

if (empty($cod_categoria)) {
    $stm = $conecta->prepare($sql);
    $stm->execute();
}else{
    $stm = $conecta->prepare($sql_where);
    $stm->execute();
}
$retorno = $stm->fetchAll(PDO::FETCH_ASSOC);
$retornoJson = json_encode($retorno);
echo $retornoJson;
