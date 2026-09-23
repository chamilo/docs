# Tilbakestilling av passordet ditt

Hvis du har glemt passordet ditt — eller bare vil endre det — her er hvordan, i begge situasjoner: før du er logget inn, og mens du allerede er innlogget.

## Før du er innlogget

På innloggingssiden klikker du **Glemt passordet?**. Hvis denne lenken ikke er der, har administratoren din deaktivert denne funksjonen — kontakt dem direkte for å få tilgang igjen.

![Skjemaet «Jeg har mistet passordet mitt», med ett felt for brukernavn eller e-postadresse](../../.gitbook/assets/student-lost-password.png)

1. Skriv inn **brukernavn eller e-postadresse** i det ene feltet på skjemaet.
2. Hvis en CAPTCHA-utfordring vises, løs den (se [CAPTCHA](captcha.md)).
3. Klikk **Send melding**.

Hva som skjer videre avhenger av hvordan administratoren din har konfigurert denne funksjonen:

* **Du mottar en lenke på e-post.** Klikk på den for å åpne et skjema for tilbakestilling av passord med feltene **Passord** og **Bekreft passord** — velg et nytt passord selv og send inn. Denne lenken er engangsbruk og utløper etter en begrenset tid (én time som standard, selv om administratoren din kan endre dette); hvis den har utløpt, forteller tilbakestillingssiden deg det, og du må be om en ny.
* **Du mottar et nytt passord direkte på e-post.** På noen plattformer, i stedet for å la deg velge ditt eget passord, genererer systemet ett for deg og sender det i e-posten. Logg inn med det, og vurder deretter å endre det til noe du husker (se nedenfor).

Hvis du bruker ekstern autentisering (single sign-on gjennom institusjonen din), håndteres ikke tilbakestilling av passord av Chamilo i det hele tatt — bruk institusjonens egen «glemt passord»-prosess i stedet.

## Mens du er innlogget

Du kan endre passordet ditt når som helst, uten å vente til du glemmer det:

1. Åpne **avatar-menyen** (øverst til høyre) og klikk **Min profil**.
2. Klikk **Endre passord**.
3. Skriv inn gjeldende passord, deretter det nye passordet to ganger, og send inn.

![Skjemaet Endre passord, med felt for gjeldende passord og et nytt passord](../../.gitbook/assets/student-change-password.png)

Dette er den samme siden der du kan aktivere [tofaktorsautentisering](two-factor-authentication.md), hvis plattformen din støtter det — i så fall vil du også se en avmerkingsboks «Aktiver tofaktorsautentisering» her, som ikke vises ovenfor siden den ikke er aktiv på alle plattformer.

## Tips

* **Sjekk søppelpostmappen** hvis en e-post for tilbakestilling ikke kommer innen noen minutter.
* **Handle raskt på tilbakestillingslenker** — de utløper, og plattformer setter ofte den utløpstiden til så lite som én time.
* **Står du fast likevel?** Hvis selvbetjent tilbakestilling ikke er aktivert eller ikke fungerer, kan plattformadministratoren din alltid tilbakestille kontoen din manuelt.