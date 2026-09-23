# CAS

> **Status i Chamilo 3.x.** CAS-konfigurationsposter (`cas_activate`, `cas_server`, `cas_server_uri`, `cas_port`, `cas_protocol`, `cas_add_user_activate`) finns fortfarande i plattformsinställningarna som ett arv från Chamilo 1.x, och CAS visas fortfarande som en valbar autentiseringskälla på användarformuläret — men det finns ingen CAS-autentiserare inkopplad i Chamilo 3.x-säkerhetspipelinen. Inloggning via CAS fungerar **inte** för närvarande direkt. Om du behöver SSO på Chamilo 3.x, använd [OAuth2](oauth2.md) (Azure / Keycloak / Generic) eller [LDAP](ldap.md) i stället.

## Vad CAS skulle göra (beteende i 1.x)

CAS (Central Authentication Service) är ett protokoll för enkel inloggning som ofta används vid universitet och forskningsinstitutioner. I Chamilo 1.x skulle ett klick på "Logga in med CAS" omdirigera användaren till en CAS-server, validera den returnerade biljetten och skapa eller matcha ett lokalt konto utifrån CAS-attribut.

## Migrationsanmärkning

Om du uppgraderar en Chamilo 1.x-portal som använde CAS, planera att återimplementera det inloggningsflödet ovanpå OAuth2 eller LDAP tills vidare, tills CAS-autentiseraren återställs i en framtida 3.x-version.