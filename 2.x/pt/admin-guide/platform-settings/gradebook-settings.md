# Configurações do Gradebook (Avaliações)

Configurações padrão aplicadas à ferramenta **Gradebook (Avaliações)** — exibição de pontuações, precisão decimal, limites de pontuação para certificados e agregação.

Acesse essas configurações em **Administração > Configurações de configuração > Gradebook (Avaliações)**. Esta categoria contém **34 configurações**, listadas abaixo com o título e o comentário fornecidos nos arquivos de configurações da plataforma (`SettingsCurrentFixtures.php`).

> O nome da variável no código é mostrado em fonte monoespaçada. Use-o ao criar scripts via API ou quando precisar alterar essas configurações em um nível global editando [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Configurações

### `allow_gradebook_comments`

**Comentários no Gradebook**

Habilita comentários no gradebook para que os professores possam adicionar um comentário sobre o desempenho geral do aluno neste curso. O comentário aparecerá na exportação em PDF para o aluno.

*Padrão: `false`*

### `allow_gradebook_stats`

**Armazenar resultados em cache no gradebook**

Coloca alguns dos cálculos extensos de médias em campos de cache para os links e avaliações, aumentando a velocidade (consideravelmente). O impacto negativo potencial é que pode levar algum tempo para atualizar as tabelas de resultados do gradebook.

*Padrão: `false`*

### `gradebook_badge_sidebar`

**Barra lateral de emblemas do Gradebook**

Gera um bloco dentro do menu lateral onde alguns emblemas podem ser exibidos como pendentes de aprovação. Requer que os gradebooks sejam listados aqui, por ID (numérico).

### `gradebook_default_grade_model_id`

**Modelo de nota padrão**

Este valor será selecionado por padrão ao criar um curso.

### `gradebook_default_weight`

**Peso padrão no Gradebook**

Este peso será usado em todos os cursos por padrão.

*Padrão: `100`*

### `gradebook_dependency`

**Dependências entre gradebooks**

Habilita um mecanismo de dependências de gradebook que informa às pessoas quais outros itens elas precisam completar primeiro para finalizar o gradebook.

*Padrão: `false`*

### `gradebook_dependency_mandatory_courses`

**Cursos obrigatórios para dependências de gradebook**

Ao usar dependências entre gradebooks, você pode escolher uma lista de cursos obrigatórios que serão necessários antes de aprovar qualquer gradebook que tenha dependências.

### `gradebook_detailed_admin_view`

**Mostrar colunas adicionais no gradebook**

Mostra colunas adicionais na visualização do aluno no gradebook com a melhor pontuação de todos os alunos, a posição relativa do aluno que está visualizando o relatório e a pontuação média de todo o grupo de alunos.

*Padrão: `false`*

### `gradebook_display_extra_stats`

**Estatísticas extras no Gradebook**

Adiciona colunas adicionais ao relatório principal do gradebook (1 = classificação, 2 = melhor pontuação, 3 = média).

### `gradebook_enable`

**Ativação da ferramenta de Avaliações**

A ferramenta de Avaliações permite avaliar competências em sua organização, combinando avaliações de atividades presenciais e online em relatórios de Desempenho. Deseja ativá-la?

*Padrão: `true`*

### `gradebook_enable_grade_model`

**Habilitar modelo de Gradebook**

Habilita a criação automática de categorias de gradebook dentro de um curso dependendo dos modelos de gradebook.

*Padrão: `false`*

### `gradebook_enable_subcategory_skills_independant_assignement`

**Habilitar competências por subcategoria do gradebook**

Normalmente, as competências são atribuídas ao completar um gradebook inteiro. Ao habilitar esta opção, você permite que competências sejam vinculadas a subseções de gradebooks.

*Padrão: `false`*

### `gradebook_flatview_extrafields_columns`

**Campos extras do usuário na visualização plana do gradebook**

Adiciona as colunas fornecidas (array de 'variáveis') à tabela de resultados principal no gradebook.

### `gradebook_hide_graph`

**Ocultar gráficos do gradebook**

Se o seu portal tiver recursos limitados, reduzir a geração de gráficos dinâmicos do gradebook com potencialmente milhares de resultados é uma boa opção.

*Padrão: `false`*

### `gradebook_hide_link_to_item_for_student`

**Ocultar links de itens para alunos no gradebook**

Evita que os alunos cliquem em itens do gradebook removendo os links nos itens.

*Padrão: `false`*

### `gradebook_hide_pdf_report_button`

**Ocultar botão 'baixar relatório em PDF' do gradebook**

Remove o botão de exportação em PDF das visualizações do gradebook para os alunos.

*Padrão: `false`*

### `gradebook_hide_table`

**Ocultar tabela do gradebook para alunos**

Reduz o tempo de carregamento do gradebook ocultando a tabela de resultados (mas ainda dando acesso a certificados, competências, etc.).

*Padrão: `false`*

---
### `gradebook_locking_enabled`

**Ativar bloqueio de avaliações pelos professores**

Uma vez ativada, esta opção permitirá o bloqueio de qualquer avaliação pelos professores do curso correspondente. Isso, por sua vez, impedirá qualquer modificação dos resultados pelo professor dentro dos recursos utilizados na avaliação: exames, caminhos de aprendizagem, tarefas, etc. O único papel autorizado a desbloquear uma avaliação bloqueada é o administrador. O professor será informado dessa possibilidade. O bloqueio e desbloqueio de cadernos de notas serão registrados no relatório de atividades importantes do sistema.

*Default: `false`*

### `gradebook_multiple_evaluation_attempts`

**Permitir múltiplas tentativas de avaliação no caderno de notas**

Permite adicionar comentários a múltiplas tentativas de avaliação no caderno de notas e nas tabelas de resultados.

*Default: `false`*

### `gradebook_number_decimals`

**Número de casas decimais**

Permite definir o número de casas decimais permitidas em uma pontuação.

*Default: `0`*

### `gradebook_pdf_export_settings`

**Opções de exportação de PDF do caderno de notas**

Altera a exportação de PDF para os alunos com base nas configurações fornecidas ('hide_score_weight', 'hide_feedback_textarea', ...)

### `gradebook_report_score_style`

**Estilo de pontuação nos relatórios do caderno de notas**

Adiciona configuração de estilo de pontuação do caderno de notas na visualização plana. Consulte api.lib.php para encontrar as opções: exemplos SCORE_DIV = 1, SCORE_PERCENT = 2, etc.

*Default: `1`*

### `gradebook_score_display_colorsplit`

**Limiar**

O limiar (em %) abaixo do qual as pontuações serão coloridas de vermelho.

*Default: `50`*

### `gradebook_score_display_custom`

**Rotulagem de níveis de competência**

Marque a caixa para ativar a rotulagem de níveis de competência.

*Default: `false`*

### `gradebook_score_display_custom_standalone`

**Exibição de pontuação personalizada em coluna independente no caderno de notas**

Mostra valores de nível de competência personalizados em uma coluna separada na visualização plana do caderno de notas ao usar exibição de pontuação personalizada.

*Default: `false`*

### `gradebook_score_display_upperlimit`

**Exibir limite superior da pontuação**

Marque a caixa para mostrar o limite superior da pontuação.

*Default: `false`*

### `gradebook_use_apcu_cache`

**Usar cache APCu para acelerar o caderno de notas**

Melhora a velocidade ao renderizar relatórios de alunos no caderno de notas usando o cache Doctrine APCu. APCu é uma extensão PHP opcional, mas recomendada.

*Default: `true`*

### `gradebook_use_exercise_score_settings_in_categories`

**Usar configurações de teste para exibição de notas**

Aplica as configurações de exibição de pontuação de exercícios (percentual vs. pontos) às pontuações de categorias no caderno de notas.

*Default: `true`*

### `gradebook_use_exercise_score_settings_in_total`

**Usar configuração global de exibição de pontuação no caderno de notas**

Aplica as configurações globais de exibição de pontuação de exercícios aos cálculos de pontuação total no caderno de notas.

*Default: `false`*

### `hide_gradebook_percentage_user_result`

**Ocultar percentual nos resultados de melhor/média no caderno de notas**

Remove a exibição de percentual dos resultados de pontuação melhor/média mostrados aos alunos no caderno de notas.

*Default: `true`*

### `my_display_coloring`

**Exibir cores para pontuações no caderno de notas**

Ativa a codificação por cores para melhor visibilidade das pontuações no caderno de notas.

*Default: `false`*

### `student_publication_to_take_in_gradebook`

**Tarefa considerada para o caderno de notas**

Na ferramenta de tarefas, os alunos podem enviar mais de um arquivo. Caso haja mais de um para uma única tarefa, qual deve ser considerado ao classificá-los no caderno de notas? Isso depende da sua metodologia. Use 'first' para enfatizar a atenção aos detalhes (como entregar no prazo e entregar o trabalho correto primeiro). Use 'last' para destacar o trabalho colaborativo e adaptativo.

*Default: `first`*

### `teachers_can_change_grade_model_settings`

**Professores podem alterar as configurações do modelo do caderno de notas**

Ao editar um caderno de notas.

*Default: `true`*

### `teachers_can_change_score_settings`

**Professores podem alterar as configurações de pontuação do caderno de notas**

Ao editar as configurações do caderno de notas.

*Default: `true`*