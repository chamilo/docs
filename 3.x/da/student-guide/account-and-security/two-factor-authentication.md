# To-faktor-autentificering

To-faktor-autentificering (2FA) tilføjer et andet trin ved login — en 6-cifret kode fra en app på din telefon, ud over din adgangskode — så det ikke er nok at kende din adgangskode alene for at få adgang til din konto.

Denne funktion vises kun, hvis din administrator har aktiveret den for hele platformen. Hvis du ikke ser den på din kontoside, er den ikke slået til på din platform.

## Aktivering af 2FA

1. Åbn din **avatar-menu**, og klik på **Min profil**.
2. Klik på **Skift adgangskode**.
3. Indtast din **nuværende adgangskode**, marker feltet **Aktivér to-faktor-autentificering (2FA)**, og klik på **Opdater indstillinger**.
4. Siden genindlæses med en QR-kode og beskeden "Scan the QR code to enable 2FA." Scan den med en autentificeringsapp på din telefon (enhver TOTP-kompatibel app virker, f.eks. Google Authenticator, Microsoft Authenticator eller Authy).

![Formularen Skift adgangskode efter indsendelse, der viser QR-koden, der skal scannes, og feltet til 2FA-kode](/.gitbook/assets/student-2fa-qr-code.png)

5. Indtast din nuværende adgangskode igen sammen med den 6-cifrede kode, som din app nu viser, i feltet **2FA-kode**, og klik på **Opdater indstillinger** én gang til. Du vil se en bekræftelse på, at 2FA er blevet aktiveret.

Det er ikke nok at markere feltet alene for at vise QR-koden — du ser den først efter den første indsendelse, og dine adgangskodefelter tømmes hver gang siden genindlæses, så du skal også indtaste din nuværende adgangskode igen ved denne anden indsendelse.

## Login med 2FA aktiveret

Når du har indtastet dit brugernavn og din adgangskode som sædvanligt, viser loginformularen et ekstra felt **2FA-kode** på samme skærm — indtast den aktuelle 6-cifrede kode fra din autentificeringsapp, og send (knappen viser **Submit code** i stedet for **Sign in** på dette tidspunkt).

## Hvis du mister adgangen til din autentificeringsapp

Chamilo genererer ikke backup- eller gendannelseskoder til 2FA. Hvis du mister den enhed, der har din autentificeringsapp, kan du ikke selv frembringe en gyldig kode — kontakt din platformadministrator, som kan deaktivere 2FA på din konto, så du kan logge ind igen og, hvis du ønsker det, konfigurere det på en ny enhed.

## Deaktivering af 2FA

Gå tilbage til **Skift adgangskode**, fjern markeringen ved **Aktivér to-faktor-autentificering (2FA)**, indtast din nuværende adgangskode, og send.

## Tips

* **Konfigurer det, før du har brug for det** — at aktivere 2FA tager et minut og beskytter din konto væsentligt.
* **Hold din autentificeringsapp tilgængelig** — hvis du mister den, er du afhængig af din administrator for at komme ind igen, da der ikke findes backupkoder.
* **Del ikke dine 2FA-koder** — enhver med din adgangskode og en gyldig kode kan logge ind som dig.