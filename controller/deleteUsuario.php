<?php
include"config.php";
$id=$_GET['id'];

session_start();
	
	if (!isset($_SESSION['autenticado'])){
		header("Location:../login.php");
		exit;
	}
	
	
	

	
	$idadmin = $_SESSION['idadmin'];
	$nomeadmin = $_SESSION['nomeadmin'];



if(isset($id))
{
	$query=$mysqli->query("delete from usuarios where idUsuarios='$id'");
	if($query)
	{
		echo"<script>alert('Excluido com sucesso');location.href='../view/telaUsuario.php'</script>";
	}
	else
	{
		header('location : ../view/telaUsuario.php');
	}
}
?>