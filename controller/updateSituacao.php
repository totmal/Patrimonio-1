<?php
include "../view/header.php";

session_start();
	
	if (!isset($_SESSION['autenticado'])){
		header("Location:../login.php");
		exit;
	}
	
	
	

	
	$idadmin = $_SESSION['idadmin'];
	$nomeadmin = $_SESSION['nomeadmin'];
$id= $_GET['id'];
if(isset($id)){
	$result= $mysqli->query("select *from situacao where idSituacao='$id'");
	$row= $result->fetch_assoc();
?>
		<div class="row">
			<div class="col-md-10">
				<h1>Atualização da situacao</h1>
			</div>	
			<div class="col-md-2 text-right">
				<h1><a href="../view/telaGrupo.php" class="btn btn-primary"> <span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span>Voltar</a></h1>
			</div>
		</div>
		<?php
		if(isset($_POST['submit'])){
			
			$st=$_POST['situacao'];
			$query=$mysqli->query("update situacao set Descricao='$st' where idSituacao='$id'");
			if($query)
			{
				?>
				<div class="alert alert-success alert-dismissible" role="alert">
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				  <strong>Sucesso!</strong> Foi salvo com sucesso
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
					<label for="situacao">Situção</label>
					<input type="text" class="form-control" id="situacao" name="situacao" value="<?php echo $row['descricao']?>" requerid>
				</div>
				
				
	
	  <button type="submit" class="btn btn-primary" name="submit">Salvar</button>
	</form>
		
<?php
}else{
	echo"<script>location.href='telaSetor.php'</script>";
}
include "../view/footer.php"
?>