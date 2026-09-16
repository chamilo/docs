# Vaardigheidsinstellingen

Gedrag van het **Vaardigheden**-systeem — vaardigheidsboom, toekenningsregels, integratie in profielen.

Toegang tot deze instellingen vindt u onder **Beheer > Configuratie-instellingen > Vaardigheden**. Deze categorie bevat **13 instellingen**, hieronder opgesomd met de titel en opmerking zoals meegeleverd in de instellingenfixtures van het platform (`SettingsCurrentFixtures.php`).

> De variabelenaam in de code wordt weergegeven in monospace. Gebruik deze bij het scripten via de API of wanneer u deze instellingen op globaal niveau wilt wijzigen door [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) te bewerken.

## Instellingen

### `allow_hr_skills_management`

**HR-vaardigheidsbeheer toestaan**

Staat HR toe om vaardigheden te beheren.

*Standaard: `true`*

### `allow_private_skills`

**Vaardigheden verbergen voor leerlingen**

Indien ingeschakeld, zijn vaardigheden alleen zichtbaar voor beheerders, docenten (gerelateerd aan een gebruiker via een cursus) en HRM-gebruikers (indien gerelateerd aan een gebruiker).

*Standaard: `false`*

### `allow_skill_rel_items`

**Koppelen van vaardigheden aan items inschakelen**

Dit activeert een belangrijke functie waarmee elk item gekoppeld kan worden aan (en zo de verwerving van) een vaardigheid mogelijk maakt. De functie vereist nog steeds dat de docent de verwerving van de vaardigheid bevestigt, dus de verwerving is niet automatisch.

*Standaard: `false`*

### `allow_skills_tool`

**Vaardighedentool toestaan**

Gebruikers kunnen hun vaardigheden zien in het sociale netwerk en in een blok op de startpagina.

*Standaard: `true`*

### `allow_teacher_access_student_skills`

**Docenten toegang geven tot vaardigheden van leerlingen**

[afgeleid] Sta docenten toe om de vaardigheden van leerlingen in hun cursussen te bekijken en te volgen.

*Standaard: `false`*

### `badge_assignation_notification`

**Melding sturen naar leerling bij het behalen van een vaardigheid/badge**

[afgeleid] Stuur meldingen naar leerlingen wanneer ze een nieuwe vaardigheid of badge behalen.

*Standaard: `false`*

### `hide_skill_levels`

**Vaardigheidsniveausfunctie verbergen**

[afgeleid] Verberg de hiërarchie van vaardigheidsniveaus en niveau-labels in weergaven gerelateerd aan vaardigheden.

*Standaard: `false`*

### `manual_assignment_subskill_autoload`

**Vaardigheden toewijzen aan gebruiker: automatisch laden van subvaardigheden**

Bij het handmatig toewijzen van vaardigheden aan een gebruiker kan het formulier worden ingesteld om automatisch voor te stellen een subvaardigheid toe te wijzen in plaats van de geselecteerde vaardigheid.

*Standaard: `false`*

### `openbadges_backpack`

**OpenBadges backpack URL**

De URL van de OpenBadges backpack-server die standaard wordt gebruikt voor alle gebruikers die hun badges willen exporteren. Dit is standaard de open en gratis backpack-repository van de Mozilla Foundation: https://backpack.openbadges.org/

### `show_full_skill_name_on_skill_wheel`

**Volledige vaardigheidsnaam tonen op vaardigheidsrad**

Op het vaardigheidsrad wordt de naam van de vaardigheid getoond wanneer deze een korte code heeft.

*Standaard: `false`*

### `skill_levels_names`

**Namen van vaardigheidsniveaus**

Definieer namen voor niveaus van vaardigheden als een array van id => naam.

### `skills_hierarchical_view_in_user_tracking`

**Vaardigheden weergeven als hiërarchische tabel**

[afgeleid] Toon vaardigheden van leerlingen als een hiërarchische boomstructuur op voortgangs- en rapportagepagina's.

*Standaard: `false`*

### `skills_teachers_can_assign_skills`

**Docenten toestaan om te bepalen welke vaardigheden via hun cursussen worden behaald**

Standaard kunnen alleen beheerders bepalen welke vaardigheden via welke cursus kunnen worden behaald.

*Standaard: `false`*