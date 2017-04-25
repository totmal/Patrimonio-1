<?php 
	session_start();
	
	if (!isset($_SESSION['autenticado'])){
		header("Location:login.php");
		exit;
	}
	
	include "controller/config.php";
	

	
	$idadmin = $_SESSION['idadmin'];
	$nomeadmin = $_SESSION['nomeadmin'];

?>

<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Patrimonio</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    
  </head>
  <body>
	<div class="container">
		<div class="row">
			<div class="col-md-10">
				<h1>MENU</h1>
			</div>	
			<div class="col-md-2 text-right">
				<h3>Bem vindo <?php echo $nomeadmin?></h3>
				<a href="logoff.php" class="btn btn-primary"><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span></span>SAIR</a>
			</div>
		</div>
		</br>
		
		<a href="view/telaPatrimonio.php" class="btn btn-primary"><span class="glyphicon glyphicon-folder-open" aria-hidden="true"></span></span>PRATRIMONIO</a>
		<a href="view/telaProduto.php" class="btn btn-primary"><span class="glyphicon glyphicon-folder-open" aria-hidden="true"></span></span>PRODUTO</a>
		<a href="view/telaSituacao.php" class="btn btn-primary"><span class="glyphicon glyphicon-folder-open" aria-hidden="true"></span></span>SITUAÇÃO</a>
		<a href="view/telaGrupo.php" class="btn btn-primary"><span class="glyphicon glyphicon-folder-open" aria-hidden="true"></span></span>GRUPO</a>
		<a href="view/telaFabricante.php" class="btn btn-primary"><span class="glyphicon glyphicon-folder-open" aria-hidden="true"></span></span>FABRICANTE</a>
		<a href="view/telaFornecedor.php" class="btn btn-primary"><span class="glyphicon glyphicon-folder-open" aria-hidden="true"></span></span>FORNECEDOR</a>
		<a href="view/telaSetor.php" class="btn btn-primary"><span class="glyphicon glyphicon-folder-open" aria-hidden="true"></span></span>SETOR</a>
		<a href="view/telaUsuarios.php" class="btn btn-primary"><span class="glyphicon glyphicon-folder-open" aria-hidden="true"></span></span>USUARIOS</a>
		
<?php
include "view/footer.php"
?>