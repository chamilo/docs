# Aanwezigheidsinstellingen

Standaardinstellingen en gedrag van de **Aanwezigheidstool**.

Ga naar deze instellingen via **Beheer > Configuratie-instellingen > Aanwezigheid**. Deze categorie bevat **4 instellingen**, hieronder opgesomd met de titel en opmerking zoals meegeleverd in de instellingenfixtures van het platform (`SettingsCurrentFixtures.php`).

> De variabelenaam in de code wordt weergegeven in monospace. Gebruik deze bij het scripten via de API of wanneer u deze instellingen op globaal niveau wilt wijzigen door [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) te bewerken.

## Instellingen

### `allow_delete_attendance`

**Aanwezigheden: verwijderen toestaan**

Het standaardgedrag in Chamilo is om aanwezigheidslijsten te verbergen in plaats van ze te verwijderen, voor het geval een docent dit per ongeluk zou doen. Schakel deze optie in om docenten toe te staan aanwezigheidslijsten *echt* te verwijderen.

*Standaard: `true`*

### `attendance_allow_comments`

**Opmerkingen toestaan in aanwezigheidslijsten**

Docenten en studenten kunnen opmerkingen plaatsen bij elke individuele aanwezigheid (ter rechtvaardiging).

*Standaard: `false`*

### `enable_sign_attendance_sheet`

**Aanwezigheid ondertekenen**

Schakel het nemen van handtekeningen in om iemands aanwezigheid te bevestigen.

*Standaard: `false`*

### `multilevel_grading`

**Multi-niveau beoordeling van aanwezigheid inschakelen**

Maakt het mogelijk om aanwezigheid te beoordelen met meerdere niveaus in plaats van een eenvoudig aanwezig/afwezig-systeem.

*Standaard: `false`*