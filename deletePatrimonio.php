<?php
include"config.php";
$id=$_GET['id'];
if(isset($id))
{
	$query=$mysqli->query("delete from patrimonio where idPatrimonio='$id'");
	if($query)
	{
		echo"<script>alert('Excluido com sucesso');location.href='telaPatrimonio.php'</script>";
	}
	else
	{
		header('location : telaPatrimonio.php');
	}
}
?>