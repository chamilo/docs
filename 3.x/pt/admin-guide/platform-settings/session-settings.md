# Configurações de sessões

Predefinições e comportamento das **Sessões** — ciclo de vida da sessão, janelas de acesso dos tutores, visibilidade dos cursos dentro de uma sessão e similares.

Aceda a estas configurações em **Administração > Configurações > Sessões**. Esta categoria contém **68 configurações**, listadas abaixo com o título e o comentário fornecidos nas fixtures de configurações da plataforma (`SettingsCurrentFixtures.php`).

> O nome da variável no código é apresentado em monoespaçado. Utilize-o ao automatizar via API ou quando precisar de alterar essas configurações a nível global editando [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Configurações

### `add_users_by_coach`

**Permitir que os tutores registem utilizadores**

Os tutores podem criar utilizadores na plataforma e inscrever utilizadores numa sessão.

*Predefinição: `false`*

### `allow_career_diagram`

**Ativar diagramas de carreira**

Os diagramas de carreira permitem apresentar diagramas de carreiras, competências e cursos.

*Predefinição: `false`*


### `allow_career_users`

**Ativar diagramas de carreira para utilizadores**

Se os diagramas de carreira estiverem ativados, os utilizadores só os poderão ver (e apenas os diagramas que correspondem aos seus estudos) se ativar esta opção.

*Predefinição: `false`*

### `allow_coach_to_edit_course_session`

**Permitir que os tutores editem dentro das sessões de curso**

Permitir que os tutores editem dentro das sessões de curso

*Predefinição: `true`*

### `allow_delete_user_for_session_admin`

**Os administradores de sessão podem eliminar utilizadores**

Os administradores de sessão podem remover utilizadores da plataforma ao gerir a(s) sua(s) sessão(ões).

*Predefinição: `false`*


### `allow_disable_user_for_session_admin`

**Os administradores de sessão podem desativar utilizadores**

Os administradores de sessão podem desativar contas de utilizador para impedir o início de sessão, mantendo os registos de inscrição na(s) sua(s) sessão(ões).

*Predefinição: `false`*


### `allow_edit_tool_visibility_in_session`

**Permitir a edição da visibilidade das ferramentas nas sessões**

Ao utilizar sessões, o comportamento predefinido é usar a visibilidade das ferramentas definida no curso base. Esta configuração altera isso para permitir que os tutores nos cursos de sessão adaptem as visibilidades das ferramentas às suas necessidades.

*Predefinição: `true`*

### `allow_redirect_to_session_after_inscription_about`

**Redirecionar para a sessão após o registo na página «Sobre» da sessão**

Redirecionar automaticamente os novos utilizadores para a página da respetiva sessão depois de concluírem o registo através da página Sobre de uma sessão.

*Predefinição: `false`*


### `allow_search_diagnostic`

**Ativar o diagnóstico de pesquisa de sessões**

Permitir que os tutores obtenham um diagnóstico que lhes permita procurar as melhores sessões para os formandos.

*Predefinição: `false`*


### `allow_session_admin_extra_access`

**O administrador de sessão pode aceder à importação, atualização e exportação em lote de utilizadores**

Os administradores de sessão podem aceder à funcionalidade de importação, atualização e exportação em lote de utilizadores, para além das suas permissões padrão.

*Predefinição: `false`*


### `allow_session_admin_login_as_teacher`

**Os administradores de sessão podem «iniciar sessão como» professores**

Os administradores de sessão podem personificar contas de professor para pré-visualizar o conteúdo do curso e a experiência do estudante dentro da(s) sua(s) sessão(ões).

*Predefinição: `false`*


### `allow_session_admin_read_careers`

**Os administradores de sessão podem ver carreiras**

[inferido] Os administradores de sessão podem ver e aceder a percursos de carreira e fluxos de promoção associados às sessões que gerem.

*Predefinição: `false`*


### `allow_session_admins_to_manage_all_sessions`

**Permitir que os administradores de sessão vejam todas as sessões**

Quando esta opção não está ativada (predefinição), os administradores de sessão só podem ver as sessões que criaram. Isto é confuso num ambiente aberto em que os administradores de sessão possam precisar de partilhar tempo de apoio entre duas sessões.

*Predefinição: `false`*

### `allow_session_course_copy_for_teachers`

**Permitir a cópia de sessão para sessão para professores**

Ative esta opção para permitir que os professores copiem o seu conteúdo de um curso numa sessão para um curso noutra sessão. Por predefinição, esta opção está disponível apenas para os administradores da plataforma.

*Predefinição: `false`*

### `allow_teachers_to_create_sessions`

**Permitir que os professores criem sessões**

Os professores podem criar, editar e eliminar as suas próprias sessões.

*Predefinição: `false`*

### `allow_tutors_to_assign_students_to_session`

**Os tutores podem atribuir estudantes a sessões**

Quando ativada, os tutores de curso nas sessões podem inscrever novos utilizadores na sua sessão. Caso contrário, esta opção está disponível apenas para administradores e administradores de sessão.

*Predefinição: `false`*

### `allow_user_session_collabsable`

**Permitir que o utilizador recolha sessões em As minhas sessões**

Os utilizadores podem recolher cartões ou grupos de sessões na página As minhas sessões para reduzir a desordem visual e melhorar a navegação.

*Predefinição: `false`*


### `assignment_base_course_teacher_access_to_all_session`

**O professor do curso base pode ver os trabalhos de todas as sessões**

Mostrar todas as publicações dos formandos (do curso base e de todas as sessões) na página work/pending.php do curso base.

*Predefinição: `false`*

### `career_diagram_disclaimer`

**Exibir um aviso abaixo do diagrama de carreira**

Adicione um aviso abaixo do diagrama de carreira. Deve existir uma variável de idioma chamada 'Career diagram disclaimer' no seu subidioma.

*Predefinição: `false`*

### `career_diagram_legend`

**Exibir uma legenda abaixo do diagrama de carreira**

Adicione uma legenda de carreira abaixo do diagrama de carreira. Deve existir uma variável de idioma chamada 'Career diagram legend' no seu subidioma.

*Predefinição: `false`*

### `courses_list_session_title_link`

**Tipo de ligação para o título da sessão**

Na página de cursos/sessões, o título da sessão pode ser um dos seguintes: 0 = sem ligação (ocultar o título da sessão) ; 1 = ligar o título a uma página especial da sessão ; 2 = ligar ao curso se existir apenas um curso ; 3 = o título da sessão torna a lista de cursos dobrável ; 4 = sem ligação (mostrar o título da sessão).

*Predefinição: `1`*

### `default_session_list_view`

**Vista predefinida da lista de sessões**

Selecione o separador predefinido que pretende ver ao abrir a lista de sessões como administrador.

*Predefinição: `all`*


### `drh_can_access_all_session_content`

**Diretores de RH acedem a todo o conteúdo da sessão**

Se ativado, os diretores de recursos humanos terão acesso a todo o conteúdo e a todos os utilizadores das sessões que acompanham.

*Predefinição: `true`*

### `duplicate_specific_session_content_on_session_copy`

**Ativar a cópia de conteúdo específico da sessão para outra sessão**

Permite a duplicação de recursos que foram criados na sessão ao duplicar a sessão.

*Predefinição: `false`*


### `email_template_subscription_to_session_confirmation_lost_password`

**Adicionar ligação de reposição de palavra-passe à notificação por e-mail de inscrição na sessão**

Inclui uma ligação de reposição de palavra-passe nos e-mails de confirmação de inscrição enviados aos utilizadores quando são inscritos numa sessão.

*Predefinição: `false`*


### `email_template_subscription_to_session_confirmation_username`

**Adicionar nome de utilizador à notificação por e-mail de inscrição na sessão**

Inclui o nome de utilizador nos e-mails de confirmação de inscrição enviados quando são inscritos numa sessão.

*Predefinição: `false`*


### `enable_auto_reinscription`

**Ativar reinscrição automática**

Ativa ou desativa a reinscrição automática quando a validade do curso expira. A tarefa cron relacionada também deve ser ativada.

*Predefinição: `false`*


### `enable_session_replication`

**Ativar replicação de sessões**

Ativa ou desativa a replicação automática de sessões. A tarefa cron relacionada também deve ser ativada.

*Predefinição: `false`*


### `extend_rights_for_coach`

**Alargar direitos dos tutores**

Ative esta opção para atribuir aos tutores as mesmas permissões que os formadores nas ferramentas de autoria

*Predefinição: `false`*

### `hide_courses_in_sessions`

**Ocultar a lista de cursos nas sessões**

Ao mostrar o bloco da sessão na sua página de cursos, oculta a lista de cursos dentro dessa sessão (mostra-os apenas no ecrã específico da sessão).

*Predefinição: `false`*

### `hide_reporting_session_list`

**Ocultar a lista de sessões na ferramenta de relatórios**

As sessões que incluem o curso são listadas na ferramenta de relatórios dentro do próprio curso, o que pode acrescentar um peso considerável se o mesmo curso for utilizado em centenas de sessões. Esta opção remove essa lista.

*Predefinição: `false`*


### `hide_search_form_in_session_list`

**Ocultar o formulário de pesquisa na lista de sessões**

Remove o campo de pesquisa da vista da lista de sessões na interface de administração.

*Predefinição: `false`*


### `hide_session_graph_in_my_progress`

**Ocultar o gráfico da sessão em O meu progresso**

Oculta os gráficos e visualizações de progresso da sessão na página O meu progresso nos painéis dos formandos.

*Predefinição: `false`*


### `hide_tab_list`

**Ocultar separadores na página da sessão**

Remove os separadores de navegação da página de detalhe da sessão para simplificar a interface.

### `limit_session_admin_list_users`

**Os administradores de sessão não têm acesso à lista de utilizadores**

Impede que os administradores de sessão acedam à lista global de utilizadores na interface de administração.

*Predefinição: `false`*


### `limit_session_admin_role`

**Limitar as permissões dos administradores de sessão**

Se ativado, os administradores de sessão verão apenas o bloco Utilizador com a opção 'Adicionar utilizador' e o bloco Sessões com a opção 'Lista de sessões'.

*Predefinição: `false`*

### `my_courses_session_order`

**Alterar a ordenação predefinida das sessões em As minhas sessões**

Por predefinição, as sessões são ordenadas por data de início. Altere isto fornecendo um array do tipo ['field' => 'end_date', 'order' => 'desc'].

### `my_courses_view_by_session`

**Ver os meus cursos por sessão**

Ativa uma página adicional 'Os meus cursos' em que as sessões aparecem como parte dos cursos, em vez do contrário.

*Predefinição: `false`*

### `my_progress_session_show_all_courses`

**O meu progresso: mostrar detalhes do curso na sessão**

Apresenta todos os detalhes de cada curso na sessão ao clicar nos detalhes da sessão.

*Predefinição: `false`*


### `prevent_session_admins_to_manage_all_users`

**Impedir que os administradores de sessão gerem todos os utilizadores**

Ao ativar esta opção, os administradores de sessão só poderão ver, na página de administração, os utilizadores que criaram.

*Predefinição: `false`*

### `remove_session_url`

**Ocultar ligação para a página da sessão**

Oculta a ligação para a página da sessão na lista de sessões.

*Predefinição: `false`*


### `session_admins_access_all_content`

**Administradores de sessão podem aceder a todo o conteúdo do curso**

Os administradores de sessão podem visualizar todo o conteúdo do curso nas suas sessões, incluindo materiais restritos ou arquivados.

*Predefinição: `false`*

### `session_admins_edit_courses_content`

**Administradores de sessão podem editar o conteúdo do curso**

Os administradores de sessão podem modificar o conteúdo do curso (documentos, exercícios, ferramentas) nos cursos atribuídos às suas sessões.

*Predefinição: `false`*

### `session_automatic_creation_user_id`

**ID do criador da sessão criada automaticamente**

Define o utilizador a usar como criador das sessões criadas automaticamente (para evitar atribuir todas as sessões ao utilizador '1', que é frequentemente o administrador do portal).

*Predefinição: `1`*


### `session_classes_tab_disable`

**Desativar adicionar turma no curso da sessão para não administradores**

Desativa o separador para adicionar turmas no curso da sessão para não administradores.

*Predefinição: `false`*


### `session_coach_access_after_duration_end`

**Sessões por duração sempre disponíveis para os tutores**

Caso contrário, os tutores da sessão só têm acesso às sessões por duração durante a duração ativa.

*Predefinição: `false`*


### `session_course_ordering`

**Ordenação manual dos cursos da sessão**

Ative esta opção para permitir que os administradores de sessão ordenem manualmente os cursos dentro de uma sessão. Se desativada, os cursos são ordenados alfabeticamente pelo título do curso.

*Predefinição: `false`*

### `session_course_users_subscription_limited_to_session_users`

**Limitar as inscrições no curso apenas aos utilizadores da sessão**

Restringe a lista de estudantes a inscrever na sessão do curso. E desativa o registo de utilizadores em todos os cursos a partir da página Resumo da sessão.

*Predefinição: `false`*


### `session_courses_read_only_mode`

**Definir curso como só de leitura na sessão**

Permite que os professores definam alguns cursos em modo só de leitura quando abertos através de sessões. Nas propriedades do curso, assinale a opção 'Bloquear curso na sessão'.

*Predefinição: `false`*


### `session_creation_form_set_extra_fields_mandatory`

**Definir campos extra obrigatórios no formulário de criação de sessão**

Exige os campos listados durante a criação da sessão.

### `session_creation_user_course_extra_field_relation_to_prefill`

**Pré-preencher campos da sessão com campos do utilizador**

Array de relações entre campos extra do utilizador e campos extra da sessão, para que a sessão possa ser pré-preenchida com dados correspondentes aos dados do utilizador.

### `session_days_after_coach_access`

**Dias predefinidos de acesso do tutor após a sessão**

Número predefinido de dias em que um tutor pode aceder a uma sessão após a data oficial de fim da sessão

### `session_days_before_coach_access`

**Dias predefinidos de acesso do tutor antes da sessão**

Número predefinido de dias em que um tutor pode aceder a uma sessão antes da data oficial de início da sessão

### `session_import_settings`

**Opções para importação de sessões**

Array de opções a aplicar como parâmetros predefinidos na importação de sessões CSV/XML.

### `session_list_order`

**Sessões suportam ordenação manual**

Ativa a reordenação manual das sessões na lista de sessões da administração através de arrastar e largar ou mecanismo semelhante.

*Predefinição: `false`*


### `session_list_show_count_users`

**Mostrar o número de utilizadores na lista de sessões**

O administrador pode ver o número de utilizadores em cada sessão. Isto adiciona carga extra à lista de sessões, por isso, se a utilizar com frequência, considere cuidadosamente se deseja o tempo de espera adicional.

*Predefinição: `false`*


### `session_list_view_remaining_days`

**Mostrar dias restantes em As minhas sessões**

Se ativada, as datas da sessão na página "As minhas sessões" serão substituídas pelo número de dias restantes.

*Predefinição: `false`*

### `session_model_list_field_ordered_by_id`

**Ordenar modelos de sessão por id no formulário de criação de sessão**

[inferido] Ordena os modelos de sessão pelo respetivo ID numérico na lista pendente do formulário de criação de sessão, em vez de alfabeticamente pelo nome.

*Predefinição: `false`*


### `session_multiple_subscription_students_list_avoid_emptying`

**Impedir o esvaziamento dos utilizadores inscritos na inscrição da sessão**

Ao utilizar a inscrição múltipla de formandos numa sessão, impede o comportamento normal que consiste em anular a inscrição dos utilizadores que não estão no painel correto ao clicar em submeter. Mantém todos os utilizadores aí.

*Predefinição: `false`*


### `show_all_sessions_on_my_course_page`

**Mostrar todas as sessões na página 'Os meus cursos'**

Se ativada, esta opção mostra todas as sessões do utilizador numa vista baseada em calendário.

*Predefinição: `true`*


### `show_session_coach`

**Mostrar o tutor da sessão**

Mostra o nome do tutor geral da sessão na caixa do título da sessão na lista de cursos

*Predefinição: `false`*

### `show_session_data`

**Mostrar título dos dados da sessão**

Mostrar comentário dos dados da sessão

*Predefinição: `false`*

### `show_session_description`

**Mostrar descrição da sessão**

Mostra a descrição da sessão onde esta opção estiver implementada (páginas de acompanhamento de sessões, etc.)

*Predefinição: `false`*

### `show_simple_session_info`

**Mostrar informação simples da sessão**

Adiciona o tutor e as datas ao subtítulo da sessão na lista de sessões.

*Predefinição: `true`*


### `show_users_in_active_sessions_in_tracking`

**Mostrar apenas utilizadores de sessões ativas no acompanhamento**

Mostra apenas utilizadores de sessões atualmente ativas nas vistas de acompanhamento e relatórios dos formandos.

*Predefinição: `false`*


### `tracking_columns`

**Personalizar colunas de acompanhamento curso-sessão**

Define um array de colunas para os seguintes relatórios: 'course_session', 'my_students_lp', 'my_progress_lp', 'my_progress_courses'.

### `user_s_session_duration`

**Duração das sessões criadas automaticamente**

Duração (em dias) das sessões de um único utilizador, criadas automaticamente. Após o termo, o utilizador não pode inscrever-se no mesmo curso (não é criada outra sessão).

*Predefinição: `1095`*


### `user_session_display_mode`

**Modo de apresentação de As minhas sessões**

Escolha como a página «As minhas sessões» é apresentada: como uma vista moderna de blocos visuais (cartões) ou o estilo clássico de lista.

*Predefinição: `list`*