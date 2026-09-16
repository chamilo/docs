# Zoekinstellingen

Configuratie van het full-text zoek systeem (Xapian).

Toegang tot deze instellingen vindt u onder **Beheer > Configuratie-instellingen > Zoeken**. Deze categorie bevat **3 instellingen**, hieronder vermeld met de titel en opmerking zoals meegeleverd in de platforminstellingen fixtures (`SettingsCurrentFixtures.php`).

> De variabelenaam in de code wordt weergegeven in monospace. Gebruik deze bij het scripten via de API of wanneer u deze instellingen op globaal niveau wilt wijzigen door [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) te bewerken.

## Instellingen

### `search_enabled`

**Full-text zoekfunctie**

Selecteer 'Ja' om deze functie in te schakelen. Deze functie is sterk afhankelijk van de Xapian-extensie voor PHP, dus dit zal niet werken als deze extensie niet is geïnstalleerd op uw server, minimaal in versie 1.x.

*Standaard: `false`*

### `search_prefilter_prefix`

**Specifiek veld voor voorfilter**

Met deze optie kunt u het specifieke veld kiezen dat gebruikt wordt voor het voorfilter zoektype.

### `search_show_unlinked_results`

**Full-text zoeken: toon niet-gekoppelde resultaten**

Wat moet er gebeuren met de resultaten die niet toegankelijk zijn voor de huidige gebruiker bij het weergeven van de resultaten van een full-text zoekopdracht?

*Standaard: `true`*