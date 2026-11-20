# Dropbox-instellingen

Gedrag van het bestanduitwisselingsinstrument **Dropbox**.

Open deze instellingen via **Beheer > Configuratie-instellingen > Dropbox**. Deze categorie bevat **10 instellingen**, hieronder vermeld met de titel en de toelichting zoals meegeleverd in de instellingenfixtures van het platform (`SettingsCurrentFixtures.php`).

> De variabelenaam in de code wordt in monospace weergegeven. Gebruik deze bij scripting via de API of wanneer u deze instellingen op globaal niveau wilt wijzigen door [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) te bewerken.

## Instellingen

### `dropbox_allow_group`

**Dropbox: groep toestaan**

Gebruikers kunnen bestanden naar groepen verzenden

*Standaard: `true`*

### `dropbox_allow_just_upload`

**Dropbox: Uploaden naar de eigen Dropbox-ruimte?**

Trainers en gebruikers toestaan documenten naar hun Dropbox te uploaden zonder de documenten naar zichzelf te verzenden

*Standaard: `true`*

### `dropbox_allow_mailing`

**Dropbox: Verzending toestaan**

Met de verzendfunctionaliteit kunt u elke cursist een persoonlijk document sturen

*Standaard: `false`*

### `dropbox_allow_overwrite`

**Dropbox: Kunnen documenten worden overschreven**

Kan het oorspronkelijke document worden overschreven wanneer een gebruiker of trainer een document uploadt met de naam van een document dat al bestaat? Als u ja antwoordt, verliest u het versiebeheermechanisme.

*Standaard: `true`*

### `dropbox_allow_student_to_student`

**Dropbox: Cursist <-> Cursist**

Gebruikers toestaan documenten naar andere gebruikers te verzenden (peer-to-peer). Gebruikers kunnen dit ook gebruiken voor minder relevante documenten (mp3, oplossingen van toetsen, ...). Als u dit uitschakelt, kunnen gebruikers alleen documenten naar de trainer verzenden.

*Standaard: `true`*

### `dropbox_hide_course_coach`

**Dropbox: cursustutor verbergen**

De sessiecursustutor in Dropbox verbergen wanneer een document door de tutor naar studenten wordt verzonden

*Standaard: `false`*

### `dropbox_hide_general_coach`

**Algemene tutor in Dropbox verbergen**

De naam van de algemene tutor in het Dropbox-instrument verbergen wanneer de algemene tutor het bestand heeft geüpload

*Standaard: `false`*


### `dropbox_max_filesize`

**Dropbox: Maximale bestandsgrootte van een document**

Hoe groot (in MB) mag een Dropbox-document zijn?

*Standaard: `100000000`*

### `dropbox_user_quota_mb`

**Dropbox: totale opslagquota per gebruiker (MB)**

Maximale gecombineerde grootte van bestanden die door één gebruiker over cursussen heen zijn geüpload. Ontvangers worden niet een tweede keer belast.

*Standaard: `0` (onbeperkt)*

### `dropbox_course_quota_mb`

**Dropbox: totale opslagquota per cursus (MB)**

Maximale gecombineerde grootte van Dropbox-bestanden voor één cursus, inclusief de sessies ervan. Los van de cursusquota voor Documenten.

*Standaard: `0` (onbeperkt)*

Zie [opslagquota PR #9358](https://github.com/chamilo/chamilo-lms/pull/9358).