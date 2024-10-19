<?php
$mysqli = new mysqli("localhost", "root", "", "sisescala");

if ($mysqli->connect_error) {
    die("Conexão falhou: " . $mysqli->connect_error);
}

// Verificar se a sessão está ativa e se o id_func está definido na sessão
session_start();
if (isset($_SESSION['id_func'])) {
    $id_func = (int) $_SESSION['id_func']; // Pegando o id_func da sessão
    echo "ID do funcionário na sessão: " . $id_func; // Exibe o id_func para confirmação
} else {
    die("ID do funcionário não encontrado na sessão.");
}

// Buscar dados da escala para o funcionário específico
$sql = "SELECT turno FROM funcionario WHERE id_func = $id_func";
$result = $mysqli->query($sql);

if ($result->num_rows == 0) {
    die("Funcionário não encontrado com o ID: " . $id_func);
}

$row = $result->fetch_assoc();
$turno_funcionario = $row['turno'];

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
$mysqli->query("DELETE FROM escala WHERE id_func = $id_func");

// Iterar sobre cada data do mês e gerar escala se o turno do funcionário corresponder
foreach ($datas_mes as $index => $data_atual) {
    // Verifica se o turno do funcionário é diurno ou noturno e define horários de acordo
    if ($turno_funcionario == 'Diurno') {
        $hora_inicio = $hrinicio_dia;
        $hora_fim = $hrfim_dia;
    } else {
        $hora_inicio = $hrinicio_noite;
        $hora_fim = $hrfim_noite;
    }
    
    // Inserir escala na tabela para o funcionário
    $sql_insert = "INSERT INTO escala (tipo_turno, hora_inicio, hora_fim, data, id_func) 
                   VALUES ('$turno_funcionario', '$hora_inicio', '$hora_fim', '$data_atual', $id_func)";
    if (!$mysqli->query($sql_insert)) {
        die("Erro ao inserir escala: " . $mysqli->error);
    }
}

echo "Escala gerada com sucesso para o funcionário ID: " . $id_func;

$mysqli->close();
?>
