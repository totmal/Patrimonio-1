<?php
$mysqli= new mysqli('localhost','vilmar','123456','bd_patrimonio');
	if($mysqli->connect_errno)
	{
		echo "Erro ao conectar :/".$mysqli->connect_error;
	}
?>