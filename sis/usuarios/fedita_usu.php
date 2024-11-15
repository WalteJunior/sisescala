<?php
$id = (int) $_GET['id'];
$sql = mysqli_query($con, "select * from usuarios where id = '" . $id . "';");
$row = mysqli_fetch_array($sql);
?>

<div id="main" class="container-fluid">
	<br>
	<h3 class="page-header">Editar registro do Usuário - <?php echo $row["nome"] . " - ID: " . $id; ?></h3>

	<!-- Área de campos do formulário de edição -->
	<form action="?page=atualiza_usu&id=<?php echo $row['id']; ?>" method="post">
		<!-- 1ª LINHA -->
		<div class="row">
			<div class="form-group col-md-1">
				<label for="id">ID</label>
				<input readonly type="text" class="form-control" name="id" value="<?php echo $row["id"]; ?>">
				<input type="hidden" class="form-control" name="id_func" value="<?php echo $row["id_func"]; ?>">
			</div>
			<div class="form-group col-md-5">
				<label for="nome">Nome do Usuário</label>
				<input type="text" class="form-control" name="nome" value="<?php echo $row["nome"]; ?>">
			</div>
		</div>

		<!-- 2ª LINHA -->
		<div class="row">
			<div class="form-group col-md-4">
				<label for="email">E-mail</label>
				<input type="email" class="form-control" name="email" value="<?php echo $row["email"]; ?>">
			</div>
			<div class="form-group col-md-2">
				<label for="nivel">Nível</label>
				<select class="form-control" id="nivel" name="nivel">
					<option value="1" <?php if ($row['nivel'] == 1) echo "selected"; ?>>Funcionario</option>
					<option value="2" <?php if ($row['nivel'] == 2) echo "selected"; ?>>Supervisor</option>
					<option value="3" <?php if ($row['nivel'] == 3) echo "selected"; ?>>Administrador</option>
				</select>
			</div>
			<div class="form-group col-md-3">
				<label for="dt_cad">Data da Edição</label>
				<input type="text" disabled="disabled" class="form-control" name="dt_cad" value="<?php echo date('d/m/Y'); ?>">
			</div>
			<div class="form-group col-md-2">
				<label for="ativo">Ativo</label><br>
				<?php
				if ($row["ativo"] == 1) {
					echo "<label>SIM</label>";
				} else {
					echo "<label>NÃO</label>";
				}
				?>
			</div>
		</div>

		<hr />

		<!-- Botões de Ação -->
		<div id="actions" class="row">
			<div class="col-md-12">
				<a href="?page=lista_usu" class="btn btn-secondary">Voltar</a>
				<button type="submit" class="btn btn-primary">Salvar Alterações</button>
			</div>
		</div>
	</form>
</div>
