# Configurações de Anúncios

Comportamento da ferramenta de **Anúncios** do curso — como os anúncios são enviados e agendados.

Acesse essas configurações em **Administração > Configurações de configuração > Anúncios**. Esta categoria contém **9 configurações**, listadas abaixo com o título e o comentário fornecidos nos arquivos de configurações da plataforma (`SettingsCurrentFixtures.php`).

> O nome da variável no código é mostrado em fonte monoespaçada. Use-o ao criar scripts via API ou quando precisar alterar essas configurações em um nível global editando [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Configurações

### `allow_careers_in_global_announcements`

**Vincular anúncios globais a carreiras e promoções**

Quando ativado, os anúncios globais podem ser associados a carreiras e promoções para distribuição direcionada.

*Padrão: `false`*

### `allow_coach_to_edit_announcements`

**Permitir que treinadores sempre editem anúncios**

Permite que treinadores sempre editem anúncios dentro de sessões ativas ou passadas.

*Padrão: `false`*

### `allow_scheduled_announcements`

**Habilitar anúncios agendados em sessões**

Permite que os gerentes de sessões configurem anúncios que serão disparados em datas específicas ou após/antes de um número de dias do início/fim da sessão. Ativar esse recurso exige que você configure uma tarefa cron.

*Padrão: `false`*

### `announcements_hide_send_to_hrm_users`

**Ocultar opção de enviar anúncios para usuários de RH**

Remove a caixa de seleção para habilitar o envio de anúncios para usuários com papéis de RH (ainda exige confirmação na ferramenta de anúncios).

*Padrão: `true`*

### `course_announcement_scheduled_by_date`

**Anúncios baseados em datas**

Permite que professores configurem anúncios que serão enviados em datas específicas. Isso exige que você configure uma tarefa cron em cron/course_announcement.php executando pelo menos uma vez ao dia.

*Padrão: `false`*

### `disable_announcement_attachment`

**Desativar anexos em anúncios**

Embora os anexos nesta versão sejam tratados de forma elegante e não se multipliquem no disco, você pode querer desativar os anexos completamente se desejar evitar excessos.

*Padrão: `false`*

### `disable_delete_all_announcements`

**Desativar botão para excluir todos os anúncios**

Selecione 'Sim' para remover o botão de excluir todos os anúncios, pois isso pode ser usado por engano pelos professores.

*Padrão: `false`*

### `hide_announcement_sent_to_users_info`

**Ocultar 'enviado para' em anúncios**

Selecione 'Sim' para evitar mostrar para quem um anúncio foi enviado.

*Padrão: `false`*

### `hide_send_to_hrm_users`

**Ocultar a opção de enviar uma cópia do anúncio para o RH**

No formulário de anúncios, normalmente aparece uma opção que permite aos professores enviar uma cópia do anúncio para o RH do usuário. Defina como 'Sim' para remover a opção (e *não* enviar a cópia).