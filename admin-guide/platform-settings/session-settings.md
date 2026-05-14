# Configurações de Sessões

Padrões e comportamentos para **Sessões** — ciclo de vida da sessão, janelas de acesso para treinadores, visibilidade de cursos dentro de uma sessão e similares.

Acesse essas configurações em **Administração > Configurações de configuração > Sessões**. Esta categoria contém **68 configurações**, listadas abaixo com o título e o comentário fornecidos nos arquivos de configurações da plataforma (`SettingsCurrentFixtures.php`).

> O nome da variável no código é mostrado em fonte monoespaçada. Use-o ao criar scripts via API ou quando precisar alterar essas configurações em um nível global editando [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Configurações

### `add_users_by_coach`

**Registrar usuários por Treinador**

Usuários treinadores podem criar usuários na plataforma e inscrever usuários em uma sessão.

*Padrão: `false`*

### `allow_career_diagram`

**Habilitar diagramas de carreira**

Diagramas de carreira permitem exibir diagramas de carreiras, competências e cursos.

*Padrão: `false`*

### `allow_career_users`

**Habilitar diagramas de carreira para usuários**

Se os diagramas de carreira estiverem habilitados, os usuários só poderão vê-los (e apenas os diagramas correspondentes aos seus estudos) se você ativar esta opção.

*Padrão: `false`*

### `allow_coach_to_edit_course_session`

**Permitir que treinadores editem dentro de sessões de curso**

Permitir que treinadores editem dentro de sessões de curso.

*Padrão: `true`*

### `allow_delete_user_for_session_admin`

**Administradores de sessão podem excluir usuários**

Administradores de sessão podem remover usuários da plataforma ao gerenciar suas sessões.

*Padrão: `false`*

### `allow_disable_user_for_session_admin`

**Administradores de sessão podem desativar usuários**

Administradores de sessão podem desativar contas de usuários para impedir o login, mantendo os registros de matrícula em suas sessões.

*Padrão: `false`*

### `allow_edit_tool_visibility_in_session`

**Permitir edição de visibilidade de ferramentas em sessões**

Ao usar sessões, o comportamento padrão é utilizar a visibilidade de ferramentas definida no curso base. Esta configuração altera isso para permitir que treinadores em cursos de sessão adaptem a visibilidade das ferramentas às suas necessidades.

*Padrão: `true`*

### `allow_redirect_to_session_after_inscription_about`

**Redirecionar para a sessão após registro na página 'Sobre' da sessão**

Redirecionar automaticamente novos usuários para a página da sessão após completarem o registro através da página Sobre da sessão.

*Padrão: `false`*

### `allow_search_diagnostic`

**Habilitar diagnóstico de busca de sessões**

Permitir que tutores obtenham um diagnóstico que os ajude a buscar as melhores sessões para os alunos.

*Padrão: `false`*

### `allow_session_admin_extra_access`

**Administrador de sessão pode acessar importação, atualização e exportação em lote de usuários**

Administradores de sessão podem acessar funcionalidades de importação, atualização e exportação em lote de usuários, além de suas permissões padrão.

*Padrão: `false`*

### `allow_session_admin_login_as_teacher`

**Administradores de sessão podem 'fazer login como' professores**

Administradores de sessão podem se passar por contas de professores para visualizar o conteúdo do curso e a experiência do aluno dentro de suas sessões.

*Padrão: `false`*

### `allow_session_admin_read_careers`

**Administradores de sessão podem visualizar carreiras**

[inferido] Administradores de sessão podem visualizar e acessar caminhos de carreira e fluxos de promoção vinculados às sessões que gerenciam.

*Padrão: `false`*

### `allow_session_admins_to_manage_all_sessions`

**Permitir que administradores de sessão vejam todas as sessões**

Quando esta opção não está habilitada (padrão), os administradores de sessão só podem ver as sessões que criaram. Isso é confuso em um ambiente aberto onde os administradores de sessão podem precisar compartilhar tempo de suporte entre duas sessões.

*Padrão: `false`*

### `allow_session_course_copy_for_teachers`

**Permitir cópia de sessão para sessão para professores**

Habilite esta opção para permitir que professores copiem seu conteúdo de um curso em uma sessão para um curso em outra sessão. Por padrão, esta opção está disponível apenas para administradores da plataforma.

*Padrão: `false`*

### `allow_teachers_to_create_sessions`

**Permitir que professores criem sessões**

Professores podem criar, editar e excluir suas próprias sessões.

*Padrão: `false`*

### `allow_tutors_to_assign_students_to_session`

**Tutores podem atribuir alunos a sessões**

Quando habilitado, treinadores/tutores de cursos em sessões podem inscrever novos usuários em sua sessão. Esta opção, de outra forma, está disponível apenas para administradores e administradores de sessão.

*Padrão: `false`*

### `allow_user_session_collapsable`

**Permitir que o usuário colapse sessões em Minhas sessões**

Usuários podem colapsar cartões ou grupos de sessões na página Minhas sessões para reduzir a desordem visual e melhorar a navegação.

*Padrão: `false`*

### `assignment_base_course_teacher_access_to_all_session`

**Professor do curso base pode ver tarefas de todas as sessões**

Mostrar todas as publicações de alunos (do curso base e de todas as sessões) na página work/pending.php do curso base.

*Padrão: `false`*

---
### `career_diagram_disclaimer`

**Exibir um aviso abaixo do diagrama de carreira**

Adicione um aviso abaixo do diagrama de carreira. Uma variável de idioma chamada 'Career diagram disclaimer' deve existir no seu subidioma.

*Padrão: `false`*

### `career_diagram_legend`

**Exibir uma legenda abaixo do diagrama de carreira**

Adicione uma legenda de carreira abaixo do diagrama de carreira. Uma variável de idioma chamada 'Career diagram legend' deve existir no seu subidioma.

*Padrão: `false`*

### `courses_list_session_title_link`

**Tipo de link para o título da sessão**

Na página de cursos/sessões, o título da sessão pode ser um dos seguintes: 0 = sem link (ocultar título da sessão); 1 = vincular título a uma página especial da sessão; 2 = vincular ao curso se houver apenas um curso; 3 = título da sessão torna a lista de cursos dobrável; 4 = sem link (mostrar título da sessão).

*Padrão: `1`*

### `default_session_list_view`

**Visualização padrão da lista de sessões**

Selecione a aba padrão que você deseja ver ao abrir a lista de sessões como administrador.

*Padrão: `all`*

### `drh_can_access_all_session_content`

**Diretores de RH acessam todo o conteúdo da sessão**

Se ativado, os diretores de recursos humanos terão acesso a todo o conteúdo e usuários das sessões que acompanham.

*Padrão: `true`*

### `duplicate_specific_session_content_on_session_copy`

**Habilitar a cópia de conteúdo específico da sessão para outra sessão**

Permite a duplicação de recursos que foram criados na sessão ao duplicar a sessão.

*Padrão: `false`*

### `email_template_subscription_to_session_confirmation_lost_password`

**Adicionar link de redefinição de senha ao e-mail de notificação de inscrição na sessão**

Inclui um link de redefinição de senha nos e-mails de confirmação de inscrição enviados aos usuários quando eles são inscritos em uma sessão.

*Padrão: `false`*

### `email_template_subscription_to_session_confirmation_username`

**Adicionar nome de usuário ao e-mail de notificação de inscrição na sessão**

Inclui o nome de usuário do usuário nos e-mails de confirmação de inscrição enviados quando eles são inscritos em uma sessão.

*Padrão: `false`*

### `enable_auto_reinscription`

**Habilitar Reinscrição Automática**

Ativa ou desativa a reinscrição automática quando a validade do curso expira. O cron job relacionado também deve estar ativado.

*Padrão: `false`*

### `enable_session_replication`

**Habilitar Replicação de Sessão**

Ativa ou desativa a replicação automática de sessões. O cron job relacionado também deve estar ativado.

*Padrão: `false`*

### `extend_rights_for_coach`

**Ampliar direitos para o coach**

Ativar esta opção concederá ao coach as mesmas permissões que o instrutor nas ferramentas de autoria.

*Padrão: `false`*

### `hide_courses_in_sessions`

**Ocultar lista de cursos nas sessões**

Ao exibir o bloco de sessão na sua página de cursos, oculte a lista de cursos dentro dessa sessão (mostre-os apenas na tela específica da sessão).

*Padrão: `false`*

### `hide_reporting_session_list`

**Ocultar lista de sessões na ferramenta de relatórios**

As sessões que incluem o curso são listadas na ferramenta de relatórios dentro do próprio curso, o que pode adicionar um peso considerável se o mesmo curso for usado em centenas de sessões. Esta opção remove essa lista.

*Padrão: `false`*

### `hide_search_form_in_session_list`

**Ocultar formulário de busca na lista de sessões**

Remove o campo de entrada de busca da visualização da lista de sessões na interface de administração.

*Padrão: `false`*

### `hide_session_graph_in_my_progress`

**Ocultar gráfico de sessão em Meu progresso**

Oculta gráficos e visualizações de progresso da sessão na página Meu progresso nos painéis dos alunos.

*Padrão: `false`*

### `hide_tab_list`

**Ocultar abas na página da sessão**

Remove as abas de navegação da página de detalhes da sessão para simplificar a interface.

### `limit_session_admin_list_users`

**Administradores de sessão têm acesso proibido à lista de usuários**

Impede que administradores de sessão acessem a lista global de usuários na interface de administração.

*Padrão: `false`*

### `limit_session_admin_role`

**Limitar permissões de administradores de sessão**

Se ativado, os administradores de sessão verão apenas o bloco de Usuários com a opção 'Adicionar usuário' e o bloco de Sessões com a opção 'Lista de sessões'.

*Padrão: `false`*

### `my_courses_session_order`

**Alterar a ordenação padrão de sessões em Minhas sessões**

Por padrão, as sessões são ordenadas por data de início. Altere isso fornecendo um array do tipo ['field' => 'end_date', 'order' => 'desc'].

### `my_courses_view_by_session`

**Visualizar meus cursos por sessão**

Ativa uma página adicional 'Meus cursos' onde as sessões aparecem como parte dos cursos, em vez do contrário.

*Padrão: `false`*

### `my_progress_session_show_all_courses`

**Meu progresso: mostrar detalhes do curso na sessão**

Exibe todos os detalhes de cada curso na sessão ao clicar nos detalhes da sessão.

*Padrão: `false`*

### `prevent_session_admins_to_manage_all_users`

**Impedir que administradores de sessão gerenciem todos os usuários**

Ao ativar esta opção, os administradores de sessão só poderão ver, na página de administração, os usuários que criaram.

*Padrão: `false`*

---
### `remove_session_url`

**Ocultar link para a página da sessão**

Oculta o link para a página da sessão na lista de sessões.

*Padrão: `false`*


### `session_admins_access_all_content`

**Administradores de sessão podem acessar todo o conteúdo do curso**

Administradores de sessão podem visualizar todo o conteúdo do curso dentro de suas sessões, incluindo materiais restritos ou arquivados.

*Padrão: `false`*


### `session_admins_edit_courses_content`

**Administradores de sessão podem editar conteúdo do curso**

Administradores de sessão podem modificar o conteúdo do curso (documentos, exercícios, ferramentas) nos cursos atribuídos às suas sessões.

*Padrão: `false`*


### `session_automatic_creation_user_id`

**ID do criador de sessões criadas automaticamente**

Define o usuário a ser usado como criador das sessões criadas automaticamente (para evitar atribuir todas as sessões ao usuário '1', que frequentemente é o administrador do portal).

*Padrão: `1`*


### `session_classes_tab_disable`

**Desativar adição de turma em curso de sessão para não administradores**

Desativa a aba para adicionar turmas em cursos de sessão para usuários que não são administradores.

*Padrão: `false`*


### `session_coach_access_after_duration_end`

**Sessões por duração sempre disponíveis para instrutores**

Caso contrário, os instrutores de sessão só terão acesso às sessões por duração durante o período ativo.

*Padrão: `false`*


### `session_course_ordering`

**Ordenação manual de cursos em sessões**

Ative esta opção para permitir que os administradores de sessão ordenem os cursos dentro de uma sessão manualmente. Se desativado, os cursos são ordenados alfabeticamente pelo título do curso.

*Padrão: `false`*


### `session_course_users_subscription_limited_to_session_users`

**Limitar inscrições no curso apenas aos usuários da sessão**

Restringe a lista de alunos que podem se inscrever na sessão do curso. E desativa o registro de usuários em todos os cursos a partir da página Resumo da Sessão.

*Padrão: `false`*


### `session_courses_read_only_mode`

**Definir curso como somente leitura em sessão**

Permite que professores definam alguns cursos como modo somente leitura quando abertos por meio de sessões. Nas propriedades do curso, marque a opção 'Bloquear curso na sessão'.

*Padrão: `false`*


### `session_creation_form_set_extra_fields_mandatory`

**Definir campos extras como obrigatórios no formulário de criação de sessão**

Exige os campos listados durante a criação da sessão.


### `session_creation_user_course_extra_field_relation_to_prefill`

**Preencher campos de sessão com campos de usuário**

Array de relações entre campos extras de usuário e campos extras de sessão, para que a sessão possa ser preenchida previamente com dados correspondentes aos do usuário.


### `session_days_after_coach_access`

**Dias padrão de acesso do instrutor após a sessão**

Número padrão de dias que um instrutor pode acessar sua sessão após a data oficial de término da sessão.


### `session_days_before_coach_access`

**Dias padrão de acesso do instrutor antes da sessão**

Número padrão de dias que um instrutor pode acessar sua sessão antes da data oficial de início da sessão.


### `session_import_settings`

**Opções para importação de sessão**

Array de opções a serem aplicadas como parâmetros padrão na importação de sessões em CSV/XML.


### `session_list_order`

**Sessões suportam ordenação manual**

Ativa a reordenação manual de sessões na lista de administração de sessões por meio de arrastar e soltar ou mecanismo semelhante.

*Padrão: `false`*


### `session_list_show_count_users`

**Mostrar número de usuários na lista de sessões**

O administrador pode ver o número de usuários em cada sessão. Isso adiciona um peso extra à lista de sessões, então, se você a usa com frequência, considere cuidadosamente se deseja o tempo de espera adicional.

*Padrão: `false`*


### `session_list_view_remaining_days`

**Mostrar dias restantes em Minhas Sessões**

Se ativado, as datas da sessão na página "Minhas Sessões" serão substituídas pelo número de dias restantes.

*Padrão: `false`*


### `session_model_list_field_ordered_by_id`

**Ordenar modelos de sessão por ID no formulário de criação de sessão**

Ordena os modelos de sessão pelo seu ID numérico no menu suspenso do formulário de criação de sessão, em vez de alfabeticamente pelo nome.

*Padrão: `false`*


### `session_multiple_subscription_students_list_avoid_emptying`

**Evitar esvaziar os usuários inscritos na inscrição de sessão**

Ao usar a inscrição de múltiplos alunos em uma sessão, evita o comportamento padrão de desinscrever usuários que não estão no painel direito ao clicar em enviar. Mantém todos os usuários lá.

*Padrão: `false`*


### `show_all_sessions_on_my_course_page`

**Mostrar todas as sessões na página 'Meus cursos'**

Se ativado, esta opção mostra todas as sessões do usuário em uma visualização baseada em calendário.

*Padrão: `true`*


### `show_session_coach`

**Mostrar instrutor da sessão**

Mostra o nome do instrutor global da sessão na caixa de título da sessão na lista de cursos.

*Padrão: `false`*


### `show_session_data`

**Mostrar título dos dados da sessão**

Mostra comentário dos dados da sessão.

*Padrão: `false`*


### `show_session_description`

**Mostrar descrição da sessão**

Mostra a descrição da sessão onde quer que esta opção esteja implementada (páginas de rastreamento de sessões, etc.).

*Padrão: `false`*

---
### `show_simple_session_info`

**Mostrar informações simples da sessão**

Adiciona o nome do tutor e as datas ao subtítulo da sessão na lista de sessões.

*Padrão: `true`*


### `show_users_in_active_sessions_in_tracking`

**Exibir apenas usuários de sessões ativas no rastreamento**

Exibe apenas usuários de sessões atualmente ativas nas visualizações de rastreamento e relatórios de alunos.

*Padrão: `false`*


### `tracking_columns`

**Personalizar colunas de rastreamento de curso-sessão**

Define um array de colunas para os seguintes relatórios: 'course_session', 'my_students_lp', 'my_progress_lp', 'my_progress_courses'.

### `user_s_session_duration`

**Duração de sessões criadas automaticamente**

Duração (em dias) das sessões criadas automaticamente para um único usuário. Após o vencimento, o usuário não pode se registrar no mesmo curso (nenhuma outra sessão é criada).

*Padrão: `1095`*


### `user_session_display_mode`

**Modo de exibição de Minhas Sessões**

Escolha como a página "Minhas Sessões" é exibida: como uma visualização moderna em blocos visuais (cartões) ou no estilo clássico de lista.

*Padrão: `list`*