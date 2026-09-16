# Taleninstellingen

Beschikbare talen, standaardtaal en hoe Chamilo bepaalt welke taal wordt weergegeven.

Deze instellingen vindt u onder **Beheer > Configuratie-instellingen > Talen**. Deze categorie bevat **13 instellingen**, hieronder vermeld met de titel en toelichting zoals meegeleverd in de settings-fixtures van het platform (`SettingsCurrentFixtures.php`).

> De variabelenaam in de code wordt in monospace weergegeven. Gebruik deze bij scripting via de API of wanneer u deze instellingen globaal wilt wijzigen door [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) te bewerken.

## Instellingen

### `allow_course_multiple_languages`

**Cursussen in meerdere talen**

Schakel cursussen in die in meer dan één taal worden beheerd. Deze optie voegt een taalkiezer toe op de cursuspagina zodat gebruikers eenvoudig kunnen wisselen, en voegt een extra veld 'multiple_language' toe aan cursussen waarmee procedures voor beheer op afstand mogelijk zijn.

*Standaard: `false`*


### `allow_use_sub_language`

**Definitie en gebruik van subtalen toestaan**

Door deze optie in te schakelen kunt u varianten definiëren voor elk van de taaltermijnen die in de interface van het platform worden gebruikt, in de vorm van een nieuwe taal die gebaseerd is op en een bestaande taal uitbreidt. U vindt deze optie in het talengedeelte van het beheerpaneel.

*Standaard: `false`*

### `auto_detect_language_custom_pages`

**Automatische taaldetectie in aangepaste pagina's inschakelen**

Als u aangepaste pagina's gebruikt, schakel dit in als u wilt dat een taaldetector daar de pagina in de browsertaal van de gebruiker toont, of schakel uit om de taal te forceren naar de standaardplatformtaal.

*Standaard: `true`*


### `language_by_resource` **v3**

**Taal per resource**

Toestaan om een specifieke taal toe te wijzen aan afzonderlijke resources.

*Standaard: `false`*

### `language_flags_by_country`

**Taalvlaggen**

Landvlaggen gebruiken voor talen. Dit is standaard niet ingeschakeld omdat sommige talen niet strikt aan een land zijn gekoppeld, wat tot frustratie bij sommige gebruikers kan leiden.

*Standaard: `false`*


### `language_priority_1`

**Hoogste prioriteitstaal**

Primaire taal die wordt geselecteerd wanneer meerdere taalcontexten zijn ingesteld.

*Standaard: `course_lang`*


### `language_priority_2`

**Secundaire prioriteitstaal**

Secundaire terugvaltaal als de eerste prioriteit niet beschikbaar of buiten context is.

*Standaard: `user_profil_lang`*


### `language_priority_3`

**Derde prioriteitstaal**

Tertiaire terugvaltaal als hogere prioriteiten falen.

*Standaard: `user_selected_lang`*


### `language_priority_4`

**Vierde prioriteitstaal**

Laatste terugvaloptie voor taal in volgorde van prioriteit.

*Standaard: `platform_lang`*


### `platform_language`

**Standaardplatformtaal**

Hoofdtaal, standaard gebruikt wanneer geen gebruikerstaal is ingesteld.

*Standaard: `en`*


### `show_different_course_language`

**Cursustalen tonen**

Toon de taal van elke cursus, naast de cursustitel, in de cursuslijst op de startpagina

*Standaard: `true`*


### `show_language_selector_in_menu`

**Taalwisselaar in het hoofdmenu**

Toon een taalkiezer in het hoofdmenu die onmiddellijk de taalvoorkeur van de gebruiker bijwerkt. Dit kan nuttig zijn in meertalige portalen waar cursisten voor hun leren van de ene taal naar de andere moeten wisselen.

*Standaard: `true`*


### `template_activate_language_filter`

**Documentsjablonen in meerdere talen**

Documentsjablonen (op platform- of cursusniveau) inschakelen zodat ze voor specifieke talen kunnen worden geconfigureerd.

*Standaard: `false`*