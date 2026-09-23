# System

Blokken **System** på administrationsdashboardet samler vedligeholdelsesværktøjer på serverniveau, selvopdateringsworkflowet, hjælpeprogrammer til inspektion af lager/ressourcer og platformbranding.

![Blokken System på administrationsdashboardet med listerne Clean temporary files, System status, System update, Colors, File info, Resources by type og List icons](../../.gitbook/assets/admin-system-block.png)

## Adgang til System-blokken

Fra administrationspanelet vises blokken **System** sammen med de øvrige dashboardblokke. Klik på et af dens links for at åbne det tilsvarende værktøj.

## Hvad blokken indeholder

* **[Systemværktøjer](system-tools.md)** — Ryd midlertidige filer, kør selvopdateringsworkflowet, inspicér gemte filer og ressourcer, og gennemse det indbyggede ikonsæt
* **Systemstatus** — Dækkes i [Systemstatus](../maintenance/system-status.md) under Vedligeholdelse
* **[Branding](branding/README.md)** — Farvetemaer (blokkens link "Colors" åbner den samme side Farvetemaer), tilpasning af portalen og skabeloner

To yderligere elementer — **Data filler** og **E-mail tester** — vises kun, når serveren har en `tests/`-mappe, hvilket er en udviklings-/QA-opsætning, ikke en produktionsopsætning. De vises ikke på en typisk produktionsinstallation; se [Systemværktøjer](system-tools.md#development-only-tools) for, hvad de gør, når de er til stede.