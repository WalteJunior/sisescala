<?php
include "../../base/config.php";
header("Content-Type: application/json");

// Recebe e decodifica o JSON
$input = file_get_contents("php://input");
file_put_contents('debug.log', "Input recebido (raw): " . $input . "\n", FILE_APPEND);
$data = json_decode($input, true);

// Verifica erros de decodificação
if (json_last_error() !== JSON_ERROR_NONE) {
    file_put_contents('debug.log', "Erro ao decodificar JSON: " . json_last_error_msg() . "\n", FILE_APPEND);
    echo json_encode(["success" => false, "message" => "Erro ao decodificar JSON: " . json_last_error_msg()]);
    exit;
}

// Confere se os dados foram recebidos corretamente
if (!empty($data)) {
    foreach ($data as $escala) {
        // Verifica se as chaves necessárias estão presentes
        if (!isset($escala['tipo_turno'], $escala['hora_inicio'], $escala['hora_fim'], $escala['data'], $escala['id_func'])) {
            echo json_encode(["success" => false, "message" => "Dados incompletos na escala."]);
            exit;
        }
        
        // Insere os dados no banco de dados (ajuste conforme o banco)
        $tipo_turno = $escala['tipo_turno'];
        $hora_inicio = $escala['hora_inicio'];
        $hora_fim = $escala['hora_fim'];
        $data = $escala['data'];
        $id_func = $escala['id_func'];

        $query = "INSERT INTO escala (tipo_turno, hora_inicio, hora_fim, data, id_func) VALUES ('$tipo_turno', '$hora_inicio', '$hora_fim', '$data', '$id_func')";
        $result = mysqli_query($con, $query);

        if (!$result) {
            file_put_contents('debug.log', "Erro no MySQL: " . mysqli_error($con) . "\n", FILE_APPEND);
            echo json_encode(["success" => false, "message" => "Erro ao salvar a escala no banco de dados."]);
            exit;
        }

        // Atualiza o turno na tabela funcionario
        $update_funcionario = "UPDATE funcionario SET turno = '$tipo_turno' WHERE id_func = '$id_func'";
        $result_update = mysqli_query($con, $update_funcionario);

        if (!$result_update) {
            file_put_contents('debug.log', "Erro no MySQL ao atualizar turno: " . mysqli_error($con) . "\n", FILE_APPEND);
            echo json_encode(["success" => false, "message" => "Erro ao atualizar o turno no banco de dados."]);
            exit;
        }
    }
    echo json_encode(["success" => true, "message" => "Escala salva e turno atualizado com sucesso!"]);
} else {
    echo json_encode(["success" => false, "message" => "Nenhuma escala recebida."]);
}

?>
