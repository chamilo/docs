# Configurações de Habilidades

Comportamento do sistema de **Habilidades** — árvore de habilidades, regras de atribuição, integração com o perfil.

Acesse essas configurações em **Administração > Configurações de configuração > Habilidades**. Esta categoria contém **13 configurações**, listadas abaixo com o título e o comentário fornecidos nos arquivos de configurações padrão da plataforma (`SettingsCurrentFixtures.php`).

> O nome da variável no código é mostrado em fonte monoespaçada. Use-o ao criar scripts via API ou quando precisar alterar essas configurações em um nível global editando [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Configurações

### `allow_hr_skills_management`

**Permitir gerenciamento de habilidades pelo RH**

Permite que o RH gerencie habilidades.

*Padrão: `true`*

### `allow_private_skills`

**Ocultar habilidades dos alunos**

Se ativado, as habilidades só serão visíveis para administradores, professores (relacionados a um usuário por meio de um curso) e usuários de RH (se relacionados a um usuário).

*Padrão: `false`*

### `allow_skill_rel_items`

**Habilitar vinculação de habilidades a itens**

Isso ativa uma funcionalidade importante que permite que qualquer item seja vinculado a (e, assim, permita a aquisição de) uma habilidade. A funcionalidade ainda exige que o professor confirme a aquisição da habilidade, portanto, a aquisição não é automática.

*Padrão: `false`*

### `allow_skills_tool`

**Permitir ferramenta de Habilidades**

Os usuários podem ver suas habilidades na rede social e em um bloco na página inicial.

*Padrão: `true`*

### `allow_teacher_access_student_skills`

**Permitir que professores acessem as habilidades dos alunos**

[inferido] Permite que instrutores visualizem e monitorem as habilidades adquiridas pelos alunos em seus cursos.

*Padrão: `false`*

### `badge_assignation_notification`

**Enviar notificação ao aluno quando uma habilidade/insígnia for adquirida**

[inferido] Envia notificações aos alunos quando eles adquirem uma nova habilidade ou conquista de insígnia.

*Padrão: `false`*

### `hide_skill_levels`

**Ocultar funcionalidade de níveis de habilidade**

[inferido] Oculta a hierarquia de níveis de habilidade e os rótulos de nível nas visualizações relacionadas a habilidades.

*Padrão: `false`*

### `manual_assignment_subskill_autoload`

**Atribuição de habilidades ao usuário: carregamento automático de sub-habilidades**

Ao atribuir manualmente habilidades a um usuário, o formulário pode ser configurado para oferecer automaticamente a atribuição de uma sub-habilidade em vez da habilidade selecionada.

*Padrão: `false`*

### `openbadges_backpack`

**URL do mochila OpenBadges**

A URL do servidor de mochila OpenBadges que será usado por padrão para todos os usuários que desejarem exportar suas insígnias. O padrão é o repositório gratuito e aberto da Mozilla Foundation: https://backpack.openbadges.org/

### `show_full_skill_name_on_skill_wheel`

**Mostrar nome completo da habilidade na roda de habilidades**

Na roda de habilidades, mostra o nome da habilidade quando ela possui um código curto.

*Padrão: `false`*

### `skill_levels_names`

**Nomes dos níveis de habilidade**

Define nomes para os níveis de habilidades como um array de id => nome.

### `skills_hierarchical_view_in_user_tracking`

**Mostrar habilidades como uma tabela hierárquica**

[inferido] Exibe as habilidades dos alunos como uma estrutura de árvore hierárquica nas páginas de progresso e relatórios.

*Padrão: `false`*

### `skills_teachers_can_assign_skills`

**Permitir que professores definam quais habilidades são adquiridas por meio de seus cursos**

Por padrão, apenas administradores podem decidir quais habilidades podem ser adquiridas por meio de qual curso.

*Padrão: `false`*