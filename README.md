Guia de Utilização da Aplicação

Introdução

Este guia tem como objetivo fornecer instruções claras sobre como utilizar a aplicação criada com Laravel e MySQL. Leia atentamente para aproveitar ao máximo os recursos disponíveis.

Requisitos

Antes de começar, certifique-se de ter instalado:

PHP 
Composer
MySQL 
Git

Instalação

Clone o repositório do projeto:
git clone https://github.com/seu-usuario/nome-do-projeto.git
Instale as dependências com o Composer:
composer install
Crie um banco de dados MySQL e configure as credenciais no arquivo .env.

Execute as migrações para criar as tabelas no banco de dados:

php artisan migrate
Configuração
Abra o arquivo .env e preencha as variáveis de ambiente com as informações do seu ambiente.

env

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nome_do_banco
DB_USERNAME=seu_usuario
DB_PASSWORD=sua_senha

Utilização
Sistema de Login
Acesse a aplicação pelo navegador.

Clique em "Login".

Insira suas credenciais e clique em "Entrar".
(admin@exemple.com senha admin123
vendedor@exemple.com senha vendedor123
cliente1@exemple.com senha cliente1123)

Gerenciamento de Usuários
Após o login, vá para a seção "Administração".

Clique em "Gerenciar Usuários".

Aqui, você pode adicionar, editar ou excluir usuários.

Gerenciamento de Permissões
Na seção "Administração", clique em "Gerenciar Permissões".

Adicione ou remova permissões para os usuários.

Gerenciamento de Categorias e Produtos
Na seção "Administração", escolha "Gerenciar Categorias" ou "Gerenciar Produtos".

Adicione, edite ou exclua categorias e produtos conforme necessário.

