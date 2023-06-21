
# SManager

Um dashboard criado para manusear as informações de servidores, users e times.


## Features

- Resgistrar
- Login
- Recuperação de palavra-passe
- CRUD do User
- CRUD do Server
- CRUD do Teams
- Pesquisar dentro de User, Server, Teams
- Consultar Teams dentro de Server
- Consultar User dentro de Teams
- Consultar User dentro de Teams e Server


## Run Locally

Clone este repositório para o seu ambiente local:

```bash
  git clone https://fleemings@bitbucket.org/milenas-dashboard/smanager.git
```

Navegue até o diretório do projeto:

```bash
  cd smanager
```

Instale as dependências do projeto usando o Composer:

```bash
  composer install
```

Crie um arquivo de ambiente .env com base no arquivo .env.example:

```bash
  cp .env.example .env
```

Crie um arquivo de ambiente .env com base no arquivo .env.example:

```bash
  php artisan key:generate
```

Configure as informações de conexão com o banco de dados no arquivo .env.

```bash
DB_CONNECTION=mysql
DB_HOST=seu-host
DB_PORT=sua-porta
DB_DATABASE=seu-banco-dados
DB_USERNAME=seu-usuario
DB_PASSWORD=sua-senha
```

Execute as migrações do banco de dados para criar as tabelas:

```bash
  php artisan migrate

```

php artisan db:seed

```bash
  php artisan migrate

```


## Tech Stack

**Client:** Breeze, TailwindCSS, Vite

**Server:** Laragon, MySQL, Laravel

