<?php
$id = (int) $_GET['id'];
$sql = mysqli_query($con, "
SELECT * 
FROM usuarios 
INNER JOIN funcionario ON usuarios.id_func = funcionario.id_func
INNER JOIN endereco ON endereco.id_func = funcionario.id_func
WHERE usuarios.id = $id
");
$row = mysqli_fetch_array($sql);
?>

<div id="main" class="container-fluid">
	<br>
	<h3 class="page-header">Edição de registro</h3>

	<!-- Área de campos do formulário de edição-->
	<form action="?page=atualiza_usu2&id=<?php echo $row['id']; ?>" method="post">
		<input type="hidden" name="id" value="<?php echo $row['id']; ?>">
		<input type="hidden" name="id_end" value="<?php echo $row['id_end']; ?>">

		<!-- 1ª LINHA -->
		<div class="row">
			<div class="form-group col-md-3">
				<label for="nome">Nome do Usuário</label>
				<input readonly type="text" class="form-control" name="nome" value="<?php echo $row["nome"]; ?>">
			</div>

			<div class="form-group col-md-3">
				<label for="usuario">Usuário</label>
				<input type="text" class="form-control" name="usuario" value="<?php echo $row["usuario"]; ?>">
			</div>

			<div class="form-group col-md-3">
				<label for="email">E-mail</label>
				<input type="email" class="form-control" name="email" value="<?php echo $row["email"]; ?>">
			</div>

			<div class="form-group col-md-3">
				<label for="dt_cad">Data da Edição</label>
				<input type="text" disabled="disabled" class="form-control" name="dt_cad" value="<?php echo date('d/m/Y'); ?>">
			</div>
		</div>

		<!-- 2º Linha -->
		<div class="row">
			<div class="form-group col-md-2">
				<label for="cep_end">Cep</label>
				<input type="text" class="form-control" name="cep_end" id="cep" value="<?php echo $row["cep_end"]; ?>">
			</div>

			<div class="form-group col-md-2">
				<label for="rua_end">Rua</label>
				<input type="text" class="form-control" name="rua_end" id="rua" value="<?php echo $row["rua_end"]; ?>">
			</div>

			<div class="form-group col-md-2">
				<label for="num_end">Número</label>
				<input type="text" class="form-control" name="num_end" id="num_end" value="<?php echo $row['num_end']; ?>">
			</div>

			<div class="form-group col-md-2">
				<label for="compl_end">Complemento</label>
				<input type="text" class="form-control" name="compl_end" id="complemento" value="<?php echo $row["compl_end"]; ?>">
			</div>

			<div class="form-group col-md-2">
				<label for="bairro_end">Bairro</label>
				<input type="text" class="form-control" name="bairro_end" id="bairro" value="<?php echo $row["bairro_end"]; ?>">
			</div>

			<div class="form-group col-md-2">
				<label for="cidade_end">Cidade</label>
				<input type="text" class="form-control" name="cidade_end" id="cidade" value="<?php echo $row["cidade_end"]; ?>">
			</div>

			<div class="form-group col-md-2">
				<label for="estado_end">Estado</label>
				<input type="text" class="form-control" name="estado_end" id="estado" value="<?php echo $row["estado_end"]; ?>">
			</div>
		</div>

		<hr />
		<div id="actions" class="container-md-5">
			<div class="col-md-10">
				<button type="submit" class="btn btn-primary">Salvar Alterações</button>
				<button type="button" class="btn btn-secondary" id="btnPesquisar">Consultar Cep</button>
				<a href="?page=perfil_func" class="btn btn-danger">Voltar</a>
			</div>
		</div>
	</form>
</div>

<script>
	const btnPesquisarCEP = document.querySelector("#btnPesquisar");
	btnPesquisarCEP.addEventListener("click", pesquisar);

	function pesquisar() {
		const inputDoCep = document.getElementById("cep");
		const valorDoCep = inputDoCep.value;
		const url = 'https://viacep.com.br/ws/' + valorDoCep + '/json/';

		fetch(url)
			.then(response => response.json())
			.then(data => {
				if (data.erro) {
					alert("O CEP DIGITADO ESTÁ INVÁLIDO");
					return;
				}
				atribuirCampos(data);
			})
			.catch(error => console.error("Erro ao buscar CEP:", error));
	}

	function atribuirCampos(data) {
		document.querySelector("#rua").value = data.logradouro;
		document.querySelector("#complemento").value = data.complemento;
		document.querySelector("#bairro").value = data.bairro;
		document.querySelector("#cidade").value = data.localidade;
		document.querySelector("#estado").value = data.uf;
	}
</script>
