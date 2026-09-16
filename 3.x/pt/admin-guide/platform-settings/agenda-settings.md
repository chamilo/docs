# Definições da Agenda

Predefinições e comportamento da ferramenta **Agenda** (calendário / eventos).

Aceda a estas definições em **Administração > Definições de configuração > Agenda**. Esta categoria contém **11 definições**, listadas abaixo com o título e o comentário fornecidos nas fixtures de definições da plataforma (`SettingsCurrentFixtures.php`).

> O nome da variável no código é apresentado em monoespaçado. Utilize-o ao automatizar via API ou quando precisar de alterar essas definições a nível global editando [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Definições

### `agenda_colors`

**Cores da Agenda**

Defina cores em código HTML para cada tipo de evento, de modo a alterar a cor na apresentação do evento.

### `agenda_legend`

**Legendas de cores da Agenda**

Adicione um texto breve como legenda que descreva as cores utilizadas nos eventos.

### `agenda_on_hover_info`

**Informação ao pairar na Agenda**

Personalize a Agenda ao pairar o cursor. Mostre o comentário e/ou a descrição da agenda.

### `agenda_reminders_sender_id`

**ID do utilizador que envia oficialmente os lembretes da agenda**

Define qual o utilizador que aparece como remetente dos e-mails de lembrete da agenda.

*Predefinição: `0`*

### `allow_agenda_edit_for_hrm`

**Permitir que o papel HRM edite ou elimine eventos da agenda**

Isto confere um pouco mais de poder ao HRM, permitindo-lhe editar/eliminar eventos da agenda na sessão do curso.

*Predefinição: `false`*

### `allow_careers_in_global_agenda`

**Associar eventos do calendário global a carreiras e promoções**

Quando ativado, os eventos do calendário global podem ser associados a carreiras e promoções, permitindo um agendamento direcionado.

*Predefinição: `false`*

### `allow_personal_agenda`

**Agenda pessoal**

Pode o formando adicionar eventos pessoais à Agenda?

*Predefinição: `true`*

### `default_calendar_view`

**Modo de visualização predefinido do calendário**

Defina isto como dayGridMonth, basicWeek, agendaWeek ou agendaDay para alterar a vista predefinida do calendário.

*Predefinição: `month`*

### `fullcalendar_settings`

**Personalização do calendário**

Definições extra para a agenda, permitindo configurar a biblioteca de calendário específica que utilizamos.

### `personal_agenda_show_all_session_events`

**Mostrar todos os eventos da agenda na agenda pessoal**

Não ocultar eventos de sessões expiradas.

*Predefinição: `false`*

### `personal_calendar_show_sessions_occupation`

**Mostrar ocupações das sessões na agenda pessoal**

Quando ativado, os horários e as ocupações das sessões são apresentados nos calendários pessoais dos utilizadores.

*Predefinição: `false`*