# AI Tutor

De AI Tutor is een chatbot die in Chamilo is geïntegreerd en waarmee leerlingen kunnen communiceren om vragen over de cursus te stellen. Het biedt directe, contextbewuste antwoorden, aangedreven door een groot taalmodel.

## Hoe Het Werkt

Wanneer de AI Tutor is ingeschakeld voor een cursus, zien leerlingen een chatinterface waarin ze:

* **Vragen kunnen stellen** over de cursusinhoud
* **Uitleg kunnen krijgen** over concepten die in de cursus worden behandeld
* **Begeleiding kunnen ontvangen** zonder te hoeven wachten op een reactie van de docent

De AI Tutor gebruikt de context van de cursus om relevante antwoorden te geven. Het is ontworpen om uw onderwijs aan te vullen, niet om het te vervangen.

## De AI Tutor Inschakelen

De AI Tutor vereist configuratie op twee niveaus:

1. **Platformniveau** — De beheerder moet AI-helpers inschakelen en ten minste één AI-provider configureren (zie [AI Configuratie](../../admin-guide/integrations/ai-configuration.md))
2. **Cursusniveau** — De AI Tutor moet worden ingeschakeld in de cursusinstellingen (een eenvoudige aan/uit-schakelaar). De provider die voor de chat wordt gebruikt, is degene die door de beheerder is geconfigureerd.

## De Chatinterface

![De AI Tutor chatinterface die een gesprek tussen een leerling en de AI toont](/.gitbook/assets/ai-tutor-chat.png)

De AI Tutor verschijnt als een **vast chatpaneel** binnen de cursus. Leerlingen kunnen:

* Berichten typen en AI-gegenereerde antwoorden ontvangen
* Hun gespreksgeschiedenis bekijken
* Het gesprek resetten om opnieuw te beginnen

De chatinterface toont de uitwisseling tussen de leerling en de AI in een vertrouwd berichtenformaat.

## Belangrijk Gedrag

* **Alleen cursuscontext** — De AI Tutor is alleen beschikbaar binnen een cursus, niet op het algemene platform
* **Uitgeschakeld tijdens examens** — De AI Tutor wordt automatisch uitgeschakeld wanneer een leerling een oefening maakt, om spieken te voorkomen
* **Gesprek per leerling** — Elke leerling heeft een eigen privégesprek met de AI Tutor, en de promptcontext bevat alleen de meest recente berichten
* **Provider failover** — Als de geconfigureerde provider uitvalt, schakelt Chamilo over naar een andere beschikbare provider, zodat de chat blijft werken

## Als Docent

U moet zich bewust zijn van het volgende:

* De AI Tutor geeft mogelijk niet altijd perfecte antwoorden — moedig leerlingen aan om belangrijke informatie te verifiëren
* U kunt het gebruik van de AI Tutor bekijken via platformtracking
* De AI Tutor is een aanvulling op uw onderwijs, geen vervanging. Gebruik het naast forums, aankondigingen en directe berichten voor uitgebreide ondersteuning van leerlingen.

## Tips

* **Verwachtingen stellen** — Vertel leerlingen aan het begin van de cursus dat er een AI Tutor beschikbaar is en leg uit hoe ze deze op de juiste manier kunnen gebruiken
* **Kritisch denken aanmoedigen** — Herinner leerlingen eraan om kritisch na te denken over AI-gegenereerde antwoorden
* **Gebruik voor veelgestelde vragen** — De AI Tutor is vooral nuttig voor het beantwoorden van veelvoorkomende vragen die u anders herhaaldelijk zou moeten beantwoorden