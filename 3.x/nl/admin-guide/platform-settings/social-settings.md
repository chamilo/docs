# Instellingen sociaal netwerk

Gedrag van het **sociale netwerk** — vrienden, groepen, berichten op de muur, fotoalbums.

Deze instellingen vindt u onder **Beheer > Configuratie-instellingen > Sociaal netwerk**. Deze categorie bevat **7 instellingen**, hieronder weergegeven met de titel en toelichting zoals meegeleverd in de settings-fixtures van het platform (`SettingsCurrentFixtures.php`).

> De variabelenaam in de code staat in monospace. Gebruik die bij scripting via de API of wanneer u deze instellingen globaal wilt wijzigen door [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) te bewerken.

## Instellingen

### `allow_social_tool`

**Sociaalnetwerkhulpmiddel (Facebook-achtig)**

Het sociaalnetwerkhulpmiddel stelt gebruikers in staat relaties met andere gebruikers te definiëren en daarmee groepen van vrienden te vormen. Gecombineerd met het interne berichtensysteem maakt dit hulpmiddel nauwe communicatie met vrienden mogelijk, binnen de portaalomgeving.

*Standaard: `true`*

### `allow_students_to_create_groups_in_social`

**Leerlingen toestaan groepen te maken in het sociale netwerk**

Leerlingen toestaan groepen te maken in het sociale netwerk

*Standaard: `false`*


### `disable_dislike_option`

**'Dislike' uitschakelen voor sociale berichten**

Verwijdert de duim-omlaagoptie voor feedback op sociale berichten. Alleen duim omhoog (like) behouden.

*Standaard: `false`*

### `hide_social_groups_block`

**Groepenblok verbergen in het sociale netwerk**

Verwijdert de groepen-sectie uit de weergave van het sociale netwerk.

*Standaard: `false`*


### `social_enable_messages_feedback`

**Like/dislike voor sociale berichten**

Stelt gebruikers in staat feedback (likes of dislikes) toe te voegen aan berichten op de sociale muur.

*Standaard: `false`*

### `social_make_teachers_friend_all`

**Docenten en beheerders zien studenten als vrienden op het sociale netwerk**

Maakt automatisch dat instructeurs en beheerders als vrienden verschijnen voor alle studenten in de module sociaal netwerk.

*Standaard: `false`*


### `social_show_language_flag_in_profile`

**Taalvlag tonen naast avatar in het sociale netwerk**

Toont de taalvoorkeur van de gebruiker als vlagpictogram naast hun avatar in profielen van het sociale netwerk.

*Standaard: `false`*