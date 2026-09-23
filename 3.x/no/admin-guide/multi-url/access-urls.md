# Tilgangs-URL-er

Tilgangs-URL-er gjør at én enkelt Chamilo-installasjon kan betjene flere separate portaler.

Dette verktøyet er også tilgjengelig fra administrasjonsdashbordets [Plattform](../platform/README.md)-blokk, som **Konfigurer flere tilgangs-URL-er**.


## Bruksområder

* **Flerleietaker-utrullinger** — Drift separate opplæringsportaler for ulike organisasjoner på én enkelt server
* **Avdelingsportaler** — Gi hver avdeling sin egen merkevaretilpassede portal (f.eks. `hr.training.company.com`, `it.training.company.com`)
* **Regionale portaler** — Separate portaler for ulike regioner eller språk

## Slik fungerer det

Hver tilgangs-URL er et eget inngangspunkt til den samme Chamilo-installasjonen:

* Brukere kan tildeles én eller flere tilgangs-URL-er
* Kurs og økter tilhører spesifikke tilgangs-URL-er
* Plattforminnstillinger kan tilpasses per tilgangs-URL
* Merkevarebygging og temaer kan variere per URL
* Brukere på én portal kan ikke se brukere eller kurs på en annen (med mindre de er eksplisitt delt)

## Konfigurasjon

### Aktivere flere URL-er

Flere URL-er må aktiveres i Chamilo-konfigurasjonen (vanligvis i miljøinnstillingene). Dette gjøres vanligvis under den første oppsettet.

### Opprette en tilgangs-URL

1. Fra administrasjonspanelet, naviger til **Tilgangs-URL-er**
2. Klikk **Legg til URL**
3. Angi URL-en (f.eks. `https://portal2.yoursite.com`) og en beskrivelse
4. Velg eventuelt en **Overordnet URL** for å nestle denne URL-en under en annen — se [URL-hierarki](#url-hierarchy) nedenfor
5. Lagre

### Tildele brukere og kurs

* **Brukere** — Tildel brukere til spesifikke tilgangs-URL-er. En bruker kan tilhøre flere URL-er.
* **Kurs** — Tildel kurs til spesifikke tilgangs-URL-er
* **Økter** — Tildel økter til spesifikke tilgangs-URL-er

### Innstillinger per URL

Hver tilgangs-URL kan ha sine egne:

* **Fargetema** — Ulik visuell merkevarebygging
* **Plattformnavn og logo** — Egen identitet
* **Overstyring av innstillinger** — Enkelte plattforminnstillinger kan tilpasses per URL

## URL-hierarki

Tilgangs-URL-er kan organiseres i et overordnet/underordnet tre i stedet for en flat liste. Når du oppretter eller redigerer en URL, kan en urestrikt Global Administrator (se [Administratorer for undertrær](#subtree-administrators) nedenfor) velge en hvilken som helst annen URL som **Overordnet URL**:

![Rediger URL-dialog med nedtrekkslisten Overordnet URL åpen, som viser de andre tilgangs-URL-ene som er tilgjengelige som overordnet](../../.gitbook/assets/admin-access-url-parent-select.png)

* Nedtrekkslisten tilbyr aldri URL-en som redigeres, eller noen av dens egne etterkommere, som mulig overordnet — dette forhindrer at det opprettes en syklus. Backend validerer dette på nytt uavhengig av hva grensesnittet viser.
* Hvis en URL opprettes uten at det velges en overordnet, settes den som standard til **kun-innlogging-URL-en** hvis en slik finnes (se [Innstillinger per URL](#per-url-settings) ovenfor), eller ellers til den første tilgangs-URL-en — samme standardatferd som før denne funksjonen fantes.
* Den øverste URL-en i et tre — den uten overordnet — er treets **rot**. Én enkelt Chamilo-installasjon kan huse mer enn ett uavhengig tre.

Der tilgangs-URL-er vises — dashbordet for flere URL-er og administrasjonssiden for tilgangs-URL-er — vises treet gjennom innrykk, en overordnet umiddelbart etterfulgt av sine egne underordnede (søsken sortert alfabetisk), i stedet for en egen «Overordnet»-kolonne:

![Liste over tilgangs-URL-er som viser en rot-URL med to underordnede URL-er, hvorav én har sin egen underordnede URL, innrykket for å gjenspeile hierarkiet](../../.gitbook/assets/admin-access-url-hierarchy-list.png)

## Administratorer for undertrær

URL-hierarkiet avgjør også hva en [Global Administrator](../users/user-roles.md) kan administrere:

* Én som er registrert på **rot**-URL-en i et tre er **urestrikt**: de administrerer hver tilgangs-URL, nøyaktig som før denne funksjonen fantes.
* Én som kun er registrert på en **ikke-rot**-URL er **avgrenset**: sidene for flere URL-er og tilgangs-URL-er viser bare den URL-en og dens etterkommere, og innloggingsdiagrammet på dashbordet for flere URL-er viser «Innlogginger (dine URL-er)» i stedet for «Innlogginger (alle URL-er samlet)».

Uavhengig av omfang forblir følgende forbeholdt en **urestrikt** Global Administrator — en avgrenset administrator kan ikke utføre dem selv for URL-er innenfor sitt eget undertrær:

* Opprette en ny tilgangs-URL
* Redigere en tilgangs-URL sin egen URL, beskrivelse eller overordnet
* Aktivere eller deaktivere en tilgangs-URL
* Slette en tilgangs-URL (rot-URL-en for hele installasjonen kan aldri slettes, av noen)
* Registrere seg selv i alle tilgangs-URL-er samtidig

En avgrenset administrator kan fortsatt administrere alt som er *tildelt* URL-ene i sitt undertrær — brukere, kurs, økter, merkevarebygging og innstillinger — bare ikke selve tilgangs-URL-oppføringene.

## Tips

* **Bestem tidlig** — Hvis du velger et oppsett med flere URL-er, bør du gjøre det i starten av Chamilo-prosjektet, ettersom det krever at den første URL-en holdes relativt tom for innhold. Å aktivere flere URL-er i etterkant er mer krevende (krever manuelle databaseendringer).
* **Planlegg URL-strukturen** — Bestem URL-ordningen før du oppretter tilgangs-URL-er, ettersom endring av URL-er senere påvirker alle eksisterende lenker og bokmerker
* **DNS-konfigurasjon** — Hver tilgangs-URL må peke til samme Chamilo-server. Konfigurer DNS-oppføringer deretter.
* **Global administrator** — Bruk rollen Global Administrator for å administrere på tvers av alle tilgangs-URL-er. For å delegere administrasjon av bare én gren, registrer administratoren på en ikke-rot-URL — se [Subtree Administrators](#subtree-administrators)