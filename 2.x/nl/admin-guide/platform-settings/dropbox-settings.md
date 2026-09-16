# Dropbox-instellingen

Gedrag van de **Dropbox** tool voor bestandsuitwisseling.

Deze instellingen zijn te vinden onder **Beheer > Configuratie-instellingen > Dropbox**. Deze categorie bevat **8 instellingen**, hieronder vermeld met de titel en opmerking zoals opgenomen in de standaardinstellingen van het platform (`SettingsCurrentFixtures.php`).

> De variabelenaam in de code wordt weergegeven in monospace. Gebruik deze bij het scripten via de API of wanneer u deze instellingen op globaal niveau wilt wijzigen door [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) te bewerken.

## Instellingen

### `dropbox_allow_group`

**Dropbox: groep toestaan**

Gebruikers kunnen bestanden naar groepen sturen

*Standaard: `true`*

### `dropbox_allow_just_upload`

**Dropbox: Uploaden naar eigen dropbox-ruimte?**

Trainers en gebruikers toestaan om documenten te uploaden naar hun dropbox zonder de documenten naar zichzelf te sturen

*Standaard: `true`*

### `dropbox_allow_mailing`

**Dropbox: Mailing toestaan**

Met de mailingfunctionaliteit kunt u elke leerling een persoonlijk document sturen

*Standaard: `false`*

### `dropbox_allow_overwrite`

**Dropbox: Kunnen documenten worden overschreven**

Kan het oorspronkelijke document worden overschreven wanneer een gebruiker of trainer een document uploadt met de naam van een reeds bestaand document? Als u ja antwoordt, verliest u het versiebeheermechanisme.

*Standaard: `true`*

### `dropbox_allow_student_to_student`

**Dropbox: Leerling <-> Leerling**

Gebruikers toestaan om documenten naar andere gebruikers te sturen (peer-to-peer). Gebruikers kunnen dit ook gebruiken voor minder relevante documenten (mp3, oplossingen voor tests, ...). Als u dit uitschakelt, kunnen gebruikers alleen documenten naar de trainer sturen.

*Standaard: `true`*

### `dropbox_hide_course_coach`

**Dropbox: cursuscoach verbergen**

De cursuscoach van de sessie verbergen in dropbox wanneer een document door de coach naar studenten wordt gestuurd

*Standaard: `false`*

### `dropbox_hide_general_coach`

**Algemene coach verbergen in dropbox**

De naam van de algemene coach verbergen in de dropbox-tool wanneer de algemene coach het bestand heeft geüpload

*Standaard: `false`*

### `dropbox_max_filesize`

**Dropbox: Maximale bestandsgrootte van een document**

Hoe groot (in MB) mag een dropbox-document zijn?

*Standaard: `100000000`*