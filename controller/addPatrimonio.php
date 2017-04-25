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
	$result= $mysqli->query("select *from produto");
	$result1= $mysqli->query("select *from setor");	
	
		
?>
		<div class="row">
			<div class="col-md-10">
				<h1>Cadastro de Patrimonio</h1>
			</div>	
			<div class="col-md-2 text-right">
				<h1><a href="../view/telaPatrimonio.php" class="btn btn-primary"> <span class="../fonts/glyphicon glyphicon-menu-left" aria-hidden="true"></span>Voltar</a></h1>
			</div>
		</div>
		<?php
		if(isset($_POST['submit'])){
					  
			
			$produto=$_POST['Produto'];
			$setor=$_POST['setor'];
			$nrPatrimonio= $_POST['patrimonio']; 	
			$observacao=$_POST['obs'];
			
			
			
			$query=$mysqli->query("insert into patrimonio (Produto_idProduto,Setor_idSetor,nrPatrimonio,observacao)  values ('$produto','$setor','$nrPatrimonio','$observacao')") or die(mysqli_error($mysqli)) ;
			
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
					<label for="patrimonio">Número do Patrimonio</label>
					<input type="text" class="form-control" id="patrimonio" name="patrimonio" placeholder="patrimonio" requerid>
				</div>
				
				<div class="form-group">
					<label for="obs">Observaçoes</label>
					<textarea class="form-control" rows="3" id="obs" name="obs" placeholder="obs" requerid></textarea>
				</div>
		
				
		
		<div class="form-group">
		<label for="Produto">Produto</label>
		  <select name="Produto" >
		  <option>Selecione</option>
			<?php
				while($row_gp=$Produto= $result->fetch_assoc()){
					?>
					
					<option value="<?php echo $row_gp['idProduto'];?>" name="Produto"><?php echo $row_gp['descricao'];?></option><?php
				}
			?>		
		  </select>
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
include "../view/footer.php"
?>