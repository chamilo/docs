# Configurações do Livro de Notas (Avaliações)

Padrões aplicados em toda a ferramenta **Livro de Notas (Avaliações)** — exibição de pontuação, precisão decimal, limiares de pontuação para certificados e agregação.

Acesse essas configurações em **Administração > Configurações de configuração > Livro de Notas (Avaliações)**. Esta categoria contém **34 configurações**, listadas abaixo com o título e o comentário fornecidos nos fixtures de configurações da plataforma (`SettingsCurrentFixtures.php`).

> O nome da variável no código é mostrado em monoespaçado. Use-o ao criar scripts via API ou quando precisar alterar essas configurações em nível global editando [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Configurações

### `allow_gradebook_comments`

**Comentários no livro de notas**

Ative os comentários no livro de notas para que os professores possam adicionar um comentário ao desempenho geral do aluno neste curso. O comentário aparecerá na exportação em PDF para o aluno.

*Padrão: `false`*


### `allow_gradebook_stats`

**Colocar resultados em cache no livro de notas**

Coloque alguns dos grandes cálculos de médias em campos em cache para os links e avaliações, a fim de aumentar a velocidade (consideravelmente). O possível impacto negativo é que pode levar algum tempo para atualizar as tabelas de resultados do livro de notas.

*Padrão: `false`*

### `gradebook_badge_sidebar`

**Barra lateral de distintivos do livro de notas**

Gera um bloco no menu lateral onde alguns distintivos podem ser exibidos como pendentes de aprovação. Exige que os livros de notas sejam listados aqui, pelo ID (numérico).

### `gradebook_default_grade_model_id`

**Modelo de nota padrão**

Este valor será selecionado por padrão ao criar um curso

### `gradebook_default_weight`

**Peso padrão no Livro de Notas**

Este peso será usado em todos os cursos por padrão

*Padrão: `100`*

### `gradebook_dependency`

**Dependências entre livros de notas**

Ativa um mecanismo de dependências de livros de notas que permite às pessoas saber quais outros itens precisam percorrer primeiro para concluir o livro de notas.

*Padrão: `false`*


### `gradebook_dependency_mandatory_courses`

**Cursos obrigatórios para dependências de livros de notas**

Ao usar dependências entre livros de notas, você pode escolher uma lista de cursos obrigatórios que serão exigidos antes de aprovar qualquer livro de notas que tenha dependências.

### `gradebook_detailed_admin_view`

**Exibir colunas adicionais no livro de notas**

Exibe colunas adicionais na visualização do aluno do livro de notas com a melhor pontuação de todos os alunos, a posição relativa do aluno que está consultando o relatório e a pontuação média de todo o grupo de alunos.

*Padrão: `false`*


### `gradebook_display_extra_stats`

**Estatísticas extras do livro de notas**

Adiciona colunas adicionais ao relatório principal do livro de notas (1 = classificação, 2 = melhor pontuação, 3 = média).

### `gradebook_enable`

**Ativação da ferramenta Avaliações**

A ferramenta Avaliações permite avaliar competências em sua organização, reunindo avaliações de atividades presenciais e on-line em relatórios de desempenho. Deseja ativá-la?

*Padrão: `true`*


### `gradebook_enable_grade_model`

**Ativar modelo de livro de notas**

Ativa a criação automática de categorias de livro de notas dentro de um curso, de acordo com os modelos de livro de notas.

*Padrão: `false`*

### `gradebook_enable_subcategory_skills_independant_assignement`

**Ativar competências por subcategoria do livro de notas**

As competências normalmente são atribuídas pela conclusão de um livro de notas inteiro. Ao ativar esta opção, você permite que competências sejam vinculadas a subseções dos livros de notas.

*Padrão: `false`*


### `gradebook_flatview_extrafields_columns`

**Campos extras do usuário na visualização plana do livro de notas**

Adiciona as colunas informadas (array 'variables') à tabela principal de resultados no livro de notas.

### `gradebook_hide_graph`

**Ocultar gráficos do livro de notas**

Se o seu portal tiver recursos limitados, reduzir a geração dos gráficos dinâmicos do livro de notas, com potencialmente milhares de resultados, é uma boa opção.

*Padrão: `false`*


### `gradebook_hide_link_to_item_for_student`

**Ocultar links de itens para alunos no livro de notas**

Evita que os alunos cliquem nos itens a partir do livro de notas, removendo os links dos itens.

*Padrão: `false`*


### `gradebook_hide_pdf_report_button`

**Ocultar o botão 'baixar relatório em PDF' do livro de notas**

Remove o botão de exportação em PDF das visualizações do livro de notas para os alunos.

*Padrão: `false`*


### `gradebook_hide_table`

**Ocultar a tabela do livro de notas para os alunos**

Reduz o tempo de carregamento do livro de notas ocultando a tabela de resultados (mas ainda permitindo acesso a certificados, competências etc.).

*Padrão: `false`*

### `gradebook_locking_enabled`

**Habilitar o bloqueio de avaliações pelos professores**

Uma vez habilitada, esta opção permitirá o bloqueio de qualquer avaliação pelos professores do curso correspondente. Isso, por sua vez, impedirá qualquer alteração de resultados pelo professor nos recursos utilizados na avaliação: exames, percursos de aprendizagem, tarefas etc. O único papel autorizado a desbloquear uma avaliação bloqueada é o administrador. O professor será informado dessa possibilidade. O bloqueio e o desbloqueio de boletins de notas serão registrados no relatório de atividades importantes do sistema

*Padrão: `false`*

### `gradebook_multiple_evaluation_attempts`

**Permitir várias tentativas de avaliação no boletim de notas**

Permite adicionar comentários a várias tentativas de avaliação no boletim de notas e nas tabelas de resultados.

*Padrão: `false`*


### `gradebook_number_decimals`

**Número de casas decimais**

Permite definir o número de casas decimais permitidas em uma pontuação

*Padrão: `0`*

### `gradebook_pdf_export_settings`

**Opções de exportação PDF do boletim de notas**

Altera a exportação PDF para os alunos com base nas configurações fornecidas ('hide_score_weight', 'hide_feedback_textarea', ...)

### `gradebook_report_score_style`

**Estilo de pontuação dos relatórios do boletim de notas**

Adiciona a configuração de estilo de pontuação do boletim de notas na visualização plana. Consulte api.lib.php para encontrar as opções: exemplos SCORE_DIV = 1, SCORE_PERCENT = 2 etc.

*Padrão: `1`*


### `gradebook_score_display_colorsplit`

**Limiar**

O limiar (em %) abaixo do qual as pontuações serão coloridas em vermelho

*Padrão: `50`*


### `gradebook_score_display_custom`

**Rotulagem de níveis de competência**

Marque a caixa para habilitar a rotulagem de níveis de competência

*Padrão: `false`*


### `gradebook_score_display_custom_standalone`

**Exibição personalizada de pontuação na coluna independente do boletim de notas**

Exibe valores personalizados de nível de competência em uma coluna separada na visualização plana do boletim de notas ao usar a exibição personalizada de pontuação.

*Padrão: `false`*


### `gradebook_score_display_upperlimit`

**Exibir o limite superior da pontuação**

Marque a caixa para mostrar o limite superior da pontuação

*Padrão: `false`*


### `gradebook_use_apcu_cache`

**Usar cache APCu para acelerar o boletim de notas**

Melhora a velocidade na renderização dos relatórios de alunos do boletim de notas usando o cache Doctrine APCU. O APCu é uma extensão PHP opcional, mas recomendada.

*Padrão: `true`*


### `gradebook_use_exercise_score_settings_in_categories`

**Usar as configurações de teste para a exibição das notas**

Aplica as configurações de exibição de pontuação dos exercícios (porcentagem vs. pontos) às pontuações das categorias no boletim de notas.

*Padrão: `true`*


### `gradebook_use_exercise_score_settings_in_total`

**Usar a configuração global de exibição de pontuação no boletim de notas**

Aplica as configurações globais de exibição de pontuação dos exercícios aos cálculos da pontuação total no boletim de notas.

*Padrão: `false`*


### `hide_gradebook_percentage_user_result`

**Ocultar a porcentagem nos resultados de melhor/média do boletim de notas**

Remove a exibição de porcentagem dos resultados de melhor/média de pontuação mostrados aos alunos no boletim de notas.

*Padrão: `true`*


### `my_display_coloring`

**Exibir cores para as pontuações no boletim de notas**

Habilita a codificação por cores para melhor visibilidade das pontuações no boletim de notas.

*Padrão: `false`*


### `student_publication_to_take_in_gradebook`

**Tarefa considerada para o boletim de notas**

Na ferramenta de tarefas, os alunos podem enviar mais de um arquivo. Caso haja mais de um para uma mesma tarefa, qual deve ser considerado ao classificá-los no boletim de notas? Isso depende da sua metodologia. Use 'first' para enfatizar a atenção aos detalhes (como entregar no prazo e entregar o trabalho correto primeiro). Use 'last' para destacar o trabalho colaborativo e adaptativo.

*Padrão: `first`*


### `teachers_can_change_grade_model_settings`

**Os professores podem alterar as configurações do modelo do boletim de notas**

Ao editar um boletim de notas

*Padrão: `true`*


### `teachers_can_change_score_settings`

**Os professores podem alterar as configurações de pontuação do boletim de notas**

Ao editar as configurações do boletim de notas

*Padrão: `true`*