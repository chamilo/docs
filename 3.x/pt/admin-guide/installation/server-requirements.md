# Requisitos do Servidor

Antes de instalar o Chamilo 3.0, verifique se o seu servidor cumpre os seguintes requisitos.

## Requisitos de Software

### PHP

| Requisito | Mínimo | Recomendado |
|-------------|---------|-------------|
| **Versão do PHP** | 8.3 | 8.5 |

### Extensões PHP Obrigatórias

| Extensão | Finalidade |
|-----------|---------|
| **bcmath** | Matemática de precisão arbitrária |
| **ctype** | Verificação de tipos de caracteres |
| **curl** | Pedidos HTTP (integrações de API, serviços externos) |
| **dom**, **libxml**, **simplexml**, **xml**, **xmlreader** | Análise XML e manipulação de DOM (SCORM, RSS, SOAP, LTI) |
| **exif** | Leitura de metadados de imagens (p. ex., orientação automática de fotografias carregadas) |
| **fileinfo** | Deteção do tipo MIME de ficheiros carregados |
| **gd** | Processamento de imagens (miniaturas, CAPTCHA) |
| **iconv** | Conversão de conjuntos de caracteres |
| **intl** | Internacionalização (formatação de datas, números e cadeias de caracteres) |
| **json** | Codificação/descodificação JSON |
| **ldap** | Conector LDAP. Embora provavelmente não utilize LDAP, o Chamilo exige-o |
| **mbstring** | Manipulação de cadeias de caracteres multibyte (suporte UTF-8) |
| **openssl** | Operações criptográficas (HTTPS, hashing de palavras-passe, tokens JWT) |
| **pdo**, mais **pdo_mysql** ou **pdo_pgsql** | Ligação à base de dados (instale o driver correspondente à sua base de dados) |
| **soap** | Manipulação de serviços web SOAP |
| **zip** | Manipulação de arquivos ZIP (pacotes SCORM, importações/exportações em massa) |
| **zlib** | Compressão utilizada internamente por várias dependências |
| **apcu** | Cache ao nível do utilizador (recomendado; verificado, mas não imposto pelo instalador) |
| **opcache** | Cache de opcode (fortemente recomendado para desempenho; verificado, mas não imposto pelo instalador) |
| **xapian** | Pesquisa de texto integral (opcional, apenas se utilizar a pesquisa) |

### Base de Dados

| Base de dados | Versão mínima | Recomendado |
|----------|-----------------|-------------|
| **MariaDB** | 10.0 | 10.4 ou superior |
| **MySQL** | 5.7 | 8.0 ou superior |

Versões do MariaDB anteriores a 10.2.2 (e versões do MySQL anteriores a 5.7) necessitam de suporte a índices/prefixos grandes ativado manualmente na configuração do servidor antes de instalar o Chamilo.

### Servidor Web

| Servidor | Notas |
|--------|-------|
| **Apache** | Requer `mod_rewrite` (e `ssl`, `headers`, `expires`) ativados. O Chamilo inclui um vhost de exemplo em `public/main/install/apache.dist.conf`. |
| **Nginx** | Requer configuração manual para reescrita de URL — o Chamilo não inclui uma configuração Nginx de exemplo. Consulte a documentação Nginx do Symfony para uma configuração de referência. |

### Ferramentas de Compilação

| Ferramenta | Finalidade |
|------|---------|
| **Composer** (^2.8) | Gestão de dependências PHP. Necessário para instalar as bibliotecas PHP do Chamilo. |
| **Node.js** (20+ LTS) | Ambiente de execução JavaScript. Necessário para construir os recursos de frontend. |
| **Yarn** (^4, via Corepack) | Gestor de pacotes JavaScript utilizado para construir os recursos de frontend (`yarn install`, `yarn encore production`). |

## Requisitos de Hardware

| Recurso | Mínimo | Recomendado |
|----------|---------|-------------|
| **RAM** | 4 GB | 8 GB ou mais (a construção dos recursos de frontend a partir do código-fonte necessita, por si só, de pelo menos 4 GB) |
| **CPU** | 2 vCPUs | 2+ núcleos |
| **Espaço em disco** | 4 GB (apenas a aplicação) | 20+ GB (incluindo conteúdo carregado); a construção a partir do código-fonte necessita de ~10 GB livres durante a compilação |
| **Tipo de disco** | HDD | SSD (melhora significativamente o desempenho da base de dados e da cache) |

Estes são valores de referência do próprio guia de instalação do Chamilo. Os requisitos reais dependem do número de utilizadores simultâneos e do volume de conteúdo alojado.

## Sistema Operativo

| SO | Notas |
|----|-------|
| **Linux** | Recomendado. Ubuntu 24.04 LTS+, Debian 12+, AlmaLinux 9+ ou equivalente. |
| **Windows** | Possível, mas não testado de forma exaustiva. Utilize WSL2 para desenvolvimento. |
| **macOS** | Apenas para desenvolvimento / não testado. |

## Requisitos de Rede

* Um nome de domínio a apontar para o seu servidor.
* Um certificado SSL/TLS para HTTPS (o Let's Encrypt disponibiliza certificados gratuitos).
* Acesso SMTP de saída se enviar e-mails diretamente (ou utilize um serviço de e-mail de terceiros).
* Porta 443 (HTTPS) e, opcionalmente, porta 80 (HTTP, para redirecionamento para HTTPS).

## Verificação dos Requisitos

Após colocar o código-fonte do Chamilo no seu servidor, pode verificar a configuração PHP diretamente:

```bash
php -m          # List installed extensions
php -i          # Full PHP info
```

## Sugestões

* **Utilize PHP-FPM** com Apache ou Nginx para melhor desempenho do que o mod_php.
* **Separe a base de dados** num servidor dedicado para plataformas que esperem mais de 500 utilizadores simultâneos.
* **Utilize armazenamento SSD** -- Aplicações intensivas em base de dados como o Chamilo beneficiam significativamente de I/O de disco rápido.