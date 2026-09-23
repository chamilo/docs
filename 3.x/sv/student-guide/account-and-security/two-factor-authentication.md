# Tvåfaktorsautentisering

Tvåfaktorsautentisering (2FA) lägger till ett andra steg vid inloggning — en 6-siffrig kod från en app på din telefon, utöver ditt lösenord — så att det inte räcker att känna till lösenordet för att komma åt ditt konto.

Den här funktionen visas bara om din administratör har aktiverat den för hela plattformen. Om du inte ser den på din kontosida har den inte slagits på för din plattform.

## Aktivera 2FA

1. Öppna din **avatar-meny** och klicka på **Min profil**.
2. Klicka på **Ändra lösenord**.
3. Ange ditt **nuvarande lösenord**, kryssa i rutan **Aktivera tvåfaktorsautentisering (2FA)** och klicka på **Uppdatera inställningar**.
4. Sidan läses om med en QR-kod och meddelandet "Scan the QR code to enable 2FA." Skanna den med en autentiseringsapp på din telefon (vilken TOTP-kompatibel app som helst fungerar, till exempel Google Authenticator, Microsoft Authenticator eller Authy).

![Formuläret Ändra lösenord efter inskickning, som visar QR-koden att skanna och fältet för 2FA-kod](/.gitbook/assets/student-2fa-qr-code.png)

5. Ange ditt nuvarande lösenord igen, tillsammans med den 6-siffriga kod som appen nu visar, i fältet **2FA-kod**, och klicka på **Uppdatera inställningar** en gång till. Du får en bekräftelse på att 2FA har aktiverats.

Att bara kryssa i rutan visar inte QR-koden — du ser den först efter den första inskickningen, och lösenordsfälten rensas varje gång sidan läses om, så du måste ange ditt nuvarande lösenord även vid den andra inskickningen.

## Logga in med 2FA aktiverat

Efter att du har angett användarnamn och lösenord som vanligt visar inloggningsformuläret ett extra fält **2FA-kod** på samma skärm — ange den aktuella 6-siffriga koden från din autentiseringsapp och skicka in (knappen visar **Submit code** i stället för **Sign in** vid det här tillfället).

## Om du förlorar åtkomst till din autentiseringsapp

Chamilo genererar inte reserv- eller återställningskoder för 2FA. Om du förlorar enheten med din autentiseringsapp kan du inte själv skapa en giltig kod — kontakta din plattformsadministratör, som kan inaktivera 2FA på ditt konto så att du kan logga in igen och, om du vill, konfigurera det på en ny enhet.

## Inaktivera 2FA

Gå tillbaka till **Ändra lösenord**, avmarkera **Aktivera tvåfaktorsautentisering (2FA)**, ange ditt nuvarande lösenord och skicka in.

## Tips

* **Konfigurera det innan du behöver det** — att aktivera 2FA tar en minut och skyddar ditt konto på ett meningsfullt sätt.
* **Håll din autentiseringsapp tillgänglig** — om du förlorar den är du beroende av din administratör för att komma in igen, eftersom det inte finns några reservkoder.
* **Dela inte dina 2FA-koder** — vem som helst med ditt lösenord och en giltig kod kan logga in som du.