# Webservices-instellingen

Configuratie van de legacy SOAP-/REST-webservices (los van de moderne API Platform-eindpunten).

Deze instellingen vindt u onder **Beheer > Configuratie-instellingen > Webservices**. Deze categorie bevat **7 instellingen**, hieronder weergegeven met de titel en toelichting zoals meegeleverd in de settings-fixtures van het platform (`SettingsCurrentFixtures.php`).

> De variabelenaam in de code staat in monospace. Gebruik deze bij scripting via de API of wanneer u deze instellingen globaal wilt wijzigen door [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) te bewerken.

## Instellingen

### `allow_download_documents_by_api_key`

**Download van cursusdocumenten via API-sleutel toestaan**

Documenten downloaden na verificatie van de REST-API-sleutel van een gebruiker

*Standaard: `false`*


### `disable_webservices`

**Webservices uitschakelen**

Als u geen webservices gebruikt, schakel dit in om onnodige beveiligingsrisico's te vermijden.

*Standaard: `false`*


### `messaging_allow_send_push_notification`

**Pushmeldingen naar de Chamilo Messaging-mobiele app toestaan**

Pushmeldingen verzenden via Google's Firebase Console

*Standaard: `false`*


### `messaging_gdc_api_key`

**Serversleutel van Firebase Console voor Cloud Messaging**

Serversleutel (legacy-token) uit de projectreferenties

### `messaging_gdc_project_number`

**Sender-ID van Firebase Console voor Cloud Messaging**

U moet een project registreren op <a href='https://console.firebase.google.com/'>Google Firebase Console</a>

### `webservice_enable_adminonly_api`

**Alleen-beheerder-webservices inschakelen**

Sommige REST-webservices zijn gemarkeerd als alleen voor beheerders en zijn standaard uitgeschakeld. Schakel deze functie in om toegang tot deze webservices te geven (uiteraard aan gebruikers met beheerdersreferenties).

*Standaard: `false`*

### `webservice_return_user_field`

**Webservices retourneren gebruikersveld**

Vraag REST-webservices (v2.php) om een andere identifier terug te geven voor velden die betrekking hebben op de gebruikers-ID. Dit is nuttig als het externe systeem niet echt met gebruikers-ID's werkt zoals ze in Chamilo zijn, omdat het externe systeem zo de teruggegeven gebruikersgegevens kan koppelen aan externe gegevens die bij Chamilo bekend zijn. Als u bijvoorbeeld een extern authenticatiesysteem gebruikt, kunt u het extra veld teruggeven dat wordt gebruikt om de gebruiker te koppelen aan het externe authenticatiesysteem in plaats van user.id.

*Standaard: `oauth2_id`*