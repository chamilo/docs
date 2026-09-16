# Cron-Job-Einstellungen

Konfiguration der mit Chamilo ausgelieferten geplanten Aufgaben (Cron-Jobs).

Diese Einstellungen finden Sie unter **Administration > Konfigurationseinstellungen > Cron-Jobs**. Diese Kategorie enthält **5 Einstellungen**, die nachfolgend mit dem Titel und dem Kommentar aufgeführt sind, wie sie in den Einstellungs-Fixtures der Plattform (`SettingsCurrentFixtures.php`) hinterlegt sind.

> Der Variablenname im Code wird in Monospace dargestellt. Verwenden Sie ihn beim Skripten über die API oder wenn Sie diese Einstellungen global ändern möchten, indem Sie [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) bearbeiten.

## Einstellungen

### `cron_remind_course_expiration_activate`

**Cron „Erinnerung an Kursablauf“**

Aktiviert den Cron „Erinnerung an Kursablauf“

*Standard: `false`*

### `cron_remind_course_expiration_frequency`

**Häufigkeit für den Cron „Erinnerung an Kursablauf“**

Anzahl der Tage vor Ablauf des Kurses, die für den Versand der Erinnerungs-E-Mail berücksichtigt werden

### `cron_remind_course_finished_activate`

**Benachrichtigung über abgeschlossenen Kurs senden**

Ob Studierenden eine E-Mail gesendet werden soll, wenn ihr Kurs (Session) abgeschlossen ist. Dies setzt konfigurierte Cron-Aufgaben voraus (siehe Verzeichnis main/cron/).

*Standard: `false`*

### `cron_certificate_expiry_reminder_activate`

**Cron „Erinnerung an Zertifikatsablauf“**

Aktiviert den Cron `app:send-certificate-expiry-reminders`, der Lernende erinnert, deren Zertifikate abgelaufen sind oder bald ablaufen.

*Standard: `false`*

### `cron_certificate_expiry_reminder_days`

**Zeitfenster für Erinnerung an Zertifikatsablauf (Tage)**

Standardanzahl der Tage im Voraus, in denen nach bald ablaufenden Zertifikaten gesucht wird, sofern der Cron nicht mit `--days-ahead` ausgeführt wird.

*Standard: `30`*

## Erinnerungen an den Zertifikatsablauf

Gradebook-Zertifikaten kann eine Gültigkeitsdauer (in Tagen) zugewiesen werden, die pro Gradebook-Kategorie konfiguriert wird — siehe [Zertifikate und Kompetenzen](../../teacher-guide/tracking-and-reporting/certificates-and-skills.md). Sobald ein Zertifikat ein Ablaufdatum hat, kann Chamilo den Lernenden per E-Mail und interner Nachricht erinnern, wenn dieses Ablaufdatum näher rückt (oder nachdem es überschritten wurde).

Das Aktivieren von `cron_certificate_expiry_reminder_activate` oben schaltet lediglich die *Funktion* ein; die Erinnerung wird tatsächlich von einem Konsolenbefehl gesendet, den Sie weiterhin auf Betriebssystemebene planen müssen (z. B. über `crontab`), da Chamilo keinen eigenen Hintergrund-Scheduler ausführt:

```bash
php bin/console app:send-certificate-expiry-reminders
```

Nützliche Optionen:

| Option | Wirkung |
|--------|--------|
| `--days-ahead=N` | Wie viele Tage vor dem Ablauf einbezogen werden (Standard ist `cron_certificate_expiry_reminder_days`) |
| `--force` | Sendet die Erinnerungen tatsächlich. Ohne diese Option meldet der Befehl nur, was er *senden würde* — sicher zum Prüfen, bevor er in den Cron eingebunden wird |
| `--resend` | Sendet Erinnerungen erneut, auch für ein bereits benachrichtigtes Paar aus Zertifikat und Ablaufdatum |
| `--access-url-id=N` | Beschränkt die Suche auf ein Portal (Installationen mit mehreren URLs) |
| `--include-unsubscribed-users` | Benachrichtigt auch Lernende, die sich von Plattform-E-Mails abgemeldet haben |

Lehrende können dieselben Erinnerungen manuell senden, ohne diesen Cron zu benötigen — siehe [Zertifikate und Kompetenzen](../../teacher-guide/tracking-and-reporting/certificates-and-skills.md#certificate-validity-and-expiry).