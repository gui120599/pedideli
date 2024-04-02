<?php
include_once("../../conexao/conexao.php");
$sql = "SELECT * FROM cargo WHERE ativo = 1";
$resultado = mysqli_query($conn, $sql);
while ($row_resultado = mysqli_fetch_assoc($resultado)) {
    echo '<option value="' . $row_resultado['cod_cargo'] . '">'. $row_resultado['descricao_cargo'] . '</option>';
}