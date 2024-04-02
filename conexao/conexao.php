<?php
	/*$servidor = "localhost";
	$usuario = "empo7374_pedi";
	$senha = "Pedideli12*";
	$dbname = "empo7374_pedi_deli";
	
	//Criar a conexao
	$conn = mysqli_connect($servidor, $usuario, $senha, $dbname);
	
	if(!$conn){
		die("Falha na conexao: " . mysqli_connect_error());
	}else{
		//echo "Conexao realizada com sucesso";
	}	
	function Conectar() {
        $dsn = 'mysql:host=localhost;dbname=empo7374_pedi_deli;charset=utf8';
        $user = 'empo7374_pedi';
        $pass = 'Pedideli12*';
        try {
            $pdo = new PDO($dsn, $user, $pass);
            //echo 'Conectado com sucesso!';
            return $pdo;
        } catch (PDOException $ex) {
            echo 'Erro: ' . $ex->getMessage();
        }
    }*/
	$servidor = "localhost";
	$usuario = "root";
	$senha = "";
	$dbname = "empo7374_pedi_deli";
	
	//Criar a conexao
	$conn = mysqli_connect($servidor, $usuario, $senha, $dbname);
	
	if(!$conn){
		die("Falha na conexao: " . mysqli_connect_error());
	}else{
		//echo "Conexao realizada com sucesso";
	}	
	function Conectar() {
        $dsn = 'mysql:host=localhost;dbname=empo7374_pedi_deli;charset=utf8';
        $user = 'root';
        $pass = '';
        try {
            $pdo = new PDO($dsn, $user, $pass);
            //echo 'Conectado com sucesso!';
            return $pdo;
        } catch (PDOException $ex) {
            echo 'Erro: ' . $ex->getMessage();
        }
    }
?>