# CAS

> **Status i Chamilo 3.x.** CAS-konfigurasjonsposter (`cas_activate`, `cas_server`, `cas_server_uri`, `cas_port`, `cas_protocol`, `cas_add_user_activate`) finnes fortsatt i plattforminnstillingene som en arv fra Chamilo 1.x, og CAS vises fortsatt som en valgbar autentiseringskilde på brukerskjemaet — men det er ingen CAS-autentikator koblet inn i sikkerhetspipelinen i Chamilo 3.x. Innlogging via CAS fungerer **ikke** for øyeblikket uten videre. Hvis du trenger SSO på Chamilo 3.x, bruk [OAuth2](oauth2.md) (Azure / Keycloak / Generic) eller [LDAP](ldap.md) i stedet.

## Hva CAS ville gjort (1.x-oppførsel)

CAS (Central Authentication Service) er en enkeltpåloggingsprotokoll som ofte brukes ved universiteter og forskningsinstitusjoner. I Chamilo 1.x ville et klikk på «Logg inn med CAS» omdirigere brukeren til en CAS-server, validere den returnerte ticketen og opprette eller matche en lokal konto fra CAS-attributter.

## Merknad om migrering

Hvis du oppgraderer en Chamilo 1.x-portal som brukte CAS, planlegg å implementere den innloggingsflyten på nytt oppå OAuth2 eller LDAP inntil videre, inntil CAS-autentikatoren gjenopprettes i en fremtidig 3.x-utgivelse.