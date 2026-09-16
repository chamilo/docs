# Definições de correio

Como o correio de saída é construído — identidade do remetente, esquema, assinatura e endereços para fins especiais.

Aceda a estas definições em **Administração > Definições de configuração > Correio**. Esta categoria contém **17 definições**, listadas abaixo com o título e o comentário fornecidos nas fixtures de definições da plataforma (`SettingsCurrentFixtures.php`).

> O nome da variável no código é apresentado em monoespaçado. Utilize-o ao automatizar via API ou quando precisar de alterar essas definições a nível global editando [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Definições

### `allow_email_editor_for_anonymous`

**Editor de e-mail para anónimos**

Permitir que utilizadores anónimos enviem e-mails a partir da plataforma. Na era atual da segurança da informação, esta não é uma opção recomendada.

*Predefinição: `true`*


### `cron_notification_help_desk`

**Endereços de e-mail para enviar relatórios de execução de cronjobs**

Fornecidos como um array de endereços de e-mail. Ainda não funciona para todos os cronjobs.

### `mail_content_style`

**Atributos HTML extra do corpo do e-mail**

Atributos HTML extra a aplicar à etiqueta body dos e-mails de notificação gerados.

### `mail_header_style`

**Atributos HTML extra do cabeçalho do e-mail**

Atributos HTML extra a aplicar à secção de cabeçalho dos e-mails de notificação gerados.

### `mailer_debug_enable`

**Correio: Depuração**

Selecione se pretende ativar os registos de depuração do envio de e-mail. Estes fornecerão mais informação sobre o que acontece ao ligar ao serviço de correio, mas não são elegantes e podem quebrar o design da página. Utilize apenas quando não houver atividade de utilizadores.

*Predefinição: `false`*


### `mailer_dkim`

**Correio: Cabeçalhos DKIM**

Introduza um array JSON das suas definições de configuração DKIM (ver exemplo).

### `mailer_dsn`

**DSN do correio**

O DSN inclui na íntegra todos os parâmetros necessários para ligar ao serviço de correio. Pode saber mais em https://symfony.com/doc/7.4/mailer.html#using-built-in-transports. Seguem-se alguns exemplos de sintaxes DSN suportadas: https://symfony.com/doc/7.4/mailer.html#using-a-3rd-party-transport. Para o Microsoft 365, onde o SMTP com autenticação básica está a ser descontinuado, envie através da Microsoft Graph API com `microsoftgraph+api://CLIENT_ID:CLIENT_SECRET@default?tenantId=TENANT_ID` (codifique em URL qualquer carácter especial no segredo do cliente). Isto requer um registo de aplicação Entra ID com a permissão de aplicação `Mail.Send` — consulte [Configuração de e-mail](../installation/email-configuration.md).

*Predefinição: `null://null`*


### `mailer_exclude_json`

**Correio: Evitar o uso de LD+JSON**

Alguns clientes de e-mail não compreendem o formato descritivo LD+JSON, apresentando-o como uma cadeia JSON solta ao utilizador final. Se for o seu caso, poderá pretender definir a variável abaixo como 'false' para desativar este cabeçalho.

*Predefinição: `false`*


### `mailer_from_email`

**Enviar todos os e-mails a partir deste endereço de e-mail**

Define o endereço de e-mail predefinido utilizado no campo "from" dos e-mails.

### `mailer_from_name`

**Enviar todos os e-mails como originários deste nome (organizacional)**

Define o nome de apresentação predefinido utilizado para o envio de e-mails da plataforma. p. ex. "Equipa de suporte".

### `mailer_mails_charset`

**Correio: conjunto de caracteres**

Caso precise de definir o charset a utilizar no envio desses e-mails. Deixe vazio se não tiver a certeza.

*Predefinição: `UTF-8`*


### `messages_hide_mail_content`

**Ocultar o conteúdo do e-mail para trazer os utilizadores à plataforma**

Preferir versões curtas de e-mail com uma hiperligação para o espaço de mensagens na plataforma, de modo a aumentar o envolvimento baseado na plataforma.

*Predefinição: `false`*


### `notifications_extended_footer_message`

**Rodapé alargado das notificações**

Adicionar um rodapé extra personalizado para e-mails de notificação numa língua específica, por exemplo para avisos de política de privacidade. Podem ser adicionadas várias línguas e parágrafos.

### `send_notification_score_in_percentage`

**Enviar a pontuação em percentagem na notificação de resultados de testes**

Envia as pontuações dos exercícios como percentagens em vez de pontos nos e-mails de notificação de resultados de testes.

*Predefinição: `false`*


### `send_two_inscription_confirmation_mail`

**Enviar 2 e-mails de registo**

Enviar dois e-mails separados no registo. Um para o nome de utilizador, outro para a palavra-passe.

*Predefinição: `false`*


### `show_user_email_in_notification`

**Mostrar o endereço de e-mail do remetente nas notificações**

Inclui o endereço de e-mail do remetente juntamente com o nome nas mensagens pessoais e nos e-mails de notificação.

*Predefinição: `false`*


### `update_users_email_to_dummy_except_admins`

**Atualizar o e-mail dos utilizadores para um valor fictício durante as importações**

Durante importações CSV especiais de utilizadores via cron, substituir automaticamente os e-mails pelo e-mail fictício username@example.com.

*Predefinição: `false`*