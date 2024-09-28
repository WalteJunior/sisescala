<div id="main" class="container-fluid">
 	<div id="top" class="row">
		<div class="col-md-11">
			<h2>Funcionários</h2>
		</div>

		<div class="col-md-2">
			<!-- Chama o Formulário para adicionar funcutos -->
			<a href="?page=fadd_func" class="btn btn-primary pull-right h2">Novo Funcionário</a> 
		</div>
	</div>
	<form action="?page=insere_func" method="post">
		<!-- 1ª LINHA -->	
		<div class="row"> 
			<div class="form-group col-md-2">
				<label for="id_func">Id funcionario</label>
				<input type="text" class="form-control" name="id_func" readonly>
			</div>
			<div class="form-group col-md-5">
				<label for="nome_func">Nome do Funcionário</label>
				<input type="text" class="form-control" name="nome_func">
			</div>
			<div class="form-group col-md-3">
				<label for="">Telefone</label>
				<input type="tel" class="form-control" name="telefone_func">
			</div>
			<div class="form-group col-md-3">
				<label for="">E-mail</label>
				<input type="email" class="form-control" name="email_func">
			</div>
			<div class="form-group col-md-2">
				<label for="sexo_aluno">Sexo</label>
				<select class="form-control" name="sexo_func">
					<option> --------- </option>
					<option value="M">Masculino</option>
					<option value="F">Feminino</option>
				</select>
			</div>
	
			<div class="form-group col-md-2">
				<label for="cargo_func">Cargo</label>
				<select class="form-control" name="cargo_func">
					<option> --------- </option>
					<option value="OP">Operador</option>
					<option value="TC">Técnico</option>
				</select>
			</div>
		</div>

		<!-- Endereço -->
		<input type="number" class="form-control" name="id_end" hidden>
		<div class="row"> 
			<div class="form-group col-md-6">
				<label for="cep_end">Cep</label>
				<input type="number" class="form-control" name="cep_end">
			</div>

			<div class="form-group col-md-6">
				<label for="rua_end">Rua</label>
				<input type="text" class="form-control" name="rua_end">
			</div>
		</div>
		<!-- 3ª LINHA -->
		<div class="row"> 
			<div class="form-group col-md-4">
				<label for="compl_end">Complemento</label>
				<input type="text" class="form-control" name="compl_end">
			</div>
		 
			<div class="form-group col-md-4">
				<label for="bairro_end">Bairro</label>
				<input type="text" class="form-control" name="bairro_end">
			</div>

			<div class="form-group col-md-4">
				<label for="cidade_end">Cidade</label>
				<input type="text" class="form-control" name="cidade_end">
			</div>

			<div class="form-group col-md-4">
				<label for="estado_end">Estado</label>
				<input type="text" class="form-control" name="estado_end">
			</div>

		</div>
		<hr />
		<div id="actions" class="row">
			<div class="col-md-12">
				<button type="submit" class="btn btn-primary">Salvar</button>
				<a href="?page=lista_func" class="btn btn-danger">Cancelar</a>
			</div>
		</div>
	</form> 
</div>
