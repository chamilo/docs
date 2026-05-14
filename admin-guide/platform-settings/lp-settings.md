# Configurações de Percursos de Aprendizagem

Padrões e comportamentos da ferramenta **Percursos de Aprendizagem** — início automático, visualização padrão, pré-requisitos, comportamento SCORM e similares.

Acesse essas configurações em **Administração > Configurações de configuração > Percursos de Aprendizagem**. Esta categoria contém **51 configurações**, listadas abaixo com o título e comentário fornecidos nos arquivos de configurações da plataforma (`SettingsCurrentFixtures.php`).

> O nome da variável no código é mostrado em fonte monoespaçada. Use-o ao criar scripts via API ou quando precisar alterar essas configurações em um nível global editando [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Configurações

### `add_all_files_in_lp_export`

**Exportar todos os arquivos ao exportar um percurso de aprendizagem**

Ao exportar um percurso de aprendizagem, todos os arquivos e pastas no mesmo caminho de um HTML também serão exportados.

*Padrão: `false`*

### `allow_htaccess_import_from_scorm`

**Permitir .htaccess de pacotes SCORM**

Normalmente, todos os arquivos .htaccess são filtrados e removidos ao importar conteúdo no Chamilo. Esta funcionalidade permite que .htaccess sejam importados se estiverem presentes em um pacote SCORM.

*Padrão: `false`*

### `allow_import_scorm_package_in_course_builder`

**Importação de SCORM dentro da importação de curso**

Habilite para copiar a estrutura de diretórios de pacotes SCORM ao restaurar um curso (a partir da ferramenta de manutenção de curso).

*Padrão: `false`*

### `allow_lp_chamilo_export`

**Exportar percursos de aprendizagem no formato de backup do Chamilo**

Habilite a possibilidade de exportar qualquer um dos seus percursos de aprendizagem no formato de backup de curso do Chamilo.

*Padrão: `false`*

### `allow_lp_return_link`

**Mostrar link de retorno nos percursos de aprendizagem**

Desative esta opção para ocultar o botão 'Retornar à página inicial' nos percursos de aprendizagem.

*Padrão: `true`*

### `allow_lp_subscription_to_usergroups`

**Inscrição em percursos de aprendizagem para turmas**

Habilite a inscrição em percursos de aprendizagem e categorias de percursos de aprendizagem para grupos/turmas.

*Padrão: `false`*

### `allow_session_lp_category`

**Categorias de percursos de aprendizagem podem ser gerenciadas em sessões**

[inferido] Habilite que alunos e instrutores organizem e gerenciem percursos de aprendizagem por categorias dentro de cursos de sessão.

*Padrão: `false`*

### `allow_teachers_to_access_blocked_lp_by_prerequisite`

**Professores podem acessar percursos de aprendizagem bloqueados**

Professores não precisam completar percursos de aprendizagem para ter acesso a um percurso de aprendizagem bloqueado por pré-requisitos.

*Padrão: `false`*

### `disable_js_in_lp_view`

**Desativar JS na visualização de percursos de aprendizagem**

Desative arquivos JS que o Chamilo normalmente adiciona aos arquivos HTML no percurso de aprendizagem (ao exibi-los).

*Padrão: `false`*

### `disable_my_lps_page`

**Ocultar página 'Meus percursos de aprendizagem'**

A página 'Meu percurso de aprendizagem' foi adicionada na versão 1.11. Use esta opção para ocultá-la.

*Padrão: `false`*

### `download_files_after_all_lp_finished`

**Botão de download após concluir percursos de aprendizagem**

Mostre o botão de download de arquivos após concluir todos os percursos de aprendizagem. Exemplo: se ABC é o código do curso, e 1 e 100 são os IDs dos documentos, escolha: ['courses' => ['ABC' => [1, 100]]].

### `force_edit_exercise_in_lp`

**Edição de testes incluídos em percursos de aprendizagem**

Habilite a edição de testes mesmo que tenham sido incluídos em um percurso de aprendizagem. O padrão é impedir a edição se o teste estiver em um percurso de aprendizagem, pois isso pode afetar a consistência do rastreamento entre muitos alunos se as modificações no teste forem significativas.

*Padrão: `false`*

### `hide_accessibility_label_on_lp_item`

**Ocultar rótulo de requisitos em itens de percursos de aprendizagem**

Oculte a dica de ferramenta de pré-requisitos em itens de percurso de aprendizagem. Esta é principalmente uma escolha estética.

*Padrão: `true`*

### `hide_lp_time`

**Ocultar tempo dos registros de percursos de aprendizagem**

Oculte o tempo gasto em percursos de aprendizagem nos relatórios em geral.

*Padrão: `false`*

### `hide_scorm_copy_link`

**Ocultar Cópia SCORM**

Oculte o ícone de Cópia de Percurso de Aprendizagem da lista de Percursos de Aprendizagem.

*Padrão: `false`*

### `hide_scorm_export_link`

**Ocultar Exportação SCORM**

Oculte o ícone de Exportação SCORM da lista de Percursos de Aprendizagem.

*Padrão: `false`*

### `hide_scorm_pdf_link`

**Ocultar exportação de PDF de Percurso de Aprendizagem**

Oculte o ícone de Exportação de PDF de Percurso de Aprendizagem da lista de Percursos de Aprendizagem.

*Padrão: `true`*

### `lp_allow_export_to_students`

**Alunos podem exportar percursos de aprendizagem**

Habilite esta opção para permitir que os alunos baixem os percursos de aprendizagem como pacotes SCORM.

*Padrão: `false`*

### `lp_enable_flow`

**Navegar entre percursos de aprendizagem**

Adicione a possibilidade de selecionar um percurso de aprendizagem 'próximo' e mostre botões dentro do percurso de aprendizagem para passar de um para o próximo.

*Padrão: `false`*

### `lp_fixed_encoding`

**Codificação fixa em percurso de aprendizagem**

Reduza o uso de recursos ignorando uma verificação na codificação de texto em percursos de aprendizagem importados.

*Padrão: `false`*

### `lp_item_prerequisite_dates`

**Pré-requisitos de itens de percurso de aprendizagem baseados em datas**

Adiciona a opção de definir pré-requisitos com datas de início e término para itens de percurso de aprendizagem.

*Padrão: `false`*

---
### `lp_menu_location`

**Localização do menu do percurso de aprendizagem**

Defina como 'left' ou 'right' para alterar o lado do menu do percurso de aprendizagem.

*Padrão: `left`*

### `lp_minimum_time`

**Tempo mínimo para completar o percurso de aprendizagem**

Adicione um campo de tempo mínimo aos percursos de aprendizagem. Se o usuário não tiver passado esse tempo no percurso de aprendizagem, o último item do percurso não poderá ser concluído.

*Padrão: `false`*

### `lp_prerequisit_on_quiz_unblock_if_max_attempt_reached`

**Desbloquear item do percurso de aprendizagem se o número máximo de tentativas for atingido para o teste pré-requisito**

[inferido] Desbloqueia automaticamente itens subsequentes do percurso de aprendizagem quando um aluno esgota o número máximo de tentativas em um teste pré-requisito.

### `lp_prerequisite_on_quiz_unblock_if_max_attempt_reached`

**Desbloquear pré-requisitos após a última tentativa de teste**

Permite que os usuários continuem em um percurso de aprendizagem após utilizarem todas as tentativas de um teste usado como pré-requisito para outros itens.

*Padrão: `false`*

### `lp_prerequisite_use_last_attempt_only`

**Usar apenas a última pontuação em pré-requisitos de teste no percurso de aprendizagem**

Quando um teste é usado como pré-requisito para um item no percurso de aprendizagem, considera apenas a última tentativa do teste como validação para o pré-requisito (o padrão é usar a melhor tentativa).

*Padrão: `false`*

### `lp_prevents_beforeunload`

**Prevenir evento JS beforeunload no percurso de aprendizagem**

Isso ajuda na compatibilidade com navegadores, evitando a execução de eventos JS problemáticos.

*Padrão: `false`*

### `lp_score_as_progress_enable`

**Usar pontuação do percurso de aprendizagem como progresso**

Isso é útil ao usar conteúdo SCORM com apenas um grande SCO. O SCORM não comunica progresso, então este é um truque para usar a pontuação como progresso. Ativar esta opção permitirá configurá-la por percurso de aprendizagem.

*Padrão: `false`*

### `lp_show_max_progress_instead_of_average`

**Mostrar progresso máximo em vez de média para relatórios de percursos de aprendizagem**

[inferido] Calcula o progresso do percurso de aprendizagem com base na conclusão máxima de itens, em vez de fazer a média de todos os itens.

*Padrão: `false`*

### `lp_show_max_progress_or_average_enable_course_level_redefinition`

**Selecionar progresso máximo versus média para percursos de aprendizagem no nível do curso**

Habilita a redefinição da configuração para mostrar o melhor progresso em vez de médias nos relatórios de percursos de aprendizagem no nível do curso.

*Padrão: `false`*

### `lp_show_reduced_report`

**Percursos de aprendizagem: mostrar relatório reduzido**

Dentro da ferramenta de percursos de aprendizagem, quando um usuário revisa seu próprio progresso (por meio do ícone de estatísticas), exibe uma versão resumida (menos detalhada) do relatório de progresso.

*Padrão: `false`*

### `lp_start_and_end_date_visible_in_student_view`

**Exibir disponibilidade do percurso de aprendizagem para os alunos**

Mostra os percursos de aprendizagem aos alunos com suas datas de disponibilidade, em vez de ocultá-los até que a data chegue.

*Padrão: `false`*

### `lp_subscription_settings`

**Configurações de inscrição em percursos de aprendizagem**

Configura opções adicionais para o recurso de inscrição em percursos de aprendizagem. As opções incluem 'allow_add_users_to_lp' e 'allow_add_users_to_lp_category'.

### `lp_view_accordion`

**Itens de percursos de aprendizagem dobráveis**

[inferido] Exibe os itens do percurso de aprendizagem em formato de acordeão dobrável para melhorar a navegação e a organização do conteúdo.

*Padrão: `false`*

### `lp_view_settings`

**Configurações de exibição do percurso de aprendizagem**

Configura opções adicionais para a exibição dos percursos de aprendizagem. As opções incluem 'show_reporting_icon', 'hide_lp_arrow_navigation', 'show_toolbar_by_default', 'navigation_in_the_middle' e 'add_extra_quit_to_home_icon'.

### `scorm_api_extrafield_to_use_as_student_id`

**Usar campo extra como student_id na comunicação SCORM**

Informe o nome do campo extra a ser usado como student_id para toda a comunicação SCORM.

### `scorm_api_username_as_student_id`

**Usar nome de usuário como student_id na comunicação SCORM**

[inferido] Usa o nome de usuário do aluno como identificador do estudante na comunicação da API SCORM, em vez do ID do aluno.

*Padrão: `false`*

### `scorm_lms_update_sco_status_all_time`

**Atualizar status do SCO autonomamente**

Se o SCO não estiver enviando um status, assume o controle e atualiza o status com base no que pode ser observado no Chamilo.

*Padrão: `false`*

### `scorm_upload_from_cache`

**Carregar SCORM a partir do diretório de cache**

Permite que administradores façam upload de um pacote SCORM (em formato zip) para o diretório de cache e o utilizem como fonte de importação na página de upload SCORM.

*Padrão: `false`*

### `show_hidden_exercise_added_to_lp`

**Exibir testes de percursos de aprendizagem mesmo se invisíveis**

Mostra exercícios ocultos que foram adicionados a um percurso de aprendizagem na lista de exercícios. Se estivermos em uma sessão, o teste estiver invisível no curso base, estiver incluído em um percurso de aprendizagem e a configuração para mostrá-lo não estiver especificamente definida como verdadeira, então o oculta.

*Padrão: `true`*

### `show_invisible_exercise_in_lp_list`

**Exibir testes na lista de testes do percurso de aprendizagem mesmo se invisíveis**

[inferido] Inclui testes ocultos na lista de testes disponíveis ao visualizar o conteúdo do percurso de aprendizagem.

*Padrão: `false`*

---
### `show_invisible_exercise_in_lp_toc`

**Testes invisíveis visíveis em percursos de aprendizagem**

Faz com que testes marcados como 'invisíveis' na ferramenta de testes apareçam quando incluídos em um percurso de aprendizagem.

*Padrão: `false`*

### `show_invisible_lp_in_course_home`

**Exibir link para percurso de aprendizagem na página inicial do curso quando invisível**

Se um percurso de aprendizagem estiver definido como invisível, mas o professor/treinador decidir torná-lo disponível na página inicial do curso, esta opção impede que o Chamilo oculte o link na página inicial do curso.

*Padrão: `false`*

### `show_prerequisite_as_blocked`

**Pré-requisitos do percurso de aprendizagem**

Nas listas de percursos de aprendizagem, exibe um elemento visual para mostrar que outros percursos de aprendizagem estão atualmente bloqueados por alguma regra de pré-requisitos.

*Padrão: `false`*

### `student_follow_page_add_LP_acquisition_info`

**Adicionar coluna de aquisição na página de acompanhamento do aluno**

Adiciona uma coluna à página de acompanhamento do aluno para mostrar o status de aquisição de um aluno em um percurso de aprendizagem.

*Padrão: `false`*

### `student_follow_page_add_LP_invisible_checkbox`

**Adicionar informação de visibilidade para percursos de aprendizagem na página de acompanhamento do aluno**

[inferido] Exibe um indicador de status de visibilidade para percursos de aprendizagem na página de rastreamento de progresso do aluno.

*Padrão: `false`*

### `student_follow_page_add_LP_subscription_info`

**Informação de desbloqueio na lista de percursos de aprendizagem**

Adiciona uma coluna 'desbloqueado' na lista de percursos de aprendizagem se o aluno estiver inscrito no percurso de aprendizagem em questão e tiver acesso a ele.

*Padrão: `false`*

### `student_follow_page_hide_lp_tests_average`

**Ocultar sinal de porcentagem na média de testes em percursos de aprendizagem no acompanhamento do aluno**

Oculta o ícone de porcentagem na indicação de 'Média de testes em Percursos de Aprendizagem' no rastreamento de um aluno.

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

**Usar status de item de percurso de aprendizagem de outras sessões**

Permite que os usuários completem pré-requisitos em um percurso de aprendizagem se o item correspondente já tiver sido concluído em outra sessão.

*Padrão: `false`*