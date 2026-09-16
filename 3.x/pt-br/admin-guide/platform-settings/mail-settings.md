# Configurações de e-mail

Como o e-mail de saída é montado — identidade do remetente, layout, assinatura e endereços de finalidade especial.

Acesse estas configurações em **Administração > Configurações > E-mail**. Esta categoria contém **17 configurações**, listadas abaixo com o título e o comentário fornecidos nos fixtures de configurações da plataforma (`SettingsCurrentFixtures.php`).

> O nome da variável no código é mostrado em monoespaçado. Use-o ao automatizar via API ou quando precisar alterar essas configurações em nível global editando [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Configurações

### `allow_email_editor_for_anonymous`

**Editor de e-mail para anônimos**

Permitir que usuários anônimos enviem e-mails a partir da plataforma. Nesta era de segurança da informação, esta não é uma opção recomendada.

*Padrão: `true`*


### `cron_notification_help_desk`

**Endereços de e-mail para envio de relatórios de execução de cronjobs**

Informado como um array de endereços de e-mail. Ainda não funciona para todos os cronjobs.

### `mail_content_style`

**Atributos HTML extras do corpo do e-mail**

Atributos HTML extras a aplicar à tag body dos e-mails de notificação gerados.

### `mail_header_style`

**Atributos HTML extras do cabeçalho do e-mail**

Atributos HTML extras a aplicar à seção de cabeçalho dos e-mails de notificação gerados.

### `mailer_debug_enable`

**E-mail: Depuração**

Selecione se deseja habilitar os logs de depuração do envio de e-mail. Eles fornecerão mais informações sobre o que ocorre ao conectar-se ao serviço de e-mail, mas não são elegantes e podem quebrar o design da página. Use somente quando não houver atividade de usuários.

*Padrão: `false`*


### `mailer_dkim`

**E-mail: Cabeçalhos DKIM**

Informe um array JSON das suas configurações DKIM (veja o exemplo).

### `mailer_dsn`

**DSN do Mailer**

O DSN inclui todos os parâmetros necessários para conectar-se ao serviço de e-mail. Você pode saber mais em https://symfony.com/doc/7.4/mailer.html#using-built-in-transports. Aqui estão alguns exemplos de sintaxes DSN suportadas: https://symfony.com/doc/7.4/mailer.html#using-a-3rd-party-transport. Para o Microsoft 365, em que o SMTP com autenticação básica está sendo descontinuado, envie pela Microsoft Graph API com `microsoftgraph+api://CLIENT_ID:CLIENT_SECRET@default?tenantId=TENANT_ID` (codifique em URL qualquer caractere especial no client secret). Isso exige um registro de aplicativo no Entra ID com a permissão de aplicativo `Mail.Send` — consulte [Configuração de e-mail](../installation/email-configuration.md).

*Padrão: `null://null`*


### `mailer_exclude_json`

**E-mail: Evitar o uso de LD+JSON**

Alguns clientes de e-mail não entendem o formato descritivo LD+JSON, exibindo-o como uma string JSON solta para o usuário final. Se este for o seu caso, você pode definir a variável abaixo como 'false' para desabilitar este cabeçalho.

*Padrão: `false`*


### `mailer_from_email`

**Enviar todos os e-mails a partir deste endereço de e-mail**

Define o endereço de e-mail padrão usado no campo "from" dos e-mails.

### `mailer_from_name`

**Enviar todos os e-mails como originários deste nome (organizacional)**

Define o nome de exibição padrão usado no envio de e-mails da plataforma. Por exemplo, "Equipe de suporte".

### `mailer_mails_charset`

**E-mail: conjunto de caracteres**

Caso você precise definir o charset a usar no envio desses e-mails. Deixe vazio se não tiver certeza.

*Padrão: `UTF-8`*


### `messages_hide_mail_content`

**Ocultar o conteúdo do e-mail para trazer os usuários à plataforma**

Preferir versões curtas de e-mail com um link para o espaço de mensagens na plataforma, a fim de aumentar o engajamento na própria plataforma.

*Padrão: `false`*


### `notifications_extended_footer_message`

**Rodapé estendido das notificações**

Adicionar um rodapé extra personalizado aos e-mails de notificação para um idioma específico, por exemplo para avisos de política de privacidade. É possível adicionar vários idiomas e parágrafos.

### `send_notification_score_in_percentage`

**Enviar pontuação em porcentagem na notificação de resultados de testes**

Envia as pontuações dos exercícios como porcentagens em vez de pontos nos e-mails de notificação de resultados de testes.

*Padrão: `false`*


### `send_two_inscription_confirmation_mail`

**Enviar 2 e-mails de inscrição**

Enviar dois e-mails separados no cadastro. Um para o nome de usuário e outro para a senha.

*Padrão: `false`*


### `show_user_email_in_notification`

**Mostrar o endereço de e-mail do remetente nas notificações**

Inclui o endereço de e-mail do remetente junto com o nome nas mensagens pessoais e nos e-mails de notificação.

*Padrão: `false`*


### `update_users_email_to_dummy_except_admins`

**Atualizar o e-mail dos usuários para um valor fictício durante importações**

Durante importações especiais de usuários via CSV por cron, substituir automaticamente os e-mails pelo e-mail fictício username@example.com.

*Padrão: `false`*