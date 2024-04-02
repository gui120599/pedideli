<?php
session_start();
include_once("../../conexao/conexao.php");

$nome_usuario = $_POST['nome_usuario'];
$sobrenome_usuario = $_POST['sobrenome_usuario'];
$email_usuario = $_POST['email_usuario'];
$login_usuario = $_POST['login_usuario'];
$senha_usuario = $_POST['senha_usuario'];
$senha_usuario = md5($senha_usuario);
$cod_cargo = $_POST['cod_cargo'];
$ativo = $_POST['ativo'];

$existe = 0;
$sql = "SELECT * FROM usuarios WHERE login_usuario = '$login_usuario'";
$resultado = mysqli_query($conn, $sql);
while ($row_resultado = mysqli_fetch_assoc($resultado)) {
    $existe = 1;
}
if ($existe == 0) {
    $sql = "INSERT INTO usuarios(nome_usuario,sobrenome_usuario,email_usuario,login_usuario,senha_usuario,cod_cargo,ativo) VALUES 
('$nome_usuario','$sobrenome_usuario','$email_usuario','$login_usuario','$senha_usuario',$cod_cargo,$ativo)";
    $resultado_usuario = mysqli_query($conn, $sql);

    //Verifica se ele realmente inseriu uma nova linha no banco de dados
    if (mysqli_affected_rows($conn) > 0) {
        echo '<p>Usuário inserido com sucesso! </p>';
    } else {
        echo '<p>Erro ao inserir usuário! </p>' . $sql;
    }
}else{
    echo '<p>Login: "' . $login_usuario . '" já existente!</p>';
}
