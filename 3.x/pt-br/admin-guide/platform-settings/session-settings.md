# Configurações de sessões

Padrões e comportamento para **Sessões** — ciclo de vida da sessão, janelas de acesso do tutor, visibilidade do curso dentro de uma sessão e similares.

Acesse estas configurações em **Administração > Configurações > Sessões**. Esta categoria contém **68 configurações**, listadas abaixo com o título e o comentário fornecidos nos fixtures de configurações da plataforma (`SettingsCurrentFixtures.php`).

> O nome da variável no código é mostrado em monoespaçado. Use-o ao criar scripts via API ou quando precisar alterar essas configurações em nível global editando [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Configurações

### `add_users_by_coach`

**Permitir que tutores cadastrem usuários**

Os tutores podem criar usuários na plataforma e inscrever usuários em uma sessão.

*Padrão: `false`*

### `allow_career_diagram`

**Ativar diagramas de carreira**

Os diagramas de carreira permitem exibir diagramas de carreiras, competências e cursos.

*Padrão: `false`*


### `allow_career_users`

**Ativar diagramas de carreira para usuários**

Se os diagramas de carreira estiverem ativados, os usuários só poderão vê-los (e apenas os diagramas que correspondam aos seus estudos) se você ativar esta opção.

*Padrão: `false`*

### `allow_coach_to_edit_course_session`

**Permitir que tutores editem dentro de sessões de curso**

Permitir que tutores editem dentro de sessões de curso

*Padrão: `true`*

### `allow_delete_user_for_session_admin`

**Administradores de sessão podem excluir usuários**

Os administradores de sessão podem remover usuários da plataforma ao gerenciar sua(s) sessão(ões).

*Padrão: `false`*


### `allow_disable_user_for_session_admin`

**Administradores de sessão podem desativar usuários**

Os administradores de sessão podem desativar contas de usuário para impedir o login, mantendo os registros de inscrição em sua(s) sessão(ões).

*Padrão: `false`*


### `allow_edit_tool_visibility_in_session`

**Permitir edição da visibilidade das ferramentas nas sessões**

Ao usar sessões, o comportamento padrão é utilizar a visibilidade das ferramentas definida no curso base. Esta configuração altera isso para permitir que os tutores nos cursos da sessão adaptem as visibilidades das ferramentas às suas necessidades.

*Padrão: `true`*

### `allow_redirect_to_session_after_inscription_about`

**Redirecionar para a sessão após o cadastro na página 'Sobre' da sessão**

Redirecionar automaticamente novos usuários para a página da sessão após concluírem o cadastro por meio da página Sobre de uma sessão.

*Padrão: `false`*


### `allow_search_diagnostic`

**Ativar diagnóstico de busca de sessões**

Permitir que os tutores obtenham um diagnóstico que os ajude a buscar as melhores sessões para os aprendizes.

*Padrão: `false`*


### `allow_session_admin_extra_access`

**Administrador de sessão pode acessar importação, atualização e exportação em lote de usuários**

Os administradores de sessão podem acessar as funcionalidades de importação, atualização e exportação em lote de usuários, além de suas permissões padrão.

*Padrão: `false`*


### `allow_session_admin_login_as_teacher`

**Administradores de sessão podem 'entrar como' professores**

Os administradores de sessão podem personificar contas de professor para pré-visualizar o conteúdo do curso e a experiência do estudante em sua(s) sessão(ões).

*Padrão: `false`*


### `allow_session_admin_read_careers`

**Administradores de sessão podem visualizar carreiras**

[inferido] Os administradores de sessão podem visualizar e acessar trajetórias de carreira e fluxos de promoção vinculados às sessões que gerenciam.

*Padrão: `false`*


### `allow_session_admins_to_manage_all_sessions`

**Permitir que administradores de sessão vejam todas as sessões**

Quando esta opção não está ativada (padrão), os administradores de sessão só podem ver as sessões que criaram. Isso é confuso em um ambiente aberto em que os administradores de sessão possam precisar compartilhar tempo de suporte entre duas sessões.

*Padrão: `false`*

### `allow_session_course_copy_for_teachers`

**Permitir cópia de sessão para sessão para professores**

Ative esta opção para que os professores copiem seu conteúdo de um curso em uma sessão para um curso em outra sessão. Por padrão, esta opção está disponível apenas para administradores da plataforma.

*Padrão: `false`*

### `allow_teachers_to_create_sessions`

**Permitir que professores criem sessões**

Os professores podem criar, editar e excluir suas próprias sessões.

*Padrão: `false`*

### `allow_tutors_to_assign_students_to_session`

**Tutores podem atribuir estudantes a sessões**

Quando ativada, os tutores de curso nas sessões podem inscrever novos usuários em sua sessão. Caso contrário, esta opção está disponível apenas para administradores e administradores de sessão.

*Padrão: `false`*

### `allow_user_session_collapsable`

**Permitir que o usuário recolha sessões em Minhas sessões**

Os usuários podem recolher cartões ou grupos de sessão na página Minhas sessões para reduzir a poluição visual e melhorar a navegação.

*Padrão: `false`*


### `assignment_base_course_teacher_access_to_all_session`

**O professor do curso base pode ver as tarefas de todas as sessões**

Exibir todas as publicações dos aprendizes (do curso base e de todas as sessões) na página work/pending.php do curso base.

*Padrão: `false`*

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

Na página de cursos/sessões, o título da sessão pode ser um dos seguintes: 0 = sem link (ocultar o título da sessão) ; 1 = vincular o título a uma página especial da sessão ; 2 = vincular ao curso se houver apenas um curso ; 3 = o título da sessão torna a lista de cursos recolhível ; 4 = sem link (exibir o título da sessão).

*Padrão: `1`*

### `default_session_list_view`

**Visualização padrão da lista de sessões**

Selecione a aba padrão que deseja ver ao abrir a lista de sessões como administrador.

*Padrão: `all`*


### `drh_can_access_all_session_content`

**Diretores de RH acessam todo o conteúdo da sessão**

Se habilitado, os diretores de recursos humanos terão acesso a todo o conteúdo e aos usuários das sessões que acompanham.

*Padrão: `true`*

### `duplicate_specific_session_content_on_session_copy`

**Habilitar a cópia de conteúdo específico da sessão para outra sessão**

Permite a duplicação de recursos que foram criados na sessão ao duplicar a sessão.

*Padrão: `false`*


### `email_template_subscription_to_session_confirmation_lost_password`

**Adicionar link de redefinição de senha à notificação por e-mail de inscrição na sessão**

Inclua um link de redefinição de senha nos e-mails de confirmação de inscrição enviados aos usuários quando eles forem matriculados em uma sessão.

*Padrão: `false`*


### `email_template_subscription_to_session_confirmation_username`

**Adicionar nome de usuário à notificação por e-mail de inscrição na sessão**

Inclua o nome de usuário nos e-mails de confirmação de inscrição enviados quando eles forem matriculados em uma sessão.

*Padrão: `false`*


### `enable_auto_reinscription`

**Habilitar reinscrição automática**

Habilite ou desabilite a reinscrição automática quando a validade do curso expirar. O cron job relacionado também deve ser ativado.

*Padrão: `false`*


### `enable_session_replication`

**Habilitar replicação de sessão**

Habilite ou desabilite a replicação automática de sessão. O cron job relacionado também deve ser ativado.

*Padrão: `false`*


### `extend_rights_for_coach`

**Estender direitos para tutores**

Habilite esta opção para conceder aos tutores as mesmas permissões que os formadores nas ferramentas de autoria

*Padrão: `false`*

### `hide_courses_in_sessions`

**Ocultar lista de cursos nas sessões**

Ao exibir o bloco da sessão na sua página de cursos, oculte a lista de cursos dentro dessa sessão (mostre-os apenas na tela específica da sessão).

*Padrão: `false`*

### `hide_reporting_session_list`

**Ocultar lista de sessões na ferramenta de relatórios**

As sessões que incluem o curso são listadas na ferramenta de relatórios dentro do próprio curso, o que pode adicionar um peso considerável se o mesmo curso for usado em centenas de sessões. Esta opção remove essa lista.

*Padrão: `false`*


### `hide_search_form_in_session_list`

**Ocultar formulário de busca na lista de sessões**

Remova o campo de busca da visualização da lista de sessões na interface de administração.

*Padrão: `false`*


### `hide_session_graph_in_my_progress`

**Ocultar gráfico da sessão em Meu progresso**

Oculte os gráficos e visualizações de progresso da sessão da página Meu progresso nos painéis do aluno.

*Padrão: `false`*


### `hide_tab_list`

**Ocultar abas na página da sessão**

Remova as abas de navegação da página de detalhes da sessão para simplificar a interface.

### `limit_session_admin_list_users`

**Administradores de sessão têm acesso proibido à lista de usuários**

Impedir que os administradores de sessão acessem a lista global de usuários na interface de administração.

*Padrão: `false`*


### `limit_session_admin_role`

**Limitar permissões dos administradores de sessão**

Se habilitado, os administradores de sessão verão apenas o bloco Usuário com a opção 'Adicionar usuário' e o bloco Sessões com a opção 'Lista de sessões'.

*Padrão: `false`*

### `my_courses_session_order`

**Alterar a ordenação padrão das sessões em Minhas sessões**

Por padrão, as sessões são ordenadas pela data de início. Altere isso fornecendo um array do tipo ['field' => 'end_date', 'order' => 'desc'].

### `my_courses_view_by_session`

**Visualizar meus cursos por sessão**

Habilite uma página adicional 'Meus cursos' em que as sessões aparecem como parte dos cursos, em vez do contrário.

*Padrão: `false`*

### `my_progress_session_show_all_courses`

**Meu progresso: exibir detalhes do curso na sessão**

Exiba todos os detalhes de cada curso na sessão ao clicar nos detalhes da sessão.

*Padrão: `false`*


### `prevent_session_admins_to_manage_all_users`

**Impedir que administradores de sessão gerenciem todos os usuários**

Ao habilitar esta opção, os administradores de sessão só poderão ver, na página de administração, os usuários que eles criaram.

*Padrão: `false`*

### `remove_session_url`

**Ocultar link para a página da sessão**

Oculta o link para a página da sessão na lista de sessões.

*Padrão: `false`*


### `session_admins_access_all_content`

**Administradores de sessão podem acessar todo o conteúdo do curso**

Os administradores de sessão podem visualizar todo o conteúdo do curso em suas sessões, incluindo materiais restritos ou arquivados.

*Padrão: `false`*

### `session_admins_edit_courses_content`

**Administradores de sessão podem editar o conteúdo do curso**

Os administradores de sessão podem modificar o conteúdo do curso (documentos, exercícios, ferramentas) nos cursos atribuídos às suas sessões.

*Padrão: `false`*

### `session_automatic_creation_user_id`

**ID do criador da sessão criada automaticamente**

Define o usuário a ser usado como criador das sessões criadas automaticamente (para evitar atribuir todas as sessões ao usuário '1', que frequentemente é o administrador do portal).

*Padrão: `1`*


### `session_classes_tab_disable`

**Desabilitar adicionar turma no curso da sessão para não administradores**

Desabilita a aba para adicionar turmas no curso da sessão para não administradores.

*Padrão: `false`*


### `session_coach_access_after_duration_end`

**Sessões por duração sempre disponíveis para tutores**

Caso contrário, os tutores da sessão só têm acesso às sessões por duração durante o período ativo.

*Padrão: `false`*


### `session_course_ordering`

**Ordenação manual dos cursos da sessão**

Habilite esta opção para permitir que os administradores de sessão ordenem os cursos dentro de uma sessão manualmente. Se desabilitada, os cursos são ordenados alfabeticamente pelo título do curso.

*Padrão: `false`*

### `session_course_users_subscription_limited_to_session_users`

**Limitar inscrições no curso apenas a usuários da sessão**

Restringe a lista de alunos a inscrever na sessão do curso. E desabilita o registro de usuários em todos os cursos a partir da página Resumo da Sessão.

*Padrão: `false`*


### `session_courses_read_only_mode`

**Definir curso como somente leitura na sessão**

Permite que os professores definam alguns cursos como somente leitura quando abertos por meio de sessões. Nas propriedades do curso, marque a opção 'Bloquear curso na sessão'.

*Padrão: `false`*


### `session_creation_form_set_extra_fields_mandatory`

**Definir campos extras obrigatórios no formulário de criação de sessão**

Exige os campos listados durante a criação da sessão.

### `session_creation_user_course_extra_field_relation_to_prefill`

**Pré-preencher campos da sessão com campos do usuário**

Array de relacionamentos entre campos extras do usuário e campos extras da sessão, para que a sessão possa ser pré-preenchida com dados correspondentes aos dados do usuário.

### `session_days_after_coach_access`

**Dias padrão de acesso do tutor após a sessão**

Número padrão de dias em que um tutor pode acessar uma sessão após a data oficial de término da sessão

### `session_days_before_coach_access`

**Dias padrão de acesso do tutor antes da sessão**

Número padrão de dias em que um tutor pode acessar uma sessão antes da data oficial de início da sessão

### `session_import_settings`

**Opções para importação de sessão**

Array de opções a aplicar como parâmetros padrão na importação de sessão CSV/XML.

### `session_list_order`

**Sessões suportam ordenação manual**

Habilita a reordenação manual das sessões na lista de sessões da administração via arrastar e soltar ou mecanismo semelhante.

*Padrão: `false`*


### `session_list_show_count_users`

**Exibir número de usuários na lista de sessões**

O administrador pode ver o número de usuários em cada sessão. Isso adiciona carga extra à lista de sessões, portanto, se você a usar com frequência, considere com cuidado se deseja o tempo de espera adicional.

*Padrão: `false`*


### `session_list_view_remaining_days`

**Exibir dias restantes em Minhas Sessões**

Se habilitada, as datas da sessão na página "Minhas Sessões" serão substituídas pelo número de dias restantes.

*Padrão: `false`*

### `session_model_list_field_ordered_by_id`

**Ordenar modelos de sessão por id no formulário de criação de sessão**

[inferido] Ordena os modelos de sessão pelo ID numérico no menu suspenso do formulário de criação de sessão em vez de alfabeticamente pelo nome.

*Padrão: `false`*


### `session_multiple_subscription_students_list_avoid_emptying`

**Impedir o esvaziamento dos usuários inscritos na inscrição da sessão**

Ao usar a inscrição múltipla de alunos em uma sessão, impede o comportamento normal, que é cancelar a inscrição de usuários que não estão no painel correto ao clicar em enviar. Mantém todos os usuários ali.

*Padrão: `false`*


### `show_all_sessions_on_my_course_page`

**Exibir todas as sessões na página 'Meus cursos'**

Se habilitada, esta opção exibe todas as sessões do usuário em visualização baseada em calendário.

*Padrão: `true`*


### `show_session_coach`

**Exibir tutor da sessão**

Exibe o nome do tutor geral da sessão na caixa de título da sessão na lista de cursos

*Padrão: `false`*

### `show_session_data`

**Exibir título dos dados da sessão**

Exibe o comentário dos dados da sessão

*Padrão: `false`*

### `show_session_description`

**Exibir descrição da sessão**

Exibe a descrição da sessão onde esta opção estiver implementada (páginas de acompanhamento de sessões, etc.)

*Padrão: `false`*

### `show_simple_session_info`

**Exibir informações simples da sessão**

Adiciona o tutor e as datas ao subtítulo da sessão na lista de sessões.

*Padrão: `true`*


### `show_users_in_active_sessions_in_tracking`

**Exibir apenas usuários de sessões ativas no rastreamento**

Exibe apenas usuários de sessões atualmente ativas nas visualizações de rastreamento e relatórios do aluno.

*Padrão: `false`*


### `tracking_columns`

**Personalizar colunas de rastreamento de curso-sessão**

Define um array de colunas para os seguintes relatórios: 'course_session', 'my_students_lp', 'my_progress_lp', 'my_progress_courses'.

### `user_s_session_duration`

**Duração das sessões criadas automaticamente**

Duração (em dias) das sessões de usuário único criadas automaticamente. Após o vencimento, o usuário não pode se inscrever no mesmo curso (nenhuma outra sessão é criada).

*Padrão: `1095`*


### `user_session_display_mode`

**Modo de exibição de Minhas Sessões**

Escolha como a página "Minhas Sessões" é exibida: como uma visualização moderna em blocos visuais (cards) ou no estilo clássico de lista.

*Padrão: `list`*