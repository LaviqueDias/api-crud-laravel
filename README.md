<h1 align="center">
  API CRUD com Laravel e MySQL
</h1>

Este projeto é uma API CRUD desenvolvida em PHP utilizando o framework Laravel e banco de dados MySQL. A API permite operações básicas de criação, leitura, atualização e exclusão (CRUD) de usuários.

## Requisitos

* PHP 8.2 ou superior
* MySQL 8 ou superior
* Composer (gerenciador de dependências do PHP)

## Como Configurar e Rodar o Projeto

### 1. Clonar o Repositório
```
git clone https://github.com/seu-usuario/seu-repositorio.git
cd seu-repositoriio
```
### 2. Configurar o arquivo ```.env```

* Duplique o arquivo ```.env.example``` e renomeie para ```.env```:
```
cd .env.example .env
```
* Edite o arquivo ```.env``` e configure as credenciais do banco de dados:
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=seu_banco
DB_USERNAME=seu_usuario
DB_PASSWORD=sua_senha
``` 
### 3. Instalar Dependências
Execute o seguinte comando para instalar todas as dependências do projeto:
``` 
composer install
```
### 4. Gerar a Chave da Aplicação
A chave de segurança do Laravel presica ser gerada para o correto funcionamento da aplicação:
```
php artisan key:generate
```

### 5. Executar as Migrações e Seeds
Para criar as tabelas no banco de dados e popular com dados iniciais (caso existam seeds)
```
php artisan migrate --seeds
```

### 6. Iniciar o Servidor
Agora, basta iniciar o servidor embutido do Laravel:
```
php artisan serve
```
Por padrão, a API estará disponível no endereço:
```
http://localhost:8000
```

## Rotas Disponíveis
### Usuários (`/api/users`)

| Método  | Rota              | Descrição                 |
|---------|-------------------|---------------------------|
| **GET**    | `/api/users`        | Listar todos os usuários  |
| **GET**    | `/api/users/{user}` | Buscar um usuário pelo ID |
| **POST**   | `/api/users`        | Criar um novo usuário     |
| **PUT**    | `/api/users/{user}` | Atualizar um usuário      |
| **DELETE** | `/api/users/{user}` | Deletar um usuário        |

### Exemplos de Requisições

**Listar usuários**
**GET ```/api/users```**

**Criar um usuário**
**POST ```/api/users```**
```
{
  "name": "João da Silva",
  "email": "joao@email.com",
  "password": "123456"
}
```

**Atualizar um usuário**
**PUT ```/api/users/{user}```**
```
{
  "name": "João da Silva Atualizado",
  "email": "joao@email.com.atualizado",
  "password": "123456Atualizado"
}
```

**Deletar um usuário**
**DELETE ```/api/users/{user}```**

## Ferramentas Recomendadas
Para testear as requisições à API, recomenda-se utilizar o [postman](https://www.postman.com/) ou o comando ```curl``` no terminal.

## Criando um Novo Projeto do Zero
Se desejar criar um novo projeto Laravel do zero, siga os passos a baixo:

### 1. Criar um Novo Projeto
```
composer create-project laravel/laravel meu-projeto
```

### 2. Configurar Banco de Dados
Edite o arquivo ```.env``` conforme mencionado anteriormente.

### 3. Criar um Controller para a API
```
php artisan make:controller UserController --api
```

### 4. Criar o Modelo e Migração
```
php artisan make:model User -m
```

### 5. Rodar Migrações
```
php artisan migrate
```

### 6. Criar Rotas para API
No arquivo ```routes/api.php```, adicione as rotas necessárias 

### 7. Executar o Servidor
```
php artisan serve
```
Agora a API estará disponível para uso.
