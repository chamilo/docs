# Administration af færdigheder

Denne side dækker de tre dashboard-poster, der bruges til at opbygge platformens færdighedskatalog: masseimport af færdigheder, administration af selve færdighedsdefinitionerne og tildeling af hver færdighed til en niveauskala.

## Skills Import

**Skills > Skills import** lader dig oprette et færdighedshierarki i massevis fra en CSV- eller XML-fil i stedet for at oprette færdigheder én ad gangen. Hver række skal som minimum have et `id`, et `parent_id` (til at opbygge træet) og en `title`. En skabelon er tilgængelig som udgangspunkt for din fil.

## Manage Skills

**Skills > Manage skills** er det primære færdighedskatalog: opret, rediger, aktiver/deaktiver og slet færdigheder. Hver færdighed har en titel, en kort kode, en beskrivelse, et ikon og en valgfri kriteriebeskrivelse (hvad en kursist skal gøre for at opnå den). Færdigheder kan indlejres — en færdighed kan have underordnede færdigheder — hvilket er det, [Skills Wheel](skills-wheel.md) visualiserer.

## Manage Skills Levels

**Skills > Manage skills levels** er en separat, mindre skærm: den viser eksisterende færdigheder og lader dig tildele hver enkelt til en **niveau-profil** — et navngivet, ordnet sæt niveauer (for eksempel Bronze/Sølv/Guld), som færdigheden måles imod. Kort sagt: brug **Manage skills** til at definere, hvad en færdighed *er*, og **Manage skills levels** til at definere, hvilken skala den måles på.

## Hvordan færdigheder tildeles

En færdighed tildeles en bruger (registreret som en udstedt færdighed med en dato) via en af følgende veje:

* Automatisk, når en kursist opfylder tærsklen for en karakterbogskategori — konfigureret på siden [Skills and Assessments](skills-assessments.md)
* Automatisk ved gennemførelse af specifikke kurser, som færdigheden er knyttet til
* Manuelt af en underviser (hvis **Teachers can assign skills** er aktiveret) eller en administrator