# Brukerprofilering

Chamilo lar deg definere egendefinerte profilfelt (ekstrafelt) for å fange opp tilleggsinformasjon om brukere utover standard navn, e-post og rolle.

## Ekstra profilfelt

![Listen over ekstra profilfelt som viser egendefinerte felt med navn, type og synlighetsinnstillinger](/.gitbook/assets/admin-extra-fields-list.png)

Ekstrafelt lar deg lagre metadata som er spesifikke for organisasjonen din, for eksempel:

* Ansatt-ID
* Avdeling
* Stillingsbetegnelse
* Sted/kontor
* Telefonnummer
* Egendefinerte identifikatorer

## Opprette ekstrafelt

1. Fra administrasjonspanelet, naviger til **Ekstrafelt** eller **Profilfelt**
2. Klikk **Legg til**
3. Konfigurer feltet:
   * **Navn** — Feltets tittel som vises for brukerne
   * **Beskrivelse** — Valgfri beskrivelse
   * **Hjelpetekst** — Vises under feltet i alle skjemaer som inkluderer det
   * **Felttype** — Tekst, nedtrekksliste, dato, avkrysningsboks, osv.
   * **Feltetikett** — Feltets interne navn, for integrasjon med plugins 
   * **Mulige verdier** — Hvis feltet er en velger mellom disse verdiene 
   * **Standardverdi** — En valgfri standard
   * **Synlig for seg selv** — Om feltet er synlig på brukerprofilen for brukeren selv
   * **Synlig for andre** — Om feltet er synlig for andre brukere på plattformen
   * **Kan endre** — Om brukeren kan endre sitt eget felt selv (eller om bare administratorer kan)
   * **Filter** — Hvis dette er et felt av velgertype, om det skal inkluderes som filter på administrative sider (f.eks. for å melde brukere på kurs eller økter)
   * **Rekkefølge** — Hvis du vil styre visningsrekkefølgen på feltene, må du gi hvert felt en numerisk rekkefølge
   * **Fjern ved anonymisering** — Viktig for personvernregler og -lover: Hvis brukeren anonymiseres men ikke slettes, skal dette feltet anses som mulig innehaver av personidentifiserbare data? 
4. Lagre

## Felttyper

Motoren for ekstrafelt støtter et bredt sett av inndatatyper. Vanlige inkluderer:

| Type | Beskrivelse |
|------|-------------|
| **Text** | Et tekstfelt på én linje |
| **Textarea** | Et tekstfelt på flere linjer |
| **Radio** | En radiogruppe med ett valg |
| **Dropdown / Dropdown multiple** | En liste med forhåndsdefinerte alternativer (enkelt- eller flervalg) |
| **Double select** | To avhengige nedtrekkslister (f.eks. land → by) |
| **Checkbox** | En ja/nei-bryter |
| **Date / Date and time** | Dato- eller dato+klokkeslett-velger |
| **Integer** | Et numerisk inndatafelt |
| **Tag** | Flere frie taggverdier |
| **File** | Felt for filopplasting |
| **Video URL** | En URL som peker til en video |
| **Mobile phone number** | Et formatert telefonnummerfelt |
| **Timezone** | En tidssonevelger |
| **Social profile** | En lenke til en profil på et sosialt nettverk |
| **Divider** | En visuell skillelinje i skjemaet (ingen verdi) |

Det nøyaktige settet av brukbare typer avhenger av Chamilo-versjonen; nedtrekkslisten for felttype på adminsiden **Ekstrafelt** er den autoritative kilden.

## Bruke ekstrafelt

Ekstrafelt vises:

* I skjemaene for opprettelse (hvis synlig for seg selv) og redigering av brukere
* På brukerprofilsider (hvis synlig for seg selv)
* Ved brukerimport (du kan inkludere verdier for ekstrafelt i CSV-importer)
* I eksporter og rapporter (filtrer eller grupper etter verdier i ekstrafelt)

## Tips

* **Planlegg før du oppretter** — Definer hvilken informasjon du trenger før du oppretter felt, ettersom det kan være problematisk å endre felttyper etter at data er lagt inn
* **Bruk nedtrekkslister for konsistens** — Når et felt har et kjent sett mulige verdier, bruk en nedtrekksliste i stedet for fri tekst for å sikre datakonsistens
* **Bruk til rapportering** — Ekstrafelt er nyttige for å filtrere rapporter (f.eks. «vis alle brukere i avdeling X som har fullført opplæring Y»)