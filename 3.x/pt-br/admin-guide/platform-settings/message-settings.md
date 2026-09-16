# Configurações de Mensagens

Comportamento do sistema de **Mensagens / Caixa de entrada**.

Acesse estas configurações em **Administração > Configurações > Mensagens**. Esta categoria contém **7 configurações**, listadas abaixo com o título e o comentário fornecidos nos fixtures de configurações da plataforma (`SettingsCurrentFixtures.php`).

> O nome da variável no código é mostrado em monoespaçado. Use-o ao automatizar via API ou quando precisar alterar essas configurações em nível global editando [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Configurações

### `allow_message_tool`

**Ferramenta de mensagens internas**

Ativar a ferramenta de mensagens internas permite que os usuários enviem mensagens a outros usuários da plataforma e tenham uma caixa de entrada de mensagens.

*Padrão: `true`*

### `allow_send_message_to_all_platform_users`

**Permitir o envio de mensagens a qualquer usuário da plataforma**

Permite enviar mensagens a qualquer usuário da plataforma, não apenas aos seus amigos ou às pessoas atualmente online.

*Padrão: `false`*

### `allow_user_message_tracking`

**Administradores podem ver mensagens pessoais**

Permite que os administradores vejam mensagens pessoais entre um professor e um aluno. Certifique-se de incluir uma nota nos seus termos e condições, pois isso pode afetar a proteção da privacidade.

*Padrão: `false`*


### `filter_interactivity_messages`

**Professores podem acessar as mensagens dos alunos apenas no período da sessão**

Filtra as mensagens entre um professor e um aluno entre as datas de início e término da sessão

*Padrão: `false`*


### `message_max_upload_filesize`

**Tamanho máximo de arquivo para envio em mensagens**

Tamanho máximo para envio de arquivos na ferramenta de mensagens (em Bytes)

*Padrão: `20971520`*

### `private_messages_about_user`

**Permitir mensagens privadas entre professores sobre um aluno**

Permite a troca de mensagens de professores/chefes sobre um usuário a partir da página de acompanhamento desse usuário.

*Padrão: `false`*


### `private_messages_about_user_visible_to_user`

**Permitir que os alunos vejam mensagens sobre eles entre professores**

Se a troca de mensagens sobre um usuário estiver habilitada, esta opção permitirá que o usuário correspondente veja as mensagens. Isso visa atender a regras de transparência com as quais a organização possa precisar cumprir.

*Padrão: `false`*