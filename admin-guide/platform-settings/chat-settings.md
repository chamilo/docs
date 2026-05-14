# Configurações de Chat

Comportamento da ferramenta de **Chat** do curso.

Acesse essas configurações em **Administração > Configurações de configuração > Chat**. Esta categoria contém **5 configurações**, listadas abaixo com o título e comentário fornecidos nos arquivos de configurações da plataforma (`SettingsCurrentFixtures.php`).

> O nome da variável no código é mostrado em fonte monoespaçada. Use-o ao criar scripts via API ou quando precisar alterar essas configurações em nível global editando [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Configurações

### `allow_global_chat`

**Permitir chat global**

Os usuários podem conversar entre si

*Padrão: `false`*

### `course_chat_restrict_to_coach`

**Restringir chat do curso a tutores**

Permitir apenas que os alunos conversem com os tutores do curso (não com outros alunos).

*Padrão: `false`*

### `hide_chat_video`

**Ocultar opção de videochat no chat global**

Quando ativado, a funcionalidade de videochat é desativada e fica indisponível na ferramenta de chat global.

*Padrão: `true`*

### `save_private_conversations_in_documents`

**Salvar conversas privadas em documentos**

Se ativado, mensagens de chat privado 1:1 serão espelhadas nos documentos de histórico de chat do curso. Recomenda-se manter desativado por questões de privacidade.

*Padrão: `false`*

### `show_chat_folder`

**Mostrar a pasta de histórico de conversas de chat**

Isso mostrará ao professor a pasta que contém todas as sessões realizadas no chat; o professor pode torná-las visíveis ou não para os alunos e usá-las como recurso.

*Padrão: `true`*