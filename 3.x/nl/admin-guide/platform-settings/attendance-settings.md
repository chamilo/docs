# Aanwezigheidsinstellingen

Standaardwaarden en gedrag van de tool **Attendance**.

Open deze instellingen via **Beheer > Configuratie-instellingen > Attendance**. Deze categorie bevat **5 instellingen**, hieronder weergegeven met de titel en toelichting zoals meegeleverd in de instellingen-fixtures van het platform (`SettingsCurrentFixtures.php`).

> De variabelenaam in de code staat in monospace. Gebruik die bij scripting via de API of wanneer u deze instellingen globaal wilt wijzigen door [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) te bewerken.

## Instellingen

### `allow_delete_attendance`

**Aanwezigheden: verwijderen inschakelen**

Het standaardgedrag in Chamilo is om aanwezigheidslijsten te verbergen in plaats van ze te verwijderen, voor het geval de docent dat per ongeluk zou doen. Schakel deze optie in om docenten toe te staan aanwezigheidslijsten *echt* te verwijderen.

*Standaard: `true`*

### `attendance_allow_comments`

**Opmerkingen in aanwezigheidslijsten toestaan**

Docenten en studenten kunnen bij elke individuele aanwezigheid een opmerking plaatsen (ter motivering).

*Standaard: `false`*

### `attendance_calendar_set_duration` **v3**

**Duur van aanwezigheidsgebeurtenissen**

Optie om de duur van een gebeurtenis in de aanwezigheidslijst te definiëren.

*Standaard: `false`*

### `enable_sign_attendance_sheet`

**Aanwezigheid ondertekenen**

Ondertekenen inschakelen om iemands aanwezigheid te bevestigen.

*Standaard: `false`*

### `multilevel_grading`

**Meerlagige aanwezigheidsbeoordeling inschakelen**

Maakt het mogelijk aanwezigheid te beoordelen met meerdere niveaus in plaats van een eenvoudig aanwezig/afwezig-systeem.

*Standaard: `false`*