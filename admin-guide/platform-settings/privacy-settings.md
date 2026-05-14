# Privacy-instellingen

Privacy- en gegevensbeschermingscontroles (in de stijl van GDPR) — toestemming, gegevens-export, verzoeken tot accountverwijdering en vergelijkbare zaken.

Ga naar deze instellingen via **Beheer > Configuratie-instellingen > Privacy**. Deze categorie bevat **6 instellingen**, hieronder opgesomd met de titel en opmerking zoals meegeleverd in de instellingenfixtures van het platform (`SettingsCurrentFixtures.php`).

> De variabelenaam in de code wordt weergegeven in monospace. Gebruik deze bij het scripten via de API of wanneer u deze instellingen op globaal niveau wilt wijzigen door [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) te bewerken.

## Instellingen

### `data_protection_officer_email`

**E-mailadres van de functionaris voor gegevensbescherming**

E-mailadres van de aangewezen functionaris voor gegevensbescherming, weergegeven in GDPR/privacy-secties.

### `data_protection_officer_name`

**Naam van de functionaris voor gegevensbescherming**

Volledige naam van de aangewezen functionaris voor gegevensbescherming, weergegeven op pagina's over persoonlijke gegevens en privacy.

### `data_protection_officer_role`

**Rol van de functionaris voor gegevensbescherming**

Functietitel of rol van de aangewezen functionaris voor gegevensbescherming, weergegeven naast hun naam in privacy-informatie.

### `disable_change_user_visibility_for_public_courses`

**Voorkomen dat gebruikers van tools zichtbaar worden gemaakt in openbare cursussen**

Voorkom dat iemand de 'gebruikers'-tool zichtbaar maakt in een openbare cursus.

*Standaard: `true`*

### `disable_gdpr`

**GDPR-functies uitschakelen**

Als u elders al een verklaring over de bescherming van persoonlijke gegevens aan gebruikers beheert, kunt u deze functie veilig uitschakelen.

*Standaard: `true`*

### `hide_user_field_from_list`

**Velden verbergen in gebruikerslijst van cursus**

Standaard tonen we alle gegevens van gebruikers in de gebruikers-tool binnen de cursus. Met deze array kunt u specificeren welke velden u niet wilt weergeven. Dit heeft alleen invloed op hoofdvelden (niet op extra velden).