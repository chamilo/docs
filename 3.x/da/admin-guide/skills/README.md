# Kompetencer

Blokken **Kompetencer** på administrationsdashboardet samler værktøjerne til at definere, organisere og følge kompetencebadges ("skills") på tværs af platformen. En kompetence kan tildeles automatisk, når en kursist når en tærskel i karakterbogen, gennemfører bestemte kurser, eller manuelt af en underviser, og kan have et badge-lignende ikon og et niveau (for eksempel Bronze/Sølv/Guld).

![Blokken Kompetencer på administrationsdashboardet med Skills wheel, Skills import, Manage skills, Manage skills levels, Skills ranking og Skills and assessments](/.gitbook/assets/admin-skills-block.png)

Hele blokken vises kun, hvis indstillingen **Enable skills tool** (`skill.allow_skills_tool`, under Configuration Settings > Skills) er slået til — den er slået til som standard.

## Adgang til blokken Kompetencer

Fra administrationspanelet vises blokken **Kompetencer** sammen med de øvrige dashboard-blokke. Klik på et af dens links for at åbne det tilsvarende værktøj.

## Indholdet af blokken

* **[Administration af kompetencer](managing-skills.md)** — Opret kompetencer, importér dem i bulk, og tildel hver enkelt en niveauskala
* **[Kompetencehjul](skills-wheel.md)** — Et zoom-bart visuelt kort over hele kompetencetræet
* **[Kompetencerangering](skills-ranking.md)** — En rangliste over brugere efter erhvervede kompetencer
* **[Kompetencer og vurderinger](skills-assessments.md)** — Knyt kategorier i karakterbogen til de kompetencer, de tildeler

## Relaterede indstillinger

En række andre indstillinger under Configuration Settings > Skills ændrer, hvem der kan gøre hvad med denne blok:

* **Allow HR skills management** (`allow_hr_skills_management`) — Giver brugere med rollen Human Resources Manager mulighed for at administrere kompetencer sammen med administratorer
* **Allow private skills** (`allow_private_skills`)
* **Teachers can assign skills** (`skills_teachers_can_assign_skills`)
* **Hide skill levels** (`hide_skill_levels`)
* **Show full skill name on skill wheel** (`show_full_skill_name_on_skill_wheel`)