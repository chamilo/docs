# Ferdigheter

Blokken **Ferdigheter** på administrasjonsoversikten samler verktøyene for å definere, organisere og spore kompetansebadges («ferdigheter») på tvers av plattformen. En ferdighet kan tildeles automatisk når en lærende når en terskel i karakterboken, fullfører bestemte kurs, eller manuelt av en lærer, og kan ha et badge-lignende ikon og et nivå (for eksempel Bronse/Sølv/Gull).

![Blokken Ferdigheter på administrasjonsoversikten, med Ferdighetshjul, Import av ferdigheter, Administrer ferdigheter, Administrer ferdighetsnivåer, Ferdighetsrangering og Ferdigheter og vurderinger](../../.gitbook/assets/admin-skills-block.png)

Hele blokken vises bare hvis innstillingen **Aktiver ferdighetsverktøy** (`skill.allow_skills_tool`, under Konfigurasjonsinnstillinger > Ferdigheter) er slått på — den er aktivert som standard.

## Tilgang til ferdighetsblokken

Fra administrasjonspanelet vises blokken **Ferdigheter** sammen med de andre oversiktsblokkene. Klikk på en av lenkene for å åpne det tilhørende verktøyet.

## Hva som finnes i blokken

* **[Administrere ferdigheter](managing-skills.md)** — Opprett ferdigheter, importer dem i bulk og tilordne hver av dem til en nivåskala
* **[Ferdighetshjul](skills-wheel.md)** — Et zoombart visuelt kart over hele ferdighetstreet
* **[Ferdighetsrangering](skills-ranking.md)** — En rangering av brukere etter oppnådde ferdigheter
* **[Ferdigheter og vurderinger](skills-assessments.md)** — Koble karakterbok-kategorier til ferdighetene de tildeler

## Relaterte innstillinger

Noen andre innstillinger under Konfigurasjonsinnstillinger > Ferdigheter endrer hvem som kan gjøre hva med denne blokken:

* **Tillat HR-administrasjon av ferdigheter** (`allow_hr_skills_management`) — Lar brukere med rollen Human Resources Manager administrere ferdigheter sammen med administratorer
* **Tillat private ferdigheter** (`allow_private_skills`)
* **Lærere kan tildele ferdigheter** (`skills_teachers_can_assign_skills`)
* **Skjul ferdighetsnivåer** (`hide_skill_levels`)
* **Vis fullt ferdighetsnavn på ferdighetshjulet** (`show_full_skill_name_on_skill_wheel`)