# AI-coach voor studiesucces

De **AI-coach voor studiesucces** helpt een docent om cursusactiviteit om te zetten in praktische aanbevelingen voor één lerende. De functie is beschikbaar vanuit de lerendenlijst in het cursusrapportagegebied wanneer AI-helpers en de functie **Cursusanalyse** voor die cursus zijn ingeschakeld.

> Het platform moet ten minste één tekst-AI-provider hebben geconfigureerd. Zie [AI-configuratie](../../admin-guide/integrations/ai-configuration.md). De relevante platforminstellingen zijn `ai_helpers.enable_ai_helpers` en `ai_helpers.course_analyser` onder **Beheer > Configuratie-instellingen > AI-helpers**.

## Een aanbeveling genereren

1. Open het cursusrapportagegebied en toon de **Lerendenlijst**.
2. Zoek de lerende en klik op de actie **AI-coach voor studiesucces**.
3. Als er meerdere AI-providers beschikbaar zijn, selecteer er dan één.
4. Voer optioneel **Aanvullende instructies voor de AI-coach** in. Hiermee kunt u onderwijskundige context toevoegen of de coach vragen zich te richten op een specifieke moeilijkheid.
5. Klik op **Leerproces van gebruiker analyseren**.

Chamilo bereidt eerst een cursusanalyse voor of hergebruikt een bestaande analyse, en analyseert vervolgens de activiteit van de lerende in de huidige cursus of in de context van de cursussessie.

## Wat de aanbeveling bevat

Het resultaat kan het volgende bevatten:

* een beknopte algemene samenvatting;
* **Prioritaire acties**;
* voorgestelde **Aanvullende activiteiten**;
* aanbevelingen over **Ritme** en tempo;
* alternatieve **Leermethoden**;
* andere aanbevelingen wanneer relevant;
* **Bewijs**-koppelingen uit de goedgekeurde pedagogische broncatalogus voor de cursustaal.

De aanbeveling wordt in Chamilo opgeslagen voor die lerende en die cursuscontext. Chamilo bewaart ook een kopie in het eigen Postvak IN van de docent wanneer het aanmaken van het bericht slaagt, zodat deze later opnieuw kan worden bekeken.

## Privacy

Voordat de analyse start, toont Chamilo een privacywaarschuwing. Directe profielidentificatoren worden weggelaten uit de gegevens van de lerende die naar de AI-provider worden verzonden, en de AI krijgt de instructie de lerende niet te identificeren en geen gevoelige kenmerken af te leiden. Leeractiviteit en cursusinhoud kunnen echter nog steeds informatie bevatten waarmee iemand indirect kan worden geïdentificeerd. Volg het AI- en privacybeleid van uw organisatie voordat u de functie gebruikt.

Dezelfde analyse van studiesucces is ook beschikbaar voor geautoriseerde MCP-clients via de tool `generate_student_success_feedback`; deze hergebruikt dezelfde privacygefilterde analysestroom.