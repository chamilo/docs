# Configurações de Grupos

Comportamento da ferramenta de **Grupos** do curso.

Acesse essas configurações em **Administração > Configurações de configuração > Grupos**. Esta categoria contém **3 configurações**, listadas abaixo com o título e o comentário fornecidos nos arquivos de configurações padrão da plataforma (`SettingsCurrentFixtures.php`).

> O nome da variável no código é mostrado em fonte monoespaçada. Use-o ao criar scripts via API ou quando precisar alterar essas configurações em um nível global editando [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Configurações

### `allow_group_categories`

**Categorias de grupos**

Permitir que professores criem categorias na ferramenta de Grupos?

*Padrão: `false`*

### `hide_course_group_if_no_tools_available`

**Ocultar grupo de curso se não houver ferramenta**

Se nenhuma ferramenta estiver disponível em um grupo e o usuário não estiver registrado no próprio grupo, ocultar o grupo completamente na lista de grupos.

*Padrão: `false`*

### `show_groups_to_users`

**Mostrar turmas aos usuários**

Mostrar as turmas aos usuários. Turmas são um recurso que permite registrar/desregistrar grupos de usuários em uma sessão ou curso diretamente, reduzindo o trabalho administrativo. Ao selecionar esta opção, os alunos poderão ver em qual turma estão por meio da interface de rede social.

*Padrão: `false`*