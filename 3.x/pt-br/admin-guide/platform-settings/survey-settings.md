# Configurações de pesquisas

Padrões e comportamento da ferramenta **Surveys**.

Acesse estas configurações em **Administração > Configurações de configuração > Surveys**. Esta categoria contém **12 configurações**, listadas abaixo com o título e o comentário fornecidos nos fixtures de configurações da plataforma (`SettingsCurrentFixtures.php`).

> O nome da variável no código é mostrado em monoespaçado. Use-o ao criar scripts via API ou quando precisar alterar essas configurações em nível global editando [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Configurações

### `extend_rights_for_coach_on_survey`

**Estender direitos dos tutores nas pesquisas**

Ative esta opção para permitir que os tutores criem e editem pesquisas

*Padrão: `true`*


### `hide_survey_edition`

**Impedir edição de pesquisas**

Impede a edição das pesquisas para todas as pesquisas listadas aqui (por código). Use * para impedir a edição de todas as pesquisas.

### `hide_survey_reporting_button`

**Ocultar botão de relatórios da pesquisa**

Permite que os administradores ocultem o botão de relatórios da pesquisa quando as pesquisas forem usadas para avaliar professores.

*Padrão: `false`*


### `show_pending_survey_in_menu`

**Exibir "Pesquisas pendentes" no menu**

Exibe um item de menu que permite aos usuários acessar suas pesquisas pendentes.

*Padrão: `false`*


### `show_surveys_base_in_sessions`

**Exibir pesquisas do curso base em todos os cursos de sessão**

[inferido] Torna as pesquisas do curso base visíveis e disponíveis para os alunos em todos os cursos de sessão relacionados.

*Padrão: `false`*


### `survey_additional_teacher_modify_actions`

**Adicionar ações extras (como links) às listas de pesquisas para professores**

Adiciona ações (geralmente conectadas a plugins) na lista de pesquisas. Use a sintaxe de array ['myplugin' => ['MyPlugin', 'urlGeneratorCallback']].

### `survey_allow_answered_question_edit`

**Permitir que professores editem perguntas da pesquisa após as respostas dos alunos**

[inferido] Permite que os instrutores modifiquem as perguntas da pesquisa mesmo depois que os alunos tiverem enviado respostas.

*Padrão: `false`*


### `survey_anonymous_show_answered`

**Permitir que professores vejam quem respondeu em pesquisas anônimas**

Permite que os professores vejam quais alunos já responderam a uma pesquisa anônima. Isso só aparece depois que mais de um usuário tiver respondido, de modo que permanece difícil identificar quem respondeu o quê.

*Padrão: `false`*


### `survey_backwards_enable`

**Ativar botão "pergunta anterior" nas pesquisas**

[inferido] Ativa um botão de navegação "pergunta anterior" para permitir que os alunos revisem perguntas anteriores da pesquisa.

*Padrão: `false`*


### `survey_duplicate_order_by_name`

**Ordenar pelo nome do aluno ao usar o recurso de duplicação de pesquisa**

O recurso de duplicação de pesquisa é voltado para professores e destina-se a pedir que os professores dêem sua apreciação sobre cada aluno em ordem. Esta opção ordenará as perguntas pelo sobrenome do aluno.

*Padrão: `true`*


### `survey_email_sender_noreply`

**Remetente de e-mail da pesquisa (no-reply)**

Os convites de pesquisa devem usar o endereço de e-mail do tutor ou o endereço no-reply definido na seção de configuração principal?

*Padrão: `coach`* (a opção "Remetente de e-mail do tutor do curso" — o valor armazenado permanece inalterado em relação a versões anteriores do Chamilo, mas a opção é rotulada como "tutor" na interface)


### `survey_mark_question_as_required`

**Marcar todas as perguntas da pesquisa como "obrigatórias" por padrão**

[inferido] Marca automaticamente todas as perguntas de pesquisa recém-criadas como respostas obrigatórias por padrão.

*Padrão: `false`*