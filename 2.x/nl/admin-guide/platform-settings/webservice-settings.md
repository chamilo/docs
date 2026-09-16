# Instellingen voor Webservices

Configuratie van de verouderde SOAP / REST webservices (los van de moderne API Platform endpoints).

Toegang tot deze instellingen vindt u onder **Beheer > Configuratie-instellingen > Webservices**. Deze categorie bevat **7 instellingen**, hieronder opgesomd met de titel en opmerking zoals meegeleverd in de instellingenfixtures van het platform (`SettingsCurrentFixtures.php`).

> De variabelenaam in de code wordt weergegeven in monospace. Gebruik deze bij het scripten via de API of wanneer u deze instellingen op globaal niveau wilt wijzigen door [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) te bewerken.

## Instellingen

### `allow_download_documents_by_api_key`

**Toestaan om cursusdocumenten te downloaden met API-sleutel**

Documenten downloaden door de REST API-sleutel voor een gebruiker te verifiëren

*Standaard: `false`*

### `disable_webservices`

**Webservices uitschakelen**

Als u geen gebruik maakt van webservices, schakel dit in om onnodige beveiligingsrisico's te vermijden.

*Standaard: `false`*

### `messaging_allow_send_push_notification`

**Pushmeldingen toestaan voor de Chamilo Messaging mobiele app**

Pushmeldingen verzenden via Google's Firebase Console

*Standaard: `false`*

### `messaging_gdc_api_key`

**Server sleutel van Firebase Console voor Cloud Messaging**

Server sleutel (verouderd token) van projectreferenties

### `messaging_gdc_project_number`

**Verzender-ID van Firebase Console voor Cloud Messaging**

U moet een project registreren op <a href='https://console.firebase.google.com/'>Google Firebase Console</a>

### `webservice_enable_adminonly_api`

**Alleen-beheerder webservices inschakelen**

Sommige REST webservices zijn gemarkeerd als alleen voor beheerders en zijn standaard uitgeschakeld. Schakel deze functie in om toegang te geven tot deze webservices (uiteraard alleen voor gebruikers met beheerdersreferenties).

*Standaard: `false`*

### `webservice_return_user_field`

**Webservices retourneren gebruikersveld**

Vraag REST webservices (v2.php) om een andere identificator te retourneren voor velden die gerelateerd zijn aan gebruikers-ID. Dit is nuttig als het externe systeem niet echt omgaat met gebruikers-ID's zoals ze in Chamilo zijn, omdat het het externe systeem helpt om de geretourneerde gebruikersgegevens te koppelen aan externe gegevens die bekend zijn bij Chamilo. Bijvoorbeeld, als u een extern authenticatiesysteem gebruikt, kunt u het extra veld retourneren dat wordt gebruikt om de gebruiker te koppelen aan het externe authenticatiesysteem in plaats van user.id.

*Standaard: `oauth2_id`*