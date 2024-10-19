<?php
$mysqli = new mysqli("localhost", "root", "", "sisescala");

if ($mysqli->connect_error) {
    die("Conexão falhou: " . $mysqli->connect_error);
}

// Verificar se os parâmetros estão definidos
if (!isset($_GET['id_fun']) || !isset($_GET['tipo_turno'])) {
    die("Erro: ID do funcionário ou tipo de turno não fornecido.");
}

$id_fun = $_GET['id_fun'];
$tipo_turno = $_GET['tipo_turno']; // Supondo que você passe o tipo de turno também

// Validar o tipo de turno
if (!in_array($tipo_turno, ['dia', 'noite'])) {
    die("Erro: Tipo de turno inválido.");
}

// Definir horários de início e fim do turno
$hrinicio_dia = "07:00:00";
$hrfim_dia = "19:00:00";
$hrinicio_noite = "19:00:00";
$hrfim_noite = "07:00:00";

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
$mysqli->query("DELETE FROM escala WHERE id_func = $id_fun");

// Iterar sobre cada data do mês
foreach ($datas_mes as $index => $data_atual) {
    // Calcular se é dia de trabalho
    if ($index % 2 == 0) { // Dias pares são dias de trabalho
        if ($tipo_turno == 'diurno') {
            $hrinicio = $hrinicio_dia;
            $hrfim = $hrfim_dia;
        } else if ($tipo_turno == 'noturno') {
            $hrinicio = $hrinicio_noite;
            $hrfim = $hrfim_noite;
        }

        // Inserir escala no banco de dados com a data do turno
        // Adicione isto antes da inserção no banco de dados
        echo "Gerando escala para ID: $id_fun, Turno: $tipo_turno\n";

        $stmt = $mysqli->prepare("INSERT INTO escala (tipo_turno, hora_inicio, hora_fim, id_func, data) VALUES (?, ?, ?, ?, ?)");
        if (!$stmt) {
            die("Erro na preparação do statement: " . $mysqli->error);
        }

        $stmt->bind_param("sssis", $tipo_turno, $hrinicio, $hrfim, $id_fun, $data_atual);
        if (!$stmt->execute()) {
            die("Erro na execução: " . $stmt->error);
        } else {
            echo "Escala gerada para o ID: $id_fun na data: $data_atual\n"; // Debug
        }

    }
}

echo "Escala gerada com sucesso!";
?>
