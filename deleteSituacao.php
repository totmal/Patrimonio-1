<?php
include"config.php";
$id=$_GET['id'];
if(isset($id))
{
	$query=$mysqli->query("delete from situacao where idsituacao='$id'");
	if($query)
	{
		echo"<script>alert('Excluido com sucesso');location.href='telaSituacao.php'</script>";
	}
	else
	{
		header('location : telaSituacao.php');
	}
}
?>