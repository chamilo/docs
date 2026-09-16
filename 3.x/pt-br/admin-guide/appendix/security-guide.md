# Guia de Segurança

Este guia aborda as melhores práticas de segurança para executar uma plataforma Chamilo 3.0 em produção. A segurança é uma responsabilidade compartilhada entre o software da plataforma, a configuração do servidor e as práticas operacionais contínuas.

Para as ferramentas internas de monitoramento e auditoria mencionadas ao longo deste guia (registros de tentativas de login, detecção de intrusão, varreduras de força de senha e verificações de integridade de arquivos), consulte o capítulo [Segurança](../security/README.md).

## Mantenha o Chamilo Atualizado

A prática de segurança mais importante é manter a instalação do Chamilo atualizada.

* Inscreva-se na conta X de segurança do Chamilo (@chamilosecurity) ou acompanhe o repositório GitHub para anúncios de versões.
* Aplique patches de segurança prontamente. Atualizações menores dentro do ramo 3.0 são projetadas para serem seguras de aplicar.
* Siga o [processo de atualização](../installation/upgrading.md) para cada atualização.

## HTTPS

Sempre sirva o Chamilo sobre HTTPS em produção.

* Obtenha um certificado SSL/TLS (Let's Encrypt fornece certificados gratuitos via Certbot).
* Configure o servidor web para redirecionar todo o tráfego HTTP para HTTPS.
* Habilite o cabeçalho HSTS (HTTP Strict Transport Security) para prevenir ataques de downgrade:

  ```
  Strict-Transport-Security: max-age=31536000; includeSubDomains
  ```

Sem HTTPS, credenciais de login, cookies de sessão e todos os dados do usuário são transmitidos em texto simples e podem ser interceptados na rede.

## Permissões de Arquivos

Restrinja as permissões de arquivos ao mínimo necessário.

| Caminho | Proprietário | Permissões | Observações |
|------|-------|-------------|-------|
| Arquivos da aplicação (código-fonte) | root ou usuário de deploy | 755 (dirs), 644 (files) | O servidor web precisa de acesso somente leitura. |
| `var/` | usuário do servidor web | 775 | Deve ser gravável para cache do Symfony, logs e uploads de arquivos |
| `.env` | root ou usuário de deploy | 640 | Contém segredos. O servidor web precisa de acesso de leitura apenas durante o uso normal, mas precisa de acesso de escrita durante a instalação. |
| `config/` | root ou usuário de deploy | 750 | Contém segredos. O servidor web precisa de acesso de leitura apenas durante o uso normal, mas precisa de acesso de escrita durante a instalação. |

Nunca defina permissões como 777. Nunca execute o servidor web como root.

## Políticas de Senha

Configure requisitos de senha fortes em [Configurações de Segurança](../platform-settings/security-settings.md):

* Comprimento mínimo de 8 caracteres (12+ recomendado).
* Exija uma combinação de maiúsculas, minúsculas, números e caracteres especiais.
* Considere habilitar a expiração de senhas em ambientes orientados à conformidade.
* Eduque os usuários sobre a escolha de senhas fortes e únicas.

## Limitação de Taxa e Proteção contra Força Bruta

### Nível da Aplicação

* Defina **Máximo de tentativas de login antes de bloquear a conta** (`login_max_attempt_before_blocking_account`) para um valor pequeno (por exemplo, 5).
* Habilite **CAPTCHA** na página de login. O CAPTCHA é ligado/desligado — ele não é ativado automaticamente após N logins falhos. Combine-o com **Erros de CAPTCHA antes de bloquear** (`captcha_number_mistakes_to_block_account`) para bloquear uma conta que continua falhando no CAPTCHA.
* Revise periodicamente o relatório de [Tentativas de Login](../security/login-attempts.md) para identificar padrões de força bruta, e o relatório [Simple IDS](../security/simple-ids.md) para outras requisições sinalizadas (tentativas de XSS, path traversal e similares).

### Nível do Servidor

Use **fail2ban** para monitorar falhas de login e bloquear endereços IP ofensores:

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

Crie um filtro correspondente em `/etc/fail2ban/filter.d/chamilo-auth.conf` para corresponder às entradas de log de falha de autenticação.

## Gerenciamento de Sessão

* Defina um **tempo de vida da sessão** razoável (por exemplo, 3600 segundos / 1 hora) nas configurações de segurança.
* Configure **flags do cookie de sessão** na configuração do Symfony:

  ```yaml
  # config/packages/framework.yaml
  framework:
      session:
          cookie_secure: true      # Only send over HTTPS
          cookie_httponly: true     # Not accessible via JavaScript
          cookie_samesite: lax     # CSRF protection
  ```

* Considere desabilitar "Lembrar-me" em plataformas com conteúdo sensível.

## Cabeçalhos de Segurança HTTP

Configure o servidor web para enviar cabeçalhos de segurança:

| Cabeçalho | Valor | Finalidade |
|--------|-------|---------|
| `X-Content-Type-Options` | `nosniff` | Impede o sniffing de tipo MIME. |
| `X-Frame-Options` | `SAMEORIGIN` | Impede clickjacking via iframes. |
| `X-XSS-Protection` | `1; mode=block` | Proteção XSS legada para navegadores mais antigos. |
| `Referrer-Policy` | `strict-origin-when-cross-origin` | Controla o vazamento de informações de referrer. |
| `Content-Security-Policy` | Varies | Controla quais recursos podem ser carregados. Exige ajuste cuidadoso para o Chamilo. |

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

## Segurança de Envio de Arquivos

* Bloqueie extensões de arquivos executáveis (exe, bat, sh, php, phtml, cgi) em [Configurações de Segurança](../platform-settings/security-settings.md).
* Configure o servidor web para **nunca executar arquivos enviados**. Para Apache, adicione ao diretório var/ inteiro:

  ```apache
  <Directory /path/to/chamilo/var>
      php_admin_flag engine off
      RemoveHandler .php .phtml .php3 .php5
  </Directory>
  ```

* Analise os arquivos enviados com um antivírus (ClamAV) se o seu ambiente exigir.

## Segurança do Banco de Dados

* Use um **usuário de banco de dados dedicado** para o Chamilo, apenas com os privilégios de que precisa (SELECT, INSERT, UPDATE, DELETE, CREATE, ALTER, DROP, INDEX no banco de dados do Chamilo).
* Não use a conta root do banco de dados.
* Garanta que o banco de dados não esteja acessível pela internet pública. Vincule-o a localhost ou a uma rede privada.
* Ative o registro de auditoria do banco de dados em ambientes sensíveis a conformidade.

## Backups

* Agende **backups automatizados diários** tanto do banco de dados quanto dos arquivos enviados.
* Armazene os backups em um local separado do servidor (offsite ou armazenamento em nuvem).
* Teste periodicamente a restauração de backups para verificar se eles são utilizáveis.
* Criptografe os backups se eles contiverem dados sensíveis.

Consulte [Backups](../maintenance/backups.md) para instruções detalhadas.

## Monitoramento

* Monitore os logs do Chamilo em `var/log/prod.log` em busca de erros e atividade suspeita.
* Configure o monitoramento do servidor (CPU, memória, disco) para detectar esgotamento de recursos.
* Configure alertas para falhas de autenticação repetidas.
* Revise periodicamente as contas de usuário em busca de contas não autorizadas ou inativas.
* Agende verificações de [Integridade de Arquivos](../security/file-integrity.md) (Chamilo 3.0+) no cron para ser notificado quando arquivos instalados mudarem inesperadamente, e execute o [Verificador de Força de Senha](../security/password-strength-checker.md) periodicamente, especialmente após importações em massa de usuários.

## Lista de verificação

Use esta lista de verificação ao implantar ou auditar uma instalação do Chamilo:

- [ ] HTTPS habilitado com certificado válido
- [ ] Redirecionamento de HTTP para HTTPS configurado
- [ ] `APP_ENV=prod` e `APP_DEBUG=0` em `.env`
- [ ] `APP_SECRET` exclusivo gerado
- [ ] Permissões de arquivos restritas (sem 777)
- [ ] Política de senhas configurada
- [ ] Máximo de tentativas de login e CAPTCHA habilitados
- [ ] Extensões de arquivos executáveis bloqueadas
- [ ] Cabeçalhos de segurança configurados no servidor web
- [ ] Flags de cookie de sessão definidas (secure, httponly, samesite)
- [ ] Usuário do banco de dados com privilégios mínimos
- [ ] Backups automatizados agendados e testados
- [ ] Linha de base de integridade de arquivos estabelecida e varredura agendada no cron (Chamilo 3.0+)
- [ ] Monitoramento de logs em vigor
- [ ] Versão do Chamilo está atualizada