<?php

$id = (int) $_GET['id_func'];
$sql = mysqli_query($con, "SELECT * FROM funcionario, endereco, setor WHERE funcionario.id_func = $id AND $id = endereco.id_func;");
$row = mysqli_fetch_array($sql);

$isReadonly = ($_SESSION['UsuarioNivel'] == 2) ? 'readonly' : '';
?>

<div id="main" class="container-fluid">
	<br>
	<h3 class="page-header">Editar registro do Funcionário - <?php echo $id; ?></h3>

	<!-- Área de campos do formulário de edição-->
	<form action="?page=atualiza_func&id_func=<?php echo $row['id_func']; ?>" method="post">

		<input type="hidden" name="id_func" value="<?php echo $row["id_func"]; ?>">

		<!-- 1ª LINHA -->
		<div class="row">
			<div class="form-group col-md-2">
				<label for="nome_func">Nome do Funcionário</label>
				<input type="text" class="form-control" name="nome_func" <?php echo $isReadonly; ?> value="<?php echo $row["nome_func"]; ?>">
			</div>
			<div class="form-group col-md-2">
				<label for="telefone_func">Telefone</label>
				<input type="tel" class="form-control" name="telefone_func" <?php echo $isReadonly; ?> value="<?php echo $row["telefone_func"]; ?>">
			</div>
			<div class="form-group col-md-2">
				<label for="email_func">E-mail</label>
				<input type="email" class="form-control" name="email_func" <?php echo $isReadonly; ?> value="<?php echo $row["email_func"]; ?>">
			</div>
			<div class="form-group col-md-2">
				<label for="sexo_func">Sexo</label>
				<select class="form-control" name="sexo_func" <?php echo $isReadonly ? 'disabled' : ''; ?>>
					<?php
					if ($row["sexo_func"] == "M") {
						echo '<option selected="selected" value="M">Masculino</option><option value="F">Feminino</option>';
					} else {
						echo '<option value="M">Masculino</option><option selected="selected" value="F">Feminino</option>';
					}
					?>
				</select>
			</div>
			<div class="form-group col-md-2">
				<label for="nome_st">Setor</label>
				<input type="text" class="form-control" name="nome_st" <?php echo $isReadonly; ?> value="<?php echo $row["nome_st"]; ?>">
			</div>

			<!-- Campo de Cargo Funcional -->
			<div class="form-group col-md-2">
				<label for="cargo_func">Cargo</label>
				<select class="form-control" name="cargo_func">
					<?php
					switch($row["cargo_func"]) {
						case "":
							echo '<option selected="selected" value="">---------</option><option value="OP">Operador</option><option value="TC">Tecnico</option><option value="AX">Auxiliar</option><option value="INSP">Inspetor</option>';
							break;
						case "OP":
							echo '<option value="">---------</option><option selected="selected" value="OP">Operador</option><option value="TC">Tecnico</option><option value="AX">Auxiliar</option><option value="INSP">Inspetor</option>';
							break;
						case "TC":
							echo '<option value="">---------</option><option value="OP">Operador</option><option selected="selected" value="TC">Tecnico</option><option value="AX">Auxiliar</option><option value="INSP">Inspetor</option>';
							break;
						case "AX":
							echo '<option value="">---------</option><option value="OP">Operador</option><option value="TC">Tecnico</option><option selected="selected" value="AX">Auxiliar</option><option value="INSP">Inspetor</option>';
							break;
						case "INSP":
							echo '<option value="">---------</option><option value="OP">Operador</option><option value="TC">Tecnico</option><option value="AX">Auxiliar</option><option selected="selected" value="INSP">Inspetor</option>';
							break;
					}
					?>
				</select>
			</div>

		</div>

		<hr />

		<div id="actions" class="row">
			<div class="col-md-12">
				<a href="?page=lista_func" class="btn btn-secondary">Voltar</a>
				<button type="submit" class="btn btn-primary">Salvar Alterações</button>
			</div>
		</div>
	</form>
</div>
