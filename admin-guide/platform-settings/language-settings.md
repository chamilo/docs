# Taalinstellingen

Beschikbare talen, standaardtaal en hoe Chamilo bepaalt welke taal wordt weergegeven.

Ga naar deze instellingen via **Beheer > Configuratie-instellingen > Talen**. Deze categorie bevat **12 instellingen**, hieronder opgesomd met de titel en opmerking zoals meegeleverd in de platforminstellingen (`SettingsCurrentFixtures.php`).

> De variabelenaam in de code wordt in monospace weergegeven. Gebruik deze bij het scripten via de API of wanneer u deze instellingen op globaal niveau wilt wijzigen door [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) te bewerken.

## Instellingen

### `allow_course_multiple_languages`

**Meertalige cursussen**

Schakel cursussen in die in meer dan één taal worden beheerd. Deze optie voegt een taalkiezer toe aan de cursuspagina zodat gebruikers eenvoudig kunnen wisselen, en voegt een extra veld 'multiple_language' toe aan cursussen, wat externe beheerprocedures mogelijk maakt.

*Standaard: `false`*

### `allow_use_sub_language`

**Definitie en gebruik van subtalen toestaan**

Door deze optie in te schakelen, kunt u variaties definiëren voor elk van de taalterminologieën die in de interface van het platform worden gebruikt, in de vorm van een nieuwe taal gebaseerd op en als uitbreiding van een bestaande taal. U vindt deze optie in de talensectie van het beheerpaneel.

*Standaard: `false`*

### `auto_detect_language_custom_pages`

**Taalautodetectie inschakelen op aangepaste pagina's**

Als u aangepaste pagina's gebruikt, schakel dit in als u wilt dat een taaldetector de pagina weergeeft in de browsertaal van de gebruiker, of schakel het uit om de standaard platformtaal af te dwingen.

*Standaard: `true`*

### `language_flags_by_country`

**Taalvlaggen**

Gebruik landvlaggen voor talen. Dit is standaard niet ingeschakeld omdat sommige talen niet strikt aan een land zijn gekoppeld, wat bij sommige gebruikers frustratie kan veroorzaken.

*Standaard: `false`*

### `language_priority_1`

**Hoogste prioriteitstaal**

Primaire taal die wordt geselecteerd wanneer meerdere taalcontexten zijn ingesteld.

*Standaard: `course_lang`*

### `language_priority_2`

**Secundaire prioriteitstaal**

Secundaire reservetaal als de eerste prioriteit niet beschikbaar is of buiten de context valt.

*Standaard: `user_profil_lang`*

### `language_priority_3`

**Derde prioriteitstaal**

Tertiaire reservetaal als hogere prioriteiten niet beschikbaar zijn.

*Standaard: `user_selected_lang`*

### `language_priority_4`

**Vierde prioriteitstaal**

Laatste reservetaaloptie in volgorde van prioriteit.

*Standaard: `platform_lang`*

### `platform_language`

**Standaard platformtaal**

Hoofdtaal, standaard gebruikt wanneer geen gebruikerstaal is ingesteld.

*Standaard: `en`*

### `show_different_course_language`

**Cursustalen weergeven**

Toon de taal waarin elke cursus is, naast de cursustitel, op de cursuslijst op de startpagina.

*Standaard: `true`*

### `show_language_selector_in_menu`

**Taalkiezer in hoofdmenu**

Toon een taalkiezer in het hoofdmenu die direct de taalvoorkeur van de gebruiker bijwerkt. Dit kan nuttig zijn in meertalige portals waar leerlingen van de ene naar de andere taal moeten overschakelen voor hun leerproces.

*Standaard: `true`*

### `template_activate_language_filter`

**Meertalige documentsjablonen**

Schakel documentsjablonen (op platform- of cursusniveau) in om voor specifieke talen te worden geconfigureerd.

*Standaard: `false`*