# Definições de mensagens

Comportamento do sistema de **Mensagens / Caixa de entrada**.

Aceda a estas definições em **Administração > Definições de configuração > Mensagens**. Esta categoria contém **7 definições**, listadas abaixo com o título e o comentário fornecidos nas fixtures de definições da plataforma (`SettingsCurrentFixtures.php`).

> O nome da variável no código é apresentado em monoespaçado. Utilize-o ao automatizar via API ou quando precisar de alterar essas definições a nível global editando [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Definições

### `allow_message_tool`

**Ferramenta de mensagens internas**

Ativar a ferramenta de mensagens internas permite que os utilizadores enviem mensagens a outros utilizadores da plataforma e disponham de uma caixa de entrada de mensagens.

*Predefinição: `true`*

### `allow_send_message_to_all_platform_users`

**Permitir o envio de mensagens a qualquer utilizador da plataforma**

Permite enviar mensagens a qualquer utilizador da plataforma, e não apenas aos seus amigos ou às pessoas atualmente em linha.

*Predefinição: `false`*

### `allow_user_message_tracking`

**Os administradores podem ver mensagens pessoais**

Permite que os administradores vejam mensagens pessoais entre um professor e um formando. Certifique-se de incluir uma nota nos seus termos e condições, pois isto pode afetar a proteção da privacidade.

*Predefinição: `false`*


### `filter_interactivity_messages`

**Os professores só podem aceder às mensagens dos formandos dentro do período da sessão**

Filtrar as mensagens entre um professor e um formando entre as datas de início e de fim da sessão

*Predefinição: `false`*


### `message_max_upload_filesize`

**Tamanho máximo de ficheiro para carregamento nas mensagens**

Tamanho máximo para carregamentos de ficheiros na ferramenta de mensagens (em bytes)

*Predefinição: `20971520`*

### `private_messages_about_user`

**Permitir mensagens privadas entre professores sobre um formando**

Permitir a troca de mensagens de professores/responsáveis sobre um utilizador a partir da página de acompanhamento desse utilizador.

*Predefinição: `false`*


### `private_messages_about_user_visible_to_user`

**Permitir que os formandos vejam as mensagens sobre si entre professores**

Se a troca de mensagens sobre um utilizador estiver ativada, esta opção permitirá que o utilizador correspondente veja as mensagens. Destina-se a cumprir regras de transparência às quais a organização possa ter de obedecer.

*Predefinição: `false`*