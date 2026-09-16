# Configurações de E-mail

Como os e-mails enviados são construídos — identidade do remetente, layout, assinatura e endereços de propósito especial.

Acesse essas configurações em **Administração > Configurações de configuração > E-mail**. Esta categoria contém **18 configurações**, listadas abaixo com o título e o comentário fornecidos nos arquivos de configurações padrão da plataforma (`SettingsCurrentFixtures.php`).

> O nome da variável no código é mostrado em fonte monoespaçada. Use-o ao criar scripts via API ou quando precisar alterar essas configurações em um nível global editando [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Configurações

### `allow_email_editor_for_anonymous`

**Editor de e-mail para anônimos**

Permite que usuários anônimos enviem e-mails a partir da plataforma. Na era atual de segurança da informação, esta não é uma opção recomendada.

*Padrão: `true`*

### `cron_notification_help_desk`

**Endereços de e-mail para enviar relatórios de execução de cronjobs**

Fornecido como um array de endereços de e-mail. Ainda não funciona para todos os cronjobs.

### `mail_content_style`

**Atributos extras do corpo HTML do e-mail**

Atributos HTML adicionais a serem aplicados à tag body dos e-mails de notificação gerados.

### `mail_header_style`

**Atributos extras do cabeçalho HTML do e-mail**

Atributos HTML adicionais a serem aplicados à seção de cabeçalho dos e-mails de notificação gerados.

### `mailer_debug_enable`

**E-mail: Depuração**

Selecione se deseja ativar os logs de depuração de envio de e-mail. Eles fornecerão mais informações sobre o que está acontecendo ao conectar-se ao serviço de e-mail, mas não são elegantes e podem quebrar o design da página. Use apenas quando não houver atividade de usuário.

*Padrão: `false`*

### `mailer_dkim`

**E-mail: Cabeçalhos DKIM**

Insira um array JSON com suas configurações de DKIM (veja o exemplo).

### `mailer_dsn`

**DSN de E-mail**

O DSN inclui completamente todos os parâmetros necessários para conectar ao serviço de e-mail. Você pode aprender mais em https://symfony.com/doc/6.4/mailer.html#using-built-in-transports. Aqui estão alguns exemplos de sintaxes DSN suportadas: https://symfony.com/doc/6.4/mailer.html#using-a-3rd-party-transport

*Padrão: `null://null`*

### `mailer_exclude_json`

**E-mail: Evitar usar LD+JSON**

Alguns clientes de e-mail não entendem o formato descritivo LD+JSON, exibindo-o como uma string JSON solta para o usuário final. Se for o seu caso, você pode definir a variável abaixo como 'false' para desativar esse cabeçalho.

*Padrão: `false`*

### `mailer_from_email`

**Enviar todos os e-mails a partir deste endereço de e-mail**

Define o endereço de e-mail padrão usado no campo "de" dos e-mails.

### `mailer_from_name`

**Enviar todos os e-mails como originados deste nome (organizacional)**

Define o nome de exibição padrão usado para enviar e-mails da plataforma, por exemplo, "Equipe de Suporte".

### `mailer_mails_charset`

**E-mail: Conjunto de caracteres**

Caso precise definir o conjunto de caracteres a ser usado ao enviar esses e-mails. Deixe vazio se não tiver certeza.

*Padrão: `UTF-8`*

### `mailer_xoauth2`

**E-mail: Opções XOAuth2**

Se você usa algum serviço de e-mail baseado em XOAuth2, use esta configuração em JSON para salvar sua configuração específica (veja o exemplo) e selecione XOAuth2 na configuração do serviço de e-mail.

### `messages_hide_mail_content`

**Ocultar conteúdo do e-mail para atrair usuários à plataforma**

Prefira versões curtas de e-mail com um link para o espaço de mensagens na plataforma para aumentar o engajamento baseado na plataforma.

*Padrão: `false`*

### `notifications_extended_footer_message`

**Rodapé estendido de notificações**

Adicione um rodapé extra personalizado para e-mails de notificações em um idioma específico, por exemplo, para avisos de política de privacidade. Vários idiomas e parágrafos podem ser adicionados.

### `send_notification_score_in_percentage`

**Enviar pontuação em porcentagem na notificação de resultados de teste**

Envia pontuações de exercícios como porcentagens em vez de pontos em e-mails de notificação de resultados de teste.

*Padrão: `false`*

### `send_two_inscription_confirmation_mail`

**Enviar 2 e-mails de registro**

Envia dois e-mails separados no registro. Um para o nome de usuário, outro para a senha.

*Padrão: `false`*

### `show_user_email_in_notification`

**Mostrar endereço de e-mail do remetente nas notificações**

Inclui o endereço de e-mail do remetente junto com seu nome em mensagens pessoais e e-mails de notificação.

*Padrão: `false`*

### `update_users_email_to_dummy_except_admins`

**Atualizar e-mail dos usuários para valor fictício durante importações**

Durante importações especiais de usuários via CSV por cron, substitui automaticamente os e-mails por um e-mail fictício username@example.com.

*Padrão: `false`*