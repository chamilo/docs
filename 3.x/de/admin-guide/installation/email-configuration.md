# E-Mail-Konfiguration

Chamilo verwaltet die Konfiguration des E-Mail-Versands nun über das Administrations-Dashboard im Bereich Plattformeinstellungen (dort gibt es einen eigenen Eintrag für E-Mails). E-Mails werden bei der Kontoerstellung, beim Zurücksetzen von Passwörtern, bei Kursbenachrichtigungen, Nachrichtenhinweisen und anderen Plattformereignissen versendet. Der E-Mail-Versand wird über die Konfigurationseinstellung `MAILER_DSN` konfiguriert.

## Konfiguration

Legen Sie die Option `Mail DSN` im Bereich /admin/settings/mail fest. Das Format hängt von Ihrem E-Mail-Transport ab.

### SMTP

Die häufigste Konfiguration, geeignet für jeden SMTP-Server:

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

Microsoft stellt SMTP mit Basisauthentifizierung in Exchange Online ein. Daher funktioniert ein einfacher DSN `smtp://user:password@smtp.office365.com:587` nur so lange, wie der Mandantenadministrator „Authenticated SMTP“ für dieses bestimmte Postfach ausdrücklich aktiviert lässt. Senden Sie stattdessen über die Microsoft Graph API — sie verwendet SMTP überhaupt nicht:

```bash
microsoftgraph+api://CLIENT_ID:CLIENT_SECRET@default?tenantId=TENANT_ID
```

Der Symfony-Microsoft-Graph-Transport ist in Chamilo eingebettet. Es ist keine zusätzliche Installation erforderlich.

Um diese drei Werte zu erhalten, gehen Sie im [Microsoft Entra Admin Center](https://entra.microsoft.com) wie folgt vor:

1. Registrieren Sie eine Anwendung. Deren **Application (client) ID** und **Directory (tenant) ID** sind `CLIENT_ID` und `TENANT_ID`.
2. Fügen Sie unter *API permissions* die Microsoft-Graph-**Anwendungs**berechtigung `Mail.Send` hinzu (nicht die delegierte), und erteilen Sie anschließend die Administratorzustimmung.
3. Erstellen Sie unter *Certificates & secrets* ein Client Secret. Dessen **Wert** (nicht seine ID) ist `CLIENT_SECRET`.

Hinweise:

* URL-codieren Sie jedes Zeichen mit einer besonderen Bedeutung in einer URL, das im Client Secret vorkommt (`@` als `%40`, `+` als `%2B`, `/` als `%2F` und so weiter).
* Die unter **Send all e-mails from this e-mail address** konfigurierte Adresse muss ein echtes Postfach innerhalb Ihres Mandanten sein, andernfalls lehnt Microsoft die Nachricht ab.
* Fügen Sie `&noSave=true` zum DSN hinzu, wenn Sie nicht möchten, dass eine Kopie jeder Plattform-E-Mail im Ordner *Sent Items* des Absenders gespeichert wird.
* Verweisen Sie bei nationalen Clouds den DSN auf die richtigen Endpunkte, ohne das Präfix `https://`: `microsoftgraph+api://CLIENT_ID:CLIENT_SECRET@microsoftgraph.chinacloudapi.cn?tenantId=TENANT_ID&authEndpoint=login.partner.microsoftonline.cn`.

**Sicherheitshinweis:** Die *Anwendungs*berechtigung `Mail.Send` erlaubt der registrierten Anwendung, E-Mails als **jedes** Postfach im Mandanten zu senden, nicht nur als das von Chamilo verwendete. Beschränken Sie sie mit einer Exchange-Online-Anwendungszugriffsrichtlinie auf das Absenderpostfach:

```powershell
New-ApplicationAccessPolicy -AppId CLIENT_ID -PolicyScopeGroupId no-reply@yourdomain.com -AccessRight RestrictAccess -Description "Restrict Chamilo to its sender mailbox"
```

### Gmail (Entwicklung/kleine Plattformen)

```bash
gmail+smtp://your-email@gmail.com:app-password@default
```

Verwenden Sie ein App-Passwort, nicht Ihr reguläres Gmail-Passwort. Dies eignet sich nur für kleine Plattformen oder die Entwicklung, da Gmail Versandlimits hat.

## Plattform-E-Mail-Einstellungen

Konfigurieren Sie zusätzlich zum Transport auf derselben Seite die Absenderidentität:

| Einstellung | Beschreibung |
|---------|-------------|
| **Send all e-mails as originating from this (organizational) name** | Der Anzeigename, der mit System-E-Mails verknüpft ist. |
| **Send all e-mails from this e-mail address** | Die Absenderadresse („From“) für alle System-E-Mails. Sie muss eine gültige Adresse sein, die von Ihrem E-Mail-Transport akzeptiert wird. Wir empfehlen eine „No-Reply“-Adresse wie `no-reply@yourdomain.com`, um sinnlose Antworten auf automatisierte E-Mails zu vermeiden. |

---

## Eingehende Antworten auf Direktnachrichten

Chamilo kann einem Empfänger ermöglichen, auf eine Benachrichtigung über eine Direktnachricht aus seinem normalen E-Mail-Client zu antworten und diese Antwort in eine Nachricht im Chamilo-Posteingang umzuwandeln. Konfigurieren Sie Folgendes unter **Administration > Konfigurationseinstellungen > E-Mail**:

1. Setzen Sie **E-Mail-Antworten auf Nachrichten zulassen** (`enable_inbound_mail`) auf **Ja**.
2. Setzen Sie **Eingehende E-Mail-Adresse** (`inbound_mail_address`) auf eine gültige Basisadresse wie `replies@example.com`. Chamilo verwendet Plus-Adressierung, um für jeden Empfänger eine eindeutige Adresse wie `replies+TOKEN@example.com` zu erzeugen.
3. Leiten Sie diese eingehenden Nachrichten mit einer der folgenden Methoden zurück an Chamilo.

### Abfragen eines IMAP-Postfachs

Setzen Sie **DSN des eingehenden Postfachs** (`inbound_mail_dsn`) auf das Postfach, das die Antworten empfängt, zum Beispiel:

```text
imaps://user:password@imap.example.com:993/INBOX
```

Kodieren Sie reservierte Zeichen im Benutzernamen oder Passwort per URL-Encoding. Führen Sie anschließend den Postfach-Collector regelmäßig aus, beispielsweise alle fünf Minuten:

```bash
*/5 * * * * cd /path/to/chamilo && php bin/console chamilo:mail:fetch-inbound --no-interaction
```

Der Collector verarbeitet ungelesene Nachrichten stapelweise. Fehlgeschlagene Nachrichten bleiben standardmäßig ungelesen, damit sie erneut versucht werden können; verwenden Sie `--mark-failed-seen` nur, wenn Sie dieses Wiederholungsverhalten ausdrücklich nicht wünschen.

### Weiterleiten von E-Mails vom MTA per Pipe

Ein MTA kann stattdessen eine rohe RFC822-Nachricht direkt per Pipe an Chamilo übergeben:

```bash
php bin/console chamilo:mail:process-inbound
```

Der Befehl liest von STDIN; `--file` kann für eine gespeicherte Nachricht verwendet werden, und `--recipient` kann den SMTP-Envelope-Empfänger angeben, wenn der `To`-Header umgeschrieben wurde.

Aus Sicherheitsgründen akzeptiert Chamilo die Antwort nur, wenn ihr Token einen gültigen Nachrichtenempfänger identifiziert und die `From`-Adresse der Nachricht mit der E-Mail-Adresse dieses Empfängers in Chamilo übereinstimmt. Der ursprüngliche Absender und der antwortende Benutzer müssen weiterhin aktiv sein. Es wird nur der neue Antworttext gespeichert; zitierte Verläufe werden nach Möglichkeit entfernt.

## Nachverfolgung von E-Mail-Öffnungen

Setzen Sie **E-Mail-Öffnungen nachverfolgen** (`enable_email_open_tracking`) auf **Ja**, um Direktnachrichten-Benachrichtigungs-E-Mails ein kleines Tracking-Bild hinzuzufügen. Wenn dieses Bild angefordert wird, zeichnet Chamilo den Zeitpunkt auf und kann ihn in den **Gesendet**-Nachrichten des Absenders unter **E-Mail-Benachrichtigungen** anzeigen.

Ein Zeitstempel der Öffnungsnachverfolgung bedeutet lediglich, dass das Bild angefordert wurde. E-Mail-Clients können Bilder blockieren, vorab abrufen oder über einen Proxy laden; er darf daher nicht als Nachweis dafür gewertet werden, dass der Empfänger die Nachricht tatsächlich gelesen hat.

## Testen der E-Mail-Zustellung

Nach der Konfiguration von `MAILER_DSN` testen Sie, ob E-Mails zugestellt werden: Gehen Sie zu *Administration* > *System* > *E-Mail-Tester*, geben Sie einen Empfänger, einen Betreff und einen E-Mail-Text an und klicken Sie auf **Test-E-Mail senden**.

Wenn der Befehl ohne Fehler abgeschlossen wird, die E-Mail jedoch nicht ankommt:

1. Prüfen Sie den Spam-/Junk-Ordner des Empfängers.
2. Stellen Sie sicher, dass Ihre Versanddomain über korrekte DNS-Einträge verfügt (SPF, DKIM, DMARC).
3. Prüfen Sie die Versandprotokolle Ihres E-Mail-Anbieters auf Unzustellbarkeiten oder Ablehnungen.
4. Prüfen Sie das Chamilo-Protokoll unter `var/log/prod.log` auf Mailer-Fehler.
5. Aktivieren Sie in den E-Mail-Konfigurationseinstellungen *Mail: Debug* (in 3.0 nicht verfügbar, folgt in Kürze).

## Experimentell: E-Mail-Warteschlange (asynchrone Zustellung)

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

Bei asynchroner Zustellung werden E-Mails in eine Warteschlange gestellt und von einem Hintergrund-Worker gesendet:

```bash
php bin/console messenger:consume async
```

Führen Sie dies als Systemdienst aus (z. B. über systemd oder supervisord), damit es dauerhaft läuft.

## Tipps

* **Verwenden Sie einen dedizierten E-Mail-Dienst** (SES, Mailjet, Brevo) für Produktionsplattformen. Direktes SMTP an Ihren eigenen Mailserver erfordert eine sorgfältige Konfiguration, um Zustellbarkeitsprobleme zu vermeiden.
* **Konfigurieren Sie SPF-, DKIM- und DMARC-DNS-Einträge** für Ihre Versanddomain, um die Zustellraten zu maximieren und zu verhindern, dass E-Mails als Spam markiert werden. DKIM-Header können Sie auch auf der Seite mit den E-Mail-Einstellungen konfigurieren.
* **Verwenden Sie die asynchrone Zustellung** auf Plattformen mit mehr als einigen Dutzend aktiven Benutzern -- das synchrone Senden von E-Mails kann Webanfragen spürbar verlangsamen.