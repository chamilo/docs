# Sider

Sider er Chamilos indbyggede, CMS-lignende værktøj til de indholdsblokke, der udgør portalens offentligt synlige områder — startsiden, sidefoden, navigationsmenuer og tilsvarende placeringer — uden at du behøver at redigere en skabelonfil.

## Adgang til Sider

Fra administrationspanelet skal du klikke på **Platform > Pages**.

## Sådan fungerer Sider

Hver side har:

* **Title** og rich-text-**content**
* En **slug**, der genereres automatisk ud fra titlen
* **Enabled** — om siden aktuelt er synlig
* **Position** — rækkefølge med træk og slip inden for dens kategori
* **Locale** — indholdet er pr. sprog: den samme placering kan rumme én side pr. sprog, og webstedet falder tilbage til platformens standardsprog, hvis der ikke findes en side til en besøgendes sprog
* En **category** — det er den, der afgør *hvor* siden vises (for eksempel `index`, `home`, `footer_public` eller `menu_links`); Chamilo opretter automatisk de kategorier, den har brug for

På en installation med flere URL'er (flere portaler) er sider desuden afgrænset pr. adgangs-URL, så hver portal administrerer sit eget indhold.

## Introsiden til registrering

**Platform > Setting the registration page** er en genvej ind i det samme Sider-system til én specifik placering: den indledende tekst, der vises over den offentlige tilmeldingsformular. Den er begrænset til portaladministratorer. Når du klikker på den, sker ét af følgende:

* Den eksisterende introside åbnes til redigering, hvis der allerede findes én for din adgangs-URL og dit sprog, eller
* Placeringen oprettes med det samme, og du føres direkte til at oprette indholdet

Det, du gemmer her, vises som en infoboks direkte over registreringsformularen — et naturligt sted til instruktioner, vilkår, der er specifikke for din organisation, eller kontekst, som kommende brugere bør læse, før de tilmelder sig. Lad den være deaktiveret (eller opret den aldrig) for at vise den rene registreringsformular uden introtekst.