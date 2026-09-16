# Configurações de Frequência

Padrões e comportamento da ferramenta **Attendance**.

Acesse estas configurações em **Administração > Configurações > Frequência**. Esta categoria contém **5 configurações**, listadas abaixo com o título e o comentário fornecidos nos fixtures de configurações da plataforma (`SettingsCurrentFixtures.php`).

> O nome da variável no código é mostrado em monoespaçado. Use-o ao automatizar via API ou quando precisar alterar essas configurações em nível global editando [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Configurações

### `allow_delete_attendance`

**Frequências: habilitar exclusão**

O comportamento padrão no Chamilo é ocultar as folhas de frequência em vez de excluí-las, para o caso de o professor fazê-lo por engano. Habilite esta opção para permitir que os professores *realmente* excluam as folhas de frequência.

*Padrão: `true`*

### `attendance_allow_comments`

**Permitir comentários nas folhas de frequência**

Professores e alunos podem comentar em cada frequência individual (para justificar).

*Padrão: `false`*

### `attendance_calendar_set_duration` **v3**

**Duração dos eventos de frequência**

Opção para definir a duração de um evento na folha de frequência.

*Padrão: `false`*

### `enable_sign_attendance_sheet`

**Assinatura de frequência**

Habilita a coleta de assinaturas para confirmar a presença.

*Padrão: `false`*

### `multilevel_grading`

**Habilitar avaliação multinível de frequência**

Permite avaliar a frequência com vários níveis em vez de um sistema simples de presente/ausente.

*Padrão: `false`*