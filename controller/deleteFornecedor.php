<?php
include"config.php";

session_start();
	
	if (!isset($_SESSION['autenticado'])){
		header("Location:../login.php");
		exit;
	}
	
	
	

	
	$idadmin = $_SESSION['idadmin'];
	$nomeadmin = $_SESSION['nomeadmin'];
$id=$_GET['id'];
if(isset($id))
{
	$query=$mysqli->query("delete from fornecedor where idFornecedor='$id'");
	if($query)
	{
		echo"<script>alert('Excluido com sucesso');location.href='../view/telaFornecedor.php'</script>";
	}
	else
	{
		header('location : ../view/telaFornecedor.php');
	}
}
?>