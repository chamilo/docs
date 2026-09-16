# Configurações de Tarefas Agendadas (Cron Jobs)

Configuração de tarefas agendadas (tarefas cron) fornecidas com o Chamilo.

Acesse essas configurações em **Administração > Configurações de configuração > Tarefas Agendadas (Cron Jobs)**. Esta categoria contém **3 configurações**, listadas abaixo com o título e o comentário fornecidos nos arquivos de configurações padrão da plataforma (`SettingsCurrentFixtures.php`).

> O nome da variável no código é mostrado em fonte monoespaçada. Use-o ao criar scripts via API ou quando precisar alterar essas configurações em um nível global editando [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Configurações

### `cron_remind_course_expiration_activate`

**Lembrete de Expiração de Curso (cron)**

Ativar o cron de Lembrete de Expiração de Curso

*Padrão: `false`*

### `cron_remind_course_expiration_frequency`

**Frequência do cron de Lembrete de Expiração de Curso**

Número de dias antes da expiração do curso para considerar o envio de e-mail de lembrete

### `cron_remind_course_finished_activate`

**Enviar notificação de curso concluído**

Define se deve ser enviado um e-mail aos alunos quando o curso (sessão) deles for concluído. Isso requer que as tarefas cron estejam configuradas (consulte o diretório main/cron/).

*Padrão: `false`*