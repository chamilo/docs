# Definições de Tarefas Cron

Configuração das tarefas agendadas (tarefas cron) fornecidas com o Chamilo.

Aceda a estas definições em **Administração > Definições de configuração > Tarefas Cron**. Esta categoria contém **5 definições**, listadas abaixo com o título e o comentário fornecidos nas fixtures de definições da plataforma (`SettingsCurrentFixtures.php`).

> O nome da variável no código é apresentado em monoespaçado. Utilize-o ao criar scripts através da API ou quando precisar de alterar essas definições a um nível global editando [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Definições

### `cron_remind_course_expiration_activate`

**Cron de lembrete de expiração do curso**

Ativar o cron de lembrete de expiração do curso

*Predefinição: `false`*

### `cron_remind_course_expiration_frequency`

**Frequência do cron de lembrete de expiração do curso**

Número de dias antes da expiração do curso a considerar para o envio do e-mail de lembrete

### `cron_remind_course_finished_activate`

**Enviar notificação de curso concluído**

Se deve ser enviado um e-mail aos estudantes quando o respetivo curso (sessão) estiver concluído. Isto requer que as tarefas cron estejam configuradas (consulte o diretório main/cron/).

*Predefinição: `false`*

### `cron_certificate_expiry_reminder_activate`

**Cron de lembrete de expiração de certificado**

Ativar o cron `app:send-certificate-expiry-reminders`, que lembra os formandos cujos certificados expiraram ou estão prestes a expirar.

*Predefinição: `false`*

### `cron_certificate_expiry_reminder_days`

**Janela de lembrete de expiração de certificado (dias)**

Número predefinido de dias à frente para analisar certificados prestes a expirar, utilizado a menos que o cron seja executado com `--days-ahead`.

*Predefinição: `30`*

## Lembretes de expiração de certificados

Os certificados do boletim de notas podem ter um período de validade (em dias), configurado por categoria de boletim de notas — consulte [Certificados e Competências](../../teacher-guide/tracking-and-reporting/certificates-and-skills.md). Assim que um certificado tiver uma data de expiração, o Chamilo pode lembrar o formando por e-mail e mensagem interna à medida que essa data se aproxima (ou depois de ter sido ultrapassada).

Ativar `cron_certificate_expiry_reminder_activate` acima apenas liga a *funcionalidade*; o lembrete é efetivamente enviado por um comando de consola que ainda precisa de agendar ao nível do sistema operativo (por exemplo, via `crontab`), uma vez que o Chamilo não executa o seu próprio agendador em segundo plano:

```bash
php bin/console app:send-certificate-expiry-reminders
```

Opções úteis:

| Opção | Efeito |
|--------|--------|
| `--days-ahead=N` | Quantos dias à frente da expiração incluir (predefinição: `cron_certificate_expiry_reminder_days`) |
| `--force` | Enviar efetivamente os lembretes. Sem esta opção, o comando apenas reporta o que *enviaria* — seguro de executar para verificar antes de o ligar ao cron |
| `--resend` | Reenviar lembretes mesmo para um par certificado/data de expiração já notificado |
| `--access-url-id=N` | Restringir a análise a um portal (instalações multi-URL) |
| `--include-unsubscribed-users` | Notificar também formandos que cancelaram a subscrição de e-mails da plataforma |

Os professores podem enviar os mesmos lembretes manualmente, sem necessitarem deste cron — consulte [Certificados e Competências](../../teacher-guide/tracking-and-reporting/certificates-and-skills.md#certificate-validity-and-expiry).