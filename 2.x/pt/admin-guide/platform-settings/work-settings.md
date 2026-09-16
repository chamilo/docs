# Configurações de Tarefas (Trabalhos)

Padrões e comportamento da ferramenta **Tarefas (Publicações de Estudantes)**.

Acesse essas configurações em **Administração > Configurações de configuração > Tarefas (Trabalhos)**. Esta categoria contém **12 configurações**, listadas abaixo com o título e o comentário fornecidos nos arquivos de configurações da plataforma (`SettingsCurrentFixtures.php`).

> O nome da variável no código é mostrado em fonte monoespaçada. Use-o ao criar scripts via API ou quando precisar alterar essas configurações em um nível global editando [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Configurações

### `allow_compilatio_tool`

**Ativar Compilatio**

Compilatio é um serviço anti-fraude que compara textos entre duas submissões e relata se há alta probabilidade de que o conteúdo (geralmente tarefas) não seja autêntico.

*Padrão: `false`*

### `allow_my_student_publication_page`

**Ativar página Minhas tarefas**

[inferido] Habilita uma página dedicada para os alunos visualizarem e gerenciarem suas tarefas enviadas.

*Padrão: `false`*

### `allow_only_one_student_publication_per_user`

**Estudantes podem enviar apenas uma tarefa**

[inferido] Restringe os alunos a enviar apenas uma tarefa por atividade, impedindo múltiplas submissões.

*Padrão: `false`*

### `allow_redirect_to_main_page_after_work_upload`

**Redirecionar para a página inicial da ferramenta de tarefas após envio ou comentário**

Redireciona para a lista de tarefas após o envio de uma tarefa ou a adição de um comentário.

*Padrão: `false`*

### `assignment_prevent_duplicate_upload`

**Impedir envios duplicados em tarefas**

[inferido] Impede que os alunos enviem arquivos idênticos para a mesma submissão de tarefa.

*Padrão: `false`*

### `block_student_publication_add_documents`

**Impedir a adição de documentos às tarefas**

[inferido] Impede que os alunos adicionem ou anexem documentos ao enviar tarefas.

*Padrão: `false`*

### `block_student_publication_edition`

**Impedir a edição de tarefas**

[inferido] Impede que os alunos modifiquem ou atualizem suas tarefas enviadas após a submissão inicial.

*Padrão: `false`*

### `block_student_publication_score_edition`

**Impedir que o professor modifique as pontuações das tarefas**

[inferido] Impede que os instrutores alterem as pontuações das tarefas após terem sido registradas.

*Padrão: `false`*

### `compilatio_tool`

**Configurações do Compilatio**

Configure os detalhes de conexão do Compilatio aqui.

### `considered_working_time`

**Ativar esforço de tempo para tarefas**

Isso permitirá que os professores forneçam um tempo estimado de esforço (no formato hh:mm:ss) para completar a tarefa. Após a submissão da tarefa e aprovação pelo professor (a tarefa recebe uma pontuação), o aluno será automaticamente atribuído ao tempo correspondente.

*Padrão: `work_time`*

### `force_download_doc_before_upload_work`

**Forçar download do documento antes do envio da tarefa**

Força os usuários a baixarem o documento fornecido na definição da tarefa antes de poderem enviar sua tarefa.

*Padrão: `true`*

### `my_courses_show_pending_work`

**Exibir link para tarefas 'pendentes' na página Meus cursos**

[inferido] Exibe um link ou contador de tarefas pendentes na página Meus Cursos do aluno para acesso rápido.

*Padrão: `false`*