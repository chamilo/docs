# Berichtinstellingen

Gedrag van het **Berichten / Inbox**-systeem.

Deze instellingen zijn toegankelijk via **Beheer > Configuratie-instellingen > Berichten**. Deze categorie bevat **7 instellingen**, hieronder opgesomd met de titel en opmerking zoals meegeleverd in de platforminstellingen (`SettingsCurrentFixtures.php`).

> De variabelenaam in de code wordt weergegeven in monospace. Gebruik deze bij het scripten via de API of wanneer u deze instellingen op globaal niveau wilt wijzigen door [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) te bewerken.

## Instellingen

### `allow_message_tool`

**Interne berichtentool**

Het inschakelen van de interne berichtentool stelt gebruikers in staat om berichten te verzenden naar andere gebruikers van het platform en om een berichteninbox te hebben.

*Standaard: `true`*

### `allow_send_message_to_all_platform_users`

**Toestaan om berichten te verzenden naar alle platformgebruikers**

Hiermee kunt u berichten verzenden naar elke gebruiker van het platform, niet alleen naar uw vrienden of de mensen die momenteel online zijn.

*Standaard: `false`*

### `allow_user_message_tracking`

**Beheerders kunnen persoonlijke berichten bekijken**

Hiermee kunnen beheerders persoonlijke berichten tussen een docent en een leerling bekijken. Zorg ervoor dat u een opmerking opneemt in uw algemene voorwaarden, aangezien dit invloed kan hebben op de privacybescherming.

*Standaard: `false`*

### `filter_interactivity_messages`

**Docenten hebben alleen toegang tot berichten van leerlingen binnen de sessietijdframe**

Filter berichten tussen een docent en een leerling tussen de start- en einddatums van de sessie.

*Standaard: `false`*

### `message_max_upload_filesize`

**Maximale uploadbestandsgrootte in berichten**

Maximale grootte voor bestandsuploads in de berichtentool (in Bytes).

*Standaard: `20971520`*

### `private_messages_about_user`

**Privéberichten tussen docenten over een leerling toestaan**

Sta uitwisseling van berichten toe tussen docenten/leidinggevenden over een gebruiker vanaf de trackingpagina van die gebruiker.

*Standaard: `false`*

### `private_messages_about_user_visible_to_user`

**Leerlingen toestaan om berichten over hen tussen docenten te zien**

Als de uitwisseling van berichten over een gebruiker is ingeschakeld, zal deze optie de betreffende gebruiker in staat stellen om de berichten te zien. Dit is om te voldoen aan regels van transparantie waaraan de organisatie mogelijk moet voldoen.

*Standaard: `false`*