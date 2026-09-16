# Requisitos do Servidor

Antes de instalar o Chamilo 3.0, verifique se o seu servidor atende aos seguintes requisitos.

## Requisitos de Software

### PHP

| Requirement | Minimum | Recommended |
|-------------|---------|-------------|
| **PHP version** | 8.3 | 8.5 |

### Extensões PHP Obrigatórias

| Extension | Purpose |
|-----------|---------|
| **bcmath** | Matemática de precisão arbitrária |
| **ctype** | Verificação de tipo de caractere |
| **curl** | Requisições HTTP (integrações de API, serviços externos) |
| **dom**, **libxml**, **simplexml**, **xml**, **xmlreader** | Análise de XML e manipulação de DOM (SCORM, RSS, SOAP, LTI) |
| **exif** | Leitura de metadados de imagens (por exemplo, orientação automática de fotos enviadas) |
| **fileinfo** | Detecção de tipo MIME para arquivos enviados |
| **gd** | Processamento de imagens (miniaturas, CAPTCHA) |
| **iconv** | Conversão de conjuntos de caracteres |
| **intl** | Internacionalização (formatação de datas, números e strings) |
| **json** | Codificação/decodificação JSON |
| **ldap** | Conector LDAP. Embora provavelmente você não use LDAP, o Chamilo o exige |
| **mbstring** | Manipulação de strings multibyte (suporte a UTF-8) |
| **openssl** | Operações criptográficas (HTTPS, hash de senhas, tokens JWT) |
| **pdo**, plus **pdo_mysql** or **pdo_pgsql** | Conectividade com banco de dados (instale o driver correspondente ao seu banco de dados) |
| **soap** | Manipulação de serviços web SOAP |
| **zip** | Manipulação de arquivos ZIP (pacotes SCORM, importações/exportações em lote) |
| **zlib** | Compressão usada internamente por várias dependências |
| **apcu** | Cache em nível de usuário (recomendado; verificado, mas não imposto pelo instalador) |
| **opcache** | Cache de opcode (fortemente recomendado para desempenho; verificado, mas não imposto pelo instalador) |
| **xapian** | Busca em texto completo (opcional, somente se você usar busca) |

### Banco de Dados

| Database | Minimum Version | Recommended |
|----------|-----------------|-------------|
| **MariaDB** | 10.0 | 10.4 or higher |
| **MySQL** | 5.7 | 8.0 or higher |

Versões do MariaDB anteriores a 10.2.2 (e versões do MySQL anteriores a 5.7) precisam que o suporte a índices/prefixos grandes seja habilitado manualmente na configuração do servidor antes de instalar o Chamilo.

### Servidor Web

| Server | Notes |
|--------|-------|
| **Apache** | Requires `mod_rewrite` (and `ssl`, `headers`, `expires`) enabled. Chamilo ships a sample vhost at `public/main/install/apache.dist.conf`. |
| **Nginx** | Requires manual configuration for URL rewriting — Chamilo does not ship a sample Nginx config. See the Symfony Nginx documentation for a reference configuration. |

### Ferramentas de Build

| Tool | Purpose |
|------|---------|
| **Composer** (^2.8) | PHP dependency management. Required to install Chamilo's PHP libraries. |
| **Node.js** (20+ LTS) | JavaScript runtime. Required to build frontend assets. |
| **Yarn** (^4, via Corepack) | JavaScript package manager used to build frontend assets (`yarn install`, `yarn encore production`). |

## Requisitos de Hardware

| Resource | Minimum | Recommended |
|----------|---------|-------------|
| **RAM** | 4 GB | 8 GB or more (building frontend assets from source needs at least 4 GB on its own) |
| **CPU** | 2 vCPUs | 2+ cores |
| **Disk space** | 4 GB (application only) | 20+ GB (including uploaded content); building from source needs ~10 GB free during the build |
| **Disk type** | HDD | SSD (significantly improves database and cache performance) |

Esses são valores de referência do próprio guia de instalação do Chamilo. Os requisitos reais dependem do número de usuários simultâneos e do volume de conteúdo hospedado.

## Sistema Operacional

| OS | Notes |
|----|-------|
| **Linux** | Recommended. Ubuntu 24.04 LTS+, Debian 12+, AlmaLinux 9+, or equivalent. |
| **Windows** | Possible but not thoroughly tested. Use WSL2 for development. |
| **macOS** | Development only / untested. |

## Requisitos de Rede

* Um nome de domínio apontando para o seu servidor.
* Um certificado SSL/TLS para HTTPS (o Let's Encrypt fornece certificados gratuitos).
* Acesso SMTP de saída se o envio de e-mails for feito diretamente (ou use um serviço de e-mail de terceiros).
* Porta 443 (HTTPS) e, opcionalmente, porta 80 (HTTP, para redirecionamento para HTTPS).

## Verificação dos Requisitos

Após colocar o código-fonte do Chamilo no seu servidor, você pode verificar a configuração do PHP diretamente:

```bash
php -m          # List installed extensions
php -i          # Full PHP info
```

## Dicas

* **Use PHP-FPM** com Apache ou Nginx para melhor desempenho do que o mod_php.
* **Separe o banco de dados** em um servidor dedicado para plataformas que esperam mais de 500 usuários simultâneos.
* **Use armazenamento SSD** -- Aplicações intensivas em banco de dados como o Chamilo se beneficiam significativamente de I/O de disco rápido.