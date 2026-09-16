# Definições do Livro de notas (Avaliações)

Predefinições aplicadas em toda a ferramenta **Livro de notas (Avaliações)** — apresentação de pontuações, precisão decimal, limiares de pontuação para certificados e agregação.

Aceda a estas definições em **Administração > Definições de configuração > Livro de notas (Avaliações)**. Esta categoria contém **34 definições**, listadas abaixo com o título e o comentário fornecidos nas fixtures de definições da plataforma (`SettingsCurrentFixtures.php`).

> O nome da variável no código é apresentado em monoespaçado. Utilize-o ao criar scripts via API ou quando precisar de alterar essas definições a nível global editando [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Definições

### `allow_gradebook_comments`

**Comentários no livro de notas**

Ative os comentários no livro de notas para que os professores possam acrescentar um comentário ao desempenho global do formando neste curso. O comentário aparecerá na exportação PDF para o formando.

*Predefinição: `false`*


### `allow_gradebook_stats`

**Colocar resultados em cache no livro de notas**

Coloque alguns dos cálculos extensos de médias em campos em cache para as ligações e avaliações, a fim de aumentar a velocidade (consideravelmente). O potencial impacto negativo é que pode demorar algum tempo a atualizar as tabelas de resultados do livro de notas.

*Predefinição: `false`*

### `gradebook_badge_sidebar`

**Barra lateral de distintivos do livro de notas**

Gera um bloco no menu lateral onde alguns distintivos podem ser apresentados como pendentes de aprovação. Requer que os livros de notas sejam listados aqui, pelo ID (numérico).

### `gradebook_default_grade_model_id`

**Modelo de classificação predefinido**

Este valor será selecionado por predefinição ao criar um curso

### `gradebook_default_weight`

**Peso predefinido no Livro de notas**

Este peso será utilizado em todos os cursos por predefinição

*Predefinição: `100`*

### `gradebook_dependency`

**Dependências entre livros de notas**

Ativa um mecanismo de dependências entre livros de notas que permite às pessoas saber quais outros itens precisam de percorrer primeiro para concluir o livro de notas.

*Predefinição: `false`*


### `gradebook_dependency_mandatory_courses`

**Cursos obrigatórios para dependências do livro de notas**

Ao utilizar dependências entre livros de notas, pode escolher uma lista de cursos obrigatórios que serão exigidos antes de aprovar qualquer livro de notas que tenha dependências.

### `gradebook_detailed_admin_view`

**Mostrar colunas adicionais no livro de notas**

Mostra colunas adicionais na vista do estudante do livro de notas com a melhor pontuação de todos os estudantes, a posição relativa do estudante que consulta o relatório e a pontuação média de todo o grupo de estudantes.

*Predefinição: `false`*


### `gradebook_display_extra_stats`

**Estatísticas extra do livro de notas**

Adiciona colunas adicionais ao relatório principal do livro de notas (1 = classificação, 2 = melhor pontuação, 3 = média).

### `gradebook_enable`

**Ativação da ferramenta Avaliações**

A ferramenta Avaliações permite avaliar competências na sua organização, reunindo avaliações de atividades presenciais e em linha em relatórios de desempenho. Pretende ativá-la?

*Predefinição: `true`*


### `gradebook_enable_grade_model`

**Ativar modelo de Livro de notas**

Ativa a criação automática de categorias de livro de notas dentro de um curso consoante os modelos de livro de notas.

*Predefinição: `false`*

### `gradebook_enable_subcategory_skills_independant_assignement`

**Ativar competências por subcategoria do livro de notas**

As competências são normalmente atribuídas pela conclusão de um livro de notas completo. Ao ativar esta opção, permite que as competências sejam associadas a subsecções dos livros de notas.

*Predefinição: `false`*


### `gradebook_flatview_extrafields_columns`

**Campos extra de utilizador na vista plana do livro de notas**

Adiciona as colunas indicadas (array 'variables') à tabela principal de resultados no livro de notas.

### `gradebook_hide_graph`

**Ocultar gráficos do livro de notas**

Se o seu portal tiver recursos limitados, reduzir a geração dos gráficos dinâmicos do livro de notas com potencialmente milhares de resultados é uma boa opção.

*Predefinição: `false`*


### `gradebook_hide_link_to_item_for_student`

**Ocultar ligações de itens para formandos no livro de notas**

Evita que os formandos cliquem nos itens a partir do livro de notas, removendo as ligações nos itens.

*Predefinição: `false`*


### `gradebook_hide_pdf_report_button`

**Ocultar o botão «descarregar relatório PDF» do livro de notas**

Remove o botão de exportação PDF das vistas do livro de notas para os formandos.

*Predefinição: `false`*


### `gradebook_hide_table`

**Ocultar a tabela do livro de notas para os formandos**

Reduz o tempo de carregamento do livro de notas ao ocultar a tabela de resultados (mantendo, ainda assim, o acesso a certificados, competências, etc.).

*Predefinição: `false`*

### `gradebook_locking_enabled`

**Ativar o bloqueio de avaliações pelos professores**

Uma vez ativada, esta opção permitirá o bloqueio de qualquer avaliação pelos professores do curso correspondente. Isto, por sua vez, impedirá qualquer alteração de resultados pelo professor nos recursos utilizados na avaliação: exames, percursos de aprendizagem, tarefas, etc. O único papel autorizado a desbloquear uma avaliação bloqueada é o administrador. O professor será informado desta possibilidade. O bloqueio e o desbloqueio dos boletins serão registados no relatório de atividades importantes do sistema

*Default: `false`*

### `gradebook_multiple_evaluation_attempts`

**Permitir múltiplas tentativas de avaliação no boletim**

Permite adicionar comentários a múltiplas tentativas de avaliação no boletim e nas tabelas de resultados.

*Default: `false`*


### `gradebook_number_decimals`

**Número de casas decimais**

Permite definir o número de casas decimais permitidas numa pontuação

*Default: `0`*

### `gradebook_pdf_export_settings`

**Opções de exportação PDF do boletim**

Altera a exportação PDF para os formandos com base nas definições fornecidas ('hide_score_weight', 'hide_feedback_textarea', ...)

### `gradebook_report_score_style`

**Estilo de pontuação dos relatórios do boletim**

Adiciona a configuração de estilo de pontuação do boletim na vista plana. Consulte api.lib.php para encontrar as opções: exemplos SCORE_DIV = 1, SCORE_PERCENT = 2, etc

*Default: `1`*


### `gradebook_score_display_colorsplit`

**Limiar**

O limiar (em %) abaixo do qual as pontuações serão coloridas a vermelho

*Default: `50`*


### `gradebook_score_display_custom`

**Etiquetagem de níveis de competência**

Marque a caixa para ativar a etiquetagem de níveis de competência

*Default: `false`*


### `gradebook_score_display_custom_standalone`

**Apresentação personalizada de pontuação na coluna independente do boletim**

Mostra valores personalizados de nível de competência numa coluna separada na vista plana do boletim quando se utiliza a apresentação personalizada de pontuação.

*Default: `false`*


### `gradebook_score_display_upperlimit`

**Mostrar o limite superior da pontuação**

Marque a caixa para mostrar o limite superior da pontuação

*Default: `false`*


### `gradebook_use_apcu_cache`

**Utilizar cache APCu para acelerar o boletim**

Melhora a velocidade na apresentação dos relatórios de alunos do boletim utilizando a cache Doctrine APCU. O APCu é uma extensão PHP opcional, mas recomendada.

*Default: `true`*


### `gradebook_use_exercise_score_settings_in_categories`

**Utilizar as definições dos testes para a apresentação das notas**

Aplica as definições de apresentação de pontuação dos exercícios (percentagem vs. pontos) às pontuações das categorias no boletim.

*Default: `true`*


### `gradebook_use_exercise_score_settings_in_total`

**Utilizar a definição global de apresentação de pontuação no boletim**

Aplica as definições globais de apresentação de pontuação dos exercícios aos cálculos da pontuação total no boletim.

*Default: `false`*


### `hide_gradebook_percentage_user_result`

**Ocultar a percentagem nos resultados de melhor/média do boletim**

Remove a apresentação da percentagem dos resultados de melhor/média pontuação mostrados aos formandos no boletim.

*Default: `true`*


### `my_display_coloring`

**Mostrar cores para as pontuações no boletim**

Ativa a codificação por cores para melhor visibilidade das pontuações no boletim.

*Default: `false`*


### `student_publication_to_take_in_gradebook`

**Trabalho considerado para o boletim**

Na ferramenta de trabalhos, os alunos podem carregar mais do que um ficheiro. Caso exista mais do que um para um único trabalho, qual deve ser considerado ao classificá-los no boletim? Isto depende da sua metodologia. Utilize 'first' para privilegiar a atenção ao detalhe (como entregar a tempo e entregar o trabalho correto primeiro). Utilize 'last' para destacar o trabalho colaborativo e adaptativo.

*Default: `first`*


### `teachers_can_change_grade_model_settings`

**Os professores podem alterar as definições do modelo do boletim**

Ao editar um boletim

*Default: `true`*


### `teachers_can_change_score_settings`

**Os professores podem alterar as definições de pontuação do boletim**

Ao editar as definições do boletim

*Default: `true`*