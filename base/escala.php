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
            // Cria a tabela
            echo "<table class='table table-striped' cellspacing='0' cellpadding='0'>";
            echo "<thead><tr>";
            echo "<th><strong>Nome</strong></th>";
            echo "<th><strong>Cargo</strong></th>";
            echo "<th><strong>Telefone</strong></th>";
            echo "<th class='actions d-flex justify-content-center'><strong>Escalas</strong></th>";
            echo "</tr></thead><tbody>";

            // Loop para preencher as linhas da tabela com os dados
            while ($info = mysqli_fetch_array($data)) {
                echo "<tr>";
                echo "<td>".$info['nome_func']."</td>";
                echo "<td>".$info['cargo_func']."</td>";
                echo "<td>".$info['telefone_func']."</td>";
                echo "<td class='actions btn-group-sm d-flex justify-content-center'>";
                // Botão para visualizar escala, passando o ID do funcionário como parâmetro corretamente
                echo "<a class='btn btn-success btn-xs' href='?page=view_escala&id_func=".$info['id_func']."'>Visualizar</a>";
                echo "</td>";
                echo "</tr>";
            }

            echo "</tbody></table>";
        } else {
            echo "<p>Nenhum funcionário encontrado.</p>";
        }

        // Fecha a conexão
        mysqli_close($con);
        ?>
    </div>
</div>
