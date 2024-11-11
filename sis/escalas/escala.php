<div id="list" class="container-fluid">
    <div class="table-responsive col-md-12">

        <div class="d-flex justify-content-between align-items-center col-md-11">
            <h3>Lista de Escalas</h3>
            <a href="./relatorio/par_sup_adm.php" target="_blank" class="btn btn-secondary mb-3">Gerar Relatório</a>
        </div>
       
        <hr>
        <?php
        // Conexão com o banco de dados
        $con = mysqli_connect('localhost', 'root', '', 'sisescala');

        // Verifica a conexão
        if (!$con) {
            die("Falha na conexão: " . mysqli_connect_error());
        }

        $quantidade = 10;

        $pagina = (isset($_GET['pagina'])) ? (int)$_GET['pagina'] : 1;
        $inicio = ($quantidade * $pagina) - $quantidade;

        // Consulta para buscar os dados do funcionário
        $data = mysqli_query($con, "SELECT * FROM funcionario INNER JOIN endereco ON funcionario.id_func = endereco.id_func limit $inicio, $quantidade; ");

        // Verifica se a consulta foi bem-sucedida
        if ($data && mysqli_num_rows($data) > 0) {
            echo '<div class="container">';
            echo '<div class="row">';
            echo '<div class="col-md-12">';
            echo '<table class="table table-striped" style="background-color: #e0f7fa;">'; // Cor de fundo azul claro
            echo '<thead style="background-color: #007bff; color: white;">'; // Cabeçalho com azul mais escuro e texto branco
            echo '<tr>';
            echo '<th style="width: 25%;"><strong>Nome</strong></th>'; // Definindo largura de 25% para o título "Nome"
            echo '<th style="width: 25%;"><strong>Turno</strong></th>'; // Definindo largura de 15% para o título "Turno"
            echo '<th style="width: 25%;"><strong>Cargo</strong></th>'; // Definindo largura de 20% para o título "Cargo"
            echo '<th style="width: 25%;"><strong>Telefone</strong></th>'; // Definindo largura de 20% para o título "Telefone"
            echo '<th class="actions d-flex justify-content-center" style="width: 90%;"><strong>Escalas</strong></th>'; // Definindo largura de 20% para "Escalas" e alinhamento centralizado
            echo '</tr>';
            echo '</thead><tbody>';
        
            while ($info = mysqli_fetch_array($data)) {
                echo '<tr>';
                echo '<td>' . $info['nome_func'] . '</td>';
                echo '<td>' . $info['turno'] . '</td>';
                echo '<td>' . $info['cargo_func'] . '</td>';
                echo '<td>' . $info['telefone_func'] . '</td>';
                echo '<td class="actions btn-group-sm d-flex justify-content-center">';
                echo '<a class="btn btn-success btn-xs" href="?page=view_escala&id_func=' . $info['id_func'] . '">Visualizar</a>';
                echo '</td>';
                echo '</tr>';
            }
        
            echo '</tbody>';
            echo '</table>';
            echo '</div>'; // Fecha col-md-12
            echo '</div>'; // Fecha row
            echo '</div>'; // Fecha container
        } else {
            echo '<div class="alert alert-warning">Nenhum funcionário encontrado.</div>';
        }
        


        // Fecha a conexão
        ?>
    </div>
    <!-- PAGINAÇÃO -->
    <div id="bottom" class="row">
        <div class="col-md-12 d-flex justify-content-center">
            <?php
            $sqlTotal         = "select id_func from funcionario;";
            $qrTotal          = mysqli_query($con, $sqlTotal);
            $numTotal         = mysqli_num_rows($qrTotal);
            $totalpagina = (ceil($numTotal / $quantidade) <= 0) ? 1 : ceil($numTotal / $quantidade);

            $exibir = 3;

            $anterior = (($pagina - 1) <= 0) ? 1 : $pagina - 1;
            $posterior = (($pagina + 1) >= $totalpagina) ? $totalpagina : $pagina + 1;

            echo "<ul class='pagination'>";
            echo "<li class='page-item'><a class='page-link' href='?page=escala&pagina=1'> Primeira</a></li> ";
            echo "<li class='page-item'><a class='page-link' href=\"?page=escala&pagina=$anterior\"> Anterior</a></li> ";

            echo "<li class='page-item'><a class='page-link' href='?page=escala&pagina=" . $pagina . "'><strong>" . $pagina . "</strong></a></li> ";

            for ($i = $pagina + 1; $i < $pagina + $exibir; $i++) {
                if ($i <= $totalpagina)
                    echo "<li class='page-item'><a class='page-link' href='?page=escala&pagina=" . $i . "'> " . $i . " </a></li> ";
            }

            echo "<li class='page-item'><a class='page-link' href=\"?page=escala&pagina=$posterior\"> Pr&oacute;xima</a></li> ";
            echo "<li class='page-item'><a class='page-link' href=\"?page=escala&pagina=$totalpagina\"> &Uacute;ltima</a></li></ul>";

            mysqli_close($con);
            ?>
        </div>
    </div><!--bottom-->

    <div>

    </div>
</div>