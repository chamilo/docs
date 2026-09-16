# Guia de Segurança

Este guia aborda as melhores práticas de segurança para executar uma plataforma Chamilo 3.0 em produção. A segurança é uma responsabilidade partilhada entre o software da plataforma, a configuração do servidor e as práticas operacionais contínuas.

Para as ferramentas integradas de monitorização e auditoria referenciadas ao longo deste guia (registos de tentativas de início de sessão, deteção de intrusões, análises de força de palavras-passe e verificações de integridade de ficheiros), consulte o capítulo [Segurança](../security/README.md).

## Manter o Chamilo Atualizado

A prática de segurança mais importante é manter a sua instalação do Chamilo atualizada.

* Subscreva a conta X de segurança do Chamilo (@chamilosecurity) ou acompanhe o repositório GitHub para anúncios de versões.
* Aplique as correções de segurança prontamente. As atualizações menores dentro do ramo 3.0 foram concebidas para serem seguras de aplicar.
* Siga o [processo de atualização](../installation/upgrading.md) para cada atualização.

## HTTPS

Sirva sempre o Chamilo através de HTTPS em produção.

* Obtenha um certificado SSL/TLS (Let's Encrypt fornece certificados gratuitos via Certbot).
* Configure o seu servidor web para redirecionar todo o tráfego HTTP para HTTPS.
* Ative o cabeçalho HSTS (HTTP Strict Transport Security) para impedir ataques de downgrade:

  ```
  Strict-Transport-Security: max-age=31536000; includeSubDomains
  ```

Sem HTTPS, as credenciais de início de sessão, os cookies de sessão e todos os dados dos utilizadores são transmitidos em texto simples e podem ser interceptados na rede.

## Permissões de Ficheiros

Restrinja as permissões de ficheiros ao mínimo necessário.

| Caminho | Proprietário | Permissões | Notas |
|------|-------|-------------|-------|
| Ficheiros da aplicação (código-fonte) | root ou utilizador de deploy | 755 (dirs), 644 (files) | O servidor web precisa de acesso apenas de leitura. |
| `var/` | utilizador do servidor web | 775 | Deve ser gravável para a cache do Symfony, registos e carregamentos de ficheiros |
| `.env` | root ou utilizador de deploy | 640 | Contém segredos. O servidor web precisa de acesso apenas de leitura durante o uso normal, mas precisa de acesso de escrita durante a instalação. |
| `config/` | root ou utilizador de deploy | 750 | Contém segredos. O servidor web precisa de acesso apenas de leitura durante o uso normal, mas precisa de acesso de escrita durante a instalação. |

Nunca defina permissões para 777. Nunca execute o servidor web como root.

## Políticas de Palavras-passe

Configure requisitos de palavras-passe fortes em [Definições de Segurança](../platform-settings/security-settings.md):

* Comprimento mínimo de 8 caracteres (recomendam-se 12 ou mais).
* Exija uma combinação de maiúsculas, minúsculas, números e caracteres especiais.
* Considere ativar a expiração de palavras-passe em ambientes orientados para a conformidade.
* Eduque os utilizadores sobre a escolha de palavras-passe fortes e únicas.

## Limitação de Taxa e Proteção contra Força Bruta

### Nível da Aplicação

* Defina **Máximo de tentativas de início de sessão antes de bloquear a conta** (`login_max_attempt_before_blocking_account`) para um valor pequeno (por exemplo, 5).
* Ative o **CAPTCHA** na página de início de sessão. O CAPTCHA está ligado/desligado — não é ativado automaticamente após N inícios de sessão falhados. Combine-o com **Erros de CAPTCHA antes de bloquear** (`captcha_number_mistakes_to_block_account`) para bloquear uma conta que continua a falhar o CAPTCHA.
* Reveja periodicamente o relatório [Tentativas de Início de Sessão](../security/login-attempts.md) para identificar padrões de força bruta, e o relatório [Simple IDS](../security/simple-ids.md) para outros pedidos sinalizados (tentativas de XSS, path traversal e semelhantes).

### Nível do Servidor

Utilize o **fail2ban** para monitorizar falhas de início de sessão e bloquear endereços IP ofensivos:

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

Crie um filtro correspondente em `/etc/fail2ban/filter.d/chamilo-auth.conf` para corresponder às entradas de registo de falha de autenticação.

## Gestão de Sessões

* Defina um **tempo de vida da sessão** razoável (p. ex., 3600 segundos / 1 hora) nas definições de segurança.
* Configure as **flags do cookie de sessão** na sua configuração Symfony:

  ```yaml
  # config/packages/framework.yaml
  framework:
      session:
          cookie_secure: true      # Only send over HTTPS
          cookie_httponly: true     # Not accessible via JavaScript
          cookie_samesite: lax     # CSRF protection
  ```

* Considere desativar "Remember me" em plataformas com conteúdo sensível.

## Cabeçalhos de Segurança HTTP

Configure o servidor web para enviar cabeçalhos de segurança:

| Cabeçalho | Valor | Finalidade |
|--------|-------|---------|
| `X-Content-Type-Options` | `nosniff` | Impede o sniffing de tipo MIME. |
| `X-Frame-Options` | `SAMEORIGIN` | Impede clickjacking através de iframes. |
| `X-XSS-Protection` | `1; mode=block` | Proteção XSS legada para navegadores mais antigos. |
| `Referrer-Policy` | `strict-origin-when-cross-origin` | Controla a fuga de informação do referrer. |
| `Content-Security-Policy` | Varia | Controla quais recursos podem ser carregados. Requer afinação cuidadosa para o Chamilo. |

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

## Segurança de Carregamento de Ficheiros

* Bloqueie extensões de ficheiros executáveis (exe, bat, sh, php, phtml, cgi) em [Definições de Segurança](../platform-settings/security-settings.md).
* Configure o servidor web para **nunca executar ficheiros carregados**. Para Apache, adicione a todo o diretório var/:

  ```apache
  <Directory /path/to/chamilo/var>
      php_admin_flag engine off
      RemoveHandler .php .phtml .php3 .php5
  </Directory>
  ```

* Analise os ficheiros carregados com um antivírus (ClamAV) se o seu ambiente o exigir.

## Segurança da Base de Dados

* Utilize um **utilizador de base de dados dedicado** para o Chamilo apenas com os privilégios de que necessita (SELECT, INSERT, UPDATE, DELETE, CREATE, ALTER, DROP, INDEX na base de dados do Chamilo).
* Não utilize a conta root da base de dados.
* Garanta que a base de dados não está acessível a partir da Internet pública. Associe-a a localhost ou a uma rede privada.
* Ative o registo de auditoria da base de dados em ambientes sensíveis a conformidade.

## Cópias de Segurança

* Agende **cópias de segurança automatizadas diárias** tanto da base de dados como dos ficheiros carregados.
* Armazene as cópias de segurança num local separado do servidor (offsite ou armazenamento na nuvem).
* Teste periodicamente a restauro das cópias de segurança para verificar que são utilizáveis.
* Encripte as cópias de segurança se contiverem dados sensíveis.

Consulte [Cópias de Segurança](../maintenance/backups.md) para instruções detalhadas.

## Monitorização

* Monitorize os registos do Chamilo em `var/log/prod.log` para erros e atividade suspeita.
* Configure monitorização do servidor (CPU, memória, disco) para detetar esgotamento de recursos.
* Configure alertas para falhas de autenticação repetidas.
* Reveja periodicamente as contas de utilizador em busca de contas não autorizadas ou inativas.
* Agende verificações de [Integridade de Ficheiros](../security/file-integrity.md) (Chamilo 3.0+) no cron para ser notificado quando ficheiros instalados mudarem inesperadamente, e execute o [Verificador de Força de Palavras-passe](../security/password-strength-checker.md) periodicamente, especialmente após importações em massa de utilizadores.

## Lista de Verificação

Utilize esta lista de verificação ao implementar ou auditar uma instalação do Chamilo:

- [ ] HTTPS ativado com certificado válido
- [ ] Redirecionamento de HTTP para HTTPS configurado
- [ ] `APP_ENV=prod` e `APP_DEBUG=0` em `.env`
- [ ] `APP_SECRET` único gerado
- [ ] Permissões de ficheiros restritas (sem 777)
- [ ] Política de palavras-passe configurada
- [ ] Máximo de tentativas de início de sessão e CAPTCHA ativados
- [ ] Extensões de ficheiros executáveis bloqueadas
- [ ] Cabeçalhos de segurança configurados no servidor web
- [ ] Flags do cookie de sessão definidas (secure, httponly, samesite)
- [ ] Utilizador da base de dados com privilégios mínimos
- [ ] Cópias de segurança automatizadas agendadas e testadas
- [ ] Linha de base de integridade de ficheiros estabelecida e análise agendada no cron (Chamilo 3.0+)
- [ ] Monitorização de registos em vigor
- [ ] A versão do Chamilo está atualizada