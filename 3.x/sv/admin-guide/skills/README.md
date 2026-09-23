# Färdigheter

Blocket **Färdigheter** på administrationspanelen grupperar verktygen för att definiera, organisera och följa upp kompetensmärken (”färdigheter”) på plattformen. En färdighet kan tilldelas automatiskt när en deltagare når ett tröskelvärde i betygsboken, slutför specifika kurser, eller manuellt av en lärare, och kan ha en märkesliknande ikon och en nivå (till exempel Brons/Silver/Guld).

![Blocket Färdigheter på administrationspanelen, med Färdighetshjul, Import av färdigheter, Hantera färdigheter, Hantera färdighetsnivåer, Färdighetsranking samt Färdigheter och bedömningar](../../.gitbook/assets/admin-skills-block.png)

Hela blocket visas endast om inställningen **Aktivera färdighetsverktyget** (`skill.allow_skills_tool`, under Konfigurationsinställningar > Färdigheter) är påslagen — den är aktiverad som standard.

## Åtkomst till blocket Färdigheter

Från administrationspanelen visas blocket **Färdigheter** tillsammans med de övriga panelblocken. Klicka på någon av dess länkar för att öppna motsvarande verktyg.

## Vad som finns i blocket

* **[Hantera färdigheter](managing-skills.md)** — Skapa färdigheter, importera dem i bulk och tilldela varje färdighet en nivåskala
* **[Färdighetshjul](skills-wheel.md)** — En zoombar visuell karta över hela färdighetsträdet
* **[Färdighetsranking](skills-ranking.md)** — En topplista över användare efter förvärvade färdigheter
* **[Färdigheter och bedömningar](skills-assessments.md)** — Koppla betygsbokskategorier till de färdigheter de tilldelar

## Relaterade inställningar

Några andra inställningar under Konfigurationsinställningar > Färdigheter styr vem som kan göra vad med detta block:

* **Tillåt HR-hantering av färdigheter** (`allow_hr_skills_management`) — Låter användare med rollen Human Resources Manager hantera färdigheter tillsammans med administratörer
* **Tillåt privata färdigheter** (`allow_private_skills`)
* **Lärare kan tilldela färdigheter** (`skills_teachers_can_assign_skills`)
* **Dölj färdighetsnivåer** (`hide_skill_levels`)
* **Visa fullständigt färdighetsnamn på färdighetshjulet** (`show_full_skill_name_on_skill_wheel`)