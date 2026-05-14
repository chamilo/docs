# Configurações de Mensagens

Comportamento do sistema de **Mensagens / Caixa de Entrada**.

Acesse essas configurações em **Administração > Configurações de configuração > Mensagens**. Esta categoria contém **7 configurações**, listadas abaixo com o título e o comentário fornecidos nos arquivos de configurações padrão da plataforma (`SettingsCurrentFixtures.php`).

> O nome da variável no código é mostrado em fonte monoespaçada. Use-o ao criar scripts via API ou quando precisar alterar essas configurações em um nível global editando [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Configurações

### `allow_message_tool`

**Ferramenta de mensagens internas**

Habilitar a ferramenta de mensagens internas permite que os usuários enviem mensagens para outros usuários da plataforma e tenham uma caixa de entrada de mensagens.

*Padrão: `true`*

### `allow_send_message_to_all_platform_users`

**Permitir envio de mensagens para qualquer usuário da plataforma**

Permite enviar mensagens para qualquer usuário da plataforma, não apenas para amigos ou pessoas atualmente online.

*Padrão: `false`*

### `allow_user_message_tracking`

**Administradores podem ver mensagens pessoais**

Permite que administradores vejam mensagens pessoais entre um professor e um aluno. Certifique-se de incluir uma nota nos seus termos e condições, pois isso pode afetar a proteção de privacidade.

*Padrão: `false`*

### `filter_interactivity_messages`

**Professores podem acessar mensagens de alunos apenas dentro do período da sessão**

Filtra mensagens entre um professor e um aluno entre as datas de início e término da sessão.

*Padrão: `false`*

### `message_max_upload_filesize`

**Tamanho máximo de upload de arquivos em mensagens**

Tamanho máximo para upload de arquivos na ferramenta de mensagens (em Bytes).

*Padrão: `20971520`*

### `private_messages_about_user`

**Permitir mensagens privadas entre professores sobre um aluno**

Permite a troca de mensagens entre professores/chefes sobre um usuário a partir da página de rastreamento desse usuário.

*Padrão: `false`*

### `private_messages_about_user_visible_to_user`

**Permitir que alunos vejam mensagens sobre eles entre professores**

Se a troca de mensagens sobre um usuário estiver habilitada, esta opção permitirá que o usuário correspondente veja as mensagens. Isso é para cumprir regras de transparência que a organização pode precisar seguir.

*Padrão: `false`*