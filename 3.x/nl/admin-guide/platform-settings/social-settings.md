# Instellingen voor het sociale netwerk

Gedrag van het **sociale netwerk** — vrienden, groepen, berichten op de muur, fotoalbums.

Open deze instellingen via **Beheer > Configuratie-instellingen > Sociaal netwerk**. Deze categorie bevat **7 instellingen**, hieronder vermeld met de titel en de toelichting zoals meegeleverd in de instellingenfixtures van het platform (`SettingsCurrentFixtures.php`).

> De variabelenaam in de code wordt in monospace weergegeven. Gebruik deze bij scripting via de API of wanneer u deze instellingen op globaal niveau wilt wijzigen door [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) te bewerken.

## Meerdere relaties tussen gebruikers

Een paar gebruikers kan tegelijkertijd **meer dan één relatietype** hebben. Een vriendschap kan bijvoorbeeld naast een hiërarchische (`BOSS`)-relatie bestaan; het vastleggen van het ene type mag het andere niet vervangen, en het tweemaal toevoegen van dezelfde relatie mag geen dubbele records opleveren. Dit is gecorrigeerd in [PR #9202](https://github.com/chamilo/chamilo-lms/pull/9202) (issue #2246).

Dit is geen nieuwe instelling voor het sociale netwerk en ook geen automatische verhoging van gebruikersrechten. Relatietypen, de platformrol van de gebruiker en toegangsrechten zijn afzonderlijke concepten. Wanneer na een upgrade sociale contacten of supervisorlinks ontbreken, controleer dan het juiste relatietype in plaats van ervan uit te gaan dat er slechts één relatie tussen twee accounts kan bestaan.

## Instellingen

### `allow_social_tool`

**Tool voor het sociale netwerk (Facebook-achtig)**

Met de tool voor het sociale netwerk kunnen gebruikers relaties met andere gebruikers definiëren en zo vriendengroepen samenstellen. In combinatie met de interne berichtentool maakt deze tool nauwe communicatie met vrienden mogelijk, binnen de omgeving van het portaal.

*Standaard: `true`*

### `allow_students_to_create_groups_in_social`

**Leerlingen toestaan groepen aan te maken in het sociale netwerk**

Leerlingen toestaan groepen aan te maken in het sociale netwerk

*Standaard: `false`*


### `disable_dislike_option`

**'Niet leuk' uitschakelen voor sociale berichten**

Verwijder de duim-omlaagoptie voor feedback op sociale berichten. Behoud alleen de duim omhoog (leuk).

*Standaard: `false`*

### `hide_social_groups_block`

**Groepenblok verbergen in het sociale netwerk**

Verwijdert de sectie groepen uit de weergave van het sociale netwerk.

*Standaard: `false`*


### `social_enable_messages_feedback`

**Leuk/niet leuk voor sociale berichten**

Stelt gebruikers in staat feedback (leuk of niet leuk) toe te voegen aan berichten op de sociale muur.

*Standaard: `false`*

### `social_make_teachers_friend_all`

**Docenten en beheerders zien leerlingen als vrienden in het sociale netwerk**

Zorgt er automatisch voor dat docenten en beheerders in de module voor het sociale netwerk als vrienden van alle leerlingen verschijnen.

*Standaard: `false`*


### `social_show_language_flag_in_profile`

**Taalvlag naast avatar tonen in het sociale netwerk**

Toont de taalvoorkeur van de gebruiker als vlagpictogram naast de avatar in profielen van het sociale netwerk.

*Standaard: `false`*