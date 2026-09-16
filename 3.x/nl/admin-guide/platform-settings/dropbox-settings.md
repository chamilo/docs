# Dropbox-instellingen

Gedrag van de **Dropbox**-tool voor bestandsuitwisseling.

Deze instellingen vindt u onder **Beheer > Configuratie-instellingen > Dropbox**. Deze categorie bevat **8 instellingen**, hieronder weergegeven met de titel en toelichting zoals meegeleverd in de settings-fixtures van het platform (`SettingsCurrentFixtures.php`).

> De variabelenaam in de code staat in monospace. Gebruik die bij scripting via de API of wanneer u deze instellingen globaal wilt wijzigen door [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) te bewerken.

## Instellingen

### `dropbox_allow_group`

**Dropbox: groepen toestaan**

Gebruikers kunnen bestanden naar groepen sturen

*Standaard: `true`*

### `dropbox_allow_just_upload`

**Dropbox: uploaden naar eigen dropbox-ruimte?**

Trainers en gebruikers toestaan documenten naar hun dropbox te uploaden zonder de documenten naar zichzelf te sturen

*Standaard: `true`*

### `dropbox_allow_mailing`

**Dropbox: mailing toestaan**

Met de mailingfunctionaliteit kunt u elke cursist een persoonlijk document sturen

*Standaard: `false`*

### `dropbox_allow_overwrite`

**Dropbox: mogen documenten overschreven worden**

Mag het oorspronkelijke document overschreven worden wanneer een gebruiker of trainer een document uploadt met de naam van een document dat al bestaat? Als u ja antwoordt, verliest u het versiebeheermechanisme.

*Standaard: `true`*

### `dropbox_allow_student_to_student`

**Dropbox: Cursist <-> Cursist**

Gebruikers toestaan documenten naar andere gebruikers te sturen (peer 2 peer). Gebruikers kunnen dit ook gebruiken voor minder relevante documenten (mp3, toetsantwoorden, ...). Als u dit uitschakelt, kunnen gebruikers documenten alleen naar de trainer sturen.

*Standaard: `true`*

### `dropbox_hide_course_coach`

**Dropbox: cursusbegeleider verbergen**

De sessie-cursusbegeleider in Dropbox verbergen wanneer de begeleider een document naar studenten stuurt

*Standaard: `false`*

### `dropbox_hide_general_coach`

**Algemene begeleider in Dropbox verbergen**

De naam van de algemene begeleider in de Dropbox-tool verbergen wanneer de algemene begeleider het bestand heeft geüpload

*Standaard: `false`*


### `dropbox_max_filesize`

**Dropbox: maximale bestandsgrootte van een document**

Hoe groot (in MB) mag een dropbox-document zijn?

*Standaard: `100000000`*