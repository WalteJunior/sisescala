<?php
$mysqli = new mysqli("localhost", "root", "", "sisescala");

if ($mysqli->connect_error) {
    die("Conexão falhou: " . $mysqli->connect_error);
}

// Verificar se o id_func foi passado pela URL
if (isset($_GET['id_func'])) {
    $id_func = (int) $_GET['id_func']; // Pegando o id_func da URL
} else {
    die("ID do funcionário não encontrado.");
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

// Verifica se já existem escalas para o mês atual
$sql_check = "SELECT COUNT(*) as count FROM escala WHERE id_func = $id_func AND MONTH(data) = MONTH(CURRENT_DATE()) AND YEAR(data) = YEAR(CURRENT_DATE())";
$result_check = $mysqli->query($sql_check);
$count = $result_check->fetch_assoc()['count'];



// Limpar escala existente para o funcionário
$mysqli->query("DELETE FROM escala WHERE id_func = $id_func");

// Gerar escalas aleatórias respeitando a regra de 12x36
$ultima_data = null;
$turnos = []; // Array para armazenar turnos gerados

foreach ($datas_mes as $data_atual) {
    // Se já houver uma escala na última data, pular
    if ($ultima_data) {
        $diff = strtotime($data_atual) - strtotime($ultima_data);
        $horas = $diff / 3600; // Diferença em horas
        if ($horas < 36) {
            continue; // Pula a data se não tiver passado 36 horas desde a última escala
        }
    }

    // Randomizar o turno
    $turno_aleatorio = rand(0, 1) ? 'diurno' : 'noturno';

    // Definir horário de acordo com o turno aleatório
    if ($turno_aleatorio == 'diurno') {
        $hora_inicio = $hrinicio_dia;
        $hora_fim = $hrfim_dia;
    } else {
        $hora_inicio = $hrinicio_noite;
        $hora_fim = $hrfim_noite;
    }

    // Inserir escala na tabela para o funcionário
    $sql_insert = "INSERT INTO escala (tipo_turno, hora_inicio, hora_fim, data, id_func) 
                   VALUES ('$turno_aleatorio', '$hora_inicio', '$hora_fim', '$data_atual', $id_func)";
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
    echo '<div class="container">';
    echo '<div class="row">';
    echo '<div class="col-md-12">';
    echo '<table class="table table-striped" style="background-color: #e0f7fa;">'; // Cor de fundo azul claro
    echo '<thead style="background-color: #007bff; color: white;">'; // Cabeçalho com azul mais escuro e texto branco
    echo '<tr><th>Data</th><th>Hora Início</th><th>Hora Fim</th><th>Turno</th></tr>';
    echo '</thead>';
    echo '<tbody>';

    while ($row = $result->fetch_assoc()) {
        echo '<tr>';
        echo '<td>' . date("d/m/Y", strtotime($row['data'])) . '</td>'; // Formatação da data
        echo '<td>' . date("H:i", strtotime($row['hora_inicio'])) . '</td>'; // Formatação da hora de início
        echo '<td>' . date("H:i", strtotime($row['hora_fim'])) . '</td>'; // Formatação da hora de fim
        echo '<td>' . ucfirst($row['tipo_turno']) . '</td>'; // Capitalização do tipo de turno
        echo '</tr>';
    }

    echo '</tbody>';
    echo '</table>';
    echo '</div>'; // Fecha col-md-12
    echo '</div>'; // Fecha row
    echo '</div>'; // Fecha container
} else {
    echo '<div class="alert alert-warning">Nenhuma escala encontrada para o funcionário.</div>';
}

$mysqli->close();
?>
