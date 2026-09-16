# Configurações da Rede Social

Comportamento da **Rede Social** — amigos, grupos, publicações no mural, álbuns de fotos.

Acesse essas configurações em **Administração > Configurações > Rede Social**. Esta categoria contém **7 configurações**, listadas abaixo com o título e o comentário fornecidos nos fixtures de configurações da plataforma (`SettingsCurrentFixtures.php`).

> O nome da variável no código é mostrado em monoespaçado. Use-o ao criar scripts via API ou quando precisar alterar essas configurações em nível global editando [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Configurações

### `allow_social_tool`

**Ferramenta de rede social (semelhante ao Facebook)**

A ferramenta de rede social permite que os usuários definam relações com outros usuários e, ao fazê-lo, definam grupos de amigos. Combinada com a ferramenta de mensagens internas, essa ferramenta permite uma comunicação estreita com os amigos, dentro do ambiente do portal.

*Padrão: `true`*

### `allow_students_to_create_groups_in_social`

**Permitir que os alunos criem grupos na rede social**

Permitir que os alunos criem grupos na rede social

*Padrão: `false`*


### `disable_dislike_option`

**Desativar 'não gostei' para publicações sociais**

Remove a opção de polegar para baixo no feedback das publicações sociais. Mantém apenas o polegar para cima (curtir).

*Padrão: `false`*

### `hide_social_groups_block`

**Ocultar bloco de grupos na rede social**

Remove a seção de grupos da visualização da rede social.

*Padrão: `false`*


### `social_enable_messages_feedback`

**Curtir/Não curtir para publicações sociais**

Permite que os usuários adicionem feedback (curtidas ou não curtidas) às publicações no mural social.

*Padrão: `false`*

### `social_make_teachers_friend_all`

**Professores e administradores veem os alunos como amigos na rede social**

Faz com que instrutores e administradores apareçam automaticamente como amigos de todos os alunos no módulo de rede social.

*Padrão: `false`*


### `social_show_language_flag_in_profile`

**Exibir bandeira do idioma ao lado do avatar na rede social**

Exibe a preferência de idioma do usuário como um ícone de bandeira ao lado do avatar nos perfis da rede social.

*Padrão: `false`*