# Instellingen voor Sociaal Netwerk

Gedrag van het **Sociaal Netwerk** — vrienden, groepen, muurberichten, fotoalbums.

Ga naar deze instellingen via **Beheer > Configuratie-instellingen > Sociaal Netwerk**. Deze categorie bevat **7 instellingen**, hieronder opgesomd met de titel en opmerking zoals meegeleverd in de instellingenfixtures van het platform (`SettingsCurrentFixtures.php`).

> De variabelenaam in de code wordt weergegeven in monospace. Gebruik deze bij het scripten via de API of wanneer u deze instellingen op globaal niveau wilt wijzigen door [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) te bewerken.

## Instellingen

### `allow_social_tool`

**Sociaal netwerktool (vergelijkbaar met Facebook)**

De sociaal netwerktool stelt gebruikers in staat om relaties met andere gebruikers te definiëren en zo vriendengroepen te vormen. In combinatie met de interne berichtentool maakt deze tool nauwe communicatie met vrienden mogelijk binnen de portaalomgeving.

*Standaard: `true`*

### `allow_students_to_create_groups_in_social`

**Leerlingen toestaan om groepen te maken in sociaal netwerk**

Sta leerlingen toe om groepen te maken in het sociaal netwerk.

*Standaard: `false`*

### `disable_dislike_option`

**'Dislike'-optie uitschakelen voor sociale berichten**

Verwijder de duim-omlaag-optie voor feedback op sociale berichten. Behoud alleen de duim-omhoog (like).

*Standaard: `false`*

### `hide_social_groups_block`

**Groepenblok verbergen in sociaal netwerk**

Verwijder de groepensectie uit de weergave van het sociaal netwerk.

*Standaard: `false`*

### `social_enable_messages_feedback`

**Like/Dislike voor sociale berichten**

Stelt gebruikers in staat om feedback (likes of dislikes) toe te voegen aan berichten op de sociale muur.

*Standaard: `false`*

### `social_make_teachers_friend_all`

**Docenten en beheerders worden gezien als vrienden van studenten op sociaal netwerk**

Maakt docenten en beheerders automatisch vrienden van alle studenten in de sociaal netwerkmodule.

*Standaard: `false`*

### `social_show_language_flag_in_profile`

**Taalvlag weergeven naast avatar in sociaal netwerk**

Toont de taalvoorkeur van de gebruiker als een vlagpictogram naast hun avatar in sociaal netwerkprofielen.

*Standaard: `false`*