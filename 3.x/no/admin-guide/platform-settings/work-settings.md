# Innstillinger for oppgaver (Work)

Standardverdier og atferd for verktøyet **Oppgaver (Student Publications)**.

Tilgang til disse innstillingene finner du under **Administrasjon > Konfigurasjonsinnstillinger > Oppgaver (Work)**. Denne kategorien inneholder **12 innstillinger**, listet nedenfor med tittel og kommentar slik de leveres i plattformens innstillingsfiksturer (`SettingsCurrentFixtures.php`).

> Variabelnavnet i koden vises i monospace. Bruk det når du skripter via API-et, eller når du trenger å endre innstillingene på globalt nivå ved å redigere [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Innstillinger

### `allow_compilatio_tool`

**Aktiver Compilatio**

Compilatio er en anti-juksetjeneste som sammenligner tekst mellom to innleveringer og rapporterer om det er høy sannsynlighet for at innholdet (vanligvis oppgaver) ikke er originalt.

*Standard: `false`*

### `allow_my_student_publication_page`

**Aktiver siden Mine oppgaver**

[inferred] Aktiver en egen side der lærende kan se og administrere sine egne innleverte oppgaver.

*Standard: `false`*

### `allow_only_one_student_publication_per_user`

**Studenter kan bare laste opp én oppgave**

[inferred] Begrens lærende til å levere bare én oppgave per aktivitet, og forhindre flere innleveringer.

*Standard: `false`*

### `allow_redirect_to_main_page_after_work_upload`

**Omdiriger til startsiden for oppgaveverktøyet etter opplasting eller kommentar**

Omdiriger til oppgavelisten etter opplasting av en oppgave eller etter at en kommentar er lagt til

*Standard: `false`*

### `assignment_prevent_duplicate_upload`

**Forhindre dupliserte opplastinger i oppgaver**

[inferred] Blokker lærende fra å laste opp identiske filer for samme oppgaveinnlevering.

*Standard: `false`*

### `block_student_publication_add_documents`

**Forhindre at dokumenter legges til oppgaver**

[inferred] Forhindre at lærende legger til eller vedlegger dokumenter når de leverer oppgaver.

*Standard: `false`*

### `block_student_publication_edition`

**Forhindre redigering av oppgaver**

[inferred] Forhindre at lærende endrer eller oppdaterer innleverte oppgaver etter den første innleveringen.

*Standard: `false`*

### `block_student_publication_score_edition`

**Forhindre at læreren endrer oppgavepoeng**

[inferred] Forhindre at instruktører endrer oppgavepoeng etter at de er registrert.

*Standard: `false`*

### `compilatio_tool`

**Compilatio-innstillinger**

Konfigurer tilkoblingsdetaljene for Compilatio her.

### `considered_working_time`

**Aktiver tidsinnsats for oppgaver**

Dette lar lærere angi en estimert tidsinnsats (i formatet tt:mm:ss) for å fullføre oppgaven. Ved innlevering av oppgaven og godkjenning av læreren (oppgaven gis poeng) tildeles den lærende automatisk den tilsvarende tiden.

*Standard: `work_time`*

### `force_download_doc_before_upload_work`

**Tving nedlasting av dokument før oppgaveopplasting**

Tving brukere til å laste ned det oppgitte dokumentet i oppgavedefinisjonen før de kan laste opp oppgaven sin.

*Standard: `true`*

### `my_courses_show_pending_work`

**Vis lenke til «ventende» oppgaver fra siden Mine kurs**

[inferred] Vis en lenke eller et antall ventende oppgaver på den lærendes side Mine kurs for rask tilgang.

*Standard: `false`*