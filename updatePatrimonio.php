<?php
include "header.php";
$id= $_GET['id'];
if(isset($id)){
	$result= $mysqli->query("select *from patrimonio where idPatrimonio='$id'");
	$row= $result->fetch_assoc();
	$result1= $mysqli->query("select *from setor");
?>
		<div class="row">
			<div class="col-md-10">
				<h1>Atualização do Patrimonio</h1>
			</div>	
			<div class="col-md-2 text-right">
				<h1><a href="telaPatrimonio.php" class="btn btn-primary"> <span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span>Voltar</a></h1>
			</div>
		</div>
		<?php
		if(isset($_POST['submit'])){
			
			$nrPatrimonio=$_POST['patrimonio'];
			$Observacao=$_POST['obs'];
			$setor=$_POST['setor'];
			$query=$mysqli->query("update patrimonio set nrPatrimonio='$nrPatrimonio', observacao='$Observacao',setor_idSetor='$setor' where idPatrimonio='$id'")or die(mysqli_error($mysqli)) ;
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
					<label for="patrimonio">Número do Patrimonio</label>
					<input type="text" class="form-control" id="patrimonio" name="patrimonio" value="<?php echo $row['nrPatrimonio']?>" requerid>
				</div>
				
				<form method="post">
				<div class="form-group">
					<label for="obs">Observação</label>
					<input type="text" class="form-control" id="obs" name="obs" value="<?php echo $row['observacao']?>" requerid>
				</div>
				
				<div class="form-group">
				<label for="setor">Setor</label>
				  <select name="setor">
					<option>Selecione</option>
					<?php
						while($row_st=$setor= $result1->fetch_assoc()){
							?>					
							<option value="<?php echo $row_st['idSetor'];?>" id="setor" ><?php echo $row_st['descricao'];?></option><?php
						}
					?>	
				  </select>
				</div>
	
	  <button type="submit" class="btn btn-primary" name="submit">Salvar</button>
	</form>
		
<?php
}else{
	echo"<script>location.href='telaSetor.php'</script>";
}
include "footer.php"
?>