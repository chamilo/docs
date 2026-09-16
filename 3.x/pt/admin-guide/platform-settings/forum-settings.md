# Definições dos Fóruns

Comportamento da ferramenta **Fóruns** do curso.

Aceda a estas definições em **Administração > Definições de configuração > Fóruns**. Esta categoria contém **9 definições**, listadas abaixo com o título e o comentário fornecidos nas fixtures de definições da plataforma (`SettingsCurrentFixtures.php`).

> O nome da variável no código é apresentado em monoespaçado. Utilize-o ao automatizar via API ou quando precisar de alterar essas definições a nível global editando [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Definições

### `allow_forum_category_language_filter`

**Filtro de idioma das categorias de fórum**

Adiciona um filtro de idioma à vista do fórum para ver apenas categorias configuradas num idioma específico. Requer o uso do campo extra 'language' na entidade 'forum_category'.

*Predefinição: `false`*

### `allow_forum_post_revisions`

**Revisão de mensagens do fórum**

Ative esta opção para permitir pedir uma revisão ou uma tradução da própria mensagem num fórum. Quando configurada de forma alargada, pode ser usada para colaborar com outros utilizadores num fórum de aprendizagem de idiomas.

*Predefinição: `false`*

### `community_managers_user_list`

**Lista de gestores da comunidade**

Forneça um array de IDs de utilizadores que serão considerados gestores da comunidade no curso especial designado como fórum global. Os gestores da comunidade têm privilégios adicionais no fórum global.

### `default_forum_view`

**Vista predefinida do fórum**

Qual deve ser a opção predefinida ao criar um novo fórum. Qualquer formador pode, contudo, escolher uma vista diferente para cada fórum individual

*Predefinição: `flat`*

### `display_groups_forum_in_general_tool`

**Mostrar fóruns de grupo no fórum geral**

Mostra os fóruns de grupo na ferramenta de fórum ao nível do curso. Esta opção está ativada por predefinição (neste caso, as visibilidades individuais dos fóruns de grupo continuam a atuar como critério adicional). Se desativada, os fóruns de grupo só serão visíveis através da ferramenta de grupos, sejam públicos ou não.

*Predefinição: `true`*

### `forum_fold_categories`

**Recolher categorias de fórum**

Efeito visual para permitir recolher/expandir as categorias de fórum.

*Predefinição: `false`*

### `global_forums_course_id`

**Usar curso como fórum global**

Defina o ID do curso (numérico) de um curso reservado para uso como fórum global. Isto substitui a ligação 'Grupos sociais' na rede social por uma ligação para o fórum desse curso.

*Predefinição: `0`*

### `hide_forum_post_revision_language`

**Ocultar idioma da revisão da mensagem do fórum**

Oculta a possibilidade de atribuir um idioma a uma revisão de mensagem do fórum.

*Predefinição: `false`*

### `subscribe_users_to_forum_notifications_also_in_base_course`

**Notificações do fórum também a partir do curso base**

Ative esta opção para ativar notificações provenientes do fórum do curso base, mesmo quando se segue o curso através de uma sessão.

*Predefinição: `false`*