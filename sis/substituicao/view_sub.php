<?php
	$id = (int) $_GET['id'];
	$sql = mysqli_query($con, "select * from substituicao where id = '".$id."';");
	$row = mysqli_fetch_array($sql);
?>
<div id="main" class="container-fluid">
	<h3 class="page-header">Visualizar registro de Substituição - <?php echo $id; ?> </h3>
	<div class="row">
		<div class="col-md-2">
			<p><strong>ID</strong></p>
			<p><?php echo $row['id'];?></p>
		</div>
		<div class="col-md-5">
			<p><strong>Motivo</strong></p>
			<p><?php echo $row['motivo'];?></p>
		</div>
		<div class="col-md-3">
			<p><strong>Data Substituição</strong></p>
			<p><?php echo date('d-m-Y',strtotime($row['data'])); ?></p>
		</div>
	<hr/>
	<div id="actions" class="row">
		<div class="col-md-12">
			<a href="?page=lista_sub" class="btn btn-default">Voltar</a>
				<?php echo "<a href=?page=fedita_sub&id=".$row['id']." class='btn btn-primary'>Editar</a>";?>
				<?php echo "<a href=?page=excluir_sub&id=".$row['id']." class='btn btn-danger'>Excluir</a>";?>
		</div>
	</div>
</div>
