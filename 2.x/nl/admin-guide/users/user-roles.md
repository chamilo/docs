# Gebruikersrollen

Chamilo maakt gebruik van een op rollen gebaseerd toestemmingssysteem. Elke gebruiker krijgt een rol toegewezen die bepaalt wat zij kunnen zien en doen op het platform.

## Platformniveau-rollen

Deze rollen bepalen de toegang tot platformbrede functies:

| Rol | Beschrijving |
|------|------------|
| **Leerling (Student)** | De standaardrol. Kan zich inschrijven voor cursussen, toegang krijgen tot leermateriaal, opdrachten indienen en oefeningen maken. |
| **Docent (Trainer)** | Kan cursussen aanmaken en beheren, inhoud toevoegen, leerlingen beoordelen en cursusrapportages bekijken. |
| **Sessiesbeheerder** | Kan sessies aanmaken en beheren (d.w.z. tijdgebonden cursuspakketten), gebruikers inschrijven voor sessies en coaches toewijzen. Heeft geen toegang tot algemene platforminstellingen. |
| **Personeelsmanager (HRM)** | Kan tracking- en rapportagegegevens bekijken voor toegewezen gebruikers. Wordt gebruikt voor supervisors die de training van medewerkers moeten volgen, maar geen inhoud of platform hoeven te beheren. |
| **Portaalbeheerder** | Volledige toegang tot alle beheerdersfuncties van het platform. Kan gebruikers, cursussen, sessies, plugins en alle instellingen beheren. |
| **Globale Beheerder** | Hetzelfde als Portaalbeheerder, maar met toegang tot alle toegang-URL's in een multi-URL (d.w.z. multi-tenant) opstelling. |
| **Anoniem** | Een speciale rol voor bezoekers die niet zijn ingelogd. Kan toegang krijgen tot openbare cursussen en inhoud als dit is ingeschakeld. |

## Cursusniveau-rollen

Binnen een cursus hebben gebruikers specifieke rollen:

| Rol | Beschrijving |
|------|-------------|
| **Student** | Standaard cursusrol. Kan inhoud bekijken, oefeningen maken en opdrachten indienen. |
| **Cursusassistent** | Heeft beperkte beheermogelijkheden binnen de cursus. Kan helpen met het beheren van inhoud en het modereren van forums. |
| **Docent** | Volledige controle over de cursus: inhoud, tools, instellingen en inschrijvingen beheren. |

## Sessieniveau-rollen

Binnen een sessie bestaan aanvullende rollen:

| Rol | Beschrijving |
|------|-------------|
| **Sessietutor** | Houdt toezicht op alle cursussen binnen een sessie. Kan tracking bekijken voor alle cursussen in de sessie. |
| **Cursustutor** | Geeft les in een specifieke cursus binnen een sessie. Kan inhoud beheren en leerlingen volgen voor die cursus in die sessie. |

Opmerking: De termen coach en tutor zijn qua betekenis zeer vergelijkbaar en zijn over het algemeen afhankelijk van de organisatie. We gebruiken beide termen door elkaar in Chamilo 2.0, maar meestal bedoelen we tutor, een persoon die je helpt leren van de cursus, geen persoonlijke coach. Mogelijk gebruiken we in de toekomst uitsluitend "tutor".

## Rollen toewijzen

Bij het aanmaken of bewerken van een gebruikersaccount in het beheerpaneel selecteer je hun platformniveau-rol. Cursus- en sessierollen worden toegewezen bij het inschrijven van gebruikers in cursussen of sessies.

## Rolhiërarchie

Rollen met hogere privileges erven de mogelijkheden van rollen met lagere privileges:

* Een beheerder kan alles doen wat een docent kan doen
* Een docent kan alles doen wat een student kan doen
* Sessieniveau-rollen (coach) bieden extra mogelijkheden alleen binnen hun toegewezen sessie

## Tips

* **Gebruik het principe van minimale privileges** — Wijs gebruikers de minimale rol toe die ze nodig hebben om hun taken uit te voeren
* **Gebruik Sessiesbeheerders voor gedelegeerd beheer** — Als je personeel hebt dat trainingssessies moet beheren maar niet het hele platform, geef ze dan de rol van Sessiesbeheerder in plaats van volledige beheerdersrechten
* **Gebruik HRM voor supervisors** — Personeelsmanagers kunnen de voortgang van trainingen volgen zonder toegang te hebben tot het wijzigen van cursussen of platforminstellingen
* **Rollen aanmaken** — Chamilo 2.x heeft de interne structuur klaar voor het aanmaken van nieuwe rollen, maar de functie behoeft nog meer testen voor brede release. Het kan worden ingeschakeld via [Official providers of Chamilo](https://chamilo.org/providers).