# Platforminstellingen

Chamilo heeft een uitgebreid configuratiesysteem met instellingen die zijn georganiseerd in categorieën. De volledige set categorieën hieronder komt overeen met de pagina **Configuratie-instellingen** in het beheerderspaneel — en het onderliggende `SettingsCurrentFixtures.php` in de broncode, dat de bron van waarheid is voor variabelenamen, titels en beschrijvingen.

Toegang tot platforminstellingen vanuit het beheerderspaneel door te klikken op **Configuratie-instellingen**.

![De pagina met platforminstellingen toont configuratiecategorieën georganiseerd per functioneel gebied](/.gitbook/assets/admin-settings-categories.png)

## Alle categorieën

Er zijn in totaal **39 configuratiecategorieën**, alfabetisch hieronder opgesomd. Het getal na elke link geeft het aantal instellingen in die categorie aan.

### Platformbreed

* **[Identiteit Beheerder](admin-settings.md)** (12) — Identiteit en contactgegevens van de platformbeheerder.
* **[Platform](platform-settings.md)** (29) — Platformidentiteit, tijdzone, registratiebeleid, online gebruikers, prestatievlaggen.
* **[Weergave](display-settings.md)** (24) — Lay-out van de startpagina, gravatar, menu's, merkgedrag.
* **[Editor](editor-settings.md)** (26) — Rich-text editor (TinyMCE) werkbalken, plug-ins, AI-helpers.
* **[Talen](language-settings.md)** (12) — Beschikbare talen, standaardtaal, terugvalopties.
* **[E-mail](mail-settings.md)** (18) — Lay-out van uitgaande e-mail, identiteit van de afzender, handtekening.
* **[Werkstromen](workflows-settings.md)** (23) — Overkoepelende schakelaars voor werkstromen (cursusaanmaak, inschrijvingsvalidatie…).

### Authenticatie, beveiliging & privacy

* **[Beveiliging](security-settings.md)** (31) — Inlogbeveiliging, wachtwoordbeleid, headers, 2FA, IDS.
* **[Registratie](registration-settings.md)** (20) — Beleid voor zelfregistratie en doorverwijzingen na registratie.
* **[Privacy](privacy-settings.md)** (6) — Toestemming, gegevensexport, verzoeken tot accountverwijdering.
* **[CAS](cas-settings.md)** (7) — Verouderde CAS-configuratie overgenomen uit 1.x.

### Levenscyclus van cursussen en sessies

* **[Cursus](course-settings.md)** (45) — Standaardinstellingen en beleidsregels die platformbreed van toepassing zijn op cursussen.
* **[Sessies](session-settings.md)** (68) — Levenscyclus van sessies, toegangstermijnen voor coaches, zichtbaarheid.
* **[Cursuscatalogus](catalog-settings.md)** (13) — Gedrag van de openbare cursuscatalogus.
* **[Profiel](profile-settings.md)** (29) — Welke velden verschijnen op het gebruikersprofiel.

### Cursushulpmiddelen

* **[Agenda](agenda-settings.md)** (11)
* **[Aankondigingen](announcement-settings.md)** (9)
* **[Opdrachten (Werk)](work-settings.md)** (12)
* **[Aanwezigheid](attendance-settings.md)** (4)
* **[Chat](chat-settings.md)** (5)
* **[Documenten](document-settings.md)** (29)
* **[Dropbox](dropbox-settings.md)** (8)
* **[Oefeningen (Tests)](exercise-settings.md)** (63)
* **[Forums](forum-settings.md)** (9)
* **[Woordenlijst](glossary-settings.md)** (3)
* **[Groepen](group-settings.md)** (3)
* **[Leertrajecten](lp-settings.md)** (51)
* **[Enquêtes](survey-settings.md)** (12)

### Beoordeling & erkenning

* **[Cijferboek (Beoordelingen)](gradebook-settings.md)** (34) — Weergave van scores, decimalen, drempels voor certificaten.
* **[Certificaten](certificate-settings.md)** (9) — Standaardinstellingen die worden toegepast wanneer een leerling een certificaat behaalt.
* **[Vaardigheden](skill-settings.md)** (13) — Vaardighedenstructuur, toekenningsregels, integratie in profiel.
* **[Volgen](tracking-settings.md)** (10) — Wat wordt geregistreerd, welke rapporten worden weergegeven.

### Communicatie & gemeenschap

* **[Berichten](message-settings.md)** (7)
* **[Sociaal Netwerk](social-settings.md)** (7)

### AI

* **[AI-helpers](ai-helpers-settings.md)** (13) — Aanbieders per taaktype (tekst, afbeelding, video, tutor, beoordeling).

### Operaties & integratie

* **[Cron Jobs](crons-settings.md)** (3)
* **[Zoeken](search-settings.md)** (3) — Configuratie van Xapian full-text zoekfunctie.
* **[Tickets](ticket-settings.md)** (7) — Helpdesksysteem.
* **[Webservices](webservice-settings.md)** (7) — Verouderde SOAP/REST-endpoints.

## Hoe instellingen werken

* Instellingen worden opgeslagen in de database (tabel `settings`) en beheerd via de webinterface.
* Sommige instellingen zijn **URL-vergrendeld** in multi-URL-opstellingen (hun waarde geldt platformbreed en kan niet per URL worden overschreven - zie kolommen `access_url_locked` en `access_url_changeable` in de tabel `settings`); andere (de meeste) kunnen per toegang-URL worden overschreven.
* Wijzigingen treden onmiddellijk in werking (geen serverherstart vereist), hoewel uw gebruikerssessie sommige instellingen mogelijk in het geheugen houdt. Als wijzigingen niet direct zichtbaar zijn, log uit en log opnieuw in om uw sessie te vernieuwen.
* Sommige instellingen hebben afhankelijkheden — het wijzigen van de ene kan het gedrag van andere beïnvloeden.
* Variabelenamen die op elke pagina worden weergegeven (bijv. `2fa_enable`) komen overeen met de rij in de databasetabel `settings` (kolom `variable`) en de sleutels die worden gebruikt in overschrijvingen (`config/settings_overrides.yaml`) waar van toepassing.

Voor meer informatie, bekijk [Configuraties](https://github.com/chamilo/chamilo-lms/wiki/Configurations) op onze wiki.

## Tips

* **Documenteer uw instellingen** — Houd een overzicht bij van niet-standaardinstellingen en waarom u deze hebt gewijzigd
* **Verander één ding tegelijk** — Bij het oplossen van problemen, wijzig één instelling tegelijk zodat u het effect kunt identificeren
* **Test in een testomgeving** — Voor belangrijke wijzigingen in instellingen, test eerst op een staging-server