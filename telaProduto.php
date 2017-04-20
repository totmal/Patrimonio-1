<?php
include "header.php"
?>
		<div class="row">
			<div class="col-md-10">
				<h1>PRODUTO</h1>
			</div>	
			<div class="col-md-2 text-right">
				<h1><a href="addProduto.php" class="btn btn-primary"> <span class="glyphicon glyphicon-file" aria-hidden="true"></span>Cadastrar um novo</a></h1>
				<a href="index.php" class="btn btn-primary"> <span class="glyphicon glyphicon-home" aria-hidden="true"></span>Inicio</a>
			</div>
		</div>
		</br>
		<table class="table table-bordere table-striped">
			<thead>
				<tr>
					<th width="20">ID</th>
					<th>Descrição</th>
					<th>Situação</th>				
					<th>Fabricante</th>				
					<th>Grupo</th>				
					<th>numero da NFE</th>				
								
					<th width="100">Ação</th>				
				</tr>
			</thead>
			<tbody>
			<?php
				$query= $mysqli->query("select *from vwProduto");
				$no=1;
				while ($row = $query->fetch_assoc())
				{
					?>
				
			
				<tr>
					<td><?php echo $no++?></td>
					<td><?php echo $row['descProduto']?></td>
					<td><?php echo $row['Situacao']?></td>
					<td><?php echo $row['nomeFabricante']?></td>
					<td><?php echo $row['grupo']?></td>
					<td><?php echo $row['numeroNota']?></td>
					
					
					<td>
						<a href="updateProduto.php?id=<?php echo $row['idProduto']?>" class "btn btn-warning btn-sm"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
						<a onclick="return confirm('Deseja excluir o item ?')" href="deleteProduto.php?id=<?php echo $row['idProduto']?>" class "btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
					</td>
				</tr>
				<?php
				}
				?>
			</tbody>
		</table>
<?php
include "footer.php"
?>