# Verificatie van ondertekende certificaten

Chamilo kan **digitaal ondertekende credentials** uitgeven voor cijferboekcertificaten en optioneel een credentialvingerafdruk verankeren op het **Sepolia Ethereum-testnetwerk**. De handtekening en de verificatiepagina verschillen van gewone PDF-certificaten.

## Ondertekende credentials inschakelen

Onder **Beheer > Configuratie-instellingen > Certificaten** schakelt u `certificate.blockchain_verification_enabled` in als uw instelling deze functie wil gebruiken. De functie is standaard uitgeschakeld. Het portaal moet HTTPS gebruiken voor het uitgeven van credentials.

## Toestemming van de cursist gaat voor

De eigenaar van een certificaat opent **Mijn certificaten** en kiest expliciet **Publicatie goedkeuren**. De toestemming betreft een openbaar verifieerbare credential met de naam van de houder, de cursus, de score en de uitgiftedatum, en optioneel de SHA-256-vingerafdruk op Sepolia. Goedkeuring is niet automatisch. De cursist kan later **Toestemming intrekken** selecteren; intrekking beïnvloedt de geldigheid die op de verificatiepagina wordt weergegeven, maar **kan een reeds bevestigde blockchainvingerafdruk niet wissen**.

## Uitgeven, verifiëren en intrekken

Een rechtstreeks geauthenticeerde platformbeheerder kan de lijst **Certificaten** van het cijferboek gebruiken om de ondertekende credential uit te geven zodra de eigenaar toestemming heeft gegeven. De resulterende verificatielink gebruikt `/certificates/verify/{token}`; er is ook een verificatieantwoord in `.json` beschikbaar. De pagina controleert de cryptografische handtekening, de toestemming, de intrekking, de vervaldatum en of de onderliggende certificaatinformatie nog overeenkomt met de ondertekende bron.

Als een credential wordt ingetrokken, de toestemming wordt ingetrokken, het certificaat wijzigt of de handtekening ongeldig is, geeft de verificatie die status aan in plaats van een geldige credential te melden.

## Optionele verankering op Sepolia

Een beheerder kan **Verankeren op Sepolia-testnet** kiezen met een ondersteunde browserwallet of **Bestaande Sepolia-transactie bevestigen** om een openstaande transactie af te stemmen. De wallet moet verbonden zijn met Sepolia (chain-ID `11155111`). De applicatie bevestigt de transactie via een op de server geconfigureerd **HTTPS Sepolia RPC-eindpunt** (`CHAMILO_CERTIFICATE_SEPOLIA_RPC_URL`). Een via het verzoek aangeleverde RPC-URL wordt niet geaccepteerd.

Alleen de credentialvingerafdruk wordt verankerd; persoonsgegevens worden niet als transactiegegevens ingediend. Sepolia is een **testnet**. De records en beschikbaarheid ervan mogen niet worden gepresenteerd als een productiewaardige garantie van een openbare blockchain. Bewaar institutionele sleutels en de RPC-configuratie veilig en voorzie procedures voor sleutelherstel en intrekking van credentials.

Implementatie: [Verificatie van certificaatcredentials #9298](https://github.com/chamilo/chamilo-lms/pull/9298).