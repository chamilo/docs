# OAuth-2.1-Autorisierungsserver und MCP-Clients

Chamilo kann als **OAuth-Autorisierungsserver** für Clients fungieren, die auf seine geschützten Ressourcen zugreifen. Dies ist eine andere Funktion als die [OAuth2-Anmeldung](oauth2.md), bei der Chamilo einen externen Identitätsanbieter verwendet, um Benutzer anzumelden.

## Aktivieren und konfigurieren

Aktivieren Sie unter **Administration > Konfigurationseinstellungen > Sicherheit** die Einstellung `security.oauth_server_enabled`. Der MCP-Zugriff hängt außerdem von der bestehenden Konfiguration `security.mcp_enabled` und der dem Benutzer zugewiesenen MCP-Rolle ab.

Der Server stellt die standardmäßigen Routen für Autorisierung, Token, Registrierung und Widerruf (`/oauth/authorize`, `/oauth/token`, `/oauth/register`, `/oauth/revoke`) sowie Discovery-Metadaten bereit. Für Produktiv-Clients sollte ausschließlich HTTPS verwendet werden.

## Einen Client registrieren

Chamilo unterstützt öffentliche PKCE-Clients mit Autorisierungscode sowie registrierte vertrauliche Clients. Die dynamische Client-Registrierung (DCR) verwendet `/oauth/register` und ist ratenbegrenzt. Die Einstellung `security.dynamic_client_registration` ist **standardmäßig deaktiviert**; der Endpunkt bleibt für den unterstützten MCP-Registrierungsablauf verfügbar, während die Einstellung die zusätzlichen Client-Scopes steuert, die bei der Registrierung akzeptiert werden. Gehen Sie nicht davon aus, dass das Umschalten der Einstellung beliebige geschützte APIs verfügbar macht.

Registrierte Clients verfügen über eine serverseitige Liste **zulässiger Ressourcen**. Derzeit definiert die Ressourcenregistrierung nur die Ressource **MCP** und den Scope `mcp`. Neue geschützte Ressourcen erfordern eine explizite Serverimplementierung und Berechtigungsentscheidungen, nicht lediglich das Hinzufügen einer unbekannten URL zu einer Anfrage. Chamilo validiert die `resource`-Parameter gemäß RFC 8707 während der gesamten Autorisierungs- und Token-Verarbeitung.

## Benutzereinwilligung und Audit

1. Ein Client startet eine Autorisierungscode-Anfrage mit PKCE (`S256`) sowie dem angeforderten Scope bzw. der angeforderten Ressource.
2. Der Benutzer authentifiziert sich bei Bedarf mit seiner gewöhnlichen Chamilo-Anmeldung.
3. Chamilo zeigt auf einem Einwilligungsbildschirm die Client-Identität, die Registrierungsdetails und den angeforderten Zugriff an.
4. Der Benutzer wählt **Zulassen** oder **Ablehnen**. Eine Zustimmung wird als Teil der Einwilligungshistorie des Servers aufgezeichnet, und Informationen zu früheren Zustimmungen können bei späteren Anfragen angezeigt werden.

Die Einwilligung ist an die dem Benutzer angezeigte Anfrage gebunden. Eine genehmigte Anfrage gewährt keine anderen geschützten Ressourcen und keinen beliebigen Zugriff über die angeforderten Berechtigungen hinaus.

## Hinweise zu Bereitstellung und Sicherheit

Die Aktualisierungen für OAuth 2.1 führen ein Feld für zulässige Ressourcen bei Clients sowie persistente Aufzeichnungen der Client-Einwilligung ein. Wenden Sie die **spezifischen Chamilo-Datenbankmigrationen** an, die mit der Version geliefert werden, bevor Sie den aktualisierten Ablauf aktivieren. Halten Sie Callback-URLs und OAuth-Client-Geheimnisse vertraulich. Die Client-Registrierung gewährt keinen uneingeschränkten Zugriff auf Chamilo-Benutzer oder -Kurse.

Implementierungsreferenz: [OAuth-Client-Registrierung und Einwilligung, PR #9231](https://github.com/chamilo/chamilo-lms/pull/9231).