<?php
// Inicie a sessão para acessar as variáveis de sessão

// Conexão com o banco de dados
$mysqli = new mysqli("localhost", "root", "", "sisescala");

if ($mysqli->connect_error) {
    die("Conexão falhou: " . $mysqli->connect_error);
}

// Pegar o ID do funcionário da query string
if (isset($_GET['id_func'])) {
    $id_func = (int) $_GET['id_func']; // Sanitizando como um inteiro
} else {
    die("ID do funcionário não fornecido.");
}

// Buscar dados da escala para o funcionário específico
$sql = "SELECT escala.*, nome_func FROM escala JOIN funcionario ON escala.id_func = funcionario.id_func WHERE escala.id_func = $id_func";
$result = $mysqli->query($sql);

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Escala de Trabalho</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2 class="mb-4">Escala de Trabalho</h2>
        <table class="table table-bordered table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>Data</th>
                    <th>Nome</th>
                    <th>Tipo de Turno</th>
                    <th>Hora de Início</th>
                    <th>Hora de Fim</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result && $result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . date("d/m/Y", strtotime($row['data'])) . "</td>"; // Formata a data
                        echo "<td>" . $row['nome_func'] . "</td>";
                        echo "<td>" . ucfirst($row['tipo_turno']) . "</td>"; // Capitaliza a primeira letra
                        echo "<td>" . date("H:i", strtotime($row['hora_inicio'])) . "</td>"; // Formata a hora de início
                        echo "<td>" . date("H:i", strtotime($row['hora_fim'])) . "</td>"; // Formata a hora de fim
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='5' class='text-center'>Nenhum registro encontrado.</td></tr>"; // Mensagem se não encontrar registros
                }
                ?>
            </tbody>
        </table>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

<?php
// Fechar a conexão com o banco de dados
$mysqli->close();
?>
