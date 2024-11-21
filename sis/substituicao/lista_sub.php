<head>
	<style>
		.btn-orange {
			background-color: #f0ad4e;
		}
	</style>
</head>
<div id="main" class="container-fluid">
	<div id="top" class="row">
		<div class="col-md-10">
			<h2>Substituições</h2>
		</div>

		<div class="col-md-2">
			<!-- Verifica se o nível do usuário é 1 antes de exibir o botão -->
			<?php if (isset($_SESSION['UsuarioNivel']) && $_SESSION['UsuarioNivel'] == 1): ?>
				<a href="?page=fadd_sub" class="btn btn-primary pull-right h2">Pedir substituição</a>
			<?php endif; ?>
		</div>
	</div>
	<hr/>
	<div><?php include "mensagens.php"; ?></div>
	<!--top - Lista dos Campos-->
	<div id="list" class="row">
		<div class="table-responsive col-md-12">
			<?php
				$quantidade = 5;
				$pagina = (isset($_GET['pagina'])) ? (int)$_GET['pagina'] : 1;
				$inicio = ($quantidade * $pagina) - $quantidade;

				$data = mysqli_query($con, "SELECT * FROM substituicao ORDER BY id DESC;") or die(mysqli_error($con));

				if (isset($_SESSION['UsuarioNivel']) && $_SESSION['UsuarioNivel'] == 1) {
					// Tabela com cor de fundo personalizada
					echo "<table class='table table-striped table-bordered' style='background-color: #e0f7fa;' cellspacing='0' cellpadding='0'>";
					echo "<thead style='background-color: #007bff; color: white;'>";
					echo "<tr>";
					echo "<td><strong>Nº Registro</strong></td>"; 
					echo "<td><strong>Solicitante</strong></td>";
					echo "<td><strong>Motivo</strong></td>";
					echo "<td><strong>Data da Falta</strong></td>";  
					echo "<td><strong>Substituto</strong></td>";
					echo "<td><strong>Data da Substituição</strong></td>";  
					echo "<td><strong>Status</strong></td>";  

					// Exibe a coluna Ações no cabeçalho se o usuário logado for o solicitante
					echo "<td class='actions d-flex justify-content-center'><strong>Ações</strong></td>";
					
					echo "</tr></thead><tbody>";
					
					while ($info = mysqli_fetch_array($data)) {
						// Verifica se o usuário logado é o solicitante para essa substituição
						$isSolicitante = ($_SESSION['UsuarioNome'] == $info['solicitante']);
						
						echo "<tr>";
						echo "<td>".$info['id']."</td>";
						echo "<td>".$info['solicitante']."</td>";
						echo "<td>".$info['motivo']."</td>";
						echo "<td class='d-none d-md-table-cell'>".(!empty($info['data_solic']) ? date('d/m/Y', strtotime($info['data_solic'])) : '')."</td>"; 
						echo "<td>".$info['substituto']."</td>";
						echo "<td class='d-none d-md-table-cell'>".(!empty($info['data_subs']) ? date('d/m/Y', strtotime($info['data_subs'])) : '')."</td>"; 
						echo "<td>".$info['ativo_sub']."</td>";
						
						// Exibe o grupo de ações somente para o solicitante
						if ($isSolicitante) {
							echo "<td class='actions btn-group-sm d-flex justify-content-center'>";
							echo "<a class='btn btn-warning btn-xs' href='?page=fedita_sub&id=".$info['id']."'> Editar </a>"; 
							echo "<a href='?page=excluir_sub&id=".$info['id']."' class='btn btn-danger btn-xs'> Excluir </a>";
							echo "</td>";
						} else {
							echo "<td></td>"; // Exibe célula vazia para outros funcionários
						}
						
						echo "</tr>";
					}
					echo "</tbody></table>";
					
				} else if (isset($_SESSION['UsuarioNivel']) && $_SESSION['UsuarioNivel'] == 2) {
					echo "<table class='table table-striped table-bordered' style='background-color: #e0f7fa;' cellspacing='0' cellpadding='0'>";
					echo "<thead style='background-color: #007bff; color: white;'>";
					echo "<tr>";
					echo "<td><strong>Nº Registro</strong></td>"; 
					echo "<td><strong>Solicitante</strong></td>";
					echo "<td><strong>Motivo</strong></td>";  
					echo "<td><strong>Data da Falta</strong></td>"; 
					echo "<td><strong>Data da Substituição</strong></td>"; 
					echo "<td><strong>Status</strong></td>";  
					echo "<td class='actions d-flex justify-content-center'><strong>Ações</strong></td>"; 
					echo "</tr></thead><tbody>";
					
					while ($info = mysqli_fetch_array($data)) { 
						echo "<tr>";
						echo "<td>".$info['id']."</td>";
						echo "<td>".$info['solicitante']."</td>";
						echo "<td>".$info['motivo']."</td>";
						echo "<td class='d-none d-md-table-cell'>".(!empty($info['data_solic']) ? date('d/m/Y', strtotime($info['data_solic'])) : '')."</td>";
						echo "<td class='d-none d-md-table-cell'>".(!empty($info['data_subs']) ? date('d/m/Y', strtotime($info['data_subs'])) : '')."</td>";
						echo "<td>".$info['ativo_sub']."</td>";
						echo "<td class='actions btn-group-sm d-flex justify-content-center'>";
						echo "<a class='btn btn-info btn-xs' href='?page=view_sub&id=".$info['id']."'> Visualizar </a>";
						
						if ($info['ativo_sub'] == 'Em analise') {
							echo "<a class='btn btn-success btn-xs' href='?page=aprovar_sub&id=".$info['id']."'>&nbsp;&nbsp;&nbsp;Aprovar&nbsp;&nbsp;</a>";
							echo "<a class='btn btn-danger btn-xs' href='?page=reprovar_sub&id=".$info['id']."'> Reprovar </a>";
						} else if ($info['ativo_sub'] == 'Aprovado') {
							echo "<a class='btn btn-danger btn-xs' href='?page=reprovar_sub&id=".$info['id']."'>&nbsp;&nbsp;&nbsp;Reprovar&nbsp;&nbsp;</a>";
							echo "<a class='btn btn-warning btn-xs' href='?page=analise_sub&id=".$info['id']."'> Em Analise </a>";
						} else {
							echo "<a class='btn btn-success btn-xs' href='?page=aprovar_sub&id=".$info['id']."'>&nbsp;&nbsp;&nbsp;Aprovar&nbsp;&nbsp;</a>";
							echo "<a class='btn btn-warning btn-xs' href='?page=analise_sub&id=".$info['id']."'> Em Analise </a>";
						}
						echo "</tr>";
					}
					echo "</tbody></table>";
				} else if (isset($_SESSION['UsuarioNivel']) && $_SESSION['UsuarioNivel'] == 3) {
					echo "<table class='table table-striped table-bordered' style='background-color: #e0f7fa;' cellspacing='0' cellpadding='0'>";
					echo "<thead style='background-color: #007bff; color: white;'>";
					echo "<tr>";
					echo "<td><strong>Nº Registro</strong></td>"; 
					echo "<td><strong>Solicitante</strong></td>";
					echo "<td><strong>Motivo</strong></td>";  
					echo "<td><strong>Data da Falta</strong></td>"; 
					echo "<td><strong>Data da Substituição</strong></td>";
					echo "<td><strong>Status</strong></td>";  
					echo "<td class='actions d-flex justify-content-center'><strong>Ações</strong></td>"; 
					echo "</tr></thead><tbody>";
					
					while ($info = mysqli_fetch_array($data)) { 
						echo "<tr>";
						echo "<td>".$info['id']."</td>";
						echo "<td>".$info['solicitante']."</td>";
						echo "<td>".$info['motivo']."</td>";
						echo "<td class='d-none d-md-table-cell'>".(!empty($info['data_solic']) ? date('d/m/Y', strtotime($info['data_solic'])) : '')."</td>";
						echo "<td class='d-none d-md-table-cell'>".(!empty($info['data_subs']) ? date('d/m/Y', strtotime($info['data_subs'])) : '')."</td>";
						echo "<td>".$info['ativo_sub']."</td>";
						echo "<td class='actions btn-group-sm d-flex justify-content-center'>";
						echo "<a class='btn btn-info btn-xs' href='?page=view_sub&id=".$info['id']."'> Visualizar </a>";
						
						if ($info['ativo_sub'] == 'Em analise') {
							echo "<a class='btn btn-success btn-xs' href='?page=aprovar_sub&id=".$info['id']."'>&nbsp;&nbsp;&nbsp;Aprovar&nbsp;&nbsp;</a>";
							echo "<a class='btn btn-danger btn-xs' href='?page=reprovar_sub&id=".$info['id']."'> Reprovar </a>";
							echo "<a class='btn btn-warning btn-xs' href='?page=fedita_sub&id=".$info['id']."'> Editar </a>"; 
							echo "<a href='?page=excluir_sub&id=".$info['id']."' class='btn btn-danger btn-xs'> Excluir </a></td>";
						} else if ($info['ativo_sub'] == 'Aprovado') {
							echo "<a class='btn btn-danger btn-xs' href='?page=reprovar_sub&id=".$info['id']."'>&nbsp;&nbsp;&nbsp;Reprovar&nbsp;&nbsp;</a>";
							echo "<a class='btn btn-warning btn-xs' href='?page=analise_sub&id=".$info['id']."'> Em Analise </a>";
							echo "<a class='btn btn-warning btn-xs' href='?page=fedita_sub&id=".$info['id']."'> Editar </a>"; 
							echo "<a href='?page=excluir_sub&id=".$info['id']."' class='btn btn-danger btn-xs'> Excluir </a></td>";
						} else {
							echo "<a class='btn btn-success btn-xs' href='?page=aprovar_sub&id=".$info['id']."'>&nbsp;&nbsp;&nbsp;Aprovar&nbsp;&nbsp;</a>";
							echo "<a class='btn btn-warning btn-xs' href='?page=analise_sub&id=".$info['id']."'> Em Analise </a>";
							echo "<a class='btn btn-warning btn-xs' href='?page=fedita_sub&id=".$info['id']."'> Editar </a>"; 
							echo "<a href='?page=excluir_sub&id=".$info['id']."' class='btn btn-danger btn-xs'> Excluir </a></td>";
						}
					}
					echo "</tbody></table>";
				}
			?>
		</div><!-- Div Table -->
	</div><!-- Div List -->
</div><!-- Main Container -->
