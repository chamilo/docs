# Talen

Dit hulpmiddel beheert welke interfacetalen gebruikers kunnen kiezen — het beheert niet de vertaalstrings zelf (die komen uit de taalpakketten die met Chamilo worden meegeleverd, niet uit iets dat hier bewerkbaar is).

## Talen openen

Vanuit het beheerpaneel klikt u op **Platform > Talen**.

## Wat u kunt doen

* **Beschikbaarheid in- of uitschakelen** — Schakel elk van de meegeleverde talen in of uit als keuze op de aanmeldpagina en in de profielinstellingen van gebruikers, met een eenvoudige aan/uit-schakelaar per rij
* **De platformstandaard instellen** — Kies welke taal wordt gebruikt wanneer geen gebruikersvoorkeur van toepassing is; de huidige standaard is gemarkeerd met een eigen pictogram en kan niet worden verborgen
* **Alles uitschakelen behalve de standaard** — Eén bulkactie om de taalkiezer te beperken tot alleen de standaardtaal van uw platform
* **De oorspronkelijke naam bewerken** — Pas aan hoe de eigen naam van een taal (de "oorspronkelijke naam") in de kiezer wordt weergegeven

## Een taal uitschakelen die in gebruik is

Als u een taal uitschakelt die actieve gebruikers al als interfacetaal hebben geselecteerd, vraagt Chamilo om bevestiging en — als u bevestigt — worden alle betrokken gebruikers gemigreerd naar de standaardtaal van het platform. Er is geen gedeeltelijke toestand waarin een gebruiker een nu verborgen taal geselecteerd houdt.

## Talen van rechts naar links

Talen van rechts naar links (zoals Arabisch, Hebreeuws of Perzisch) schakelen de interface automatisch over naar een indeling van rechts naar links wanneer ze worden geselecteerd — er is hier of elders niets te configureren om dit te laten gebeuren. Ondersteuning voor RTL is in recente versies aanzienlijk verbeterd.

## Subtalen

Als de instelling **Subtalen toestaan** is ingeschakeld, verschijnen extra acties voor het aanmaken van "subtalen" — gedeeltelijke overschrijvingen van een bovenliggende taal, historisch gebruikt voor regionale dialecten of organisatie-specifieke terminologieaanpassingen. Dit is een verouderde functie; de meeste installaties hebben deze niet nodig.

## Volgorde van persoonsnamen

Chamilo toont en sorteert persoonsnamen volgens de conventie van de gebruikte interfacetaal.

* **Voornaam eerst** (bijvoorbeeld "Maria Garcia"), gesorteerd op voornaam: Spaans (es, es_MX), Galicisch (gl), Maleis (ms_MY) en alle andere talen die hieronder niet worden vermeld.
* **Achternaam eerst** (bijvoorbeeld "Yamada Taro"), gesorteerd op achternaam: Japans, Koreaans, Chinees (vereenvoudigd en traditioneel), Vietnamees en Hongaars.

Spaans, Spaans (Mexico), Galicisch en Maleis werden voorheen behandeld als achternaam-eerst; ze volgen nu de volgorde voornaam-eerst. De conventie is ingebouwd in de taaldefinities van het platform (deze wordt niet per installatie opgeslagen), dus bij een upgrade is geen actie van de beheerder nodig.