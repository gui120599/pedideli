<?php
$cod_cliente = !empty($_POST['cod_cliente']) ? $_POST['cod_cliente'] : null;
$nome_cliente = !empty($_POST['nome_cliente']) ? $_POST['nome_cliente'] : "";
$data_nascimento_input = $_POST['data_nascimento'];
if(!empty($data_nascimento_input)){
    if($data_nascimento_input == '0000-00-00'){
        $data_nascimento = '2000-01-01';
    }else{
        $data_nascimento = date('Y-m-d', strtotime($data_nascimento_input));
    }
}else{
    $data_nascimento = '2000-01-01';
}

$sexo_cliente = !empty($_POST['sexo_cliente']) ? $_POST['sexo_cliente'] : "";
$cpf_cliente = !empty($_POST['cpf_cliente']) ? $_POST['cpf_cliente'] : "";
$rg_cliente = !empty($_POST['rg_cliente']) ? $_POST['rg_cliente'] : "";
$celular_cliente = !empty($_POST['celular_cliente']) ? $_POST['celular_cliente'] : "";
$whatsapp_cliente = isset($_POST['whatsapp_cliente']) ? $_POST['whatsapp_cliente'] : "Não";
$email_cliente = !empty($_POST['email_cliente']) ? $_POST['email_cliente'] : "";
$cliente_mesa = isset($_POST['cliente_mesa']) ? $_POST['cliente_mesa'] : "Não";
$cep_cliente = !empty($_POST['cep_cliente']) ? $_POST['cep_cliente'] : "";
$uf_cliente = !empty($_POST['uf_cliente']) ? $_POST['uf_cliente'] : "";
$cidade_cliente = !empty($_POST['cidade_cliente']) ? $_POST['cidade_cliente'] : "";
$rua_cliente = !empty($_POST['rua_cliente']) ? $_POST['rua_cliente'] : "";
$complemento_cliente = !empty($_POST['complemento_cliente']) ? $_POST['complemento_cliente'] : "";
$num_ende_cliente = !empty($_POST['num_ende_cliente']) ? $_POST['num_ende_cliente'] : "0";

$sql = "INSERT INTO cliente(
    nome_cliente,
    data_nascimento,
    sexo_cliente,
    cpf_cliente,
    rg_cliente,
    celular_cliente,
    whatsapp_cliente,
    email_cliente,
    cliente_mesa,
    cep_cliente,
    uf_cliente,
    cidade_cliente,
    rua_cliente,
    complemento_cliente,
    num_ende_cliente)VALUES(
        '$nome_cliente',
        '$data_nascimento',
        '$sexo_cliente',
        '$cpf_cliente',
        '$rg_cliente',
        '$celular_cliente',
        '$whatsapp_cliente',
        '$email_cliente',
        '$cliente_mesa',
        '$cep_cliente',
        '$uf_cliente',
        '$cidade_cliente',
        '$rua_cliente',
        '$complemento_cliente',
        '$num_ende_cliente'
    )";


$sql_update = "UPDATE cliente SET 
    nome_cliente = '$nome_cliente',
    data_nascimento = '$data_nascimento',
    sexo_cliente = '$sexo_cliente',
    cpf_cliente = '$cpf_cliente',
    rg_cliente = '$rg_cliente',
    celular_cliente = '$celular_cliente',
    whatsapp_cliente = '$whatsapp_cliente',
    email_cliente = '$email_cliente',
    cliente_mesa = '$cliente_mesa',
    cep_cliente = '$cep_cliente',
    uf_cliente = '$uf_cliente',
    cidade_cliente = '$cidade_cliente',
    rua_cliente = '$rua_cliente',
    complemento_cliente = '$complemento_cliente',
    num_ende_cliente = '$num_ende_cliente'
WHERE cod_cliente = $cod_cliente";

include_once("../../conexao/conexao.php");
if ($cod_cliente == null || $cod_cliente == "") {
    $resultado_usuario = mysqli_query($conn, $sql);
    //Verifica se ele realmente inseriu uma nova linha no banco de dados
    if (mysqli_affected_rows($conn) > 0) {
        echo '<p>Cliente inserido com sucesso!</p>';
    } else {
        echo '<p>Erro ao abrir solicitação! </p>';
        echo $sql;
    }
} else {
    $resultado_usuario = mysqli_query($conn, $sql_update);
    // Verifica se a consulta foi executada com sucesso
    if ($resultado_usuario) {
        echo '<p>Cliente atualizado com sucesso!</p>';
    } else {
        echo '<p>Erro ao atualizar cliente!</p>';
        echo $sql_update;
    }
}