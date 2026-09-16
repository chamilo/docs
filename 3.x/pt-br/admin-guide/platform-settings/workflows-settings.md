# Configurações de fluxos de trabalho

Opções transversais de fluxos de trabalho — criação de cursos, validação de matrícula, fluxos de trabalhos e similares.

Acesse estas configurações em **Administração > Configurações > Fluxos de trabalho**. Esta categoria contém **23 configurações**, listadas abaixo com o título e o comentário fornecidos nos fixtures de configurações da plataforma (`SettingsCurrentFixtures.php`).

> O nome da variável no código é mostrado em monoespaçado. Use-o ao automatizar via API ou quando precisar alterar essas configurações em nível global editando [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Configurações

### `allow_user_course_subscription_by_course_admin`

**Permitir inscrição de usuários no curso pelo administrador do curso**

Ativar esta opção permitirá que o administrador do curso inscreva usuários em um curso

*Padrão: `true`*


### `allow_users_to_create_courses`

**Permitir que não administradores criem cursos**

Permitir que não administradores (professores) criem novos cursos no servidor

*Padrão: `false`*


### `allow_working_time_edition`

**Habilitar edição do tempo de trabalho no curso**

Habilite este recurso para que os professores atualizem manualmente o tempo gasto no curso pelos aprendizes.

*Padrão: `false`*


### `course_visibility_change_only_admin`

**Alterações de visibilidade do curso apenas para administradores**

Remove a possibilidade de não administradores alterarem a visibilidade do curso. A visibilidade pode ser um problema quando há muitos professores para controlar diretamente. Forçar visibilidades permite que a organização gerencie melhor os catálogos de cursos.

*Padrão: `false`*


### `default_menu_entry_for_course_or_session`

**Entrada de menu padrão para cursos**

Define os subelementos padrão da entrada 'Cursos' a serem exibidos se o usuário não estiver inscrito em nenhum curso nem sessão.

*Padrão: `my_courses`*


### `disable_user_conditions_sender_id`

**ID interno do usuário usado para enviar notificações de conta desativada**

Evite ser excessivamente pessoal com os usuários usando uma conta 'bot' para enviar e-mails quando a conta for desativada por algum motivo.

*Padrão: `0`*


### `disabled_edit_session_coaches_course_editing_course`

**Desabilitar a capacidade de editar tutores do curso**

Quando desabilitado, os administradores não têm um link para atribuir rapidamente tutores aos cursos da sessão na página de edição do curso.

*Padrão: `false`*


### `drh_allow_access_to_all_students`

**O RH pode acessar todos os estudantes nas páginas de relatórios**

[inferido] Concede aos gestores de RH/DRH acesso às páginas de relatórios de todos os aprendizes da plataforma.

*Padrão: `false`*


### `gamification_mode`

**Modo de gamificação**

Ativa a conquista de estrelas nos percursos de aprendizagem

### `go_to_course_after_login`

**Ir diretamente para o curso após o login**

Quando um usuário está inscrito em um único curso, ir diretamente para o curso após o login

*Padrão: `false`*


### `load_term_conditions_section`

**Carregar seção de termos e condições**

O acordo legal aparecerá durante o login ou ao entrar em um curso.

*Padrão: `login`*


### `multiple_url_hide_disabled_settings`

**Ocultar configurações desabilitadas em sub-URLs**

Defina como sim para ocultar completamente as configurações em uma sub-URL se a configuração estiver desabilitada na URL principal (onde o campo access_url_changeable = 0)

*Padrão: `false`*


### `plugin_redirection_enabled`

**Habilitar plugin de redirecionamento**

Habilite somente se estiver usando o plugin Redirection

*Padrão: `false`*


### `redirect_index_to_url_for_logged_users`

**Redirecionar index.php para a URL informada para usuários autenticados**

Se você não quiser usar a página inicial (anúncios, cursos populares etc.), pode definir aqui o script (a partir da raiz de documentos) para o qual os usuários serão redirecionados ao tentar carregar o índice.

### `send_all_emails_to`

**Enviar todos os e-mails para**

Informe uma lista de endereços de e-mail para os quais *todos* os e-mails enviados pela plataforma serão enviados. Os e-mails são enviados a esses endereços como destino visível.

### `session_admin_user_subscription_search_extra_field_to_search`

**Campo extra de usuário usado para pesquisar e nomear sessões**

Esta configuração define a chave do campo extra de usuário (por exemplo, "company") que será usada para pesquisar usuários e para definir o nome da sessão ao registrar estudantes em /admin-dashboard/register.

### `teacher_can_select_course_template`

**O professor pode selecionar um curso como modelo**

Permite escolher um curso como modelo para o novo curso que o professor está criando

*Padrão: `true`*


### `update_student_expiration_x_date`

**Definir data de expiração no primeiro login**

Array que define os 'days' e 'months' para definir a data de expiração da conta quando o usuário faz o primeiro login.

### `user_edition_extra_field_to_check`

**Definir um campo extra como gatilho para registro como ex-aprendiz**

Informe aqui o rótulo de um campo extra. Se este campo extra for atualizado para qualquer usuário, um processo é acionado para verificar o acesso desse usuário a cursos com o mesmo campo extra informado.

### `user_number_of_days_for_default_expiration_date_per_role`

**Dias padrão de expiração por papel**

Um array de papel => número que representa o número de dias que uma conta tem antes da expiração, dependendo do papel.

### `usergroup_do_not_unsubscribe_users_from_course_nor_session_on_user_unsubscribe`

**Desativar o cancelamento da inscrição do usuário em curso/sessão ao cancelar a inscrição do usuário no grupo/turma**

[inferido] Ao remover um usuário de um grupo/turma, não cancelar automaticamente a inscrição dele nos cursos ou sessões associados.

*Padrão: `false`*


### `usergroup_do_not_unsubscribe_users_from_course_on_course_unsubscribe`

**Desativar o cancelamento da inscrição do usuário no curso ao remover o curso do grupo/turma**

[inferido] Quando um curso é removido de um grupo/turma, não cancelar automaticamente a inscrição dos usuários nesse curso.

*Padrão: `false`*


### `usergroup_do_not_unsubscribe_users_from_session_on_session_unsubscribe`

**Desativar o cancelamento da inscrição do usuário na sessão ao remover a sessão do grupo/turma**

[inferido] Quando uma sessão é removida de um grupo/turma, não cancelar automaticamente a inscrição dos usuários nessa sessão.

*Padrão: `false`*