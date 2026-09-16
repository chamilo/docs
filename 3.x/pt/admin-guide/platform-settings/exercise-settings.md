# Configurações de Exercícios (Testes)

Predefinições e comportamento da ferramenta **Exercícios (Testes)** — apresentação das perguntas, pontuação, tentativas e similares.

Aceda a estas configurações em **Administração > Configurações > Exercícios (Testes)**. Esta categoria contém **64 configurações**, listadas abaixo com o título e o comentário fornecidos nas fixtures de configurações da plataforma (`SettingsCurrentFixtures.php`).

> O nome da variável no código é apresentado em monoespaçado. Utilize-o ao automatizar via API ou quando precisar de alterar essas configurações a nível global editando [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Configurações

### `add_exercise_best_attempt_in_report`

**Ativar a apresentação da tentativa com melhor pontuação**

Forneça uma lista de IDs de cursos e testes que mostrarão a tentativa com melhor pontuação de qualquer aluno nos relatórios.

### `allow_coach_feedback_exercises`

**Permitir que os tutores comentem ao rever exercícios**

Permitir que os tutores editem o feedback ao rever exercícios

*Predefinição: `true`*

### `allow_edit_exercise_in_lp`

**Permitir que os professores editem testes em percursos de aprendizagem**

Por predefinição, o Chamilo impede a edição de testes incluídos num percurso de aprendizagem. Isto destina-se a evitar alterações que afetariam os alunos (passados e futuros) de forma diferente relativamente aos resultados e/ou ao progresso no percurso de aprendizagem. Esta opção permite que os professores contornem esta restrição.


### `allow_exercise_categories`

**Ativar categorias de testes**

As categorias de testes não estão ativadas por predefinição porque acrescentam um nível de complexidade. Ative esta funcionalidade para que todos os ícones de gestão relacionados com categorias de testes sejam apresentados.

*Predefinição: `false`*

### `allow_mandatory_question_in_category`

**Ativar a seleção de perguntas obrigatórias**

Ativar a seleção de perguntas obrigatórias num teste quando se utilizam categorias aleatórias.

*Predefinição: `false`*

### `allow_notification_setting_per_exercise`

**Configurações de notificação de testes ao nível do teste**

Ativar a configuração das notificações de submissão de testes ao nível do teste em vez do nível do curso. Recorre às configurações ao nível do curso se não estiverem definidas ao nível do teste.

*Predefinição: `false`*

### `allow_quick_question_description_popup`

**Adição rápida de imagem à pergunta**

Ativar um ícone adicional na lista de perguntas do teste para adicionar uma imagem como descrição da pergunta. Isto acelera consideravelmente a edição das perguntas quando as perguntas estão no título e a descrição inclui apenas uma imagem.

*Predefinição: `false`*

### `allow_quiz_question_feedback`

**Adicionar feedback da pergunta em caso de resposta incorreta**

Por predefinição, o Chamilo permite mostrar feedback em cada resposta de uma pergunta. Com esta opção, é criado um campo adicional para fornecer feedback predefinido à pergunta no seu conjunto. Este feedback só aparecerá se o utilizador tiver respondido incorretamente.

*Predefinição: `false`*

### `allow_quiz_results_page_config`

**Ativar a configuração da página de resultados do teste**

Defina um array de configurações que pretende aplicar a todas as páginas de resultados dos testes. As configurações podem ser ‘hide_question_score’, ‘hide_expected_answer’, ‘hide_category_table’, ‘hide_correct_answered_questions’, ‘hide_total_score’ e possivelmente mais no futuro. Procure ‘getPageConfigurationAttribute’ no código para ver o que está em uso.

*Predefinição: `false`*

### `allow_quiz_show_previous_button_setting`

**Mostrar o botão «anterior» no teste para navegar entre perguntas**

Defina como false para desativar o botão «anterior» ao responder a perguntas num teste, forçando assim os utilizadores a avançar sempre.

*Predefinição: `false`*

### `allow_teacher_comment_audio`

**Feedback em áudio às respostas submetidas**

Permitir que os professores forneçam feedback aos utilizadores através de áudio (em alternativa ao texto) em cada pergunta de um teste.

*Predefinição: `true`*

### `allow_time_per_question`

**Ativar tempo por pergunta nos testes**

Por predefinição, só é possível limitar o tempo por teste. Limitá-lo por pergunta acrescenta uma camada extra de possibilidades, e pode (com cuidado) combinar ambos.

*Predefinição: `false`*

### `block_category_questions`

**Bloquear perguntas de categorias anteriores num teste**

Ao utilizar esta opção, surgirá uma opção adicional na configuração do teste. Ao utilizar um teste com várias categorias de perguntas e solicitar uma distribuição por categoria, isto permitirá ao utilizador navegar pelas perguntas por categoria. Assim que uma categoria estiver concluída, passa para a categoria seguinte e não pode regressar à categoria anterior.

*Predefinição: `false`*

### `block_quiz_mail_notification_general_coach`

**Bloquear o envio de notificações de testes ao tutor geral**

Quando os alunos concluem um teste, as notificações são normalmente enviadas aos tutores, incluindo o tutor geral da sessão. Ative esta opção para omitir o tutor geral destas notificações.

*Predefinição: `false`*

### `configure_exercise_visibility_in_course`

**Ativar para ignorar a configuração de Exercício invisível na sessão ao nível do curso base**

Ativar a configuração da invisibilidade do exercício na sessão no curso base para ignorar a configuração global. Se não estiver definida, é utilizado o parâmetro global.

*Predefinição: `false`*

### `disable_clean_exercise_results_for_teachers`

**Desativar 'limpar resultados' para professores**

Desativa a opção de eliminar resultados de testes na lista de testes. É frequentemente utilizada quando professores menos cuidadosos gerem cursos, para evitar erros críticos.

*Predefinição: `true`*

### `email_alert_manager_on_new_quiz`

**Definição predefinida de alerta por e-mail em novo questionário**

Se pretende que os gestores de curso (professores) sejam notificados por e-mail quando um questionário é respondido por um estudante. Este é o valor predefinido a atribuir a todos os cursos novos, mas cada professor pode ainda alterar esta definição no seu próprio curso.

*Predefinição: `true`*

### `enable_quiz_scenario`

**Ativar cenário de questionário**

A partir daqui poderá criar exercícios que propõem perguntas diferentes consoante as respostas do utilizador.

*Predefinição: `true`*

### `exercise_additional_teacher_modify_actions`

**Ligações adicionais para professores na lista de testes**

Configure elementos de callback para gerar novos ícones de ação para professores no lado direito da lista de testes, na forma de um array, p. ex. ['myplugin' => ['MyPlugin', 'urlGeneratorCallback']]

### `exercise_attempts_report_show_username`

**Mostrar nome de utilizador na página de resultados do teste**

Mostra o nome de utilizador (em vez de, ou juntamente com, as informações do utilizador) na página de resultados do teste.

*Predefinição: `false`*

### `exercise_category_report_user_extra_fields`

**Adicionar campos extra de utilizador no relatório de categoria de exercício**

Defina um array com a lista de campos extra de utilizador a adicionar ao relatório.

### `exercise_category_round_score_in_export`

**Arredondar pontuação nas exportações de testes**

Quando ativado, as pontuações dos testes são arredondadas para o inteiro mais próximo ao exportar relatórios de exercícios.

*Predefinição: `false`*

### `exercise_embeddable_extra_types`

**Tipos de pergunta incorporáveis**

Por predefinição, apenas as perguntas de resposta única e de resposta múltipla são consideradas ao decidir se um teste pode ser incorporado num vídeo ou não. Com esta opção, pode decidir que mais tipos de pergunta estão disponíveis. Tenha em atenção que nem todos os tipos de pergunta se adaptam bem ao espaço atribuído aos vídeos. Os tipos de pergunta estão disponíveis no código em question.class.php.

### `exercise_hide_ip`

**Ocultar IP do utilizador nos relatórios de testes**

Por predefinição, mostramos as informações do utilizador e o respetivo endereço IP, mas isto pode ser considerado dados pessoais, pelo que esta opção permite remover esta informação de todos os relatórios de testes.

*Predefinição: `false`*

### `exercise_hide_label`

**Ocultar faixa da pergunta (certo/errado) nos resultados do teste**

Nos resultados do teste, aparece por predefinição uma faixa para indicar se a resposta estava certa ou errada. Ative esta opção para remover a faixa globalmente.

*Predefinição: `false`*

### `exercise_invisible_in_session`

**Exercício invisível na sessão**

Se um exercício estiver visível no curso base, aparece invisível na sessão. Se um exercício estiver invisível no curso base, não aparece na sessão.

*Predefinição: `false`*

### `exercise_max_editors_in_page`

**Máximo de editores no ecrã de resultados do exercício**

Devido ao elevado número de perguntas que podem aparecer num exercício, o ecrã de correção, que permite ao professor adicionar comentários a cada resposta, pode ser muito lento a carregar. Defina este número como 5 para pedir à plataforma que mostre apenas editores WYSIWYG até um determinado número de respostas no ecrã. Isto acelerará consideravelmente o tempo de carregamento da página de correção, mas removerá os editores WYSIWYG e deixará apenas um editor de texto simples.

*Predefinição: `0`*


### `exercise_max_score`

**Pontuação máxima dos exercícios**

Defina uma pontuação máxima (geralmente 10, 20 ou 100) para todos os exercícios na plataforma. Isto definirá como os resultados finais são apresentados a utilizadores e professores.

*Predefinição: `20`*


### `exercise_min_score`

**Pontuação mínima dos exercícios**

Defina uma pontuação mínima (geralmente 0) para todos os exercícios na plataforma. Isto definirá como os resultados finais são apresentados a utilizadores e professores.

*Predefinição: `0`*


### `exercise_result_end_text_html_strict_filtering`

**Ignorar filtragem HTML nas mensagens de fim de teste**

Considere que as mensagens no fim dos testes são sempre seguras. Remover o filtro torna possível utilizar JavaScript nessas mensagens.

*Predefinição: `false`*


### `exercise_score_format`

**Formato da pontuação dos testes**

Selecione entre as seguintes formas de apresentação da pontuação dos utilizadores em vários relatórios: 1 = SCORE_AVERAGE (5 / 10); 2 = SCORE_PERCENT (50%); 3 = SCORE_DIV_PERCENT (5 / 10 (50%)). Utilize o ID numérico da forma que pretende usar.

*Predefinição: `0`*

### `exercises_disable_new_attempts`

**Desativar novas tentativas de teste**

Desativa globalmente novas tentativas de teste. Normalmente utilizado quando existe um problema com os testes em geral e pretende algum tempo para analisar sem bloquear toda a plataforma.

*Predefinição: `false`*

### `hide_free_question_score`

**Ocultar a pontuação das questões abertas**

Ocultar o facto de as questões abertas (incluindo áudio e anotações) terem pontuação, escondendo a apresentação da pontuação em todos os relatórios visíveis ao aluno.

*Padrão: `false`*


### `hide_user_info_in_quiz_result`

**Ocultar informações do utilizador na página de resultados do teste**

A página de resultados do teste, por predefinição, mostra uma ficha de dados do utilizador (fotografia, nome, etc.) que, em alguns contextos, pode ser considerada como ultrapassando os limites do tratamento de dados pessoais. Ative esta opção para remover os detalhes do utilizador dos resultados do teste.

*Padrão: `false`*


### `limit_exercise_teacher_access`

**Limitar as permissões dos professores sobre os testes**

Quando ativada, os professores não podem eliminar testes nem questões, alterar a visibilidade dos testes, descarregar para QTI, limpar resultados, etc.

*Padrão: `false`*


### `my_courses_show_pending_exercise_attempts`

**Lista global de testes pendentes**

Ative para apresentar ao utilizador final uma página com a lista de testes pendentes em todos os cursos.

*Padrão: `false`*


### `question_exercise_html_strict_filtering`

**Contornar a filtragem HTML nas questões dos testes**

Considere que o texto das questões nos testes é sempre seguro. Remover o filtro torna possível utilizar JavaScript nesse texto.

*Padrão: `false`*


### `question_pagination_length`

**Comprimento da paginação de questões para professores**

Número de questões a mostrar em cada página ao utilizar a opção de paginação de questões para professores.

*Padrão: `20`*


### `quiz_answer_extra_recording`

**Ativar o registo extra de respostas dos testes**

Ativar o registo de todas as respostas (mesmo temporárias) na tabela track_e_attempt_recording. Esta funcionalidade é experimental e pode criar problemas nas páginas de relatórios ao tentar classificar um teste.

*Padrão: `false`*


### `quiz_check_all_answers_before_end_test`

**Verificar todas as respostas antes de submeter o teste**

Apresentar uma janela pop-up com a lista de questões respondidas/não respondidas antes de submeter o teste.

*Padrão: `false`*


### `quiz_check_button_enable`

**Adicionar verificação do processo de gravação de respostas antes do teste**

Garantir que os utilizadores estão prontos para iniciar o teste, fornecendo uma simulação do processo de gravação das questões antes de entrar no teste. Isto permite a deteção precoce de alguns problemas de ligação e reduz fricções na experiência do utilizador.

*Padrão: `false`*


### `quiz_confirm_saved_answers`

**Adicionar caixa de verificação para confirmação da contagem de respostas**

Esta opção adiciona uma caixa de verificação no final de cada teste pedindo ao utilizador que confirme o número de respostas gravadas. Isto fornece melhores dados de auditoria para testes críticos.

*Padrão: `false`*


### `quiz_discard_orphan_in_course_export`

**Descartar questões órfãs na exportação do curso**

Ao exportar um curso, não exportar as questões que não fazem parte de nenhum teste.

*Padrão: `false`*


### `quiz_generate_certificate_ending`

**Gerar certificado no fim do teste**

Gerar certificado ao terminar um questionário. O questionário precisa de estar associado na ferramenta de boletim (gradebook) e ter uma percentagem de aprovação configurada.

*Padrão: `false`*


### `quiz_hide_attempts_table_on_start_page`

**Ocultar a tabela de tentativas na página inicial do teste**

Ocultar a tabela que mostra todas as tentativas anteriores na página inicial do teste.

*Padrão: `false`*


### `quiz_hide_question_number`

**Ocultar o número da questão**

Ocultar a numeração incremental das questões ao realizar um teste.

*Padrão: `false`*


### `quiz_image_zoom`

**Ativar o zoom das imagens nos testes**

Ative esta funcionalidade para permitir que os utilizadores façam zoom nas imagens utilizadas nos testes.

### `quiz_keep_alive_ping_interval`

**Manter a sessão ativa nos testes**

Manter a sessão ativa enviando um sinal de ping regular ao servidor a cada x segundos, definido aqui. Recomendamos uma vez a cada 300 segundos.

*Padrão: `0`*


### `quiz_open_question_decimal_score`

**Pontuação decimal nos tipos de questão aberta**

Permitir que o professor classifique os tipos de questão aberta, expressão oral e anotação com uma pontuação decimal.

*Padrão: `false`*


### `quiz_prevent_copy_paste`

**Bloquear copiar-colar nos testes**

Bloquear as teclas de copiar/colar/guardar/imprimir e os cliques com o botão direito nos exercícios.

*Padrão: `false`*

### `quiz_question_category_destinations` **v3**

**Ativar testes adaptativos progressivos por destino de categoria**

Ativar testes adaptativos progressivos em que cada categoria de questão pode redirecionar os alunos para outra categoria consoante a respetiva pontuação.

*Padrão: `true`*


### `quiz_question_delete_automatically_when_deleting_exercise`

**Eliminar automaticamente as questões ao eliminar o teste**

O comportamento predefinido é tornar as questões órfãs quando o único teste que as utiliza é eliminado. Quando ativada, esta opção garante que todas as questões que de outro modo ficariam órfãs também são eliminadas.

*Padrão: `false`*


### `quiz_results_answers_report`

**Mostrar ligação para descarregar os resultados do teste**

Na página de resultados do teste, apresentar uma ligação para descarregar os resultados como ficheiro.

*Padrão: `false`*


### `quiz_show_description_on_results_page`

**Mostrar sempre a descrição do teste na página de resultados**

Quando ativada, a descrição do teste é sempre apresentada na página de resultados após a conclusão do teste.

*Padrão: `false`*

### `score_grade_model`

**Modelo de notas por pontuação**

Defina um array de intervalos de pontuação e cores para apresentar relatórios com este modelo. Isto permite mostrar cores em vez de notas numéricas.

### `send_score_in_exam_notification_mail_to_manager`

**Incluir a pontuação no e-mail de notificação de submissão de teste**

Adiciona a pontuação do formando à notificação por e-mail enviada ao professor após a submissão de um teste.

*Predefinição: `false`*


### `show_exercise_attempts_in_all_user_sessions`

**Mostrar tentativas de teste de todas as sessões no relatório de testes pendentes**

Mostra as tentativas de teste dos utilizadores em todas as sessões a que o tutor geral tem acesso, no relatório de testes pendentes.

*Predefinição: `false`*


### `show_exercise_expected_choice`

**Mostrar a opção esperada nos resultados do teste**

Mostra a opção esperada e um estado (certo/errado) para cada resposta na página de resultados do teste (se o teste tiver sido configurado para mostrar resultados).

*Predefinição: `false`*


### `show_exercise_question_certainty_ribbon_result`

**Mostrar pontuação para perguntas de grau de certeza**

Por predefinição, o Chamilo não mostra uma pontuação para os tipos de pergunta de grau de certeza.

*Predefinição: `false`*


### `show_exercise_session_attempts_in_base_course`

**Mostrar tentativas de teste de todas as sessões no curso base**

Mostra ao professor, no curso base, as tentativas de teste dos utilizadores em todas as sessões.

*Predefinição: `false`*


### `show_official_code_exercise_result_list`

**Apresentar o código oficial nos resultados dos exercícios**

Indica se o código oficial dos estudantes deve ser mostrado nos relatórios de resultados dos exercícios

*Predefinição: `false`*

### `show_question_id`

**Mostrar IDs das perguntas nos testes**

Mostra os IDs internos das perguntas para que os utilizadores possam anotar problemas em perguntas específicas e reportá-los de forma mais eficiente.

*Predefinição: `false`*


### `show_question_pagination`

**Mostrar paginação de perguntas para professores**

Em testes com muitas perguntas, utiliza paginação se o número de perguntas for superior a esta definição. Defina como 0 para impedir a utilização de paginação.

*Predefinição: `100`*


### `tracking_my_progress_show_deleted_exercises`

**Mostrar testes eliminados em «O meu progresso»**

Ative esta opção para apresentar, na página «O meu progresso», os resultados de todos os testes que realizou, mesmo os que foram eliminados.

*Predefinição: `false`*