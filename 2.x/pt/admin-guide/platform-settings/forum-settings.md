# Configurações dos Fóruns

Comportamento da ferramenta **Fóruns** do curso.

Acesse essas configurações em **Administração > Configurações de configuração > Fóruns**. Esta categoria contém **9 configurações**, listadas abaixo com o título e o comentário fornecidos nos arquivos de configurações da plataforma (`SettingsCurrentFixtures.php`).

> O nome da variável no código é mostrado em fonte monoespaçada. Use-o ao criar scripts via API ou quando precisar alterar essas configurações em um nível global editando [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Configurações

### `allow_forum_category_language_filter`

**Filtro de idioma para categorias de fórum**

Adiciona um filtro de idioma à visualização do fórum para exibir apenas categorias configuradas em um idioma específico. Requer o uso do campo extra 'language' na entidade 'forum_category'.

*Padrão: `false`*

### `allow_forum_post_revisions`

**Revisão de postagens no fórum**

Habilite esta opção para permitir que se solicite uma revisão ou tradução de uma postagem no fórum. Quando configurado de forma extensiva, pode ser usado para colaborar com outros usuários em um fórum de aprendizado de idiomas.

*Padrão: `false`*

### `community_managers_user_list`

**Lista de gerentes de comunidade**

Forneça um array de IDs de usuários que serão considerados gerentes de comunidade no curso especial designado como fórum global. Os gerentes de comunidade têm privilégios adicionais no fórum global.

### `default_forum_view`

**Visualização padrão do fórum**

Qual deve ser a opção padrão ao criar um novo fórum. No entanto, qualquer instrutor pode escolher uma visualização diferente para cada fórum individual.

*Padrão: `flat`*

### `display_groups_forum_in_general_tool`

**Exibir fóruns de grupo no fórum geral**

Exibe fóruns de grupo na ferramenta de fórum no nível do curso. Esta opção está habilitada por padrão (neste caso, as visibilidades individuais dos fóruns de grupo ainda atuam como um critério adicional). Se desabilitada, os fóruns de grupo só serão visíveis através da ferramenta de grupo, sejam eles públicos ou não.

*Padrão: `true`*

### `forum_fold_categories`

**Dobrar categorias de fórum**

Efeito visual para habilitar o dobramento/desdobramento de categorias de fórum.

*Padrão: `false`*

### `global_forums_course_id`

**Usar curso como fórum global**

Defina o ID do curso (numérico) de um curso reservado para ser usado como fórum global. Isso substitui o link 'Grupos sociais' na rede social por um link para o fórum desse curso.

*Padrão: `0`*

### `hide_forum_post_revision_language`

**Ocultar idioma de revisão de postagem no fórum**

Oculta a possibilidade de atribuir um idioma a uma revisão de postagem no fórum.

*Padrão: `false`*

### `subscribe_users_to_forum_notifications_also_in_base_course`

**Notificações de fórum também do curso base**

Habilite esta opção para permitir notificações provenientes do fórum do curso base, mesmo que o curso seja acompanhado por meio de uma sessão.

*Padrão: `false`*