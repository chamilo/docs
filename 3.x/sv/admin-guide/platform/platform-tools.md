# Plattformsverktyg

Den här sidan täcker de återstående, mindre objekten i blocket Plattformshantering.

## Extrafält

**Plattform > Extrafält** är en typväljare, inte en fältlista i sig — den visar varje objekttyp som stöder anpassade fält, och ett klick tar dig till den typens egen fältredigerare. Tillgängliga typer inkluderar: användare, kurs, session, fråga, lärstig (samt lärstigsobjekt/vy), färdighet, uppgift (arbete), karriär, användarcertifikat, enkät, villkor, forumkategori, foruminlägg, övning, övningsspårning, kursmeddelande, meddelande, dokument, närvarokalender, ordlista, kommentar till arbetsrättelse, kalenderhändelse och portfolio (plus schemalagda meddelanden, om den funktionen är aktiverad).

För det vanligaste fallet — anpassade användarprofilfält — se [Användarprofilering](../users/user-profiling.md), som täcker samma underliggande funktion från användarhanteringssidan.

## E-postmallar

**Plattform > E-postmallar** låter dig åsidosätta formuleringen i specifika system-e-postmeddelanden (registreringsbekräftelse, prenumerationsaviseringar och liknande) utan att röra serverfiler. Varje mall har en titel, en **typ** som matchar det specifika inbyggda e-postmeddelande den åsidosätter, själva mallkroppen (ren text/Twig, inte en rik editor) och en flagga "ange som standard" — endast en mall per typ kan vara den aktiva standarden. Mallar är avgränsade per åtkomst-URL; det finns inget separat fält per språk, så språhanteringen för dessa e-postmeddelanden är vad den omgivande koden redan gör.

Mallar renderas genom en **sandlådad** Twig-miljö av säkerhetsskäl: endast en liten uppsättning taggar och filter är tillåtna, och den enda tillgängliga datan är mottagarens `User`-objekt, refererat som `user.getEmail()`, `user.getFirstname()` och liknande getters (`getId`, `getUsername`, `getLastname`, `getStatus`, `getOfficialCode`, `getPhone`). Allt utanför den tillåtna listan ger inget högljutt fel — det renderas tyst tomt, vilket sedan faller tillbaka till den ursprungliga inbyggda mallen. Håll dina anpassade mallar enkla och testa dem (med en riktig registrering eller aviseringstrigger) efter redigering.

## Kontaktformulärskategorier

**Plattform > Kontaktformulärskategorier** hanterar rullgardinsmenyn som visas på portalens publika formulär **Kontakta oss**. Varje kategori är bara en titel och en destinations-e-postadress — vilken kategori en besökare väljer avgör vilken inkorg meddelandet dirigeras till. Använd detta för att dirigera olika ämnen (support, försäljning, antagning) till olika team utan att bygga separata formulär.

## Genvägar till inställningskategorier

Några blockobjekt är helt enkelt direkta länkar till specifika kategorier i [Plattformsinställningar](../platform-settings/README.md), snarare än separata verktyg:

* **Plugins** och **Systemmallar** öppnar konfigurationsinställningar förfiltrerade till dessa kategorier
* **Regioner** gör detsamma, för plattformens regionsinställningar

## Ibland synliga objekt

En handfull objekt visas bara när den relevanta inställningen eller pluginen är aktiv, så du kanske inte ser dem i din installation:

* **Villkor** — visas när **Tillåt villkor** är aktiverat, för att hantera texten som användare måste acceptera
* **Aviseringar** — visas när plattformens funktion för aviseringshändelser är aktiverad
* **CMS**, **Ordbok**, **Motivering** — var och en kopplad till att dess egen valfria plugin är installerad och aktiverad