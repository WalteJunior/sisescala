<?php
$mysqli = new mysqli("localhost", "root", "", "sisescala");

if ($mysqli->connect_error) {
    die("Conexão falhou: " . $mysqli->connect_error);
}

$eventos = array();

// Verificar se o parâmetro id_func está definido
if (!isset($_GET['id_func'])) {
    die("Erro: ID do funcionário não fornecido.");
}

$id_func = $_GET['id_func']; // Pega o ID do funcionário da query string

// Buscar dados da escala e funcionários apenas para o ID fornecido
$result = $mysqli->query("SELECT escala.*, nome_func FROM escala JOIN funcionario ON escala.id_func = funcionario.id_func WHERE escala.id_func = $id_func");

if (!$result) {
    echo "Erro na consulta: " . $mysqli->error; // Mensagem de erro na consulta
} else {
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $eventos[] = array(
                'title' => $row['nome_func'] . " (" . $row['tipo_turno'] . ")",
                'start' => $row['data'] . 'T' . $row['hora_inicio'], // Combina data e hora de início
                'end' => $row['data'] . 'T' . $row['hora_fim']      // Combina data e hora de fim
            );
        }
    } else {
        echo "Nenhum evento encontrado para o ID do funcionário: " . $id_func; // Mensagem se não encontrar eventos
    }
}

// Retornar eventos no formato JSON
header('Content-Type: application/json'); // Define o tipo de conteúdo
echo json_encode($eventos);
?>
