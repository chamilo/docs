# Berichtinstellingen

Gedrag van het **Berichten / Postvak IN**-systeem.

Deze instellingen vindt u onder **Beheer > Configuratie-instellingen > Berichten**. Deze categorie bevat **7 instellingen**, hieronder vermeld met de titel en toelichting zoals meegeleverd in de instellingen-fixtures van het platform (`SettingsCurrentFixtures.php`).

> De variabelenaam in de code wordt in monospace weergegeven. Gebruik deze bij scripting via de API of wanneer u deze instellingen globaal wilt wijzigen door [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) te bewerken.

## Instellingen

### `allow_message_tool`

**Intern berichtensysteem**

Het inschakelen van het interne berichtensysteem stelt gebruikers in staat berichten te versturen naar andere gebruikers van het platform en over een postvak IN te beschikken.

*Standaard: `true`*

### `allow_send_message_to_all_platform_users`

**Berichten versturen naar elke platformgebruiker toestaan**

Hiermee kunt u berichten versturen naar elke gebruiker van het platform, niet alleen naar uw vrienden of de personen die momenteel online zijn.

*Standaard: `false`*

### `allow_user_message_tracking`

**Beheerders kunnen persoonlijke berichten zien**

Beheerders toestaan persoonlijke berichten tussen een docent en een student te zien. Zorg ervoor dat u een vermelding opneemt in uw algemene voorwaarden, omdat dit de privacybescherming kan beïnvloeden.

*Standaard: `false`*


### `filter_interactivity_messages`

**Docenten hebben alleen toegang tot berichten van studenten binnen het sessietijdvak**

Berichten tussen een docent en een student filteren tussen de begin- en einddatum van de sessie

*Standaard: `false`*


### `message_max_upload_filesize`

**Maximale uploadbestandsgrootte in berichten**

Maximale grootte voor bestandsuploads in het berichtensysteem (in bytes)

*Standaard: `20971520`*

### `private_messages_about_user`

**Privéberichten tussen docenten over een student toestaan**

Uitwisseling van berichten van docenten/leidinggevenden over een gebruiker toestaan vanaf de volgpagina van die gebruiker.

*Standaard: `false`*


### `private_messages_about_user_visible_to_user`

**Studenten toestaan berichten over hen tussen docenten te zien**

Als de uitwisseling van berichten over een gebruiker is ingeschakeld, stelt deze optie de betreffende gebruiker in staat de berichten te zien. Dit is om te voldoen aan transparantieregels waaraan de organisatie mogelijk moet voldoen.

*Standaard: `false`*