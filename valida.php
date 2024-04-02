<?php
	session_start();	
	//Incluindo a conexão com banco de dados
	include_once("./conexao/conexao.php");	
	//O campo usuário e senha preenchido entra no if para validar
	if((isset($_POST['login'])) && (isset($_POST['senha']))){
		$usuario = mysqli_real_escape_string($conn, $_POST['login']); //Escapar de caracteres especiais, como aspas, prevenindo SQL injection
		$senha = mysqli_real_escape_string($conn, $_POST['senha']);
		$senha = md5($senha);
			
		//Buscar na tabela usuario o usuário que corresponde com os dados digitado no formulário
		$result_usuario = "SELECT * FROM usuarios WHERE ativo = 1 AND login_usuario = '$usuario' && senha_usuario = '$senha' LIMIT 1";
		$resultado_usuario = mysqli_query($conn, $result_usuario);
		$resultado = mysqli_fetch_assoc($resultado_usuario);
		
		//Encontrado um usuario na tabela usuário com os mesmos dados digitado no formulário
		if(isset($resultado)){
			$_SESSION['usuarioId'] = $resultado['cod_usuario'];
			$_SESSION['usuarioNome'] = $resultado['nome_usuario'];
				header("Location: inicio.php");
		//Não foi encontrado um usuario na tabela usuário com os mesmos dados digitado no formulário
		//redireciona o usuario para a página de login
		}else{	
			//Váriavel global recebendo a mensagem de erro
			$_SESSION['loginErro'] = "Usuário ou senha inválidos!";
			header("Location: index.php");
		}
	//O campo usuário e senha não preenchido entra no else e redireciona o usuário para a página de login
	}else{
		$_SESSION['loginErro'] = "Usuário ou senha inválidos";
		header("Location: index.php");
	}
?>