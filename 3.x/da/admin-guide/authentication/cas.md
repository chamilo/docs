# CAS

> **Status i Chamilo 3.x.** CAS-konfigurationsposter (`cas_activate`, `cas_server`, `cas_server_uri`, `cas_port`, `cas_protocol`, `cas_add_user_activate`) findes stadig i platformindstillingerne som en ældre overførsel fra Chamilo 1.x, og CAS vises stadig som en valgbar autentificeringskilde på brugerformularen — men der er ingen CAS-autentificator tilkoblet Chamilo 3.x-sikkerhedspipelinen. Login via CAS virker **ikke** i øjeblikket ud af boksen. Hvis du har brug for SSO på Chamilo 3.x, skal du i stedet bruge [OAuth2](oauth2.md) (Azure / Keycloak / Generic) eller [LDAP](ldap.md).

## Hvad CAS ville gøre (1.x-adfærd)

CAS (Central Authentication Service) er en single sign-on-protokol, der almindeligvis bruges på universiteter og forskningsinstitutioner. I Chamilo 1.x ville et klik på "Log in with CAS" omdirigere brugeren til en CAS-server, validere den returnerede ticket og oprette eller matche en lokal konto ud fra CAS-attributter.

## Migrationsbemærkning

Hvis du opgraderer en Chamilo 1.x-portal, der brugte CAS, skal du indtil videre planlægge at genimplementere det loginflow oven på OAuth2 eller LDAP, indtil CAS-autentificatoren gendannes i en fremtidig 3.x-udgivelse.