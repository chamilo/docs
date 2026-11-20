# Tofaktorautentisering

Tofaktorautentisering (2FA) legger til et andre trinn ved innlogging — en 6-sifret kode fra en app på telefonen din, i tillegg til passordet — slik at det ikke er nok å kjenne passordet ditt for å få tilgang til kontoen.

Denne funksjonen vises bare hvis administratoren har slått den på for hele plattformen. Hvis du ikke ser den på kontosiden din, er den ikke slått på for plattformen din.

## Aktivere 2FA

1. Åpne **avatarmenyen** og klikk **Min profil**.
2. Klikk **Endre passord**.
3. Skriv inn **gjeldende passord**, merk av for **Aktiver tofaktorautentisering (2FA)**, og klikk **Oppdater innstillinger**.
4. Siden lastes på nytt med en QR-kode og meldingen «Skann QR-koden for å aktivere 2FA.» Skann den med en autentiseringsapp på telefonen (enhver TOTP-kompatibel app fungerer, for eksempel Google Authenticator, Microsoft Authenticator eller Authy).

![Skjemaet Endre passord etter innsending, som viser QR-koden som skal skannes og feltet for 2FA-kode](/.gitbook/assets/student-2fa-qr-code.png)

5. Skriv inn gjeldende passord på nytt, sammen med den 6-sifrede koden appen nå viser, i feltet **2FA-kode**, og klikk **Oppdater innstillinger** én gang til. Du vil se en bekreftelse på at 2FA er aktivert.

Å merke av i boksen alene viser ikke QR-koden — du ser den først etter den første innsendingen, og passordfeltene tømmes hver gang siden lastes på nytt, så du må også skrive inn gjeldende passord på nytt ved denne andre innsendingen.

## Innlogging med 2FA aktivert

Etter at du har skrevet inn brukernavn og passord som vanlig, viser innloggingsskjemaet et ekstra felt **2FA-kode** på samme skjerm — skriv inn den gjeldende 6-sifrede koden fra autentiseringsappen og send inn (knappen viser **Send inn kode** i stedet for **Logg inn** på dette tidspunktet).

## Hvis du mister tilgangen til autentiseringsappen

Chamilo genererer ikke reserve- eller gjenopprettingskoder for 2FA. Hvis du mister enheten med autentiseringsappen, vil du ikke selv kunne produsere en gyldig kode — kontakt plattformadministratoren, som kan deaktivere 2FA på kontoen din slik at du kan logge inn igjen og, hvis du ønsker, sette det opp på en ny enhet.

## Deaktivere 2FA

Gå tilbake til **Endre passord**, fjern merket for **Aktiver tofaktorautentisering (2FA)**, skriv inn gjeldende passord, og send inn.

## Tips

* **Sett det opp før du trenger det** — å aktivere 2FA tar et minutt og beskytter kontoen din på en meningsfull måte.
* **Hold autentiseringsappen tilgjengelig** — å miste den betyr at du er avhengig av administratoren for å komme inn igjen, siden det ikke finnes reservekoder.
* **Ikke del 2FA-kodene dine** — alle som har passordet ditt og en gyldig kode, kan logge inn som deg.