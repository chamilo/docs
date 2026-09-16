# Configurações de Anúncios

Comportamento da ferramenta **Anúncios** do curso — como os anúncios são enviados e agendados.

Aceda a estas configurações em **Administração > Configurações > Anúncios**. Esta categoria contém **10 configurações**, listadas abaixo com o título e o comentário fornecidos nas fixtures de configurações da plataforma (`SettingsCurrentFixtures.php`).

> O nome da variável no código é apresentado em monoespaçado. Utilize-o ao automatizar via API ou quando precisar de alterar essas configurações a nível global editando [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Configurações

### `allow_careers_in_global_announcements`

**Associar anúncios globais a carreiras e promoções**

Quando ativado, os anúncios globais podem ser associados a carreiras e promoções para uma distribuição direcionada.

*Predefinição: `false`*

### `allow_coach_to_edit_announcements`

**Permitir que os tutores editem sempre os anúncios**

Permitir que os tutores editem sempre os anúncios em sessões ativas ou passadas.

*Predefinição: `false`*

### `allow_scheduled_announcements`

**Ativar anúncios agendados nas sessões**

Permite que os gestores de sessões definam anúncios que serão disparados em datas específicas ou após/antes de um determinado número de dias relativamente ao início/fim da sessão. Ativar esta funcionalidade exige a configuração de uma tarefa cron.

*Predefinição: `false`*

### `announcements_hide_send_to_hrm_users`

**Ocultar a opção de enviar anúncios a utilizadores de RH**

Remove a caixa de seleção que permite o envio de anúncios a utilizadores com papéis de RH (continua a ser necessário confirmar na ferramenta de anúncios).

*Predefinição: `true`*

### `course_announcement_scheduled_by_date`

**Anúncios baseados em data**

Permitir que os professores configurem anúncios que serão enviados em datas específicas. Isto exige a configuração de uma tarefa cron em cron/course_announcement.php a executar pelo menos uma vez por dia.

*Predefinição: `false`*

### `disable_announcement_attachment`

**Desativar anexos nos anúncios**

Embora os anexos nesta versão sejam tratados de forma elegante e não se multipliquem em disco, poderá querer desativar os anexos por completo se pretender evitar excessos.

*Predefinição: `false`*

### `disable_delete_all_announcements`

**Desativar o botão para eliminar todos os anúncios**

Selecione «Sim» para remover o botão de eliminar todos os anúncios, pois este pode ser utilizado por engano pelos professores.

*Predefinição: `false`*

### `hide_announcement_sent_to_users_info`

**Ocultar «enviado para» nos anúncios**

Selecione «Sim» para evitar mostrar a quem um anúncio foi enviado.

*Predefinição: `false`*

### `hide_global_announcements_when_not_connected` **v3**

**Ocultar anúncios globais para anónimos**

Ocultar os anúncios da plataforma dos utilizadores anónimos e mostrá-los apenas aos utilizadores autenticados.

*Predefinição: `false`*

### `hide_send_to_hrm_users`

**Ocultar a opção de enviar uma cópia do anúncio ao HRM**

No formulário de anúncios, aparece normalmente uma opção que permite aos professores enviar uma cópia do anúncio ao HRM do utilizador. Defina isto como «Sim» para remover a opção (e *não* enviar a cópia).