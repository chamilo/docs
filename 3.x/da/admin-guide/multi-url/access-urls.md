# Adgangs-URL'er

Adgangs-URL'er gør det muligt for en enkelt Chamilo-installation at betjene flere separate portaler.

Dette værktøj kan også nås fra administrationsdashboardets blok [Platform](../platform/README.md) som **Konfigurer flere adgangs-URL'er**.


## Anvendelsestilfælde

* **Multi-tenant-udrulninger** — Host separate træningsportaler for forskellige organisationer på en enkelt server
* **Afdelingsportaler** — Giv hver afdeling sin egen branded portal (f.eks. `hr.training.company.com`, `it.training.company.com`)
* **Regionale portaler** — Separate portaler for forskellige regioner eller sprog

## Sådan fungerer det

Hver adgangs-URL er et separat indgangspunkt til den samme Chamilo-installation:

* Brugere kan tildeles én eller flere adgangs-URL'er
* Kurser og sessioner tilhører specifikke adgangs-URL'er
* Platformindstillinger kan tilpasses pr. adgangs-URL
* Branding og temaer kan være forskellige pr. URL
* Brugere på én portal kan ikke se brugere eller kurser på en anden (medmindre de eksplicit deles)

## Konfiguration

### Aktivering af Multi-URL

Multi-URL skal aktiveres i Chamilo-konfigurationen (typisk i miljøindstillingerne). Dette gøres som regel under den indledende opsætning.

### Oprettelse af en adgangs-URL

1. Fra administrationspanelet skal du navigere til **Adgangs-URL'er**
2. Klik på **Tilføj URL**
3. Indtast URL'en (f.eks. `https://portal2.yoursite.com`) og en beskrivelse
4. Vælg eventuelt en **Overordnet URL** for at indlejre denne URL under en anden — se [URL-hierarki](#url-hierarchy) nedenfor
5. Gem

### Tildeling af brugere og kurser

* **Brugere** — Tildel brugere til specifikke adgangs-URL'er. En bruger kan tilhøre flere URL'er.
* **Kurser** — Tildel kurser til specifikke adgangs-URL'er
* **Sessioner** — Tildel sessioner til specifikke adgangs-URL'er

### Indstillinger pr. URL

Hver adgangs-URL kan have sine egne:

* **Farvetema** — Forskellig visuel branding
* **Platformnavn og logo** — Tilpasset identitet
* **Tilsidesættelse af indstillinger** — Visse platformindstillinger kan tilpasses pr. URL

## URL-hierarki

Adgangs-URL'er kan organiseres i et overordnet/underordnet træ i stedet for en flad liste. Når du opretter eller redigerer en URL, kan en urestriktet Global Administrator (se [Undertræsadministratorer](#subtree-administrators) nedenfor) vælge en hvilken som helst anden URL som dens **Overordnet URL**:

![Rediger URL-dialog med rullelisten Overordnet URL åben, der viser de øvrige adgangs-URL'er, der kan vælges som overordnet](/.gitbook/assets/admin-access-url-parent-select.png)

* Rullelisten tilbyder aldrig den URL, der redigeres, eller nogen af dens egne efterkommere, som mulig overordnet — dette forhindrer, at der oprettes en cyklus. Backend validerer dette igen uanset, hvad grænsefladen viser.
* Hvis en URL oprettes uden at der vælges en overordnet, falder den som standard tilbage til **login-only URL**, hvis en sådan findes (se [Indstillinger pr. URL](#per-url-settings) ovenfor), eller ellers til den første adgangs-URL — samme standardadfærd som før denne funktion fandtes.
* Den øverste URL i et træ — den uden overordnet — er træets **rod**. En enkelt Chamilo-installation kan hoste mere end ét uafhængigt træ.

Overalt hvor adgangs-URL'er vises — Multi-URL-dashboardet og administrationssiden for adgangs-URL'er — vises træet ved indrykning, hvor en overordnet umiddelbart efterfølges af sine egne underordnede (søskende sorteret alfabetisk), i stedet for en separat kolonne "Overordnet":

![Liste over adgangs-URL'er, der viser en rod-URL med to underordnede URL'er, hvoraf den ene har sin egen underordnede URL, indrykket for at afspejle hierarkiet](/.gitbook/assets/admin-access-url-hierarchy-list.png)

## Undertræsadministratorer

URL-hierarkiet afgør også, hvad en [Global Administrator](../users/user-roles.md) kan administrere:

* En, der er registreret på **rod**-URL'en i et træ, er **urestriktet**: vedkommende administrerer hver adgangs-URL, præcis som før denne funktion fandtes.
* En, der kun er registreret på en **ikke-rod**-URL, er **afgrænset**: siderne Multi-URL og Adgangs-URL'er viser kun den URL og dens efterkommere, og logindiagrammet på Multi-URL-dashboardet viser "Logins (dine URL'er)" i stedet for "Logins (alle URL'er samlet)".

Uanset afgrænsning forbliver følgende forbeholdt en **urestriktet** Global Administrator — en afgrænset administrator kan ikke udføre dem, selv for URL'er inden for sit eget undertræ:

* Oprettelse af en ny adgangs-URL
* Redigering af en adgangs-URL's egen URL, beskrivelse eller overordnede
* Aktivering eller deaktivering af en adgangs-URL
* Sletning af en adgangs-URL (rod-URL'en for hele installationen kan aldrig slettes, af nogen)
* Registrering af sig selv i alle adgangs-URL'er på én gang

En afgrænset administrator kan stadig administrere alt, der er *tildelt* URL'erne i sit undertræ — brugere, kurser, sessioner, branding og indstillinger — bare ikke selve adgangs-URL-posterne.

## Tips

* **Beslut tidligt** — Hvis du vælger en opsætning med flere URL'er, bør du gøre det i starten af dit Chamilo-projekt, da det kræver, at den første URL holdes relativt tom for indhold. At aktivere flere URL'er bagefter er mere udfordrende (kræver manuelle databaseændringer).
* **Planlæg URL-strukturen** — Beslut dig for din URL-ordning, før du opretter adgangs-URL'er, da ændring af URL'er senere påvirker alle eksisterende links og bogmærker
* **DNS-konfiguration** — Hver adgangs-URL skal resolvere til den samme Chamilo-server. Konfigurer DNS-poster i overensstemmelse hermed.
* **Global administrator** — Brug rollen Global Administrator til at administrere på tværs af alle adgangs-URL'er. For i stedet at delegere administrationen af kun én gren skal du registrere administratoren på en ikke-rod-URL — se [Subtree Administrators](#subtree-administrators)