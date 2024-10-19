<?php
$mysqli = new mysqli("localhost", "root", "", "sisescala");

if ($mysqli->connect_error) {
    die("Conexão falhou: " . $mysqli->connect_error);
}

// Verificar se a sessão está ativa e se o id_func está definido na sessão
if (isset($_SESSION['id_func'])) {
    $id_func = (int) $_SESSION['id_func']; // Pegando o id_func da sessão
} else {
    die("ID do funcionário não encontrado na sessão.");
}

// Buscar dados da escala para o funcionário específico
$sql = "SELECT nome_func, turno FROM funcionario WHERE id_func = $id_func";
$result = $mysqli->query($sql);

if ($result->num_rows == 0) {
    die("Funcionário não encontrado com o ID: " . $id_func);
}

$row = $result->fetch_assoc();
$nome_funcionario = $row['nome_func'];
$turno_funcionario = $row['turno'];

// Definir horários de início e fim do turno
$hrinicio_dia = "07:00";
$hrfim_dia = "19:00";
$hrinicio_noite = "19:00";
$hrfim_noite = "07:00";

// Definir o primeiro dia do mês atual e o último dia do mês
$inicio_mes = date("Y-m-01");  // Primeiro dia do mês atual
$fim_mes = date("Y-m-t");      // Último dia do mês

// Criar um array com todas as datas do mês
function gerarDatasMes($inicio_mes, $fim_mes) {
    $datas = array();
    $dia = strtotime($inicio_mes);
    while ($dia <= strtotime($fim_mes)) {
        $datas[] = date("Y-m-d", $dia);
        $dia = strtotime("+1 day", $dia);
    }
    return $datas;
}

$datas_mes = gerarDatasMes($inicio_mes, $fim_mes);

// Limpar escala existente para o funcionário
$mysqli->query("DELETE FROM escala WHERE id_func = $id_func");

// Variável para armazenar a última data escalada
$ultima_data = null;

foreach ($datas_mes as $data_atual) {
    // Verifica se o funcionário pode ser escalado com base na última data
    if ($ultima_data) {
        $diff = strtotime($data_atual) - strtotime($ultima_data);
        $horas = $diff / 3600; // Diferença em horas
        if ($horas < 36) {
            continue; // Pula a data se não tiver passado 36 horas desde a última escala
        }
    }

    // Verifica se o dia atual é par ou ímpar
    $dia_atual = date('d', strtotime($data_atual));

    if ($turno_funcionario == 'diurno' && $dia_atual % 2 == 0) {
        // Se for diurno e dia par
        $hora_inicio = $hrinicio_dia;
        $hora_fim = $hrfim_dia;
    } elseif ($turno_funcionario == 'noturno' && $dia_atual % 2 != 0) {
        // Se for noturno e dia ímpar
        $hora_inicio = $hrinicio_noite;
        $hora_fim = $hrfim_noite;
    } else {
        continue; // Se não for dia correto para o turno, pula para o próximo dia
    }

    // Inserir escala na tabela para o funcionário
    $sql_insert = "INSERT INTO escala (tipo_turno, hora_inicio, hora_fim, data, id_func) 
                   VALUES ('$turno_funcionario', '$hora_inicio', '$hora_fim', '$data_atual', $id_func)";
    if (!$mysqli->query($sql_insert)) {
        die("Erro ao inserir escala: " . $mysqli->error);
    }

    // Atualiza a última data escalada
    $ultima_data = $data_atual;
}

////////////////////////////////////////////////////////////////////////////
// Buscar dados da escala para o funcionário específico
$sql = "SELECT escala.*, funcionario.nome_func 
        FROM escala 
        JOIN funcionario ON escala.id_func = funcionario.id_func 
        WHERE escala.id_func = $id_func";
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
    echo '
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <thead class="table-dark">
                <tr>
                    <th scope="col">Data</th>
                    <th scope="col">Hora Início</th>
                    <th scope="col">Hora Fim</th>
                    <th scope="col">Turno</th>
                </tr>
            </thead>
            <tbody>';
    while ($row = $result->fetch_assoc()) {
        echo '
        <tr>
            <td>' . date("d/m/Y", strtotime($row['data'])) . '</td>
            <td>' . date("H:i", strtotime($row['hora_inicio'])) . '</td>
            <td>' . date("H:i", strtotime($row['hora_fim'])) . '</td>
            <td>' . ucfirst($row['tipo_turno']) . '</td>
        </tr>';
    }
    echo '
            </tbody>
        </table>
    </div>';
} else {
    echo '<div class="alert alert-warning" role="alert">Nenhuma escala encontrada para o funcionário.</div>';
}

echo '
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
';

$mysqli->close();
?>
