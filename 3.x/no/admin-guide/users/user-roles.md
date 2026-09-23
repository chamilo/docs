# Brukerroller

Chamilo bruker et rollebasert tillatelsessystem. Hver bruker tildeles en rolle som avgjør hva de kan se og gjøre på plattformen.

## Plattformnivåroller

Disse rollene styrer tilgang til plattformomfattende funksjoner:

| Rolle |  Beskrivelse |
|------|------------|
| **Learner (Student)** | Standardrollen. Kan melde seg på kurs, få tilgang til læringsinnhold, levere inn oppgaver og ta øvelser. |
| **Teacher (Trainer)** | Kan opprette og administrere kurs, legge til innhold, vurdere studenter og se kursnivårapporter. |
| **Sessions Administrator** | Kan opprette og administrere økter (dvs. tidsbaserte kurspakker), melde brukere inn i økter og tildele veiledere. Kan ikke få tilgang til generelle plattforminnstillinger. |
| **Human Resources Manager (HRM)** | Kan se sporings- og rapporteringsdata for tildelte brukere. Brukes for overordnede som trenger å overvåke opplæring av ansatte, men ikke administrere innhold eller plattformen. |
| **Portal Administrator** | Full tilgang til alle plattformadministrasjonsfunksjoner. Kan administrere brukere, kurs, økter, plugins og alle innstillinger. |
| **Global Administrator** | Samme som Portal Administrator, men med tilgang på tvers av alle tilgangs-URL-er i et oppsett med flere URL-er (dvs. flere leietakere) — eller, hvis registrert på en URL som ikke er rot, begrenset til bare den URL-ens gren. Se [Subtree Administrators](../multi-url/access-urls.md#subtree-administrators). |
| **Anonymous** | En spesiell rolle for besøkende som ikke er logget inn. Kan få tilgang til offentlige kurs og innhold dersom dette er aktivert. |

## Kursnivåroller

Innenfor et kurs har brukere spesifikke roller:

| Rolle | Beskrivelse |
|------|-------------|
| **Student** | Standard kursrolle. Kan få tilgang til innhold, ta øvelser og levere inn oppgaver. |
| **Course assistant** | Har begrensede administrasjonstillatelser innenfor kurset. Kan hjelpe til med å administrere innhold og moderere forum. |
| **Teacher** | Full kontroll over kurset: administrere innhold, verktøy, innstillinger og påmelding. |

## Øktnivåroller

Innenfor en økt finnes det ytterligere roller:

| Rolle | Beskrivelse |
|------|-------------|
| **Session tutor** | Overvåker alle kurs innenfor en økt. Kan se sporing på tvers av alle kurs i økten. |
| **Course tutor** | Underviser et spesifikt kurs innenfor en økt. Kan administrere innhold og spore lærende for det kurset i den økten. |

Merk: Denne rollen ble kalt «coach» i Chamilo-versjoner før 3.0. Fra og med Chamilo 3.0 er «coach» erstattet av «tutor» overalt i plattformens grensesnitt og dokumentasjon — en veileder (tutor) er en person som hjelper lærende gjennom et kurs, ikke en personlig coach. De underliggende innstillingsnavnene i `Configuration settings` inneholder fortsatt «coach» av hensyn til bakoverkompatibilitet (for eksempel `add_users_by_coach`), men etikettene deres lyder nå «tutor».

## Tildeling av roller

Når du oppretter eller redigerer en brukerkonto i administrasjonspanelet, velger du deres plattformnivårolle. Kurs- og øktroller tildeles når brukere meldes inn i kurs eller økter.

## Rollehierarki

Roller med høyere privilegier arver evnene til roller med lavere privilegier:

* En administrator kan gjøre alt en lærer kan gjøre
* En lærer kan gjøre alt en student kan gjøre
* Øktnivåroller (tutor) gir ytterligere evner bare innenfor den tildelte økten

## Tips

* **Bruk prinsippet om minste privilegium** — Tildel brukere den laveste rollen de trenger for å utføre oppgavene sine
* **Bruk Sessions Administrators for delegert administrasjon** — Hvis du har personale som trenger å administrere opplæringsøkter, men ikke hele plattformen, gi dem rollen Sessions Administrator i stedet for full administratortilgang
* **Bruk HRM for overordnede** — Human Resources Managers kan overvåke opplæringsfremgang uten å ha tilgang til å endre kurs eller plattforminnstillinger
* **Opprettelse av roller** — Chamilo 3.x har den interne strukturen klar for opprettelse av nye roller, men funksjonen mangler mer testing for bred utgivelse. Den kan aktiveres gjennom [Official providers of Chamilo](https://chamilo.org/providers).