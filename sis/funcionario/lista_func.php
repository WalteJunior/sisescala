<div id="main" class="container-fluid">
	<div id="top" class="row">
		<div class="col-md-11">
			<h2>Funcionários</h2>
		</div>

		<!-- <div class="col-md-2">
			 Chama o Formulário para adicionar alunos 
			<a href="?page=fadd_func" class="btn btn-primary pull-left h2">Novo Funcionário</a> 
		</div> -->
	</div>
	<hr/>

	<div> <?php include "mensagens.php"; ?> </div>

	<div id="list" class="row">
        <div class="table-responsive col-md-12">
        <?php
            $quantidade = 5;

            $pagina = (isset($_GET['pagina'])) ? (int)$_GET['pagina'] : 1;
            $inicio = ($quantidade * $pagina) - $quantidade;

            $data = mysqli_query($con, "select * from funcionario, endereco, setor where funcionario.id_func = endereco.id_func limit $inicio, $quantidade;");
            
            // Tabela com cor de fundo personalizada
            echo "<table class='table table-striped table-bordered' style='background-color: #e0f7fa;' cellspacing='0' cellpadding='0'>"; // Fundo azul claro
            echo "<thead style='background-color: #007bff; color: white;'>"; // Cabeçalho com azul escuro e texto branco
            echo "<tr>"; 
            echo "<td><strong>Nome</strong></td>"; 
            echo "<td><strong>Sexo</strong></td>";
            echo "<td><strong>Setor</strong></td>";
            echo "<td><strong>Turno</strong></td>";
            echo "<td><strong>Cargo</strong></td>";
            echo "<td class='actions d-flex justify-content-center'><strong>Ações</strong></td>"; 
            echo "</tr></thead><tbody>";

            while ($info = mysqli_fetch_array($data)) { 
                echo "<tr>";
                echo "<td>".$info['nome_func']."</td>";
                echo "<td>".$info['sexo_func']."</td>";
                echo "<td>".$info['nome_st']."</td>";
                echo "<td>".$info['turno']."</td>";
                echo "<td>".$info['cargo_func']."</td>";
                echo "<td class='actions btn-group-sm d-flex justify-content-center'>";
                echo "<a class='btn btn-success btn-xs' href='?page=view_func&id_func=".$info['id_func']."'> Visualizar </a>";
                echo "<a class='btn btn-warning btn-xs' href='?page=fedita_func&id_func=".$info['id_func']."'> Editar </a>"; 
                echo "<a href='?page=excluir_func&id_func=".$info['id_func']."' class='btn btn-danger btn-xs'> Excluir </a>";
                echo "</td>";
                echo "</tr>";
            }

            echo "</tbody></table>";
        ?>

    </div>
    <!-- PAGINAÇÃO -->
		<div id="bottom" class="row">
			<div class="col-md-12">
				<?php
					$sqlTotal 		= "select id_func from funcionario;";
					$qrTotal  		= mysqli_query($con, $sqlTotal);
					$numTotal 		= mysqli_num_rows($qrTotal);
					$totalpagina = (ceil($numTotal/$quantidade)<=0) ? 1 : ceil($numTotal/$quantidade);

					$exibir = 3;

					$anterior = (($pagina-1) <= 0) ? 1 : $pagina - 1;
					$posterior = (($pagina+1) >= $totalpagina) ? $totalpagina : $pagina+1;

					echo "<ul class='pagination'>";
					echo "<li class='page-item'><a class='page-link' href='?page=lista_func&pagina=1'> Primeira</a></li> "; 
					echo "<li class='page-item'><a class='page-link' href=\"?page=lista_func&pagina=$anterior\"> Anterior</a></li> ";

					echo "<li class='page-item'><a class='page-link' href='?page=lista_func&pagina=".$pagina."'><strong>".$pagina."</strong></a></li> ";

					for($i = $pagina+1; $i < $pagina+$exibir; $i++){
						if($i <= $totalpagina)
						echo "<li class='page-item'><a class='page-link' href='?page=lista_func&pagina=".$i."'> ".$i." </a></li> ";
					}

					echo "<li class='page-item'><a class='page-link' href=\"?page=lista_func&pagina=$posterior\"> Pr&oacute;xima</a></li> ";
					echo "<li class='page-item'><a class='page-link' href=\"?page=lista_func&pagina=$totalpagina\"> &Uacute;ltima</a></li></ul>";

				?>	
			</div>
		</div><!--bottom-->
</div>

</div>
