<div id="list" class="container-fluid">
	<div class="table-responsive col-md-12">
		<?php
		// Consulta para buscar os dados do funcionário e seu respectivo endereço
		$data = mysqli_query($con, "SELECT * FROM funcionario INNER JOIN endereco ON funcionario.id_func = endereco.id_func;");
		
		// Verifica se a consulta foi bem-sucedida
		if($data && mysqli_num_rows($data) > 0){
			// Cria a tabela
			echo "<table class='table table-striped' cellspacing='0' cellpading='0'>";
			echo "<thead><tr>";
			echo "<th><strong>Nome</strong></th>";
			echo "<th><strong>Cargo</strong></th>";
			echo "<th><strong>Telefone</strong></th>";
			echo "<th class='actions d-flex justify-content-center'><strong>Escalas</strong></th>";
			echo "</tr></thead><tbody>";

			// Loop para preencher as linhas da tabela com os dados
			while($info = mysqli_fetch_array($data)){
				echo "<tr>";
				echo "<td>".$info['nome_func']."</td>";
				echo "<td>".$info['cargo_func']."</td>";
				echo "<td>".$info['telefone_func']."</td>";
				echo "<td class='actions btn-group-sm d-flex justify-content-center'>";
				echo "<a class='btn btn-success btn-xs' href='#' data-bs-toggle='modal' data-bs-target='#modal".$info['id_func']."'> Visualizar </a>";
				echo "</td>";
				echo "</tr>";

				// Modal (visualizar escalas)
				echo "
				<div class='modal fade' id='modal".$info['id_func']."' tabindex='-1' aria-labelledby='modalLabel".$info['id_func']."' aria-hidden='true'>
					<div class='modal-dialog modal-lg'>
						<div class='modal-content'>
							<div class='modal-header'>
								<h5 class='modal-title' id='modalLabel".$info['id_func']."'>Escalas de Trabalho - ".$info['nome_func']."</h5>
								<button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
							</div>
							<div class='modal-body'>
								<!-- Aqui você pode gerar o calendário de escalas deste funcionário -->
								<p>Exibir a escala de trabalho de 12x36 do funcionário ".$info['nome_func'].".</p>
							</div>
							<div class='modal-footer'>
								<button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Fechar</button>
							</div>
						</div>
					</div>
				</div>";
			}

			echo "</tbody></table>";
		} else {
			echo "<p>Nenhum funcionário encontrado.</p>";
		}
		?>
	</div>
</div>