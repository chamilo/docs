# Privacy-instellingen

Privacy- en gegevensbeschermingscontroles (in de stijl van de AVG) — toestemming, gegevensexport, verzoeken tot accountverwijdering en vergelijkbare functies.

Open deze instellingen onder **Beheer > Configuratie-instellingen > Privacy**. Deze categorie bevat **6 instellingen**, hieronder weergegeven met de titel en toelichting zoals meegeleverd in de settings-fixtures van het platform (`SettingsCurrentFixtures.php`).

> De variabelenaam in de code staat in monospace. Gebruik deze bij scripting via de API of wanneer u deze instellingen globaal wilt wijzigen door [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) te bewerken.

## Instellingen

### `data_protection_officer_email`

**E-mailadres van de functionaris voor gegevensbescherming**

E-mailadres van de aangewezen functionaris voor gegevensbescherming, weergegeven in AVG-/privacysecties.

### `data_protection_officer_name`

**Naam van de functionaris voor gegevensbescherming**

Volledige naam van de aangewezen functionaris voor gegevensbescherming, weergegeven op pagina's over persoonsgegevens en privacy.

### `data_protection_officer_role`

**Functie van de functionaris voor gegevensbescherming**

Functietitel of rol van de aangewezen functionaris voor gegevensbescherming, weergegeven naast de naam in privacy-informatie.

### `disable_change_user_visibility_for_public_courses`

**Voorkomen dat toolgebruikers zichtbaar worden gemaakt in openbare cursussen**

Voorkom dat iemand de tool 'gebruikers' zichtbaar maakt in een openbare cursus.

*Standaard: `true`*

### `disable_gdpr`

**AVG-functies uitschakelen**

Als u de verklaring over de bescherming van persoonsgegevens al elders aan gebruikers beheert, kunt u deze functie veilig uitschakelen.

*Standaard: `true`*

### `hide_user_field_from_list`

**Velden verbergen in de gebruikerslijst van de cursus**

Standaard tonen we alle gegevens van gebruikers in de gebruikerstool van de cursus. Met deze array kunt u aangeven welke velden u niet wilt weergeven. Dit geldt alleen voor hoofdvelden (niet voor extra velden).