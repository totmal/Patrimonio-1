<?php
include "../view/header.php";

session_start();
	
	if (!isset($_SESSION['autenticado'])){
		header("Location:../login.php");
		exit;
	}
	
	
	

	
	$idadmin = $_SESSION['idadmin'];
	$nomeadmin = $_SESSION['nomeadmin'];
?>
		<div class="row">
			<div class="col-md-10">
				<h1>Cadastro de Fabricante</h1>
			</div>	
			<div class="col-md-2 text-right">
				<h1><a href="../view/telaFabricante.php" class="btn btn-primary"> <span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span>Voltar</a></h1>
			</div>
		</div>
		<?php
		if(isset($_POST['submit'])){
			
			$st=$_POST['fabricante'];
			$query=$mysqli->query("insert into fabricante (nomeFabricante) values ('$st')");
			if($query)
			{
				?>
				<div class="alert alert-success alert-dismissible" role="alert">
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				  <strong>Sucesso!</strong> Foi cadastrado com sucesso
				</div>
				<?php
			}else
			{
				?>
				<div class="alert alert-danger alert-dismissible" role="alert">
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			  <strong>Erro!</strong> Ocorreu um erro ao salvar.
			</div>
				<?php
			}
			
		}
		?>
		
		
		</br>	
			<form method="post">
				<div class="form-group">
					<label for="fabricante">Nome do fabricante</label>
					<input type="text" class="form-control" id="fabricante" name="fabricante" placeholder="fabricante" requerid>
				</div>
	
	  <button type="submit" class="btn btn-primary" name="submit">Salvar</button>
	  <a onclick="return confirm('Deseja excluir o item ?')" href="deleteFabricante.php?id=<?php echo $row['idFabricante']?>" class "btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
	</form>
		
<?php
include "../view/footer.php"
?>