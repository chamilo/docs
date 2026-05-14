# Configurações de Fluxos de Trabalho

Alternâncias de fluxos de trabalho transversais — criação de cursos, validação de matrículas, fluxos de trabalho de tarefas e similares.

Acesse essas configurações em **Administração > Configurações de configuração > Fluxos de Trabalho**. Esta categoria contém **23 configurações**, listadas abaixo com o título e o comentário fornecidos nos arquivos de configurações da plataforma (`SettingsCurrentFixtures.php`).

> O nome da variável no código é mostrado em fonte monoespaçada. Use-o ao criar scripts via API ou quando precisar alterar essas configurações em um nível global editando [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Configurações

### `allow_user_course_subscription_by_course_admin`

**Permitir Inscrição de Usuários no Curso pelo Administrador do Curso**

Ativar esta opção permitirá que o administrador do curso inscreva usuários dentro de um curso.

*Padrão: `true`*

### `allow_users_to_create_courses`

**Permitir que não administradores criem cursos**

Permitir que não administradores (professores) criem novos cursos no servidor.

*Padrão: `false`*

### `allow_working_time_edition`

**Habilitar edição do tempo de trabalho no curso**

Habilite esta funcionalidade para permitir que os professores atualizem manualmente o tempo gasto no curso pelos alunos.

*Padrão: `false`*

### `course_visibility_change_only_admin`

**Alterações de visibilidade do curso apenas para administradores**

Remove a possibilidade de não administradores alterarem a visibilidade do curso. A visibilidade pode ser um problema quando há muitos professores para controlar diretamente. Forçar visibilidades permite que a organização gerencie melhor os catálogos de cursos.

*Padrão: `false`*

### `default_menu_entry_for_course_or_session`

**Entrada de menu padrão para cursos**

Define os subelementos padrão da entrada 'Cursos' a serem exibidos se o usuário não estiver registrado em nenhum curso ou sessão.

*Padrão: `my_courses`*

### `disable_user_conditions_sender_id`

**ID interno do usuário usado para enviar notificações de conta desativada**

Evite ser muito pessoal com os usuários usando uma conta 'bot' para enviar e-mails aos usuários quando suas contas forem desativadas por algum motivo.

*Padrão: `0`*

### `disabled_edit_session_coaches_course_editing_course`

**Desativar a capacidade de editar treinadores do curso**

Quando desativado, os administradores não têm um link para atribuir rapidamente treinadores a cursos de sessão na página de edição do curso.

*Padrão: `false`*

### `drh_allow_access_to_all_students`

**Gestores de RH podem acessar todos os alunos nas páginas de relatórios**

[inferido] Conceder aos gerentes de RH/DRH acesso às páginas de relatórios para todos os alunos na plataforma.

*Padrão: `false`*

### `gamification_mode`

**Modo de gamificação**

Ativar a conquista de estrelas em caminhos de aprendizado.

### `go_to_course_after_login`

**Ir diretamente para o curso após o login**

Quando um usuário está registrado em um curso, ir diretamente para o curso após o login.

*Padrão: `false`*

### `load_term_conditions_section`

**Carregar seção de termos e condições**

O acordo legal aparecerá durante o login ou ao entrar em um curso.

*Padrão: `login`*

### `multiple_url_hide_disabled_settings`

**Ocultar configurações desativadas em sub-URLs**

Defina como sim para ocultar completamente as configurações em um sub-URL se a configuração estiver desativada na URL principal (onde o campo access_url_changeable = 0).

*Padrão: `false`*

### `plugin_redirection_enabled`

**Habilitar plugin de redirecionamento**

Habilite apenas se estiver usando o plugin de Redirecionamento.

*Padrão: `false`*

### `redirect_index_to_url_for_logged_users`

**Redirecionar index.php para uma URL específica para usuários autenticados**

Se você não quiser usar a página inicial (anúncios, cursos populares, etc.), pode definir aqui o script (a partir da raiz do documento) para onde os usuários serão redirecionados ao tentar carregar o índice.

### `send_all_emails_to`

**Enviar todos os e-mails para**

Forneça uma lista de endereços de e-mail para os quais *todos* os e-mails enviados pela plataforma serão enviados. Os e-mails são enviados para esses endereços como destino visível.

### `session_admin_user_subscription_search_extra_field_to_search`

**Campo extra de usuário usado para pesquisar e nomear sessões**

Esta configuração define a chave do campo extra de usuário (por exemplo, "empresa") que será usada para pesquisar usuários e definir o nome da sessão ao registrar alunos em /admin-dashboard/register.

### `teacher_can_select_course_template`

**Professor pode selecionar um curso como modelo**

Permitir escolher um curso como modelo para o novo curso que o professor está criando.

*Padrão: `true`*

### `update_student_expiration_x_date`

**Definir data de expiração no primeiro login**

Array definindo os 'dias' e 'meses' para definir a data de expiração da conta quando o usuário faz login pela primeira vez.

### `user_edition_extra_field_to_check`

**Definir um campo extra como gatilho para registro como ex-aluno**

Forneça um rótulo de campo extra aqui. Se este campo extra for atualizado para qualquer usuário, um processo é disparado para verificar o acesso desse usuário a cursos com o mesmo campo extra fornecido.

---
### `user_number_of_days_for_default_expiration_date_per_role`

**Dias padrão de expiração por função**

Um array de função => número que representa o número de dias que uma conta tem antes de expirar, dependendo da função.

### `usergroup_do_not_unsubscribe_users_from_course_nor_session_on_user_unsubscribe`

**Desativar a desinscrição de usuários de curso/sessão ao cancelar a inscrição de usuário de grupo/classe**

[inferido] Ao remover um usuário de um grupo/classe, não cancelar automaticamente a inscrição deles dos cursos ou sessões associados.

*Padrão: `false`*


### `usergroup_do_not_unsubscribe_users_from_course_on_course_unsubscribe`

**Desativar a desinscrição de usuários de curso ao remover curso de grupo/classe**

[inferido] Quando um curso é removido de um grupo/classe, não cancelar automaticamente a inscrição dos usuários desse curso.

*Padrão: `false`*


### `usergroup_do_not_unsubscribe_users_from_session_on_session_unsubscribe`

**Desativar a desinscrição de usuários de sessão ao remover sessão de grupo/classe**

[inferido] Quando uma sessão é removida de um grupo/classe, não cancelar automaticamente a inscrição dos usuários dessa sessão.

*Padrão: `false`*