const gerescala = document.getElementById("escala");
const resultDiv = document.getElementById('result');

gerescala.addEventListener('click', async (event) => {
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
        resultDiv.textContent = data.candidates[0].content.parts[0].text;
        resultDiv.classList.remove('d-none');
    } catch (error) {
        console.error('Erro:', error);
        resultDiv.textContent = 'Ocorreu um erro ao processar a requisição.';
        resultDiv.classList.remove('d-none');
    }
});