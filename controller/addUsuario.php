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
				<h1>Cadastro de Usuario</h1>
			</div>	
			<div class="col-md-2 text-right">
				<h1><a href="../view/telaUsuario.php" class="btn btn-primary"> <span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span>Voltar</a></h1>
			</div>
		</div>
		<?php
		if(isset($_POST['submit'])){
			
			$st=$_POST['Login'];
			$senha=$_POST['senha'];
			$query=$mysqli->query("insert into usuarios (nomeadmin,senha) values ('$st','$senha')");
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
					<label for="Login">Login</label>
					<input type="text" class="form-control" id="Login" name="Login" placeholder="Login" requerid>
				</div>
				<div class="form-group">
					<label for="senha">Senha</label>
					<input type="password" class="form-control" id="senha" name="senha" placeholder="senha" requerid>
				</div>
	
	  <button type="submit" class="btn btn-primary" name="submit">Salvar</button>
	  
	</form>
		
<?php
include "../view/footer.php"
?>