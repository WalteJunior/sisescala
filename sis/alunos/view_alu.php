<?php
	$matricula = (int) $_GET['matricula'];
	$sql = mysqli_query($con, "select * from aluno where matricula = '".$matricula."';");
	$row = mysqli_fetch_array($sql);
?>
<div id="main" class="container-fluid">
	<h3 class="page-header">Visualizar registro do Aluno - <?php echo $matricula; ?> </h3>
	<div class="row">
		<div class="col-md-2">
			<p><strong>Matrícula</strong></p>
			<p><?php echo $row['matricula'];?></p>
		</div>
		<div class="col-md-5">
			<p><strong>Nome Completo</strong></p>
			<p><?php echo $row['nome_aluno'];?></p>
		</div>
		<div class="col-md-3">
			<p><strong>Data Nascimento</strong></p>
			<p><?php echo date('d-m-Y',strtotime($row['dt_nasc'])); ?></p>
		</div>
		<div class="col-md-2">
			<p><strong>Sexo</strong></p>
			<p><?php echo $row['sexo_aluno'];?></p>
		</div>
	</div>
	<div class="row">
		<div class="col-md-6">
			<p><strong>Nome do Pai</strong></p>
			<p><?php echo $row['nome_pai'];?></p>
		</div>
		<div class="col-md-6">
			<p><strong>Nome da Mãe</strong></p>
			<p><?php echo $row['nome_mae'];?></p>
		</div>
	</div>
	<div class="row">
		<div class="col-md-4">
			<p><strong>RG</strong></p>
			<p><?php echo $row['rg_aluno'];?></p>
		</div>
		<div class="col-md-4">
			<p><strong>CPF</strong></p>
			<p><?php echo $row['cpf_aluno'];?></p>
		</div>
	</div>
	<hr/>
	<div id="actions" class="row">
		<div class="col-md-12">
			<a href="?page=lista_alu" class="btn btn-default">Voltar</a>
				<?php echo "<a href=?page=fedita_alu&matricula=".$row['matricula']." class='btn btn-primary'>Editar</a>";?>
				<?php echo "<a href=?page=excluir_alu&matricula=".$row['matricula']." class='btn btn-danger'>Excluir</a>";?>
		</div>
	</div>
</div>
