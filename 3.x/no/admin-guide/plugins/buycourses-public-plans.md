# Offentlige og kampanjeplaner i BuyCourses

**BuyCourses**-pluginen kan vise en offentlig gratisplan sammen med kampanjekort som leder til eksterne tilbud. Dette er atskilt fra pluginens betalte kjøpsflyt for kurs og økter og fra konfigurasjonen av betaling for gjentakende tjenester.

## Konfigurer offentlige planer

1. Åpne administrasjonsområdet for BuyCourses og redigeringsverktøyet for kort for offentlige planer.
2. Under planen **Gratis** velger du om **Vis gratis** er aktivert.
3. Skriv inn gratisplanens oversatte tittel, beskrivelse og funksjonsliste ved hjelp av språkfanene.
4. Legg til kampanjekort etter behov. Konfigurer hvert korts aktiveringsstatus, posisjon, mål-URL, valgfri bilde-URL samt oversatt tittel, beskrivelse, funksjoner og knappetekst.
5. Lagre, og bruk deretter den tilgjengelige forhåndsvisnings-/kataloglenken for å kontrollere den offentlige presentasjonen på hvert konfigurert språk.

Redigeringsverktøyet lagrer det oversatte innholdet for flere språk. Et kampanjekort er en **lenke til et eksternt tilbud**, ikke bevis på en fullført betaling eller et automatisk abonnement i Chamilo.

## Grenser for kursoppretting

Gratisplanen bruker plattformens standardgrenser for kursoppretting. BuyCourses skiller mellom standard kurskvoter og betalte kurskvoter. Der en endelig grense er konfigurert, kan grensesnittet for kursoppretting vise bruk og fremdrift; ubegrensede planer trenger ikke en prosentindikator.

Test grensene med en konto som bare har standardkvoten, og med en som har den aktuelle betalte kvoten. Et offentlig kampanjekort skal aldri omgå serverbaserte tillatelser for kursoppretting.

## Betalingsatferd

Kort for offentlige planer erstatter ikke BTCPay, Stripe, PayPal eller pluginens etablerte flyter for kurskjøp og gjentakende tjenester. Fortsett å administrere og teste betalingsløsninger i den eksisterende BuyCourses-konfigurasjonen.

Se [BuyCourses: Betalinger og gjentakende tjenester](buycourses.md). Implementering: [PR #9369](https://github.com/chamilo/chamilo-lms/pull/9369).