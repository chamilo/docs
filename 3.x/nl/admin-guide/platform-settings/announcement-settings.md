# Aankondigingen-instellingen

Gedrag van de cursustool **Aankondigingen** — hoe aankondigingen worden verzonden en gepland.

Deze instellingen vindt u onder **Beheer > Configuratie-instellingen > Aankondigingen**. Deze categorie bevat **10 instellingen**, hieronder weergegeven met de titel en toelichting zoals meegeleverd in de settings-fixtures van het platform (`SettingsCurrentFixtures.php`).

> De variabelenaam in de code staat in monospace. Gebruik deze bij scripting via de API of wanneer u deze instellingen globaal wilt wijzigen door [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) te bewerken.

## Instellingen

### `allow_careers_in_global_announcements`

**Globale aankondigingen koppelen aan carrières en promoties**

Indien ingeschakeld, kunnen globale aankondigingen worden gekoppeld aan carrières en promoties voor gerichte verspreiding.

*Standaard: `false`*

### `allow_coach_to_edit_announcements`

**Tutors altijd aankondigingen laten bewerken**

Tutors altijd aankondigingen laten bewerken binnen actieve of afgelopen sessies.

*Standaard: `false`*

### `allow_scheduled_announcements`

**Geplande aankondigingen in sessies inschakelen**

Stelt sessiebeheerders in staat aankondigingen in te stellen die op specifieke datums of een aantal dagen voor/na de start/het einde van de sessie worden geactiveerd. Voor deze functie moet u een cron-taak instellen.

*Standaard: `false`*

### `announcements_hide_send_to_hrm_users`

**Optie om aankondigingen naar HR-gebruikers te sturen verbergen**

Verwijdert het selectievakje om het verzenden van aankondigingen naar gebruikers met HR-rollen in te schakelen (bevestiging in de aankondigingentool blijft vereist).

*Standaard: `true`*

### `course_announcement_scheduled_by_date`

**Datumgebaseerde aankondigingen**

Docenten toestaan aankondigingen te configureren die op specifieke datums worden verzonden. Hiervoor moet u een cron-taak instellen op cron/course_announcement.php die minstens één keer per dag draait.

*Standaard: `false`*

### `disable_announcement_attachment`

**Bijlagen bij aankondigingen uitschakelen**

Hoewel bijlagen in deze versie elegant worden afgehandeld en niet op schijf worden vermenigvuldigd, kunt u bijlagen volledig uitschakelen als u overdaad wilt voorkomen.

*Standaard: `false`*

### `disable_delete_all_announcements`

**Knop om alle aankondigingen te verwijderen uitschakelen**

Selecteer 'Ja' om de knop voor het verwijderen van alle aankondigingen te verwijderen, omdat docenten deze per ongeluk kunnen gebruiken.

*Standaard: `false`*

### `hide_announcement_sent_to_users_info`

**'Verzonden naar' in aankondigingen verbergen**

Selecteer 'Ja' om te voorkomen dat wordt getoond aan wie een aankondiging is verzonden.

*Standaard: `false`*

### `hide_global_announcements_when_not_connected` **v3**

**Globale aankondigingen voor anonieme gebruikers verbergen**

Platformaankondigingen verbergen voor anonieme gebruikers en ze alleen tonen aan geauthenticeerde gebruikers.

*Standaard: `false`*

### `hide_send_to_hrm_users`

**Optie om een kopie van een aankondiging naar HRM te sturen verbergen**

In het aankondigingenformulier verschijnt normaal een optie waarmee docenten een kopie van de aankondiging naar de HRM van de gebruiker kunnen sturen. Zet dit op 'Ja' om de optie te verwijderen (en de kopie *niet* te verzenden).