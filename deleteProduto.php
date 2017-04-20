<?php
include"config.php";
$id=$_GET['id'];
if(isset($id))
{
	$query=$mysqli->query("delete from produto where idProduto='$id'");
	if($query)
	{
		echo"<script>alert('Excluido com sucesso');location.href='telaProduto.php'</script>";
	}
	else
	{
		header('location : telaProduto.php');
	}
}
?>