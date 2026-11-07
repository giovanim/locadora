🚗 Locadora API

API REST desenvolvida para gerenciamento de uma locadora de veículos, utilizando Laravel e PHP.

O sistema tem como objetivo facilitar o gerenciamento de veículos, clientes, reservas e contratos de locação, oferecendo uma estrutura organizada para controlar as operações de uma empresa de aluguel de carros.

📋 Sobre o projeto

A Locadora API é um sistema desenvolvido para automatizar os processos de uma locadora de veículos, permitindo o gerenciamento das informações e das operações relacionadas à locação de automóveis.

✨ Funcionalidades
Cadastro e gerenciamento de veículos.
Cadastro e gerenciamento de clientes.
Controle de disponibilidade dos veículos.
Gerenciamento de reservas.
Controle de locações e devoluções.
Gerenciamento de informações dos contratos.
Consulta de veículos disponíveis para locação.
As funcionalidades acima representam os módulos planejados. Ajuste a lista conforme os recursos que já estão implementados na API.
🛠️ Tecnologias utilizadas
PHP
Laravel
MySQL
Composer
REST API
⚙️ Como executar o projeto
1. Clone o repositório
bash
git clone https://github.com/giovanim/locadora.git

2. Entre na pasta do projeto
bash
cd locadora

3. Instale as dependências
bash
composer install

4. Configure o ambiente

Copie o arquivo de configuração:

bash
cp .env.example .env


Configure no arquivo .env as informações de conexão com seu banco de dados.

5. Gere a chave da aplicação
bash
php artisan key:generate

6. Execute as migrations
bash
php artisan migrate

7. Inicie o servidor
bash
php artisan serve


A API estará disponível em:

text
http://127.0.0.1:8000

🗄️ Estrutura do sistema

O sistema é organizado para trabalhar com os principais elementos de uma locadora:

Veículos: informações, características e disponibilidade dos carros.
Clientes: dados dos usuários que realizam as locações.
Reservas: controle das solicitações de aluguel.
Locações: registro da retirada e devolução dos veículos.
Contratos: informações relacionadas aos acordos de locação.
🔒 Segurança

As configurações sensíveis da aplicação devem permanecer no arquivo .env, que não deve ser enviado ao GitHub.

👨‍💻 Desenvolvedor

Giovani

Projeto desenvolvido para gerenciamento de uma locadora de veículos.

📄 Licença

Este projeto está em desenvolvimento.