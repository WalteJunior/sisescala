<div id="main" class="container-fluid">
	<div id="top" class="row">
		<div class="col-md-10">
			<h2>Substituição</h2>
		</div>

		<div class="col-md-2">
			<!-- Chama o Formulário para adicionar alunos -->
			<a href="?page=fadd_sub" class="btn btn-primary pull-right h2">Nova substituição</a> 
		</div>
	</div>
	<hr/>
	<div><?php include "mensagens.php"; ?> </div>
	<!--top - Lista dos Campos-->
		<div id="list" class="row">
			<div class="table-responsive col-md-12">
				<?php
					$quantidade = 5;

					$pagina = (isset($_GET['pagina'])) ? (int)$_GET['pagina'] : 1;
					$inicio = ($quantidade * $pagina) - $quantidade;

					$data = mysqli_query($con, "select * from substituicao order by id desc;") or die(mysqli_error($con));
					
					if(isset($_SESSION['UsuarioNivel']) && $_SESSION['UsuarioNivel'] == 1){
						echo "<table class='table table-striped' cellspacing='0' cellpadding='0'>";
						echo "<thead><tr>";
						echo "<td><strong>Nº Registro</strong></td>"; 
						echo "<td><strong>Solicitante</strong></td>";
						echo "<td><strong>Motivo</strong></td>";
						echo "<td><strong>Data da substituição</strong></td>";  
						echo "<td><strong>Substituto</strong></td>";
						echo "<td><strong>Data do substituto</strong></td>";  
						echo "<td><strong>Status</strong></td>";  
						echo "<td class='actions d-flex justify-content-center'><strong>Ações</strong></td>"; 
						echo "</tr></thead><tbody>";
						
						while($info = mysqli_fetch_array($data)){ 
							echo "<tr>";
							echo "<td>".$info['id']."</td>";
							echo "<td>".$info['solicitante']."</td>";
							echo "<td>".$info['motivo']."</td>";
							echo "<td class='d-none d-md-table-cell'>".(!empty($info['data_solic']) ? date('d/m/Y', strtotime($info['data_solic'])) : '')."</td>"; 
							echo "<td>".$info['substituto']."</td>";
							echo "<td class='d-none d-md-table-cell'>".(!empty($info['data_subs']) ? date('d/m/Y', strtotime($info['data_subs'])) : '')."</td>"; 
							echo "<td>".$info['ativo_sub']."</td>";
							echo "<td class='actions btn-group-sm d-flex justify-content-center'>";
							echo "<a class='btn btn-warning btn-xs' href=?page=fedita_sub&id=".$info['id']."> Editar </a>"; 
							echo "<a href=?page=excluir_sub&id=".$info['id']." class='btn btn-danger btn-xs '> Excluir </a></td>";
							echo "</tr>";
						}
						echo "</tbody></table>";
					
					} else if(isset($_SESSION['UsuarioNivel']) && $_SESSION['UsuarioNivel'] == 2){
						echo "<table class='table table-striped' cellspacing='0' cellpadding='0'>";
						echo "<thead><tr>";
						echo "<td><strong>Nº Registro</strong></td>"; 
						echo "<td><strong>Solicitante</strong></td>";
						echo "<td><strong>Motivo</strong></td>";  
						echo "<td><strong>Status</strong></td>";  
						echo "<td class='actions d-flex justify-content-center'><strong>Ações</strong></td>"; 
						echo "</tr></thead><tbody>";
						
						while($info = mysqli_fetch_array($data)){ 
							echo "<tr>";
							echo "<td>".$info['id']."</td>";
							echo "<td>".$info['solicitante']."</td>";
							echo "<td>".$info['motivo']."</td>";
							echo "<td>".$info['ativo_sub']."</td>";
							echo "<td class='actions btn-group-sm d-flex justify-content-center'>";
							echo "<a class='btn btn-info btn-xs' href=?page=view_sub&id=".$info['id']."> Visualizar </a>";
					
							if($info['ativo_sub'] == 'Em Analise'){
								echo "<a class='btn btn-success btn-xs' href=?page=aprovar_sub&id=".$info['id'].">&nbsp;&nbsp;&nbsp;Aprovar&nbsp;&nbsp;</a>";

								echo "<a class='btn btn-danger btn-xs' href=?page=reprovar_sub&id=".$info['id']."> Reprovar </a>";
							} else if($info['ativo_sub'] == 'Aprovado'){
								echo "<a class='btn btn-danger btn-xs' href=?page=reprovar_sub&id=".$info['id'].">&nbsp;&nbsp;&nbsp;Reprovar&nbsp;&nbsp;</a>";

								echo "<a class='btn btn-warning btn-xs' href=?page=analise_sub&id=".$info['id']."> Em Analise </a>";
							} else {
								echo "<a class='btn btn-success btn-xs' href=?page=aprovar_sub&id=".$info['id'].">&nbsp;&nbsp;&nbsp;Aprovar&nbsp;&nbsp;</a>";

								echo "<a class='btn btn-warning btn-xs' href=?page=analise_sub&id=".$info['id']."> Em Analise </a>";
							}
							echo "</tr>";
						}
						echo "</tbody></table>";
					}
					
					echo "</tr></tbody></table>";
				?>				
			</div>
		</div><!--list-->

		<!-- PAGINAÇÃO -->
		<div id="bottom" class="row">
			<div class="col-md-12">
				<?php
					$sqlTotal 		= "select id from substituicao;";
					$qrTotal  		= mysqli_query($con, $sqlTotal) or die (mysqli_error($con));
					$numTotal 		= mysqli_num_rows($qrTotal);
					$totalpagina = (ceil($numTotal/$quantidade)<=0) ? 1 : ceil($numTotal/$quantidade);

					$exibir = 3;

					$anterior = (($pagina-1) <= 0) ? 1 : $pagina - 1;
					$posterior = (($pagina+1) >= $totalpagina) ? $totalpagina : $pagina+1;

					echo "<ul class='pagination'>";
					echo "<li class='page-item'><a class='page-link' href='?page=lista_sub&pagina=1'> Primeira</a></li> "; 
					echo "<li class='page-item'><a class='page-link' href=\"?page=lista_sub&pagina=$anterior\"> Anterior</a></li> ";

					echo "<li class='page-item'><a class='page-link' href='?page=lista_sub&pagina=".$pagina."'><strong>".$pagina."</strong></a></li> ";

					for($i = $pagina+1; $i < $pagina+$exibir; $i++){
						if($i <= $totalpagina)
						echo "<li class='page-item'><a class='page-link' href='?page=lista_sub&pagina=".$i."'> ".$i." </a></li> ";
					}

					echo "<li class='page-item'><a class='page-link' href=\"?page=lista_sub&pagina=$posterior\"> Pr&oacute;xima</a></li> ";
					echo "<li class='page-item'><a class='page-link' href=\"?page=lista_sub&pagina=$totalpagina\"> &Uacute;ltima</a></li></ul>";

				?>	
			</div>
		</div><!--bottom-->
</div><!--main-->
