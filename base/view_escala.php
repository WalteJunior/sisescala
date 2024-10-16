<?php
// Verifica se o ID do funcionário foi passado
if (isset($_GET['id_func'])) {
    $id_func = $_GET['id_func'];

    // Conexao com o banco de dados
    $con = mysqli_connect('localhost', 'root', '', 'sisescala');

    // Consulta para buscar as escala do funcionarioo pelo ID
    $query = "SELECT * FROM escala WHERE id_func = $id_func";
    $result = mysqli_query($con, $query);

    // Consulta para busca o nome do func
    $func_query = "SELECT nome_func FROM funcionario WHERE id_func = $id_func";
    $func_result = mysqli_fetch_assoc(mysqli_query($con, $func_query));
    $nome_func = $func_result['nome_func'];
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Escalas de Trabalho - <?php echo $nome_func; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1 class="mt-5">Escalas de Trabalho - <?php echo $nome_func; ?></h1>

        <?php if (mysqli_num_rows($result) > 0): ?>
            <table class="table table-bordered mt-4">
                <thead>
                    <tr>
                        <th>Data Início</th>
                        <th>Horário Início</th>
                        <th>Horário Fim</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = mysqli_fetch_array($result)): ?>
                        <tr>
                            <td><?php echo date('d/m/Y', strtotime($row['data_inicio'])); ?></td>
                            <td><?php echo $row['horario_inicio']; ?></td>
                            <td><?php echo $row['horario_fim']; ?></td>
                            <td><?php echo $row['status_dia']; ?></td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>Nenhuma escala encontrada para este funcionário.</p>
        <?php endif; ?>

        <a href="?page=escala" class="btn btn-secondary mt-3">Voltar</a>
    </div>
</body>
</html>
