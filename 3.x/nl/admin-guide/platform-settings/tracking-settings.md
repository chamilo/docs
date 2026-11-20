# Trackinginstellingen

Standaardwaarden voor tracking: wat wordt vastgelegd, welke rapporten beschikbaar zijn en regels voor tijdsberekening.

Open deze instellingen via **Beheer > Configuratie-instellingen > Tracking**. Deze categorie bevat **14 instellingen**, hieronder vermeld met de titel en toelichting zoals meegeleverd in de settings-fixtures van het platform (`SettingsCurrentFixtures.php`).

> De variabelenaam in de code staat in monospace. Gebruik deze bij scripting via de API of wanneer u deze instellingen op globaal niveau wilt wijzigen door [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) te bewerken.

## Instellingen

### `block_my_progress_page`

**Toegang tot 'Mijn voortgang' voorkomen**

Bij specifieke implementaties, zoals online examens, wilt u mogelijk de toegang van gebruikers tot de pagina 'Mijn voortgang' voorkomen.

*Standaard: `false`*

### `footer_extra_content`

**Extra inhoud in de footer**

U kunt HTML-code toevoegen, zoals meta-tags

### `header_extra_content`

**Extra inhoud in de header**

U kunt HTML-code toevoegen, zoals meta-tags

### `meta_description`

**Meta-beschrijving**

Dit toont een OpenGraph-beschrijvingsmeta (og:description) in de headers van uw site

### `meta_image_path`

**Pad naar meta-afbeelding**

Dit pad naar de meta-afbeelding is het pad naar een bestand in uw Chamilo-map (bijv. home/image.png) dat moet worden getoond in een Twitter-kaart of een OpenGraph-kaart wanneer een link naar uw LMS wordt weergegeven. Twitter raadt een afbeelding van 120 x 120 pixels aan, die soms wordt bijgesneden tot 120x90.

### `meta_title`

**OpenGraph-metatitel**

Dit toont een OpenGraph-titelmeta (og:title) in de headers van uw site

### `meta_twitter_creator`

**Twitter Creator-account**

De Twitter Creator is een Twitter-account (bijv. @ywarnier) dat de *persoon* vertegenwoordigt die de site heeft gemaakt. Dit veld is optioneel.

### `meta_twitter_site`

**Twitter Site-account**

De Twitter-site is een Twitter-account (bijv. @chamilo_news) dat aan uw site is gekoppeld. Het is doorgaans een tijdelijker account dan het Twitter Creator-account, of vertegenwoordigt een entiteit (in plaats van een persoon). Dit veld is verplicht als u wilt dat de metaveld van de Twitter-kaart worden getoond.

### `my_progress_course_tools_order`

**Volgorde van tools op de pagina 'Mijn voortgang'**

Wijzig de volgorde van de tools die op de pagina 'Mijn voortgang' voor cursisten worden getoond. Opties zijn onder meer 'quizzes', 'learning_paths' en 'skills'.

### `tracking_skip_generic_data`

**Generieke gegevens overslaan op de zelftrackingpagina van de cursist**

Als de pagina 'Mijn voortgang' te lang duurt om te laden, wilt u mogelijk de verwerking van generieke statistieken voor de gebruiker verwijderen. Schakel in dat geval deze instelling in.

*Standaard: `false`*

### `hide_ip_address`

**IP-adres verbergen in rapporten**

Verberg IP-adressen in visuele rapporten en rapportexports. De instelling is standaard ingeschakeld; het verbergen van waarden in rapporten wist geen reeds opgeslagen IP-adressen en voorkomt geen toegang via geautoriseerde procedures voor persoonsgegevens.

*Standaard: `true`*

Zie [PR over IP-zichtbaarheid #9312](https://github.com/chamilo/chamilo-lms/pull/9312).

### `maximum_inactive_time_to_consider`

**Maximale inactieve tijd om mee te tellen (minuten)**

Een openstaande cursuspagina kan automatische verzoeken genereren. Na dit interval zonder een betekenisvolle gebruikersactie draagt de periode niet langer bij aan de bijgehouden cursusactiviteitstijd. Dit is een rapportageregel, geen automatisch afmeldmechanisme.

*Standaard: `15` minuten*

### `max_time_spent_per_session_threshold`

**Drempel voor maximale tijd per sessie (minuten)**

Beperkt de hoeveelheid van één aanmeldsessie die in rapporten als activiteit wordt geteld, zodat een uitzonderlijk lang openstaande sessie de totalen van de studietijd niet opblaast. Afzonderlijke aanmeldsessies kunnen nog steeds bijdragen aan de totale tijd. Dit beëindigt geen cursistsessie.

*Standaard: `360` minuten*

Zie [PR over sessietijdlimiet #9445](https://github.com/chamilo/chamilo-lms/pull/9445).

### `recycle_bin_retention_hours`

**Bewaartermijn prullenbak (uren)**

Minimale leeftijd van verwijderde oefenpogingen en voortgang van leerpaden voordat permanente verwijdering is toegestaan. Het opschooncommando `chamilo:recycle-bin:purge` toont standaard een voorbeeld; permanente opschoning vereist `--execute`. De instelling plant op zichzelf geen automatische opschoning.

*Standaard: `720` uur (30 dagen)*

Zie [PR over prullenbakken voor oefeningen en leerpaden #9383](https://github.com/chamilo/chamilo-lms/pull/9383).