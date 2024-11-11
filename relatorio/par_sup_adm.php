<?php
session_start();

// Verificar nível de usuário
if ($_SESSION['UsuarioNivel'] < 2) {
    die("Acesso restrito para supervisores e administradores.");
}

// Conexão com o banco de dados
$con = new mysqli("localhost", "root", "", "sisescala");
if ($con->connect_error) {
    die("Falha na conexão: " . $con->connect_error);
}

// Consultar os funcionários para seleção
$sql_funcionarios = "SELECT id_func, nome_func FROM funcionario ORDER BY nome_func";
$result_funcionarios = $con->query($sql_funcionarios);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Parâmetros de Relatório</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="../css/relatorio.css">
</head>
<body>
    <div class="container mt-5">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white text-center">
                <h4>Parâmetros de Relatório</h4>
            </div>
            <div class="card-body">
                <form action="rel_sup_adm.php" method="GET">
                    <!-- Seleção de Funcionários -->
                    <div class="mb-3">
                        <label for="funcionarios" class="form-label">Selecionar Funcionários</label>
                        <select id="funcionarios" name="funcionarios[]" class="form-select" multiple>
                            <?php while ($func = $result_funcionarios->fetch_assoc()): ?>
                                <option value="<?= $func['id_func'] ?>"><?= $func['nome_func'] ?></option>
                            <?php endwhile; ?>
                        </select>
                    </div>

                    <!-- Intervalo de Datas -->
                    <div class="mb-3">
                        <label for="data_inicio" class="form-label">Data de Início</label>
                        <input type="date" name="data_inicio" id="data_inicio" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="data_fim" class="form-label">Data de Fim</label>
                        <input type="date" name="data_fim" id="data_fim" class="form-control">
                    </div>

                    <!-- Tipo de Turno -->
                    <div class="mb-3">
                        <label for="tipo_turno" class="form-label">Tipo de Turno</label>
                        <select name="tipo_turno" id="tipo_turno" class="form-select">
                            <option value="">Todos</option>
                            <option value="diurno">Diurno</option>
                            <option value="noturno">Noturno</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary w-100">Gerar Relatório</button>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#funcionarios').select2({
                placeholder: "Selecione funcionários",
                allowClear: true,
                width: '100%'
            });
        });
    </script>
</body>
</html>
