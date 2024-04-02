<?php

$cod_produto = $_POST['cod_produto'];

include_once("../../conexao/conexao.php");
$conecta = Conectar();
//$sql = "SELECT * FROM produtos";
$sql_where = "SELECT * FROM produtos WHERE cod_produto = $cod_produto AND ativo = 1 ORDER BY descricao_produto ASC";
$sql = "SELECT * FROM produtos,categoria_produtos WHERE produtos.cod_categoria = categoria_produtos.cod_categoria AND produtos.ativo = 1 ORDER BY descricao_produto ASC ";

if (empty($cod_produto)) {
    $stm = $conecta->prepare($sql);
    $stm->execute();
}else{
    $stm = $conecta->prepare($sql_where);
    $stm->execute();
}
$retorno = $stm->fetchAll(PDO::FETCH_ASSOC);
$retornoJson = json_encode($retorno);
echo $retornoJson;
