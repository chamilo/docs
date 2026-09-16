# Requisitos do Servidor

Antes de instalar o Chamilo 2.0, verifique se o seu servidor atende aos seguintes requisitos.

## Requisitos de Software

### PHP

| Requisito | Mínimo | Recomendado |
|-----------|--------|-------------|
| **Versão do PHP** | 8.2 | 8.3 ou superior |

### Extensões PHP Necessárias

| Extensão | Finalidade |
|----------|------------|
| **curl** | Requisições HTTP (integrações com API, serviços externos) |
| **fileinfo** | Detecção de tipo MIME para arquivos enviados |
| **gd** | Processamento de imagens (miniaturas, CAPTCHA) |
| **intl** | Internacionalização (formatação de data, número e string) |
| **json** | Codificação/decodificação de JSON |
| **ldap** | Conector LDAP. Embora você provavelmente não use LDAP, o Chamilo o exige |
| **mbstring** | Manipulação de strings multibyte (suporte a UTF-8) |
| **openssl** | Operações criptográficas (HTTPS, hash de senhas, tokens) |
| **pdo_mysql** ou **pdo_pgsql** | Conectividade com banco de dados (instale o correspondente ao seu banco de dados) |
| **xml** | Análise de XML (SCORM, RSS, SOAP) |
| **zip** | Manipulação de arquivos ZIP (pacotes SCORM, importações/exportações em massa) |
| **apcu** | Cache em nível de usuário (recomendado) |
| **opcache** | Cache de opcode (fortemente recomendado para desempenho) |
| **xapian** | Pesquisa de texto completo (opcional, apenas se você usar a funcionalidade de busca) |

### Banco de Dados

| Banco de Dados | Versão Mínima |
|----------------|---------------|
| **MySQL** | 8.0 |
| **MariaDB** | 10.4 |

### Servidor Web

| Servidor | Observações |
|----------|-------------|
| **Apache** | Requer `mod_rewrite` habilitado. |
| **Nginx** | Requer configuração manual para reescrita de URL. Consulte a documentação do Symfony Nginx para uma configuração de referência. |

### Ferramentas de Build

| Ferramenta | Finalidade |
|------------|------------|
| **Composer** | Gerenciamento de dependências PHP. Necessário para instalar as bibliotecas PHP do Chamilo. |
| **Node.js** (18+) | Ambiente de execução JavaScript. Necessário para construir ativos de frontend. |
| **npm** | Gerenciador de pacotes JavaScript. Instalado com o Node.js. |

## Requisitos de Hardware

| Recurso | Mínimo | Recomendado |
|---------|--------|-------------|
| **RAM** | 2 GB | 4 GB ou mais |
| **CPU** | 1 núcleo | 2+ núcleos |
| **Espaço em disco** | 2 GB (apenas aplicação) | 20+ GB (incluindo conteúdo enviado) |
| **Tipo de disco** | HDD | SSD (melhora significativamente o desempenho do banco de dados e cache) |

Esses são valores de referência. Os requisitos reais dependem do número de usuários simultâneos e do volume de conteúdo hospedado.

## Sistema Operacional

| SO | Observações |
|----|-------------|
| **Linux** | Recomendado. Ubuntu 22.04+, Debian 12+, AlmaLinux 9+ ou equivalente. |
| **Windows** | Possível, mas não exaustivamente testado. Use WSL2 para desenvolvimento. |
| **macOS** | Apenas para desenvolvimento / não testado. |

## Requisitos de Rede

* Um nome de domínio apontando para o seu servidor.
* Um certificado SSL/TLS para HTTPS (Let's Encrypt oferece certificados gratuitos).
* Acesso SMTP de saída se enviar e-mails diretamente (ou use um serviço de e-mail de terceiros).
* Porta 443 (HTTPS) e, opcionalmente, porta 80 (HTTP, para redirecionamento para HTTPS).

## Verificação de Requisitos

Após colocar o código-fonte do Chamilo no seu servidor, você pode verificar a configuração do PHP diretamente:

```bash
php -m          # Lista extensões instaladas
php -i          # Informações completas do PHP
```

## Dicas

* **Use PHP-FPM** com Apache ou Nginx para melhor desempenho do que mod_php.
* **Separe seu banco de dados** em um servidor dedicado para plataformas que esperam mais de 500 usuários simultâneos.
* **Use armazenamento SSD** -- Aplicações com grande uso de banco de dados, como o Chamilo, se beneficiam significativamente de I/O de disco rápido.