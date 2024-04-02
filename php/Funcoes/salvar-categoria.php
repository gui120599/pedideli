<?php
include_once("../../conexao/conexao.php");
$descricao_categoria = $_POST['descricao_categoria'];
$ativo = $_POST['ativo'];
$sql = "INSERT INTO categoria_produtos (descricao_categoria,ativo) VALUES ('$descricao_categoria',$ativo)";
		$resultado_usuario = mysqli_query($conn, $sql);
//Verifica se ele realmente inseriu uma nova linha no banco de dados
if (mysqli_affected_rows($conn) > 0) {
    echo '<p>Categoria inserido com sucesso!</p>';
} else {
    echo '<p>Erro ao abrir solicitação! </p>';echo $sql_formulario;
}