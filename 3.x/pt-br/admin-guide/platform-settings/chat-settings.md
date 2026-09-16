# Configurações do Chat

Comportamento da ferramenta **Chat** do curso.

Acesse estas configurações em **Administração > Configurações > Chat**. Esta categoria contém **5 configurações**, listadas abaixo com o título e o comentário fornecidos nos fixtures de configurações da plataforma (`SettingsCurrentFixtures.php`).

> O nome da variável no código é mostrado em monoespaçado. Use-o ao automatizar via API ou quando precisar alterar essas configurações em nível global editando [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Configurações

### `allow_global_chat`

**Permitir chat global**

Os usuários podem conversar uns com os outros

*Padrão: `false`*

### `course_chat_restrict_to_coach`

**Restringir o chat do curso aos tutores**

Permitir que os alunos conversem apenas com os tutores do curso (não com outros alunos).

*Padrão: `false`*

### `hide_chat_video`

**Ocultar a opção de videochat no chat global**

Quando habilitada, a funcionalidade de chat por vídeo é desativada e fica indisponível na ferramenta de chat global.

*Padrão: `true`*

### `save_private_conversations_in_documents`

**Salvar conversas privadas nos documentos**

Se habilitada, as mensagens de chat privado 1:1 serão espelhadas nos documentos do histórico de chat do curso. Recomenda-se manter desabilitada por privacidade.

*Padrão: `false`*

### `show_chat_folder`

**Exibir a pasta de histórico das conversas do chat**

Isso exibirá ao professor a pasta que contém todas as sessões realizadas no chat; o professor pode torná-las visíveis ou não aos alunos e usá-las como recurso

*Padrão: `true`*