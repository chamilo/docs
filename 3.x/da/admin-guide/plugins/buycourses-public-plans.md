# BuyCourses: Offentlige og kampagneplaner

**BuyCourses**-pluginnet kan vise en offentlig gratisplan sammen med kampagnekort, der fører til eksterne tilbud. Dette er adskilt fra pluginnets betalingsflow for kurser/sessioner og konfigurationen af tilbagevendende tjenestebetalinger.

## Konfigurer offentlige planer

1. Åbn BuyCourses-administrationsområdet og dets korteditor til offentlige planer.
2. Under planen **Gratis** skal du vælge, om **Vis gratis** er aktiveret.
3. Indtast den gratis plans oversatte titel, beskrivelse og funktionsliste ved hjælp af sprogfanerne.
4. Tilføj kampagnekort efter behov. Konfigurer hvert korts aktiverede tilstand, position, destinations-URL, valgfri billed-URL samt oversat titel, beskrivelse, funktioner og knaptekst.
5. Gem, og brug derefter det tilgængelige forhåndsvisnings-/kataloglink til at gennemgå den offentlige præsentation på hvert konfigureret sprog.

Editoren gemmer det oversatte indhold for flere sprog. Et kampagnekort er et **link til et eksternt tilbud**, ikke bevis for en gennemført betaling eller et automatisk abonnement i Chamilo.

## Grænser for kursusoprettelse

Den gratis plan bruger platformens standardgrænser for kursusoprettelse. BuyCourses skelner mellem standardkvoter for kurser og betalte kursuskvoter. Hvor en endelig grænse er konfigureret, kan kursusoprettelsesgrænsefladen vise forbrug og fremskridt; ubegrænsede planer behøver ikke en procentindikator.

Test grænserne med en konto, der kun har standardkvoten, og med en, der har den relevante betalte kvote. Et offentligt kampagnekort må aldrig omgå serverbaserede tilladelser til kursusoprettelse.

## Betalingsadfærd

Kort til offentlige planer erstatter ikke BTCPay, Stripe, PayPal eller pluginnets etablerede flows for kursuskøb og tilbagevendende tjenester. Fortsæt med at administrere og teste betalingsgateways i den eksisterende BuyCourses-konfiguration.

Se [BuyCourses: Betalinger og tilbagevendende tjenester](buycourses.md). Implementering: [PR #9369](https://github.com/chamilo/chamilo-lms/pull/9369).