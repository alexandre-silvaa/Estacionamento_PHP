<?php
	session_start();
	unset($_SESSION['usuario']);
	if(isset($_POST['txtNome'])){
		$nome = $_POST['txtNome'];
		$senha = $_POST['txtSenha'];
		if($nome == "Carlos Eduardo" && $senha == "2021"){
			$usuario = array('nome' => $nome,
							 'registro' => date("F j, Y, g:i a"));
			$_SESSION['usuario'] = $usuario;
			
			header("Location: home.php");
		}else{
			header("Location: index.php");
		}
	}else{
		header("Location: index.php");
	}
?>