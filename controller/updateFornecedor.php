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
	$result= $mysqli->query("select *from fornecedor where idFornecedor='$id'");
	$row= $result->fetch_assoc();
?>
		<div class="row">
			<div class="col-md-10">
				<h1>Atualização do Fornecedor</h1>
			</div>	
			<div class="col-md-2 text-right">
				<h1><a href="../view/telaFornecedor.php" class="btn btn-primary"> <span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span>Voltar</a></h1>
			</div>
		</div>
		<?php
		if(isset($_POST['submit'])){
			
			$st=$_POST['fornecedor'];
			$cnpj=$_POST['cnpj'];
			$query=$mysqli->query("update fornecedor set nomefornecedor='$st', cnpj='$cnpj' where idFornecedor='$id'");
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
					<label for="fornecedor">Razão social</label>
					<input type="text" class="form-control" id="fornecedor" name="fornecedor" value="<?php echo $row['nomeFornecedor']?>" requerid>
				</div>
				
				<form method="post">
				<div class="form-group">
					<label for="cnpj">CNPJ</label>
					<input type="text" class="form-control" id="cnpj" name="cnpj" value="<?php echo $row['cnpj']?>" requerid>
				</div>
	
	  <button type="submit" class="btn btn-primary" name="submit">Salvar</button>
	</form>
		
<?php
}else{
	echo"<script>location.href='telaSetor.php'</script>";
}
include "../view/footer.php"
?>