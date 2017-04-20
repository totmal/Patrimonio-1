<?php
include"config.php";
$id=$_GET['id'];
if(isset($id))
{
	$query=$mysqli->query("delete from fornecedor where idFornecedor='$id'");
	if($query)
	{
		echo"<script>alert('Excluido com sucesso');location.href='telaFornecedor.php'</script>";
	}
	else
	{
		header('location : telaFornecedor.php');
	}
}
?>