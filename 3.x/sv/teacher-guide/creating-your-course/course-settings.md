# Kursinställningar

Kursinställningar låter dig styra hur din kurs beter sig — vem som kan komma åt den, hur den visas och vilka funktioner som är aktiverade.

För att komma åt kursinställningarna går du in i din kurs och klickar på ikonen **Inställningar** <img src="/.gitbook/assets/icons/mdi-cog.svg" alt="Inställningar" data-size="line"> bredvid knappen **Växla till studentvy**.

## Allmänna inställningar

### Kursinformation

* **Kurstitel** — Visningsnamnet för din kurs
* **Kursspråk** — Det primära språket för kursgränssnittet
* **Kurskategori** — Den kategori under vilken kursen visas i katalogen
* **Kursbild** — Ladda upp en miniatyrbild som representerar din kurs i kurslistor (storleken anpassas beroende på sammanhang)

Kurskoden (den korta unika identifieraren) anges när kursen skapas och kan inte redigeras från den här sidan.

Som standard ser alla användare som går in i din kurs hela Chamilo-gränssnittet på kursens språk. Detta är en immersiv funktion. Administratörer kan ändra detta beteende, men du kan också ändra det med ett av de första alternativen: **Visa kursen på användarens språk** (satt till Nej som standard) om du anser att det gör det för svårt för dina användare.

Avdelning och avdelningens URL är föråldrade fält. De behålls endast av kompatibilitetsskäl.

Om det är aktiverat kan du byta stil inne i din kurs med alternativet **Stilmallar**, med hjälp av befintliga stilmallar på din portal. Det här alternativet är ofta inaktiverat av administratörer, för en mer integrerad global design.

### Diskkvot

Varje kurs har en lagringsgräns (diskkvot) för uppladdade filer. Kvoten sätts av plattformsadministratören. Du kan se din aktuella gräns i kursinställningarna och den aktuella användningen i verktyget **Dokument**.

> Om du håller på att få slut på utrymme, kontakta din plattformsadministratör för att begära en höjning av kvoten, eller ta bort oanvända filer från verktyget Dokument.

### Kurssynlighet

![Kursens synlighetsinställningar som visar alternativen offentlig, öppen, registrerad och stängd](/.gitbook/assets/course-settings-visibility.png)

Styr vem som kan komma åt din kurs:

| Inställning | Beskrivning |
|---------|-------------|
| **Offentlig** | Vem som helst, inklusive anonyma besökare, kan komma åt kursen |
| **Öppen för plattformen** | Alla registrerade användare på plattformen kan komma åt kursen |
| **Privat — åtkomst beviljas av privilegierade användare** | Endast användare som uttryckligen är inskrivna i kursen kan komma åt den |
| **Stängd** | Kursen är låst; ingen kan komma åt den utom läraren |

#### Inskrivningsinställningar

Beroende på din plattformskonfiguration kan du kunna styra:

* **Tillåt självinskrivning** — Om deltagare kan anmäla sig själva via kurskatalogen
* **Tillåt självavregistrering** — Om deltagare kan lämna kursen på egen hand
* **Inskrivningslösenord** — Kräv ett lösenord för självinskrivning (användbart för att begränsa åtkomst till en specifik grupp) men säkerhetsnivån är låg eftersom samma kursåtkomstlösenord delas mellan alla användare.

Dessa inställningar täcker endast självinskrivning. För den fullständiga bilden — inklusive att själv skriva in en befintlig användare, eller bjuda in någon som ännu inte har ett plattformskonto — se [Skriva in användare](../assessing-learners/subscribing-users.md).

### Dokumentinställningar

Välj om systemmapparna i verktyget **Dokument** ska visas eller döljas (dolda som standard; du behöver dem vanligtvis inte och att visa dem kan orsaka problem med dolt innehåll och deltagare).

### Inställningar för e-postaviseringar

Konfigurera hur kursaktivitet utlöser aviseringar:

* **E-postaviseringar för nytt innehåll** — Meddela inskrivna användare när du lägger till nya dokument, meddelanden eller annat innehåll

### Chattinställningar

Styr hur verktyget **Chatt** ska visas.

### Inställningar för lärstig

* **Aktivera kursteman** — Tillåt att lärstigar ändrar utseende (rekommenderas inte för en integrerad användarupplevelse)
* **Returlänk för lärstig** — Bestäm var användare hamnar när de klickar på ikonen **Hem** i en lärstig: listan över lärstigar, kursens startsida, *Mina kurser*, *Mina sessioner* eller portalens startsida

### Inställningar för tematiskt framsteg

Konfigurera hur meddelanden om tematiskt framsteg ska visas på kursens startsida.

### Foruminställningar

Styr beteendet i forumverktyget för den här kursen.

### Inlämningsinställningar

* **Standardinställning för synlighet för nyligen publicerade filer** — Bestäm om nya dokument som deltagare laddar upp i verktyget **Inlämningar** ska delas med alla andra deltagare (Nej som standard)
* **Tillåt deltagare att ta bort sina egna publikationer** — Tillåt deltagare att ta bort de inlämningar de redan har laddat upp (om de vill ladda upp en rättelse).

### Inställningar för autostart

En kurs kan ställas in så att den har ett autostartbeteende, vilket förkortar vägen för deltagarna till de viktiga delarna av din kurs. Om funktionen är aktiverad skickas deltagarna som går in i din kurs direkt till det valda verktyget och ser inte kurssidan som ett mellansteg. Du kan till och med välja specifika lärstigar eller övningar som ska startas när man kommer till kursen. I det fallet måste du välja alternativet här, gå sedan till listan över lärstigar eller övningar och klicka på raketikonen <img src="/.gitbook/assets/icons/mdi-rocket-launch.svg" alt="Autostart" data-size="line"> på det valda objektet.

### Inställningar för AI-hjälpare

Det här avsnittet visas bara om din administratör har aktiverat AI-verktyg på plattformen. Det gör att du kan förfina urvalet av AI-hjälptjänster som är tillgängliga via olika verktyg i din Chamilo-plattform. Inaktivera dem om du inte vill använda dem, men det vore troligen en dålig idé eftersom de är mycket kraftfulla.

Dessa funktioner förklaras i avsnittet **AI-verktyg** i den här guiden.

### Externa verktyg (LTI)

Om funktionen är aktiverad på din plattform gör Learning Tools Integration det möjligt att integrera externa, kompatibla aktiviteter i den här kursen, som enskilda ikoner på kurssidan. Att behandla LTI ligger utanför den här guidens räckvidd, men det är ett kraftfullt integration system för lärare.

### Övrigt

Ytterligare avsnitt eller alternativ kan visas på den här sidan beroende på alternativ och versioner av Chamilo.