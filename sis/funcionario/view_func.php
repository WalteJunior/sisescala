<?php
	$id = (int) $_GET['id_func'];
	$sql = mysqli_query($con, "select * from funcionario, endereco 
        where funcionario.id_func = $id and $id = endereco.id_func;");
	$row = mysqli_fetch_array($sql);
?>
<div id="main" class="container-fluid">
	<h3 class="page-header">Visualizar registro do Funcionário <?php echo $id; ?> </h3>
	<div class="row">
		<div class="col-md-2">
			<p><strong>ID</strong></p>
			<p><?php echo $row['id_func'];?></p>
		</div>
		<div class="col-md-2">
			<p><strong>Nome</strong></p>
			<p><?php echo $row['nome_func'];?></p>
		</div>
		<div class="col-md-2">
			<p><strong>Cargo</strong></p>
			<p><?php echo $row['cargo_func']; ?></p>
		</div>
		<div class="col-md-2">
			<p><strong>Telefone</strong></p>
			<p><?php echo $row['telefone_func'];?></p>
		</div>
		<div class="col-md-2">
			<p><strong>E-mail</strong></p>
			<p><?php echo $row['email_func'];?></p>
		</div>
		<div class="col-md-2">
			<p><strong>Sexo</strong></p>
			<p><?php echo $row['sexo_func'];?></p>
		</div>
	</div>

	<!-- Endereço -->
	<div class="row">
		<div class="col-md-2">
			<p><strong>Rua</strong></p>
			<p><?php echo $row['rua_end'];?></p>
		</div>
		<div class="col-md-2">
			<p><strong>Bairro</strong></p>
			<p><?php echo $row['bairro_end'];?></p>
		</div>
		<div class="col-md-2">
			<p><strong>Cidade</strong></p>
			<p><?php echo $row['cidade_end'];?></p>
		</div>
	</div>
	<hr/>
	<div id="actions" class="row">
		<div class="col-md-12">
			<a href="?page=lista_func" class="btn btn-default">Voltar</a>
				<?php echo "<a href=?page=fedita_func&id_func=".$row['id_func']." class='btn btn-primary'>Editar</a>";?>
				<?php echo "<a href=?page=excluir_func&id_func=".$row['id_func']." class='btn btn-danger'>Excluir</a>";?>
		</div>
	</div>
</div>
