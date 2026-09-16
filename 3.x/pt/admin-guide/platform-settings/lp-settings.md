# Definições dos Percursos de Aprendizagem

Predefinições e comportamento da ferramenta **Percursos de Aprendizagem** — arranque automático, vista predefinida, pré-requisitos, comportamento SCORM e semelhantes.

Aceda a estas definições em **Administração > Definições de configuração > Percursos de Aprendizagem**. Esta categoria contém **51 definições**, listadas abaixo com o título e o comentário fornecidos nas fixtures de definições da plataforma (`SettingsCurrentFixtures.php`).

> O nome da variável no código é apresentado em monoespaçado. Utilize-o ao automatizar via API ou quando precisar de alterar essas definições a nível global editando [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Definições

### `add_all_files_in_lp_export`

**Exportar todos os ficheiros ao exportar um percurso de aprendizagem**

Ao exportar um LP, todos os ficheiros e pastas no mesmo caminho de um html serão também exportados.

*Predefinição: `false`*


### `allow_htaccess_import_from_scorm`

**Permitir .htaccess a partir de pacotes SCORM**

Normalmente, todos os ficheiros .htaccess são filtrados e removidos ao importar conteúdo no Chamilo. Esta funcionalidade permite que o .htaccess seja importado se estiver presente num pacote SCORM.

*Predefinição: `false`*


### `allow_import_scorm_package_in_course_builder`

**Importação SCORM no âmbito da importação de curso**

Ativar a cópia da estrutura de diretórios dos pacotes SCORM ao restaurar um curso (a partir da ferramenta de manutenção do curso).

*Predefinição: `false`*


### `allow_lp_chamilo_export`

**Exportar percursos de aprendizagem no formato de cópia de segurança do Chamilo**

Ativar a possibilidade de exportar qualquer um dos seus percursos de aprendizagem num formato de cópia de segurança de curso Chamilo.

*Predefinição: `false`*


### `allow_lp_return_link`

**Mostrar ligação de regresso nos percursos de aprendizagem**

Desative esta opção para ocultar o botão «Regressar à página inicial» nos percursos de aprendizagem

*Predefinição: `true`*


### `allow_lp_subscription_to_usergroups`

**Inscrição em percursos de aprendizagem para turmas**

Ativar a inscrição em percursos de aprendizagem e em categorias de percursos de aprendizagem para grupos/turmas.

*Predefinição: `false`*


### `allow_session_lp_category`

**As categorias de percursos de aprendizagem podem ser geridas nas sessões**

[inferido] Permitir que formandos e formadores organizem e geram percursos de aprendizagem por categorias nos cursos de sessão.

*Predefinição: `false`*


### `allow_teachers_to_access_blocked_lp_by_prerequisite`

**Os formadores podem aceder a percursos de aprendizagem bloqueados**

Os formadores não precisam de concluir percursos de aprendizagem completos para ter acesso a um percurso de aprendizagem bloqueado por pré-requisitos.

*Predefinição: `false`*


### `disable_js_in_lp_view`

**Desativar JS na vista dos percursos de aprendizagem**

Desativar os ficheiros JS que o Chamilo normalmente adiciona aos ficheiros HTML no percurso de aprendizagem (durante a sua apresentação).

*Predefinição: `false`*


### `disable_my_lps_page`

**Ocultar a página «Os meus percursos de aprendizagem»**

A página «O meu percurso de aprendizagem» foi adicionada na 1.11. Utilize esta opção para a ocultar.

*Predefinição: `false`*

### `download_files_after_all_lp_finished`

**Botão de transferência após concluir percursos de aprendizagem**

Mostrar o botão de transferência de ficheiros após concluir todos os LP. Exemplo: se ABC for o código do curso, e 1 e 100 forem o id do documento, escolha: ['courses' => ['ABC' => [1, 100]]].

### `force_edit_exercise_in_lp`

**Edição de testes incluídos em percursos de aprendizagem**

Permitir a edição de testes mesmo que tenham sido incluídos num percurso de aprendizagem. A predefinição é impedir a edição se o teste estiver num percurso de aprendizagem, porque isso pode afetar a consistência do acompanhamento entre muitos formandos se as alterações ao teste forem significativas.

*Predefinição: `false`*

### `hide_accessibility_label_on_lp_item`

**Ocultar a etiqueta de requisitos nos percursos de aprendizagem**

Ocultar a dica de pré-requisitos nos itens do percurso de aprendizagem. Trata-se sobretudo de uma escolha estética.

*Predefinição: `true`*

### `hide_lp_time`

**Ocultar o tempo nos registos dos percursos de aprendizagem**

Ocultar o tempo despendido nos percursos de aprendizagem nos relatórios em geral.

*Predefinição: `false`*

### `hide_scorm_copy_link`

**Ocultar Cópia SCORM**

Ocultar o ícone Copiar Percurso de Aprendizagem da lista de Percursos de Aprendizagem

*Predefinição: `false`*

### `hide_scorm_export_link`

**Ocultar Exportação SCORM**

Ocultar o ícone Exportar SCORM da lista de Percursos de Aprendizagem

*Predefinição: `false`*

### `hide_scorm_pdf_link`

**Ocultar exportação PDF do Percurso de Aprendizagem**

Ocultar o ícone Exportar PDF do Percurso de Aprendizagem da lista de Percursos de Aprendizagem

*Predefinição: `true`*

### `lp_allow_export_to_students`

**Os formandos podem exportar percursos de aprendizagem**

Ative esta opção para permitir que os formandos descarreguem os percursos de aprendizagem como pacotes SCORM.

*Predefinição: `false`*

### `lp_enable_flow`

**Navegar entre percursos de aprendizagem**

Adicionar a possibilidade de selecionar um percurso de aprendizagem «seguinte» e mostrar botões dentro do percurso de aprendizagem para passar de um para o seguinte.

*Predefinição: `false`*

### `lp_fixed_encoding`

**Codificação fixa no percurso de aprendizagem**

Reduzir a utilização de recursos ignorando a verificação da codificação de texto nos percursos de aprendizagem importados.

*Predefinição: `false`*

### `lp_item_prerequisite_dates`

**Pré-requisitos de itens de percurso de aprendizagem baseados em datas**

Adiciona a opção de definir pré-requisitos com datas de início e de fim para itens de learnpath.

*Predefinição: `false`*

### `lp_menu_location`

**Localização do menu do percurso de aprendizagem**

Defina como 'left' ou 'right' para alterar o lado do menu do percurso de aprendizagem.

*Default: `left`*

### `lp_minimum_time`

**Tempo mínimo para concluir o percurso de aprendizagem**

Adiciona um campo de tempo mínimo aos percursos de aprendizagem. Se o utilizador não tiver despendido esse tempo no percurso de aprendizagem, o último item do percurso não pode ser concluído.

*Default: `false`*

### `lp_prerequisit_on_quiz_unblock_if_max_attempt_reached`

**Desbloquear item do percurso de aprendizagem se o número máximo de tentativas for atingido no teste pré-requisito**

[inferred] Desbloqueia automaticamente os itens seguintes do percurso de aprendizagem quando o formando esgota o número máximo de tentativas de um teste usado como pré-requisito.


### `lp_prerequisite_on_quiz_unblock_if_max_attempt_reached`

**Desbloquear pré-requisitos após a última tentativa do teste**

Permite que os utilizadores continuem num percurso de aprendizagem depois de usarem todas as tentativas de um teste usado como pré-requisito para outros itens.

*Default: `false`*

### `lp_prerequisite_use_last_attempt_only`

**Usar a última pontuação nos pré-requisitos de testes do percurso de aprendizagem**

Quando um teste é usado como pré-requisito para um item no percurso de aprendizagem, usa apenas a última tentativa do teste como validação do pré-requisito (o predefinido é usar a melhor tentativa).

*Default: `false`*

### `lp_prevents_beforeunload`

**Impedir o evento JS beforeunload no percurso de aprendizagem**

Isto ajuda na compatibilidade com o navegador ao impedir a execução de eventos JS problemáticos.

*Default: `false`*

### `lp_score_as_progress_enable`

**Usar a pontuação do percurso de aprendizagem como progresso**

Isto é útil ao usar conteúdo SCORM com apenas um SCO grande. O SCORM não comunica o progresso, pelo que este é um artifício para usar a pontuação como progresso. Ativar esta opção permite configurá-la por percurso de aprendizagem.

*Default: `false`*

### `lp_show_max_progress_instead_of_average`

**Mostrar o progresso máximo em vez da média nos relatórios de percursos de aprendizagem**

[inferred] Calcula o progresso do percurso de aprendizagem com base na conclusão máxima dos itens em vez de fazer a média de todos os itens.

*Default: `false`*

### `lp_show_max_progress_or_average_enable_course_level_redefinition`

**Selecionar progresso máximo vs. média para percursos de aprendizagem ao nível do curso**

Permite redefinir a definição para mostrar o melhor progresso em vez das médias nos relatórios de percursos de aprendizagem ao nível do curso.

*Default: `false`*

### `lp_show_reduced_report`

**Percursos de aprendizagem: mostrar relatório reduzido**

Dentro da ferramenta de percursos de aprendizagem, quando um utilizador consulta o seu próprio progresso (através do ícone de estatísticas), mostra uma versão abreviada (menos detalhada) do relatório de progresso.

*Default: `false`*

### `lp_start_and_end_date_visible_in_student_view`

**Mostrar a disponibilidade do percurso de aprendizagem aos formandos**

Mostra os percursos de aprendizagem aos formandos com as respetivas datas de disponibilidade, em vez de os ocultar até chegar a data.

*Default: `false`*

### `lp_subscription_settings`

**Definições de inscrição em percursos de aprendizagem**

Configura opções adicionais para a funcionalidade de inscrição em percursos de aprendizagem. As opções incluem 'allow_add_users_to_lp' e 'allow_add_users_to_lp_category'.

### `lp_view_accordion`

**Itens dobráveis dos percursos de aprendizagem**

[inferred] Apresenta os itens do percurso de aprendizagem em formato de acordeão expansível para melhorar a navegação e a organização do conteúdo.

*Default: `false`*

### `lp_view_settings`

**Definições de apresentação do percurso de aprendizagem**

Configura opções adicionais para a apresentação dos percursos de aprendizagem. As opções incluem 'show_reporting_icon', 'hide_lp_arrow_navigation', 'show_toolbar_by_default', 'navigation_in_the_middle' e 'add_extra_quit_to_home_icon'.

### `scorm_api_extrafield_to_use_as_student_id`

**Usar campo extra como student\_id na comunicação SCORM**

Indique o nome do campo extra a ser usado como student_id em toda a comunicação SCORM.

### `scorm_api_username_as_student_id`

**Usar o nome de utilizador como student\_id na comunicação SCORM**

[inferred] Usa o nome de utilizador do formando como identificador de estudante na comunicação da API SCORM em vez do ID do formando.

*Default: `false`*

### `scorm_lms_update_sco_status_all_time`

**Atualizar o estado do SCO de forma autónoma**

Se o SCO não estiver a enviar um estado, assume o controlo e atualiza o estado com base no que pode ser observado no Chamilo.

*Default: `false`*

### `scorm_upload_from_cache`

**Carregar SCORM a partir do diretório de cache**

Permite que os administradores carreguem um pacote SCORM (em formato zip) para o diretório de cache e o usem como origem de importação na página de carregamento SCORM.

*Default: `false`*

### `show_hidden_exercise_added_to_lp`

**Mostrar testes dos percursos de aprendizagem mesmo que invisíveis**

Mostra exercícios ocultos que foram adicionados a um LP na lista de exercícios. Se estivermos numa sessão, o teste está invisível no curso base, está incluído num LP e a definição para o mostrar não está especificamente definida como verdadeira, então oculta-o.

*Default: `true`*

### `show_invisible_exercise_in_lp_list`

**Mostrar testes na lista de testes do percurso de aprendizagem mesmo que invisíveis**

[inferred] Inclui testes ocultos na lista de testes disponíveis ao visualizar o conteúdo do percurso de aprendizagem.

*Default: `false`*

### `show_invisible_exercise_in_lp_toc`

**Testes invisíveis visíveis nos percursos de aprendizagem**

Faz com que os testes marcados como «invisíveis» na ferramenta de testes apareçam quando estão incluídos num percurso de aprendizagem.

*Predefinição: `false`*

### `show_invisible_lp_in_course_home`

**Mostrar ligação para o percurso de aprendizagem na página inicial do curso quando invisível**

Se um percurso de aprendizagem estiver definido como invisível, mas o professor/tutor tiver decidido disponibilizá-lo a partir da página inicial do curso, esta opção impede o Chamilo de ocultar a ligação na página inicial do curso.

*Predefinição: `false`*

### `show_prerequisite_as_blocked`

**Pré-requisitos do percurso de aprendizagem**

Nas listas de percursos de aprendizagem, apresenta um elemento visual para indicar que outros percursos de aprendizagem estão atualmente bloqueados por alguma regra de pré-requisitos.

*Predefinição: `false`*

### `student_follow_page_add_lp_acquisition_info`

**Adicionar coluna de aquisição no acompanhamento do formando**

Adiciona uma coluna à página de acompanhamento do formando para mostrar o estado de aquisição de um percurso de aprendizagem por um formando.

*Predefinição: `false`*

### `student_follow_page_add_lp_invisible_checkbox`

**Adicionar informação de visibilidade dos percursos de aprendizagem na página de acompanhamento do formando**

[inferido] Mostra um indicador de estado de visibilidade dos percursos de aprendizagem na página de acompanhamento do progresso do formando.

*Predefinição: `false`*

### `student_follow_page_add_LP_subscription_info`

**Informação de desbloqueio na lista de percursos de aprendizagem**

Isto adiciona uma coluna «desbloqueado» na lista de percursos de aprendizagem se o formando estiver inscrito no percurso de aprendizagem indicado e tiver acesso a ele.

*Predefinição: `false`*

### `student_follow_page_hide_lp_tests_average`

**Ocultar o sinal de percentagem na média dos testes em percursos de aprendizagem no acompanhamento do formando**

Oculta o ícone de percentagem na indicação «Média dos testes em percursos de aprendizagem» no acompanhamento do estudante.

*Predefinição: `false`*

### `student_follow_page_include_not_subscribed_lp_students`

**Incluir percursos de aprendizagem sem inscrição na página de acompanhamento do formando**

[inferido] Mostra percursos de aprendizagem nas páginas de progresso mesmo quando os formandos não estão inscritos neles.

*Predefinição: `false`*

### `ticket_lp_quiz_info_add`

**Adicionar informação de percursos de aprendizagem e testes ao relatório de tickets**

[inferido] Inclui informação de percursos de aprendizagem e testes no relatório de tickets de suporte para um melhor acompanhamento de problemas.

*Predefinição: `false`*

### `validate_lp_prerequisite_from_other_session`

**Utilizar o estado dos itens do percurso de aprendizagem de outras sessões**

Permite que os utilizadores cumpram pré-requisitos num percurso de aprendizagem se o item correspondente já tiver sido concluído noutra sessão.

*Predefinição: `false`*