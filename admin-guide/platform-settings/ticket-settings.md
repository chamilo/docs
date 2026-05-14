# Ticketinstellingen

Gedrag van het **Tickets** (helpdesk) systeem.

Toegang tot deze instellingen via **Beheer > Configuratie-instellingen > Tickets**. Deze categorie bevat **7 instellingen**, hieronder vermeld met de titel en opmerking zoals meegeleverd in de platforminstellingen (`SettingsCurrentFixtures.php`).

> De variabelenaam in de code wordt weergegeven in monospace. Gebruik deze bij het scripten via de API of wanneer u deze instellingen op globaal niveau wilt wijzigen door [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) te bewerken.

## Instellingen

### `show_link_bug_notification`

**Link tonen om een bug te melden**

Toon een link in de koptekst om een bug te melden op ons ondersteuningsplatform (http://support.chamilo.org). Bij het klikken op de link wordt de gebruiker doorgestuurd naar het ondersteuningsplatform, naar een wikipagina die het proces van bugmelding beschrijft.

*Standaard: `false`*

### `show_link_ticket_notification`

**Link voor het aanmaken van tickets tonen**

Toon de link voor het aanmaken van tickets aan gebruikers aan de rechterkant van het portaal.

*Standaard: `false`*

### `ticket_allow_category_edition`

**Bewerken van ticketcategorieën toestaan**

Sta het bewerken van categorieën toe door beheerders.

*Standaard: `false`*

### `ticket_allow_student_add`

**Gebruikers toestaan om tickets toe te voegen**

Sta alle gebruikers toe om tickets toe te voegen, niet alleen beheerders.

*Standaard: `false`*

### `ticket_project_user_roles`

**Toegang per rol tot ticketprojecten**

Sta toe dat ticketprojecten toegankelijk zijn voor specifieke gebruikersrollen. Voorbeeld: ['permissions' => [1 => [17]] waarbij project_id = 1, STUDENT_BOSS = 17.

### `ticket_send_warning_to_all_admins`

**Waarschuwingsberichten voor tickets naar beheerders sturen**

Stuur een bericht als een ticket is aangemaakt zonder categorie of als een categorie geen toegewezen beheerder heeft.

*Standaard: `false`*

### `ticket_warn_admin_no_user_in_category`

**Waarschuwing sturen naar beheerders als een ticketcategorie geen verantwoordelijke heeft**

Stuur een waarschuwingsbericht (e-mail en Chamilo-bericht) naar alle beheerders als er geen gebruiker is toegewezen aan een categorie.

*Standaard: `false`*