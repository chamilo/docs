# Åtkomst-URL:er

Åtkomst-URL:er gör det möjligt för en enda Chamilo-installation att betjäna flera separata portaler.

Detta verktyg nås även från administrationsinstrumentpanelens block [Plattform](../platform/README.md), som **Konfigurera flera åtkomst-URL:er**.


## Användningsfall

* **Multi-tenant-driftsättningar** — Host separata utbildningsportaler för olika organisationer på en enda server
* **Avdelningsportaler** — Ge varje avdelning sin egen varumärkesanpassade portal (t.ex. `hr.training.company.com`, `it.training.company.com`)
* **Regionala portaler** — Separata portaler för olika regioner eller språk

## Så fungerar det

Varje åtkomst-URL är en separat ingångspunkt till samma Chamilo-installation:

* Användare kan tilldelas en eller flera åtkomst-URL:er
* Kurser och sessioner tillhör specifika åtkomst-URL:er
* Plattformsinställningar kan anpassas per åtkomst-URL
* Varumärke och teman kan skilja sig per URL
* Användare på en portal kan inte se användare eller kurser på en annan (om de inte uttryckligen delas)

## Konfiguration

### Aktivera Multi-URL

Multi-URL måste aktiveras i Chamilo-konfigurationen (vanligtvis i miljöinställningarna). Detta görs vanligtvis under den initiala installationen.

### Skapa en åtkomst-URL

1. Från administrationspanelen, navigera till **Åtkomst-URL:er**
2. Klicka på **Lägg till URL**
3. Ange URL:en (t.ex. `https://portal2.yoursite.com`) och en beskrivning
4. Välj valfritt en **Överordnad URL** för att nästa denna URL under en annan — se [URL-hierarki](#url-hierarchy) nedan
5. Spara

### Tilldela användare och kurser

* **Användare** — Tilldela användare till specifika åtkomst-URL:er. En användare kan tillhöra flera URL:er.
* **Kurser** — Tilldela kurser till specifika åtkomst-URL:er
* **Sessioner** — Tilldela sessioner till specifika åtkomst-URL:er

### Inställningar per URL

Varje åtkomst-URL kan ha sina egna:

* **Färgtema** — Olika visuell varumärkesprofil
* **Plattformsnamn och logotyp** — Anpassad identitet
* **Åsidosättningar av inställningar** — Vissa plattformsinställningar kan anpassas per URL

## URL-hierarki

Åtkomst-URL:er kan organiseras i ett överordnat/underordnat träd i stället för en platt lista. När en URL skapas eller redigeras kan en obegränsad global administratör (se [Underträdsadministratörer](#subtree-administrators) nedan) välja vilken som helst annan URL som dess **Överordnad URL**:

![Dialogrutan Redigera URL med rullgardinsmenyn Överordnad URL öppen, som listar de andra åtkomst-URL:erna som kan väljas som överordnad](/.gitbook/assets/admin-access-url-parent-select.png)

* Rullgardinsmenyn erbjuder aldrig den URL som redigeras, eller någon av dess egna ättlingar, som möjlig överordnad — detta förhindrar att en cykel skapas. Backend validerar detta på nytt oavsett vad gränssnittet visar.
* Om en URL skapas utan att en överordnad väljs, standardinställs den till **endast-inloggnings-URL:en** om en sådan finns (se [Inställningar per URL](#per-url-settings) ovan), eller annars till den första åtkomst-URL:en — samma standardbeteende som innan den här funktionen fanns.
* Den översta URL:en i ett träd — den utan överordnad — är trädets **rot**. En enda Chamilo-installation kan hosta mer än ett oberoende träd.

Överallt där åtkomst-URL:er listas — Multi-URL-instrumentpanelen och sidan för hantering av åtkomst-URL:er — visas trädet genom indragning, en överordnad omedelbart följd av sina egna barn (syskon sorterade alfabetiskt), i stället för en separat kolumn "Överordnad":

![Lista över åtkomst-URL:er som visar en rot-URL med två underordnade URL:er, varav en har sin egen underordnade URL, indragen för att återspegla hierarkin](/.gitbook/assets/admin-access-url-hierarchy-list.png)

## Underträdsadministratörer

URL-hierarkin avgör också vad en [global administratör](../users/user-roles.md) kan hantera:

* En som är registrerad på **rot**-URL:en i ett träd är **obegränsad**: de hanterar varje åtkomst-URL, exakt som innan den här funktionen fanns.
* En som endast är registrerad på en **icke-rot**-URL är **avgränsad**: sidorna Multi-URL och Åtkomst-URL:er visar endast den URL:en och dess ättlingar, och inloggningsdiagrammet på Multi-URL-instrumentpanelen visar "Inloggningar (dina URL:er)" i stället för "Inloggningar (alla URL:er tillsammans)".

Oavsett avgränsning förblir följande reserverat för en **obegränsad** global administratör — en avgränsad administratör kan inte utföra dem ens för URL:er inom sitt eget underträd:

* Skapa en ny åtkomst-URL
* Redigera en åtkomst-URL:s egen URL, beskrivning eller överordnade
* Aktivera eller inaktivera en åtkomst-URL
* Ta bort en åtkomst-URL (rot-URL:en för hela installationen kan aldrig tas bort, av någon)
* Registrera sig själva i varje åtkomst-URL på en gång

En avgränsad administratör kan fortfarande hantera allt som *tilldelats* URL:erna i sitt underträd — användare, kurser, sessioner, varumärke och inställningar — bara inte själva posterna för åtkomst-URL:er.

## Tips

* **Bestäm tidigt** — Om du väljer en konfiguration med flera URL:er bör du göra det i början av ditt Chamilo-projekt, eftersom den första URL:en måste lämnas relativt tom på innehåll. Att aktivera flera URL:er i efterhand är mer krävande (kräver manuella databasändringar).
* **Planera URL-strukturen** — Bestäm URL-schemat innan du skapar åtkomst-URL:er, eftersom ändringar av URL:er senare påverkar alla befintliga länkar och bokmärken
* **DNS-konfiguration** — Varje åtkomst-URL måste peka mot samma Chamilo-server. Konfigurera DNS-poster därefter.
* **Global administratör** — Använd rollen Global Administrator för att hantera över alla åtkomst-URL:er. För att i stället delegera hanteringen av endast en gren, registrera administratören på en icke-rot-URL — se [Subtree Administrators](#subtree-administrators)