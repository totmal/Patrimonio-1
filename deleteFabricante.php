<?php
include"config.php";
$id=$_GET['id'];
if(isset($id))
{
	$query=$mysqli->query("delete from fabricante where idFabricante='$id'");
	if($query)
	{
		echo"<script>alert('Excluido com sucesso');location.href='telaFabricante.php'</script>";
	}
	else
	{
		header('location : telaFabricante.php');
	}
}
?>