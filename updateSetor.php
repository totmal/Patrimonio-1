<?php
include "header.php";
$id= $_GET['id'];
if(isset($id)){
	$result= $mysqli->query("select *from setor where idSetor='$id'");
	$row= $result->fetch_assoc();
?>
		<div class="row">
			<div class="col-md-10">
				<h1>SETOR</h1>
			</div>	
			<div class="col-md-2 text-right">
				<h1><a href="telaSetor.php" class="btn btn-primary"> <span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span>Voltar</a></h1>
			</div>
		</div>
		<?php
		if(isset($_POST['submit'])){
			
			$st=$_POST['setor'];
			$query=$mysqli->query("update setor set descricao='$st' where idSetor='$id'");
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
					<label for="setor">Nome do Setor</label>
					<input type="text" class="form-control" id="setor" name="setor" value="<?php echo $row['descricao']?>" requerid>
				</div>
	
	  <button type="submit" class="btn btn-primary" name="submit">Salvar</button>
	</form>
		
<?php
}else{
	echo"<script>location.href='telaSetor.php'</script>";
}
include "footer.php"
?>