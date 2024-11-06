<?php
	$id = (int) $_GET['id'];
	$sql = mysqli_query($con, "select * from substituicao where id = '".$id."';");
	$row = mysqli_fetch_array($sql);
?>
<div id="main" class="container-fluid">
	<h3 class="page-header">Substituição - Nº Registro - <?php echo $id; ?> </h3>
	<div class="row" style="background-color: #e0f7fa; padding: 10px; border-radius: 5px;">
		<div class="col-md-2">
			<p><strong>Nº Registro</strong></p>
			<p><?php echo $row['id'];?></p>
		</div>
		<div class="col-md-3">
			<p><strong>Solicitante</strong></p>
			<p><?php echo $row['solicitante'];?></p>
		</div>
		<div class="col-md-3">
			<p><strong>Motivo</strong></p>
			<p><?php echo $row['motivo'];?></p>
		</div>
		<div class="col-md-3">
			<p><strong>Data Falta</strong></p>
			<p><?php echo date('d-m-Y',strtotime($row['data_solic'])); ?></p>
		</div>
		<div class="col-md-3">
			<p><strong>Substituto</strong></p>
			<p><?php echo $row['substituto'];?></p>
		</div>
		<div class="col-md-3">
			<p><strong>Data Substituição</strong></p>
			<p><?php echo date('d-m-Y',strtotime($row['data_subs'])); ?></p>
		</div>
		<div class="col-md-5">
			<p><strong>Status</strong></p>
			<p><?php echo $row['ativo_sub'];?></p>
		</div>
	</div>
	<hr/>
	<div id="actions" class="row">
		<div class="col-md-12">
			<a href="?page=lista_sub" class="btn btn-secondary">Voltar</a>
		</div>
	</div>
</div>
