# E-Mail-Konfiguration

Chamilo verwaltet nun die Konfiguration für den E-Mail-Versand über das Administrations-Dashboard im Bereich Plattformeinstellungen (es gibt einen speziellen Eintrag für E-Mails). E-Mails werden für die Erstellung von Konten, Passwort-Rücksetzungen, Kursbenachrichtigungen, Nachrichtenalarme und andere Plattformereignisse versendet. Die E-Mail-Zustellung wird über eine `MAILER_DSN`-Konfigurationseinstellung konfiguriert.

## Konfiguration

Setzen Sie die Option `Mail DSN` im Bereich /admin/settings/mail. Das Format hängt von Ihrem E-Mail-Transport ab.

### SMTP

Die häufigste Konfiguration, geeignet für jeden SMTP-Server:

```bash
# System entscheiden lassen
native://default

# Einfaches SMTP
smtp://username:password@smtp.example.com:587

# SMTP mit TLS (die meisten Anbieter)
smtp://username:password@smtp.example.com:587?encryption=tls

# SMTP ohne Authentifizierung (lokales Relay)
smtp://localhost:25
```

Ersetzen Sie `username`, `password` und den Host durch die Zugangsdaten Ihres SMTP-Servers.

### Amazon SES

```bash
# Über SMTP-Schnittstelle
ses+smtp://ACCESS_KEY:SECRET_KEY@default?region=us-east-1

# Über API
ses+api://ACCESS_KEY:SECRET_KEY@default?region=us-east-1
```

Der Symfony Amazon Mailer Transport ist in Chamilo integriert. Keine zusätzliche Installation erforderlich.

### Mailjet

```bash
mailjet+api://API_KEY:SECRET_KEY@default
```

Der Symfony Mailjet Transport ist in Chamilo integriert. Keine zusätzliche Installation erforderlich.

### Brevo (ehemals Sendinblue)

```bash
brevo+api://API_KEY@default
```

Der Symfony Brevo Transport ist in Chamilo integriert. Keine zusätzliche Installation erforderlich.

### Gmail (Entwicklung/Kleine Plattformen)

```bash
gmail+smtp://your-email@gmail.com:app-password@default
```

Verwenden Sie ein App-Passwort, nicht Ihr reguläres Gmail-Passwort. Dies ist nur für kleine Plattformen oder Entwicklungszwecke geeignet, da Gmail Versandlimits hat.

## Plattform-E-Mail-Einstellungen

Zusätzlich zum Transport konfigurieren Sie die Absenderidentität auf derselben Seite:

| Einstellung | Beschreibung |
|-------------|--------------|
| **Alle E-Mails als von diesem (organisatorischen) Namen stammend senden** | Der Anzeigename, der mit System-E-Mails verknüpft ist. |
| **Alle E-Mails von dieser E-Mail-Adresse senden** | Die "Von"-Adresse für alle System-E-Mails. Muss eine gültige Adresse sein, die von Ihrem Mail-Transport akzeptiert wird. Wir empfehlen die Verwendung einer "No-Reply"-Adresse wie `no-reply@yourdomain.com`, um sinnlose Antworten auf automatisierte E-Mails zu vermeiden. |

## Testen der E-Mail-Zustellung

Nach der Konfiguration von `MAILER_DSN` testen Sie, ob E-Mails zugestellt werden: Gehen Sie zu *Administration* > *System* > *E-Mail-Tester*, geben Sie einen Empfänger, einen Betreff und einen E-Mail-Text an und klicken Sie auf **Test-E-Mail senden**.

Wenn der Befehl ohne Fehler abgeschlossen wird, die E-Mail aber nicht empfangen wird:

1. Überprüfen Sie den Spam-/Junk-Ordner des Empfängers.
2. Vergewissern Sie sich, dass Ihre sendende Domain über korrekte DNS-Einträge (SPF, DKIM, DMARC) verfügt.
3. Überprüfen Sie die Versandprotokolle Ihres Mail-Anbieters auf Rückläufer oder Ablehnungen.
4. Überprüfen Sie das Chamilo-Protokoll unter `var/log/prod.log` auf Mailer-Fehler.
5. Aktivieren Sie in den E-Mail-Konfigurationseinstellungen *Mail: Debug* (nicht verfügbar in 2.0, wird bald verfügbar sein).

## Experimentell: E-Mail-Warteschlange (Asynchrone Zustellung)

Standardmäßig werden E-Mails synchron während der Webanfrage gesendet. Für eine bessere Leistung konfigurieren Sie die asynchrone Zustellung mit Symfony Messenger:

```yaml
# config/packages/messenger.yaml
framework:
    messenger:
        transports:
            async: '%env(MESSENGER_TRANSPORT_DSN)%'
        routing:
            'Symfony\Component\Mailer\Messenger\SendEmailMessage': async
```

Mit asynchroner Zustellung werden E-Mails in die Warteschlange gestellt und von einem Hintergrund-Worker gesendet:

```bash
php bin/console messenger:consume async
```

Führen Sie dies als Systemdienst aus (z. B. über systemd oder supervisord), damit es dauerhaft läuft.

## Tipps

* **Verwenden Sie einen dedizierten E-Mail-Dienst** (SES, Mailjet, Brevo) für Produktionsplattformen. Direkter SMTP-Versand über Ihren eigenen Mail-Server erfordert eine sorgfältige Konfiguration, um Zustellprobleme zu vermeiden.
* **Konfigurieren Sie SPF-, DKIM- und DMARC-DNS-Einträge** für Ihre sendende Domain, um die Zustellraten zu maximieren und zu verhindern, dass E-Mails als Spam markiert werden. Sie können auch DKIM-Header über die E-Mail-Einstellungsseite konfigurieren.
* **Verwenden Sie asynchrone Zustellung** auf Plattformen mit mehr als ein paar Dutzend aktiven Benutzern – synchroner E-Mail-Versand kann Webanfragen spürbar verlangsamen.