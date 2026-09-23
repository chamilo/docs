# MCP (Model Context Protocol)

Chamilo 3.0 stellt einen MCP-Server bereit, damit KI-Assistenten und -Agenten (Claude, ChatGPT-Connectors oder jeder MCP-kompatible Client) innerhalb der Plattform im Namen eines authentifizierten Benutzers handeln können – und zwar mit den eigenen Berechtigungen dieses Benutzers. Es gibt kein separates Dienstkonto und keinen privilegierten Zugriff.

## Was MCP zu Chamilo hinzufügt

MCP (Model Context Protocol) ist ein offener Standard, der es KI-Clients ermöglicht, einen definierten Satz von „Tools“ aufzurufen, die von einem Server bereitgestellt werden. Der MCP-Server von Chamilo ist über einen einzelnen Endpunkt `/mcp` erreichbar und stellt einen kuratierten Satz lehrerorientierter Kursverwaltungstools bereit – nicht die gesamte API-Oberfläche.

## Verfügbare Funktionen

Jeder Aufruf wird als der verbundene Benutzer ausgeführt, sodass ein Tool nur Kurse sieht und ändert, die dieser Benutzer verwaltet. Der aktuelle Tool-Satz:

| Tool | Funktion |
|------|----------|
| Current user | Gibt Identität und Rollen des authentifizierten Benutzers zurück |
| Teacher courses | Listet Kurse auf, die der Benutzer als Lehrkraft verwaltet |
| Course overview | Gibt Basisinformationen zum Kurs und Ressourcenanzahlen zurück |
| Create course | Erstellt einen neuen Kurs gemäß den Kursregeln der Plattform |
| Create course assignment | Erstellt eine Aufgabe als Entwurf oder veröffentlicht, mit Beschreibung und Maximalpunktzahl |
| Create course test | Erstellt einen KI-unterstützten Multiple-Choice-Test aus einer Themenbeschreibung oder einem vorhandenen Dokument |
| Get course test response status | Meldet, welche Studierenden einen Test beantwortet haben, gerade bearbeiten oder noch ausstehen |
| Get user course test score | Gibt die neueste und die beste abgeschlossene Punktzahl eines Studierenden in einem Test zurück |
| Create training satisfaction survey | Erstellt eine Zufriedenheitsumfrage mit sieben Fragen |
| Create course learning path | Erstellt einen Lernpfad aus vom MCP-Client gelieferten Seiten |
| List documents | Listet die Dokumente im Dokumenten-Tool eines Kurses auf |
| Read course document | Gibt HTML-Inhalt, Titel und Metadaten eines bearbeitbaren Dokuments zurück |
| Edit course document | Ersetzt den gesamten HTML-Inhalt eines vorhandenen bearbeitbaren Dokuments |
| Create course document | Erstellt ein KI-unterstütztes HTML-Dokument im Stammordner Dokumente |
| Create course illustration | Erzeugt eine KI-Illustration zu einem Thema und speichert sie als Dokument |
| Illustrate document paragraph | Fügt ein vorhandenes Bild oder Video vor oder nach einem Absatz in einem Dokument ein |
| Find recent course forum activity | Findet aktuelle, sichtbare Forenbeiträge zu einem Thema |
| Review course quality | Analysiert Lernpfade, Dokumente, Tests, Aufgaben und Umfragen eines Kurses und gibt Verbesserungsempfehlungen zurück |

Diese Liste wird vom Chamilo-Kernteam kuratiert und ist innerhalb der Plattform nicht durch Benutzer erweiterbar – Lehrkräfte können keine eigenen Tools hinzufügen.

## Wie Benutzer eine Verbindung herstellen

### Persönlicher MCP-API-Schlüssel

Jeder Benutzer erzeugt seinen eigenen Schlüssel unter **Soziales Netzwerk** > **MCP API key**:

![Die Seite MCP-API-Schlüssel mit einem inaktiven Schlüssel, der Schaltfläche Generate API key und dem Block Remote MCP connection mit Endpunkt-URL und Authorization-Header-Format](../.gitbook/assets/admin-mcp-api-key.png)

* Ein Klick auf **Generate API key** erzeugt einen Schlüssel und zeigt ihn einmal an – Chamilo speichert danach nur eine maskierte Version, daher muss der vollständige Schlüssel sofort kopiert und sicher aufbewahrt werden.
* Das Erzeugen eines neuen Schlüssels widerruft den vorherigen sofort.
* Die Seite zeigt den Status des Schlüssels (aktiv/inaktiv), den im Client zu konfigurierenden MCP-Endpunkt sowie Erstellungs- und Letztnutzungsdatum.
* Das Panel **Remote MCP connection** gibt genau an, was im MCP-Client einzutragen ist: die Endpunkt-URL und ein Header `Authorization: Bearer <your MCP API key>`.

Wie die Seite selbst vermerkt, authentifiziert der Schlüssel den Client als das Konto dieses Benutzers – er gewährt keine Berechtigung, die das Konto nicht bereits besitzt.

### OAuth 2.1 (Remote-Clients und Connectors)

Für MCP-Clients, die OAuth-Discovery und dynamische Client-Registrierung unterstützen (statt eines manuell eingefügten Schlüssels), fungiert Chamilo außerdem als OAuth-2.1-Autorisierungsserver: Der Client ermittelt die Endpunkte von Chamilo, registriert sich selbst und leitet den Benutzer zu `/oauth/authorize` weiter, um den Zugriff zu genehmigen. Genehmigte Anwendungen erscheinen unter **Soziales Netzwerk** > **Authorized applications**, wo der Benutzer Anwendungen widerrufen kann, die er nicht mehr nutzt oder nicht erkennt.

## Sicherheitsaspekte

* **Keine Rechteausweitung.** Jeder MCP-Tool-Aufruf und jede OAuth-autorisierte App läuft mit den eigenen Chamilo-Berechtigungen des verbindenden Benutzers — ein persönlicher API-Schlüssel oder eine autorisierte App kann niemals mehr tun, als dieser Benutzer bereits manuell tun könnte.
* **Nur Bearer, mit Ratenbegrenzung.** `/mcp` akzeptiert ausschließlich ein Bearer-Credential — einen persönlichen MCP-API-Schlüssel, ein OAuth-Zugriffstoken oder (in der Entwicklung) ein JWT. Authentifizierungsversuche werden pro IP-Adresse ratenbegrenzt, um das Erraten von Zugangsdaten zu erschweren.
* **Schmale öffentliche Oberfläche.** Der einzige nicht authentifizierte Verkehr, den `/mcp` akzeptiert, ist der `OPTIONS`-Preflight; jeder tatsächliche Aufruf erfordert `ROLE_USER`. Die OAuth-Discovery-, dynamische Client-Registrierungs- und Token-Endpunkte sind bewusst öffentlich, wie es die OAuth-2.1-/MCP-Spezifikationen verlangen — das gewährt selbst keinen Zugriff, sondern ermöglicht einem Client lediglich zu erfahren, wie der Autorisierungsfluss gestartet wird.
* **DNS-Rebinding-Schutz ist für `/mcp` bewusst deaktiviert.** Das Bundle, das MCP implementiert, beschränkt den Endpunkt normalerweise auf `localhost`, sofern keine statische Liste erlaubter Hostnamen konfiguriert ist — das passt schlecht zu einem Chamilo-Portal mit mehreren URLs, das unter vielen Hostnamen erreichbar ist. Chamilo deaktiviert diese Prüfung, weil sie hier überflüssig ist: Jede `/mcp`-Anfrage erfordert bereits unabhängig vom `Host`-/`Origin`-Header ein Bearer-Credential, und ein DNS-Rebinding-Angriff (der auf mitfahrende, cookieartige Umgebungsauthentifizierung bei einem gefälschten Host setzt) kann kein Bearer-Token fälschen, das er nicht bereits besitzt.

## Konfiguration des MCP-Servers

Im Gegensatz zu den meisten Integrationen in diesem Leitfaden hat MCP keine Einstellungsseite im Administrationsbereich — die Konfiguration erfolgt auf Dateiebene in `config/packages/mcp.yaml` und erfordert Shell-Zugriff auf den Server:

| Schlüssel | Zweck |
|-----|---------|
| `app`, `version`, `description` | Identität, die Chamilo verbindenden MCP-Clients mitteilt |
| `client_transports.stdio` / `client_transports.http` | Welche Transporte aktiv sind; Chamilo aktiviert standardmäßig beide |
| `http.path` | Der MCP-HTTP-Endpunkt (standardmäßig `/mcp`) |
| `http.allowed_hosts` | DNS-Rebinding-Host-Allowlist — in Chamilo auf `false` gesetzt (siehe Sicherheitsaspekte oben) |
| `http.session.store`, `.directory`, `.ttl` | Wo der MCP-Sitzungszustand persistiert wird und wie lange |

Um den MCP-Server vollständig zu deaktivieren, setzen Sie `client_transports.http: false` (und `stdio: false`, falls der CLI-Transport ebenfalls abgeschaltet werden soll) und leeren Sie den Cache:

```bash
php bin/console cache:clear --env=prod
php bin/console cache:warmup --env=prod
```

## Tipps

* Behandeln Sie einen MCP-API-Schlüssel wie ein Passwort — wer ihn besitzt, kann über jeden MCP-Client als dieser Benutzer handeln.
* Ermutigen Sie Benutzer, regelmäßig **Autorisierte Anwendungen** zu prüfen und alles zu widerrufen, das sie nicht erkennen.
* Siehe [KI-Konfiguration](integrations/ai-configuration.md) für die KI-Anbieter, die die oben aufgeführten Werkzeuge zur Inhaltserzeugung (Testerstellung, Dokumentenerstellung, Illustrationen) unterstützen.