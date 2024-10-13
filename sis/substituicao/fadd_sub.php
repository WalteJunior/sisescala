<div id="main" class="container-fluid">
 	<div id="top" class="row">
		<div class="col-md-11">
			<h2>Substituições</h2>
		</div>

		<div class="col-md-2">
			<!-- Chama o Formulário para adicionar alunos -->
			<a href="?page=fadd_sub" class="btn btn-primary pull-right h2">Nova substituição</a> 
		</div>
	</div>
	<form action="?page=insere_sub" method="post">
		<!-- 1ª LINHA -->	
		<div class="row"> 
			<div class="form-group col-xs-12 col-sm-6 col-md-2">
				<label for="id">Nº Registro</label>
				<input type="text" class="form-control" name="id" readonly>
			</div>
			<div class="form-group col-xs-12 col-sm-6 col-md-2">
				<label for="solicitante">Solicitante</label>
				<input type="text" class="form-control" name="solicitante" ></input>
			</div>
			<div class="form-group col-xs-12 col-sm-6 col-md-5">
				<label for="motivo">Motivo</label>
				<textarea class="form-control" name="motivo" ></textarea>
			</div>
			<div class="form-group col-xs-12 col-sm-6 col-md-3">
				<label for="data_solic">Data da substituição</label>
				<input type="date" class="form-control" name="data_solic" >
			</div>
			<div class="form-group col-xs-12 col-sm-6 col-md-2">
				<label for="substituto">Substituto</label>
				<input type="text" class="form-control" name="substituto" ></input>
			</div>
			<div class="form-group col-xs-12 col-sm-6 col-md-3">
				<label for="data_subs">Data da substituto</label>
				<input type="date" class="form-control" name="data_subs" >
			</div>
			<div class="form-group col-xs-12 col-sm-6 col-md-2" >
				<label for="ativo_sub">Status</label>
				<select class="form-control" name="ativo_sub">
					<option value="Em analise">Em analise </option>
				</select>
			</div>

		</div>
		<hr />
		<div id="actions" class="row">
			<div class="col-md-12">
				<button type="submit" class="btn btn-primary">Salvar</button>
				<a href="?page=lista_sub" class="btn btn-danger">Cancelar</a>
			</div>
		</div>
	</form> 
</div>
