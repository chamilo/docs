# Configurações de Percursos de Aprendizagem

Padrões e comportamento da ferramenta **Percursos de Aprendizagem** — início automático, visualização padrão, pré-requisitos, comportamento SCORM e similares.

Acesse estas configurações em **Administração > Configurações > Percursos de Aprendizagem**. Esta categoria contém **51 configurações**, listadas abaixo com o título e o comentário fornecidos nos fixtures de configurações da plataforma (`SettingsCurrentFixtures.php`).

> O nome da variável no código é exibido em monoespaçado. Use-o ao criar scripts via API ou quando precisar alterar essas configurações em nível global editando [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Configurações

### `add_all_files_in_lp_export`

**Exportar todos os arquivos ao exportar um percurso de aprendizagem**

Ao exportar um LP, todos os arquivos e pastas no mesmo caminho de um HTML também serão exportados.

*Padrão: `false`*


### `allow_htaccess_import_from_scorm`

**Permitir .htaccess de pacotes SCORM**

Normalmente, todos os arquivos .htaccess são filtrados e removidos ao importar conteúdo no Chamilo. Este recurso permite que o .htaccess seja importado se estiver presente em um pacote SCORM.

*Padrão: `false`*


### `allow_import_scorm_package_in_course_builder`

**Importação SCORM dentro da importação de curso**

Habilita a cópia da estrutura de diretórios dos pacotes SCORM ao restaurar um curso (a partir da ferramenta de manutenção do curso).

*Padrão: `false`*


### `allow_lp_chamilo_export`

**Exportar percursos de aprendizagem no formato de backup do Chamilo**

Habilita a possibilidade de exportar qualquer um dos seus percursos de aprendizagem no formato de backup de curso do Chamilo.

*Padrão: `false`*


### `allow_lp_return_link`

**Exibir link de retorno dos percursos de aprendizagem**

Desative esta opção para ocultar o botão "Retornar à página inicial" nos percursos de aprendizagem

*Padrão: `true`*


### `allow_lp_subscription_to_usergroups`

**Inscrição em percursos de aprendizagem para turmas**

Habilita a inscrição em percursos de aprendizagem e categorias de percursos de aprendizagem para grupos/turmas.

*Padrão: `false`*


### `allow_session_lp_category`

**Categorias de percursos de aprendizagem podem ser gerenciadas em sessões**

[inferido] Permite que alunos e instrutores organizem e gerenciem percursos de aprendizagem por categorias nos cursos de sessão.

*Padrão: `false`*


### `allow_teachers_to_access_blocked_lp_by_prerequisite`

**Professores podem acessar percursos de aprendizagem bloqueados**

Os professores não precisam concluir percursos de aprendizagem para ter acesso a um percurso de aprendizagem bloqueado por pré-requisitos.

*Padrão: `false`*


### `disable_js_in_lp_view`

**Desativar JS na visualização de percursos de aprendizagem**

Desativa os arquivos JS que o Chamilo normalmente adiciona aos arquivos HTML no percurso de aprendizagem (durante a exibição).

*Padrão: `false`*


### `disable_my_lps_page`

**Ocultar a página "Meus percursos de aprendizagem"**

A página "Meu percurso de aprendizagem" foi adicionada na versão 1.11. Use esta opção para ocultá-la.

*Padrão: `false`*

### `download_files_after_all_lp_finished`

**Botão de download após concluir percursos de aprendizagem**

Exibe o botão de download de arquivos após a conclusão de todos os LP. Exemplo: se ABC for o código do curso, e 1 e 100 forem os IDs dos documentos, escolha: ['courses' => ['ABC' => [1, 100]]].

### `force_edit_exercise_in_lp`

**Edição de testes incluídos em percursos de aprendizagem**

Habilita a edição de testes mesmo que tenham sido incluídos em um percurso de aprendizagem. O padrão é impedir a edição se o teste estiver em um percurso de aprendizagem, porque isso pode afetar a consistência do acompanhamento entre muitos alunos se as modificações do teste forem significativas.

*Padrão: `false`*

### `hide_accessibility_label_on_lp_item`

**Ocultar rótulo de requisitos nos percursos de aprendizagem**

Oculta a dica de pré-requisitos nos itens do percurso de aprendizagem. Trata-se principalmente de uma escolha estética.

*Padrão: `true`*

### `hide_lp_time`

**Ocultar o tempo dos registros de percursos de aprendizagem**

Oculta o tempo gasto nos percursos de aprendizagem nos relatórios em geral.

*Padrão: `false`*

### `hide_scorm_copy_link`

**Ocultar Cópia SCORM**

Oculta o ícone Copiar Percurso de Aprendizagem da lista de Percursos de Aprendizagem

*Padrão: `false`*

### `hide_scorm_export_link`

**Ocultar Exportação SCORM**

Oculta o ícone Exportar SCORM da lista de Percursos de Aprendizagem

*Padrão: `false`*

### `hide_scorm_pdf_link`

**Ocultar exportação PDF do Percurso de Aprendizagem**

Oculta o ícone Exportar PDF do Percurso de Aprendizagem da lista de Percursos de Aprendizagem

*Padrão: `true`*

### `lp_allow_export_to_students`

**Alunos podem exportar percursos de aprendizagem**

Habilite esta opção para permitir que os alunos baixem os percursos de aprendizagem como pacotes SCORM.

*Padrão: `false`*

### `lp_enable_flow`

**Navegar entre percursos de aprendizagem**

Adiciona a possibilidade de selecionar um percurso de aprendizagem "seguinte" e exibe botões dentro do percurso de aprendizagem para avançar de um para o próximo.

*Padrão: `false`*

### `lp_fixed_encoding`

**Codificação fixa no percurso de aprendizagem**

Reduz o uso de recursos ignorando a verificação da codificação de texto em percursos de aprendizagem importados.

*Padrão: `false`*

### `lp_item_prerequisite_dates`

**Pré-requisitos de itens de percurso de aprendizagem baseados em data**

Adiciona a opção de definir pré-requisitos com datas de início e término para itens de learnpath.

*Padrão: `false`*

### `lp_menu_location`

**Localização do menu do itinerário de aprendizagem**

Defina como 'left' ou 'right' para alterar o lado do menu do itinerário de aprendizagem.

*Padrão: `left`*

### `lp_minimum_time`

**Tempo mínimo para concluir o itinerário de aprendizagem**

Adiciona um campo de tempo mínimo aos itinerários de aprendizagem. Se o usuário não tiver dedicado esse tempo ao itinerário, o último item não poderá ser concluído.

*Padrão: `false`*

### `lp_prerequisit_on_quiz_unblock_if_max_attempt_reached`

**Desbloquear item do itinerário de aprendizagem se o número máximo de tentativas for atingido no teste pré-requisito**

[inferido] Desbloqueia automaticamente os itens subsequentes do itinerário de aprendizagem quando o aluno esgota o número máximo de tentativas de um teste usado como pré-requisito.


### `lp_prerequisite_on_quiz_unblock_if_max_attempt_reached`

**Desbloquear pré-requisitos após a última tentativa do teste**

Permite que os usuários continuem no itinerário de aprendizagem após utilizarem todas as tentativas de um teste usado como pré-requisito para outros itens.

*Padrão: `false`*

### `lp_prerequisite_use_last_attempt_only`

**Usar a última pontuação nos pré-requisitos de testes do itinerário de aprendizagem**

Quando um teste é usado como pré-requisito de um item no itinerário de aprendizagem, usa apenas a última tentativa do teste como validação do pré-requisito (o padrão é usar a melhor tentativa).

*Padrão: `false`*

### `lp_prevents_beforeunload`

**Impedir o evento JS beforeunload no itinerário de aprendizagem**

Isso ajuda na compatibilidade com navegadores, impedindo a execução de eventos JS problemáticos.

*Padrão: `false`*

### `lp_score_as_progress_enable`

**Usar a pontuação do itinerário de aprendizagem como progresso**

Útil ao usar conteúdo SCORM com apenas um SCO grande. O SCORM não comunica o progresso, portanto este é um artifício para usar a pontuação como progresso. Ativar esta opção permite configurá-la por itinerário de aprendizagem.

*Padrão: `false`*

### `lp_show_max_progress_instead_of_average`

**Mostrar o progresso máximo em vez da média nos relatórios de itinerários de aprendizagem**

[inferido] Calcula o progresso do itinerário de aprendizagem com base na conclusão máxima dos itens, em vez de calcular a média de todos os itens.

*Padrão: `false`*

### `lp_show_max_progress_or_average_enable_course_level_redefinition`

**Selecionar progresso máximo versus média para itinerários de aprendizagem no nível do curso**

Permite redefinir a configuração para mostrar o melhor progresso em vez das médias nos relatórios de itinerários de aprendizagem no nível do curso.

*Padrão: `false`*

### `lp_show_reduced_report`

**Itinerários de aprendizagem: mostrar relatório reduzido**

Na ferramenta de itinerários de aprendizagem, quando um usuário revisa o próprio progresso (pelo ícone de estatísticas), mostra uma versão resumida (menos detalhada) do relatório de progresso.

*Padrão: `false`*

### `lp_start_and_end_date_visible_in_student_view`

**Exibir a disponibilidade do itinerário de aprendizagem aos alunos**

Mostra os itinerários de aprendizagem aos alunos com as respectivas datas de disponibilidade, em vez de ocultá-los até que a data chegue.

*Padrão: `false`*

### `lp_subscription_settings`

**Configurações de inscrição em itinerários de aprendizagem**

Configura opções adicionais para o recurso de inscrição em itinerários de aprendizagem. As opções incluem 'allow_add_users_to_lp' e 'allow_add_users_to_lp_category'.

### `lp_view_accordion`

**Itens dobráveis dos itinerários de aprendizagem**

[inferido] Exibe os itens do itinerário de aprendizagem em formato de acordeão recolhível, para melhor navegação e organização do conteúdo.

*Padrão: `false`*

### `lp_view_settings`

**Configurações de exibição do itinerário de aprendizagem**

Configura opções adicionais para a exibição dos itinerários de aprendizagem. As opções incluem 'show_reporting_icon', 'hide_lp_arrow_navigation', 'show_toolbar_by_default', 'navigation_in_the_middle' e 'add_extra_quit_to_home_icon'.

### `scorm_api_extrafield_to_use_as_student_id`

**Usar campo extra como student\_id na comunicação SCORM**

Informe o nome do campo extra a ser usado como student_id em toda a comunicação SCORM.

### `scorm_api_username_as_student_id`

**Usar o nome de usuário como student\_id na comunicação SCORM**

[inferido] Usa o nome de usuário do aluno como identificador de estudante na comunicação da API SCORM, em vez do ID do aluno.

*Padrão: `false`*

### `scorm_lms_update_sco_status_all_time`

**Atualizar o status do SCO de forma autônoma**

Se o SCO não enviar um status, assume o controle e atualiza o status com base no que puder ser observado no Chamilo.

*Padrão: `false`*

### `scorm_upload_from_cache`

**Enviar SCORM a partir do diretório de cache**

Permite que os administradores enviem um pacote SCORM (em formato zip) para o diretório de cache e o usem como origem de importação na página de envio de SCORM.

*Padrão: `false`*

### `show_hidden_exercise_added_to_lp`

**Exibir testes de itinerários de aprendizagem mesmo se invisíveis**

Mostra exercícios ocultos que foram adicionados a um LP na lista de exercícios. Se estivermos em uma sessão, o teste estiver invisível no curso base, estiver incluído em um LP e a configuração para exibi-lo não estiver especificamente definida como verdadeira, então o oculta.

*Padrão: `true`*

### `show_invisible_exercise_in_lp_list`

**Exibir testes na lista de testes do itinerário de aprendizagem mesmo se invisíveis**

[inferido] Inclui testes ocultos na lista de testes disponíveis ao visualizar o conteúdo do itinerário de aprendizagem.

*Padrão: `false`*

### `show_invisible_exercise_in_lp_toc`

**Testes invisíveis visíveis nos percursos de aprendizagem**

Faz com que testes marcados como 'invisíveis' na ferramenta de testes apareçam quando estiverem incluídos em um percurso de aprendizagem.

*Padrão: `false`*

### `show_invisible_lp_in_course_home`

**Exibir link para o percurso de aprendizagem na página inicial do curso quando invisível**

Se um percurso de aprendizagem estiver definido como invisível, mas o professor/tutor decidir disponibilizá-lo a partir da página inicial do curso, esta opção impede que o Chamilo oculte o link na página inicial do curso.

*Padrão: `false`*

### `show_prerequisite_as_blocked`

**Pré-requisitos do percurso de aprendizagem**

Nas listas de percursos de aprendizagem, exibe um elemento visual para indicar que outros percursos de aprendizagem estão atualmente bloqueados por alguma regra de pré-requisito.

*Padrão: `false`*

### `student_follow_page_add_lp_acquisition_info`

**Adicionar coluna de aquisição no acompanhamento do aluno**

Adiciona uma coluna à página de acompanhamento do aluno para mostrar o status de aquisição de um aluno em um percurso de aprendizagem.

*Padrão: `false`*

### `student_follow_page_add_lp_invisible_checkbox`

**Adicionar informação de visibilidade dos percursos de aprendizagem na página de acompanhamento do aluno**

[inferido] Exibe um indicador de status de visibilidade dos percursos de aprendizagem na página de acompanhamento do progresso do aluno.

*Padrão: `false`*

### `student_follow_page_add_LP_subscription_info`

**Informação de desbloqueio na lista de percursos de aprendizagem**

Isso adiciona uma coluna 'desbloqueado' na lista de percursos de aprendizagem se o aluno estiver inscrito no percurso de aprendizagem em questão e tiver acesso a ele.

*Padrão: `false`*

### `student_follow_page_hide_lp_tests_average`

**Ocultar o sinal de porcentagem na média dos testes em percursos de aprendizagem no acompanhamento do aluno**

Oculta o ícone de porcentagem na indicação 'Média dos testes em percursos de aprendizagem' no acompanhamento do aluno.

*Padrão: `false`*

### `student_follow_page_include_not_subscribed_lp_students`

**Incluir percursos de aprendizagem não inscritos na página de acompanhamento do aluno**

[inferido] Mostra percursos de aprendizagem nas páginas de progresso mesmo quando os alunos não estão inscritos neles.

*Padrão: `false`*

### `ticket_lp_quiz_info_add`

**Adicionar informações de percursos de aprendizagem e testes ao relatório de tickets**

[inferido] Inclui informações de percursos de aprendizagem e testes no relatório de tickets de suporte para melhor rastreamento de problemas.

*Padrão: `false`*

### `validate_lp_prerequisite_from_other_session`

**Usar o status do item do percurso de aprendizagem de outras sessões**

Permite que os usuários concluam pré-requisitos em um percurso de aprendizagem se o item correspondente já tiver sido concluído em outra sessão.

*Padrão: `false`*