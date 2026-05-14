# Instellingen voor Aankondigingen

Gedrag van de cursus **Aankondigingen**-tool — hoe aankondigingen worden verzonden en ingepland.

Ga naar deze instellingen via **Beheer > Configuratie-instellingen > Aankondigingen**. Deze categorie bevat **9 instellingen**, hieronder opgesomd met de titel en opmerking zoals meegeleverd in de platforminstellingen (`SettingsCurrentFixtures.php`).

> De variabelenaam in de code wordt weergegeven in monospace. Gebruik deze bij het scripten via de API of wanneer u deze instellingen op globaal niveau wilt wijzigen door [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) te bewerken.

## Instellingen

### `allow_careers_in_global_announcements`

**Koppel globale aankondigingen aan carrières en promoties**

Indien ingeschakeld, kunnen globale aankondigingen worden gekoppeld aan carrières en promoties voor gerichte distributie.

*Standaard: `false`*

### `allow_coach_to_edit_announcements`

**Sta coaches toe om altijd aankondigingen te bewerken**

Sta coaches toe om altijd aankondigingen te bewerken binnen actieve of afgelopen sessies.

*Standaard: `false`*

### `allow_scheduled_announcements`

**Schakel geplande aankondigingen in sessies in**

Hiermee kunnen sessiebeheerders aankondigingen instellen die op specifieke data worden geactiveerd of na/voor een aantal dagen na het begin/einde van de sessie. Het inschakelen van deze functie vereist dat u een cron-taak instelt.

*Standaard: `false`*

### `announcements_hide_send_to_hrm_users`

**Verberg de optie om aankondigingen naar HR-gebruikers te sturen**

Verwijder het selectievakje om het verzenden van aankondigingen naar gebruikers met HR-rollen mogelijk te maken (vereist nog steeds bevestiging in de aankondigingentool).

*Standaard: `true`*

### `course_announcement_scheduled_by_date`

**Datumgebaseerde aankondigingen**

Sta docenten toe om aankondigingen te configureren die op specifieke data worden verzonden. Dit vereist dat u een cron-taak instelt op cron/course_announcement.php die minstens eenmaal per dag wordt uitgevoerd.

*Standaard: `false`*

### `disable_announcement_attachment`

**Schakel bijlagen bij aankondigingen uit**

Hoewel bijlagen in deze versie op een elegante manier worden behandeld en niet worden vermenigvuldigd op schijf, wilt u misschien bijlagen volledig uitschakelen om excessen te vermijden.

*Standaard: `false`*

### `disable_delete_all_announcements`

**Schakel de knop om alle aankondigingen te verwijderen uit**

Selecteer 'Ja' om de knop voor het verwijderen van alle aankondigingen te verwijderen, aangezien deze per ongeluk door docenten kan worden gebruikt.

*Standaard: `false`*

### `hide_announcement_sent_to_users_info`

**Verberg 'verzonden naar' in aankondigingen**

Selecteer 'Ja' om te voorkomen dat wordt weergegeven aan wie een aankondiging is verzonden.

*Standaard: `false`*

### `hide_send_to_hrm_users`

**Verberg de optie om een kopie van de aankondiging naar HRM te sturen**

In het aankondigingenformulier verschijnt normaal gesproken een optie waarmee docenten een kopie van de aankondiging naar de HRM van de gebruiker kunnen sturen. Stel dit in op 'Ja' om de optie te verwijderen (en *geen* kopie te verzenden).