<?php
include"config.php";
$id=$_GET['id'];
if(isset($id))
{
	$query=$mysqli->query("delete from setor where idSetor='$id'");
	if($query)
	{
		echo"<script>alert('Excluido com sucesso');location.href='telaSetor.php'</script>";
	}
	else
	{
		header('location : telaSetor.php');
	}
}
?>