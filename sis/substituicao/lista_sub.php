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

					$data = mysqli_query($con, "select * from substituicao order by id;") or die(mysqli_error($con));
					
					echo "<table class='table table-striped' cellspacing='0' cellpading='0'>";
					echo "<thead><tr>";
					echo "<td><strong>ID</strong></td>"; 
					echo "<td><strong>Motivo</strong></td>";
					echo "<td><strong>Data da substituicao</strong></td>";  
					echo "<td class='actions d-flex justify-content-center'><strong>Ações</strong></td>"; 
					echo "</tr></thead><tbody>";
					while($info = mysqli_fetch_array($data)){ 
						echo "<tr>";
						echo "<td>".$info['id']."</td>";
						echo "<td>".$info['motivo']."</td>";
						echo "<td class='d-none d-md-table-cell'>".date('d/m/Y',strtotime($info['data']))."</td>"; //Funções para converter formato da data do MySQL
						echo "<td class='actions btn-group-sm d-flex justify-content-center'>";
						echo "<a class='btn btn-success btn-xs' href=?page=view_sub&id=".$info['id']."> Visualizar </a>";
						echo "<a class='btn btn-warning btn-xs' href=?page=fedita_sub&id=".$info['id']."> Editar </a>"; 
						echo "<a href=?page=excluir_sub&id=".$info['id']." class='btn btn-danger btn-xs'> Excluir </a></td>";
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
