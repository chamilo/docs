# Systemverktøy

Denne siden dekker vedlikeholds- og inspeksjonsverktøyene i System-blokken.

## Rydd midlertidige filer

**System > Rydd midlertidige filer** viser hvor mange midlertidige opplastingsfiler som finnes og hvor mye plass de bruker, og lar deg deretter slette dem — enten alle, eller bare filer eldre enn en konfigurerbar alder. En tørrkjøringsmodus lar deg forhåndsvise hva som ville blitt slettet. Samme handling tømmer også utdaterte eldre byggfiler og regenererer kompilerte CSS-ressurser.

Denne handlingen hopper bevisst over Symfonys egne cache-kataloger (`var/cache/dev`, `var/cache/prod`, `var/cache/test`, og cache-pooler) — den rydder bare løse filer som har endt opp andre steder under `var/cache/`. Den vil **ikke** fange opp en endring du har gjort i `.env` eller under `config/` (for eksempel aktivering av API-dokumentasjonen — se [Aktiver API-dokumentasjonen](../installation/configuration.md#enable-the-api-documentation)). For det trenger du skalltilgang for å kjøre `php bin/console cache:clear`.

## Systemoppdatering

**System > Systemoppdatering** kjører Chamilos selvoppdateringsarbeidsflyt direkte fra administrasjonspanelet, som en sekvens av diskrete, gjenopptakbare trinn:

1. **Status** — Rapporterer den installerte versjonen og hvor oppdaterings-/staging-/sikkerhetskopikataloger ligger, sammen med den betrodde signeringsnøkkelen som brukes
2. **Sjekk** — Undersøker om en nyere versjon er tilgjengelig fra den konfigurerte oppdateringskilden
3. **Verifiser** — Laster ned oppdateringspakken og signaturen, og sjekker den mot sjekksummen i manifestet og den betrodde offentlige nøkkelen
4. **Forhåndssjekk** — Validerer systemkrav og kompatibilitet før noe berøres
5. **Stage** — Pakker ut den verifiserte pakken i en isolert staging-katalog; ingenting i den levende installasjonen endres ennå
6. **Bruk plan** — Bygger en diff over filer som skal legges til, erstattes eller fjernes, basert på den stagede pakken
7. **Bruk filer** — Kopierer filer på plass. Dette krever eksplisitt bekreftelse, og oppretter en sikkerhetskopi av hver fil som overskrives pluss en låsefil som hindrer at en annen oppdatering kjører samtidig
8. **Migrasjonssikkerhet / sjekker etter anvendelse** — Validerer ventende databasmigrasjoner og tilstand etter installasjon
9. **Kjør etter anvendelse** — Utfører konsollkommandoer etter anvendelse (for eksempel databasmigrasjoner), men bare hvis serverkonfigurasjonen tillater å kjøre dem fra brukergrensesnittet, og bare etter at du har skrevet inn en eksplisitt bekreftelsesfrase og bekreftet at en sikkerhetskopi er tatt

Langvarige trinn rapporterer fremdrift slik at siden trygt kan stå åpen mens de fullføres. Kombinasjonen av signaturverifisering, staging før anvendelse, sikkerhetskopier før overskriving, en samtidighetslås og skrevne bekreftelser før databaseendringer er utformet for å gjøre denne arbeidsflyten trygg å kjøre uten skalltilgang — men en manuell sikkerhetskopi før du starter er likevel god praksis; se [Sikkerhetskopier](../maintenance/backups.md).

## Filinfo

**System > Filinfo** lister alle opplastede ressursfiler, søkbare etter navn, og viser fysisk bane, om filen er en foreldreløs (ikke knyttet til noe kurs eller noen økt), og hvor mange steder som refererer til den. Herfra kan du knytte en foreldreløs fil til en ressurs, løsne den, eller slette den — nyttig for å spore opp og rydde lagring som ikke lenger tilhører noe kurs.

## Ressurser etter type

**System > Ressurser etter type** lar deg velge en ressurstype og se, på tvers av alle kurs og økter, et aggregert antall og en liste over elementer av den typen, når de ble opprettet, og (der det er aktuelt) hvilke brukere som er knyttet til dem. Bruk det til å besvare spørsmål som «hvor mange forum finnes på hele plattformen» eller «hvilke kurs har flest dokumenter».

## List ikoner

**System > List ikoner** er et blaibart katalog over Chamilos innebygde ikonsett, gruppert etter kategori. Det er hovedsakelig nyttig ved utvikling av programtillegg eller temaer når du trenger å bekrefte et ikons nøyaktige navn, men det er eksponert her som en generell referanse.

## Verktøy kun for utvikling

To ytterligere elementer kan vises i denne blokken, men bare når serveren har en `tests/`-katalog — noe som vanligvis bare skjer på en utviklings- eller QA-installasjon, aldri i produksjon:

* **Data filler** genererer store volumer av fiktive brukere, kurs og poster for brukere som er pålogget, for last- eller QA-testing.
* **E-mail tester** sender en ekte test-e-post via plattformens konfigurerte mailer, for å bekrefte at SMTP-/e-postinnstillingene faktisk fungerer, og viser nylige sendefeil hvis det finnes noen.

Hvis du ikke ser disse to lenkene, er det forventet — det betyr at installasjonen din ikke har en `tests/`-katalog, som er den normale, korrekte tilstanden for en produksjonsplattform.