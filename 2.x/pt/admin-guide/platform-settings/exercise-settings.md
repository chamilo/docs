# Configurações de Exercícios (Testes)

Padrões e comportamento da ferramenta **Exercícios (Testes)** — exibição de perguntas, pontuação, tentativas e similares.

Acesse essas configurações em **Administração > Configurações de configuração > Exercícios (Testes)**. Esta categoria contém **63 configurações**, listadas abaixo com o título e o comentário fornecidos nos arquivos de configurações da plataforma (`SettingsCurrentFixtures.php`).

> O nome da variável no código é mostrado em fonte monoespaçada. Use-o ao criar scripts via API ou quando precisar alterar essas configurações em um nível global editando [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Configurações

### `add_exercise_best_attempt_in_report`

**Habilitar exibição da melhor tentativa de pontuação**

Forneça uma lista de IDs de cursos e testes que mostrarão a melhor tentativa de pontuação de qualquer aluno nos relatórios.

### `allow_coach_feedback_exercises`

**Permitir que tutores comentem na revisão de exercícios**

Permite que tutores editem feedback durante a revisão de exercícios.

*Padrão: `true`*

### `allow_edit_exercise_in_lp`

**Permitir que professores editem testes em trilhas de aprendizagem**

Por padrão, o Chamilo impede a edição de testes que estão incluídos em uma trilha de aprendizagem. Isso evita alterações que afetariam os alunos (passados e futuros) de maneira diferente em relação aos resultados e/ou progresso na trilha de aprendizagem. Esta opção permite que professores ignorem essa restrição.

### `allow_exercise_categories`

**Habilitar categorias de testes**

As categorias de testes não estão habilitadas por padrão, pois adicionam um nível de complexidade. Ative esta funcionalidade para que todos os ícones de gerenciamento relacionados a categorias de testes apareçam.

*Padrão: `false`*

### `allow_mandatory_question_in_category`

**Habilitar seleção de perguntas obrigatórias**

Permite a seleção de perguntas obrigatórias em um teste ao usar categorias aleatórias.

*Padrão: `false`*

### `allow_notification_setting_per_exercise`

**Configurações de notificação de teste no nível do teste**

Habilita a configuração de notificações de envio de testes no nível do teste, em vez de no nível do curso. Retorna às configurações no nível do curso se não estiver definido no nível do teste.

*Padrão: `false`*

### `allow_quick_question_description_popup`

**Adição rápida de imagem à pergunta**

Habilita um ícone adicional na lista de perguntas do teste para adicionar uma imagem como descrição da pergunta. Isso acelera consideravelmente a edição de perguntas quando as perguntas estão no título e a descrição inclui apenas uma imagem.

*Padrão: `false`*

### `allow_quiz_question_feedback`

**Adicionar feedback à pergunta se a resposta estiver incorreta**

Por padrão, o Chamilo permite que você mostre feedback para cada resposta em uma pergunta. Com esta opção, um campo adicional é criado para fornecer feedback predefinido para a pergunta inteira. Esse feedback só aparecerá se o usuário responder incorretamente.

*Padrão: `false`*

### `allow_quiz_results_page_config`

**Habilitar configuração da página de resultados do teste**

Define um array de configurações que você deseja aplicar a todas as páginas de resultados de testes. As configurações podem ser ‘hide_question_score’, ‘hide_expected_answer’, ‘hide_category_table’, ‘hide_correct_answered_questions’, ‘hide_total_score’ e possivelmente mais no futuro. Procure por ‘getPageConfigurationAttribute’ no código para ver o que está em uso.

*Padrão: `false`*

### `allow_quiz_show_previous_button_setting`

**Mostrar botão 'anterior' no teste para navegar pelas perguntas**

Defina como false para desativar o botão 'anterior' ao responder perguntas em um teste, forçando os usuários a sempre avançarem.

*Padrão: `false`*

### `allow_teacher_comment_audio`

**Feedback em áudio para respostas enviadas**

Permite que professores forneçam feedback aos usuários por meio de áudio (alternativamente ao texto) em cada pergunta de um teste.

*Padrão: `true`*

### `allow_time_per_question`

**Habilitar tempo por pergunta em testes**

Por padrão, só é possível limitar o tempo por teste. Limitar por pergunta adiciona uma camada extra de possibilidades, e você pode (com cuidado) combinar ambos.

*Padrão: `false`*

### `block_category_questions`

**Bloquear perguntas de categorias anteriores em um teste**

Ao usar esta opção, uma configuração adicional aparecerá nas configurações do teste. Ao usar um teste com várias categorias de perguntas e solicitar uma distribuição por categoria, isso permitirá que o usuário navegue pelas perguntas por categoria. Uma vez que uma categoria é concluída, ele(a) avança para a próxima categoria e não pode retornar à categoria anterior.

*Padrão: `false`*

### `block_quiz_mail_notification_general_coach`

**Bloquear envio de notificações de teste para o tutor geral**

Os alunos que completam um teste geralmente enviam notificações aos tutores, incluindo o tutor geral da sessão. Habilite esta opção para omitir o tutor geral dessas notificações.

*Padrão: `false`*

---
### `configure_exercise_visibility_in_course`

**Ativar para ignorar a configuração de Exercício invisível em sessão no nível do curso base**

Permite a configuração da invisibilidade de exercícios em sessão no curso base para contornar a configuração global. Se não estiver definido, o parâmetro global será utilizado.

*Padrão: `false`*

### `disable_clean_exercise_results_for_teachers`

**Desativar 'limpar resultados' para professores**

Desativa a opção de excluir resultados de testes da lista de testes. Isso é frequentemente usado quando professores menos cuidadosos gerenciam cursos, para evitar erros críticos.

*Padrão: `true`*

### `email_alert_manager_on_new_quiz`

**Configuração padrão de alerta por e-mail para novo questionário**

Define se os gerentes de curso (professores) devem ser notificados por e-mail quando um questionário é respondido por um aluno. Este é o valor padrão a ser atribuído a todos os novos cursos, mas cada professor ainda pode alterar essa configuração em seu próprio curso.

*Padrão: `true`*

### `enable_quiz_scenario`

**Ativar cenário de questionário**

A partir daqui, você poderá criar exercícios que proponham diferentes perguntas dependendo das respostas do usuário.

*Padrão: `true`*

### `exercise_additional_teacher_modify_actions`

**Links adicionais para professores na lista de testes**

Configura elementos de callback para gerar novos ícones de ação para professores no lado direito da lista de testes, na forma de um array, por exemplo, ['myplugin' => ['MyPlugin', 'urlGeneratorCallback']]

### `exercise_attempts_report_show_username`

**Mostrar nome de usuário na página de resultados de teste**

Mostra o nome de usuário (em vez de, ou além das informações do usuário) na página de resultados de teste.

*Padrão: `false`*

### `exercise_category_report_user_extra_fields`

**Adicionar campos extras de usuário no relatório de categoria de exercício**

Define um array com a lista de campos extras de usuário a serem adicionados ao relatório.

### `exercise_category_round_score_in_export`

**Arredondar pontuação nas exportações de teste**

Quando ativado, as pontuações dos testes são arredondadas para o inteiro mais próximo ao exportar relatórios de exercícios.

*Padrão: `false`*

### `exercise_embeddable_extra_types`

**Tipos de perguntas incorporáveis**

Por padrão, apenas perguntas de resposta única e múltipla escolha são consideradas ao decidir se um teste pode ser incorporado em um vídeo ou não. Com esta opção, você pode decidir que mais tipos de perguntas estejam disponíveis. Esteja ciente de que nem todos os tipos de perguntas se ajustam bem ao espaço destinado aos vídeos. Os tipos de perguntas estão disponíveis no código em question.class.php.

### `exercise_hide_ip`

**Ocultar IP do usuário nos relatórios de teste**

Por padrão, mostramos informações do usuário e seu endereço IP, mas isso pode ser considerado dado pessoal, então esta opção permite remover essa informação de todos os relatórios de teste.

*Padrão: `false`*

### `exercise_hide_label`

**Ocultar faixa de pergunta (correto/errado) nos resultados de teste**

Nos resultados de teste, uma faixa aparece por padrão para indicar se a resposta estava correta ou errada. Ative esta opção para remover a faixa globalmente.

*Padrão: `false`*

### `exercise_invisible_in_session`

**Exercício invisível em Sessão**

Se um exercício estiver visível no curso base, ele aparecerá invisível na sessão. Se um exercício estiver invisível no curso base, ele não aparecerá na sessão.

*Padrão: `false`*

### `exercise_max_editors_in_page`

**Máximo de editores na tela de resultados de exercício**

Devido ao grande número de perguntas que podem aparecer em um exercício, a tela de correção, que permite ao professor adicionar comentários a cada resposta, pode ser muito lenta para carregar. Defina este número como 5 para solicitar que a plataforma mostre apenas editores WYSIWYG até um certo número de respostas na tela. Isso acelerará consideravelmente o tempo de carregamento da página de correção, mas removerá os editores WYSIWYG e deixará apenas um editor de texto simples.

*Padrão: `0`*

### `exercise_max_score`

**Pontuação máxima de exercícios**

Define uma pontuação máxima (geralmente 10, 20 ou 100) para todos os exercícios na plataforma. Isso definirá como os resultados finais são mostrados aos usuários e professores.

*Padrão: `20`*

### `exercise_min_score`

**Pontuação mínima de exercícios**

Define uma pontuação mínima (geralmente 0) para todos os exercícios na plataforma. Isso definirá como os resultados finais são mostrados aos usuários e professores.

*Padrão: `0`*

### `exercise_result_end_text_html_strict_filtering`

**Ignorar filtragem HTML em mensagens de fim de teste**

Considera que as mensagens no final dos testes são sempre seguras. Remover o filtro torna possível usar JavaScript ali.

*Padrão: `false`*

### `exercise_score_format`

**Formato de pontuação de testes**

Selecione entre as seguintes formas para a exibição da pontuação dos usuários em vários relatórios: 1 = SCORE_AVERAGE (5 / 10); 2 = SCORE_PERCENT (50%); 3 = SCORE_DIV_PERCENT (5 / 10 (50%)). Use o ID numérico da forma que deseja utilizar.

*Padrão: `0`*

### `exercises_disable_new_attempts`

**Desativar novas tentativas de teste**

Desativa novas tentativas de teste globalmente. Geralmente usado quando há um problema com testes em geral e você deseja algum tempo para analisar sem bloquear toda a plataforma.

*Padrão: `false`*

---
### `hide_free_question_score`

**Ocultar pontuação de questões abertas**

Oculta o fato de que questões abertas (incluindo áudio e anotações) possuem uma pontuação, escondendo a exibição da pontuação em todos os relatórios voltados para os alunos.

*Padrão: `false`*


### `hide_user_info_in_quiz_result`

**Ocultar informações do usuário na página de resultados do teste**

A página padrão de resultados do teste exibe uma ficha de dados do usuário (foto, nome, etc.), o que, em alguns contextos, pode ser considerado como ultrapassando os limites do tratamento de dados pessoais. Ative esta opção para remover os detalhes do usuário dos resultados do teste.

*Padrão: `false`*


### `limit_exercise_teacher_access`

**Limitar permissões dos professores sobre testes**

Quando ativado, os professores não podem excluir testes ou questões, alterar a visibilidade dos testes, fazer download para QTI, limpar resultados, etc.

*Padrão: `false`*


### `my_courses_show_pending_exercise_attempts`

**Lista global de testes pendentes**

Ative para exibir ao usuário final uma página com a lista de testes pendentes em todos os cursos.

*Padrão: `false`*


### `question_exercise_html_strict_filtering`

**Ignorar filtragem de HTML em questões de teste**

Considere que o texto das questões em testes é sempre seguro. Remover o filtro torna possível usar JavaScript nelas.

*Padrão: `false`*


### `question_pagination_length`

**Comprimento da paginação de questões para professores**

Número de questões a serem exibidas em cada página ao usar a opção de paginação de questões para professores.

*Padrão: `20`*


### `quiz_answer_extra_recording`

**Ativar gravação extra de respostas de teste**

Ativa a gravação de todas as respostas (mesmo temporárias) na tabela track_e_attempt_recording. Esta funcionalidade é experimental e pode causar problemas nas páginas de relatórios ao tentar avaliar um teste.

*Padrão: `false`*


### `quiz_check_all_answers_before_end_test`

**Verificar todas as respostas antes de enviar o teste**

Exibe um popup com a lista de questões respondidas/não respondidas antes de enviar o teste.

*Padrão: `false`*


### `quiz_check_button_enable`

**Adicionar verificação do processo de salvamento de respostas antes do teste**

Garante que os usuários estejam prontos para iniciar o teste, fornecendo uma simulação do processo de salvamento de questões antes de entrar no teste. Isso permite a detecção precoce de alguns problemas de conexão e reduz fricções na experiência do usuário.

*Padrão: `false`*


### `quiz_confirm_saved_answers`

**Adicionar caixa de seleção para confirmação da contagem de respostas**

Esta opção adiciona uma caixa de seleção ao final de cada teste, pedindo ao usuário que confirme o número de respostas salvas. Isso fornece dados de auditoria melhores para testes críticos.

*Padrão: `false`*


### `quiz_discard_orphan_in_course_export`

**Descartar questões órfãs na exportação de curso**

Ao exportar um curso, não exporte as questões que não fazem parte de nenhum teste.

*Padrão: `false`*


### `quiz_generate_certificate_ending`

**Gerar certificado ao finalizar o teste**

Gera um certificado ao finalizar um teste. O teste precisa estar vinculado à ferramenta de livro de notas e ter uma porcentagem de aprovação configurada.

*Padrão: `false`*


### `quiz_hide_attempts_table_on_start_page`

**Ocultar tabela de tentativas na página inicial do teste**

Oculta a tabela que mostra todas as tentativas anteriores na página inicial do teste.

*Padrão: `false`*


### `quiz_hide_question_number`

**Ocultar numeração das questões**

Oculta a numeração incremental das questões ao realizar um teste.

*Padrão: `false`*


### `quiz_image_zoom`

**Ativar zoom em imagens de teste**

Ative esta funcionalidade para permitir que os usuários ampliem imagens usadas nos testes.


### `quiz_keep_alive_ping_interval`

**Manter sessão ativa em testes**

Mantém a sessão ativa enviando um sinal de ping regular ao servidor a cada x segundos, definido aqui. Recomendamos a cada 300 segundos.

*Padrão: `0`*


### `quiz_open_question_decimal_score`

**Pontuação decimal em tipos de questões abertas**

Permite que o professor avalie os tipos de questões abertas, de expressão oral e de anotação com uma pontuação decimal.

*Padrão: `false`*


### `quiz_prevent_copy_paste`

**Bloquear copiar/colar em testes**

Bloqueia as teclas de copiar/colar/salvar/imprimir e cliques com o botão direito em exercícios.

*Padrão: `false`*


### `quiz_question_delete_automatically_when_deleting_exercise`

**Excluir questões automaticamente ao deletar teste**

O comportamento padrão é tornar as questões órfãs quando o único teste que as utiliza é excluído. Quando ativada, esta opção garante que todas as questões que de outra forma se tornariam órfãs também sejam excluídas.

*Padrão: `false`*


### `quiz_results_answers_report`

**Mostrar link para baixar resultados do teste**

Na página de resultados do teste, exibe um link para baixar os resultados como um arquivo.

*Padrão: `false`*


### `quiz_show_description_on_results_page`

**Sempre mostrar descrição do teste na página de resultados**

Quando ativado, a descrição do teste é sempre exibida na página de resultados após a conclusão do teste.

*Padrão: `false`*


### `score_grade_model`

**Modelo de notas por pontuação**

Define um array de faixas de pontuação e cores para exibir relatórios usando este modelo. Isso permite mostrar cores em vez de notas numéricas.

---
### `send_score_in_exam_notification_mail_to_manager`

**Adicionar pontuação na notificação por e-mail de submissão de teste**

Adiciona a pontuação do aluno à notificação por e-mail enviada ao professor após a submissão de um teste.

*Default: `false`*


### `show_exercise_attempts_in_all_user_sessions`

**Mostrar tentativas de teste de todas as sessões no relatório de testes pendentes**

Mostra as tentativas de teste dos usuários em todas as sessões nas quais o treinador geral tem acesso no relatório de testes pendentes.

*Default: `false`*


### `show_exercise_expected_choice`

**Mostrar escolha esperada nos resultados do teste**

Mostra a escolha esperada e um status (correto/errado) para cada resposta na página de resultados do teste (se o teste estiver configurado para mostrar resultados).

*Default: `false`*


### `show_exercise_question_certainty_ribbon_result`

**Mostrar pontuação para perguntas de grau de certeza**

Por padrão, o Chamilo não mostra uma pontuação para os tipos de perguntas de grau de certeza.

*Default: `false`*


### `show_exercise_session_attempts_in_base_course`

**Mostrar tentativas de teste de todas as sessões no curso base**

Mostra as tentativas de teste dos usuários em todas as sessões para o professor no curso base.

*Default: `false`*


### `show_official_code_exercise_result_list`

**Exibir código oficial nos resultados dos exercícios**

Define se o código oficial dos alunos deve ser mostrado nos relatórios de resultados dos exercícios.

*Default: `false`*


### `show_question_id`

**Mostrar IDs das perguntas nos testes**

Mostra os IDs internos das perguntas para permitir que os usuários anotem problemas em perguntas específicas e os relatem de forma mais eficiente.

*Default: `false`*


### `show_question_pagination`

**Mostrar paginação de perguntas para professores**

Para testes com muitas perguntas, usa paginação se o número de perguntas for maior que esta configuração. Defina como 0 para evitar o uso de paginação.

*Default: `100`*


### `tracking_my_progress_show_deleted_exercises`

**Mostrar testes excluídos em 'Meu progresso'**

Ative esta opção para exibir, na página 'Meu progresso', os resultados de todos os testes que você realizou, mesmo os que foram excluídos.

*Default: `false`*