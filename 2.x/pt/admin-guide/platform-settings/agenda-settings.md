# Configurações da Agenda

Padrões e comportamento da ferramenta **Agenda** (calendário / eventos).

Acesse essas configurações em **Administração > Configurações de configuração > Agenda**. Esta categoria contém **11 configurações**, listadas abaixo com o título e comentário fornecidos nos arquivos de configurações da plataforma (`SettingsCurrentFixtures.php`).

> O nome da variável no código é mostrado em fonte monoespaçada. Use-o ao criar scripts via API ou quando precisar alterar essas configurações em um nível global editando [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Configurações

### `agenda_colors`

**Cores da Agenda**

Defina cores em código HTML para cada tipo de evento para alterar a cor ao exibir o evento.

### `agenda_legend`

**Legendas de cores da Agenda**

Adicione um pequeno texto como legenda descrevendo as cores usadas para os eventos.

### `agenda_on_hover_info`

**Informações ao passar o cursor na Agenda**

Personalize a agenda ao passar o cursor. Mostre o comentário e/ou descrição da agenda.

### `agenda_reminders_sender_id`

**ID do usuário que oficialmente envia os lembretes da agenda**

Define qual usuário aparece como remetente dos e-mails de lembrete da agenda.

*Padrão: `0`*

### `allow_agenda_edit_for_hrm`

**Permitir que o papel de HRM edite ou exclua eventos da agenda**

Isso concede ao HRM um pouco mais de poder, permitindo que eles editem/excluam eventos da agenda no curso-sessão.

*Padrão: `false`*

### `allow_careers_in_global_agenda`

**Vincular eventos do calendário global a carreiras e promoções**

Quando ativado, os eventos do calendário global podem ser associados a carreiras e promoções, permitindo um agendamento direcionado.

*Padrão: `false`*

### `allow_personal_agenda`

**Agenda Pessoal**

O aluno pode adicionar eventos pessoais à Agenda?

*Padrão: `true`*

### `default_calendar_view`

**Modo de exibição padrão do calendário**

Defina como dayGridMonth, basicWeek, agendaWeek ou agendaDay para alterar a visualização padrão do calendário.

*Padrão: `month`*

### `fullcalendar_settings`

**Personalização do Calendário**

Configurações extras para a agenda, permitindo que você configure a biblioteca de calendário específica que usamos.

### `personal_agenda_show_all_session_events`

**Exibir todos os eventos da agenda na agenda pessoal**

Não ocultar eventos de sessões expiradas.

*Padrão: `false`*

### `personal_calendar_show_sessions_occupation`

**Exibir ocupações de sessões na agenda pessoal**

Quando ativado, os horários e ocupações das sessões são exibidos nos calendários pessoais dos usuários.

*Padrão: `false`*