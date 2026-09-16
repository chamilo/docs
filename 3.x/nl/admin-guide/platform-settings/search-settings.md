# Zoekinstellingen

Configuratie van het full-text zoeksysteem (Xapian).

Deze instellingen vindt u onder **Beheer > Configuratie-instellingen > Zoeken**. Deze categorie bevat **3 instellingen**, hieronder vermeld met de titel en toelichting zoals meegeleverd in de settings-fixtures van het platform (`SettingsCurrentFixtures.php`).

> De variabelenaam in de code wordt in monospace weergegeven. Gebruik deze bij scripting via de API of wanneer u deze instellingen globaal wilt wijzigen door [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) te bewerken.

## Instellingen

### `search_enabled`

**Full-text zoekfunctie**

Selecteer 'Ja' om deze functie in te schakelen. Deze is sterk afhankelijk van de Xapian-extensie voor PHP, dus dit werkt niet als deze extensie niet op uw server is geïnstalleerd, minimaal in versie 1.x.

*Standaard: `false`*


### `search_prefilter_prefix`

**Specifiek veld voor prefilter**

Met deze optie kunt u het Specifieke veld kiezen dat moet worden gebruikt bij het zoektype prefilter.

### `search_show_unlinked_results`

**Full-text zoeken: niet-gekoppelde resultaten tonen**

Wat moet er gebeuren met de resultaten die voor de huidige gebruiker niet toegankelijk zijn wanneer de resultaten van een full-text zoekopdracht worden getoond?

*Standaard: `true`*