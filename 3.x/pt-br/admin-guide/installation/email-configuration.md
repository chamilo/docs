# Configuração de e-mail

O Chamilo agora gerencia a configuração de envio de e-mails a partir do painel de administração, na seção de configurações da plataforma (há uma entrada específica para e-mails). Os e-mails são enviados para criação de contas, redefinição de senhas, notificações de cursos, alertas de mensagens e outros eventos da plataforma. A entrega de e-mails é configurada por meio da configuração `MAILER_DSN`.

## Configuração

Defina a opção `Mail DSN` na seção /admin/settings/mail. O formato depende do seu transporte de e-mail.

### SMTP

A configuração mais comum, adequada para qualquer servidor SMTP:

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

Substitua `username`, `password` e o host pelas credenciais do seu servidor SMTP.

### Amazon SES

```bash
# Using SMTP interface
ses+smtp://ACCESS_KEY:SECRET_KEY@default?region=us-east-1

# Using API
ses+api://ACCESS_KEY:SECRET_KEY@default?region=us-east-1
```

O transporte Symfony Amazon Mailer vem incorporado ao Chamilo. Nenhuma instalação adicional é necessária.

### Mailjet

```bash
mailjet+api://API_KEY:SECRET_KEY@default
```

O transporte Symfony Mailjet vem incorporado ao Chamilo. Nenhuma instalação adicional é necessária.

### Brevo (anteriormente Sendinblue)

```bash
brevo+api://API_KEY@default
```

O transporte Symfony Brevo vem incorporado ao Chamilo. Nenhuma instalação adicional é necessária.

### Microsoft 365 / Outlook (Microsoft Graph API)

A Microsoft está descontinuando o SMTP com autenticação básica no Exchange Online, portanto um DSN simples `smtp://user:password@smtp.office365.com:587` só funciona enquanto o administrador do locatário mantiver o "Authenticated SMTP" explicitamente habilitado naquela caixa de correio específica. Envie pela Microsoft Graph API — ela não usa SMTP de forma alguma:

```bash
microsoftgraph+api://CLIENT_ID:CLIENT_SECRET@default?tenantId=TENANT_ID
```

O transporte Symfony Microsoft Graph vem incorporado ao Chamilo. Nenhuma instalação adicional é necessária.

Para obter esses três valores, no [centro de administração do Microsoft Entra](https://entra.microsoft.com):

1. Registre um aplicativo. O **Application (client) ID** e o **Directory (tenant) ID** são `CLIENT_ID` e `TENANT_ID`.
2. Em *API permissions*, adicione a permissão de **aplicativo** do Microsoft Graph `Mail.Send` (não a delegada) e, em seguida, conceda o consentimento do administrador.
3. Em *Certificates & secrets*, crie um segredo de cliente. O **valor** (não o ID) é `CLIENT_SECRET`.

Observações:

* Codifique em URL qualquer caractere com significado especial em uma URL que apareça no segredo do cliente (`@` como `%40`, `+` como `%2B`, `/` como `%2F`, e assim por diante).
* O endereço configurado em **Enviar todos os e-mails a partir deste endereço de e-mail** deve ser uma caixa de correio real dentro do seu locatário; caso contrário, a Microsoft rejeita a mensagem.
* Adicione `&noSave=true` ao DSN se você não quiser que uma cópia de cada e-mail da plataforma seja armazenada na pasta *Itens Enviados* do remetente.
* Para nuvens nacionais, aponte o DSN para os endpoints corretos, sem o prefixo `https://`: `microsoftgraph+api://CLIENT_ID:CLIENT_SECRET@microsoftgraph.chinacloudapi.cn?tenantId=TENANT_ID&authEndpoint=login.partner.microsoftonline.cn`.

**Aviso de segurança:** a permissão de *aplicativo* `Mail.Send` permite que o aplicativo registrado envie e-mail como **qualquer** caixa de correio do locatário, não apenas a que o Chamilo usa. Restrinja-a à caixa de correio do remetente com uma política de acesso de aplicativo do Exchange Online:

```powershell
New-ApplicationAccessPolicy -AppId CLIENT_ID -PolicyScopeGroupId no-reply@yourdomain.com -AccessRight RestrictAccess -Description "Restrict Chamilo to its sender mailbox"
```

### Gmail (desenvolvimento/plataformas pequenas)

```bash
gmail+smtp://your-email@gmail.com:app-password@default
```

Use uma senha de aplicativo, não a senha regular do Gmail. Isso é adequado apenas para plataformas pequenas ou desenvolvimento, pois o Gmail tem limites de envio.

## Configurações de e-mail da plataforma

Além do transporte, configure a identidade do remetente na mesma página:

| Configuração | Descrição |
|---------|-------------|
| **Enviar todos os e-mails como originários deste nome (organizacional)** | O nome de exibição associado aos e-mails do sistema. |
| **Enviar todos os e-mails a partir deste endereço de e-mail** | O endereço "De" de todos os e-mails do sistema. Deve ser um endereço válido aceito pelo seu transporte de e-mail. Recomendamos usar um endereço "no reply" como `no-reply@yourdomain.com` para evitar respostas inúteis a e-mails automatizados. |

## Testando a Entrega de E-mails

Após configurar `MAILER_DSN`, teste se os e-mails são entregues: Vá em *Administração* > *Sistema* > *Testador de e-mail*, informe um destinatário, um assunto e um corpo de e-mail e clique em **Enviar e-mail de teste**.

Se o comando for concluído sem erros, mas o e-mail não for recebido:

1. Verifique a pasta de spam/lixo eletrônico do destinatário.
2. Confirme se o domínio de envio possui registros DNS adequados (SPF, DKIM, DMARC).
3. Consulte os logs de envio do seu provedor de e-mail em busca de devoluções ou rejeições.
4. Revise o log do Chamilo em `var/log/prod.log` em busca de erros do mailer.
5. Nas configurações de E-mail, ative *Mail: Debug* (não disponível na 3.0, estará em breve).

## Experimental: Fila de E-mails (Entrega Assíncrona)

Por padrão, os e-mails são enviados de forma síncrona durante a requisição web. Para melhor desempenho, configure a entrega assíncrona usando o Symfony Messenger:

```yaml
# config/packages/messenger.yaml
framework:
    messenger:
        transports:
            async: '%env(MESSENGER_TRANSPORT_DSN)%'
        routing:
            'Symfony\Component\Mailer\Messenger\SendEmailMessage': async
```

Com a entrega assíncrona, os e-mails são enfileirados e enviados por um worker em segundo plano:

```bash
php bin/console messenger:consume async
```

Execute isso como um serviço do sistema (por exemplo, via systemd ou supervisord) para que permaneça em execução.

## Dicas

* **Use um serviço de e-mail dedicado** (SES, Mailjet, Brevo) em plataformas de produção. SMTP direto para o seu próprio servidor de e-mail exige configuração cuidadosa para evitar problemas de entregabilidade.
* **Configure os registros DNS SPF, DKIM e DMARC** do seu domínio de envio para maximizar as taxas de entrega e evitar que os e-mails sejam marcados como spam. Você também pode configurar cabeçalhos DKIM na página de configurações de e-mail.
* **Use entrega assíncrona** em plataformas com mais de algumas dezenas de usuários ativos — o envio síncrono de e-mail pode deixar as requisições web visivelmente mais lentas.