# Prenumerera användare

Innan du kan bedöma en lärande måste hen vara prenumererad på din kurs. Chamilo erbjuder fyra sätt att få in någon, beroende på vem som gör prenumerationen och om personen redan har ett plattformskonto.

| Metod | Vem gör det | Kräver ett befintligt konto? |
|--------|-------------|------------------------------|
| [Administratörsinskrivning](#administrator-enrollment) | Plattformsadministratör | Ja |
| [Självinskrivning via kurskatalogen](#self-enrollment-via-the-course-catalog) | Den lärande själv | Ja |
| [Manuell inskrivning via verktyget Användare](#manual-enrollment-via-the-users-tool) | Lärare (eller kursadministratör) | Ja |
| [Bjuda in användare via e-post](#inviting-users-by-email) | Lärare (eller kursadministratör) | **Nej** |

## Administratörsinskrivning

En plattformsadministratör kan prenumerera vilken befintlig användare som helst till vilken kurs som helst direkt från administrationspanelen — användbart för massonboarding (t.ex. import av en klasslista) eller när en lärare inte har rättigheter att hantera inskrivning själv. Se avsnittet [Kurser](../../admin-guide/courses/README.md) i administrationsguiden.

## Självinskrivning via kurskatalogen

Om kursens [synlighet](../creating-your-course/course-settings.md#course-visibility) tillåter det kan lärande med ett plattformskonto prenumerera sig själva genom att hitta din kurs i **Utforska fler kurser** och klicka för att gå med — ingen åtgärd krävs från dig. Om detta är tillgängligt, och om det kräver ett lösenord, styrs av **Inskrivningsinställningar** i [Kursinställningar](../creating-your-course/course-settings.md#enrollment-settings).

## Manuell inskrivning via verktyget Användare

För att prenumerera någon som redan har ett plattformskonto men inte har gått med själv, öppna kursens verktyg **Användare** och klicka på ikonen **Lägg till användare** <img src="../../.gitbook/assets/icons/mdi-account-plus.svg" alt="Lägg till användare" data-size="line">.

1. Sök efter personen efter namn, användarnamn, e-post eller officiell kod
2. Klicka på **Registrera** på hens rad, eller markera flera med kryssrutorna och använd menyn **Åtgärd** för att registrera dem alla på en gång

![Sökresultat på skärmen Prenumerera användare till kurs, som visar en matchande lärande och en Registrera-knapp](../../.gitbook/assets/course-users-subscribe-search.png)

Endast användare som inte redan är prenumererade på kursen visas i resultaten.

> Den här ikonen är tillgänglig för lärare som standard. En plattformsadministratör kan begränsa den till endast administratörer via inställningen **Allow User Course Subscription By Course Administrator** (`allow_user_course_subscription_by_course_admin`) — om du inte ser ikonen **Lägg till användare**, fråga din administratör.

## Bjuda in användare via e-post

De tre metoderna ovan förutsätter alla att personen redan har ett plattformskonto. **Kursinbjudningar** täcker fallet när hen inte har det: du skickar en inbjudan till en e-postadress, och Chamilo skickar den personen en engångslänk. När länken öppnas kan hen skapa ett konto, och så fort registreringen är klar prenumereras hen automatiskt på din kurs — inget separat inskrivningssteg behövs.

### Åtkomst till verktyget

Öppna kursens verktyg **Användare** och klicka sedan på ikonen **Bjud in via e-post** <img src="../../.gitbook/assets/icons/mdi-email-outline.svg" alt="Bjud in via e-post" data-size="line"> i verktygsfältet, bredvid **Lägg till användare**:

![Verktygsfältet för verktyget Användare, som visar ikonen Lägg till användare och ikonen Bjud in via e-post](../../.gitbook/assets/course-users-invite-icon.png)

Detta öppnar sidan **Kursinbjudningar**.

### Vem kan skicka inbjudningar

* Plattformsadministratörer, alltid.
* I en vanlig kurs (inte öppnad i en session): lärare och andra användare med redigeringsrättigheter på kursen.
* I en session: sessionens allmänna coach, eller en sessionsadministratör — inte den bredare gruppen kurscoacher, eftersom att skicka en inbjudan här prenumererar på *hela sessionen*, inte bara den här enskilda kursen.

### Skicka en inbjudan

1. Ange mottagarens e-postadress i formuläret **Bjud in via e-post**
2. Klicka på **Skicka inbjudan**

![Sidan Kursinbjudningar: formuläret bjud-in-via-e-post och en tabell över skickade inbjudningar med deras status](../../.gitbook/assets/course-invitations-list.png)

Varje inbjudan du har skickat för den här kursen visas under formuläret, med sin status:

| Status | Betydelse |
|--------|---------|
| **Väntande** | Skickad, ännu inte använd. Fortfarande inom giltighetsperioden. |
| **Accepterad** | Mottagaren registrerade sig och blev prenumererad. |
| **Återkallad** | Du avbröt den innan den användes. |

För en fortfarande väntande inbjudan erbjuder kolumnen **Åtgärder**:

* **Kopiera** <img src="../../.gitbook/assets/icons/mdi-content-copy.svg" alt="Kopiera" data-size="line"> — kopierar inbjudningslänken, om du hellre vill dela den själv (chatt, personligen) i stället för att förlita dig på e-postmeddelandet.
* **Återkalla** <img src="../../.gitbook/assets/icons/mdi-account-cancel.svg" alt="Återkalla" data-size="line"> — avbryter inbjudan omedelbart; länken slutar fungera. En redan accepterad inbjudan kan inte återkallas.

> **Den inbjudna e-postadressen får inte redan ha ett konto på den här plattformen.** Om den har det misslyckas sändningen av inbjudan med ett meddelande som ber dig att i stället skriva in den befintliga användaren direkt — via [Manuell inskrivning via verktyget Användare](#manual-enrollment-via-the-users-tool) ovan.

### Inbjudningar i en session

Om du öppnar verktyget Användare från en kurs som körs inuti en session visar sidan en påminnelse om att inbjudan gäller hela sessionen, inte bara den här kursen:

> *Den här kursen är öppen i en session. Att skicka en inbjudan här prenumererar mottagaren på hela sessionen, inte bara den här kursen.*

Detta speglar hur inskrivning fungerar på andra ställen i Chamilo: du prenumererar någon på en session som helhet, eller på en fristående kurs, men aldrig på ”den här enda kursen inuti den här sessionen” som en separat åtgärd.

### Vad den inbjudna personen ser

E-postmeddelandet innehåller en länk till registreringssidan. När den öppnas:

* Förifyller och låser e-postfältet till den adress du bjöd in — de kan inte registrera sig under en annan adress med den länken.
* Låter dem slutföra registreringen **även om självregistrering för närvarande är inaktiverad på hela plattformen** — förutsatt att din administratör har slagit på inställningen **Tillåt registrering via kursinbjudningslänkar** (se nedan). Utan den hjälper en inbjudningslänk bara när självregistrering annars är öppen.
* Prenumererar dem omedelbart på din kurs (eller sessionen) när de skickar in formuläret, och loggar in dem.

Länken är för engångsbruk och upphör efter 7 dagar. Om den upphör eller dess mål-inbjudan återkallas beter sig öppnandet som om länken aldrig funnits.

> Den plattformsomfattande inställningen **Tillåt registrering via kursinbjudningslänkar** (`registration.allow_invitation_registration`) styr om din inbjudningslänk kan öppna registrering när allmän självregistrering är avstängd. Fråga din administratör om inbjudningar inte verkar fungera på en i övrigt stängd plattform.

## Tips

* **Anpassa metoden efter situationen** — administratör eller självinskrivning för personer som redan använder plattformen, manuell inskrivning för en känd befintlig användare, inbjudningar för externa gäster, granskare eller vem som helst som ännu inte har ett konto.
* **Återkalla inbjudningar du inte längre behöver** — en gammal väntande inbjudan är fortfarande en giltig, oanvänd länk; återkalla den om den avsedda mottagaren inte längre behöver åtkomst, eller om du är osäker på om den nådde dem.
* **Kontrollera med din administratör om en metod verkar otillgänglig** — flera av dessa flöden (manuell inskrivning, inbjudningar, självinskrivning) kan begränsas eller inaktiveras på hela plattformen.