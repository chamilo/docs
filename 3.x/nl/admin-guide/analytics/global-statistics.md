# Globale statistieken

Globale statistieken is het statistiekenoverzicht van het platform — een menu met platformbrede rapporten, gegroepeerd per onderwerp, in plaats van één enkel rapport.

## Globale statistieken openen

Klik in het beheerpaneel op **Analyse > Globale statistieken**.

## Hoe het is georganiseerd

Als u de pagina opent zonder een rapport te selecteren, verschijnt een menu met beschikbare statistieken, gegroepeerd in Cursussen, Gebruikers, Systeem, Sociaal en Sessie. Als u een menu-item selecteert, wordt dat specifieke rapport op dezelfde pagina geladen. Elk rapport is een platformbreed overzicht dat alleen voor beheerders beschikbaar is — er is hier geen afbakening per cursus of sessie; zie daarvoor [Leeranalyse](learning-analytics.md).

## Cursussen

* **Cursussen** — Totaal aantal cursussen, uitgesplitst per cursuscategorie
* **Toegang tot tools** — Platformbreed aantal gebeurtenissen van tooltoegang (aankondigingen, documenten, forums, toetsen, chat, enzovoort)
* **Aantal bronnen per tool** — Kies een of meer tools en bekijk elke cursus/sessie die ze gebruikt, met een bronnaantal en de datum van de laatste update, gesorteerd op gebruik
* **Laatste toegang** — Cursussen met hun datum van laatste toegang, beperkt tot cursussen die binnen een configureerbaar aantal dagen zijn bezocht (standaard 60)
* **Aantal cursussen per taal** — Cursussen gegroepeerd op hun interfacetaal
* **Cursusgebruik** — Bezoekaantallen per cursus over voortschrijdende perioden (vandaag, deze week, deze maand, 6 maanden, 1 jaar, 2 jaar, alle tijden), uitgesplitst tussen bezoeken binnen en buiten sessies

## Gebruikers

* **Aantal gebruikers** — Totaal aantal trainers en cursisten platformbreed, en dezelfde uitsplitsing per cursuscategorie
* **Aanmeldingen** — Aantal aanmeldingen voor vandaag, de afgelopen 7 dagen, de afgelopen 31 dagen en alle tijden, zowel voor het totale aantal aanmeldingen als voor unieke gebruikers; kan worden gefilterd op een minimale sessieduur
* **Aanmeldingen (maand)** — Dezelfde aanmeldgegevens, getotaliseerd per kalendermaand over de volledige geschiedenis
* **Aanmeldingen (dag)** — Aanmeldingstotalen per weekdag, plus een afzonderlijke uitsplitsing voor alleen de afgelopen 7 dagen
* **Aanmeldingen (uur)** — Aanmeldingstotalen per uur van de dag, plus een afzonderlijke uitsplitsing voor alleen de afgelopen 24 uur
* **Aantal gebruikers (foto)** — Hoeveel actieve accounts een profielfoto hebben geüpload versus hoeveel dat niet hebben gedaan
* **Aanmeldingen per datum** — De totale verbonden tijd van elke gebruiker (van aanmelden tot afmelden) over een gekozen datumbereik, exporteerbaar naar XLS
* **Al enige tijd niet aangemeld** — Hoeveel gebruikers zich niet hebben aangemeld binnen achterliggende vensters (vandaag, 7 dagen, 31 dagen, 6 maanden), en hoeveel zich nog nooit hebben aangemeld
* **Zombies** — Accounts waarvan de laatste aanmelding op of vóór een door u gekozen grensdatum ligt (er is geen vaste drempel — u kiest telkens de datum), optioneel beperkt tot actieve accounts, met knoppen om de vermelde accounts direct te activeren, te deactiveren of te verwijderen
* **Gebruikersstatistieken** — Gebruikers die binnen een gekozen datumbereik zijn geregistreerd, met volledige profielgegevens en overzichtsgrafieken, exporteerbaar naar XLS
* **Gebruikers online** — Live-aantallen van gebruikers die momenteel online zijn en gebruikers die momenteel een toets afleggen, elk weergegeven over vier tijdvensters (3, 5, 30 en 120 minuten)
* **Registraties van nieuwe gebruikers** — Nieuwe registraties over een gekozen datumbereik (dagelijks als het bereik een maand of minder is, anders maandelijks met doorklikmogelijkheid), plus een uitsplitsing van wie elk account heeft aangemaakt
* **Cursus-/sessie-inschrijvingen per dag** — Inschrijvingen versus uitschrijvingen per dag over een gekozen datumbereik
* **Dubbele gebruikers** — Vindt accounts die dezelfde naam, hetzelfde e-mailadres of dezelfde waarde van een gekozen profielveld delen; hiermee kunt u duplicaten uitschakelen, inschakelen of samenvoegen (merge) — samenvoegen verwijdert permanent de accounts die worden samengevoegd in het account dat u behoudt

## Systeem

* **Sessiestatistieken van portalgebruikers** — Een raster met gebruikersaantallen, uitgesplitst per toegangs-URL (op portals met meerdere URL's), sessie en cursus, voor een gekozen datumbereik, exporteerbaar naar XLS

Het item **Kwartaalrapport** dat ook onder Systeem verschijnt, wordt afzonderlijk behandeld in [Bedrijfsrapporten](corporate-reports.md).

## Sociaal

* **Aantal ontvangen berichten** — Ontvangen interne berichten, per gebruiker
* **Aantal verzonden berichten** — Verzonden interne berichten, per gebruiker
* **Aantal contacten** — Contacten in het sociale netwerk per gebruiker (exclusief relaties van het type HR/supervisor)

## Sessie

* **Sessies per datum** — Sessies die beginnen of eindigen binnen een gekozen datumbereik (optioneel gefilterd op status): aantal, gemiddeld aantal sessies per week, gemiddeld aantal gebruikers per sessie, gemiddeld aantal sessies per tutor, uitsplitsingen per categorie/taal/status, en een tabel met het aantal sessies per cursus

## Aanvullende rapporten in Chamilo 3.1

### Gebruikers per taal

De statistiek **Gebruikers per taal** groepeert platformgebruikers op hun geconfigureerde taal. Gebruik deze om de taalverdeling te begrijpen bij het plannen van gelokaliseerde communicatie of inhoud. Het is een rapport over de gebruikerstaal, geen telling van de cursustaal (die afzonderlijk onder Cursussen staat). Zie [pull request gebruikers per taal #9397](https://github.com/chamilo/chamilo-lms/pull/9397).

### Verlopen certificaten (Global Reporting)

Het beheerdersrapport **Verlopen certificaten** is beschikbaar via Global Reporting en niet als een uitsluitend cursusgebonden certificaatlijst voor docenten. Filter op trefwoord, cursussessie, cursus, maand of jaar en bekijk de vervaldatum en de certificaatlink. Deze weergave is bedoeld voor portaalbrede certificaatcontrole en verschilt van herinneringen voor certificaten die binnenkort verlopen. Zie [PR verlopen certificaten (globaal) #9372](https://github.com/chamilo/chamilo-lms/pull/9372) en [Certificaten en vaardigheden](../../teacher-guide/tracking-and-reporting/certificates-and-skills.md).