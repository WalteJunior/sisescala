<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar escalas</title>
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
                            include "base/config.php";
                            session_start();
                            $sql_funcionarios = "SELECT id_func, nome_func FROM funcionario";
                            $res_funcionarios = mysqli_query($con, $sql_funcionarios);
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

                    <button type="button" class="btn btn-primary w-100" id="gere">Gerar</button>
                    <button type="submit" class="btn btn-primary w-100 mt-2">Enviar</button>
                </form>
                <div id="result" class="mt-3 alert alert-info d-none"></div>
            </div>
        </div>
    </div>

    <script>
        const form = document.getElementById('myForm');
        const resultDiv = document.getElementById('result');
        const gere = document.getElementById('gere');

        gere.addEventListener('click', async (event) => {
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
              Crie uma escala do mês inteiro selecionado(até o final do mês escolhido na data de início, NÃO PULE PARA O MÊS SEGUINTE) com o formato 12x36 (12 horas de trabalho e 36 horas de descanso, dia sim e dia não e depois do dia de descanso volta no mesmo horário) para o funcionário com nome e id(adicione este id no atributo id_func que é chave estrangeira da tabela funcionario): ${nome}, com data de início ${dataini}(termina no final do mês escolhido, nunca avance para o mês seguinte) e com o turno no formato ${turno}(com letras minúsculas). Considerando que o funcionário vai trabalhar domingos e feriados, temos dois turnos: noturno das 19:00 às 7:00 e diurno das 7:00 às 19:00, cada funcionário só irá trabalhar em um desses turnos. Gere o resultado nesse formato json:
        [
          {
            "tipo_turno": "diurno" ou "noturno",
            "hora_inicio": "hh:mm:ss",
            "hora_fim": "hh:mm:ss",
            "data": "yyyy-mm-dd",
            "id_func": id_func
          },
          ...
        ]
        Ignore o campo 'id_esc'. NÃO ME MOSTRE OBSERVAÇÕES, NEM NADA ESCRITO, NÃO PODE TER NADA ALÉM DO CONTEÚDO DA ESCALA SE NÃO VAI DAR ERRO`;

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

                // Extraia o texto da resposta da API
                const escalaText = data.candidates[0]?.content?.parts[0]?.text || "Resposta inesperada da API";
                
                // Exibir o conteúdo da escala diretamente no resultDiv
                resultDiv.textContent = escalaText;
                resultDiv.classList.remove('d-none');

            } catch (error) {
                console.error('Erro:', error);
                resultDiv.textContent = 'Ocorreu um erro ao processar a requisição.';
                resultDiv.classList.remove('d-none');
            }
        });

        form.addEventListener('submit', async (event) => {
            event.preventDefault();
            const escalaJSON = resultDiv.textContent.trim();

            try {
                // Validar JSON antes de enviar
                const escalaObj = JSON.parse(escalaJSON);

                const response = await fetch('http://localhost/sisescala/sis/escalas/salvar_escala.php', {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/json' },
                    body: JSON.stringify(escalaObj)
                });

                const result = await response.json();
                alert(result.success ? "Escala salva com sucesso!" : "Falha ao salvar a escala: " + result.message);
            } catch (error) {
                console.error("Erro de JSON:", error);
                alert("Erro: JSON malformado. Verifique o conteúdo gerado.");
            }
        });
    </script>
</body>
</html>
