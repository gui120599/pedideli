<?php

$descricao_produto = $_POST['descricao_produto'];

include_once("../../conexao/conexao.php");
$conecta = Conectar();
$sql = "SELECT * FROM produtos WHERE descricao_produto LIKE '%$descricao_produto%' ORDER BY descricao_produto ASC";
$stm = $conecta->prepare($sql);
$stm->execute();
$retorno = $stm->fetchAll(PDO::FETCH_ASSOC);
$retornoJson = json_encode($retorno);
echo $sql;
