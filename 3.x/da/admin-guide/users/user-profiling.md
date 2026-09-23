# Brugerprofilering

Chamilo giver dig mulighed for at definere tilpassede profilfelter (ekstra felter) til at indsamle yderligere oplysninger om brugere ud over det standardmæssige navn, e-mail og rolle.

## Ekstra profilfelter

![Listen over ekstra profilfelter, der viser tilpassede felter med navn, type og synlighedsindstillinger](../../.gitbook/assets/admin-extra-fields-list.png)

Ekstra felter lader dig gemme metadata, der er specifikke for din organisation, såsom:

* Medarbejder-ID
* Afdeling
* Stilling
* Lokation/kontor
* Telefonnummer
* Tilpassede identifikatorer

## Oprettelse af ekstra felter

1. Fra administrationspanelet skal du navigere til **Extra fields** eller **Profile fields**
2. Klik på **Add**
3. Konfigurer feltet:
   * **Name** — Feltets titel, som vises for brugerne
   * **Description** — Valgfri beskrivelse
   * **Helper text** — Vises under feltet i enhver formular, der inkluderer det
   * **Field type** — Tekst, rullemenu, dato, afkrydsningsfelt osv.
   * **Field label** — Feltets interne navn, til integration med plugins 
   * **Possible values** — Hvis feltet er en vælger mellem disse værdier 
   * **Default value** — En valgfri standardværdi
   * **Visible to self** — Om feltet er synligt på brugerprofilen for brugeren selv
   * **Visible to others** — Om feltet er synligt for andre brugere på platformen
   * **Can change** — Om brugeren selv kan ændre sit eget felt (eller om kun administratorerne kan)
   * **Filter** — Hvis dette er et felt af vælgertypen, om det skal inkluderes som filter på administrative sider (f.eks. til at tilmelde brugere til kurser eller sessioner)
   * **Order** — Hvis du vil styre visningsrækkefølgen af felterne, skal du give hvert felt en numerisk rækkefølge
   * **Remove on anonymization** — Vigtigt for privatlivsregler og -lovgivning: Hvis brugeren anonymiseres, men ikke slettes, skal dette felt så betragtes som potentiel indehaver af personhenførbare data? 
4. Gem

## Felttyper

Motoren til ekstra felter understøtter et bredt sæt af inputtyper. Almindelige typer omfatter:

| Type | Beskrivelse |
|------|-------------|
| **Text** | Et enkeltlinjet tekstfelt |
| **Textarea** | Et flerlinjet tekstfelt |
| **Radio** | En radiogruppe med ét valg |
| **Dropdown / Dropdown multiple** | En liste over foruddefinerede indstillinger (enkelt- eller flervalg) |
| **Double select** | To afhængige rullemenuer (f.eks. land → by) |
| **Checkbox** | En ja/nej-kontakt |
| **Date / Date and time** | Dato- eller dato+tid-vælger |
| **Integer** | Et numerisk input |
| **Tag** | Flere frie tag-værdier |
| **File** | Felt til filupload |
| **Video URL** | En URL, der peger på en video |
| **Mobile phone number** | Et formateret telefonnummerfelt |
| **Timezone** | En tidszonevælger |
| **Social profile** | Et link til en profil på et socialt netværk |
| **Divider** | En visuel adskiller inde i formularen (ingen værdi) |

Det nøjagtige sæt af brugbare typer afhænger af Chamilo-versionen; rullemenuen for felttyper på administrationssiden **Extra fields** er den autoritative kilde.

## Brug af ekstra felter

Ekstra felter vises:

* I formularerne til oprettelse (hvis synlige for brugeren selv) og redigering af brugere
* På brugerprofilsider (hvis synlige for brugeren selv)
* Ved brugerimport (du kan medtage værdier for ekstra felter i CSV-importer)
* I eksporter og rapporter (filtrer eller gruppér efter værdier i ekstra felter)

## Tips

* **Planlæg før oprettelse** — Definér, hvilke oplysninger du har brug for, før du opretter felter, da det kan være problematisk at ændre felttyper, efter at der er indtastet data
* **Brug rullemenuer for konsistens** — Når et felt har et kendt sæt mulige værdier, skal du bruge en rullemenu i stedet for fri tekst for at sikre datakonsistens
* **Brug til rapportering** — Ekstra felter er nyttige til at filtrere rapporter (f.eks. "vis alle brugere i Afdeling X, der har gennemført Uddannelse Y")