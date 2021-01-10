# SystemadministratorenAuthentifizierungsmethoden

![](../../.gitbook/assets/image1%20%282%29.png)

Als allgemeine Faustregel finden Sie alle Konfigurationen, die sich auf Authentifizierungsmethoden beziehen, in einer Mischung aus den Einstellungen \(innerhalb der Portalverwaltung oder der settings\_current -Tabelle\) und der Datei main/inc/conf/auth.conf.php.

Um zu verfolgen, wer durch was identifiziert wurde, verfolgt Chamilo normalerweise die Authentifizierungsquelle des Benutzers über das Feld  **auth\_source**  in der Tabelle **Benutzer**. Ein durch LDAP identifizierter Benutzer verwendet « ldap » \(falls automatisch synchronisiert\) oder « extldap » \(wenn er beim ersten Einloggen beim ersten Einloggen registriert ist\).

