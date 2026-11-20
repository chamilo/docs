# Fullføre fastlåste avsluttende elementer i læringsstier

En læringsstis siste trinn — «Gratulerer»-siden som inneholder sertifikat- og ferdighetsblokkene — regnes bare som fullført når en deltaker faktisk åpner den. En deltaker som fullfører alle andre trinn, men aldri klikker seg videre til den siste siden, forblir fastlåst like under 100 % for alltid, og siden berettigelse til prestasjonssertifikat (og tildeling av ferdigheter) er betinget av at læringsstien når 100 %, mottar de aldri et sertifikat eller en ferdighet de ellers har opptjent.

```bash
php bin/console chamilo:learning-path:complete-final-items [options]
```

For hver læringssti på plattformen der siste trinn er av typen **Final item**, kontrollerer kommandoen hver deltaker med et pågående forsøk (under 100 %) som har fullført alle andre trinn — på tvers av hvert kurs og hver økt som gjenbruker læringsstien. I så fall fullfører den det avsluttende elementet for dem nøyaktig som om de hadde åpnet det selv: den registrerer samme elementvisning, kjører samme omberegning av fremdrift og utløser samme sertifikatgenerering og ferdighetstildeling som et reelt besøk ville gjort.

På samme måte som `chamilo:gradebook:process-achievement-certificates` (se
[Prestasjonssertifikater](achievement-certificates.md)), arbeider den i avgrensede batcher, støtter en
tørrkjøring og kan gjenopptas trygt hvis den avbrytes — en deltaker hvis avsluttende element allerede er fullført,
berøres aldri igjen ved en senere kjøring.

## Alternativer

| Option                 | Purpose                                                                                                            |
| ----------------------- | -------------------------------------------------------------------------------------------------------------------- |
| `--dry-run`             | Evaluerer og rapporterer uten å fullføre noe. Kjør alltid dette først.                                           |
| `--sender-id=<id>`      | ID for aktiv plattformadministrator, brukt som ressursoppretter når fullføring av et avsluttende element utløser sertifikatgenerering eller ferdighetstildeling. Påkrevd for en reell kjøring (ikke tørrkjøring). |
| `--limit=<n>`           | Maksimalt antall avsluttende elementer som fullføres (eller, ved tørrkjøring, rapporteres) i én kjøring. `0` = ubegrenset. Standardverdi `500`.              |
| `--scan-limit=<n>`      | Maksimalt antall fremdriftsposter for deltakere som skannes i én kjøring, på tvers av alle læringsstier. `0` = ubegrenset. Standardverdi `5000`. |
| `--batch-size=<n>`      | Fremdriftsposter for deltakere som lastes per databasebatch, innenfor én læringssti. Standardverdi `50`.                       |
| `--lp-batch-size=<n>`   | Læringsstier som lastes per databasebatch. Standardverdi `50`.                                                            |
| `--after-lp-id=<id>`    | Gjenoppta skanning etter denne læringssti-ID-en.                                                                       |

## Eksempler

Kjør først en tørrkjøring for hele plattformen for å se hvem som ville blitt fullført:

```bash
php bin/console chamilo:learning-path:complete-final-items --dry-run
```

Reell kjøring, med administrator med ID 1 som ressursoppretter:

```bash
php bin/console chamilo:learning-path:complete-final-items --sender-id=1
```

Gjenoppta en avbrutt kjøring etter læringssti 480:

```bash
php bin/console chamilo:learning-path:complete-final-items --sender-id=1 --after-lp-id=480
```

## Avslutningskoder

Kommandoen avsluttes med feilstatus hvis minst ett avsluttende element faktisk ikke ble fullført
under en reell kjøring — sammendragstabellen navngir læringsstien og deltakeren samt årsaken;
applikasjonsloggen inneholder hele unntaket. En deltaker som korrekt er utelatt (avsluttende element allerede fullført, eller
et annet trinn fortsatt ufullstendig), er ikke en feil og fører aldri til en feilavslutningskode.

## Karakterbokpoeng etter fullføring

Poengsummen som vises for en læringssti i karakterboktabellen, lagres aldri — den beregnes direkte
fra deltakerens gjeldende fremdrift hver gang siden lastes, slik at den umiddelbart gjenspeiler 100 %,
uten noe ekstra trinn.

En deltakers **sertifikat**, hvis ett allerede fantes før de nådde 100 % (med en eldre, lavere
poengsum innebygd), får lagret poengsum og gjengitt HTML oppdatert bare hvis selve sertifikatregenereringen
lykkes når denne kommandoen fullfører det avsluttende elementet — det samme kallet et faktisk
besøk ville utløst. Hvis sertifikatgenerering mislykkes av en eller annen grunn (se
[Prestasjonssertifikater](achievement-certificates.md) for vanlige årsaker, f.eks. filrettigheter for lagring), når deltakerens fremdrift likevel korrekt 100 %, og karakterboktabellen viser det fortsatt — bare sertifikatet deres viser den gamle poengsummen, og siden kommandoen aldri
besøker en deltaker som allerede er på 100 % på nytt, vil den ikke prøve igjen ved en senere kjøring. Regenerer sertifikatet
manuelt (handlingen **Generer** i sertifikatlisten) når det underliggende problemet er rettet.

`--sender-id` finnes spesifikt for å unngå én vanlig årsak til den feilen: når et avsluttende
element fullføres utenfor en reell forespørsel, finnes det ingen innlogget bruker som sertifikatressursen kan registrere som
oppretter, og genereringen mislykkes helt uten en slik.