# Trackinginstellingen

Standaardinstellingen met betrekking tot tracking — wat wordt geregistreerd, welke rapporten worden weergegeven, regels voor tijdsberekening.

Ga naar deze instellingen via **Beheer > Configuratie-instellingen > Tracking**. Deze categorie bevat **10 instellingen**, hieronder vermeld met de titel en opmerking zoals meegeleverd in de instellingenfixtures van het platform (`SettingsCurrentFixtures.php`).

> De variabelenaam in de code wordt weergegeven in monospace. Gebruik deze bij het scripten via de API of wanneer u deze instellingen op globaal niveau wilt wijzigen door [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) te bewerken.

## Instellingen

### `block_my_progress_page`

**Toegang tot 'Mijn voortgang' blokkeren**

In specifieke implementaties zoals online examens wilt u mogelijk de toegang van gebruikers tot de pagina 'Mijn voortgang' voorkomen.

*Standaard: `false`*

### `footer_extra_content`

**Extra inhoud in voettekst**

U kunt HTML-code toevoegen, zoals metatags.

### `header_extra_content`

**Extra inhoud in koptekst**

U kunt HTML-code toevoegen, zoals metatags.

### `meta_description`

**Meta-omschrijving**

Dit toont een OpenGraph Description meta (og:description) in de headers van uw site.

### `meta_image_path`

**Pad naar meta-afbeelding**

Dit pad naar de meta-afbeelding is het pad naar een bestand in uw Chamilo-map (bijv. home/image.png) dat moet worden weergegeven in een Twitter-kaart of een OpenGraph-kaart wanneer een link naar uw LMS wordt getoond. Twitter beveelt een afbeelding van 120 x 120 pixels aan, die soms kan worden bijgesneden tot 120x90.

### `meta_title`

**OpenGraph meta-titel**

Dit toont een OpenGraph Title meta (og:title) in de headers van uw site.

### `meta_twitter_creator`

**Twitter Creator-account**

De Twitter Creator is een Twitter-account (bijv. @ywarnier) dat de *persoon* vertegenwoordigt die de site heeft gemaakt. Dit veld is optioneel.

### `meta_twitter_site`

**Twitter Site-account**

De Twitter Site is een Twitter-account (bijv. @chamilo_news) dat gerelateerd is aan uw site. Het is meestal een meer tijdelijk account dan de Twitter Creator-account, of vertegenwoordigt een entiteit (in plaats van een persoon). Dit veld is verplicht als u wilt dat de Twitter-kaart meta-velden worden weergegeven.

### `my_progress_course_tools_order`

**Volgorde van tools op de pagina 'Mijn voortgang'**

Wijzig de volgorde van de tools die worden weergegeven op de pagina 'Mijn voortgang' voor leerlingen. Opties zijn onder andere 'quizzes', 'learning_paths' en 'skills'.

### `tracking_skip_generic_data`

**Generieke gegevens overslaan op de zelf-trackingpagina van de leerling**

Als de pagina 'Mijn voortgang' te lang duurt om te laden, wilt u mogelijk de verwerking van generieke statistieken voor de gebruiker verwijderen. Schakel in dat geval deze instelling in.

*Standaard: `false`*