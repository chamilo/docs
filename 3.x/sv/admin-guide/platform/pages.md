# Sidor

Sidor är Chamilos inbyggda, CMS-liknande verktyg för de innehållsblock som utgör portalens publika ytor — startsidan, sidfoten, navigeringsmenyer och liknande placeringar — utan att du behöver redigera en mallfil.

## Åtkomst till Sidor

Från administrationspanelen klickar du på **Plattform > Sidor**.

## Hur Sidor fungerar

Varje sida har:

* **Titel** och rich-text-**innehåll**
* En **slug**, som genereras automatiskt från titeln
* **Aktiverad** — om sidan för närvarande är synlig
* **Position** — dra-och-släpp-ordning inom sin kategori
* **Språkversion (locale)** — innehållet är per språk: samma placering kan innehålla en sida per språk, och webbplatsen faller tillbaka till plattformens standardspråk om det inte finns någon sida för besökarens språk
* En **kategori** — detta avgör *var* sidan renderas (till exempel `index`, `home`, `footer_public` eller `menu_links`); Chamilo skapar de kategorier som behövs automatiskt

I en installation med flera URL:er (flera portaler) är sidor dessutom avgränsade per åtkomst-URL, så att varje portal hanterar sitt eget innehåll.

## Introduktionssidan för registrering

**Plattform > Inställning av registreringssidan** är en genväg in i samma Sidor-system för en specifik placering: den inledande text som visas ovanför det publika registreringsformuläret. Den är begränsad till portaladministratörer. När du klickar på den antingen:

* Öppnas den befintliga introduktionssidan för redigering, om en redan finns för din åtkomst-URL och ditt språk, eller
* Skapas placeringen direkt och du tas vidare till att skapa innehållet

Det du sparar här renderas som en infobox direkt ovanför registreringsformuläret — en naturlig plats för instruktioner, villkor som är specifika för din organisation eller sammanhang som blivande användare bör läsa innan de registrerar sig. Lämna den inaktiverad (eller skapa den aldrig) för att visa det vanliga registreringsformuläret utan introtext.