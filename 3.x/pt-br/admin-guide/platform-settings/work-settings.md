# Configurações de Tarefas (Work)

Padrões e comportamento da ferramenta **Tarefas (Publicações de alunos)**.

Acesse estas configurações em **Administração > Configurações > Tarefas (Work)**. Esta categoria contém **12 configurações**, listadas abaixo com o título e o comentário fornecidos nos fixtures de configurações da plataforma (`SettingsCurrentFixtures.php`).

> O nome da variável no código é mostrado em monoespaçado. Use-o ao automatizar via API ou quando precisar alterar essas configurações em nível global editando [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Configurações

### `allow_compilatio_tool`

**Ativar Compilatio**

O Compilatio é um serviço anticola que compara o texto entre duas submissões e informa se há alta probabilidade de o conteúdo (geralmente tarefas) não ser original.

*Padrão: `false`*

### `allow_my_student_publication_page`

**Ativar página Minhas tarefas**

[inferido] Ativa uma página dedicada para os alunos visualizarem e gerenciarem as próprias tarefas enviadas.

*Padrão: `false`*

### `allow_only_one_student_publication_per_user`

**Os alunos só podem enviar uma tarefa**

[inferido] Restringe os alunos a enviar apenas uma tarefa por atividade, impedindo envios múltiplos.

*Padrão: `false`*

### `allow_redirect_to_main_page_after_work_upload`

**Redirecionar para a página inicial da ferramenta de tarefas após o envio ou um comentário**

Redireciona para a lista de tarefas após o envio de uma tarefa ou a adição de um comentário

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

[inferido] Impede que os alunos modifiquem ou atualizem as tarefas enviadas após o envio inicial.

*Padrão: `false`*

### `block_student_publication_score_edition`

**Impedir que o professor altere as notas das tarefas**

[inferido] Impede que os instrutores alterem as notas das tarefas depois de registradas.

*Padrão: `false`*

### `compilatio_tool`

**Configurações do Compilatio**

Configure aqui os detalhes da conexão com o Compilatio.

### `considered_working_time`

**Ativar esforço de tempo para tarefas**

Isso permitirá que os professores indiquem um esforço de tempo estimado (no formato hh:mm:ss) para concluir a tarefa. Após o envio da tarefa e a aprovação pelo professor (a tarefa recebe uma nota), o aluno receberá automaticamente o tempo correspondente.

*Padrão: `work_time`*

### `force_download_doc_before_upload_work`

**Forçar o download do documento antes do envio da tarefa**

Obriga os usuários a baixar o documento fornecido na definição da tarefa antes de poderem enviar a própria tarefa.

*Padrão: `true`*

### `my_courses_show_pending_work`

**Exibir link para tarefas 'pendentes' na página Meus cursos**

[inferido] Exibe um link ou a contagem de tarefas pendentes na página Meus cursos do aluno para acesso rápido.

*Padrão: `false`*