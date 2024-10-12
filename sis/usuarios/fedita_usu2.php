<?php
	$id = (int) $_GET['id'];
	$sql = mysqli_query($con, "select * from usuarios, funcionario, endereco where id = '".$id."';");
	$row = mysqli_fetch_array($sql);
?>
<div id="main" class="container-fluid">
	<br><h3 class="page-header">Editar registro da Usuário - <?php echo $id;?></h3>
	
	<!-- Área de campos do formulário de edição-->
	
	<form action="?page=atualiza_usu2&id=<?php echo $row['id']; ?>" method="post">

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
	<input type="number" class="form-control" name="id_end" hidden value="<?php echo $row["id_end"]; ?>">
	
	<div class="form-group col-md-2">
		<label for="cep_end">Cep</label>
		<input type="number" class="form-control" min="0" name="cep_end" value="<?php echo $row["cep_end"]; ?>">
	</div>

	<div class="form-group col-md-2">
		<label for="rua_end">Rua</label>
		<input type="text" class="form-control" name="rua_end" value="<?php echo $row["rua_end"]; ?>">
	</div>

		<div class="form-group col-md-2">
			<label for="compl_end">Complemento</label>
			<input type="text" class="form-control" name="compl_end" value="<?php echo $row["compl_end"]; ?>">
		</div>

		<div class="form-group col-md-2">
			<label for="bairro_end">Bairro</label>
			<input type="text" class="form-control" name="bairro_end" value="<?php echo $row["bairro_end"]; ?>">
		</div>

		<div class="form-group col-md-2">
			<label for="cidade_end">Cidade</label>
			<input type="text" class="form-control" name="cidade_end" value="<?php echo $row["cidade_end"]; ?>">
		</div>

		<div class="form-group col-md-2">
			<label for="estado_end">Estado</label>
			<input type="text" class="form-control" name="estado_end" value="<?php echo $row["estado_end"]; ?>">
		</div>
	</div>
</div>
	
	<hr/>
	<div id="actions" class="container-md-5">
	 <div class="col-md-10">
		 <button type="submit" class="btn btn-primary">Salvar Alterações</button>
		 <button type="button" class="btn btn-secondary" id="btnPesquisar">Consultar Cep</button>
		 <a href="?page=perfil_func" class="btn btn-default">Voltar</a>
	 </div>
	</div>
</div>
<script src="/js/cadastro.js>