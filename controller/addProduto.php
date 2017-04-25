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

<?php
	$result= $mysqli->query("select *from grupo");
	
	
	$result1= $mysqli->query("select *from situacao");
	
	
	$result5= $mysqli->query("select *from nfe");
	
	
	$result3= $mysqli->query("select *from fabricante");
	$resultP= $mysqli->query("select *from produto");
	$idP= $resultP->fetch_assoc();
	
	
	
?>
		<div class="row">
			<div class="col-md-10">
				<h1>Cadastro de Produto</h1>
			</div>	
			<div class="col-md-2 text-right">
				<h1><a href="../view/telaProduto.php" class="btn btn-primary"> <span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span>Voltar</a></h1>
			</div>
		</div>
		<?php
		if(isset($_POST['submit'])){
					  
			$gp= $_POST['grupo']; 	
			$si=$_POST['situacao'];
			$nf=$_POST['nfe'];
			$fb=$_POST['fabricante'];
			$desc=$_POST['produto'];
			
			
			$query=$mysqli->query("insert into produto(grupo_idgrupo,situacao_idsituacao,nfe,Fabricante_idFabricante,descricao)  values ('$gp','$si','$nf','$fb','$desc')") or die(mysqli_error($mysqli)) ;
			
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
					<label for="produto">Nome do Produto</label>
					<input type="text" class="form-control" id="produto" name="produto" placeholder="produto" requerid>
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
		
		<div class="form-group">
		<label for="situacao">Situação</label>
		  <select name="situacao">
			<option>Selecione</option>
			<?php
				while($row_si=$situacao= $result1->fetch_assoc()){
					?>					
					<option value="<?php echo $row_si['idsituacao'];?>" id="situacao" ><?php echo $row_si['descricao'];?></option><?php
				}
			?>	
		  </select>
		</div>
		
		<div class="form-group">
					<label for="nfe">NF-E</label>
					<input type="text" class="form-control" id="nfe" name="nfe" placeholder="número da nota fiscal" requerid>
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
		</div>
		</br>
	
	  <button type="submit" class="btn btn-primary" name="submit">Salvar</button>
	 </form>
		
<?php
include "../view/footer.php"
?>