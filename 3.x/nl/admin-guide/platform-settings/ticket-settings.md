# Ticketinstellingen

Gedrag van het **Tickets**-systeem (helpdesk).

Open deze instellingen via **Beheer > Configuratie-instellingen > Tickets**. Deze categorie bevat **8 instellingen**, hieronder vermeld met de titel en het commentaar zoals meegeleverd in de fixtures voor instellingen van het platform (`SettingsCurrentFixtures.php`).

> De variabelenaam in de code wordt in monospace weergegeven. Gebruik deze bij scripting via de API of wanneer u deze instellingen op globaal niveau wilt wijzigen door [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) te bewerken.

## Instellingen

### `show_link_bug_notification`

**Koppeling tonen om een bug te melden**

Toon een koppeling in de koptekst om een bug te melden binnen ons ondersteuningsplatform (http://support.chamilo.org). Wanneer op de koppeling wordt geklikt, wordt de gebruiker doorgestuurd naar het ondersteuningsplatform, naar een wikipagina die het proces voor het melden van bugs beschrijft.

*Standaard: `false`*


### `show_link_ticket_notification`

**Koppeling voor het aanmaken van tickets tonen**

Toon de koppeling voor het aanmaken van tickets aan gebruikers aan de rechterzijde van het portaal

*Standaard: `false`*


### `ticket_allow_category_edition`

**Bewerken van ticketcategorieën toestaan**

Sta het bewerken van categorieën door beheerders toe.

*Standaard: `false`*

### `ticket_allow_student_add`

**Gebruikers toestaan tickets toe te voegen**

Staat alle gebruikers toe tickets toe te voegen, niet alleen de beheerders.

*Standaard: `false`*

### `ticket_project_user_roles`

**Toegang per rol tot ticketprojecten**

Sta toe dat ticketprojecten worden benaderd door specifieke gebruikersrollen. Voorbeeld: ['permissions' => [1 => [17]] waarbij project_id = 1, STUDENT_BOSS = 17.

> Deze instelling is verplicht voor niet-beheerders: zonder een hier gedefinieerde roltoewijzing hebben alleen beheerders toegang tot ondersteuningstickets. Om een andere rol toegang te geven tot een ticketproject, voegt u de rol-ID toe aan de machtigingen van deze instelling voor dat project.

### `ticket_send_warning_to_all_admins`

**Waarschuwingsberichten over tickets naar beheerders sturen**

Stuur een bericht als een ticket is aangemaakt zonder categorie of als aan een categorie geen beheerder is toegewezen.

*Standaard: `false`*


### `ticket_support_bot_enabled`

**Ondersteuningsbot inschakelen**

Schakel de ondersteuningsassistent met beslisboom in de vastgezette chat in. Dit is standaard uitgeschakeld. Beheerders moeten ook een geldige ondersteuningsboom met een startvraag en opties configureren en publiceren voordat de bot beschikbaar wordt. De bot gebruikt vooraf gedefinieerde keuzes in plaats van generatieve AI en kan een ticket aanmaken voor onopgeloste vragen.

*Standaard: `false`*

Zie [Ondersteuningsbot](../support-bot.md) voor configuratie en gebruikersstroom (PR #9224, issue #8754).

### `ticket_warn_admin_no_user_in_category`

**Waarschuwing naar beheerders sturen als een ticketcategorie geen verantwoordelijke heeft**

Stuur een waarschuwingsbericht (e-mail en Chamilo-bericht) naar alle beheerders als er geen gebruiker aan een categorie is toegewezen.

*Standaard: `false`*