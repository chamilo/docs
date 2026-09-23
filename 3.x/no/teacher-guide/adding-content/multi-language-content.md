# Flerspråklig innhold

Chamilo lar deg skrive **flere språkversjoner av samme innhold i ett enkelt felt** — en seksjon i kursbeskrivelsen, et dokument, et testspørsmål, en undersøkelse — og sørger for at hver student automatisk bare ser versjonen skrevet på sitt eget språk. Dette er funksjonen **translate_html**, oppkalt etter plattforminnstillingen som styrer den.

Den involverer tre ulike personer, som hver ser en annen side av den:

* **Administratoren din** må slå funksjonen på for hele plattformen før noen kan bruke den.
* **Du (læreren)** skriver de ulike språkversjonene ved hjelp av en knapp i riktekstredigereren.
* **Studenten** drar nytte av den uten noensinne å vite at den finnes — de ser ganske enkelt innholdet på sitt eget språk, uten noen innstilling å finne eller slå av/på.

## Aktivere funksjonen

Dette er en administratoroppgave, ikke en læreroppgave. Under **Administrasjon > Konfigurasjonsinnstillinger > Redigerer** må innstillingen **Støtt flerspråklig HTML-innhold** (`translate_html`) være aktivert. Hvis du ikke ser knappen **Lang ISO** som beskrives nedenfor i verktøylinjen til redigereren, er det nesten sikkert derfor — spør administratoren din. Se [Redigererinnstillinger](../../admin-guide/platform-settings/editor-settings.md) for den fullstendige innstillingsoversikten. Fra v3.0.0 er denne innstillingen aktivert som standard (det var ikke tilfellet før denne versjonen), med mindre du har oppgradert versjonen din fra en tidligere der innstillingen var deaktivert.

Å slå denne innstillingen av igjen sletter eller ødelegger ikke innhold som allerede er skrevet på denne måten — se [Hva studentene ser](#what-learners-see) nedenfor.

## Skrive flerspråklig innhold

Funksjonen er tilgjengelig overalt der du har den fullstendige riktekstredigereren: seksjoner i [kursbeskrivelse](../creating-your-course/course-description.md), [dokumenter](documents.md), test- og undersøkelsesspørsmål, og mer.

1. Skriv (eller lim inn) innholdet på standardspråket ditt, som vanlig.
2. Merk teksten, og klikk deretter på knappen **Lang ISO** i redigererens verktøylinje.

![Verktøylinjen i riktekstredigereren, med knappen «Lang ISO» synlig nær starten](../../.gitbook/assets/teacher-multilang-editor.png)

3. Velg språket du nettopp skrev på fra menyen — listen dekker alle språk plattformen din har aktive. Hvis det du trenger ikke er oppført, bruk **Custom Chamilo ISO code...** nederst og skriv det inn (f.eks. `en_US`, `fr_FR`, `es`).

![Menyen «Lang ISO» åpen, med alle aktive plattformspråk pluss «Add translation to...» og et alternativ for egendefinert kode](../../.gitbook/assets/teacher-multilang-lang-menu.png)

4. Chamilo pakker inn merket tekst med den språktaggen. Skriv (eller lim inn) neste språks versjon rett etter den, merk den, og gjenta med et annet språk.

Fortsett for så mange språk du vil dekke. Alle ligger i samme felt — mens du redigerer, vil du se alle språkversjonene stablet etter hverandre; først når noen faktisk *viser* siden, skjuler Chamilo alt unntatt det ene språket som gjelder for dem (se nedenfor).

### KI-assistert oversettelse

Hvis administratoren din har konfigurert en KI-tekstleverandør, tilbyr den samme **Lang ISO**-menyen også **Add translation to...** øverst. Dette sender det eksisterende innholdet ditt til den konfigurerte KI-modellen og setter inn en ny, automatisk oversatt blokk på språket du velger (eller på alle gjenværende språk samtidig, hvis plattformen din tillater det) — du trenger ikke skrive det selv. Eksisterende språkblokker blir stående urørt, og språk som allerede er til stede utelates fra listen, så gjentatt bruk skaper ikke duplikater.

Som med alt KI-generert innhold, korrekturles resultatet — det er en rask måte å få et solid førsteutkast på et språk du kanskje ikke snakker selv, ikke en erstatning for gjennomgang.

## Hva studentene ser

Hver student ser nøyaktig én språkversjon: Chamilo prøver først deres eget grensesnittsspråk; hvis ingen av blokkene dine matcher det, faller det tilbake til kursets eget språk, deretter til plattformens standardsspråk; hvis ingen av disse heller matcher, vises det språket du tilfeldigvis skrev først, i stedet for å la innholdet stå tomt. Alt dette skjer automatisk — det er ingenting studenten skal konfigurere, og ingenting du skal konfigurere per student heller.

Her er den samme seksjonen i kursbeskrivelsen, slik den ses av tre studenter med ulike grensesnittsspråk — ingenting annet ved kurset er endret mellom disse tre skjermbildene, bare visningsbrukerens eget språk:

![Den samme seksjonen i kursbeskrivelsen slik den ses av en student med engelsk som grensesnittsspråk](../../.gitbook/assets/teacher-multilang-en.png)

![Den samme seksjonen slik den ses av en student med fransk som grensesnittsspråk](../../.gitbook/assets/teacher-multilang-fr.png)

![Den samme seksjonen slik den ses av en student med spansk som grensesnittsspråk](../../.gitbook/assets/teacher-multilang-es.png)

### Under panseret

Hvis du noen gang åpner **Kildekode**-visningen for et flerspråklig felt (`<>`-knappen i redigeringsverktøylinjen), vil du se at hver språkversjon er pakket inn slik:

![Kildekodevisningen, som viser en blokk som åpner med lang="en_US" class="mce-translatehtml"](../../.gitbook/assets/teacher-multilang-source-view.png)

Hver versjon er pakket inn i en `<div class="mce-translatehtml" lang="...">` (eller `<span>`, for en kort innfelt frase i stedet for en hel blokk) — det er denne `lang`-attributten Chamilo matcher mot visningsbrukerens språk for å avgjøre hva som skal vises. Det er verdt å kjenne igjen dette spesifikke klassenavnet hvis du noen gang inspiserer sidens kildekode eller feilsøker innhold som ser feil ut: **`mce-translatehtml`** er merket du skal se etter.

Dette forklarer også hvorfor det å slå av `translate_html` i plattforminnstillingene ikke ødelegger noe som allerede er skrevet: innstillingen styrer bare om **Lang ISO**-*forfatterknappen* vises i redigeringsprogrammet. *Visningsside*-filtreringen beskrevet ovenfor kjører uansett, så tidligere skrevet flerspråklig innhold forblir korrekt filtrert for hver visningsbruker selv på en plattform der en administrator senere har slått av forfatterknappen.

## Titler fungerer ikke på denne måten

En kurs tittel, et dokuments tittel, en tests tittel — dette er rene tekstfelt, ikke rik tekst, så de kan ikke inneholde den `lang`-merkede markupen beskrevet ovenfor. De forblir én enkelt, nøytral verdi uavhengig av hvem som ser på dem, uansett hvor mange språkversjoner du har skrevet inn i innholdet under.

Ett unntak: hvis administratoren din har aktivert **Lagre titler som HTML** (`save_titles_as_html`, også under **Administrasjon > Konfigurasjonsinnstillinger > Redigeringsprogram**) for det spesifikke tittelfeltet du arbeider med, blir det feltet også et ekte HTML-felt, og den samme **Lang ISO**-teknikken beskrevet ovenfor kan brukes på det. Dette er uvanlig og brukes mest for testspørsmål — de fleste titler på plattformen forblir ren tekst.

## Tips

* **Behold kildespråket først** — plasser plattformens vanligste språk først i feltet; det er det mest naturlige fallbacket hvis du glemmer å merke et sjeldnere språk senere.
* **Ikke nest språkblokker** — skriv hver versjon som en separat, sekvensiell blokk; å pakke én inn i en annen støttes ikke, og redigeringsprogrammet pakker aktivt ut nestede merker når du setter inn et nytt.
* **En seksjon som ser tom ut på ett språk** betyr vanligvis at ingen blokk noen gang ble merket for det (eller dens utvidede kurs-/plattformstandard-fallback) — sjekk Kildekode-visningen for språkene som faktisk er til stede.