# Configurações de Fóruns

Comportamento da ferramenta **Fóruns** do curso.

Acesse essas configurações em **Administração > Parâmetros de configuração > Fóruns**. Esta categoria contém **9 configurações**, listadas abaixo com o título e o comentário fornecidos nos fixtures de configurações da plataforma (`SettingsCurrentFixtures.php`).

> O nome da variável no código é exibido em monoespaçado. Use-o ao criar scripts via API ou quando precisar alterar essas configurações em nível global editando [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Configurações

### `allow_forum_category_language_filter`

**Filtro de idioma das categorias de fórum**

Adicione um filtro de idioma à visualização do fórum para ver apenas as categorias configuradas em um idioma específico. Requer o uso do campo extra 'language' na entidade 'forum_category'.

*Padrão: `false`*

### `allow_forum_post_revisions`

**Revisão de mensagens do fórum**

Ative esta opção para permitir solicitar uma revisão ou uma tradução da própria mensagem em um fórum. Quando configurada de forma abrangente, pode ser usada para colaborar com outros usuários em um fórum de aprendizagem de idiomas.

*Padrão: `false`*

### `community_managers_user_list`

**Lista de gestores da comunidade**

Forneça um array de IDs de usuários que serão considerados gestores da comunidade no curso especial designado como fórum global. Os gestores da comunidade têm privilégios adicionais no fórum global.

### `default_forum_view`

**Visualização padrão do fórum**

Qual deve ser a opção padrão ao criar um novo fórum. Qualquer formador pode, no entanto, escolher uma visualização diferente para cada fórum individual

*Padrão: `flat`*

### `display_groups_forum_in_general_tool`

**Exibir fóruns de grupo no fórum geral**

Exibir os fóruns de grupo na ferramenta de fórum no nível do curso. Esta opção está ativada por padrão (neste caso, as visibilidades individuais dos fóruns de grupo ainda atuam como critério adicional). Se desativada, os fóruns de grupo só serão visíveis pela ferramenta de grupos, sejam eles públicos ou não.

*Padrão: `true`*

### `forum_fold_categories`

**Recolher categorias de fórum**

Efeito visual para permitir recolher/expandir as categorias de fórum.

*Padrão: `false`*

### `global_forums_course_id`

**Usar curso como fórum global**

Defina o ID do curso (numérico) de um curso reservado para uso como fórum global. Isso substitui o link 'Social groups' na rede social por um link para o fórum desse curso.

*Padrão: `0`*

### `hide_forum_post_revision_language`

**Ocultar idioma da revisão de mensagem do fórum**

Ocultar a possibilidade de atribuir um idioma a uma revisão de mensagem do fórum.

*Padrão: `false`*

### `subscribe_users_to_forum_notifications_also_in_base_course`

**Notificações de fórum também do curso base**

Ative esta opção para habilitar as notificações provenientes do fórum do curso base, mesmo ao acompanhar o curso por meio de uma sessão.

*Padrão: `false`*