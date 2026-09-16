# Configuração de Desenvolvimento

## Pré-requisitos

* PHP 8.3, 8.4 ou 8.5 com as extensões: intl, gd, curl, zip, mbstring, xml, json, pdo, ldap, exif, bcmath
* Composer
* Node.js e npm (ou Yarn — o projeto utiliza Yarn 4; consulte `package.json` para a versão exata fixada)
* MySQL 5.7+ ou MariaDB 10.11+
* Git

## Passos de Instalação

### 1. Clonar o Repositório

```bash
git clone https://github.com/chamilo/chamilo-lms.git chamilo
cd chamilo
```

### 2. Instalar as Dependências PHP

```bash
composer install
```

### 3. Configurar o Ambiente

O repositório inclui `.env.dist` como referência. Crie um ficheiro `.env` vazio que o instalador web irá preencher — mantê-lo vazio garante que as atualizações nunca substituam a sua configuração local:

```bash
touch .env
```

Em seguida, torne `.env` e `config/` graváveis pelo servidor web para que o instalador possa escrever a sua configuração local:

```bash
sudo chown -R www-data: .env config/ var/
```

### 4. Instalar as Dependências de Frontend e Compilar

```bash
# Install JavaScript dependencies
yarn install

# Build frontend assets for development
yarn encore dev

# Or watch for changes during development
yarn encore dev --watch
```

### 5. Iniciar o Servidor de Desenvolvimento

```bash
symfony server:start
```

Ou utilize Apache/Nginx apontando para o diretório `public/`.

### 6. Configurar a Base de Dados

Execute o assistente de instalação baseado na web, acedendo ao URL do Chamilo no browser.

### 7. Gerar as Chaves JWT

```bash
php bin/console lexik:jwt:generate-keypair
```

### 8. Proteger o sistema

O ficheiro `.env` e o diretório `config/` só precisam de ser graváveis durante a instalação. Proteja-os depois:

```bash
sudo chown -R root: .env config/
```

O diretório `var/` precisa de permanecer gravável pelo servidor web.


## Comandos de Compilação

| Command | Purpose |
|---------|---------|
| `yarn encore dev` | Compilar o frontend para desenvolvimento |
| `yarn encore dev --watch` | Compilar e observar alterações |
| `yarn encore production` | Compilar otimizado para produção |
| `php bin/console cache:clear` | Limpar a cache do Symfony |

## Dicas de Desenvolvimento

* Defina `APP_ENV=dev` e `APP_DEBUG=1` em `.env` para mensagens de erro detalhadas
* A barra de ferramentas de depuração do Symfony aparece na parte inferior das páginas em modo de desenvolvimento
* A documentação da API está disponível em `/api` quando `APP_ENABLE_API_ENTRYPOINT=true` (após limpar a cache — consulte [Configuração](../../admin-guide/installation/configuration.md#enable-the-api-documentation))
* Utilize `yarn encore dev --watch` para recompilar automaticamente as alterações de frontend