# Definições da Rede Social

Comportamento da **Rede Social** — amigos, grupos, publicações no mural, álbuns de fotografias.

Aceda a estas definições em **Administração > Definições de configuração > Rede Social**. Esta categoria contém **7 definições**, listadas abaixo com o título e o comentário fornecidos nas fixtures de definições da plataforma (`SettingsCurrentFixtures.php`).

> O nome da variável no código é apresentado em monoespaçado. Utilize-o ao automatizar via API ou quando precisar de alterar essas definições a nível global editando [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Definições

### `allow_social_tool`

**Ferramenta de rede social (estilo Facebook)**

A ferramenta de rede social permite que os utilizadores definam relações com outros utilizadores e, ao fazê-lo, definam grupos de amigos. Combinada com a ferramenta de mensagens internas, esta ferramenta permite uma comunicação estreita com os amigos, dentro do ambiente do portal.

*Predefinição: `true`*

### `allow_students_to_create_groups_in_social`

**Permitir que os formandos criem grupos na rede social**

Permitir que os formandos criem grupos na rede social

*Predefinição: `false`*


### `disable_dislike_option`

**Desativar «não gosto» nas publicações sociais**

Remove a opção de polegar para baixo no feedback das publicações sociais. Mantém apenas o polegar para cima (gosto).

*Predefinição: `false`*

### `hide_social_groups_block`

**Ocultar o bloco de grupos na rede social**

Remove a secção de grupos da vista da rede social.

*Predefinição: `false`*


### `social_enable_messages_feedback`

**Gosto/Não gosto nas publicações sociais**

Permite que os utilizadores adicionem feedback (gostos ou não gostos) às publicações no mural social.

*Predefinição: `false`*

### `social_make_teachers_friend_all`

**Formadores e administradores veem os estudantes como amigos na rede social**

Faz com que formadores e administradores apareçam automaticamente como amigos de todos os estudantes no módulo de rede social.

*Predefinição: `false`*


### `social_show_language_flag_in_profile`

**Mostrar a bandeira do idioma junto ao avatar na rede social**

Apresenta a preferência de idioma do utilizador como um ícone de bandeira junto ao respetivo avatar nos perfis da rede social.

*Predefinição: `false`*