# Configuração para Desenvolvimento

## Pré-requisitos

* PHP 8.2+ com as extensões: intl, gd, curl, zip, mbstring, xml, json, pdo, ldap, exif, bcmath
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

### 2. Instalar Dependências do PHP

```bash
composer install
```

### 3. Configurar o Ambiente

O repositório inclui o arquivo `.env.dist` como referência. Crie um arquivo `.env` vazio que será preenchido pelo instalador web — mantê-lo vazio garante que atualizações nunca sobrescrevam sua configuração local:

```bash
touch .env
```

Em seguida, torne `.env` e `config/` graváveis pelo servidor web para que o instalador possa escrever sua configuração local:

```bash
sudo chown -R www-data: .env config/ var/
```

### 4. Instalar Dependências de Frontend e Compilar

```bash
# Instalar dependências JavaScript
yarn install

# Compilar ativos de frontend para desenvolvimento
yarn encore dev

# Ou observar mudanças durante o desenvolvimento
yarn encore dev --watch
```

### 5. Iniciar o Servidor de Desenvolvimento

```bash
symfony server:start
```

Ou utilize Apache/Nginx apontando para o diretório `public/`.

### 6. Configurar o Banco de Dados

Execute o assistente de instalação baseado na web navegando até a URL do Chamilo em um navegador.

### 7. Gerar Chaves JWT

```bash
php bin/console lexik:jwt:generate-keypair
```

### 8. Proteger seu Sistema

O arquivo `.env` e o diretório `config/` só precisam ser graváveis durante o período de instalação. Proteja-os depois:

```bash
sudo chown -R root: .env config/
```

O diretório `var/` precisa permanecer gravável pelo servidor web.

## Comandos de Compilação

| Comando | Finalidade |
|---------|------------|
| `yarn encore dev` | Compilar frontend para desenvolvimento |
| `yarn encore dev --watch` | Compilar e observar mudanças |
| `yarn encore production` | Compilar otimizado para produção |
| `php bin/console cache:clear` | Limpar o cache do Symfony |

## Dicas de Desenvolvimento

* Defina `APP_ENV=dev` e `APP_DEBUG=1` no arquivo `.env` para mensagens de erro detalhadas
* A barra de depuração do Symfony aparece na parte inferior das páginas no modo de desenvolvimento
* A documentação da API está disponível em `/api` quando `APP_ENABLE_API_ENTRYPOINT=1`
* Use `yarn encore dev --watch` para recompilar automaticamente as alterações no frontend