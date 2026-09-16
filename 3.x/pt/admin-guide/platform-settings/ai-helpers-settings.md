# Definições dos Assistentes de IA

Configuração dos assistentes de IA (geração de texto, geração de imagens, geração de vídeo, tutor de IA, classificação por IA). Cada fornecedor pode ser ativado por tipo de tarefa. Consulte também [Configuração de IA](../integrations/ai-configuration.md).

Aceda a estas definições em **Administração > Definições de configuração > Assistentes de IA**. Esta categoria contém **14 definições**, listadas abaixo com o título e o comentário fornecidos nas fixtures de definições da plataforma (`SettingsCurrentFixtures.php`).

> O nome da variável no código é apresentado em monoespaço. Utilize-o ao automatizar via API ou quando precisar de alterar essas definições a nível global editando [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Definições

### `ai_providers`

**Dados de ligação dos fornecedores de IA**

Dados de configuração para ligar a serviços externos de IA.

### `content_analyser`

**Analisador de conteúdos**

Analisa materiais de aprendizagem para extrair informações ou melhorar a qualidade.

*Predefinição: `false`*

### `course_analyser`

**Analisador de cursos**

Analisa todos os recursos de um ou vários cursos e pré-treina o modelo de IA para responder a qualquer pergunta sobre este ou estes cursos (certifique-se de que o conteúdo pode ser partilhado com os serviços de IA configurados).

*Predefinição: `false`*

### `disclose_ai_assistance`

**Divulgar assistência de IA**

Mostra uma etiqueta em qualquer conteúdo ou feedback que tenha sido gerado ou co-gerado por qualquer sistema de IA, evidenciando ao utilizador que o conteúdo foi construído com a ajuda de algum sistema de IA. Os detalhes sobre que sistema de IA foi utilizado em cada caso são mantidos na base de dados para auditoria, mas não são diretamente acessíveis pelo utilizador final.

*Predefinição: `true`*

### `enable_ai_helpers`

**Ativar a ferramenta de assistente de IA**

Ativa todas as funcionalidades disponíveis com IA na plataforma.

*Predefinição: `false`*

### `exercise_generator`

**Gerador de exercícios**

Gera testes personalizados com IA com base no conteúdo do curso.

*Predefinição: `false`*

### `glossary_terms_generator`

**Gerador de termos de glossário**

Permite que os professores peçam termos de glossário gerados por IA no seu curso. Isto gerará 20 termos com base no título do curso e na descrição geral na ferramenta de descrição do curso. Se for utilizado mais do que uma vez, excluirá termos já presentes nesse glossário (certifique-se de que o conteúdo pode ser partilhado com os serviços de IA configurados).

*Predefinição: `false`*

### `image_generator`

**Gerador de imagens**

Gera imagens com base em prompts ou conteúdos utilizando IA.

*Predefinição: `false`*

### `learning_path_generator`

**Gerador de percursos de aprendizagem**

Gera percursos de aprendizagem personalizados utilizando sugestões de IA.

*Predefinição: `false`*

### `open_answers_grader`

**Classificador de respostas abertas**

Classifica automaticamente respostas abertas utilizando IA.

*Predefinição: `false`*

### `task_grader`

**Classificador de trabalhos**

Utiliza IA para avaliar e classificar trabalhos carregados.

*Predefinição: `false`*

### `tutor_chatbot`

**Chatbot tutor alimentado por IA**

Fornece aos estudantes um assistente de tutoria com IA.

*Predefinição: `false`*

### `video_generator`

**Gerador de vídeo**

Gera vídeos com base em prompts ou conteúdos utilizando IA (isto pode consumir muitos tokens).

*Predefinição: `false`*

### `wysiwyg_translation_all_languages` **v3**

**Permitir tradução por IA para todos os idiomas ativos nos editores WYSIWYG**

Permite que os professores gerem traduções para todos os idiomas ativos da plataforma numa única ação WYSIWYG. Isto pode consumir um grande número de tokens de IA.

*Predefinição: `true`*