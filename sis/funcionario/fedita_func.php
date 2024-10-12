<?php
$id = (int) $_GET['id_func'];
$sql = mysqli_query($con, "select * from funcionario, endereco, setor 
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
				<select class="form-control" name="sexo_func" readonly>
					<?php
					if ($row["sexo_func"] == "M")
						echo '<option selected="selected" value="M">Masculino</option><option value="F">Feminino</option>';
					else
						echo '<option value="M">Masculino</option><option selected="selected" value="F">Feminino</option>';
					?>
				</select>
			</div>

			<div class="form-group col-md-2">
				<label for="nome_st">Setor</label>
				<input type="text" class="form-control" name="nome_st" readonly value="<?php echo $row["nome_st"]; ?>">
			</div>

			<div class="form-group col-md-2">
				<label for="cargo">Cargo</label>
				<select class="form-control" name="cargo_func">
					<?php
					switch($row["cargo_func"]){
						case "":
							echo '<option selected="selected" value="">---------</option><option value="OP">Operador</option><option value="TC">Tecnico</option>
							<option value="AX">Auxiliar</option> <option value="INSP">Inspetor</option>';
						break;
						case "OP":
							echo '<option value="">---------</option><option selected="selected" value="OP">Operador</option><option value="TC">Tecnico</option>
							<option value="AX">Auxiliar</option> <option value="INSP">Inspetor</option>';
						break;

						case "TC":
							echo '<option value="">---------</option><option value="OP">Operador</option><option selected="selected" value="TC">Tecnico</option> <option value="AX">Auxiliar</option> <option value="INSP">Inspetor</option>';
						break;
						
						case "AX":
							echo '<option value="">---------</option><option value="OP">Operador</option><option value="TC">Tecnico</option><option selected="selected" value="AX">Auxiliar</option><option value="INSP">Inspetor</option>';
						break;

						case "INSP":
							echo '<option value="">---------</option><option value="OP">Operador</option><option value="TC">Tecnico</option> <option value="AX">Auxiliar</option> <option selected="selected" value="INSP">Inspetor</option>';
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
		</div>
	</form>
</div>