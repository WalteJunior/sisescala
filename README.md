<h1>Sistema de Gerenciamento de Escalas 12x36</h1> <p align="center"> <img src="https://img.shields.io/badge/status-concluído-green" alt="status"> <img src="https://img.shields.io/badge/license-MIT-green" alt="license"> <img src="https://img.shields.io/badge/PHP-7.4-blue" alt="php"> <img src="https://img.shields.io/badge/MySQL-5.7.31-blue" alt="mysql"> </p>
📋 Descrição
O Sistema de Gerenciamento de Escalas 12x36 foi desenvolvido para resolver os desafios de organização e eficiência operacional enfrentados por indústrias que utilizam turnos de trabalho contínuos. Ele permite o gerenciamento eficaz de escalas de trabalho, incluindo cadastro de funcionários, atribuição de turnos, controle de substituições e geração de relatórios organizados. A plataforma oferece uma interface amigável e acessível, com funcionalidades específicas para diferentes níveis de usuários, garantindo cobertura contínua e produtividade.

⚙️ Funcionalidades
Cadastro de Funcionários:

Registro de informações detalhadas como nome, cargo, setor e endereço.
Organização de funcionários por setores específicos.
Definição de Escalas:

Geração de escalas com auxílio do supervisor, listando datas de cadastro dos funcionários.
Turnos de 12x36 atribuídos conforme as necessidades do setor.
Gerenciamento de Substituições:

Solicitações de troca realizadas pelos funcionários com antecedência mínima de 48 horas.
Acompanhamento e aprovação/rejeição de substituições por supervisores.
Níveis de Acesso:

Funcionários:
Visualizam suas escalas.
Solicitam substituições.
Supervisores/Administradores:
Gerenciam escalas, analisam substituições e organizam equipes.
Monitoram a eficiência operacional.
Geração de Relatórios:

Relatórios mensais detalhados com informações sobre horários, cargos e atividades.
Ferramenta essencial para acompanhamento de desempenho e identificação de padrões.
🚀 Tecnologias Utilizadas
Frontend:
HTML5
CSS3
Bootstrap
Backend:
PHP 7.4
Banco de Dados:
MySQL 5.7.31
Biblioteca para Relatórios:
mPDF (para geração de relatórios em PDF)
📂 Estrutura do Projeto
bash
Copiar código
sisescala/
├── base/                 # Configurações básicas do sistema
├── content/              # Arquivos estáticos como imagens e estilos
├── docs/                 # Documentação adicional
├── pdf/                  # Relatórios gerados em PDF
├── sis/                  # Lógica principal do sistema
├── login.php             # Tela de login
├── ativa_usu.php         # Ativação de usuários
├── lista_usu.php         # Listagem de usuários
├── relatorio.php         # Geração de relatórios
├── RelatorioController.php # Controle e geração dinâmica de relatórios
🛠️ Como Executar
Instale o XAMPP para configurar o ambiente local.
Clone o repositório do projeto em sua pasta htdocs.
Importe o arquivo .sql fornecido no banco de dados MySQL usando ferramentas como HeidiSQL ou phpMyAdmin.
Acesse o sistema no navegador em http://localhost/sisescala.
