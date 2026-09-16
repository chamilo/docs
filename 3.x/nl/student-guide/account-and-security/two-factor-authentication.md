# Tweefactorauthenticatie

Tweefactorauthenticatie (2FA) voegt een tweede stap toe bij het aanmelden — een 6-cijferige code uit een app op uw telefoon, naast uw wachtwoord — zodat alleen het kennen van uw wachtwoord niet volstaat om toegang tot uw account te krijgen.

Deze functie verschijnt alleen als uw beheerder deze platformbreed heeft ingeschakeld. Als u deze niet ziet op uw accountpagina, is deze niet ingeschakeld voor uw platform.

## 2FA inschakelen

1. Open uw **avatarmenu** en klik op **Mijn profiel**.
2. Klik op **Wachtwoord wijzigen**.
3. Voer uw **huidige wachtwoord** in, vink het vakje **Tweefactorauthenticatie (2FA) inschakelen** aan en klik op **Instellingen bijwerken**.
4. De pagina wordt opnieuw geladen met een QR-code en de melding "Scan de QR-code om 2FA in te schakelen." Scan deze met een authenticator-app op uw telefoon (elke TOTP-compatibele app werkt, zoals Google Authenticator, Microsoft Authenticator of Authy).

![Het formulier Wachtwoord wijzigen na het verzenden, met de te scannen QR-code en het veld voor de 2FA-code](/.gitbook/assets/student-2fa-qr-code.png)

5. Voer opnieuw uw huidige wachtwoord in, samen met de 6-cijferige code die uw app nu toont, in het veld **2FA-code**, en klik nogmaals op **Instellingen bijwerken**. U ziet een bevestiging dat 2FA is geactiveerd.

Alleen het aanvinken van het vakje toont de QR-code niet — u ziet deze pas na die eerste verzending, en uw wachtwoordvelden worden telkens gewist wanneer de pagina opnieuw wordt geladen, dus u moet bij deze tweede verzending ook opnieuw uw huidige wachtwoord invoeren.

## Aanmelden met 2FA ingeschakeld

Nadat u zoals gebruikelijk uw gebruikersnaam en wachtwoord hebt ingevoerd, toont het aanmeldformulier een extra veld **2FA-code** op hetzelfde scherm — voer de huidige 6-cijferige code uit uw authenticator-app in en verzend (de knop luidt op dat moment **Code verzenden** in plaats van **Aanmelden**).

## Als u de toegang tot uw authenticator-app verliest

Chamilo genereert geen back-up- of herstelcodes voor 2FA. Als u het apparaat met uw authenticator-app verliest, kunt u zelf geen geldige code meer produceren — neem contact op met uw platformbeheerder, die 2FA op uw account kan uitschakelen zodat u opnieuw kunt aanmelden en, als u dat wilt, het op een nieuw apparaat kunt instellen.

## 2FA uitschakelen

Ga terug naar **Wachtwoord wijzigen**, vink **Tweefactorauthenticatie (2FA) inschakelen** uit, voer uw huidige wachtwoord in en verzend.

## Tips

* **Stel het in voordat u het nodig hebt** — 2FA inschakelen duurt een minuut en beschermt uw account aanzienlijk.
* **Houd uw authenticator-app toegankelijk** — als u deze verliest, bent u afhankelijk van uw beheerder om weer binnen te komen, omdat er geen back-upcodes zijn.
* **Deel uw 2FA-codes niet** — iedereen met uw wachtwoord en een geldige code kan zich aanmelden als u.