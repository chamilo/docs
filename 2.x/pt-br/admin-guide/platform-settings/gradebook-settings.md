# Configurações do Boletim de Notas (Avaliações)

Configurações padrão aplicadas à ferramenta **Boletim de Notas (Avaliações)** — exibição de pontuação, precisão decimal, limites de pontuação para certificados e agregação.

Acesse essas configurações em **Administração > Configurações de configuração > Boletim de Notas (Avaliações)**. Esta categoria contém **34 configurações**, listadas abaixo com o título e o comentário fornecidos nos arquivos de configurações da plataforma (`SettingsCurrentFixtures.php`).

> O nome da variável no código é mostrado em fonte monoespaçada. Use-o ao criar scripts via API ou quando precisar alterar essas configurações em um nível global editando [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Configurações

### `allow_gradebook_comments`

**Comentários no Boletim de Notas**

Habilita comentários no boletim de notas para que os professores possam adicionar um comentário sobre o desempenho geral do aluno neste curso. O comentário aparecerá na exportação em PDF para o aluno.

*Padrão: `false`*

### `allow_gradebook_stats`

**Armazenar resultados em cache no boletim de notas**

Coloca alguns dos cálculos extensos de médias em campos de cache para os links e avaliações, aumentando a velocidade (consideravelmente). O impacto negativo potencial é que pode levar algum tempo para atualizar as tabelas de resultados do boletim de notas.

*Padrão: `false`*

### `gradebook_badge_sidebar`

**Barra lateral de emblemas no Boletim de Notas**

Gera um bloco no menu lateral onde alguns emblemas podem ser exibidos como pendentes de aprovação. Requer que os boletins de notas sejam listados aqui, por ID (numérico).

### `gradebook_default_grade_model_id`

**Modelo de notas padrão**

Este valor será selecionado por padrão ao criar um curso.

### `gradebook_default_weight`

**Peso padrão no Boletim de Notas**

Este peso será usado em todos os cursos por padrão.

*Padrão: `100`*

### `gradebook_dependency`

**Dependências entre boletins de notas**

Habilita um mecanismo de dependências entre boletins de notas que informa às pessoas quais outros itens eles precisam completar primeiro para finalizar o boletim de notas.

*Padrão: `false`*

### `gradebook_dependency_mandatory_courses`

**Cursos obrigatórios para dependências do boletim de notas**

Ao usar dependências entre boletins de notas, você pode escolher uma lista de cursos obrigatórios que serão necessários antes de aprovar qualquer boletim de notas que tenha dependências.

### `gradebook_detailed_admin_view`

**Mostrar colunas adicionais no boletim de notas**

Mostra colunas adicionais na visualização do aluno no boletim de notas com a melhor pontuação de todos os alunos, a posição relativa do aluno que está visualizando o relatório e a pontuação média de todo o grupo de alunos.

*Padrão: `false`*

### `gradebook_display_extra_stats`

**Estatísticas extras no Boletim de Notas**

Adiciona colunas adicionais ao relatório principal do boletim de notas (1 = classificação, 2 = melhor pontuação, 3 = média).

### `gradebook_enable`

**Ativação da ferramenta de Avaliações**

A ferramenta de Avaliações permite avaliar competências em sua organização, combinando avaliações de atividades presenciais e online em relatórios de desempenho. Deseja ativá-la?

*Padrão: `true`*

### `gradebook_enable_grade_model`

**Habilitar modelo de Boletim de Notas**

Habilita a criação automática de categorias de boletim de notas dentro de um curso, dependendo dos modelos de boletim de notas.

*Padrão: `false`*

### `gradebook_enable_subcategory_skills_independant_assignement`

**Habilitar competências por subcategoria do boletim de notas**

Normalmente, as competências são atribuídas ao completar um boletim de notas inteiro. Ao habilitar esta opção, você permite que competências sejam vinculadas a subseções dos boletins de notas.

*Padrão: `false`*

### `gradebook_flatview_extrafields_columns`

**Campos extras do usuário na visualização plana do boletim de notas**

Adiciona as colunas fornecidas (array de 'variáveis') à tabela de resultados principal no boletim de notas.

### `gradebook_hide_graph`

**Ocultar gráficos do boletim de notas**

Se o seu portal tiver recursos limitados, reduzir a geração de gráficos dinâmicos do boletim de notas com potencialmente milhares de resultados é uma boa opção.

*Padrão: `false`*

### `gradebook_hide_link_to_item_for_student`

**Ocultar links para itens para alunos no boletim de notas**

Evita que os alunos cliquem em itens do boletim de notas removendo os links nos itens.

*Padrão: `false`*

### `gradebook_hide_pdf_report_button`

**Ocultar botão 'baixar relatório em PDF' do boletim de notas**

Remove o botão de exportação em PDF das visualizações do boletim de notas para os alunos.

*Padrão: `false`*

### `gradebook_hide_table`

**Ocultar tabela do boletim de notas para alunos**

Reduz o tempo de carregamento do boletim de notas ocultando a tabela de resultados (mas ainda permitindo acesso a certificados, competências, etc.).

*Padrão: `false`*

---
### `gradebook_locking_enabled`

**Habilitar o bloqueio de avaliações pelos professores**

Uma vez ativada, esta opção permitirá o bloqueio de qualquer avaliação pelos professores do curso correspondente. Isso, por sua vez, impedirá qualquer modificação dos resultados pelo professor dentro dos recursos utilizados na avaliação: exames, caminhos de aprendizagem, tarefas, etc. O único papel autorizado a desbloquear uma avaliação bloqueada é o administrador. O professor será informado dessa possibilidade. O bloqueio e desbloqueio de boletins serão registrados no relatório de atividades importantes do sistema.

*Padrão: `false`*

### `gradebook_multiple_evaluation_attempts`

**Permitir múltiplas tentativas de avaliação no boletim**

Permite adicionar comentários a múltiplas tentativas de avaliação no boletim e nas tabelas de resultados.

*Padrão: `false`*

### `gradebook_number_decimals`

**Número de casas decimais**

Permite definir o número de casas decimais permitidas em uma pontuação.

*Padrão: `0`*

### `gradebook_pdf_export_settings`

**Opções de exportação de PDF do boletim**

Altera a exportação de PDF para os alunos com base nas configurações fornecidas ('hide_score_weight', 'hide_feedback_textarea', ...)

### `gradebook_report_score_style`

**Estilo de pontuação nos relatórios do boletim**

Adiciona configuração de estilo de pontuação do boletim na visualização plana. Consulte api.lib.php para encontrar as opções: exemplos SCORE_DIV = 1, SCORE_PERCENT = 2, etc.

*Padrão: `1`*

### `gradebook_score_display_colorsplit`

**Limiar**

O limiar (em %) abaixo do qual as pontuações serão coloridas de vermelho.

*Padrão: `50`*

### `gradebook_score_display_custom`

**Rotulagem de níveis de competência**

Marque a caixa para habilitar a rotulagem de níveis de competência.

*Padrão: `false`*

### `gradebook_score_display_custom_standalone`

**Exibição de pontuação personalizada em coluna independente do boletim**

Mostra valores de nível de competência personalizados em uma coluna separada na visualização plana do boletim ao usar exibição de pontuação personalizada.

*Padrão: `false`*

### `gradebook_score_display_upperlimit`

**Exibir limite superior da pontuação**

Marque a caixa para mostrar o limite superior da pontuação.

*Padrão: `false`*

### `gradebook_use_apcu_cache`

**Usar cache APCu para acelerar o boletim**

Melhora a velocidade ao renderizar relatórios de alunos no boletim usando o cache Doctrine APCu. APCu é uma extensão PHP opcional, mas recomendada.

*Padrão: `true`*

### `gradebook_use_exercise_score_settings_in_categories`

**Usar configurações de teste para exibição de notas**

Aplica as configurações de exibição de pontuação de exercícios (porcentagem vs. pontos) às pontuações de categorias no boletim.

*Padrão: `true`*

### `gradebook_use_exercise_score_settings_in_total`

**Usar configuração global de exibição de pontuação no boletim**

Aplica as configurações globais de exibição de pontuação de exercícios aos cálculos de pontuação total no boletim.

*Padrão: `false`*

### `hide_gradebook_percentage_user_result`

**Ocultar porcentagem nos resultados de melhor/média no boletim**

Remove a exibição de porcentagem dos resultados de pontuação melhor/média mostrados aos alunos no boletim.

*Padrão: `true`*

### `my_display_coloring`

**Exibir cores para pontuações no boletim**

Habilita a codificação por cores para melhor visibilidade das pontuações no boletim.

*Padrão: `false`*

### `student_publication_to_take_in_gradebook`

**Tarefa considerada para o boletim**

Na ferramenta de tarefas, os alunos podem enviar mais de um arquivo. Caso haja mais de um para uma única tarefa, qual deve ser considerado ao classificá-los no boletim? Isso depende da sua metodologia. Use 'first' para enfatizar a atenção aos detalhes (como entregar no prazo e realizar o trabalho correto primeiro). Use 'last' para destacar o trabalho colaborativo e adaptativo.

*Padrão: `first`*

### `teachers_can_change_grade_model_settings`

**Professores podem alterar as configurações do modelo do boletim**

Ao editar um boletim.

*Padrão: `true`*

### `teachers_can_change_score_settings`

**Professores podem alterar as configurações de pontuação do boletim**

Ao editar as configurações do boletim.

*Padrão: `true`*