# Instalação do Projeto

## Pré requisitos
* PHP 8.3
* Composer instalado

## Passo a passo da instalação

1 - Clonar o projeto
```bash
git clone https://github.com/JordanDeodato/portfolio-api.git
```
2 - Instalar/atualizar o Composer
```bash
composer install
```

3 - Copiar o arquivo .env

No windows
```bash
copy .env.example .env
```

No Linux
```bash
cp .env.example .env
```

4 - Conectar com o banco de dados

1. Crie um banco de dados mySQL
2. Configure o arquivo .env
```bash
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=portfolio-api
DB_USERNAME=root
DB_PASSWORD=
```

5 - Crie a chave de acesso
```bash
php artisan key:generate
```

6 - Execute as migrations

```bash
php artisan migrate
```

7 - Execute o projeto
```bash
php artisan serve
```

**Utilize plataformas como o POSTMAN para navegar pelas rotas e realizar as ações**

# Rotas

* /customers -> GET -> Retorna todos os customers
* /customers/id -> GET -> Retorna o customer através do id
* /customers -> POST -> Cria um novo customer passando os parâmetros em forma de JSON
Ex:
```json
{
    "name" : "Jhon Dow",
    "email" : "jhon@email.com",
    "birth" : "20/07/1993",
    "cpf" : "01234567810"
}
```
* /customers/id -> PUT -> Atualiza os dados de um customer, passando o id pela rota e os parâmetros como no método anterior.









