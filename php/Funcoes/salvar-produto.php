<?php
include_once("../../conexao/conexao.php");

// Certifique-se de que as variáveis estão definidas e não são nulas
$cod_produto = !empty($_POST['cod_produto']) ? $_POST['cod_produto'] : null;
$descricao_produto = !empty($_POST['descricao_produto']) ? $_POST['descricao_produto'] : "Não informado";
$preco_custo = !empty($_POST['preco_custo_produto']) ? $_POST['preco_custo_produto'] : "0.00";
$preco_venda = !empty($_POST['preco_venda_produto']) ? $_POST['preco_venda_produto'] : "0.00";
$cod_categoria = !empty($_POST['categoria']) ? $_POST['categoria'] : 1;
$ativo = !empty($_POST['ativo']) ? $_POST['ativo'] : 0;

// Use declarações preparadas ou sanitize as variáveis
$descricao_produto = mysqli_real_escape_string($conn, $descricao_produto);

// Consulta SQL para inserir um novo produto
$sql = "INSERT INTO produtos (
    descricao_produto,
    preco_custo,
    preco_venda,
    cod_categoria,
    ativo) 
VALUES ('$descricao_produto',
'$preco_custo',
'$preco_venda',
$cod_categoria,
$ativo)";

// Consulta SQL para atualizar um produto existente
$sql_update = "UPDATE produtos SET 
    descricao_produto = '$descricao_produto',
    preco_custo = '$preco_custo',
    preco_venda = '$preco_venda',
    cod_categoria = $cod_categoria,
    ativo = $ativo 
    WHERE cod_produto = $cod_produto";

// Verifica se é uma inserção ou atualização
if ($cod_produto === null || $cod_produto === "") {
    // Se for uma inserção, executa a consulta de inserção
    $resultado_usuario = mysqli_query($conn, $sql);
    if ($resultado_usuario && mysqli_affected_rows($conn) > 0) {
        echo '<p>Produto inserido com sucesso!</p>';
    } else {
        echo '<p>Erro ao abrir solicitação! </p>';
        echo $sql; // Imprime a consulta para debug em caso de erro
    }
} else {
    // Se for uma atualização, executa a consulta de atualização
    $resultado_usuario = mysqli_query($conn, $sql_update);
    if ($resultado_usuario && mysqli_affected_rows($conn) > 0) {
        echo '<p>Produto atualizado com sucesso!</p>';
    } else {
        echo '<p>Erro ao abrir solicitação!'.$sql_update. '</p>';
    }
}
?>
