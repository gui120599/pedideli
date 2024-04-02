<?php
include_once("../../conexao/conexao.php");
$descricao_cargo = $_POST['descricao_cargo'];
$ativo = $_POST['ativo'];
$sql = "INSERT INTO cargo (descricao_cargo,ativo) VALUES ('$descricao_cargo',$ativo)";
		$resultado_usuario = mysqli_query($conn, $sql);
//Verifica se ele realmente inseriu uma nova linha no banco de dados
if (mysqli_affected_rows($conn) > 0) {
    echo '<p>Cargo inserido com sucesso!</p>';
} else {
    echo '<p>Erro ao abrir solicitação! </p>';echo $sql_formulario;
}