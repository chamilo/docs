# Configurações de Exercícios (Testes)

Padrões e comportamento da ferramenta **Exercícios (Testes)** — exibição de questões, pontuação, tentativas e similares.

Acesse estas configurações em **Administração > Configurações > Exercícios (Testes)**. Esta categoria contém **64 configurações**, listadas abaixo com o título e o comentário fornecidos nos fixtures de configurações da plataforma (`SettingsCurrentFixtures.php`).

> O nome da variável no código é mostrado em monoespaçado. Use-o ao automatizar via API ou quando precisar alterar essas configurações em nível global editando [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Configurações

### `add_exercise_best_attempt_in_report`

**Ativar exibição da tentativa com melhor pontuação**

Forneça uma lista de IDs de cursos e testes que exibirão a tentativa com melhor pontuação de qualquer aluno nos relatórios.

### `allow_coach_feedback_exercises`

**Permitir que tutores comentem ao revisar exercícios**

Permitir que tutores editem o feedback ao revisar exercícios

*Padrão: `true`*

### `allow_edit_exercise_in_lp`

**Permitir que professores editem testes em percursos de aprendizagem**

Por padrão, o Chamilo impede a edição de testes incluídos em um percurso de aprendizagem. Isso evita alterações que afetariam os alunos (passados e futuros) de forma diferente em relação aos resultados e/ou ao progresso no percurso. Esta opção permite que os professores ignorem essa restrição.


### `allow_exercise_categories`

**Ativar categorias de testes**

As categorias de testes não estão ativadas por padrão porque adicionam um nível de complexidade. Ative este recurso para que todos os ícones de gerenciamento relacionados a categorias de testes sejam exibidos.

*Padrão: `false`*

### `allow_mandatory_question_in_category`

**Ativar seleção de questões obrigatórias**

Ativar a seleção de questões obrigatórias em um teste ao usar categorias aleatórias.

*Padrão: `false`*

### `allow_notification_setting_per_exercise`

**Configurações de notificação de teste no nível do teste**

Ativar a configuração de notificações de envio de teste no nível do teste, em vez do nível do curso. Recorre às configurações do curso se não estiver definido no nível do teste.

*Padrão: `false`*

### `allow_quick_question_description_popup`

**Adição rápida de imagem à questão**

Ativar um ícone adicional na lista de questões do teste para adicionar uma imagem como descrição da questão. Isso acelera bastante a edição quando as questões estão no título e a descrição inclui apenas uma imagem.

*Padrão: `false`*

### `allow_quiz_question_feedback`

**Adicionar feedback da questão se a resposta estiver incorreta**

Por padrão, o Chamilo permite exibir feedback em cada resposta de uma questão. Com esta opção, um campo adicional é criado para fornecer feedback predefinido para a questão inteira. Este feedback aparecerá apenas se o usuário responder incorretamente.

*Padrão: `false`*

### `allow_quiz_results_page_config`

**Ativar configuração da página de resultados do teste**

Defina um array de configurações a aplicar a todas as páginas de resultados de testes. As configurações podem ser ‘hide_question_score’, ‘hide_expected_answer’, ‘hide_category_table’, ‘hide_correct_answered_questions’, ‘hide_total_score’ e possivelmente mais no futuro. Procure ‘getPageConfigurationAttribute’ no código para ver o que está em uso.

*Padrão: `false`*

### `allow_quiz_show_previous_button_setting`

**Exibir o botão 'anterior' no teste para navegar entre questões**

Defina como false para desativar o botão 'anterior' ao responder questões em um teste, forçando os usuários a sempre avançar.

*Padrão: `false`*

### `allow_teacher_comment_audio`

**Feedback em áudio para respostas enviadas**

Permitir que professores forneçam feedback aos usuários por áudio (alternativamente ao texto) em cada questão de um teste.

*Padrão: `true`*

### `allow_time_per_question`

**Ativar tempo por questão nos testes**

Por padrão, só é possível limitar o tempo por teste. Limitá-lo por questão adiciona uma camada extra de possibilidades, e você pode (com cuidado) combinar ambos.

*Padrão: `false`*

### `block_category_questions`

**Bloquear questões de categorias anteriores em um teste**

Ao usar esta opção, uma opção adicional aparecerá na configuração do teste. Ao usar um teste com várias categorias de questões e solicitar distribuição por categoria, isso permitirá que o usuário navegue pelas questões por categoria. Quando uma categoria é concluída, ele(a) passa para a próxima e não pode retornar à categoria anterior.

*Padrão: `false`*

### `block_quiz_mail_notification_general_coach`

**Bloquear o envio de notificações de teste ao tutor geral**

Quando os alunos concluem um teste, as notificações costumam ser enviadas aos tutores, incluindo o tutor geral da sessão. Ative esta opção para omitir o tutor geral dessas notificações.

*Padrão: `false`*

### `configure_exercise_visibility_in_course`

**Habilitar para ignorar a configuração de Exercício invisível na sessão no nível do curso base**

Habilitar a configuração da invisibilidade do exercício na sessão no curso base para ignorar a configuração global. Se não for definida, o parâmetro global é utilizado.

*Padrão: `false`*

### `disable_clean_exercise_results_for_teachers`

**Desabilitar 'limpar resultados' para professores**

Desabilita a opção de excluir resultados de testes da lista de testes. Frequentemente utilizada quando professores menos cuidadosos gerenciam cursos, para evitar erros críticos.

*Padrão: `true`*

### `email_alert_manager_on_new_quiz`

**Configuração padrão de alerta por e-mail em novo questionário**

Se você deseja que os gestores do curso (professores) sejam notificados por e-mail quando um questionário for respondido por um aluno. Este é o valor padrão a ser atribuído a todos os novos cursos, mas cada professor ainda pode alterar esta configuração em seu próprio curso.

*Padrão: `true`*

### `enable_quiz_scenario`

**Habilitar cenário de questionário**

A partir daqui você poderá criar exercícios que propõem perguntas diferentes dependendo das respostas do usuário.

*Padrão: `true`*

### `exercise_additional_teacher_modify_actions`

**Links adicionais para professores na lista de testes**

Configure elementos de callback para gerar novos ícones de ação para professores no lado direito da lista de testes, na forma de um array, p. ex. ['myplugin' => ['MyPlugin', 'urlGeneratorCallback']]

### `exercise_attempts_report_show_username`

**Exibir nome de usuário na página de resultados do teste**

Exibe o nome de usuário (em vez de, ou além das, informações do usuário) na página de resultados do teste.

*Padrão: `false`*

### `exercise_category_report_user_extra_fields`

**Adicionar campos extras de usuário no relatório de categoria de exercício**

Defina um array com a lista de campos extras de usuário a adicionar ao relatório.

### `exercise_category_round_score_in_export`

**Arredondar pontuação nas exportações de testes**

Quando habilitado, as pontuações dos testes são arredondadas para o inteiro mais próximo ao exportar relatórios de exercícios.

*Padrão: `false`*

### `exercise_embeddable_extra_types`

**Tipos de pergunta incorporáveis**

Por padrão, apenas perguntas de resposta única e de múltipla escolha são consideradas ao decidir se um teste pode ser incorporado em um vídeo ou não. Com esta opção, você pode decidir que mais tipos de pergunta estejam disponíveis. Esteja ciente de que nem todos os tipos de pergunta se encaixam bem no espaço atribuído aos vídeos. Os tipos de pergunta estão disponíveis no código em question.class.php.

### `exercise_hide_ip`

**Ocultar IP do usuário dos relatórios de teste**

Por padrão, exibimos as informações do usuário e seu endereço IP, mas isso pode ser considerado dado pessoal, portanto esta opção permite remover essa informação de todos os relatórios de teste.

*Padrão: `false`*

### `exercise_hide_label`

**Ocultar faixa da pergunta (certo/errado) nos resultados do teste**

Nos resultados do teste, uma faixa aparece por padrão para indicar se a resposta estava certa ou errada. Habilite esta opção para remover a faixa globalmente.

*Padrão: `false`*

### `exercise_invisible_in_session`

**Exercício invisível na Sessão**

Se um exercício estiver visível no curso base, então ele aparece invisível na sessão. Se um exercício estiver invisível no curso base, então ele não aparece na sessão.

*Padrão: `false`*

### `exercise_max_editors_in_page`

**Máximo de editores na tela de resultado do exercício**

Devido ao grande número de perguntas que podem aparecer em um exercício, a tela de correção, que permite ao professor adicionar comentários a cada resposta, pode ser muito lenta para carregar. Defina este número como 5 para solicitar à plataforma que mostre editores WYSIWYG apenas até um determinado número de respostas na tela. Isso acelerará consideravelmente o tempo de carregamento da página de correção, mas removerá os editores WYSIWYG e deixará apenas um editor de texto simples.

*Padrão: `0`*


### `exercise_max_score`

**Pontuação máxima dos exercícios**

Defina uma pontuação máxima (geralmente 10, 20 ou 100) para todos os exercícios da plataforma. Isso definirá como os resultados finais são exibidos para usuários e professores.

*Padrão: `20`*


### `exercise_min_score`

**Pontuação mínima dos exercícios**

Defina uma pontuação mínima (geralmente 0) para todos os exercícios da plataforma. Isso definirá como os resultados finais são exibidos para usuários e professores.

*Padrão: `0`*


### `exercise_result_end_text_html_strict_filtering`

**Ignorar filtragem HTML nas mensagens de fim de teste**

Considere que as mensagens no final dos testes são sempre seguras. Remover o filtro torna possível usar JavaScript nelas.

*Padrão: `false`*


### `exercise_score_format`

**Formato da pontuação dos testes**

Selecione entre as seguintes formas para a exibição da pontuação dos usuários em vários relatórios: 1 = SCORE_AVERAGE (5 / 10); 2 = SCORE_PERCENT (50%); 3 = SCORE_DIV_PERCENT (5 / 10 (50%)). Use o ID numérico da forma que deseja utilizar.

*Padrão: `0`*

### `exercises_disable_new_attempts`

**Desabilitar novas tentativas de teste**

Desabilita novas tentativas de teste globalmente. Geralmente utilizado quando há um problema com os testes em geral e você deseja algum tempo para analisar sem bloquear toda a plataforma.

*Padrão: `false`*

### `hide_free_question_score`

**Ocultar pontuação das questões abertas**

Oculta o fato de que as questões abertas (incluindo áudio e anotações) têm pontuação, escondendo a exibição da pontuação em todos os relatórios visíveis ao aluno.

*Padrão: `false`*


### `hide_user_info_in_quiz_result`

**Ocultar informações do usuário na página de resultados do teste**

A página padrão de resultados do teste exibe uma ficha do usuário (foto, nome etc.) que, em alguns contextos, pode ser considerada como ultrapassando os limites do tratamento de dados pessoais. Ative esta opção para remover os detalhes do usuário dos resultados do teste.

*Padrão: `false`*


### `limit_exercise_teacher_access`

**Limitar as permissões dos professores sobre os testes**

Quando ativada, os professores não podem excluir testes nem questões, alterar a visibilidade dos testes, baixar para QTI, limpar resultados etc.

*Padrão: `false`*


### `my_courses_show_pending_exercise_attempts`

**Lista global de testes pendentes**

Ative para exibir ao usuário final uma página com a lista de testes pendentes em todos os cursos.

*Padrão: `false`*


### `question_exercise_html_strict_filtering`

**Ignorar filtragem HTML nas questões dos testes**

Considere que o texto das questões nos testes é sempre seguro. Remover o filtro torna possível o uso de JavaScript nesse conteúdo.

*Padrão: `false`*


### `question_pagination_length`

**Tamanho da paginação de questões para professores**

Número de questões a exibir em cada página ao usar a opção de paginação de questões para professores.

*Padrão: `20`*


### `quiz_answer_extra_recording`

**Ativar gravação extra de respostas dos testes**

Ativa a gravação de todas as respostas (mesmo as temporárias) na tabela track_e_attempt_recording. Este recurso é experimental e pode gerar problemas nas páginas de relatórios ao tentar avaliar um teste.

*Padrão: `false`*


### `quiz_check_all_answers_before_end_test`

**Verificar todas as respostas antes de enviar o teste**

Exibe um popup com a lista de questões respondidas/não respondidas antes de enviar o teste.

*Padrão: `false`*


### `quiz_check_button_enable`

**Adicionar verificação do processo de salvamento de respostas antes do teste**

Garante que os usuários estejam prontos para iniciar o teste, oferecendo uma simulação do processo de salvamento das questões antes de entrar no teste. Isso permite a detecção precoce de alguns problemas de conexão e reduz atritos na experiência do usuário.

*Padrão: `false`*


### `quiz_confirm_saved_answers`

**Adicionar caixa de seleção para confirmação da quantidade de respostas**

Esta opção adiciona uma caixa de seleção no final de cada teste pedindo ao usuário que confirme o número de respostas salvas. Isso fornece dados de auditoria melhores para testes críticos.

*Padrão: `false`*


### `quiz_discard_orphan_in_course_export`

**Descartar questões órfãs na exportação do curso**

Ao exportar um curso, não exportar as questões que não fazem parte de nenhum teste.

*Padrão: `false`*


### `quiz_generate_certificate_ending`

**Gerar certificado ao finalizar o teste**

Gera o certificado ao encerrar um quiz. O quiz precisa estar vinculado na ferramenta de boletim (gradebook) e ter um percentual de aprovação configurado.

*Padrão: `false`*


### `quiz_hide_attempts_table_on_start_page`

**Ocultar tabela de tentativas na página inicial do teste**

Oculta a tabela que mostra todas as tentativas anteriores na página inicial do teste.

*Padrão: `false`*


### `quiz_hide_question_number`

**Ocultar número da questão**

Oculta a numeração incremental das questões ao realizar um teste.

*Padrão: `false`*


### `quiz_image_zoom`

**Ativar zoom em imagens dos testes**

Ative este recurso para permitir que os usuários ampliem as imagens usadas nos testes.

### `quiz_keep_alive_ping_interval`

**Manter a sessão ativa nos testes**

Mantém a sessão ativa enviando um sinal de ping regular ao servidor a cada x segundos, definido aqui. Recomendamos uma vez a cada 300 segundos.

*Padrão: `0`*


### `quiz_open_question_decimal_score`

**Pontuação decimal em tipos de questão aberta**

Permite que o professor avalie os tipos de questão aberta, expressão oral e anotação com uma pontuação decimal.

*Padrão: `false`*


### `quiz_prevent_copy_paste`

**Bloquear copiar e colar nos testes**

Bloqueia as teclas de copiar/colar/salvar/imprimir e os cliques com o botão direito nos exercícios.

*Padrão: `false`*

### `quiz_question_category_destinations` **v3**

**Ativar testes adaptativos progressivos por destino de categoria**

Ativa testes adaptativos progressivos em que cada categoria de questão pode redirecionar os alunos para outra categoria conforme a pontuação.

*Padrão: `true`*


### `quiz_question_delete_automatically_when_deleting_exercise`

**Excluir automaticamente as questões ao excluir o teste**

O comportamento padrão é tornar as questões órfãs quando o único teste que as utiliza é excluído. Quando ativada, esta opção garante que todas as questões que, de outro modo, se tornariam órfãs também sejam excluídas.

*Padrão: `false`*


### `quiz_results_answers_report`

**Exibir link para baixar os resultados do teste**

Na página de resultados do teste, exibe um link para baixar os resultados como arquivo.

*Padrão: `false`*


### `quiz_show_description_on_results_page`

**Sempre exibir a descrição do teste na página de resultados**

Quando ativada, a descrição do teste é sempre exibida na página de resultados após a conclusão do teste.

*Padrão: `false`*

### `score_grade_model`

**Modelo de faixas de pontuação**

Defina um array de faixas de pontuação e cores para exibir relatórios usando este modelo. Isso permite mostrar cores em vez de notas numéricas.

### `send_score_in_exam_notification_mail_to_manager`

**Incluir pontuação no e-mail de notificação de envio de teste**

Adiciona a pontuação do aluno à notificação por e-mail enviada ao professor após o envio de um teste.

*Padrão: `false`*


### `show_exercise_attempts_in_all_user_sessions`

**Mostrar tentativas de teste de todas as sessões no relatório de testes pendentes**

Mostra as tentativas de teste dos usuários em todas as sessões às quais o tutor geral tem acesso no relatório de testes pendentes.

*Padrão: `false`*


### `show_exercise_expected_choice`

**Mostrar a escolha esperada nos resultados do teste**

Mostra a escolha esperada e um status (certo/errado) para cada resposta na página de resultados do teste (se o teste tiver sido configurado para mostrar resultados).

*Padrão: `false`*


### `show_exercise_question_certainty_ribbon_result`

**Mostrar pontuação para questões de grau de certeza**

Por padrão, o Chamilo não mostra uma pontuação para os tipos de questão de grau de certeza.

*Padrão: `false`*


### `show_exercise_session_attempts_in_base_course`

**Mostrar tentativas de teste de todas as sessões no curso base**

Mostra ao professor, no curso base, as tentativas de teste dos usuários em todas as sessões.

*Padrão: `false`*


### `show_official_code_exercise_result_list`

**Exibir código oficial nos resultados dos exercícios**

Define se o código oficial dos alunos deve ser mostrado nos relatórios de resultados dos exercícios

*Padrão: `false`*

### `show_question_id`

**Mostrar IDs das questões nos testes**

Mostra os IDs internos das questões para que os usuários possam anotar problemas em questões específicas e relatá-los de forma mais eficiente.

*Padrão: `false`*


### `show_question_pagination`

**Mostrar paginação de questões para professores**

Para testes com muitas questões, usa paginação se o número de questões for maior que este valor. Defina como 0 para impedir o uso de paginação.

*Padrão: `100`*


### `tracking_my_progress_show_deleted_exercises`

**Mostrar testes excluídos em 'Meu progresso'**

Ative esta opção para exibir, na página 'Meu progresso', os resultados de todos os testes que você realizou, inclusive os que foram excluídos.

*Padrão: `false`*