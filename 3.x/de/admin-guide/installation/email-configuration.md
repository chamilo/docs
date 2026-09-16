# E-Mail-Konfiguration

Chamilo verwaltet die Konfiguration des E-Mail-Versands nun über das Administrations-Dashboard, Abschnitt Plattformeinstellungen (es gibt einen eigenen Eintrag für E-Mails). E-Mails werden bei Kontoerstellungen, Passwortzurücksetzungen, Kursbenachrichtigungen, Nachrichtenhinweisen und anderen Plattformereignissen versendet. Die E-Mail-Zustellung wird über eine Konfigurationseinstellung `MAILER_DSN` konfiguriert.

## Konfiguration

Setzen Sie die Option `Mail DSN` im Abschnitt /admin/settings/mail. Das Format hängt von Ihrem E-Mail-Transport ab.

### SMTP

Die gebräuchlichste Konfiguration, geeignet für jeden SMTP-Server:

```bash
# Let the system decide
native://default

# Basic SMTP
smtp://username:password@smtp.example.com:587

# SMTP with TLS (most providers)
smtp://username:password@smtp.example.com:587?encryption=tls

# SMTP without authentication (local relay)
smtp://localhost:25
```

Ersetzen Sie `username`, `password` und den Host durch die Zugangsdaten Ihres SMTP-Servers.

### Amazon SES

```bash
# Using SMTP interface
ses+smtp://ACCESS_KEY:SECRET_KEY@default?region=us-east-1

# Using API
ses+api://ACCESS_KEY:SECRET_KEY@default?region=us-east-1
```

Der Symfony-Amazon-Mailer-Transport ist in Chamilo eingebettet. Es ist keine zusätzliche Installation erforderlich.

### Mailjet

```bash
mailjet+api://API_KEY:SECRET_KEY@default
```

Der Symfony-Mailjet-Transport ist in Chamilo eingebettet. Es ist keine zusätzliche Installation erforderlich.

### Brevo (ehemals Sendinblue)

```bash
brevo+api://API_KEY@default
```

Der Symfony-Brevo-Transport ist in Chamilo eingebettet. Es ist keine zusätzliche Installation erforderlich.

### Microsoft 365 / Outlook (Microsoft Graph API)

Microsoft stellt SMTP mit Basisauthentifizierung in Exchange Online ein, sodass eine einfache DSN `smtp://user:password@smtp.office365.com:587` nur funktioniert, solange der Mandantenadministrator „Authenticated SMTP“ für dieses konkrete Postfach ausdrücklich aktiviert lässt. Senden Sie stattdessen über die Microsoft Graph API — sie verwendet SMTP überhaupt nicht:

```bash
microsoftgraph+api://CLIENT_ID:CLIENT_SECRET@default?tenantId=TENANT_ID
```

Der Symfony-Microsoft-Graph-Transport ist in Chamilo eingebettet. Es ist keine zusätzliche Installation erforderlich.

Um diese drei Werte zu erhalten, im [Microsoft Entra Admin Center](https://entra.microsoft.com):

1. Registrieren Sie eine Anwendung. Ihre **Anwendungs-ID (Client)** und **Verzeichnis-ID (Mandant)** sind `CLIENT_ID` und `TENANT_ID`.
2. Unter *API-Berechtigungen* fügen Sie die Microsoft-Graph-**Anwendungsberechtigung** `Mail.Send` hinzu (nicht die delegierte), und erteilen Sie anschließend die Administratorzustimmung.
3. Unter *Zertifikate & Geheimnisse* erstellen Sie ein Clientgeheimnis. Sein **Wert** (nicht seine ID) ist `CLIENT_SECRET`.

Hinweise:

* URL-kodieren Sie jedes Zeichen mit besonderer Bedeutung in einer URL, das im Clientgeheimnis vorkommt (`@` als `%40`, `+` als `%2B`, `/` als `%2F` usw.).
* Die unter **Alle E-Mails von dieser E-Mail-Adresse senden** konfigurierte Adresse muss ein echtes Postfach in Ihrem Mandanten sein, andernfalls lehnt Microsoft die Nachricht ab.
* Fügen Sie `&noSave=true` zur DSN hinzu, wenn Sie keine Kopie jeder Plattform-E-Mail im Ordner *Gesendete Elemente* des Absenders speichern möchten.
* Für nationale Clouds richten Sie die DSN auf die richtigen Endpunkte, ohne das Präfix `https://`: `microsoftgraph+api://CLIENT_ID:CLIENT_SECRET@microsoftgraph.chinacloudapi.cn?tenantId=TENANT_ID&authEndpoint=login.partner.microsoftonline.cn`.

**Sicherheitshinweis:** Die *Anwendungsberechtigung* `Mail.Send` erlaubt der registrierten Anwendung, E-Mails als **jedes** Postfach im Mandanten zu senden, nicht nur als das von Chamilo verwendete. Beschränken Sie sie mit einer Exchange-Online-Anwendungszugriffsrichtlinie auf das Absenderpostfach:

```powershell
New-ApplicationAccessPolicy -AppId CLIENT_ID -PolicyScopeGroupId no-reply@yourdomain.com -AccessRight RestrictAccess -Description "Restrict Chamilo to its sender mailbox"
```

### Gmail (Entwicklung/kleine Plattformen)

```bash
gmail+smtp://your-email@gmail.com:app-password@default
```

Verwenden Sie ein App-Passwort, nicht Ihr reguläres Gmail-Passwort. Dies eignet sich nur für kleine Plattformen oder die Entwicklung, da Gmail Versandlimits hat.

## Plattform-E-Mail-Einstellungen

Zusätzlich zum Transport konfigurieren Sie die Absenderidentität auf derselben Seite:

| Einstellung | Beschreibung |
|---------|-------------|
| **Alle E-Mails als von diesem (organisatorischen) Namen stammend senden** | Der Anzeigename, der mit System-E-Mails verknüpft ist. |
| **Alle E-Mails von dieser E-Mail-Adresse senden** | Die „Von“-Adresse für alle System-E-Mails. Muss eine gültige Adresse sein, die Ihr E-Mail-Transport akzeptiert. Wir empfehlen eine „no reply“-Adresse wie `no-reply@yourdomain.com`, um sinnlose Antworten auf automatisierte E-Mails zu vermeiden. |

## E-Mail-Zustellung testen

Nach der Konfiguration von `MAILER_DSN` testen Sie, ob E-Mails zugestellt werden: Gehen Sie zu *Administration* > *System* > *E-Mail-Tester*, geben Sie einen Empfänger, einen Betreff und einen E-Mail-Text an und klicken Sie auf **Test-E-Mail senden**.

Wenn der Befehl ohne Fehler abgeschlossen wird, die E-Mail aber nicht empfangen wird:

1. Prüfen Sie den Spam-/Junk-Ordner des Empfängers.
2. Stellen Sie sicher, dass Ihre Absenderdomäne über korrekte DNS-Einträge verfügt (SPF, DKIM, DMARC).
3. Prüfen Sie die Versandprotokolle Ihres E-Mail-Anbieters auf Bounces oder Ablehnungen.
4. Prüfen Sie das Chamilo-Protokoll unter `var/log/prod.log` auf Mailer-Fehler.
5. Aktivieren Sie in den E-Mail-Konfigurationseinstellungen *Mail: Debug* (in 3.0 nicht verfügbar, folgt in Kürze).

## Experimentell: E-Mail-Warteschlange (asynchrone Zustellung)

Standardmäßig werden E-Mails synchron während der Web-Anfrage gesendet. Für eine bessere Leistung konfigurieren Sie die asynchrone Zustellung mit Symfony Messenger:

```yaml
# config/packages/messenger.yaml
framework:
    messenger:
        transports:
            async: '%env(MESSENGER_TRANSPORT_DSN)%'
        routing:
            'Symfony\Component\Mailer\Messenger\SendEmailMessage': async
```

Bei asynchroner Zustellung werden E-Mails in eine Warteschlange gestellt und von einem Hintergrund-Worker versendet:

```bash
php bin/console messenger:consume async
```

Führen Sie dies als Systemdienst aus (z. B. über systemd oder supervisord), damit der Prozess dauerhaft läuft.

## Tipps

* **Verwenden Sie einen dedizierten E-Mail-Dienst** (SES, Mailjet, Brevo) für Produktionsplattformen. Direktes SMTP an Ihren eigenen Mailserver erfordert eine sorgfältige Konfiguration, um Zustellbarkeitsprobleme zu vermeiden.
* **Konfigurieren Sie SPF-, DKIM- und DMARC-DNS-Einträge** für Ihre Absenderdomäne, um die Zustellraten zu maximieren und zu verhindern, dass E-Mails als Spam markiert werden. Sie können DKIM-Header auch auf der Seite der E-Mail-Einstellungen konfigurieren.
* **Verwenden Sie asynchrone Zustellung** auf Plattformen mit mehr als einigen Dutzend aktiven Nutzern – synchrones E-Mail-Versenden kann Web-Anfragen spürbar verlangsamen.