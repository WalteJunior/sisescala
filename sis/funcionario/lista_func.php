<div id="main" class="container-fluid">
	<div id="top" class="row">
		<div class="col-md-11">
			<h2>Funcionários</h2>
		</div>

		<div class="col-md-2">
			<!-- Chama o Formulário para adicionar alunos -->
			<a href="?page=fadd_func" class="btn btn-primary pull-left h2">Novo Funcionário</a> 
		</div>
	</div>
	<hr/>

	<div> <?php include "mensagens.php"; ?> </div>

	<div id="list" class="row">
		<div class="table-responsive col-md-12">
			<?php
				$data = mysqli_query($con, "select * from funcionario, endereco where funcionario.id_func = endereco.id_func;");
				echo "<table class='table table-striped' cellspacing='0' cellpading='0'>";
				echo "<thead><tr>";
				echo "<td><strong>ID</strong></td>"; 
				echo "<td><strong>Nome</strong></td>"; 
				echo "<td><strong>Telefone</strong></td>";
				echo "<td><strong>E-mail</strong></td>";
				echo "<td><strong>Sexo</strong></td>";
				echo "<td><strong>Cargo</strong></td>";
				echo "<td><strong>Bairro</strong></td>";
				echo "<td><strong>Cidade</strong></td>";
				echo "<td class='actions d-flex justify-content-center'><strong>Ações</strong></td>"; 
				echo "</tr></thead><tbody>";
				while($info = mysqli_fetch_array($data)){ 
					echo "<tr>";
					echo "<td>".$info['id_func']."</td>";
					echo "<td>".$info['nome_func']."</td>";
					echo "<td>".$info['telefone_func']." </td>";
					echo "<td>".$info['email_func']." </td>";
					echo "<td>".$info['sexo_func']."</td>";
					echo "<td>".$info['cargo_func']."</td>";
					echo "<td>".$info['bairro_end']."</td>";
					echo "<td>".$info['cidade_end']."</td>";
					echo "<td class='actions btn-group-sm d-flex justify-content-center'>";
					echo "<a class='btn btn-success btn-xs' href=?page=view_func&id_func=".$info['id_func']."> Visualizar </a>";
					echo "<a class='btn btn-warning btn-xs' href=?page=fedita_func&id_func=".$info['id_func']."> Editar </a>"; 
					echo "<a href=?page=excluir_func&id_func=".$info['id_func']." class='btn btn-danger btn-xs'> Excluir </a></td>";
				}
				echo "</tr></tbody></table>";
			?>				
		</div>
	</div>
</div>
