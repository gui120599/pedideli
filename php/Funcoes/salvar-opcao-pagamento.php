<?php
include_once("../../conexao/conexao.php");
$descricao_opcao_pagamento = $_POST['descricao_opcao_pagamento'];
$ativo = $_POST['ativo'];
$sql = "INSERT INTO opcoes_pagamento (descricao_opcao_pagamento,ativo) VALUES ('$descricao_opcao_pagamento',$ativo)";
$resultado_usuario = mysqli_query($conn, $sql);
//Verifica se ele realmente inseriu uma nova linha no banco de dados
if (mysqli_affected_rows($conn) > 0) {
    echo '<p>Opção de Pagamento inserida com sucesso!</p>';
} else {
    echo '<p>Erro ao abrir solicitação! </p>';
    echo $sql_formulario;
}
