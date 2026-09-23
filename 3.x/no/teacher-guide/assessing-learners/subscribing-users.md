# Påmelding av brukere

Før du kan vurdere en kursdeltaker, må vedkommende være påmeldt kurset ditt. Chamilo tilbyr fire måter å få noen inn på, avhengig av hvem som gjør påmeldingen og om personen allerede har en plattformkonto.

| Metode | Hvem gjør det | Trenger eksisterende konto? |
|--------|-------------|------------------------------|
| [Administratorpåmelding](#administrator-enrollment) | Plattformadministrator | Ja |
| [Selvpåmelding via kurskatalogen](#self-enrollment-via-the-course-catalog) | Kursdeltakeren selv | Ja |
| [Manuell påmelding via verktøyet Brukere](#manual-enrollment-via-the-users-tool) | Lærer (eller kursadministrator) | Ja |
| [Invitasjon av brukere via e-post](#inviting-users-by-email) | Lærer (eller kursadministrator) | **Nei** |

## Administratorpåmelding

En plattformadministrator kan melde på hvilken som helst eksisterende bruker til hvilket som helst kurs direkte fra administrasjonspanelet — nyttig ved masseinnmelding (f.eks. import av en klasseliste) eller når en lærer ikke har rettigheter til å administrere påmelding selv. Se avsnittet [Kurs](../../admin-guide/courses/README.md) i administrasjonsveiledningen.

## Selvpåmelding via kurskatalogen

Hvis kursets [synlighet](../creating-your-course/course-settings.md#course-visibility) tillater det, kan kursdeltakere med en plattformkonto melde seg på selv ved å finne kurset ditt under **Utforsk flere kurs** og klikke for å bli med — uten at du trenger å gjøre noe. Om dette er tilgjengelig, og om det krever et passord, styres av **Påmeldingsinnstillinger** i [Kursinnstillinger](../creating-your-course/course-settings.md#enrollment-settings).

## Manuell påmelding via verktøyet Brukere

For å melde på noen som allerede har en plattformkonto, men som ikke har blitt med på egen hånd, åpner du kursets **Brukere**-verktøy og klikker på ikonet **Legg til brukere** <img src="../../.gitbook/assets/icons/mdi-account-plus.svg" alt="Legg til brukere" data-size="line">.

1. Søk etter personen etter navn, brukernavn, e-post eller offisiell kode
2. Klikk **Registrer** på raden deres, eller velg flere med avmerkingsboksene og bruk **Handling**-menyen for å registrere dem alle samtidig

![Søkeresultater på skjermbildet Meld brukere på kurs, som viser en treffende kursdeltaker og en Registrer-knapp](../../.gitbook/assets/course-users-subscribe-search.png)

Bare brukere som ikke allerede er påmeldt kurset vises i resultatene.

> Dette ikonet er tilgjengelig for lærere som standard. En plattformadministrator kan begrense det til kun administratorer via innstillingen **Tillat kursadministrator å melde brukere på kurs** (`allow_user_course_subscription_by_course_admin`) — hvis du ikke ser ikonet **Legg til brukere**, spør administratoren din.

## Invitasjon av brukere via e-post

De tre metodene ovenfor forutsetter alle at personen allerede har en plattformkonto. **Kursinvitasjoner** dekker tilfellet der de ikke har det: du sender en invitasjon til en e-postadresse, og Chamilo sender personen en engangslenke. Når lenken åpnes, kan de opprette en konto, og så snart de er ferdige med registreringen, blir de automatisk påmeldt kurset ditt — uten et eget påmeldingstrinn.

### Tilgang til verktøyet

Åpne kursets **Brukere**-verktøy, og klikk deretter på ikonet **Inviter via e-post** <img src="../../.gitbook/assets/icons/mdi-email-outline.svg" alt="Inviter via e-post" data-size="line"> i verktøylinjen, ved siden av **Legg til brukere**:

![Verktøylinjen i Brukere-verktøyet, som viser ikonet Legg til brukere og ikonet Inviter via e-post](../../.gitbook/assets/course-users-invite-icon.png)

Dette åpner siden **Kursinvitasjoner**.

### Hvem kan sende invitasjoner

* Plattformadministratorer, alltid.
* I et vanlig kurs (ikke åpnet i en sesjon): lærere og andre brukere med redigeringsrettigheter på kurset.
* I en sesjon: sesjonens generelle veileder, eller en sesjonsadministrator — ikke det bredere settet av kursveiledere, siden det å sende en invitasjon her melder på til *hele sesjonen*, ikke bare dette ene kurset.

### Sende en invitasjon

1. Skriv inn mottakerens e-postadresse i skjemaet **Inviter via e-post**
2. Klikk **Send invitasjon**

![Siden Kursinvitasjoner: skjemaet for invitasjon via e-post og en tabell over sendte invitasjoner med status](../../.gitbook/assets/course-invitations-list.png)

Hver invitasjon du har sendt for dette kurset vises under skjemaet, med status:

| Status | Betydning |
|--------|---------|
| **Pending** | Sendt, ennå ikke brukt. Fortsatt innenfor gyldighetsperioden. |
| **Accepted** | Mottakeren registrerte seg og ble påmeldt. |
| **Revoked** | Du avbrøt den før den ble brukt. |

For en invitasjon som fortsatt er ventende, tilbyr kolonnen **Actions**:

* **Copy** <img src="../../.gitbook/assets/icons/mdi-content-copy.svg" alt="Kopier" data-size="line"> — kopierer invitasjonslenken, i tilfelle du heller vil dele den selv (chat, personlig) i stedet for å stole på e-posten.
* **Revoke** <img src="../../.gitbook/assets/icons/mdi-account-cancel.svg" alt="Tilbakekall" data-size="line"> — avbryter invitasjonen umiddelbart; lenken slutter å virke. En allerede akseptert invitasjon kan ikke tilbakekalles.

> **Den inviterte e-postadressen må ikke allerede ha en konto på denne plattformen.** Hvis den har det, mislykkes sendingen av invitasjonen med en melding som ber deg om å melde på den eksisterende brukeren direkte i stedet — via [Manuell påmelding via verktøyet Brukere](#manual-enrollment-via-the-users-tool) ovenfor.

### Invitasjoner i en sesjon

Hvis du åpner verktøyet Brukere fra et kurs som kjører inne i en sesjon, viser siden en påminnelse om at invitasjonen gjelder hele sesjonen, ikke bare dette kurset:

> *Dette kurset er åpnet i en sesjon. Å sende en invitasjon her vil melde mottakeren på hele sesjonen, ikke bare dette kurset.*

Dette speiler hvordan påmelding fungerer andre steder i Chamilo: du melder noen på en sesjon som helhet, eller på et frittstående kurs, men aldri på «dette ene kurset inne i denne sesjonen» som en separat handling.

### Hva den inviterte personen ser

E-posten inneholder en lenke til registreringssiden. Når den åpnes:

* Forhåndsutfyller og låser e-postfeltet til adressen du inviterte — de kan ikke registrere seg under en annen adresse med den lenken.
* Lar dem fullføre registreringen **selv om selvregistrering for øyeblikket er deaktivert på hele plattformen** — forutsatt at administratoren har slått på innstillingen **Tillat registrering via kursinvitasjonslenker** (se nedenfor). Uten den hjelper en invitasjonslenke bare når selvregistrering ellers er åpen.
* Melder dem umiddelbart på kurset ditt (eller sesjonen) når de sender inn skjemaet, og logger dem inn.

Lenken er til engangsbruk og utløper etter 7 dager. Hvis den utløper eller målinvitasjonen er tilbakekalt, oppfører åpning av den seg som om lenken aldri har eksistert.

> Den plattformomfattende innstillingen **Tillat registrering via kursinvitasjonslenker** (`registration.allow_invitation_registration`) styrer om invitasjonslenken din kan åpne registrering når generell selvregistrering er slått av. Spør administratoren din hvis invitasjoner ikke ser ut til å fungere på en ellers lukket plattform.

## Tips

* **Tilpass metoden til situasjonen** — administrator- eller selvpåmelding for personer som allerede bruker plattformen, manuell påmelding for en kjent eksisterende bruker, invitasjoner for eksterne gjester, vurderere eller alle som ennå ikke har en konto.
* **Tilbakekall invitasjoner du ikke lenger trenger** — en gammel ventende invitasjon er fortsatt en gyldig, ubrukt lenke; tilbakekall den hvis den tiltenkte mottakeren ikke lenger trenger tilgang, eller hvis du er usikker på om den nådde dem.
* **Sjekk med administratoren din hvis en metode ser ut til å være utilgjengelig** — flere av disse flytene (manuell påmelding, invitasjoner, selvpåmelding) kan være begrenset eller deaktivert på hele plattformen.