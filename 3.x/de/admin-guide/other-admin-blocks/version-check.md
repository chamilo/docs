# Versionsprüfung

Die Versionsprüfung teilt Ihnen mit, ob Ihre Chamilo-Installation aktuell ist, und – sofern Sie zustimmen – registriert Ihre Plattform beim Chamilo-Projekt, damit sie in aggregierten Nutzungsstatistiken gezählt werden kann.

## Zwei Prüfstufen

**Nicht registriert (Standardzustand):** Chamilo versucht weiterhin, `version.chamilo.org` zu kontaktieren, um Ihre installierte Version mit der neuesten Veröffentlichung zu vergleichen, und verwendet dabei nichts weiter als die Anfrage selbst – es werden keine Plattformdetails gesendet. Der Block zeigt ein Registrierungsformular, das erklärt, was die Registrierung zusätzlich bringt, sowie eine Schaltfläche **„Versionsprüfung aktivieren“** und ein Kontrollkästchen **„Campus in der öffentlichen Plattformliste verbergen“**.

**Registriert:** Ein Klick auf „Versionsprüfung aktivieren“ ändert lediglich zwei lokale Einstellungen – es wird dabei selbst nichts gesendet. Ab dann sendet Ihre Plattform bei jedem Laden dieses Dashboard-Blocks eine Anfrage an `version.chamilo.org`, die Folgendes enthält:

| Gesendete Daten | Angegebenes Ziel |
|-----------|-----------------|
| URL und Site-Name Ihrer Plattform | Identifiziert, welches Portal sich meldet |
| Admin-Kontakt-E-Mail | Explizit, damit das Chamilo-Team Admins bei kritischen Sicherheitsproblemen erreichen kann |
| Installierte Version | Um festzustellen, ob Sie aktuell sind |
| Anzahl der Kurse, Benutzer, aktiven Benutzer und Sitzungen | Zusammengefasst in nicht-personenbezogene Aggregatstatistiken unter `stats.chamilo.org` |
| Organisationsname und Oberflächensprache | Nur demografische Aggregation |
| Admin-Name | Wird gesendet, obwohl der Zweck im Code selbst nicht klar dokumentiert ist |
| IP-Adresse Ihres Servers | Dient der ungefähren Standortbestimmung Ihrer Plattform für eine globale Karte der Installationen |
| Flag „Campus nicht listen“, Packager und eine eindeutige Instanz-ID | Steuert, ob Sie im öffentlichen Verzeichnis erscheinen, und identifiziert wiederholte Check-ins derselben Installation |

Wenn Sie **„Campus in der öffentlichen Plattformliste verbergen“** nicht aktivieren, erscheint Ihre Plattform außerdem in der öffentlichen Community-Liste unter `version.chamilo.org/community.php`.

## Zugriff auf die Versionsprüfung

Dieser Block erscheint direkt auf dem Administrations-Dashboard – es gibt keine separate Seite.

## Sollten Sie sie aktivieren?

Dies ist eine ausdrückliche Opt-in-Funktion, und der Kompromiss ist klar: Im Austausch für die Weitergabe der oben genannten Angaben erhalten Sie eine automatische Benachrichtigung, wenn eine neue Version (einschließlich Sicherheitspatches) verfügbar ist, und Sie tragen zu den öffentlichen Nutzungsstatistiken von Chamilo bei. Wenn Sie keine Plattformdetails teilen möchten, klicken Sie einfach nicht auf „Versionsprüfung aktivieren“ – die grundlegende Aktualitätsprüfung läuft weiterhin ohne Registrierung. Wenn Sie die Update-Benachrichtigung, aber nicht die öffentliche Listung möchten, registrieren Sie sich und aktivieren Sie „Campus in der öffentlichen Plattformliste verbergen“.