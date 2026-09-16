# Definições de Assiduidade

Predefinições e comportamento da ferramenta **Attendance**.

Aceda a estas definições em **Administração > Definições de configuração > Attendance**. Esta categoria contém **5 definições**, listadas abaixo com o título e o comentário fornecidos nas fixtures de definições da plataforma (`SettingsCurrentFixtures.php`).

> O nome da variável no código é apresentado em monoespaçado. Utilize-o ao criar scripts através da API ou quando precisar de alterar essas definições a um nível global editando [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Definições

### `allow_delete_attendance`

**Assiduidades: permitir eliminação**

O comportamento predefinido no Chamilo é ocultar as folhas de assiduidade em vez de as eliminar, para o caso de o professor o fazer por engano. Ative esta opção para permitir que os professores *realmente* eliminem as folhas de assiduidade.

*Predefinição: `true`*

### `attendance_allow_comments`

**Permitir comentários nas folhas de assiduidade**

Professores e estudantes podem comentar cada assiduidade individual (para justificar).

*Predefinição: `false`*

### `attendance_calendar_set_duration` **v3**

**Duração dos eventos de assiduidade**

Opção para definir a duração de um evento na folha de assiduidade.

*Predefinição: `false`*

### `enable_sign_attendance_sheet`

**Assinatura de assiduidade**

Ativar a recolha de assinaturas para confirmar a assiduidade.

*Predefinição: `false`*

### `multilevel_grading`

**Ativar classificação de assiduidade multinível**

Permite classificar a assiduidade com vários níveis em vez de um sistema simples de presente/ausente.

*Predefinição: `false`*