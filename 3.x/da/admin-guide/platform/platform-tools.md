# Platformværktøjer

Denne side dækker de resterende, mindre elementer i blokken Platformadministration.

## Ekstra felter

**Platform > Extra fields** er en typevælger, ikke selve en feltliste — den viser alle objekttyper, der understøtter brugerdefinerede felter, og et klik på en type fører til den pågældende types egen felteditor. Tilgængelige typer omfatter: user, course, session, question, learning path (og learning path item/view), skill, assignment (work), career, user certificate, survey, terms and conditions, forum category, forum post, exercise, exercise tracking, course announcement, message, document, attendance calendar, glossary, work correction comment, calendar event og portfolio (plus scheduled announcements, hvis den funktion er aktiveret).

For det mest almindeligt anvendte tilfælde — brugerdefinerede brugerprofilfelter — se [Brugerprofilering](../users/user-profiling.md), som dækker den samme underliggende funktion fra brugersiden.

## Mailskabeloner

**Platform > Mail templates** lader dig tilsidesætte ordlyden af bestemte system-e-mails (registreringsbekræftelse, tilmeldingsmeddelelser og lignende) uden at røre serverfiler. Hver skabelon har en titel, en **type**, der matcher den specifikke indbyggede e-mail, den tilsidesætter, selve skabelonens brødtekst (almindelig tekst/Twig, ikke en rich editor) og et flag "set as default" — kun én skabelon pr. type kan være den aktive standard. Skabeloner er afgrænset pr. adgangs-URL; der er intet separat felt pr. sprog, så sprogbehandlingen for disse e-mails er det, den omgivende kode allerede gør.

Skabeloner renderes gennem et **sandboxed** Twig-miljø af sikkerhedshensyn: kun et lille sæt tags og filtre er tilladt, og de eneste tilgængelige data er modtagerens `User`-objekt, refereret som `user.getEmail()`, `user.getFirstname()` og tilsvarende getters (`getId`, `getUsername`, `getLastname`, `getStatus`, `getOfficialCode`, `getPhone`). Alt uden for den tilladte liste giver ikke en højlydt fejl — det renderes stille som tomt, hvilket derefter falder tilbage til den oprindelige indbyggede skabelon. Hold dine brugerdefinerede skabeloner enkle, og test dem (ved hjælp af en rigtig registrering eller notifikationsudløser) efter redigering.

## Kontaktformular-kategorier

**Platform > Contact form categories** administrerer rullemenuen, der vises på portalens offentlige **Contact us**-formular. Hver kategori er blot en titel og en destinations-e-mailadresse — den kategori, en besøgende vælger, afgør, hvilken indbakke beskeden sendes til. Brug dette til at dirigere forskellige emner (support, salg, optagelse) til forskellige teams uden at bygge separate formularer.

## Genveje til indstillingskategorier

Nogle få blokelementer er simpelthen direkte links ind i specifikke kategorier af [Platformindstillinger](../platform-settings/README.md), snarere end separate værktøjer:

* **Plugins** og **System templates** åbner konfigurationsindstillinger forudfiltreret til disse kategorier
* **Regions** gør det samme for platformens regionsindstillinger

## Lejlighedsvist synlige elementer

En håndfuld elementer vises kun, når den relevante indstilling eller det relevante plugin er aktivt, så du måske ikke ser dem på din installation:

* **Terms and Conditions** — vises, når **Allow terms and conditions** er aktiveret, til administration af den tekst, brugerne skal acceptere
* **Notifications** — vises, når platformens notifikationshændelsesfunktion er aktiveret
* **CMS**, **Dictionary**, **Justification** — hver knyttet til sit eget valgfrie plugin, der er installeret og aktiveret