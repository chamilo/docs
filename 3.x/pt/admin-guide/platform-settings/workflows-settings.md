# Definições de fluxos de trabalho

Interruptores transversais de fluxos de trabalho — criação de cursos, validação de inscrições, fluxos de trabalhos e semelhantes.

Aceda a estas definições em **Administração > Definições de configuração > Fluxos de trabalho**. Esta categoria contém **23 definições**, listadas abaixo com o título e o comentário fornecidos nas fixtures de definições da plataforma (`SettingsCurrentFixtures.php`).

> O nome da variável no código é apresentado em monoespaçado. Utilize-o ao automatizar via API ou quando precisar de alterar essas definições a nível global editando [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Definições

### `allow_user_course_subscription_by_course_admin`

**Permitir inscrição de utilizadores no curso pelo administrador do curso**

Ativar esta opção permitirá que o administrador do curso inscreva utilizadores num curso

*Predefinição: `true`*


### `allow_users_to_create_courses`

**Permitir que não administradores criem cursos**

Permitir que não administradores (professores) criem novos cursos no servidor

*Predefinição: `false`*


### `allow_working_time_edition`

**Ativar edição do tempo de trabalho no curso**

Ative esta funcionalidade para permitir que os professores atualizem manualmente o tempo gasto no curso pelos formandos.

*Predefinição: `false`*


### `course_visibility_change_only_admin`

**Alterações de visibilidade do curso apenas para administradores**

Remove a possibilidade de não administradores alterarem a visibilidade do curso. A visibilidade pode ser um problema quando há demasiados professores para controlar diretamente. Forçar visibilidades permite à organização gerir melhor os catálogos de cursos.

*Predefinição: `false`*


### `default_menu_entry_for_course_or_session`

**Entrada de menu predefinida para cursos**

Define os subelementos predefinidos da entrada «Cursos» a apresentar se o utilizador não estiver inscrito em nenhum curso nem sessão.

*Predefinição: `my_courses`*


### `disable_user_conditions_sender_id`

**ID interno do utilizador usado para enviar notificações de conta desativada**

Evite ser demasiado pessoal com os utilizadores utilizando uma conta «bot» para enviar e-mails aos utilizadores quando a respetiva conta é desativada por algum motivo.

*Predefinição: `0`*


### `disabled_edit_session_coaches_course_editing_course`

**Desativar a capacidade de editar tutores do curso**

Quando desativado, os administradores não têm uma ligação para atribuir rapidamente tutores aos cursos da sessão na página de edição do curso.

*Predefinição: `false`*


### `drh_allow_access_to_all_students`

**O GRH pode aceder a todos os estudantes a partir das páginas de relatórios**

[inferido] Conceder aos gestores de RH/DRH acesso às páginas de relatórios de todos os formandos em toda a plataforma.

*Predefinição: `false`*


### `gamification_mode`

**Modo de gamificação**

Ativar a conquista de estrelas nos percursos de aprendizagem

### `go_to_course_after_login`

**Ir diretamente para o curso após o início de sessão**

Quando um utilizador está inscrito num único curso, ir diretamente para o curso após o início de sessão

*Predefinição: `false`*


### `load_term_conditions_section`

**Carregar secção de termos e condições**

O acordo legal aparecerá durante o início de sessão ou ao entrar num curso.

*Predefinição: `login`*


### `multiple_url_hide_disabled_settings`

**Ocultar definições desativadas em sub-URLs**

Defina como sim para ocultar completamente as definições numa sub-URL se a definição estiver desativada no URL principal (onde o campo access_url_changeable = 0)

*Predefinição: `false`*


### `plugin_redirection_enabled`

**Ativar o plugin de redirecionamento**

Ative apenas se estiver a utilizar o plugin Redirection

*Predefinição: `false`*


### `redirect_index_to_url_for_logged_users`

**Redirecionar index.php para um URL indicado para utilizadores autenticados**

Se não pretender utilizar a página inicial (anúncios, cursos populares, etc.), pode definir aqui o script (a partir da raiz do documento) para o qual os utilizadores serão redirecionados ao tentarem carregar o índice.

### `send_all_emails_to`

**Enviar todos os e-mails para**

Indique uma lista de endereços de e-mail para os quais *todos* os e-mails enviados a partir da plataforma serão enviados. Os e-mails são enviados para estes endereços como destino visível.

### `session_admin_user_subscription_search_extra_field_to_search`

**Campo extra de utilizador usado para pesquisar e nomear sessões**

Esta definição define a chave do campo extra de utilizador (p. ex., "company") que será usada para pesquisar utilizadores e para definir o nome da sessão ao inscrever estudantes a partir de /admin-dashboard/register.

### `teacher_can_select_course_template`

**O professor pode selecionar um curso como modelo**

Permitir escolher um curso como modelo para o novo curso que o professor está a criar

*Predefinição: `true`*


### `update_student_expiration_x_date`

**Definir data de expiração no primeiro início de sessão**

Array que define os «dias» e «meses» para definir a data de expiração da conta quando o utilizador inicia sessão pela primeira vez.

### `user_edition_extra_field_to_check`

**Definir um campo extra como gatilho para o registo como ex-formando**

Indique aqui o rótulo de um campo extra. Se este campo extra for atualizado para qualquer utilizador, é desencadeado um processo para verificar o acesso deste utilizador a cursos com o mesmo campo extra indicado.

### `user_number_of_days_for_default_expiration_date_per_role`

**Dias de expiração predefinidos por papel**

Um array de papel => número que representa o número de dias que uma conta tem antes da expiração, consoante o papel.

### `usergroup_do_not_unsubscribe_users_from_course_nor_session_on_user_unsubscribe`

**Desativar a anulação da inscrição do utilizador no curso/sessão na anulação da inscrição do utilizador no grupo/turma**

[inferido] Ao remover um utilizador de um grupo/turma, não anular automaticamente a inscrição desse utilizador nos cursos ou sessões associados.

*Predefinição: `false`*


### `usergroup_do_not_unsubscribe_users_from_course_on_course_unsubscribe`

**Desativar a anulação da inscrição do utilizador no curso na remoção do curso do grupo/turma**

[inferido] Quando um curso é removido de um grupo/turma, não anular automaticamente a inscrição dos utilizadores nesse curso.

*Predefinição: `false`*


### `usergroup_do_not_unsubscribe_users_from_session_on_session_unsubscribe`

**Desativar a anulação da inscrição do utilizador na sessão na remoção da sessão do grupo/turma**

[inferido] Quando uma sessão é removida de um grupo/turma, não anular automaticamente a inscrição dos utilizadores nessa sessão.

*Predefinição: `false`*