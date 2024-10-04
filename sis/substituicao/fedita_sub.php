<?php
	$id = (int) $_GET['id'];
	$sql = mysqli_query($con, "select * from substituicao where id = '".$id."';");
	$row = mysqli_fetch_array($sql);
?>
<div id="main" class="container-fluid">
	<br><h3 class="page-header">Editar registro do Aluno - <?php echo $id;?></h3>

	<!-- Área de campos do formulário de edição-->

	<form action="?page=atualiza_sub&id=<?php echo $row['id']; ?>" method="post">

	<!-- 1ª LINHA -->	
	<div class="row"> 
		<div class="form-group col-md-2">
			<label for="id">ID</label>
			<input type="text" class="form-control" name="id" value="<?php echo $row["id"]; ?>">
		</div>
		<div class="form-group col-md-5">
			<label for="motivo">Motivo</label>
			<input type="text" class="form-control" name="motivo" value="<?php echo $row["motivo"]; ?>">
		</div>
		<div class="form-group col-md-3">
			<label for="data">Data da substituição</label>
			<input type="date" class="form-control" name="data" value="<?php echo date('d/m/Y',strtotime($row["data"])); ?>">
		</div>
	</div>

	<hr/>

	<div id="actions" class="row">
		<div class="col-md-12">
			<a href="?page=lista_sub" class="btn btn-secondary">Voltar</a>
			<button type="submit" class="btn btn-primary">Salvar Alterações</button>
		</div>
	</div>
</div>