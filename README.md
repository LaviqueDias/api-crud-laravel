## Requisitos

* PHP 8.2 ou superior
* MySQL 8 ou superior
* Composer

## Como rodar o projeto baixado

Duplicar o arquivo ".env.example" e renomear para ".env".<br>
Alterar no arquivo .env as credenciais do bando de dados<br>

Instalar as depedências do PHP
```
composer install
```

Gerar a chave no arquivo .env
```
php artisan key::generate
```

Executart as migration
```
php artisan migrate
```

Executar as seed
```
php artisan db:seed
```

Iniciar o projeto com Laravel
```
php artisan serve
```

Para acessar a API, é recomendado utilizar o Postman para simular requisições à API
```
http://localhost:8000/api/users
```

## Sequencia para criar projeto
Criar o projeto com Laravel
```
composer crate-project laravel/laravel .
```

Alterar no arquivo .env as credenciais do banco de dados<br>

Criar o arquivo de rotas para API
```
php artisan install:api
```