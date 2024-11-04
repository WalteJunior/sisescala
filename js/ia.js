const gerescala = document.getElementById("escala");
const resultDiv = document.getElementById('result');

gerescala.addEventListener('click', async (event) => {
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
        Ignore o campo 'id_esc'. NÃO ME MOSTRE OBSERVAÇÕES, NEM JSON ESCRITO ANTES DE COMEÇAR, NEM NADA, NÃO PODE TER NADA ALÉM DO CONTEÚDO DA ESCALA SE NÃO VAI DAR ERRO`;

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