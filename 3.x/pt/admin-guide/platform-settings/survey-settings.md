# Configurações de Enquetes

Predefinições e comportamento da ferramenta **Enquetes**.

Aceda a estas configurações em **Administração > Configurações > Enquetes**. Esta categoria contém **12 configurações**, listadas abaixo com o título e o comentário fornecidos nas fixtures de configurações da plataforma (`SettingsCurrentFixtures.php`).

> O nome da variável no código é apresentado em monoespaçado. Utilize-o ao automatizar via API ou quando precisar de alterar essas configurações a nível global editando [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Configurações

### `extend_rights_for_coach_on_survey`

**Alargar direitos dos tutores nas enquetes**

Ative esta opção para permitir que os tutores criem e editem enquetes

*Predefinição: `true`*


### `hide_survey_edition`

**Impedir a edição de enquetes**

Impedir a edição das enquetes para todas as enquetes listadas aqui (por código). Utilize * para impedir a edição de todas as enquetes.

### `hide_survey_reporting_button`

**Ocultar o botão de relatórios de enquetes**

Permite que os administradores ocultem o botão de relatórios de enquetes quando estas são utilizadas para inquirir professores.

*Predefinição: `false`*


### `show_pending_survey_in_menu`

**Mostrar "Enquetes pendentes" no menu**

Apresentar um item de menu que permite aos utilizadores aceder às suas enquetes pendentes.

*Predefinição: `false`*


### `show_surveys_base_in_sessions`

**Apresentar enquetes do curso base em todos os cursos de sessão**

[inferido] Tornar as enquetes do curso base visíveis e disponíveis para os formandos em todos os cursos de sessão relacionados.

*Predefinição: `false`*


### `survey_additional_teacher_modify_actions`

**Adicionar ações extra (como ligações) às listas de enquetes para professores**

Adicionar ações (normalmente ligadas a plugins) na lista de enquetes. Utilize a sintaxe de array ['myplugin' => ['MyPlugin', 'urlGeneratorCallback']].

### `survey_allow_answered_question_edit`

**Permitir que os professores editem perguntas da enquete depois de os estudantes responderem**

[inferido] Permitir que os formadores modifiquem as perguntas da enquete mesmo depois de os formandos terem submetido respostas.

*Predefinição: `false`*


### `survey_anonymous_show_answered`

**Permitir que os professores vejam quem respondeu em enquetes anónimas**

Permitir que os professores vejam quais formandos já responderam a uma enquete anónima. Isto só aparece depois de mais de um utilizador ter respondido, de modo a permanecer difícil identificar quem respondeu o quê.

*Predefinição: `false`*


### `survey_backwards_enable`

**Ativar o botão "pergunta anterior" nas enquetes**

[inferido] Ativar um botão de navegação "pergunta anterior" para permitir que os formandos revejam perguntas anteriores da enquete.

*Predefinição: `false`*


### `survey_duplicate_order_by_name`

**Ordenar por nome do estudante ao utilizar a funcionalidade de duplicação de enquetes**

A funcionalidade de duplicação de enquetes destina-se aos professores e serve para pedir que estes dêem a sua apreciação sobre cada estudante, por ordem. Esta opção ordenará as perguntas pelo apelido do formando.

*Predefinição: `true`*


### `survey_email_sender_noreply`

**Remetente de e-mail das enquetes (no-reply)**

Os convites de enquete devem utilizar o endereço de e-mail do tutor ou o endereço no-reply definido na secção principal de configuração?

*Predefinição: `coach`* (a opção "Remetente de e-mail do tutor do curso" — o valor armazenado permanece inalterado relativamente a versões anteriores do Chamilo, mas a opção é rotulada como "tutor" na interface)


### `survey_mark_question_as_required`

**Marcar todas as perguntas da enquete como "obrigatórias" por predefinição**

[inferido] Marcar automaticamente todas as perguntas de enquete recém-criadas como respostas obrigatórias por predefinição.

*Predefinição: `false`*