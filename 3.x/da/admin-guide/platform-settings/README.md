# Platformindstillinger

Chamilo har et omfattende konfigurationssystem med indstillinger organiseret i kategorier. Det fulde sæt af kategorier nedenfor afspejler siden **Konfigurationsindstillinger** i administrationspanelet — og den underliggende `SettingsCurrentFixtures.php` i kildekoden, som er sandhedskilden for variabelnavne, titler og beskrivelser.

Tilgå platformindstillinger fra administrationspanelet ved at klikke på **Konfigurationsindstillinger**.

![Siden med platformindstillinger, der viser konfigurationskategorier organiseret efter funktionelt område](../../.gitbook/assets/admin-settings-categories.png)

## Alle kategorier

Der er i alt **39 konfigurationskategorier**, listet alfabetisk nedenfor. Tallet efter hvert link er antallet af indstillinger i den pågældende kategori.

### Platformomfattende

* **[Administratoridentitet](admin-settings.md)** (12) — Identitet og kontaktoplysninger for platformadministratoren.
* **[Platform](platform-settings.md)** (29) — Identitet på platformniveau, tidszone, registreringspolitik, online brugere, ydelsesflag.
* **[Visning](display-settings.md)** (24) — Layout på startsiden, gravatar, menuer, brandingadfærd.
* **[Editor](editor-settings.md)** (26) — Værktøjslinjer, plugins og AI-hjælpere til rich-text-editoren (TinyMCE).
* **[Sprog](language-settings.md)** (12) — Tilgængelige sprog, standardsprog, fallbacks.
* **[Mail](mail-settings.md)** (18) — Layout for udgående mail, afsenderidentitet, signatur.
* **[Arbejdsgange](workflows-settings.md)** (23) — Tværgående arbejdsgangstoggles (kursusoprettelse, validering af tilmelding…).

### Autentificering, sikkerhed og privatliv

* **[Sikkerhed](security-settings.md)** (31) — Loginbeskyttelse, adgangskodepolitik, headers, 2FA, IDS.
* **[Registrering](registration-settings.md)** (20) — Politik for selvregistrering og omdirigeringer efter registrering.
* **[Privatliv](privacy-settings.md)** (6) — Samtykke, dataeksport, anmodninger om sletning af konto.
* **[CAS](cas-settings.md)** (7) — Ældre CAS-konfiguration overført fra 1.x.

### Kursus- og sessionslivscyklus

* **[Kursus](course-settings.md)** (45) — Standarder og politikker, der gælder for kurser på hele platformen.
* **[Sessioner](session-settings.md)** (68) — Sessionslivscyklus, adgangsvinduer for tutorer, synlighed.
* **[Kursuskatalog](catalog-settings.md)** (13) — Adfærd for det offentlige kursuskatalog.
* **[Profil](profile-settings.md)** (29) — Hvilke felter der vises på brugerprofilen.

### Kursusværktøjer

* **[Agenda](agenda-settings.md)** (11)
* **[Meddelelser](announcement-settings.md)** (9)
* **[Opgaver (Work)](work-settings.md)** (12)
* **[Fremmøde](attendance-settings.md)** (4)
* **[Chat](chat-settings.md)** (5)
* **[Dokumenter](document-settings.md)** (29)
* **[Dropbox](dropbox-settings.md)** (8)
* **[Øvelser (Tests)](exercise-settings.md)** (63)
* **[Fora](forum-settings.md)** (9)
* **[Ordliste](glossary-settings.md)** (3)
* **[Grupper](group-settings.md)** (3)
* **[Læringsstier](lp-settings.md)** (51)
* **[Spørgeskemaer](survey-settings.md)** (12)

### Vurdering og anerkendelse

* **[Karakterbog (Vurderinger)](gradebook-settings.md)** (34) — Visning af score, decimaler, tærskler for certifikater.
* **[Certifikater](certificate-settings.md)** (9) — Standarder, der anvendes, når en kursist opnår et certifikat.
* **[Kompetencer](skill-settings.md)** (13) — Kompetencetræ, tildelingsregler, profilintegration.
* **[Tracking](tracking-settings.md)** (10) — Hvad der registreres, hvilke rapporter der vises.

### Kommunikation og fællesskab

* **[Beskeder](message-settings.md)** (7)
* **[Socialt netværk](social-settings.md)** (7)

### AI

* **[AI-hjælpere](ai-helpers-settings.md)** (13) — Udbydere pr. opgavetype (tekst, billede, video, tutor, bedømmelse).

### Drift og integration

* **[Cron-jobs](crons-settings.md)** (3)
* **[Søgning](search-settings.md)** (3) — Konfiguration af Xapian fuldtekstsøgning.
* **[Tickets](ticket-settings.md)** (7) — Helpdesk-system.
* **[Web Services](webservice-settings.md)** (7) — Ældre SOAP/REST-endepunkter.

## Sådan fungerer indstillinger

* Indstillinger gemmes i databasen (`settings`-tabellen) og administreres via webgrænsefladen
* Nogle indstillinger er **URL-låste** i opsætninger med flere URL'er (deres værdi gælder for hele platformen og kan ikke tilsidesættes pr. URL - se kolonnerne `access_url_locked` og `access_url_changeable` i `settings`-tabellen); andre (de fleste) kan tilsidesættes pr. adgangs-URL
* Ændringer træder i kraft med det samme (ingen genstart af serveren er påkrævet), selvom din brugersession muligvis holder nogle af dem i hukommelsen. Hvis ændringer ikke vises med det samme, skal du logge ud og ind igen for at tømme din session.
* Nogle indstillinger har afhængigheder — ændring af én kan påvirke andres adfærd
* Variabelnavne vist på hver side (f.eks. `2fa_enable`) matcher rækken i databasetabellen `settings` (kolonnen `variable`) og nøglerne, der bruges i tilsidesættelser (`config/settings_overrides.yaml`), hvor det er relevant.

For mere information, se [Configurations](https://github.com/chamilo/chamilo-lms/wiki/Configurations) på vores wiki.

## Tips

* **Dokumentér dine indstillinger** — Hold styr på indstillinger, der afviger fra standard, og hvorfor du ændrede dem
* **Ændr én ting ad gangen** — Når du fejlfinder, skal du kun ændre én indstilling ad gangen, så du kan identificere effekten
* **Test i et staging-miljø** — Ved væsentlige ændringer af indstillinger skal du først teste på en staging-server