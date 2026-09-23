# Versionskontrol

Versionskontrol fortæller dig, om din Chamilo-installation er opdateret, og — hvis du tilmelder dig — registrerer din platform hos Chamilo-projektet, så den kan tælles med i aggregerede brugsstatistikker.

## To niveauer af kontrol

**Uregistreret (standardtilstand):** Chamilo forsøger stadig at kontakte `version.chamilo.org` for at sammenligne din installerede version med den seneste udgivelse, og bruger intet andet end selve anmodningen — der sendes ingen platformoplysninger. Blokken viser en registreringsformular, der forklarer, hvad registrering tilføjer, plus en knap **"Enable version check"** og et afkrydsningsfelt **"Hide campus from public platforms list"**.

**Registreret:** Klik på "Enable version check" slår kun to lokale indstillinger til — det sender i sig selv ikke noget. Fra da af sender din platform, hver gang denne dashboard-blok indlæses, en anmodning til `version.chamilo.org`, der inkluderer:

| Sendte data | Angivet formål |
|-----------|-----------------|
| Din platforms URL og sitenavn | Identificerer, hvilken portal der tjekker ind |
| Administratorens kontakt-e-mail | Eksplicit så Chamilo-teamet kan kontakte administratorer om kritiske sikkerhedsproblemer |
| Installeret version | For at afgøre, om du er opdateret |
| Antal kurser, brugere, aktive brugere og sessioner | Sammenfattes i ikke-personlige aggregerede statistikker på `stats.chamilo.org` |
| Organisationsnavn og grænsefladesprog | Kun demografisk aggregering |
| Administratornavn | Sendes, selvom formålet ikke er klart dokumenteret i selve koden |
| Din servers IP-adresse | Bruges til at tilnærme din platforms placering til et globalt kort over installationer |
| Flaget "Do not list campus", packager og et unikt instans-ID | Styrer, om du vises i det offentlige katalog, og identificerer gentagne indtjekninger fra samme installation |

Hvis du lader **"Hide campus from public platforms list"** være uafkrydset, vises din platform også på den offentlige fællesskabsliste på `version.chamilo.org/community.php`.

## Adgang til versionskontrol

Denne blok vises direkte på administrationsdashboardet — der er ingen separat side at besøge.

## Bør du aktivere det?

Dette er et eksplicit tilvalg, og afvejningen er ligetil: til gengæld for at dele ovenstående oplysninger får du automatisk besked, når en ny version (herunder sikkerhedsopdateringer) er tilgængelig, og du bidrager til Chamilos offentlige adoptionsstatistikker. Hvis du hellere ikke vil dele nogen platformoplysninger, skal du blot undlade at klikke på "Enable version check" — den grundlæggende kontrol af, om du er opdateret, kører stadig uden registrering. Hvis du vil have opdateringsbeskeden, men ikke den offentlige listning, skal du registrere og afkrydse "Hide campus from public platforms list."