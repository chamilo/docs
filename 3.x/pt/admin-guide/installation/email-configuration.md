# Configuração de e-mail

O Chamilo gere agora a configuração de envio de e-mails a partir do painel de administração, na secção de definições da plataforma (existe uma entrada específica para e-mails). Os e-mails são enviados para criação de contas, reposição de palavras-passe, notificações de cursos, alertas de mensagens e outros eventos da plataforma. A entrega de e-mail é configurada através da definição `MAILER_DSN`.

## Configuração

Defina a opção `Mail DSN` na secção /admin/settings/mail. O formato depende do transporte de e-mail utilizado.

### SMTP

A configuração mais comum, adequada a qualquer servidor SMTP:

```bash
# Let the system decide
native://default

# Basic SMTP
smtp://username:password@smtp.example.com:587

# SMTP with TLS (most providers)
smtp://username:password@smtp.example.com:587?encryption=tls

# SMTP without authentication (local relay)
smtp://localhost:25
```

Substitua `username`, `password` e o anfitrião pelas credenciais do seu servidor SMTP.

### Amazon SES

```bash
# Using SMTP interface
ses+smtp://ACCESS_KEY:SECRET_KEY@default?region=us-east-1

# Using API
ses+api://ACCESS_KEY:SECRET_KEY@default?region=us-east-1
```

O transporte Symfony Amazon Mailer vem incorporado no Chamilo. Não é necessária qualquer instalação adicional.

### Mailjet

```bash
mailjet+api://API_KEY:SECRET_KEY@default
```

O transporte Symfony Mailjet vem incorporado no Chamilo. Não é necessária qualquer instalação adicional.

### Brevo (anteriormente Sendinblue)

```bash
brevo+api://API_KEY@default
```

O transporte Symfony Brevo vem incorporado no Chamilo. Não é necessária qualquer instalação adicional.

### Microsoft 365 / Outlook (Microsoft Graph API)

A Microsoft está a descontinuar o SMTP com autenticação básica no Exchange Online, pelo que um DSN simples `smtp://user:password@smtp.office365.com:587` só funciona enquanto o administrador do inquilino mantiver o «Authenticated SMTP» explicitamente ativado nessa caixa de correio específica. Envie através da Microsoft Graph API — não utiliza SMTP de todo:

```bash
microsoftgraph+api://CLIENT_ID:CLIENT_SECRET@default?tenantId=TENANT_ID
```

O transporte Symfony Microsoft Graph vem incorporado no Chamilo. Não é necessária qualquer instalação adicional.

Para obter esses três valores, no [centro de administração do Microsoft Entra](https://entra.microsoft.com):

1. Registe uma aplicação. O respetivo **Application (client) ID** e **Directory (tenant) ID** são `CLIENT_ID` e `TENANT_ID`.
2. Em *API permissions*, adicione a permissão de **aplicação** do Microsoft Graph `Mail.Send` (não a delegada) e, em seguida, conceda o consentimento de administrador.
3. Em *Certificates & secrets*, crie um segredo de cliente. O respetivo **valor** (não o ID) é `CLIENT_SECRET`.

Notas:

* Codifique em URL qualquer carácter com significado especial num URL que apareça no segredo de cliente (`@` como `%40`, `+` como `%2B`, `/` como `%2F`, e assim por diante).
* O endereço configurado em **Send all e-mails from this e-mail address** deve ser uma caixa de correio real no seu inquilino; caso contrário, a Microsoft rejeita a mensagem.
* Adicione `&noSave=true` ao DSN se não quiser que uma cópia de cada e-mail da plataforma seja guardada na pasta *Sent Items* do remetente.
* Para clouds nacionais, aponte o DSN para os pontos de extremidade corretos, sem o prefixo `https://`: `microsoftgraph+api://CLIENT_ID:CLIENT_SECRET@microsoftgraph.chinacloudapi.cn?tenantId=TENANT_ID&authEndpoint=login.partner.microsoftonline.cn`.

**Aviso de segurança:** a permissão de *aplicação* `Mail.Send` permite que a aplicação registada envie e-mail como **qualquer** caixa de correio do inquilino, não apenas a que o Chamilo utiliza. Restrinja-a à caixa de correio do remetente com uma política de acesso de aplicação do Exchange Online:

```powershell
New-ApplicationAccessPolicy -AppId CLIENT_ID -PolicyScopeGroupId no-reply@yourdomain.com -AccessRight RestrictAccess -Description "Restrict Chamilo to its sender mailbox"
```

### Gmail (desenvolvimento/plataformas pequenas)

```bash
gmail+smtp://your-email@gmail.com:app-password@default
```

Utilize uma palavra-passe de aplicação, não a palavra-passe habitual do Gmail. Isto é adequado apenas para plataformas pequenas ou para desenvolvimento, uma vez que o Gmail tem limites de envio.

## Definições de e-mail da plataforma

Além do transporte, configure a identidade do remetente na mesma página:

| Definição | Descrição |
|---------|-------------|
| **Send all e-mails as originating from this (organizational) name** | O nome de apresentação associado aos e-mails do sistema. |
| **Send all e-mails from this e-mail address** | O endereço «From» de todos os e-mails do sistema. Deve ser um endereço válido aceite pelo seu transporte de correio. Recomendamos a utilização de um endereço «no reply» como `no-reply@yourdomain.com` para evitar respostas inúteis a e-mails automatizados. |

## Teste de Entrega de E-mail

Após configurar `MAILER_DSN`, teste se os e-mails são entregues: Vá a *Administração* > *Sistema* > *Testador de e-mail*, indique um destinatário, um assunto e um corpo de e-mail e clique em **Enviar e-mail de teste**.

Se o comando concluir sem erros mas o e-mail não for recebido:

1. Verifique a pasta de spam/lixo eletrónico do destinatário.
2. Confirme que o domínio de envio tem os registos DNS adequados (SPF, DKIM, DMARC).
3. Consulte os registos de envio do seu fornecedor de correio para rejeições ou devoluções (bounces).
4. Reveja o log do Chamilo em `var/log/prod.log` em busca de erros do mailer.
5. Nas definições de configuração de e-mail, ative *Mail: Debug* (não disponível na 3.0, estará em breve).

## Experimental: Fila de E-mail (Entrega Assíncrona)

Por predefinição, os e-mails são enviados de forma síncrona durante o pedido web. Para melhor desempenho, configure a entrega assíncrona com o Symfony Messenger:

```yaml
# config/packages/messenger.yaml
framework:
    messenger:
        transports:
            async: '%env(MESSENGER_TRANSPORT_DSN)%'
        routing:
            'Symfony\Component\Mailer\Messenger\SendEmailMessage': async
```

Com a entrega assíncrona, os e-mails são colocados em fila e enviados por um worker em segundo plano:

```bash
php bin/console messenger:consume async
```

Execute isto como um serviço de sistema (por exemplo, via systemd ou supervisord) para que permaneça em execução.

## Dicas

* **Utilize um serviço de e-mail dedicado** (SES, Mailjet, Brevo) em plataformas de produção. SMTP direto para o seu próprio servidor de correio exige uma configuração cuidadosa para evitar problemas de entregabilidade.
* **Configure os registos DNS SPF, DKIM e DMARC** para o domínio de envio, de modo a maximizar as taxas de entrega e evitar que os e-mails sejam marcados como spam. Também pode configurar cabeçalhos DKIM a partir da página de definições de e-mail.
* **Utilize a entrega assíncrona** em plataformas com mais do que algumas dezenas de utilizadores ativos — o envio síncrono de e-mail pode tornar os pedidos web visivelmente mais lentos.