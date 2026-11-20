# Openbare en promotionele plannen van BuyCourses

De plugin **BuyCourses** kan een openbaar gratis plan weergeven naast promotiekaarten die naar externe aanbiedingen leiden. Dit staat los van de betaalde aankoopstroom voor cursussen en sessies van de plugin en van de configuratie van terugkerende dienstbetalingen.

## Openbare plannen configureren

1. Open het beheergebied van BuyCourses en de bijbehorende editor voor openbare plankaarten.
2. Kies onder het plan **Gratis** of **Gratis weergeven** is ingeschakeld.
3. Voer de vertaalde titel, beschrijving en functielijst van het gratis plan in via de taaltabbladen.
4. Voeg zo nodig promotiekaarten toe. Configureer voor elke kaart de ingeschakelde status, positie, doel-URL, optionele afbeeldings-URL en de vertaalde titel, beschrijving, functies en knoptekst.
5. Sla op en gebruik vervolgens de beschikbare voorbeeld-/cataloguskoppeling om de openbare presentatie in elke geconfigureerde taal te controleren.

De editor slaat de vertaalde inhoud voor meerdere talen op. Een promotiekaart is een **koppeling naar een extern aanbod**, geen bewijs van een voltooide betaling of een automatisch abonnement in Chamilo.

## Limieten voor het aanmaken van cursussen

Het gratis plan gebruikt de standaardlimieten van het platform voor het aanmaken van cursussen. BuyCourses onderscheidt standaardcursustoelagen van betaalde cursustoelagen. Waar een eindige limiet is geconfigureerd, kan de interface voor het aanmaken van cursussen gebruik en voortgang tonen; onbeperkte plannen hebben geen percentage-indicator nodig.

Test de limieten met een account dat alleen de standaardtoelage heeft en met een account dat de toepasselijke betaalde toelage heeft. Een openbare promotiekaart mag nooit de server-side machtigingen voor het aanmaken van cursussen omzeilen.

## Betalingsgedrag

Kaarten voor openbare plannen vervangen BTCPay, Stripe, PayPal of de bestaande stromen van de plugin voor cursusaankopen en terugkerende diensten niet. Blijf betalingsgateways beheren en testen in de bestaande BuyCourses-configuratie.

Zie [BuyCourses: betalingen en terugkerende diensten](buycourses.md). Implementatie: [PR #9369](https://github.com/chamilo/chamilo-lms/pull/9369).