# Configurações de Competências

Comportamento do sistema de **Competências** — árvore de competências, regras de atribuição, integração com o perfil.

Acesse estas configurações em **Administração > Configurações > Competências**. Esta categoria contém **13 configurações**, listadas abaixo com o título e o comentário fornecidos nos fixtures de configurações da plataforma (`SettingsCurrentFixtures.php`).

> O nome da variável no código é mostrado em monoespaçado. Use-o ao automatizar via API ou quando precisar alterar essas configurações em nível global editando [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Configurações

### `allow_hr_skills_management`

**Permitir gerenciamento de competências pelo RH**

Permite que o RH gerencie competências

*Padrão: `true`*


### `allow_private_skills`

**Ocultar competências dos aprendizes**

Se habilitado, as competências só podem ser visíveis para administradores, professores (relacionados a um usuário por meio de um curso) e usuários de RH (se relacionados a um usuário).

*Padrão: `false`*


### `allow_skill_rel_items`

**Habilitar vinculação de competências a itens**

Isso habilita um recurso importante que permite que qualquer item seja vinculado a (e, assim, permita a aquisição de) uma competência. O recurso ainda exige que o professor confirme a aquisição da competência, portanto a aquisição não é automática.

*Padrão: `false`*


### `allow_skills_tool`

**Permitir ferramenta de Competências**

Os usuários podem ver suas competências na rede social e em um bloco na página inicial.

*Padrão: `true`*

### `allow_teacher_access_student_skills`

**Permitir que professores acessem as competências dos aprendizes**

[inferido] Permitir que instrutores visualizem e acompanhem as competências adquiridas pelos aprendizes em seus cursos.

*Padrão: `false`*


### `badge_assignation_notification`

**Enviar notificação ao aprendiz quando uma competência/emblema tiver sido adquirida**

[inferido] Enviar notificações aos aprendizes quando eles adquirirem uma nova competência ou conquista de emblema.

*Padrão: `false`*


### `hide_skill_levels`

**Ocultar o recurso de níveis de competência**

[inferido] Ocultar a hierarquia de níveis de competência e os rótulos de nível nas visualizações relacionadas a competências.

*Padrão: `false`*


### `manual_assignment_subskill_autoload`

**Atribuição de competências ao usuário: carregamento automático de subcompetências**

Ao atribuir competências manualmente a um usuário, o formulário pode ser configurado para oferecer automaticamente a atribuição de uma subcompetência em vez da competência selecionada.

*Padrão: `false`*


### `openbadges_backpack`

**URL do backpack OpenBadges**

A URL do servidor de backpack OpenBadges que será usada por padrão para todos os usuários que desejarem exportar seus emblemas. O padrão é o repositório de backpack aberto e gratuito da Mozilla Foundation: https://backpack.openbadges.org/

### `show_full_skill_name_on_skill_wheel`

**Mostrar o nome completo da competência na roda de competências**

Na roda de competências, mostra o nome da competência quando ela possui código curto.

*Padrão: `false`*


### `skill_levels_names`

**Nomes dos níveis de competência**

Defina nomes para os níveis de competências como um array de id => name.

### `skills_hierarchical_view_in_user_tracking`

**Mostrar competências como uma tabela hierárquica**

[inferido] Exibir as competências do aprendiz como uma estrutura de árvore hierárquica nas páginas de progresso e relatórios.

*Padrão: `false`*


### `skills_teachers_can_assign_skills`

**Permitir que professores definam quais competências são adquiridas por meio de seus cursos**

Por padrão, apenas administradores podem decidir quais competências podem ser adquiridas por meio de qual curso.

*Padrão: `false`*