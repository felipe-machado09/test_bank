<p align="center"><img src="https://avatars.githubusercontent.com/u/30176402?v=4" width="200"></p>



## Felipe Machado Teotonio

Ola sou o Felipe Machado Teotonio esse é um teste para transferência entre usuários, segue o tutorial abaixo.
- Email: felipe_machado09@hotmail.com <br />

- Renomeie o arquivo **.env.example** para apenas **.env**

- Iniciando os containers.

	```sh
	docker-compose up -d
	```
<br>

- Entrando no container.

	```sh
	docker exec -it testbank-app /bin/bash
	```

<br>

- Instalando dependencias via Composer.

	```sh
	composer install
	```

<br>

- Instalando as tabelas.
```sh
php artisan migrate
```
<br>

- Populando o banco com 100 usuários Fakes.
```sh
php artisan module:seed
```
<br />

- Realizando Tests Unitários.
```sh
php artisan test
```
<br />

- Estou utilizando o insomnia o arquivo com as APIS esta no projeto com o nome de **test_bank.json**.
- Pegar este Arquivo e **importe no insomnia** e tera todas as apis.
  
  <br />
### Após popular o banco vamos fazer o login com os dados abaixo

  <br />

```sh
http://localhost:8080/
Sistema: MySql
Servidor: db
Usuário: root
Senha: test_bank
Base de dados: test_bank
```

  <br />

- vá em usuários e pegue um email que esteja cadastrado.
- vá na API de login do insomnia e digite o email e a senha padrão : 123456
- Após fazer login pegar o **token gerado** e cadastrar nas variaveis do insomnia.
- e utilize o insomnia para navegar pelas Apis do test_bank.

## APIS

### Login & Logout

| Metodo  | API | Descrição |
| ------------- | ------------- |------------- |
| POST  | api/auth/login  | Login no sistema |
| POST  | api/auth/logout  | Logout no sistema |

```sh
POST - api/auth/login
{
    "email": "email@example.com",
    "password": "123456",
}
```
 
### User

| Metodo  | API | Descrição |
| ------------- | ------------- |------------- |
| GET  | api/user  | Listagem com paginação |
| GET  | api/user/list  | Listagem sem paginação |
| POST  | api/user  | Cadastro de Usuário |
| GET  | api/user/show/**{id}**  | Pega o Usuário pelo **{id}** |
| PUT  | api/user/update/**{id}** | Atualização do usuário pelo **{id}** |
| DELETE  | api/user/inactivate/**{id}**  | Deleção de usuário pelo **{id}** |

```sh
POST - api/user | UPDATE - api/user/update/{id}
{
	"name": "Felipe",
	"email": "felipe.net.09@hotmail.com",
	"password": "123456",
	"cpf":"37140405875",
	"cnpj":"62737065000171",
	"type_user":"Customer" or "Shopman"
}
```
### Transação

| Metodo  | API | Descrição |
| ------------- | ------------- |------------- |
| GET  | api/transaction  | Listagem com paginação |
| GET  | api/transaction/list  | Listagem sem paginação |
| POST  | api/transaction  | Cadastro de Transação |
| GET  | api/transaction/show/**{id}**  | Pega o Usuário pelo **{id}** |
| PUT  | api/transaction/update/**{id}**  | Atualização do usuário pelo **{id}** |
| DELETE  | api/transaction/inactivate/**{id}**  | Deleção de usuário pelo **{id}** |

```sh
POST - api/transaction | UPDATE - api/transaction/update/{id}
{
	"payer_id": 11,
	"payee_id": 66,
	"value": 1500.00,
	"type_transaction":"Transfer"
}
```
### Conta

| Metodo  | API | Descrição |
| ------------- | ------------- |------------- |
| GET  | api/account  | Listagem com paginação |
| GET  | api/account/list  | Listagem sem paginação |
| POST  | api/account  | Cadastro de Conta |
| GET  | api/account/show/**{id}**  | Pega o Usuário pelo **{id}** |
| PUT  | api/account/update/**{id}**  | Logout no sistema |
| DELETE  | api/account/inactivate/**{id}**  | Deleção de usuário pelo **{id}** |

```sh
POST - api/account | UPDATE - api/account/update/{id}
{
	"payer_id": 11,
	"payee_id": 66,
	"value": 1500.00,
	"type_transaction":"Transfer"
}
```

### Histórico

| Metodo  | API | Descrição |
| ------------- | ------------- |------------- |
| GET  | api/historic  | Listagem com paginação |
| GET  | api/historic/list  | Listagem sem paginação |
| POST  | api/historic  | Cadastro de Histórico |
| GET  | api/historic/show/**{id}**  | Pega o histórico pelo **{id}** |
| PUT  | api/historic/update/**{id}**  | Atualização do histórico pelo **{id}** |
| DELETE  | api/historic/inactivate/**{id}**  | Deleção de histórico pelo **{id}** |

```sh
POST - api/historic | UPDATE - api/historic/update/{id}
{
	"account_id": 3,
	"payer_id": 66,
	"payee_id": 33,
	"previous_balance": 556.00,
	"future_balance": 556.00,
	"value": 556.00,
	"type_historic": "Transfer"
}
```

