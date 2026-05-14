# Toegangs-URL's

Toegangs-URL's maken het mogelijk om met één Chamilo-installatie meerdere afzonderlijke portalen te bedienen.

## Gebruiksscenario's

* **Multi-tenant implementaties** — Host afzonderlijke trainingsportalen voor verschillende organisaties op één server
* **Afdelingsportalen** — Geef elke afdeling een eigen branded portaal (bijv. `hr.training.company.com`, `it.training.company.com`)
* **Regionale portalen** — Afzonderlijke portalen voor verschillende regio's of talen

## Hoe het werkt

Elke toegangs-URL is een afzonderlijk toegangspunt tot dezelfde Chamilo-installatie:

* Gebruikers kunnen aan een of meer toegangs-URL's worden toegewezen
* Cursussen en sessies behoren tot specifieke toegangs-URL's
* Platforminstellingen kunnen per toegangs-URL worden aangepast
* Branding en thema's kunnen per URL verschillen
* Gebruikers op één portaal kunnen gebruikers of cursussen op een ander portaal niet zien (tenzij expliciet gedeeld)

## Configuratie

### Multi-URL inschakelen

Multi-URL moet worden ingeschakeld in de Chamilo-configuratie (meestal in de omgevingsinstellingen). Dit wordt doorgaans gedaan tijdens de initiële setup.

### Een toegangs-URL aanmaken

1. Ga vanuit het beheerderspaneel naar **Toegangs-URL's**
2. Klik op **Een URL toevoegen**
3. Voer de URL in (bijv. `https://portal2.yoursite.com`)
4. Configureer instellingen specifiek voor deze URL
5. Sla op

### Gebruikers en cursussen toewijzen

* **Gebruikers** — Wijs gebruikers toe aan specifieke toegangs-URL's. Een gebruiker kan aan meerdere URL's worden gekoppeld.
* **Cursussen** — Wijs cursussen toe aan specifieke toegangs-URL's
* **Sessies** — Wijs sessies toe aan specifieke toegangs-URL's

### Instellingen per URL

Elke toegangs-URL kan zijn eigen instellingen hebben:

* **Kleurenthema** — Verschillende visuele branding
* **Platformnaam en logo** — Aangepaste identiteit
* **Instellingen overschrijven** — Bepaalde platforminstellingen kunnen per URL worden aangepast

## Tips

* **Beslis vroegtijdig** — Als je kiest voor een multi-URL-opstelling, doe dit dan aan het begin van je Chamilo-project, omdat het vereist dat de eerste URL relatief leeg blijft van inhoud. Het achteraf inschakelen van multi-URL is uitdagender (vereist handmatige databasewijzigingen).
* **Plan URL-structuur** — Bepaal je URL-schema voordat je toegangs-URL's aanmaakt, aangezien het later wijzigen van URL's invloed heeft op alle bestaande links en bladwijzers
* **DNS-configuratie** — Elke toegangs-URL moet verwijzen naar dezelfde Chamilo-server. Configureer DNS-records dienovereenkomstig.
* **Globale beheerder** — Gebruik de rol van Globale Beheerder om alle toegangs-URL's te beheren