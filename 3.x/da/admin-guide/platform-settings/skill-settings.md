# Kompetenceindstillinger

Adfærd for **Kompetencer**-systemet — kompetencetræ, tildelingsregler, profilintegration.

Få adgang til disse indstillinger under **Administration > Konfigurationsindstillinger > Kompetencer**. Denne kategori indeholder **13 indstillinger**, listet nedenfor med titel og kommentar som de leveres i platformens indstillingsfixtures (`SettingsCurrentFixtures.php`).

> Variabelnavnet i koden vises med fastbreddeskrift. Brug det, når du script'er via API'et, eller når du skal ændre disse indstillinger på globalt niveau ved at redigere [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Indstillinger

### `allow_hr_skills_management`

**Tillad HR-kompetencestyring**

Giver HR mulighed for at administrere kompetencer

*Standard: `true`*


### `allow_private_skills`

**Skjul kompetencer for kursister**

Hvis aktiveret, kan kompetencer kun vises for administratorer, undervisere (relateret til en bruger via et kursus) og HRM-brugere (hvis relateret til en bruger).

*Standard: `false`*


### `allow_skill_rel_items`

**Aktivér tilknytning af kompetencer til elementer**

Dette aktiverer en væsentlig funktion, der gør det muligt at knytte ethvert element til (og dermed tillade erhvervelse af) en kompetence. Funktionen kræver stadig, at underviseren bekræfter erhvervelsen af kompetencen, så erhvervelsen er ikke automatisk.

*Standard: `false`*


### `allow_skills_tool`

**Tillad værktøjet Kompetencer**

Brugere kan se deres kompetencer i det sociale netværk og i en blok på startsiden.

*Standard: `true`*

### `allow_teacher_access_student_skills`

**Tillad undervisere at tilgå kursisters kompetencer**

[inferred] Tillad undervisere at se og overvåge kompetencer, som kursister har erhvervet i deres kurser.

*Standard: `false`*


### `badge_assignation_notification`

**Send meddelelse til kursisten, når en kompetence/badge er erhvervet**

[inferred] Send meddelelser til kursister, når de erhverver en ny kompetence eller badge-præstation.

*Standard: `false`*


### `hide_skill_levels`

**Skjul funktionen kompetenceniveauer**

[inferred] Skjul kompetenceniveauhierarkiet og niveaubetegnelser i kompetencerelaterede visninger.

*Standard: `false`*


### `manual_assignment_subskill_autoload`

**Tildeling af kompetencer til bruger: automatisk indlæsning af underkompetencer**

Når kompetencer tildeles manuelt til en bruger, kan formularen indstilles til automatisk at tilbyde tildeling af en underkompetence i stedet for den kompetence, du valgte.

*Standard: `false`*


### `openbadges_backpack`

**OpenBadges backpack-URL**

URL'en til OpenBadges backpack-serveren, der som standard vil blive brugt af alle brugere, der ønsker at eksportere deres badges. Dette er som standard Mozilla Foundations åbne og gratis backpack-repositorium: https://backpack.openbadges.org/

### `show_full_skill_name_on_skill_wheel`

**Vis fuldt kompetencenavn på kompetencehjulet**

På kompetencehjulet vises kompetencens navn, når den har en kort kode.

*Standard: `false`*


### `skill_levels_names`

**Navne på kompetenceniveauer**

Definér navne for kompetenceniveauer som et array af id => navn.

### `skills_hierarchical_view_in_user_tracking`

**Vis kompetencer som en hierarkisk tabel**

[inferred] Vis kursisters kompetencer som en hierarkisk træstruktur på fremskridts- og rapportsider.

*Standard: `false`*


### `skills_teachers_can_assign_skills`

**Tillad undervisere at angive, hvilke kompetencer der erhverves via deres kurser**

Som standard kan kun administratorer beslutte, hvilke kompetencer der kan erhverves via hvilket kursus.

*Standard: `false`*