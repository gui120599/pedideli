<?php
session_start();
if (isset($_FILES['foto-perfil'])) {
    $ext = strtolower(substr($_FILES['pic']['name'], -4)); //Pegando extensão do arquivo
    $new_name = date("Y.m.d-H.i.s") . $ext; //Definindo um novo nome para o arquivo
    $dir = './img/'; //Diretório para uploads

    move_uploaded_file($_FILES['foto-perfil']['tmp_name'], $dir . $new_name); //Fazer upload do arquivo
    $_SESSION['UrlImagemPerfil'] = $dir . $new_name;
    echo '
    <div class="alert alert-success" role="alert" align="center">
        <img src="./img/' . $new_name . '" class="img img-responsive img-thumbnail" width="200">
        <br>
        Imagem enviada com sucesso!
        <br>
        <a href="exemplo_upload_de_imagens.php">
            <button class="btn btn-default">Enviar nova imagem</button>
        </a>
    </div>';
}
