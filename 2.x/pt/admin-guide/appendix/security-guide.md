# Guia de Segurança

Este guia aborda as melhores práticas de segurança para operar uma plataforma Chamilo 2.0 em produção. A segurança é uma responsabilidade compartilhada entre o software da plataforma, a configuração do seu servidor e as práticas operacionais contínuas.

## Mantenha o Chamilo Atualizado

A prática de segurança mais importante é manter sua instalação do Chamilo atualizada.

* Inscreva-se na conta X de segurança do Chamilo (@chamilosecurity) ou acompanhe o repositório no GitHub para anúncios de lançamentos.
* Aplique patches de segurança prontamente. Atualizações menores dentro da branch 2.0 são projetadas para serem seguras de aplicar.
* Siga o [processo de atualização](../installation/upgrading.md) para cada atualização.

## HTTPS

Sempre disponibilize o Chamilo via HTTPS em produção.

* Obtenha um certificado SSL/TLS (o Let's Encrypt oferece certificados gratuitos via Certbot).
* Configure seu servidor web para redirecionar todo o tráfego HTTP para HTTPS.
* Habilite o cabeçalho HSTS (HTTP Strict Transport Security) para prevenir ataques de downgrade:

  ```
  Strict-Transport-Security: max-age=31536000; includeSubDomains
  ```

Sem HTTPS, credenciais de login, cookies de sessão e todos os dados do usuário são transmitidos em texto simples e podem ser interceptados na rede.

## Permissões de Arquivos

Restrinja as permissões de arquivos ao mínimo necessário.

| Caminho | Proprietário | Permissões | Notas |
|---------|--------------|------------|-------|
| Arquivos da aplicação (código-fonte) | root ou usuário de implantação | 755 (diretórios), 644 (arquivos) | O servidor web precisa de acesso somente leitura. |
| `var/` | usuário do servidor web | 775 | Deve ser gravável para cache do Symfony, logs e uploads de arquivos |
| `.env` | root ou usuário de implantação | 640 | Contém segredos. O servidor web precisa de acesso de leitura apenas durante o uso normal, mas precisa de acesso de escrita durante a instalação. |
| `config/` | root ou usuário de implantação | 750 | Contém segredos. O servidor web precisa de acesso de leitura apenas durante o uso normal, mas precisa de acesso de escrita durante a instalação. |

Nunca defina permissões como 777. Nunca execute o servidor web como root.

## Políticas de Senha

Configure requisitos rigorosos para senhas em [Configurações de Segurança](../platform-settings/security-settings.md):

* Comprimento mínimo de 8 caracteres (12+ recomendado).
* Exija uma combinação de letras maiúsculas, minúsculas, números e caracteres especiais.
* Considere habilitar a expiração de senhas para ambientes orientados por conformidade.
* Eduque os usuários sobre a escolha de senhas fortes e únicas.

## Limitação de Taxa e Proteção contra Ataques de Força Bruta

### Nível da Aplicação

* Defina **Máximo de tentativas de login antes de bloquear a conta** (`login_max_attempt_before_blocking_account`) para um valor pequeno (por exemplo, 5).
* Habilite o **CAPTCHA** na página de login. O CAPTCHA é ativado/desativado — não é ligado automaticamente após N tentativas falhas de login. Combine-o com **Erros de CAPTCHA antes de bloquear** (`captcha_number_mistakes_to_block_account`) para bloquear uma conta que continua falhando no CAPTCHA.

### Nível do Servidor

Use o **fail2ban** para monitorar falhas de login e bloquear endereços IP ofensores:

```ini
# /etc/fail2ban/jail.d/chamilo.conf
[chamilo]
enabled = true
port = http,https
filter = chamilo-auth
logpath = /path/to/chamilo/var/log/prod.log
maxretry = 5
bantime = 900
```

Crie um filtro correspondente em `/etc/fail2ban/filter.d/chamilo-auth.conf` para corresponder a entradas de log de falhas de autenticação.

## Gerenciamento de Sessões

* Defina um **tempo de vida da sessão** razoável (por exemplo, 3600 segundos / 1 hora) nas configurações de segurança.
* Configure **flags de cookie de sessão** na sua configuração do Symfony:

  ```yaml
  # config/packages/framework.yaml
  framework:
      session:
          cookie_secure: true      # Enviar apenas via HTTPS
          cookie_httponly: true     # Não acessível via JavaScript
          cookie_samesite: lax     # Proteção contra CSRF
  ```

* Considere desativar a opção "Lembrar-me" em plataformas com conteúdo sensível.

## Cabeçalhos de Segurança HTTP

Configure seu servidor web para enviar cabeçalhos de segurança:

| Cabeçalho | Valor | Finalidade |
|-----------|-------|------------|
| `X-Content-Type-Options` | `nosniff` | Impede a detecção de tipo MIME. |
| `X-Frame-Options` | `SAMEORIGIN` | Impede clickjacking via iframes. |
| `X-XSS-Protection` | `1; mode=block` | Proteção XSS legada para navegadores mais antigos. |
| `Referrer-Policy` | `strict-origin-when-cross-origin` | Controla vazamento de informações de referência. |
| `Content-Security-Policy` | Varia | Controla quais recursos podem ser carregados. Requer ajuste cuidadoso para o Chamilo. |

Exemplo para Apache:

```apache
Header always set X-Content-Type-Options "nosniff"
Header always set X-Frame-Options "SAMEORIGIN"
Header always set Referrer-Policy "strict-origin-when-cross-origin"
```

Exemplo para Nginx:

```nginx
add_header X-Content-Type-Options "nosniff" always;
add_header X-Frame-Options "SAMEORIGIN" always;
add_header Referrer-Policy "strict-origin-when-cross-origin" always;
```

## Segurança no Upload de Arquivos

* Bloqueie extensões de arquivos executáveis (exe, bat, sh, php, phtml, cgi) nas [Configurações de Segurança](../platform-settings/security-settings.md).
* Configure seu servidor web para **nunca executar arquivos enviados**. Para o Apache, adicione ao diretório inteiro var/:

  ```apache
  <Directory /path/to/chamilo/var>
      php_admin_flag engine off
      RemoveHandler .php .phtml .php3 .php5
  </Directory>
  ```

* Escaneie os arquivos enviados com um antivírus (ClamAV) se o seu ambiente exigir isso.

## Segurança do Banco de Dados

* Use um **usuário de banco de dados dedicado** para o Chamilo com apenas os privilégios necessários (SELECT, INSERT, UPDATE, DELETE, CREATE, ALTER, DROP, INDEX no banco de dados do Chamilo).
* Não use a conta root do banco de dados.
* Garanta que o banco de dados não seja acessível pela internet pública. Vincule-o ao localhost ou a uma rede privada.
* Ative o registro de auditoria do banco de dados para ambientes sensíveis a conformidade.

## Backups

* Programe **backups automáticos diários** tanto do banco de dados quanto dos arquivos enviados.
* Armazene os backups em um local separado do servidor (offsite ou armazenamento em nuvem).
* Teste periodicamente a restauração de backups para verificar se eles são utilizáveis.
* Cripte os backups se eles contiverem dados sensíveis.

Consulte [Backups](../maintenance/backups.md) para instruções detalhadas.

## Monitoramento

* Monitore os logs do Chamilo em `var/log/prod.log` para erros e atividades suspeitas.
* Configure o monitoramento do servidor (CPU, memória, disco) para detectar esgotamento de recursos.
* Configure alertas para falhas repetidas de autenticação.
* Revise periodicamente as contas de usuário para identificar contas não autorizadas ou inativas.

## Lista de Verificação

Use esta lista de verificação ao implantar ou auditar uma instalação do Chamilo:

- [ ] HTTPS habilitado com certificado válido
- [ ] Redirecionamento de HTTP para HTTPS configurado
- [ ] `APP_ENV=prod` e `APP_DEBUG=0` em `.env`
- [ ] `APP_SECRET` único gerado
- [ ] Permissões de arquivo restritas (sem 777)
- [ ] Política de senha configurada
- [ ] Máximo de tentativas de login e CAPTCHA habilitados
- [ ] Extensões de arquivos executáveis bloqueadas
- [ ] Cabeçalhos de segurança configurados no servidor web
- [ ] Flags de cookie de sessão definidas (secure, httponly, samesite)
- [ ] Usuário do banco de dados com privilégios mínimos
- [ ] Backups automáticos programados e testados
- [ ] Monitoramento de logs em vigor
- [ ] Versão do Chamilo atualizada