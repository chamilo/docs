# Förstå gränssnittet

Chamilo 3.0 har ett rent, modernt gränssnitt utformat för att hålla navigeringen enkel. Den här sidan förklarar varje del av gränssnittet i detalj.

## Det övre fältet

![Det övre fältet med annoterade element inklusive logotyp, inkorg, supportärende och användaravatar](/.gitbook/assets/top-bar-annotated.png)

Det övre fältet är alltid synligt högst upp på varje sida. Det innehåller:

* **Plattformens logotyp** — Klicka på den för att när som helst återgå till startsidan.
* **Inkorgsikon** <img src="/.gitbook/assets/icons/mdi-inbox.svg" alt="Inbox" data-size="line"> — Visar dina meddelanden. Ett rött märke indikerar olästa meddelanden. Klicka för att öppna inkorgen.
* **Ikon för supportärende** <img src="/.gitbook/assets/icons/mdi-ticket-account.svg" alt="Support" data-size="line"> — Om den är aktiverad av din administratör ger den dig åtkomst till systemet för supportärenden.
* **Din avatar** — En cirkulär bild i det övre högra hörnet. Klicka på den för att öppna en rullgardinsmeny med länkar till din profil, kontoinställningar och utloggning.

## Sidofältet

Sidofältet till vänster är din huvudsakliga navigering. Det kan fällas ihop för att ge mer utrymme åt innehållsområdet. Klicka på växelpilen vid dess högra kant för att expandera eller fälla ihop det. Chamilo kommer ihåg din inställning.

Sidofältet innehåller följande länkar (vissa kan vara dolda beroende på plattformens konfiguration):

![Sidofältets navigeringspanel i expanderat läge som visar alla menyalternativ](/.gitbook/assets/sidebar-expanded.png)

| Menyobjekt | Ikon | Beskrivning |
|-----------|------|-------------|
| **Hem** | <img src="/.gitbook/assets/icons/mdi-home.svg" alt="Home" data-size="line"> | Återgår till huvudöversikten |
| **Mina kurser** | <img src="/.gitbook/assets/icons/mdi-book-open-page-variant.svg" alt="Courses" data-size="line"> | Listar alla kurser du är registrerad på |
| **Mina sessioner** | <img src="/.gitbook/assets/icons/mdi-google-classroom.svg" alt="Sessions" data-size="line"> | Listar dina utbildningssessioner (pågående, tidigare, kommande) |
| **Utforska fler kurser** | <img src="/.gitbook/assets/icons/mdi-bookmark-multiple.svg" alt="Catalogue" data-size="line"> | Bläddra i kurskatalogen för att hitta nya kurser |
| **Agenda** | <img src="/.gitbook/assets/icons/mdi-calendar-text.svg" alt="Agenda" data-size="line"> | Din personliga kalender och kurskalender |
| **Rapportering** | <img src="/.gitbook/assets/icons/mdi-chart-box.svg" alt="Reporting" data-size="line"> | Åtkomst till deltagaruppföljning och kursrapporter |
| **Socialt nätverk** | <img src="/.gitbook/assets/icons/mdi-sitemap-outline.svg" alt="Social network" data-size="line"> | Anslut till andra användare, skicka meddelanden, gå med i grupper |
| **Videokonferens** | <img src="/.gitbook/assets/icons/mdi-video.svg" alt="Video" data-size="line"> | Åtkomst till livesessioner med video (om det är konfigurerat) |
| **Administration** | <img src="/.gitbook/assets/icons/mdi-cogs.svg" alt="Admin" data-size="line"> | Plattformsadministration (synlig endast för administratörer) |

Längst ned i sidofältet hittar du ett alternativ för **Logga ut** för att snabbt logga ut när du är klar. Det här alternativet finns också i rullgardinsmenyn från din avatarikon i det övre högra hörnet.
Om plattformen hanteras via externa autentiseringsmetoder kanske dessa utloggningsalternativ inte är tillgängliga.

## Det huvudsakliga innehållsområdet

Det centrala området på skärmen visar innehållet på den aktuella sidan. Högst upp ser du ofta en **brödsmulestig** som visar din aktuella plats i plattformen (till exempel: Hem > Rockmusik > Dokument). Använd brödsmulorna för att navigera tillbaka till en överordnad sida.

## Kursens startsida

När du går in i en kurs ser du **kursens startsida**. Detta behandlas i detalj i avsnittet [Skapa din kurs](../creating-your-course/), men här är en snabb översikt:

* **Kurstitel** — Visas tydligt högst upp
* **Kursintroduktion** — En valfri beskrivning i rich text som du kan redigera
* **Verktygsrutnät** — Ett rutnät av ikoner som representerar kursverktygen (Dokument, Övningar, Forum osv.)

Som lärare ser du ytterligare kontroller:

* **Elevvy** <img src="/.gitbook/assets/icons/mdi-eye.svg" alt="Student view" data-size="line"> — Växla detta för att se kursen som en elev skulle se den
* **Redigera introduktion** <img src="/.gitbook/assets/icons/mdi-pencil.svg" alt="Edit" data-size="line"> — Redigera kursens introduktionstext
* **Visa alla / Dölj alla** — Ändra snabbt synligheten för alla verktyg för elever
* **Sortera** — Aktivera dra och släpp för att ändra ordningen på verktygen på startsidan

## Ikonfärger

Detta är fortfarande experimentellt och inte helt komplett i Chamilo 3.0, men vi försöker använda följande regler för alla knappar och åtgärdsikoner i gränssnittet:

* **Grön** för skapandeåtgärder. Detta inkluderar att lägga till, skapa, importera, bedöma, spara och kopiera innehåll.
* **Blå** för visningsåtgärder. Detta inkluderar att exportera, visa, förhandsgranska i listor eller i detaljvyer, söka och ladda ner.
* **Orange** för redigeringsåtgärder. Detta inkluderar att redigera, flytta, konfigurera, aktivera/inaktivera, dölja och visa.
* **Röd** för raderings-/borttagningsåtgärder. Detta inkluderar att radera, ta bort, avregistrera.
* **Grå** för avbrytandeåtgärder. Att bara lämna saker i status quo.

## Responsiv design

Chamilo 3.0 anpassar sig till olika skärmstorlekar. På en mobil enhet eller i ett smalt webbläsarfönster:

* Sidofältet är dolt som standard och kan öppnas genom att trycka på menyikonen
* Kurskort visas i en enda kolumn i stället för i ett rutnät
* Tabeller blir horisontellt rullbara

Detta innebär att du och dina deltagare kan komma åt plattformen från en telefon, surfplatta eller dator, men du kan uppleva gränssnittet något annorlunda.