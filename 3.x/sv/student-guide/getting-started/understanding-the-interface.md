# Att förstå gränssnittet

Chamilo 3.0 har ett rent, modernt gränssnitt som är utformat för att hålla navigeringen enkel. Den här sidan förklarar varje del av gränssnittet ur en deltagares perspektiv.

## Det övre fältet

Det övre fältet syns alltid högst upp på varje sida. Det innehåller:

* **Plattformens logotyp** — Klicka på den för att när som helst återgå till startsidan.
* **Inkorgsikon** <img src="../../.gitbook/assets/icons/mdi-inbox.svg" alt="Inkorg" data-size="line"> — Visar dina meddelanden. Ett rött märke anger olästa meddelanden. Klicka för att öppna din [Inkorg](../inbox.md).
* **Ikon för supportärende** <img src="../../.gitbook/assets/icons/mdi-ticket-account.svg" alt="Support" data-size="line"> — Om administratören har aktiverat det ger detta åtkomst till systemet för supportärenden. Inte varje plattform aktiverar det, så du kanske bara ser inkorgsikonen och din avatar.
* **Din avatar** — En cirkulär bild i det övre högra hörnet. Klicka på den för att öppna en rullgardinsmeny:

![Din avatarmeny, med länkar till Min profil, Mina certifikat, Mina färdigheter och Logga ut](../../.gitbook/assets/student-avatar-menu.png)

* **Min profil** — Redigera din personliga information, byt lösenord och (om det är aktiverat) konfigurera tvåfaktorsautentisering
* **Mina certifikat** — Varje certifikat du har erhållit, i alla dina kurser
* **Mina färdigheter** — Kompetensmärken du har tilldelats
* **Logga ut**

## Sidofältet

Sidofältet till vänster är din huvudsakliga navigering. Det kan fällas ihop för att ge mer utrymme åt innehållsområdet. Klicka på växelpilen vid dess högra kant för att expandera eller fälla ihop det. Chamilo kommer ihåg din inställning.

Sidofältet innehåller följande länkar (vissa kan vara dolda beroende på plattformens konfiguration):

| Menyobjekt | Ikon | Beskrivning |
|-----------|------|-------------|
| **Hem** | <img src="../../.gitbook/assets/icons/mdi-home.svg" alt="Hem" data-size="line"> | Återgår till den huvudsakliga översikten |
| **Mina kurser** | <img src="../../.gitbook/assets/icons/mdi-book-open-page-variant.svg" alt="Kurser" data-size="line"> | Listar alla kurser du är registrerad på |
| **Mina sessioner** | <img src="../../.gitbook/assets/icons/mdi-google-classroom.svg" alt="Sessioner" data-size="line"> | Listar dina utbildningssessioner (pågående, tidigare, kommande) |
| **Utforska fler kurser** | <img src="../../.gitbook/assets/icons/mdi-bookmark-multiple.svg" alt="Katalog" data-size="line"> | Bläddra i kurskatalogen för att hitta och självregistrera dig på nya kurser |
| **Agenda** | <img src="../../.gitbook/assets/icons/mdi-calendar-text.svg" alt="Agenda" data-size="line"> | Din personliga kalender och kurskalender |
| **Rapportering** | <img src="../../.gitbook/assets/icons/mdi-chart-box.svg" alt="Rapportering" data-size="line"> | Expanderar till **Framsteg** — din egen översikt [Mina framsteg](../my-progress.md) |
| **Socialt nätverk** | <img src="../../.gitbook/assets/icons/mdi-sitemap-outline.svg" alt="Socialt nätverk" data-size="line"> | Expanderar till [Socialt nätverk](../social-network.md) och relaterade länkar, om det är aktiverat |
| **Videokonferens** | <img src="../../.gitbook/assets/icons/mdi-video.svg" alt="Video" data-size="line"> | Åtkomst till livesessioner med video (om det är konfigurerat) |

**Rapportering** och **Socialt nätverk** är inte vanliga länkar — när du klickar på dem expanderas en liten lista med underobjekt direkt i sidofältet:

![Sidofältet med Rapportering och Socialt nätverk expanderade, som visar deras underobjekt](../../.gitbook/assets/student-sidebar-expanded.png)

* Under **Rapportering**: endast **Framsteg**, som tar dig till [Mina framsteg](../my-progress.md).
* Under **Socialt nätverk**: **Hem** (den sociala väggen), **Meddelanden** (en genväg till din [Inkorg](../inbox.md)), **Mina vänner**, **Sociala grupper** — och, något oväntat grupperade här också, **Mina filer** (din personliga fillagring) och **Personuppgifter** (en export av de personuppgifter som plattformen har om dig). Dessa två sista är inte riktigt ”sociala” funktioner; de ligger bara i den här delen av sidofältet.

Om ditt konto har ytterligare roller (till exempel om du också undervisar i en kurs) kan du se extra objekt i sidofältet — som **Administration** — som ett konto som endast är deltagare aldrig ser.

Längst ned i sidofältet finns ett alternativ **Logga ut** för att snabbt logga ut när du är klar. Det här alternativet finns också i rullgardinsmenyn vid din avatarikon i det övre högra hörnet.
Om plattformen hanteras via externa autentiseringsmetoder kanske dessa utloggningsalternativ inte är tillgängliga.

## Det huvudsakliga innehållsområdet

Det centrala området på skärmen visar innehållet på den aktuella sidan. Högst upp ser du ofta en **sökväg** som visar din aktuella plats i plattformen (till exempel: Hem > Rockmusik > Dokument). Använd sökvägen för att navigera tillbaka till en överordnad sida.

## Kursens startsida

När du går in i en kurs ser du **kursens startsida**:

* **Kurstitel** — Visas tydligt högst upp
* **Kursintroduktion** — En valfri beskrivning i rich text skriven av din lärare
* **Verktygsrutnät** — Ett rutnät av ikoner som representerar de verktyg som finns tillgängliga i den här kursen (Dokument, Övningar, Forum, osv.)

Endast de verktyg som din lärare har gjort synliga visas i det här rutnätet — se [Hitta rätt i en kurs](../courses/course-tools-overview.md) för vad varje verktyg gör. Kontroller för att redigera själva kursen (förhandsgranska som student, visa/dölja verktyg, ändra ordning) visas bara för lärare och kursadministratörer — du ser dem inte i en kurs där du är inskriven som lärande.

## Ikonfärger

Detta är fortfarande experimentellt och inte helt färdigt i Chamilo 3.0, men vi försöker använda följande regler för alla knappar och åtgärdsikoner i gränssnittet:

* **Grön** för skapandeåtgärder. Detta inkluderar att lägga till, skapa, importera, spara och kopiera innehåll.
* **Blå** för visningsåtgärder. Detta inkluderar att exportera, visa, förhandsgranska i listor eller i detaljvyer, söka och ladda ner.
* **Orange** för redigeringsåtgärder. Detta inkluderar att redigera, flytta, konfigurera, aktivera/inaktivera, dölja och visa.
* **Röd** för raderings-/borttagningsåtgärder. Detta inkluderar att radera, ta bort, avregistrera.
* **Grå** för avbrytandeåtgärder. Att bara lämna saker i oförändrat tillstånd.

## Responsiv design

Chamilo 3.0 anpassar sig till olika skärmstorlekar. På en mobil enhet eller i ett smalt webbläsarfönster:

* Sidofältet är dolt som standard och kan öppnas genom att trycka på menyikonen
* Kurskort visas i en enda kolumn i stället för i ett rutnät
* Tabeller blir horisontellt rullbara

Det innebär att du kan komma åt dina kurser från en telefon, surfplatta eller dator, även om gränssnittet kan se något annorlunda ut beroende på enheten.