# Plattformverktøy

Denne siden dekker de gjenværende, mindre elementene i blokken Plattformadministrasjon.

## Ekstra felt

**Plattform > Extra fields** er en typevelger, ikke en feltliste i seg selv — den viser alle objekttyper som støtter egendefinerte felt, og et klikk på én tar deg til den typens egen feltredigerer. Tilgjengelige typer inkluderer: user, course, session, question, learning path (og learning path item/view), skill, assignment (work), career, user certificate, survey, terms and conditions, forum category, forum post, exercise, exercise tracking, course announcement, message, document, attendance calendar, glossary, work correction comment, calendar event og portfolio (pluss scheduled announcements, hvis den funksjonen er aktivert).

For det mest brukte tilfellet — egendefinerte brukerprofilfelt — se [Brukerprofilering](../users/user-profiling.md), som dekker den samme underliggende funksjonen fra brukeradministrasjonssiden.

## E-postmaler

**Plattform > Mail templates** lar deg overstyre ordlyden i bestemte system-e-poster (registreringsbekreftelse, abonnementsvarsler og lignende) uten å røre serverfiler. Hver mal har en tittel, en **type** som matcher den spesifikke innebygde e-posten den overstyrer, selve malkroppen (ren tekst/Twig, ikke en rik tekstredigerer), og et flagg for «sett som standard» — bare én mal per type kan være den aktive standarden. Maler er avgrenset per tilgangs-URL; det finnes ikke et eget felt per språk, så språkbehandling for disse e-postene er det den omkringliggende koden allerede gjør.

Maler rendres gjennom et **sandkassebasert** Twig-miljø av sikkerhetshensyn: bare et lite sett med tagger og filtre er tillatt, og de eneste tilgjengelige dataene er mottakerens `User`-objekt, referert som `user.getEmail()`, `user.getFirstname()` og tilsvarende gettere (`getId`, `getUsername`, `getLastname`, `getStatus`, `getOfficialCode`, `getPhone`). Alt utenfor den tillatelseslisten gir ikke en tydelig feil — det rendres stille tomt, som deretter faller tilbake til den opprinnelige innebygde malen. Hold egendefinerte maler enkle og test dem (ved å bruke en ekte registrering eller varselutløser) etter redigering.

## Kategorier for kontaktskjema

**Plattform > Contact form categories** administrerer nedtrekkslisten som vises på portalens offentlige **Kontakt oss**-skjema. Hver kategori er bare en tittel og en destinasjons-e-postadresse — hvilken kategori en besøkende velger, avgjør hvilken innboks meldingen rutes til. Bruk dette til å rute ulike emner (støtte, salg, opptak) til ulike team uten å bygge separate skjemaer.

## Snarveier til innstillingskategorier

Noen blokkelementer er ganske enkelt direkte lenker inn i bestemte kategorier av [Plattforminnstillinger](../platform-settings/README.md), snarere enn egne verktøy:

* **Plugins** og **System templates** åpner konfigurasjonsinnstillinger forhåndsfiltrert til de kategoriene
* **Regions** gjør det samme, for innstillinger for plattformregioner

## Elementer som vises av og til

En håndfull elementer vises bare når den relevante innstillingen eller pluginen er aktiv, så du ser dem kanskje ikke i din installasjon:

* **Terms and Conditions** — vises når **Allow terms and conditions** er aktivert, for å administrere teksten brukere må godta
* **Notifications** — vises når plattformens funksjon for varslingshendelser er aktivert
* **CMS**, **Dictionary**, **Justification** — hver knyttet til at dens egen valgfrie plugin er installert og aktivert