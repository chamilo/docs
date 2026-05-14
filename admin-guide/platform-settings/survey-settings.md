# Configurações de Pesquisas

Padrões e comportamento da ferramenta **Pesquisas**.

Acesse essas configurações em **Administração > Configurações de configuração > Pesquisas**. Esta categoria contém **12 configurações**, listadas abaixo com o título e comentário fornecidos nos arquivos de configurações da plataforma (`SettingsCurrentFixtures.php`).

> O nome da variável no código é mostrado em fonte monoespaçada. Use-o ao criar scripts via API ou quando precisar alterar essas configurações em um nível global editando [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Configurações

### `extend_rights_for_coach_on_survey`

**Estender direitos para treinadores em pesquisas**

Ativar esta opção permitirá que os treinadores criem e editem pesquisas.

*Default: `true`*

### `hide_survey_edition`

**Impedir edição de pesquisas**

Impede a edição de todas as pesquisas listadas aqui (por código). Use * para impedir a edição de todas as pesquisas.

### `hide_survey_reporting_button`

**Ocultar botão de relatório de pesquisa**

Permite que administradores ocultem o botão de relatório de pesquisa se as pesquisas forem usadas para avaliar professores.

*Default: `false`*

### `show_pending_survey_in_menu`

**Mostrar "Pesquisas pendentes" no menu**

Exibe um item de menu que permite aos usuários acessarem suas pesquisas pendentes.

*Default: `false`*

### `show_surveys_base_in_sessions`

**Exibir pesquisas do curso base em todos os cursos de sessão**

[inferido] Torna as pesquisas do curso base visíveis e disponíveis para os alunos em todos os cursos de sessão relacionados.

*Default: `false`*

### `survey_additional_teacher_modify_actions`

**Adicionar ações adicionais (como links) às listas de pesquisas para professores**

Adiciona ações (geralmente conectadas a plugins) na lista de pesquisas. Use a sintaxe de array ['myplugin' => ['MyPlugin', 'urlGeneratorCallback']].

### `survey_allow_answered_question_edit`

**Permitir que professores editem perguntas de pesquisa após respostas dos alunos**

[inferido] Permite que instrutores modifiquem perguntas de pesquisa mesmo após os alunos terem enviado respostas.

*Default: `false`*

### `survey_anonymous_show_answered`

**Permitir que professores vejam quem respondeu em pesquisas anônimas**

Permite que professores vejam quais alunos já responderam a uma pesquisa anônima. Isso só aparece quando mais de um usuário respondeu, tornando difícil identificar quem respondeu o quê.

*Default: `false`*

### `survey_backwards_enable`

**Habilitar botão de 'pergunta anterior' em pesquisas**

[inferido] Habilita um botão de navegação "pergunta anterior" para permitir que os alunos revisem perguntas anteriores da pesquisa.

*Default: `false`*

### `survey_duplicate_order_by_name`

**Ordenar por nome do aluno ao usar o recurso de duplicação de pesquisa**

O recurso de duplicação de pesquisa é voltado para professores e tem como objetivo pedir aos professores que deem sua avaliação sobre cada aluno em ordem. Esta opção ordenará as perguntas pelo sobrenome do aluno.

*Default: `true`*

### `survey_email_sender_noreply`

**Remetente de e-mail de pesquisa (sem resposta)**

As convites de pesquisa devem usar o endereço de e-mail do treinador ou o endereço sem resposta definido na seção de configuração principal?

*Default: `coach`*

### `survey_mark_question_as_required`

**Marcar todas as perguntas de pesquisa como 'obrigatórias' por padrão**

[inferido] Marca automaticamente todas as perguntas de pesquisa recém-criadas como respostas obrigatórias por padrão.

*Default: `false`*