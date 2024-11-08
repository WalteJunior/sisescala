<?php
$mysqli = new mysqli("localhost", "root", "", "sisescala");

if ($mysqli->connect_error) {
    die("Conexão falhou: " . $mysqli->connect_error);
}

// Verificar se o id_func foi passado pela URL
if (isset($_GET['id_func'])) {
    $id_func = (int) $_GET['id_func'];
} else {
    die("ID do funcionário não encontrado.");
}

// Buscar dados do funcionário
$sql = "SELECT nome_func FROM funcionario WHERE id_func = $id_func";
$result = $mysqli->query($sql);

if ($result->num_rows == 0) {
    die("Funcionário não encontrado com o ID: " . $id_func);
}

$row = $result->fetch_assoc();
$nome_funcionario = $row['nome_func'];

// Buscar dados da escala para o funcionário específico
$sql = "SELECT data, hora_inicio, hora_fim, tipo_turno 
        FROM escala 
        WHERE id_func = $id_func 
        ORDER BY data";
$result = $mysqli->query($sql);

// Incluir Bootstrap no cabeçalho
echo '
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <title>Escala do Funcionário - ' . $nome_funcionario . '</title>
</head>
<body class="bg-light">
<div class="container mt-5">
    <h2 class="text-center mb-4">Escala do Funcionário - ' . $nome_funcionario . '</h2>
';

if ($result->num_rows > 0) {
    $current_month = "";
    $months = [];
    $tables = [];

    while ($row = $result->fetch_assoc()) {
        $data = strtotime($row['data']);
        $month_year = date("F Y", $data);
        $month_key = date("M-Y", $data);  // Key para controle dos últimos 3 meses (ex: "Nov-2024")

        // Gerar nova tabela se o mês mudou
        if ($month_year !== $current_month) {
            // Remover o mês mais antigo se já houver 3 meses
            if (count($months) == 3) {
                array_shift($months);
                array_shift($tables);
            }
            $months[] = $month_key;
            $current_month = $month_year;
            $tables[$month_key] = "<div class='text-center'><h4>$month_year</h4></div>
                                   <table class='table table-striped' style='background-color: #e0f7fa;'>
                                   <thead style='background-color: #007bff; color: white;'>
                                   <tr><th>Data</th><th>Hora Início</th><th>Hora Fim</th><th>Turno</th></tr>
                                   </thead><tbody>";
        }
        
        // Adicionar linha à tabela atual
        $tables[$month_key] .= '<tr>';
        $tables[$month_key] .= '<td>' . date("d/m/Y", $data) . '</td>';
        $tables[$month_key] .= '<td>' . date("H:i", strtotime($row['hora_inicio'])) . '</td>';
        $tables[$month_key] .= '<td>' . date("H:i", strtotime($row['hora_fim'])) . '</td>';
        $tables[$month_key] .= '<td>' . ucfirst($row['tipo_turno']) . '</td>';
        $tables[$month_key] .= '</tr>';
    }

    // Fechar o último corpo da tabela
    foreach ($tables as $key => $table) {
        $tables[$key] .= '</tbody></table>';
    }

    // Gerar o elemento select com as opções dos meses
    echo '<label for="mesSelect" class="form-label">Selecionar Mês:</label>';
    echo '<select id="mesSelect" class="form-select mb-4" onchange="mostrarTabela(this.value)">';

    foreach ($months as $month_key) {
        $month_text = date("F Y", strtotime("01-$month_key"));  // Formato ex: "Novembro 2024"
        echo "<option value='$month_key'>$month_text</option>";
    }

    echo '</select>';

    // Exibir as tabelas de cada mês com `display: none` para ocultá-las inicialmente
    foreach ($tables as $month_key => $table_content) {
        echo "<div id='tabela_$month_key' style='display: none;'>" . $table_content . "</div>";
    }
    
} else {
    echo '<div class="alert alert-warning">Nenhuma escala encontrada para o funcionário.</div>';
}

echo '<a href="?page=escala" class="btn btn-secondary mt-3">Voltar</a>';
$mysqli->close();
?>

<!-- Scripts do Bootstrap e Script JavaScript para o select -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>

<script>
    // Função para mostrar a tabela do mês selecionado
    function mostrarTabela(mes) {
        document.querySelectorAll("div[id^='tabela_']").forEach(div => div.style.display = 'none');
        document.getElementById("tabela_" + mes).style.display = 'block';
    }

    // Exibir automaticamente a tabela do primeiro mês ao carregar a página
    document.addEventListener("DOMContentLoaded", function() {
        if (document.getElementById("mesSelect").value) {
            mostrarTabela(document.getElementById("mesSelect").value);
        }
    });
</script>

</body>
</html>
