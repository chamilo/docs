# Plattforminnstillinger

Chamilo har et omfattende konfigurasjonssystem med innstillinger organisert i kategorier. Det fullstendige settet av kategorier nedenfor speiler siden **Konfigurasjonsinnstillinger** i administrasjonspanelet — og den underliggende `SettingsCurrentFixtures.php` i kildekoden, som er sannhetskilden for variabelnavn, titler og beskrivelser.

Åpne plattforminnstillinger fra administrasjonspanelet ved å klikke **Konfigurasjonsinnstillinger**.

![Siden for plattforminnstillinger som viser konfigurasjonskategorier organisert etter funksjonsområde](/.gitbook/assets/admin-settings-categories.png)

## Alle kategorier

Det finnes totalt **39 konfigurasjonskategorier**, listet alfabetisk nedenfor. Tallet etter hver lenke er antall innstillinger i den kategorien.

### Plattformomfattende

* **[Administratoridentitet](admin-settings.md)** (12) — Identitet og kontaktopplysninger for plattformadministratoren.
* **[Plattform](platform-settings.md)** (29) — Identitet på plattformnivå, tidssone, registreringspolicy, brukere pålogget, ytelsesflagg.
* **[Visning](display-settings.md)** (24) — Oppsett av startsiden, gravatar, menyer, merkevareatferd.
* **[Redigeringsverktøy](editor-settings.md)** (26) — Verktøylinjer, programtillegg og KI-hjelpere for riktekstredigereren (TinyMCE).
* **[Språk](language-settings.md)** (12) — Tilgjengelige språk, standardspråk, reservedeler.
* **[E-post](mail-settings.md)** (18) — Oppsett av utgående e-post, avsenderidentitet, signatur.
* **[Arbeidsflyter](workflows-settings.md)** (23) — Tverrgående arbeidsflytbrytere (kursopprettelse, validering av påmelding…).

### Autentisering, sikkerhet og personvern

* **[Sikkerhet](security-settings.md)** (31) — Innloggingsbeskyttelse, passordpolicy, hoder, 2FA, IDS.
* **[Registrering](registration-settings.md)** (20) — Policy for selvregistrering og omdirigeringer etter registrering.
* **[Personvern](privacy-settings.md)** (6) — Samtykke, dataeksport, forespørsler om sletting av konto.
* **[CAS](cas-settings.md)** (7) — Eldre CAS-konfigurasjon videreført fra 1.x.

### Livssyklus for kurs og økter

* **[Kurs](course-settings.md)** (45) — Standardverdier og retningslinjer som gjelder for kurs på hele plattformen.
* **[Økter](session-settings.md)** (68) — Livssyklus for økter, tilgangsvinduer for veiledere, synlighet.
* **[Kurskatalog](catalog-settings.md)** (13) — Atferd for den offentlige kurskatalogen.
* **[Profil](profile-settings.md)** (29) — Hvilke felt som vises på brukerprofilen.

### Kursverktøy

* **[Agenda](agenda-settings.md)** (11)
* **[Kunngjøringer](announcement-settings.md)** (9)
* **[Oppgaver (Work)](work-settings.md)** (12)
* **[Oppmøte](attendance-settings.md)** (4)
* **[Chat](chat-settings.md)** (5)
* **[Dokumenter](document-settings.md)** (29)
* **[Dropbox](dropbox-settings.md)** (8)
* **[Øvelser (tester)](exercise-settings.md)** (63)
* **[Forum](forum-settings.md)** (9)
* **[Ordliste](glossary-settings.md)** (3)
* **[Grupper](group-settings.md)** (3)
* **[Læringsstier](lp-settings.md)** (51)
* **[Undersøkelser](survey-settings.md)** (12)

### Vurdering og anerkjennelse

* **[Karakterbok (vurderinger)](gradebook-settings.md)** (34) — Visning av poeng, desimaler, terskler for sertifikater.
* **[Sertifikater](certificate-settings.md)** (9) — Standardverdier som brukes når en lærende oppnår et sertifikat.
* **[Ferdigheter](skill-settings.md)** (13) — Ferdighetstre, tildelingsregler, profilintegrasjon.
* **[Sporing](tracking-settings.md)** (10) — Hva som registreres, hvilke rapporter som vises.

### Kommunikasjon og fellesskap

* **[Meldinger](message-settings.md)** (7)
* **[Sosialt nettverk](social-settings.md)** (7)

### KI

* **[KI-hjelpere](ai-helpers-settings.md)** (13) — Leverandører per oppgavetype (tekst, bilde, video, veileder, karaktersetting).

### Drift og integrasjon

* **[Cron-jobber](crons-settings.md)** (3)
* **[Søk](search-settings.md)** (3) — Konfigurasjon av Xapian fulltekstsøk.
* **[Saker](ticket-settings.md)** (7) — Hjelpesystem.
* **[Nettjenester](webservice-settings.md)** (7) — Eldre SOAP/REST-endepunkter.

## Hvordan innstillinger fungerer

* Innstillinger lagres i databasen (`settings`-tabellen) og administreres via webgrensesnittet
* Noen innstillinger er **URL-låst** i oppsett med flere URL-er (verdien gjelder for hele plattformen og kan ikke overstyres per URL – se kolonnene `access_url_locked` og `access_url_changeable` i `settings`-tabellen); andre (de fleste) kan overstyres per tilgangs-URL
* Endringer trer i kraft umiddelbart (ingen omstart av tjeneren er nødvendig), selv om brukerøkten din kan holde noen av dem i minnet. Hvis endringer ikke vises med en gang, logg ut og inn igjen for å tømme økten.
* Noen innstillinger har avhengigheter — å endre én kan påvirke atferden til andre
* Variabelnavn som vises på hver side (f.eks. `2fa_enable`) samsvarer med raden i databasetabellen `settings` (`variable`-kolonnen) og nøklene som brukes i overstyringer (`config/settings_overrides.yaml`) der det er aktuelt.

For mer informasjon, se [Configurations](https://github.com/chamilo/chamilo-lms/wiki/Configurations) på wikien vår.

## Tips

* **Dokumenter innstillingene dine** — Hold oversikt over innstillinger som avviker fra standardverdiene, og hvorfor du endret dem
* **Endre én ting om gangen** — Når du feilsøker, endre én innstilling om gangen slik at du kan identifisere effekten
* **Test i et staging-miljø** — For vesentlige endringer i innstillinger, test først på en staging-server