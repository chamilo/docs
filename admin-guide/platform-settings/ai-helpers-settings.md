# Configurações dos Assistentes de IA

Configuração dos assistentes de IA (geração de texto, geração de imagens, geração de vídeos, tutor de IA, avaliação por IA). Cada provedor pode ser habilitado por tipo de tarefa. Veja também [Configuração de IA](../integrations/ai-configuration.md).

Acesse essas configurações em **Administração > Configurações de configuração > Assistentes de IA**. Esta categoria contém **13 configurações**, listadas abaixo com o título e o comentário fornecidos nos arquivos de configurações da plataforma (`SettingsCurrentFixtures.php`).

> O nome da variável no código é mostrado em fonte monoespaçada. Use-o ao criar scripts via API ou quando precisar alterar essas configurações em um nível global editando [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Configurações

### `ai_providers`

**Dados de conexão dos provedores de IA**

Dados de configuração para conectar-se a serviços externos de IA.

### `content_analyser`

**Analisador de conteúdo**

Analisa materiais de aprendizagem para extrair insights ou melhorar a qualidade.

*Padrão: `false`*

### `course_analyser`

**Analisador de curso**

Analisa todos os recursos em um ou vários cursos e pré-treina o modelo de IA para responder a qualquer pergunta sobre esse(s) curso(s) (certifique-se de que o conteúdo pode ser compartilhado com os serviços de IA configurados).

*Padrão: `false`*

### `disclose_ai_assistance`

**Divulgar assistência de IA**

Mostra uma etiqueta em qualquer conteúdo ou feedback que tenha sido gerado ou co-gerado por um sistema de IA, evidenciando ao usuário que o conteúdo foi construído com a ajuda de algum sistema de IA. Detalhes sobre qual sistema de IA foi usado em cada caso são mantidos no banco de dados para auditoria, mas não são diretamente acessíveis ao usuário final.

*Padrão: `true`*

### `enable_ai_helpers`

**Habilitar a ferramenta de assistente de IA**

Ativa todas as funcionalidades alimentadas por IA disponíveis na plataforma.

*Padrão: `false`*

### `exercise_generator`

**Gerador de exercícios**

Gera testes personalizados com IA com base no conteúdo do curso.

*Padrão: `false`*

### `glossary_terms_generator`

**Gerador de termos de glossário**

Permite que professores solicitem termos de glossário gerados por IA em seu curso. Isso gerará 20 termos com base no título do curso e na descrição geral na ferramenta de descrição do curso. Se usado mais de uma vez, excluirá termos já presentes nesse glossário (certifique-se de que o conteúdo pode ser compartilhado com os serviços de IA configurados).

*Padrão: `false`*

### `image_generator`

**Gerador de imagens**

Gera imagens com base em prompts ou conteúdo usando IA.

*Padrão: `false`*

### `learning_path_generator`

**Gerador de caminhos de aprendizagem**

Gera caminhos de aprendizagem personalizados usando sugestões de IA.

*Padrão: `false`*

### `open_answers_grader`

**Avaliador de respostas abertas**

Avalia automaticamente respostas abertas usando IA.

*Padrão: `false`*

### `task_grader`

**Avaliador de tarefas**

Usa IA para avaliar e classificar tarefas enviadas.

*Padrão: `false`*

### `tutor_chatbot`

**Chatbot tutor alimentado por IA**

Fornece aos alunos um assistente de tutoria alimentado por IA.

*Padrão: `false`*

### `video_generator`

**Gerador de vídeos**

Gera vídeos com base em prompts ou conteúdo usando IA (isso pode consumir muitos tokens).

*Padrão: `false`*