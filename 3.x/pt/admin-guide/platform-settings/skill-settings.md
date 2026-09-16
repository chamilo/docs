# Definições de Competências

Comportamento do sistema de **Competências** — árvore de competências, regras de atribuição, integração com o perfil.

Aceda a estas definições em **Administração > Definições de configuração > Competências**. Esta categoria contém **13 definições**, listadas abaixo com o título e o comentário fornecidos nas fixtures de definições da plataforma (`SettingsCurrentFixtures.php`).

> O nome da variável no código é apresentado em monoespaçado. Utilize-o ao automatizar via API ou quando precisar de alterar essas definições a nível global editando [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Definições

### `allow_hr_skills_management`

**Permitir gestão de competências por RH**

Permite que os RH geram competências

*Predefinição: `true`*


### `allow_private_skills`

**Ocultar competências dos formandos**

Se ativado, as competências só podem ser visíveis para administradores, formadores (relacionados com um utilizador através de um curso) e utilizadores de RH (se relacionados com um utilizador).

*Predefinição: `false`*


### `allow_skill_rel_items`

**Ativar associação de competências a itens**

Isto ativa uma funcionalidade importante que permite associar qualquer item a (e, assim, permitir a aquisição de) uma competência. A funcionalidade continua a exigir que o formador confirme a aquisição da competência, pelo que a aquisição não é automática.

*Predefinição: `false`*


### `allow_skills_tool`

**Permitir ferramenta de Competências**

Os utilizadores podem ver as suas competências na rede social e num bloco na página inicial.

*Predefinição: `true`*

### `allow_teacher_access_student_skills`

**Permitir que os formadores acedam às competências dos formandos**

[inferido] Permitir que os instrutores visualizem e acompanhem as competências adquiridas pelos formandos nos seus cursos.

*Predefinição: `false`*


### `badge_assignation_notification`

**Enviar notificação ao formando quando uma competência/emblema tiver sido adquirido**

[inferido] Enviar notificações aos formandos quando adquirem uma nova competência ou conquista de emblema.

*Predefinição: `false`*


### `hide_skill_levels`

**Ocultar funcionalidade de níveis de competência**

[inferido] Ocultar a hierarquia de níveis de competência e os rótulos de nível nas vistas relacionadas com competências.

*Predefinição: `false`*


### `manual_assignment_subskill_autoload`

**Atribuição de competências a um utilizador: carregamento automático de subcompetências**

Ao atribuir manualmente competências a um utilizador, o formulário pode ser configurado para lhe oferecer automaticamente a atribuição de uma subcompetência em vez da competência que selecionou.

*Predefinição: `false`*


### `openbadges_backpack`

**URL do backpack OpenBadges**

O URL do servidor de backpack OpenBadges que será utilizado por predefinição para todos os utilizadores que pretendam exportar os seus emblemas. Por predefinição, aponta para o repositório de backpack aberto e gratuito da Mozilla Foundation: https://backpack.openbadges.org/

### `show_full_skill_name_on_skill_wheel`

**Mostrar o nome completo da competência na roda de competências**

Na roda de competências, mostra o nome da competência quando esta tem um código curto.

*Predefinição: `false`*


### `skill_levels_names`

**Nomes dos níveis de competência**

Definir nomes para os níveis de competências como um array de id => name.

### `skills_hierarchical_view_in_user_tracking`

**Mostrar competências como uma tabela hierárquica**

[inferido] Apresentar as competências do formando como uma estrutura de árvore hierárquica nas páginas de progresso e de relatórios.

*Predefinição: `false`*


### `skills_teachers_can_assign_skills`

**Permitir que os formadores definam quais competências são adquiridas através dos seus cursos**

Por predefinição, apenas os administradores podem decidir quais competências podem ser adquiridas através de cada curso.

*Predefinição: `false`*