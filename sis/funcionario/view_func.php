<?php
$id = (int) $_GET['id_func'];
$sql = mysqli_query($con, "select * from funcionario, endereco, setor 
        where funcionario.id_func = $id and $id = endereco.id_func;");
$row = mysqli_fetch_array($sql);
?>
<div id="main" class="container-fluid">
	<h3 class="page-header">Registro do Funcionário - <?php echo $row['nome_func']; ?> </h3>
	<div class="row" style="background-color: #e0f7fa; padding: 15px; border-radius: 5px;">
		<div class="col-md-3">
			<p><strong>Nome</strong></p>
			<p><?php echo $row['nome_func']; ?></p>
		</div>
		<div class="col-md-3">
			<p><strong>Setor</strong></p>
			<p><?php echo $row['nome_st']; ?></p>
		</div>
		<div class="col-md-3">
			<p><strong>Turno</strong></p>
			<p><?php echo $row['turno']; ?></p>
		</div>
		<div class="col-md-3">
			<p><strong>Cargo</strong></p>
			<p><?php echo $row['cargo_func']; ?></p>
		</div>

		<div class="col-md-2">
			<p><strong>Telefone</strong></p>
			<p><?php echo $row['telefone_func']; ?></p>
		</div>
		<div class="col-md-3">
			<p><strong>E-mail</strong></p>
			<p><?php echo $row['email_func']; ?></p>
		</div>
		<div class="col-md-2">
			<p><strong>Sexo</strong></p>
			<p><?php echo $row['sexo_func']; ?></p>
		</div>
		
		<!-- Endereço -->
		<div class="col-md-2">
			<p><strong>Bairro</strong></p>
			<p><?php echo $row['bairro_end']; ?></p>
		</div>
		<div class="col-md-2">
			<p><strong>Cidade</strong></p>
			<p><?php echo $row['cidade_end']; ?></p>
		</div>
	</div>

	<hr />
	<div id="actions" class="row">
		<div class="col-md-12">
			<a href="?page=lista_func" class="btn btn-secondary">Voltar</a>
			<?php echo "<a href=?page=fedita_func&id_func=" . $row['id_func'] . " class='btn btn-primary'>Editar</a>"; ?>
			<?php echo "<a href=?page=excluir_func&id_func=" . $row['id_func'] . " class='btn btn-danger'>Excluir</a>"; ?>
		</div>
	</div>
</div>