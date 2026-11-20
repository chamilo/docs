# Verifisering av signerte sertifikater

Chamilo kan utstede **digitalt signerte legitimasjoner** for karakterboksertifikater og eventuelt forankre et legitimasjonsfingeravtrykk på **Sepolia Ethereum-testnettverket**. Signatur- og verifiseringssiden er forskjellig fra vanlige PDF-sertifikater.

## Aktiver signerte legitimasjoner

Under **Administrasjon > Konfigurasjonsinnstillinger > Sertifikater**, aktiver `certificate.blockchain_verification_enabled` hvis institusjonen din har til hensikt å bruke denne funksjonen. Den er deaktivert som standard. Portalen må bruke HTTPS for å utstede legitimasjoner.

## Samtykke fra studenten kommer først

Eieren av et sertifikat åpner **Mine sertifikater** og velger eksplisitt **Godkjenn publisering**. Samtykket omfatter en offentlig verifiserbar legitimasjon som viser innehaverens navn, kurs, poengsum og utstedelsesdato, og eventuelt SHA-256-fingeravtrykket på Sepolia. Godkjenning skjer ikke automatisk. Studenten kan senere velge **Trekk tilbake samtykke**; tilbaketrekking påvirker gyldigheten som vises på verifiseringssiden, men **kan ikke slette et allerede bekreftet blokkjede-fingeravtrykk**.

## Utsted, verifiser og tilbakekall

En direkte autentisert plattformadministrator kan bruke karakterbokens **Sertifikater**-liste til å utstede den signerte legitimasjonen når eieren har samtykket. Den resulterende verifiseringslenken bruker `/certificates/verify/{token}`; et `.json`-verifiseringssvar er også tilgjengelig. Siden kontrollerer den kryptografiske signaturen, samtykke, tilbakekalling, utløp, og om den underliggende sertifikatinformasjonen fortsatt samsvarer med den signerte kilden.

Hvis en legitimasjon tilbakekalles, samtykke trekkes tilbake, sertifikatet endres, eller signaturen er ugyldig, angir verifikatoren denne statusen i stedet for å rapportere en gyldig legitimasjon.

## Valgfri Sepolia-forankring

En administrator kan velge **Forankre på Sepolia-testnett** ved hjelp av en støttet nettleserlommebok eller **Bekreft eksisterende Sepolia-transaksjon** for å avstemme en ventende transaksjon. Lommeboken må være koblet til Sepolia (kjede-ID `11155111`). Applikasjonen bekrefter transaksjonen ved hjelp av et serverkonfigurert **HTTPS Sepolia RPC-endepunkt** (`CHAMILO_CERTIFICATE_SEPOLIA_RPC_URL`). Ingen RPC-URL som leveres i forespørselen, godtas.

Bare legitimasjonsfingeravtrykket forankres; personopplysninger sendes ikke inn som transaksjonsdata. Sepolia er et **testnett**. Registrene og tilgjengeligheten må ikke presenteres som en offentlig blokkjedegaranti på produksjonsnivå. Lagre institusjonsnøkler og RPC-konfigurasjon sikkert, og planlegg prosedyrer for nøkkelgjenoppretting og tilbakekalling av legitimasjon.

Implementering: [Verifisering av sertifikatlegitimasjon #9298](https://github.com/chamilo/chamilo-lms/pull/9298).