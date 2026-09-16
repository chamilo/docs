# Ticketsinstellingen

Gedrag van het **Tickets**-systeem (helpdesk).

Deze instellingen vindt u onder **Beheer > Configuratie-instellingen > Tickets**. Deze categorie bevat **7 instellingen**, hieronder weergegeven met de titel en toelichting zoals meegeleverd in de instellingen-fixtures van het platform (`SettingsCurrentFixtures.php`).

> De variabelenaam in de code wordt in monospace weergegeven. Gebruik deze bij scripting via de API of wanneer u deze instellingen globaal wilt wijzigen door [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) te bewerken.

## Instellingen

### `show_link_bug_notification`

**Toon koppeling om een bug te melden**

Toon in de koptekst een koppeling om een bug te melden op ons ondersteuningsplatform (http://support.chamilo.org). Wanneer op de koppeling wordt geklikt, wordt de gebruiker naar het ondersteuningsplatform gestuurd, naar een wikipagina die het proces voor het melden van bugs beschrijft.

*Standaard: `false`*


### `show_link_ticket_notification`

**Toon koppeling voor het aanmaken van tickets**

Toon de koppeling voor het aanmaken van tickets aan gebruikers aan de rechterkant van het portaal

*Standaard: `false`*


### `ticket_allow_category_edition`

**Bewerking van ticketcategorieën toestaan**

Sta bewerking van categorieën toe door beheerders.

*Standaard: `false`*

### `ticket_allow_student_add`

**Gebruikers toestaan tickets toe te voegen**

Staat alle gebruikers toe tickets toe te voegen, niet alleen de beheerders.

*Standaard: `false`*

### `ticket_project_user_roles`

**Toegang tot ticketprojecten op basis van rol**

Sta toe dat ticketprojecten worden benaderd door specifieke gebruikersrollen. Voorbeeld: ['permissions' => [1 => [17]] waarbij project_id = 1, STUDENT_BOSS = 17.

> Deze instelling is verplicht voor niet-beheerders: zonder hier een roltoewijzing is alleen beheerders toegang tot supporttickets mogelijk. Om een andere rol toegang tot een ticketproject te geven, voegt u het rol-ID toe aan de permissions van deze instelling voor dat project.

### `ticket_send_warning_to_all_admins`

**Ticketwaarschuwingsberichten naar beheerders verzenden**

Verzend een bericht als een ticket is aangemaakt zonder categorie of als een categorie geen beheerder toegewezen heeft.

*Standaard: `false`*


### `ticket_warn_admin_no_user_in_category`

**Waarschuwing naar beheerders verzenden als een ticketcategorie geen verantwoordelijke heeft**

Verzend een waarschuwingsbericht (e-mail en Chamilo-bericht) naar alle beheerders als er geen gebruiker is toegewezen aan een categorie.

*Standaard: `false`*