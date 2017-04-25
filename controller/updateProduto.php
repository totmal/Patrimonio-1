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
	$result= $mysqli->query("select *from produto where idProduto='$id'");
	$row= $result->fetch_assoc();
	
	$result1= $mysqli->query("select *from setor");
	$result= $mysqli->query("select *from grupo");
	
	
	$result4= $mysqli->query("select *from situacao");
	
	
	
	
	
	$result3= $mysqli->query("select *from fabricante");
?>
		<div class="row">
			<div class="col-md-10">
				<h1>Atualização do Produto</h1>
			</div>	
			<div class="col-md-2 text-right">
				<h1><a href="../view/telaProduto.php" class="btn btn-primary"> <span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span>Voltar</a></h1>
			</div>
		</div>
		<?php
		if(isset($_POST['submit'])){
			
			$fb=$_POST['fabricante'];
			$nfe=$_POST['nfe'];
			$gp= $_POST['grupo']; 	
			$si=$_POST['situacao'];
			$Produto=$_POST['produto'];
			$query=$mysqli->query("update produto set grupo_idgrupo='$gp', situacao_idsituacao='$si', nfe='$nfe',Fabricante_idFabricante='$fb',descricao='$Produto' where idProduto='$id' ")or die(mysqli_error($mysqli)) ;
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
					<label for="produto">Produto</label>
					<input type="text" class="form-control" id="produto" name="produto" value="<?php echo $row['descricao']?>" requerid>
				</div>
				
				<div class="form-group">
					<label for="nfe">NFE</label>
					<input type="text" class="form-control" id="nfe" name="nfe" value="<?php echo $row['nfe']?>" requerid>
				</div>
				
				
				
				
				
				
				<div class="form-group">
				<label for="fabricante">Fabricante </label>
				<select name="fabricante">
					<option>Selecione</option>
					<?php
						while($row_teste=$fabricante= $result3->fetch_assoc()){
							?>
							<option value="<?php echo $row_teste['idFabricante'];?>" id="fabricante"><?php echo $row_teste['nomeFabricante'];?></option><?php
						}
				?>
			
		</select>
		<div>
		<label for="situacao">Situação </label>
		 <select name="situacao">
			<option>Selecione</option>
			<?php
				while($row_si=$situacao= $result4->fetch_assoc()){
					?>					
					<option value="<?php echo $row_si['idsituacao'];?>" id="situacao" ><?php echo $row_si['descricao'];?></option><?php
				}
			?>	
		  </select>
		</div>
		<div class="form-group">
		<label for="grupo">Grupo</label>
		  <select name="grupo" >
		  <option>Selecione</option>
			<?php
				while($row_gp=$grupo= $result->fetch_assoc()){
					?>
					
					<option value="<?php echo $row_gp['idgrupo'];?>" name="grupo"><?php echo $row_gp['Descricao'];?></option><?php
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
include "../view/footer.php"
?>