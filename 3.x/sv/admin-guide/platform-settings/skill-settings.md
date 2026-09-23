# Kompetensinställningar

Beteende för **Kompetens**-systemet — kompetens träd, tilldelningsregler, profilintegration.

Åtkomst till dessa inställningar sker under **Administration > Konfigurationsinställningar > Kompetenser**. Denna kategori innehåller **13 inställningar**, listade nedan med titel och kommentar som levereras i plattformens inställningsfixtures (`SettingsCurrentFixtures.php`).

> Variabelnamnet i koden visas i monospace. Använd det vid skriptning via API:et eller när du behöver ändra dessa inställningar på global nivå genom att redigera [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Inställningar

### `allow_hr_skills_management`

**Tillåt HR-hantering av kompetenser**

Tillåter HR att hantera kompetenser

*Standard: `true`*


### `allow_private_skills`

**Dölj kompetenser för lärande**

Om aktiverad kan kompetenser endast synas för administratörer, lärare (relaterade till en användare via en kurs) och HRM-användare (om relaterade till en användare).

*Standard: `false`*


### `allow_skill_rel_items`

**Aktivera koppling av kompetenser till objekt**

Detta aktiverar en viktig funktion som gör att vilket objekt som helst kan kopplas till (och därmed möjliggöra förvärv av) en kompetens. Funktionen kräver fortfarande att läraren bekräftar förvärvet av kompetensen, så förvärvet är inte automatiskt.

*Standard: `false`*


### `allow_skills_tool`

**Tillåt verktyget Kompetenser**

Användare kan se sina kompetenser i det sociala nätverket och i ett block på startsidan.

*Standard: `true`*

### `allow_teacher_access_student_skills`

**Tillåt lärare att komma åt lärandes kompetenser**

[inferred] Tillåt instruktörer att visa och övervaka kompetenser som förvärvats av lärande i deras kurser.

*Standard: `false`*


### `badge_assignation_notification`

**Skicka avisering till lärande när en kompetens/märke har förvärvats**

[inferred] Skicka aviseringar till lärande när de förvärvar en ny kompetens eller ett märkesprestation.

*Standard: `false`*


### `hide_skill_levels`

**Dölj funktionen för kompetensnivåer**

[inferred] Dölj hierarkin för kompetensnivåer och nivåetiketter i kompetensrelaterade vyer.

*Standard: `false`*


### `manual_assignment_subskill_autoload`

**Tilldela kompetenser till användare: automatisk inläsning av underkompetenser**

När kompetenser tilldelas manuellt till en användare kan formuläret ställas in så att det automatiskt erbjuder att tilldela en underkompetens istället för den kompetens du valde.

*Standard: `false`*


### `openbadges_backpack`

**OpenBadges backpack-URL**

URL:en till OpenBadges backpack-servern som används som standard för alla användare som vill exportera sina märken. Detta är som standard den öppna och fria backpack-lagringen från Mozilla Foundation: https://backpack.openbadges.org/

### `show_full_skill_name_on_skill_wheel`

**Visa fullständigt kompetensnamn på kompetenshjulet**

På kompetenshjulet visas namnet på kompetensen när den har en kort kod.

*Standard: `false`*


### `skill_levels_names`

**Namn på kompetensnivåer**

Definiera namn för kompetensnivåer som en array av id => namn.

### `skills_hierarchical_view_in_user_tracking`

**Visa kompetenser som en hierarkisk tabell**

[inferred] Visa lärandes kompetenser som en hierarkisk trädstruktur på sidor för framsteg och rapportering.

*Standard: `false`*


### `skills_teachers_can_assign_skills`

**Tillåt lärare att ange vilka kompetenser som förvärvas genom deras kurser**

Som standard kan endast administratörer besluta vilka kompetenser som kan förvärvas genom vilken kurs.

*Standard: `false`*