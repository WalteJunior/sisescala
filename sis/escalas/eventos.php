<?php
session_start();

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

$eventos = array();

// Preparar a consulta SQL para buscar dados da escala e funcionários
$stmt = $mysqli->prepare("SELECT escala.*, nome_func FROM escala JOIN funcionario ON escala.id_func = funcionario.id_func WHERE escala.id_func = ?");
$stmt->bind_param("i", $id_func); // Usa o id_func como parâmetro

if (!$stmt->execute()) {
    http_response_code(500); // Internal Server Error
    echo "Erro na execução da consulta: " . $stmt->error; // Mensagem de erro na consulta
} else {
    $result = $stmt->get_result(); // Obtém o resultado da consulta

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $eventos[] = array(
                'title' => $row['nome_func'] . " (" . $row['tipo_turno'] . ")",
                'start' => $row['data'] . 'T' . $row['hora_inicio'], // Combina data e hora de início no formato ISO8601
                'end'   => $row['data'] . 'T' . $row['hora_fim']      // Combina data e hora de fim no formato ISO8601
            );
        }
    } else {
        http_response_code(404); // Not Found
        echo "Nenhum evento encontrado para o ID do funcionário: " . $id_func;
    }
}

// Retornar eventos no formato JSON
header('Content-Type: application/json'); // Define o tipo de conteúdo como JSON
echo json_encode($eventos);

// Fecha a declaração e a conexão
$stmt->close();
$mysqli->close();
?>
