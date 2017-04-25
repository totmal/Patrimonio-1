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
	$query=$mysqli->query("delete from fabricante where idFabricante='$id'");
	if($query)
	{
		echo"<script>alert('Excluido com sucesso');location.href='../view/telaFabricante.php'</script>";
	}
	else
	{
		header('location : ../view/telaFabricante.php');
	}
}
?>