<?php 
	session_start();
	include "controller/config.php";

	$nomeadmin = $_POST['nomeadmin'];
	$senha = $_POST['senha'];

	if(!$nomeadmin || !$senha){ 
		echo "Você deve digitar sua senha e login!"; 
	exit; 
	} 

	$sql = "SELECT idusuarios, nomeadmin FROM usuarios WHERE nomeadmin = '".$nomeadmin."' and senha =  '".$senha."'  "; 
	$query = $mysqli->query($sql) or die($mysqli->error);
	$dados = $query->fetch_assoc();
	
	if($dados){  
		$idadmin = $dados['idusuarios']; 
		$_SESSION['idadmin'] = $idadmin;
		$nomeadmin = $dados['nomeadmin']; 
		$_SESSION['nomeadmin'] = $nomeadmin;
		
		
		header("location:index.php");
		
		$_SESSION['autenticado'] = true;
		
		header("location:index.php");
		exit;
	}else{
		echo "O login fornecido por você é inexistente!"; 
		header("location:login.php");
		exit;
	}

?>