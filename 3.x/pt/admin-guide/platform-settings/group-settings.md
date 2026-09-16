# Definições de Grupos

Comportamento da ferramenta **Grupos** do curso.

Aceda a estas definições em **Administração > Definições de configuração > Grupos**. Esta categoria contém **3 definições**, listadas abaixo com o título e o comentário fornecidos nas fixtures de definições da plataforma (`SettingsCurrentFixtures.php`).

> O nome da variável no código é apresentado em monoespaçado. Utilize-o ao automatizar via API ou quando precisar de alterar essas definições a nível global editando [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Definições

### `allow_group_categories`

**Categorias de grupos**

Permitir que os professores criem categorias na ferramenta Grupos?

*Predefinição: `false`*


### `hide_course_group_if_no_tools_available`

**Ocultar grupo do curso se não houver ferramenta**

Se nenhuma ferramenta estiver disponível num grupo e o utilizador não estiver inscrito no próprio grupo, ocultar o grupo por completo na lista de grupos.

*Predefinição: `false`*


### `show_groups_to_users`

**Mostrar turmas aos utilizadores**

Mostrar as turmas aos utilizadores. As turmas são uma funcionalidade que permite inscrever/anular a inscrição de grupos de utilizadores numa sessão ou num curso de forma direta, reduzindo o trabalho administrativo. Ao escolher esta opção, os formandos poderão ver em que turma se encontram através da interface da rede social.

*Predefinição: `false`*