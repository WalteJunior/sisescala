<?php
$id = (int) $_GET['id_func'];
$sql = mysqli_query($con, "select * from funcionario, endereco 
        where funcionario.id_func = $id and $id = endereco.id_func;");
$row = mysqli_fetch_array($sql);
?>
<div id="main" class="container-fluid">
	<br>
	<h3 class="page-header">Editar registro do Funcionário - <?php echo $id; ?></h3>

	<!-- Área de campos do formulário de edição-->
	<form action="?page=atualiza_func&id_func=<?php echo $row['id_func']; ?>" method="post">

		<!-- 1ª LINHA -->
		<div class="row">
			<div class="form-group col-md-2">
				<label for="id_func">Id funcionário</label>
				<input type="text" class="form-control" name="id_func" readonly value="<?php echo $row["id_func"]; ?>">
			</div>
			<div class="form-group col-md-2">
				<label for="nome_func">Nome do Funcionário</label>
				<input type="text" class="form-control" name="nome_func" readonly value="<?php echo $row["nome_func"]; ?>">
			</div>
			<div class="form-group col-md-2">
				<label for="nome">Telefone</label>
				<input type="tel" class="form-control" name="telefone_func" readonly value="<?php echo $row["telefone_func"]; ?>">
			</div>
			<div class="form-group col-md-2">
				<label for="nome">E-mail</label>
				<input type="email" class="form-control" name="email_func" readonly value="<?php echo $row["email_func"]; ?>">
			</div>
			<div class="form-group col-md-2">
				<label for="sexo">Sexo</label>
				<select class="form-control" name="sexo_func" disabled>
					<?php
					if ($row["sexo_func"] == "M")
						echo '<option selected="selected" value="M">Masculino</option><option value="F">Feminino</option>';
					else
						echo '<option value="M">Masculino</option><option selected="selected" value="F">Feminino</option>';
					?>
				</select>
			</div>

			<!-- O campo 'Cargo' continua habilitado -->
			<div class="form-group col-md-2">
    <label for="cargo">Cargo</label>
    <select class="form-control" name="cargo_func">
        <option value="OP" <?php if($row["cargo_func"] == "OP") echo 'selected="selected"'; ?>>Operador</option>
        <option value="TC" <?php if($row["cargo_func"] == "TC") echo 'selected="selected"'; ?>>Técnico</option>
        <option value="AX" <?php if($row["cargo_func"] == "AX") echo 'selected="selected"'; ?>>Auxiliar</option>
        <option value="INSP" <?php if($row["cargo_func"] == "INSP") echo 'selected="selected"'; ?>>Inspetor</option>
    </select>
</div>


		</div>

		<!-- Endereço -->
		<div class="row">
			<input type="number" class="form-control" name="id_end" hidden value="<?php echo $row["id_end"]; ?>">

			<div class="form-group col-md-2">
				<label for="cep_end">Cep</label>
				<input type="number" class="form-control" name="cep_end" readonly value="<?php echo $row["cep_end"]; ?>">
			</div>

			<div class="form-group col-md-2">
				<label for="rua_end">Rua</label>
				<input type="text" class="form-control" name="rua_end" readonly value="<?php echo $row["rua_end"]; ?>">
			</div>

			<div class="form-group col-md-2">
				<label for="compl_end">Complemento</label>
				<input type="text" class="form-control" name="compl_end" readonly value="<?php echo $row["compl_end"]; ?>">
			</div>

			<div class="form-group col-md-2">
				<label for="bairro_end">Bairro</label>
				<input type="text" class="form-control" name="bairro_end" readonly value="<?php echo $row["bairro_end"]; ?>">
			</div>

			<div class="form-group col-md-2">
				<label for="cidade_end">Cidade</label>
				<input type="text" class="form-control" name="cidade_end" readonly value="<?php echo $row["cidade_end"]; ?>">
			</div>

			<div class="form-group col-md-2">
				<label for="estado_end">Estado</label>
				<input type="text" class="form-control" name="estado_end" readonly value="<?php echo $row["estado_end"]; ?>">
			</div>
		</div>
		<hr />

		<!-- Botões de Ação -->
		<div id="actions" class="row">
			<div class="col-md-12">
				<a href="?page=lista_funcsup" class="btn btn-secondary">Voltar</a>
				<button type="submit" class="btn btn-primary">Salvar Alterações</button>
			</div>
		</div>
	</form>
</div>
