<?php
include_once("../../conexao/conexao.php");
$descricao_opcao_entrega = $_POST['descricao_opcao_entrega'];
$ativo = $_POST['ativo'];
$sql = "INSERT INTO opcoes_entrega (descricao_opcao_entrega,ativo) VALUES ('$descricao_opcao_entrega',$ativo)";
$resultado_usuario = mysqli_query($conn, $sql);
//Verifica se ele realmente inseriu uma nova linha no banco de dados
if (mysqli_affected_rows($conn) > 0) {
    echo '<p>Opção de Entrega inserida com sucesso!</p>';
} else {
    echo '<p>Erro ao abrir solicitação! </p>';
    echo $sql_formulario;
}
