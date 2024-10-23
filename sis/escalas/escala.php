<div id="list" class="container-fluid">
    <div class="table-responsive col-md-12">
        <?php
        // Conexão com o banco de dados
        $con = mysqli_connect('localhost', 'root', '', 'sisescala');

        // Verifica a conexão
        if (!$con) {
            die("Falha na conexão: " . mysqli_connect_error());
        }

        // Consulta para buscar os dados do funcionário
        $data = mysqli_query($con, "SELECT * FROM funcionario INNER JOIN endereco ON funcionario.id_func = endereco.id_func;");

        // Verifica se a consulta foi bem-sucedida
        if ($data && mysqli_num_rows($data) > 0) {
            echo '<div class="container">';
            echo '<div class="row">';
            echo '<div class="col-md-12">';
            echo '<table class="table table-striped" style="background-color: #e0f7fa;">'; // Cor de fundo azul claro
            echo '<thead style="background-color: #007bff; color: white;">'; // Cabeçalho com azul mais escuro e texto branco
            echo '<tr><th><strong>Nome</strong></th>';
            echo '<th><strong>Cargo</strong></th>';
            echo '<th><strong>Telefone</strong></th>';
            echo '<th class="actions d-flex justify-content-center"><strong>Escalas</strong></th>';
            echo '</tr></thead><tbody>';
        
            while ($info = mysqli_fetch_array($data)) {
                echo '<tr>';
                echo '<td>' . $info['nome_func'] . '</td>';
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
        mysqli_close($con);
        ?>
    </div>
</div>
