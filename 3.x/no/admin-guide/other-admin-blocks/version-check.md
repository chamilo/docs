# Versjonskontroll

Versjonskontroll forteller deg om Chamilo-installasjonen din er oppdatert, og — hvis du velger det — registrerer plattformen din hos Chamilo-prosjektet slik at den kan telles i aggregerte bruksstatistikker.

## To nivåer av kontroll

**Uregistrert (standardtilstand):** Chamilo prøver likevel å kontakte `version.chamilo.org` for å sammenligne den installerte versjonen med den nyeste utgivelsen, og bruker ingenting mer enn selve forespørselen — ingen plattformdetaljer sendes. Blokken viser et registreringsskjema som forklarer hva registrering gir, pluss en **"Aktiver versjonskontroll"**-knapp og en avmerkingsboks **"Skjul campus fra listen over offentlige plattformer"**.

**Registrert:** Å klikke på "Aktiver versjonskontroll" slår bare om to lokale innstillinger — det sender ikke noe i seg selv. Deretter, hver gang denne dashbordblokken lastes, sender plattformen din en forespørsel til `version.chamilo.org` som inkluderer:

| Data som sendes | Angitt formål |
|-----------|-----------------|
| Plattformens URL og nettstedsnavn | Identifiserer hvilken portal som sjekker inn |
| Administrators kontakt-e-post | Eksplisitt slik at Chamilo-teamet kan nå administratorer om kritiske sikkerhetsproblemer |
| Installert versjon | For å avgjøre om du er oppdatert |
| Antall kurs, brukere, aktive brukere og økter | Sammenfattet i ikke-personlige aggregerte statistikker på `stats.chamilo.org` |
| Organisasjonsnavn og grensesnittspråk | Kun demografisk aggregering |
| Administratornavn | Sendes, selv om formålet ikke er tydelig dokumentert i koden selv |
| Serverens IP-adresse | Brukes til å tilnærme plattformens beliggenhet for et globalt kart over installasjoner |
| Flagg for «Ikke vis campus», pakkeleverandør og en unik instans-ID | Styrer om du vises i den offentlige katalogen, og identifiserer gjentatte innsjekkinger fra samme installasjon |

Hvis du lar **"Skjul campus fra listen over offentlige plattformer"** være umerket, vises plattformen din også i den offentlige fellesskapslisten på `version.chamilo.org/community.php`.

## Tilgang til versjonskontroll

Denne blokken vises direkte på administrasjonsdashbordet — ingen egen side å besøke.

## Bør du aktivere den?

Dette er et eksplisitt samtykke, og avveiningen er enkel: i bytte mot å dele detaljene ovenfor får du automatisk varsel når en ny versjon (inkludert sikkerhetsoppdateringer) er tilgjengelig, og du bidrar til Chamilos offentlige adopsjonsstatistikk. Hvis du heller ikke vil dele noen plattformdetaljer, klikker du ganske enkelt ikke på "Aktiver versjonskontroll" — den grunnleggende oppdateringskontrollen kjører fortsatt uten registrering. Hvis du vil ha oppdateringsvarselet, men ikke den offentlige oppføringen, registrerer du deg og merker av "Skjul campus fra listen over offentlige plattformer."