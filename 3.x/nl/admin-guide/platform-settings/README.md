# Platforminstellingen

Chamilo heeft een uitgebreid configuratiesysteem met instellingen die in categorieën zijn onderverdeeld. De volledige reeks categorieën hieronder weerspiegelt de pagina **Configuratie-instellingen** in het beheerderspaneel — en de onderliggende `SettingsCurrentFixtures.php` in de broncode, die de bron van waarheid is voor variabelenamen, titels en beschrijvingen.

Open de platforminstellingen vanuit het beheerderspaneel door op **Configuratie-instellingen** te klikken.

![De pagina platforminstellingen met configuratiecategorieën georganiseerd per functioneel gebied](/.gitbook/assets/admin-settings-categories.png)

## Alle categorieën

Er zijn in totaal **39 configuratiecategorieën**, hieronder alfabetisch weergegeven. Het getal na elke koppeling is het aantal instellingen in die categorie.

### Platformbreed

* **[Identiteit van de beheerder](admin-settings.md)** (12) — Identiteit en contactgegevens van de platformbeheerder.
* **[Platform](platform-settings.md)** (29) — Identiteit op platformniveau, tijdzone, registratiebeleid, online gebruikers, prestatiemarkeringen.
* **[Weergave](display-settings.md)** (24) — Indeling van de startpagina, gravatar, menu’s, brandinggedrag.
* **[Editor](editor-settings.md)** (26) — Werkbalken, plugins en AI-helpers van de rich-text-editor (TinyMCE).
* **[Talen](language-settings.md)** (12) — Beschikbare talen, standaardtaal, terugvalopties.
* **[Mail](mail-settings.md)** (18) — Indeling van uitgaande e-mail, afzenderidentiteit, handtekening.
* **[Workflows](workflows-settings.md)** (23) — Overkoepelende workflowschakelaars (cursusaanmaak, inschrijvingsvalidatie…).

### Authenticatie, beveiliging en privacy

* **[Beveiliging](security-settings.md)** (31) — Inlogbescherming, wachtwoordbeleid, headers, 2FA, IDS.
* **[Registratie](registration-settings.md)** (20) — Beleid voor zelfregistratie en omleidingen na registratie.
* **[Privacy](privacy-settings.md)** (6) — Toestemming, gegevensexport, verzoeken tot accountverwijdering.
* **[CAS](cas-settings.md)** (7) — Legacy-CAS-configuratie overgenomen uit 1.x.

### Levenscyclus van cursussen en sessies

* **[Cursus](course-settings.md)** (45) — Standaardwaarden en beleidsregels die platformbreed op cursussen van toepassing zijn.
* **[Sessies](session-settings.md)** (68) — Levenscyclus van sessies, toegangstijdvensters voor tutoren, zichtbaarheid.
* **[Cursuscatalogus](catalog-settings.md)** (13) — Gedrag van de openbare cursuscatalogus.
* **[Profiel](profile-settings.md)** (29) — Welke velden op het gebruikersprofiel verschijnen.

### Cursushulpmiddelen

* **[Agenda](agenda-settings.md)** (11)
* **[Aankondigingen](announcement-settings.md)** (9)
* **[Opdrachten (Work)](work-settings.md)** (12)
* **[Aanwezigheid](attendance-settings.md)** (4)
* **[Chat](chat-settings.md)** (5)
* **[Documenten](document-settings.md)** (29)
* **[Dropbox](dropbox-settings.md)** (8)
* **[Oefeningen (Tests)](exercise-settings.md)** (63)
* **[Forums](forum-settings.md)** (9)
* **[Woordenlijst](glossary-settings.md)** (3)
* **[Groepen](group-settings.md)** (3)
* **[Leerpaden](lp-settings.md)** (51)
* **[Enquêtes](survey-settings.md)** (12)

### Beoordeling en erkenning

* **[Cijferlijst (Assessments)](gradebook-settings.md)** (34) — Scoreweergave, decimalen, certificaatdrempels.
* **[Certificaten](certificate-settings.md)** (9) — Standaardwaarden die gelden wanneer een lerende een certificaat behaalt.
* **[Vaardigheden](skill-settings.md)** (13) — Vaardighedenboom, toekenningsregels, profielintegratie.
* **[Tracking](tracking-settings.md)** (10) — Wat wordt vastgelegd, welke rapporten worden getoond.

### Communicatie en community

* **[Berichten](message-settings.md)** (7)
* **[Sociaal netwerk](social-settings.md)** (7)

### AI

* **[AI-helpers](ai-helpers-settings.md)** (13) — Providers per taaktype (tekst, afbeelding, video, tutor, beoordeling).

### Operaties en integratie

* **[Cronjobs](crons-settings.md)** (3)
* **[Zoeken](search-settings.md)** (3) — Configuratie van Xapian-full-textzoeken.
* **[Tickets](ticket-settings.md)** (7) — Helpdesksysteem.
* **[Webservices](webservice-settings.md)** (7) — Legacy SOAP/REST-eindpunten.

## Hoe instellingen werken

* Instellingen worden opgeslagen in de database (tabel `settings`) en beheerd via de webinterface
* Sommige instellingen zijn **URL-vergrendeld** in multi-URL-omgevingen (hun waarde geldt platformbreed en kan niet per URL worden overschreven — zie de kolommen `access_url_locked` en `access_url_changeable` in de tabel `settings`); andere (de meeste) kunnen per access-URL worden overschreven
* Wijzigingen gaan onmiddellijk in (geen herstart van de server vereist), hoewel uw gebruikerssessie sommige ervan in het geheugen kan houden. Als wijzigingen niet meteen zichtbaar zijn, log uit en weer in om uw sessie te legen.
* Sommige instellingen hebben afhankelijkheden — het wijzigen van de ene kan het gedrag van andere beïnvloeden
* Variabelenamen die op elke pagina worden getoond (bijv. `2fa_enable`) komen overeen met de rij in de databasetabel `settings` (kolom `variable`) en de sleutels die in overrides (`config/settings_overrides.yaml`) worden gebruikt, waar van toepassing.

Voor meer informatie, zie [Configurations](https://github.com/chamilo/chamilo-lms/wiki/Configurations) op onze wiki.

## Tips

* **Documenteer uw instellingen** — Houd een overzicht bij van niet-standaardinstellingen en waarom u ze hebt gewijzigd
* **Wijzig één ding tegelijk** — Wijzig bij het oplossen van problemen één instelling tegelijk, zodat u het effect kunt vaststellen
* **Test in een stagingomgeving** — Test belangrijke instellingswijzigingen eerst op een stagingserver