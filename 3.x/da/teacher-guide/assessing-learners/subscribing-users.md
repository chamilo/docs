# Tilmelding af brugere

Før du kan vurdere en kursist, skal vedkommende være tilmeldt dit kursus. Chamilo tilbyder fire måder at få nogen ind på, afhængigt af hvem der foretager tilmeldingen, og om personen allerede har en platformkonto.

| Metode | Hvem udfører det | Kræver en eksisterende konto? |
|--------|-------------|------------------------------|
| [Administratorindskrivning](#administrator-enrollment) | Platformadministrator | Ja |
| [Selvtilmelding via kursuskataloget](#self-enrollment-via-the-course-catalog) | Kursisten selv | Ja |
| [Manuel tilmelding via værktøjet Brugere](#manual-enrollment-via-the-users-tool) | Underviser (eller kursusadministrator) | Ja |
| [Invitation af brugere via e-mail](#inviting-users-by-email) | Underviser (eller kursusadministrator) | **Nej** |

## Administratorindskrivning

En platformadministrator kan tilmelde enhver eksisterende bruger til ethvert kursus direkte fra administrationspanelet — nyttigt ved masseonboarding (f.eks. import af en klasseliste) eller når en underviser ikke har rettigheder til selv at administrere tilmelding. Se afsnittet [Kurser](../../admin-guide/courses/README.md) i administrationsvejledningen.

## Selvtilmelding via kursuskataloget

Hvis kursets [synlighed](../creating-your-course/course-settings.md#course-visibility) tillader det, kan kursister med en platformkonto tilmelde sig selv ved at finde dit kursus under **Udforsk flere kurser** og klikke for at deltage — uden at du behøver at gøre noget. Om dette er tilgængeligt, og om det kræver en adgangskode, styres af **Tilmeldingsindstillinger** under [Kursusindstillinger](../creating-your-course/course-settings.md#enrollment-settings).

## Manuel tilmelding via værktøjet Brugere

For at tilmelde nogen, der allerede har en platformkonto, men ikke har tilmeldt sig selv, skal du åbne kursets værktøj **Brugere** og klikke på ikonet **Tilføj brugere** <img src="/.gitbook/assets/icons/mdi-account-plus.svg" alt="Tilføj brugere" data-size="line">.

1. Søg efter personen efter navn, brugernavn, e-mail eller officielt kode
2. Klik på **Registrer** i deres række, eller vælg flere med afkrydsningsfelterne, og brug menuen **Handling** til at registrere dem alle på én gang

![Søgeresultater på skærmen Tilmeld brugere til kursus, der viser en matchende kursist og en knap Registrer](/.gitbook/assets/course-users-subscribe-search.png)

Kun brugere, der ikke allerede er tilmeldt kurset, vises i resultaterne.

> Dette ikon er som standard tilgængeligt for undervisere. En platformadministrator kan begrænse det til kun administratorer via indstillingen **Allow User Course Subscription By Course Administrator** (`allow_user_course_subscription_by_course_admin`) — hvis du ikke kan se ikonet **Tilføj brugere**, skal du spørge din administrator.

## Invitation af brugere via e-mail

De tre metoder ovenfor forudsætter alle, at personen allerede har en platformkonto. **Kursusinvitationer** dækker det tilfælde, hvor de ikke har: du sender en invitation til en e-mailadresse, og Chamilo sender personen et engangslink. Når linket åbnes, kan de oprette en konto, og så snart de er færdige med at registrere sig, tilmeldes de automatisk dit kursus — uden et separat tilmeldingstrin.

### Adgang til værktøjet

Åbn kursets værktøj **Brugere**, og klik derefter på ikonet **Inviter via e-mail** <img src="/.gitbook/assets/icons/mdi-email-outline.svg" alt="Inviter via e-mail" data-size="line"> i værktøjslinjen, ved siden af **Tilføj brugere**:

![Værktøjslinjen i værktøjet Brugere, der viser ikonet Tilføj brugere og ikonet Inviter via e-mail](/.gitbook/assets/course-users-invite-icon.png)

Dette åbner siden **Kursusinvitationer**.

### Hvem kan sende invitationer

* Platformadministratorer, altid.
* I et almindeligt kursus (ikke åbnet i en session): undervisere og andre brugere med redigeringsrettigheder på kurset.
* I en session: sessionens generelle coach eller en sessionsadministrator — ikke den bredere gruppe af kursuscoaches, da det at sende en invitation her tilmelder til *hele sessionen*, ikke kun dette ene kursus.

### Afsendelse af en invitation

1. Indtast modtagerens e-mailadresse i formularen **Inviter via e-mail**
2. Klik på **Send invitation**

![Siden Kursusinvitationer: formularen inviter-via-e-mail og en tabel over sendte invitationer med deres status](/.gitbook/assets/course-invitations-list.png)

Hver invitation, du har sendt til dette kursus, vises under formularen med dens status:

| Status | Betydning |
|--------|---------|
| **Afventer** | Sendt, endnu ikke brugt. Stadig inden for gyldighedsperioden. |
| **Accepteret** | Modtageren har registreret sig og er blevet tilmeldt. |
| **Tilbagekaldt** | Du annullerede den, før den blev brugt. |

For en stadig afventende invitation tilbyder kolonnen **Handlinger**:

* **Kopiér** <img src="/.gitbook/assets/icons/mdi-content-copy.svg" alt="Kopiér" data-size="line"> — kopierer invitationslinket, hvis du hellere vil dele det selv (chat, personligt) i stedet for at stole på e-mailen.
* **Tilbagekald** <img src="/.gitbook/assets/icons/mdi-account-cancel.svg" alt="Tilbagekald" data-size="line"> — annullerer invitationen med det samme; linket holder op med at virke. En allerede accepteret invitation kan ikke tilbagekaldes.

> **Den inviterede e-mailadresse må ikke allerede have en konto på denne platform.** Hvis den har, mislykkes afsendelsen af invitationen med en meddelelse, der beder dig om at tilmelde den eksisterende bruger direkte i stedet — via [Manuel tilmelding via værktøjet Brugere](#manual-enrollment-via-the-users-tool) ovenfor.

### Invitationer i en session

Hvis du åbner værktøjet Brugere fra et kursus, der kører inde i en session, viser siden en påmindelse om, at invitationen gælder for hele sessionen, ikke kun dette kursus:

> *Dette kursus er åbnet i en session. Afsendelse af en invitation her vil tilmelde modtageren til hele sessionen, ikke kun dette kursus.*

Dette afspejler, hvordan tilmelding fungerer andre steder i Chamilo: du tilmelder nogen til en session som helhed eller til et selvstændigt kursus, men aldrig til "dette ene kursus inde i denne session" som en separat handling.

### Hvad den inviterede person ser

E-mailen indeholder et link til registreringssiden. Når det åbnes:

* Forudfylder og låser e-mailfeltet til den adresse, du inviterede — de kan ikke registrere sig under en anden adresse med det link.
* Lader dem fuldføre registreringen **selv hvis selvregistrering i øjeblikket er deaktiveret på hele platformen** — forudsat at din administrator har slået indstillingen **Tillad registrering via kursusinvitationslinks** til (se nedenfor). Uden den hjælper et invitationslink kun, når selvregistrering ellers er åben.
* Tilmelder dem straks til dit kursus (eller sessionen), når de indsender formularen, og logger dem ind.

Linket er til engangsbrug og udløber efter 7 dage. Hvis det udløber, eller dens målinvitation tilbagekaldes, opfører åbning af det sig, som om linket aldrig har eksisteret.

> Den platformsomfattende indstilling **Tillad registrering via kursusinvitationslinks** (`registration.allow_invitation_registration`) styrer, om dit invitationslink kan åbne registrering, når generel selvregistrering er slået fra. Spørg din administrator, hvis invitationer ikke ser ud til at virke på en ellers lukket platform.

## Tips

* **Tilpas metoden til situationen** — administrator- eller selvtilmelding for personer, der allerede bruger platformen, manuel tilmelding for en kendt eksisterende bruger, invitationer til eksterne gæster, bedømmere eller alle, der endnu ikke har en konto.
* **Tilbagekald invitationer, du ikke længere har brug for** — en gammel afventende invitation er stadig et gyldigt, ubrugt link; tilbagekald den, hvis den tilsigtede modtager ikke længere har brug for adgang, eller hvis du er usikker på, om den nåede frem til dem.
* **Tjek med din administrator, hvis en metode ser ud til at være utilgængelig** — flere af disse forløb (manuel tilmelding, invitationer, selvtilmelding) kan være begrænset eller deaktiveret på hele platformen.