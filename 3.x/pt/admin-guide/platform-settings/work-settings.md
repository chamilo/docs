# Configurações de Trabalhos (Work)

Padrões e comportamento da ferramenta **Trabalhos (Publicações dos estudantes)**.

Aceda a estas definições em **Administração > Definições de configuração > Trabalhos (Work)**. Esta categoria contém **12 definições**, listadas abaixo com o título e o comentário fornecidos nas fixtures de definições da plataforma (`SettingsCurrentFixtures.php`).

> O nome da variável no código é apresentado em monoespaçado. Utilize-o ao automatizar via API ou quando precisar de alterar essas definições a nível global editando [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Definições

### `allow_compilatio_tool`

**Ativar Compilatio**

O Compilatio é um serviço antiplágio que compara texto entre duas submissões e indica se existe uma elevada probabilidade de o conteúdo (normalmente trabalhos) não ser original.

*Predefinição: `false`*

### `allow_my_student_publication_page`

**Ativar a página Os meus trabalhos**

[inferido] Ativar uma página dedicada para os formandos visualizarem e gerirem os seus próprios trabalhos submetidos.

*Predefinição: `false`*

### `allow_only_one_student_publication_per_user`

**Os estudantes só podem carregar um trabalho**

[inferido] Restringir os formandos a submeter apenas um trabalho por atividade, impedindo múltiplas submissões.

*Predefinição: `false`*

### `allow_redirect_to_main_page_after_work_upload`

**Redirecionar para a página inicial da ferramenta de trabalhos após o carregamento ou um comentário**

Redirecionar para a lista de trabalhos após carregar um trabalho ou adicionar um comentário

*Predefinição: `false`*

### `assignment_prevent_duplicate_upload`

**Impedir carregamentos duplicados nos trabalhos**

[inferido] Impedir que os formandos carreguem ficheiros idênticos para a mesma submissão de trabalho.

*Predefinição: `false`*

### `block_student_publication_add_documents`

**Impedir a adição de documentos aos trabalhos**

[inferido] Impedir que os formandos adicionem ou anexem documentos ao submeter trabalhos.

*Predefinição: `false`*

### `block_student_publication_edition`

**Impedir a edição de trabalhos**

[inferido] Impedir que os formandos modifiquem ou atualizem os trabalhos submetidos após a submissão inicial.

*Predefinição: `false`*

### `block_student_publication_score_edition`

**Impedir que o professor altere as pontuações dos trabalhos**

[inferido] Impedir que os formadores alterem as pontuações dos trabalhos depois de registadas.

*Predefinição: `false`*

### `compilatio_tool`

**Definições do Compilatio**

Configure aqui os detalhes de ligação ao Compilatio.

### `considered_working_time`

**Ativar o esforço de tempo para os trabalhos**

Isto permitirá que os professores indiquem um esforço de tempo estimado (no formato hh:mm:ss) para concluir o trabalho. Após a submissão do trabalho e a aprovação pelo professor (o trabalho recebe uma pontuação), o formando receberá automaticamente o tempo correspondente.

*Predefinição: `work_time`*

### `force_download_doc_before_upload_work`

**Forçar a transferência do documento antes do carregamento do trabalho**

Obrigar os utilizadores a transferir o documento fornecido na definição do trabalho antes de poderem carregar o seu trabalho.

*Predefinição: `true`*

### `my_courses_show_pending_work`

**Mostrar ligação para trabalhos «pendentes» a partir da página Os meus cursos**

[inferido] Mostrar uma ligação ou a contagem de trabalhos pendentes na página Os meus cursos do formando, para acesso rápido.

*Predefinição: `false`*