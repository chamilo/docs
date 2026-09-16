# Trackinginstellingen

Standaardwaarden gerelateerd aan tracking — wat wordt vastgelegd, welke rapporten worden getoond, regels voor tijdsberekening.

Open deze instellingen onder **Beheer > Configuratie-instellingen > Tracking**. Deze categorie bevat **10 instellingen**, hieronder vermeld met de titel en toelichting zoals meegeleverd in de settings-fixtures van het platform (`SettingsCurrentFixtures.php`).

> De variabelenaam in de code wordt in monospace weergegeven. Gebruik deze bij scripting via de API of wanneer u deze instellingen globaal wilt wijzigen door [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) te bewerken.

## Instellingen

### `block_my_progress_page`

**Toegang tot 'Mijn voortgang' blokkeren**

In specifieke implementaties zoals online examens wilt u mogelijk voorkomen dat gebruikers toegang hebben tot de pagina 'Mijn voortgang'.

*Standaard: `false`*

### `footer_extra_content`

**Extra inhoud in de voettekst**

U kunt HTML-code toevoegen, zoals metatags

### `header_extra_content`

**Extra inhoud in de koptekst**

U kunt HTML-code toevoegen, zoals metatags

### `meta_description`

**Metabeschrijving**

Dit toont een OpenGraph Description-meta (og:description) in de headers van uw site

### `meta_image_path`

**Pad naar metabestand (afbeelding)**

Dit pad naar de meta-afbeelding is het pad naar een bestand in uw Chamilo-directory (bijv. home/image.png) dat moet worden weergegeven in een Twitter-kaart of een OpenGraph-kaart wanneer een link naar uw LMS wordt getoond. Twitter beveelt een afbeelding van 120 x 120 pixels aan, die soms tot 120x90 kan worden bijgesneden.

### `meta_title`

**OpenGraph-metatitel**

Dit toont een OpenGraph Title-meta (og:title) in de headers van uw site

### `meta_twitter_creator`

**Twitter Creator-account**

De Twitter Creator is een Twitter-account (bijv. @ywarnier) dat de *persoon* vertegenwoordigt die de site heeft gemaakt. Dit veld is optioneel.

### `meta_twitter_site`

**Twitter Site-account**

De Twitter-site is een Twitter-account (bijv. @chamilo_news) dat gerelateerd is aan uw site. Het is meestal een tijdelijker account dan het Twitter Creator-account, of het vertegenwoordigt een entiteit (in plaats van een persoon). Dit veld is vereist als u wilt dat de meta-velden van de Twitter-kaart worden weergegeven.

### `my_progress_course_tools_order`

**Volgorde van tools op de pagina 'Mijn voortgang'**

Wijzig de volgorde van de tools die op de pagina 'Mijn voortgang' voor cursisten worden getoond. Opties zijn onder andere 'quizzes', 'learning_paths' en 'skills'.

### `tracking_skip_generic_data`

**Generieke gegevens overslaan op de zelftrackingpagina van de cursist**

Als het laden van de pagina 'Mijn voortgang' te lang duurt, kunt u de verwerking van generieke statistieken voor de gebruiker uitschakelen. Schakel in dat geval deze instelling in.

*Standaard: `false`*