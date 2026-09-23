# Passordstyrkesjekker

Passordstyrkesjekkeren skanner aktive brukeres lagrede passordhasher mot en kort liste over vanlige passord (`123456`, `password`, `qwerty123` og lignende). Den viser eller overfører aldri selve passordene — bare om en brukers gjeldende passord samsvarer med én av de kjente svake kandidatene.

## Åpne passordstyrkesjekkeren

Fra administrasjonspanelet klikker du **Sikkerhet > Passordstyrkesjekker**.

## Kjøre en skanning

![Siden for passordstyrkesjekker, med et felt for bruker-ID-er som skal skannes og en knapp for å kjøre skanningen](../../.gitbook/assets/admin-security-password-strength.png)

* La **Bruker-ID-er som skal skannes** stå tomt for å skanne alle aktive brukere, eller skriv inn en kommaseparert liste over bruker-ID-er for å sjekke et utvalg
* Klikk **Kjør passordstyrkeskanning**

Skanningen kjører asynkront i bakgrunnen slik at den ikke fryser siden, og viser fremdrift i sanntid (verifiserte brukere så langt, av totalt antall, og hvor mange svake passord som er funnet). Fordi hvert kandidatpassord må sjekkes mot hashen til hver valgte bruker, kan skanning av alle brukere på en stor plattform ta en stund — kandidatlisten holdes bevisst kort for å begrense denne kostnaden.

## Handle ut fra resultater

![De ferdige skanneresultatene, som lister en flagget bruker med kolonnene Navn, Brukernavn og E-post, og handlinger per rad for å be om passordendring eller tvinge passordtilbakestilling](../../.gitbook/assets/admin-security-password-strength-results.png)

Når skanningen er ferdig, listes flaggede brukere med to tilgjengelige handlinger, enten per bruker eller som massehandling for alle valgte brukere:

* **Be om passordendring** (konvoluttikon) — Sender brukeren en e-post som ber dem om å endre passordet
* **Tving passordtilbakestilling** (tilbakestillingsikon) — Ugyldiggjør umiddelbart brukerens gjeldende passord og sender dem et nytt på e-post

Begge handlingene verifiserer de valgte brukerne mot listen over svake passord på nytt før de utføres, slik at en utdatert eller manipulert forespørsel ikke kan brukes til å tilbakestille en konto som ikke lenger har et svakt passord.

## Anbefalt bruk

* Kjør denne skanningen periodisk, særlig etter masseimport av brukere (importerte kontoer kommer noen ganger med enkle standardpassord)
* Kombiner den med innstillingene **Minimale syntakskrav for passord** og **Intervall for passordrotasjon** i [Sikkerhetsinnstillinger](../platform-settings/security-settings.md) for å hindre at svake passord settes i utgangspunktet, i stedet for bare å fange dem opp i etterkant