# Configurações do Chat

Comportamento da ferramenta **Chat** do curso.

Aceda a estas definições em **Administração > Definições de configuração > Chat**. Esta categoria contém **5 definições**, listadas abaixo com o título e o comentário fornecidos nas fixtures de definições da plataforma (`SettingsCurrentFixtures.php`).

> O nome da variável no código é apresentado em monoespaçado. Utilize-o ao automatizar via API ou quando precisar de alterar essas definições a nível global editando [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Definições

### `allow_global_chat`

**Permitir chat global**

Os utilizadores podem conversar uns com os outros

*Predefinição: `false`*

### `course_chat_restrict_to_coach`

**Restringir o chat do curso aos tutores**

Permitir que os estudantes conversem apenas com os tutores do curso (e não com outros estudantes).

*Predefinição: `false`*

### `hide_chat_video`

**Ocultar a opção de videochat no chat global**

Quando ativada, a funcionalidade de videochat é desativada e fica indisponível na ferramenta de chat global.

*Predefinição: `true`*

### `save_private_conversations_in_documents`

**Guardar conversas privadas nos documentos**

Se estiver ativada, as mensagens de chat privado 1:1 serão espelhadas nos documentos do histórico de chat do curso. Recomenda-se mantê-la desativada por razões de privacidade.

*Predefinição: `false`*

### `show_chat_folder`

**Mostrar a pasta de histórico das conversas de chat**

Isto mostrará ao professor a pasta que contém todas as sessões realizadas no chat; o professor pode torná-las visíveis ou não para os formandos e utilizá-las como recurso

*Predefinição: `true`*