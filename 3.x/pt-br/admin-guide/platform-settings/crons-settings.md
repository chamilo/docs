# Configurações de Tarefas Cron

Configuração das tarefas agendadas (tarefas cron) fornecidas com o Chamilo.

Acesse essas configurações em **Administração > Configurações > Tarefas Cron**. Esta categoria contém **5 configurações**, listadas abaixo com o título e o comentário fornecidos nos fixtures de configurações da plataforma (`SettingsCurrentFixtures.php`).

> O nome da variável no código é exibido em monoespaçado. Use-o ao criar scripts via API ou quando precisar alterar essas configurações em nível global editando [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Configurações

### `cron_remind_course_expiration_activate`

**Cron de Lembrete de Expiração do Curso**

Ativar o cron de Lembrete de Expiração do Curso

*Padrão: `false`*

### `cron_remind_course_expiration_frequency`

**Frequência do cron de Lembrete de Expiração do Curso**

Número de dias antes da expiração do curso a considerar para o envio do e-mail de lembrete

### `cron_remind_course_finished_activate`

**Enviar notificação de curso concluído**

Se deve enviar um e-mail aos alunos quando o curso (sessão) deles for concluído. Isso exige que as tarefas cron estejam configuradas (veja o diretório main/cron/).

*Padrão: `false`*

### `cron_certificate_expiry_reminder_activate`

**Cron de lembrete de expiração de certificado**

Ativar o cron `app:send-certificate-expiry-reminders`, que lembra os aprendizes cujos certificados expiraram ou estão prestes a expirar.

*Padrão: `false`*

### `cron_certificate_expiry_reminder_days`

**Janela de lembrete de expiração de certificado (dias)**

Número padrão de dias à frente para varrer certificados prestes a expirar, usado a menos que o cron seja executado com `--days-ahead`.

*Padrão: `30`*

## Lembretes de Expiração de Certificados

Os certificados do boletim (gradebook) podem receber um período de validade (em dias), configurado por categoria de boletim — veja [Certificados e Competências](../../teacher-guide/tracking-and-reporting/certificates-and-skills.md). Depois que um certificado tem uma data de expiração, o Chamilo pode lembrar o aprendiz por e-mail e mensagem interna à medida que essa data se aproxima (ou após ela ter passado).

Ativar `cron_certificate_expiry_reminder_activate` acima apenas liga o *recurso*; o lembrete é de fato enviado por um comando de console que você ainda precisa agendar no nível do sistema operacional (por exemplo, via `crontab`), pois o Chamilo não executa seu próprio agendador em segundo plano:

```bash
php bin/console app:send-certificate-expiry-reminders
```

Opções úteis:

| Opção | Efeito |
|--------|--------|
| `--days-ahead=N` | Quantos dias à frente da expiração incluir (o padrão é `cron_certificate_expiry_reminder_days`) |
| `--force` | Enviar de fato os lembretes. Sem isso, o comando apenas relata o que *enviaria* — seguro para executar e conferir antes de incluí-lo no cron |
| `--resend` | Reenviar lembretes mesmo para um par certificado/data de expiração já notificado |
| `--access-url-id=N` | Restringir a varredura a um portal (instalações multi-URL) |
| `--include-unsubscribed-users` | Notificar também aprendizes que cancelaram a inscrição nos e-mails da plataforma |

Os professores podem enviar os mesmos lembretes manualmente, sem precisar deste cron — veja [Certificados e Competências](../../teacher-guide/tracking-and-reporting/certificates-and-skills.md#certificate-validity-and-expiry).