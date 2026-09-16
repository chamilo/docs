# Configurações de Grupos

Comportamento da ferramenta **Grupos** do curso.

Acesse estas configurações em **Administração > Configurações > Grupos**. Esta categoria contém **3 configurações**, listadas abaixo com o título e o comentário fornecidos nos fixtures de configurações da plataforma (`SettingsCurrentFixtures.php`).

> O nome da variável no código é exibido em monoespaçado. Use-o ao criar scripts via API ou quando precisar alterar essas configurações em nível global editando [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Configurações

### `allow_group_categories`

**Categorias de grupos**

Permitir que os professores criem categorias na ferramenta Grupos?

*Padrão: `false`*


### `hide_course_group_if_no_tools_available`

**Ocultar grupo do curso se não houver ferramenta**

Se nenhuma ferramenta estiver disponível em um grupo e o usuário não estiver inscrito no próprio grupo, ocultar o grupo completamente na lista de grupos.

*Padrão: `false`*


### `show_groups_to_users`

**Mostrar turmas aos usuários**

Mostrar as turmas aos usuários. Turmas são um recurso que permite inscrever/desinscrever grupos de usuários em uma sessão ou em um curso diretamente, reduzindo o trabalho administrativo. Ao escolher esta opção, os alunos poderão ver em qual turma estão por meio da interface da rede social.

*Padrão: `false`*