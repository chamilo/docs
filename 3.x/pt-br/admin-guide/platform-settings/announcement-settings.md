# Configurações de Anúncios

Comportamento da ferramenta **Anúncios** do curso — como os anúncios são enviados e agendados.

Acesse estas configurações em **Administração > Configurações > Anúncios**. Esta categoria contém **10 configurações**, listadas abaixo com o título e o comentário fornecidos nas fixtures de configurações da plataforma (`SettingsCurrentFixtures.php`).

> O nome da variável no código é mostrado em monoespaçado. Use-o ao criar scripts via API ou quando precisar alterar essas configurações em nível global editando [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Configurações

### `allow_careers_in_global_announcements`

**Vincular anúncios globais a carreiras e promoções**

Quando habilitado, os anúncios globais podem ser associados a carreiras e promoções para distribuição direcionada.

*Padrão: `false`*

### `allow_coach_to_edit_announcements`

**Permitir que tutores sempre editem anúncios**

Permitir que tutores sempre editem anúncios dentro de sessões ativas ou passadas.

*Padrão: `false`*

### `allow_scheduled_announcements`

**Habilitar anúncios agendados em sessões**

Permite que os gestores de sessões definam anúncios que serão disparados em datas específicas ou após/antes de um número de dias do início/fim da sessão. Habilitar este recurso exige que você configure uma tarefa cron.

*Padrão: `false`*

### `announcements_hide_send_to_hrm_users`

**Ocultar opção de enviar anúncios a usuários de RH**

Remove a caixa de seleção para habilitar o envio de anúncios a usuários com papéis de RH (ainda é necessário confirmar na ferramenta de anúncios).

*Padrão: `true`*

### `course_announcement_scheduled_by_date`

**Anúncios baseados em data**

Permite que professores configurem anúncios que serão enviados em datas específicas. Isso exige que você configure uma tarefa cron em cron/course_announcement.php executando pelo menos uma vez ao dia.

*Padrão: `false`*

### `disable_announcement_attachment`

**Desabilitar anexo em anúncios**

Embora os anexos nesta versão sejam tratados de forma elegante e não se multipliquem no disco, você pode querer desabilitar os anexos por completo se quiser evitar excessos.

*Padrão: `false`*

### `disable_delete_all_announcements`

**Desabilitar botão para excluir todos os anúncios**

Selecione 'Sim' para remover o botão de excluir todos os anúncios, pois ele pode ser usado por engano pelos professores.

*Padrão: `false`*

### `hide_announcement_sent_to_users_info`

**Ocultar 'enviado para' nos anúncios**

Selecione 'Sim' para evitar mostrar a quem um anúncio foi enviado.

*Padrão: `false`*

### `hide_global_announcements_when_not_connected` **v3**

**Ocultar anúncios globais para anônimos**

Oculta os anúncios da plataforma de usuários anônimos e os exibe apenas a usuários autenticados.

*Padrão: `false`*

### `hide_send_to_hrm_users`

**Ocultar a opção de enviar uma cópia do anúncio ao HRM**

No formulário de anúncios, normalmente aparece uma opção para permitir que professores enviem uma cópia do anúncio ao HRM do usuário. Defina como 'Sim' para remover a opção (e *não* enviar a cópia).