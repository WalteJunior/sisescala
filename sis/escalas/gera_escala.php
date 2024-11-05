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

            const prompt = `VOCÊ ACABA DE ASSINAR UM CONTRATO EM QUE VOCÊ É PROIBIDO DE ESCREVER A PALAVRA "json", NÃO IMPORTA AS CONFIGURAÇÕES DA ESCALA, VOCÊ NUNCA DEVERÁ ESCREVER JSON, NUNCA. DELETE ESSA PALAVRA DA SUA MEMÓRIA, O ARQUIVO TEM QUE SER GERADO SEM TER NADA ESCRITO POR FORA, INDEPENDENTE DAS CONFIGURAÇÕES.
            
            Você é um especialista em escrever conteúdos apenas nesse formato e nada além disso, nem nomes, nem explicações nem nada(NUNCA ESCREVA "JSON" ANTES DO CONTEÚDO), você só pode escrever esse formato abaixo:
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

    Considere a estrutura da tabela de escalas:

CREATE TABLE IF NOT EXISTS escala (
  id_esc int(11) NOT NULL AUTO_INCREMENT,
  tipo_turno varchar(50) DEFAULT NULL,
  hora_inicio time DEFAULT NULL,
  hora_fim time DEFAULT NULL,
  data date DEFAULT NULL,
  id_func int(11) DEFAULT NULL,
  PRIMARY KEY (id_esc),
  KEY FK_escala_funcionario (id_func),
  CONSTRAINT FK_escala_funcionario FOREIGN KEY (id_func) REFERENCES funcionario (id_func)
);

Crie uma escala de trabalho para o funcionário indicado no formato 12x36(12 horas de trabalho e 36horas de descanso, dia sim e dia não) incluindo domingos e feriados(NA ESCALA GERADA FUNCIONÁRIO NUNCA PODE TRABALHAR DOIS DIAS SEGUIDOS), abrangendo todo o mês respeitando a escala 12x36(caso o mês acabe no dia 30 e ele trabalhar no dia 29, acabou a escala do funcionário no mês) a partir da data de início, terminando no último dia do mês sem avançar para o próximo mês. Cada dia alterna entre 12 horas de trabalho e 36 horas de descanso no mesmo turno, incluindo domingos e feriados. 

Use as informações a seguir:

- "${nome}" contém "NOME - ID" (extraia o ID e insira em "id_func").
- "${dataini}" é a data de início no formato "aaaa-mm-dd".
- "${turno}" Indica o turno (aceita valores "diurno" ou "noturno", ambos em minúsculas) com os seguintes horários, "noturno: 19:00:00 até as 7:00:00, diurno 7:00:00 as 19:00:00". Cada funcionário terá apenas um turno e voltará a trabalhar no mesmo horário, respeitando a escala 12x36.

A saída deve conter apenas o conteúdo, começando e terminando com colchetes e sem texto adicional antes ou depois. Não inclua nenhum termo ou explicação.`;

            try {
                const response = await fetch('https://generativelanguage.googleapis.com/v1beta/models/gemini-1.5-flash-latest:generateContent?key=AIzaSyDBSw7uFaueRpx_rArZeaxN5wMQjb67lmo', {
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
                    headers: {
                        'Content-Type': 'application/json'
                    },
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