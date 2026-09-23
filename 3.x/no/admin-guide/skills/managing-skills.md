# Administrere ferdigheter

Denne siden dekker de tre dashbordoppføringene som brukes til å bygge opp plattformens ferdighetskatalog: masseimport av ferdigheter, administrasjon av selve ferdighetsdefinisjonene, og tildeling av hver ferdighet til en nivåskala.

## Ferdighetsimport

**Skills > Skills import** lar deg masseopprette et ferdighetshierarki fra en CSV- eller XML-fil, i stedet for å opprette ferdigheter én og én. Hver rad trenger minst en `id`, en `parent_id` (for å bygge treet) og en `title`. En eksempelmal er tilgjengelig som utgangspunkt for filen din.

## Administrere ferdigheter

**Skills > Manage skills** er den primære ferdighetskatalogen: opprett, rediger, aktiver/deaktiver og slett ferdigheter. Hver ferdighet har en tittel, en kort kode, en beskrivelse, et ikon og en valgfri kriteriebeskrivelse (hva en lærende må gjøre for å oppnå den). Ferdigheter kan nestes — en ferdighet kan ha underordnede ferdigheter — noe som visualiseres i [Ferdighetshjulet](skills-wheel.md).

## Administrere ferdighetsnivåer

**Skills > Manage skills levels** er et eget, mindre skjermbilde: det lister eksisterende ferdigheter og lar deg tilordne hver av dem til en **nivåprofil** — et navngitt, ordnet sett med nivåer (for eksempel Bronse/Sølv/Gull) som ferdigheten måles mot. Kort fortalt: bruk **Manage skills** til å definere hva en ferdighet *er*, og **Manage skills levels** til å definere hvilken skala den måles på.

## Hvordan ferdigheter tildeles

En ferdighet tildeles en bruker (registrert som en utstedt ferdighet, med dato) via én av noen få veier:

* Automatisk, når en lærende når terskelen for en karakterbok-kategori — konfigurert på siden [Ferdigheter og vurderinger](skills-assessments.md)
* Automatisk, ved fullføring av bestemte kurs ferdigheten er knyttet til
* Manuelt, av en lærer (hvis **Teachers can assign skills** er aktivert) eller en administrator