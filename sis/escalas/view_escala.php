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

// Buscar dados do funcionário
$sql = "SELECT nome_func, turno FROM funcionario WHERE id_func = $id_func";
$result = $mysqli->query($sql);

if ($result->num_rows == 0) {
    die("Funcionário não encontrado com o ID: " . $id_func);
}

$row = $result->fetch_assoc();
$nome_funcionario = $row['nome_func'];

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

echo '<a href="?page=escala" class="btn btn-secondary">Voltar</a>';
$mysqli->close();
?>
