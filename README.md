<h1>Sistema de Gerenciamento de Escalas 12x36</h1>

<p align="center">
  <img src="https://img.shields.io/badge/status-in%20development-orange" alt="status">
  <img src="https://img.shields.io/badge/license-MIT-green" alt="license">
  <img src="https://img.shields.io/badge/PHP-7.4-blue" alt="php">
  <img src="https://img.shields.io/badge/MySQL-5.7.31-blue" alt="mysql">
</p>

## 📋 Descrição

O **Sistema de Gerenciamento de Escalas 12x36** foi desenvolvido para auxiliar indústrias a gerenciarem escalas de trabalho, especialmente para turnos de 12x36 horas. Ele possibilita o cadastro de funcionários, a criação automática de escalas de trabalho, a gestão de substituições em caso de ausências, e a geração de relatórios detalhados sobre a performance dos funcionários. O sistema também conta com diferentes níveis de usuário, onde administradores podem realizar ajustes nas escalas e funcionários podem visualizar suas próprias escalas e atividades.

## ⚙️ Funcionalidades

- **Cadastro de Funcionários**: Criação de perfis com dados pessoais, cargos e setores.
- **Definição de Escalas**: Atribuição de funcionários a turnos de 12x36 horas, com gerenciamento de data de início, fim e horário.
- **Gerenciamento de Substituições**: Registro de substituições entre funcionários, com aprovação final do administrador.
- **Níveis de Acesso**:
  - **Funcionários**: Visualizam suas próprias escalas e respondem solicitações de substituição.
  - **Administradores**: Gerenciam escalas, substituições e geram relatórios.
- **Geração de Relatórios**: Relatórios sobre horas trabalhadas, ausências e substituições.
  
## 🚀 Tecnologias Utilizadas

- **Frontend**: HTML5, CSS3, Bootstrap
- **Backend**: PHP 7.4
- **Banco de Dados**: MySQL 5.7.31

## 📂 Estrutura do Projeto

```bash
sislogin/
├── base/
├── content/
├── docs/
├── pdf/
├── sis/
├── index.php
├── ativa_usu.php
├── lista_usu.php
├── relatorio.php
├── RelatorioController.php
