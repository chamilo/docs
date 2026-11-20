# BuyCourses offentliga och kampanjplaner

**BuyCourses**-pluginet kan visa en offentlig gratisplan tillsammans med kampanjkort som leder till externa erbjudanden. Detta är skilt från pluginets flöde för köp av betalda kurser/sessioner och från konfigurationen av betalningar för återkommande tjänster.

## Konfigurera offentliga planer

1. Öppna BuyCourses administrationsområde och dess redigerare för kort för offentliga planer.
2. Under planen **Gratis** väljer du om **Visa gratis** är aktiverat.
3. Ange gratisplanens översatta titel, beskrivning och funktionslista med hjälp av språkflikarna.
4. Lägg till kampanjkort efter behov. Konfigurera varje korts aktiveringsstatus, position, mål-URL, valfri bild-URL samt översatt titel, beskrivning, funktioner och knapptext.
5. Spara och använd sedan den tillgängliga förhandsgransknings-/kataloglänken för att granska den offentliga presentationen på varje konfigurerat språk.

Redigeraren sparar det översatta innehållet för flera språk. Ett kampanjkort är en **länk till ett externt erbjudande**, inte ett bevis på en genomförd betalning eller en automatisk prenumeration i Chamilo.

## Gränser för kurskapande

Gratisplanen använder plattformens standardgränser för kurskapande. BuyCourses skiljer mellan standardtilldelningar av kurser och betalda kurstilldelningar. Där en ändlig gräns är konfigurerad kan gränssnittet för kurskapande visa användning och förlopp; obegränsade planer behöver ingen procentindikator.

Testa gränserna med ett konto som endast har standardtilldelningen och med ett som har den tillämpliga betalda tilldelningen. Ett offentligt kampanjkort ska aldrig kringgå serverbaserade behörigheter för kurskapande.

## Betalningsbeteende

Kort för offentliga planer ersätter inte BTCPay, Stripe, PayPal eller pluginets etablerade flöden för kursköp och återkommande tjänster. Fortsätt att hantera och testa betalningsgateways i den befintliga BuyCourses-konfigurationen.

Se [BuyCourses: Betalningar och återkommande tjänster](buycourses.md). Implementering: [PR #9369](https://github.com/chamilo/chamilo-lms/pull/9369).