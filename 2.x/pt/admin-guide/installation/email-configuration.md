# Configuração de E-mail

O Chamilo agora gerencia a configuração de envio de e-mails a partir do painel de administração, na seção de configurações da plataforma (há uma entrada específica para e-mails). Os e-mails são enviados para criações de contas, redefinições de senha, notificações de cursos, alertas de mensagens e outros eventos da plataforma. A entrega de e-mails é configurada por meio de uma configuração chamada `MAILER_DSN`.

## Configuração

Defina a opção `Mail DSN` na seção /admin/settings/mail. O formato depende do seu transporte de e-mail.

### SMTP

A configuração mais comum, adequada para qualquer servidor SMTP:

```bash
# Deixe o sistema decidir
native://default

# SMTP básico
smtp://username:password@smtp.example.com:587

# SMTP com TLS (a maioria dos provedores)
smtp://username:password@smtp.example.com:587?encryption=tls

# SMTP sem autenticação (relay local)
smtp://localhost:25
```

Substitua `username`, `password` e o host pelas credenciais do seu servidor SMTP.

### Amazon SES

```bash
# Usando interface SMTP
ses+smtp://ACCESS_KEY:SECRET_KEY@default?region=us-east-1

# Usando API
ses+api://ACCESS_KEY:SECRET_KEY@default?region=us-east-1
```

O transporte Symfony Amazon Mailer vem integrado ao Chamilo. Não é necessária instalação adicional.

### Mailjet

```bash
mailjet+api://API_KEY:SECRET_KEY@default
```

O transporte Symfony Mailjet vem integrado ao Chamilo. Não é necessária instalação adicional.

### Brevo (anteriormente Sendinblue)

```bash
brevo+api://API_KEY@default
```

O transporte Symfony Brevo vem integrado ao Chamilo. Não é necessária instalação adicional.

### Gmail (Desenvolvimento/Pequenas Plataformas)

```bash
gmail+smtp://your-email@gmail.com:app-password@default
```

Use uma Senha de Aplicativo, não a sua senha regular do Gmail. Isso é adequado apenas para pequenas plataformas ou desenvolvimento, pois o Gmail possui limites de envio.

## Configurações de E-mail da Plataforma

Além do transporte, configure a identidade do remetente na mesma página:

| Configuração | Descrição |
|--------------|-----------|
| **Enviar todos os e-mails como originados deste nome (organizacional)** | O nome de exibição associado aos e-mails do sistema. |
| **Enviar todos os e-mails a partir deste endereço de e-mail** | O endereço "De" para todos os e-mails do sistema. Deve ser um endereço válido aceito pelo seu transporte de e-mail. Recomendamos usar um endereço "no reply" como `no-reply@seu-dominio.com` para evitar respostas desnecessárias a e-mails automáticos. |

## Testando a Entrega de E-mails

Após configurar o `MAILER_DSN`, teste se os e-mails estão sendo entregues: Vá para *Administração* > *Sistema* > *Testador de E-mail*, especifique um destinatário, um assunto e o corpo do e-mail e clique em **Enviar e-mail de teste**.

Se o comando for concluído sem erros, mas o e-mail não for recebido:

1. Verifique a pasta de spam/lixo do destinatário.
2. Confirme se o seu domínio de envio possui registros DNS adequados (SPF, DKIM, DMARC).
3. Verifique os logs de envio do seu provedor de e-mail para rejeições ou devoluções.
4. Revise o log do Chamilo em `var/log/prod.log` para erros do mailer.
5. Nas configurações de e-mail, habilite *Mail: Debug* (não disponível na versão 2.0, estará em breve).

## Experimental: Fila de E-mails (Entrega Assíncrona)

Por padrão, os e-mails são enviados de forma síncrona durante a solicitação web. Para melhor desempenho, configure a entrega assíncrona usando o Symfony Messenger:

```yaml
# config/packages/messenger.yaml
framework:
    messenger:
        transports:
            async: '%env(MESSENGER_TRANSPORT_DSN)%'
        routing:
            'Symfony\Component\Mailer\Messenger\SendEmailMessage': async
```

Com a entrega assíncrona, os e-mails são enfileirados e enviados por um trabalhador em segundo plano:

```bash
php bin/console messenger:consume async
```

Execute isso como um serviço do sistema (por exemplo, via systemd ou supervisord) para que continue funcionando.

## Dicas

* **Use um serviço de e-mail dedicado** (SES, Mailjet, Brevo) para plataformas de produção. O SMTP direto para o seu próprio servidor de e-mail exige configuração cuidadosa para evitar problemas de entregabilidade.
* **Configure registros DNS SPF, DKIM e DMARC** para o seu domínio de envio para maximizar as taxas de entrega e evitar que os e-mails sejam marcados como spam. Você também pode configurar cabeçalhos DKIM na página de configurações de e-mail.
* **Use entrega assíncrona** em plataformas com mais de algumas dezenas de usuários ativos — o envio síncrono de e-mails pode desacelerar visivelmente as solicitações web.