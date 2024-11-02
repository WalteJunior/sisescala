<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Requisição POST com Fetch API</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
    <div class="container mt-5">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white text-center">
                <h4>Gerador de Escala</h4>
            </div>
            <div class="card-body">
                <form id="myForm">
                    <div class="mb-3">
                        <label for="nome" class="form-label">Nome do Funcionário</label>
                        <select id="nome" class="form-select" required>
                            <option value="">Selecione um funcionário</option>
                            <?php
                            include "base/config.php"; // Conectei com o banco de dados
                            session_start();

                            // Variável com select para listar todos os funcionários
                            $sql_funcionarios = "SELECT id_func, nome_func FROM funcionario";
                            $res_funcionarios = mysqli_query($con, $sql_funcionarios);

                            // Preenche o select com os funcionários cadastrados no bd
                            if ($res_funcionarios) {
                                while ($row = mysqli_fetch_assoc($res_funcionarios)) {
                                    echo "<option value='{$row['id_func']}'>{$row['nome_func']} - {$row['id_func']}</option>";
                                }
                            } else {
                                echo "<option value=''>Nenhum funcionário cadastrado</option>";
                            }
                            ?>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="dataini" class="form-label">Data de Início</label>
                        <input type="date" id="dataini" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="turno" class="form-label">Turno</label>
                        <select id="turno" class="form-select" required>
                            <option value="Noturno">noturno</option>
                            <option value="Diurno">diurno</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary w-100">Enviar</button>
                </form>
                <div id="result" class="mt-3 alert alert-info d-none"></div>
            </div>
        </div>
    </div>

    <script>
        const form = document.getElementById('myForm');
        const resultDiv = document.getElementById('result');

        form.addEventListener('submit', async (event) => {
            event.preventDefault();
            const nome = document.getElementById('nome').value;
            const dataini = document.getElementById('dataini').value;
            const turno = document.getElementById('turno').value;

            const prompt = `Considerando os dados dessa tabela CREATE TABLE IF NOT EXISTS escala (
              id_esc int(11) NOT NULL AUTO_INCREMENT,
              tipo_turno varchar(50) DEFAULT NULL,
              hora_inicio time DEFAULT NULL,
              hora_fim time DEFAULT NULL,
              data date DEFAULT NULL,
              id_func int(11) DEFAULT NULL,
              PRIMARY KEY (id_esc),
              KEY FK_escala_funcionario (id_func),
              CONSTRAINT FK_escala_funcionario FOREIGN KEY (id_func) REFERENCES funcionario (id_func). 
              Crie uma escala do mês inteiro com o formato 12x36 (12 horas de trabalho e 36 horas de descanso, dia sim e dia não) para o funcionário com nome e id(adicione este id no atributo id_func que é chave estrangeira da tabela funcionario): ${nome}, com data de início ${dataini} e com o turno no formato ${turno}(com letras minúsculas). Considerando que o funcionário vai trabalhar domingos e feriados, temos dois turnos: noturno das 19:00 às 7:00 e diurno das 7:00 às 19:00. Gere o resultado em formato JSON para que o supervisor ou administrador possa colocar a escala no banco de dados, ignore o atributo id_esc, pois ele é auto_increment. NÃO ME MOSTRE OBSERVAÇÕES, APENAS O CÓDIGO NO FORMATO JSON`;

            try {
                const response = await fetch('https://generativelanguage.googleapis.com/v1beta/models/gemini-1.5-flash-latest:generateContent?key=AIzaSyCWvzM33WQDV7QBsab9g65KS-h8_UTcQSk', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({
                        contents: [{
                            parts: [{
                                text: prompt
                            }]
                        }]
                    })
                });

                const data = await response.json();
                resultDiv.textContent = data.candidates[0].content.parts[0].text;
                resultDiv.classList.remove('d-none');
            } catch (error) {
                console.error('Erro:', error);
                resultDiv.textContent = 'Ocorreu um erro ao processar a requisição.';
                resultDiv.classList.remove('d-none');
            }
        });
    </script>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>

</html>
