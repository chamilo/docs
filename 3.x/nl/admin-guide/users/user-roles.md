# Gebruikersrollen

Chamilo gebruikt een op rollen gebaseerd machtigingssysteem. Elke gebruiker krijgt een rol toegewezen die bepaalt wat hij of zij op het platform kan zien en doen.

## Rollen op platformniveau

Deze rollen bepalen de toegang tot platformbrede functies:

| Rol |  Beschrijving |
|------|------------|
| **Learner (Student)** | De standaardrol. Kan zich inschrijven voor cursussen, leermateriaal raadplegen, opdrachten indienen en oefeningen maken. |
| **Teacher (Trainer)** | Kan cursussen aanmaken en beheren, inhoud toevoegen, studenten beoordelen en rapporten op cursusniveau bekijken. |
| **Sessions Administrator** | Kan sessies (d.w.z. tijdsgebonden cursuspakketten) aanmaken en beheren, gebruikers in sessies inschrijven en tutoren toewijzen. Heeft geen toegang tot algemene platforminstellingen. |
| **Human Resources Manager (HRM)** | Kan tracking- en rapportagegegevens bekijken voor toegewezen gebruikers. Bedoeld voor supervisors die de training van medewerkers moeten volgen, maar geen inhoud of het platform beheren. |
| **Portal Administrator** | Volledige toegang tot alle platformbeheerfuncties. Kan gebruikers, cursussen, sessies, plugins en alle instellingen beheren. |
| **Global Administrator** | Zelfde als Portal Administrator, maar met toegang tot alle access URL's in een multi-URL-opzet (d.w.z. multi-tenant) — of, indien geregistreerd op een niet-root-URL, beperkt tot de tak van die URL. Zie [Subtree Administrators](../multi-url/access-urls.md#subtree-administrators). |
| **Anonymous** | Een speciale rol voor bezoekers die niet zijn ingelogd. Kan toegang krijgen tot openbare cursussen en inhoud indien ingeschakeld. |

## Rollen op cursusniveau

Binnen een cursus hebben gebruikers specifieke rollen:

| Rol | Beschrijving |
|------|-------------|
| **Student** | Standaardcursusrol. Kan inhoud raadplegen, oefeningen maken en opdrachten indienen. |
| **Course assistant** | Heeft beperkte beheermachtigingen binnen de cursus. Kan helpen bij het beheren van inhoud en forums modereren. |
| **Teacher** | Volledige controle over de cursus: inhoud, tools, instellingen en inschrijving beheren. |

## Rollen op sessieniveau

Binnen een sessie bestaan extra rollen:

| Rol | Beschrijving |
|------|-------------|
| **Session tutor** | Houdt toezicht op alle cursussen binnen een sessie. Kan tracking bekijken over alle cursussen in de sessie. |
| **Course tutor** | Geeft les in een specifieke cursus binnen een sessie. Kan inhoud beheren en leerlingen volgen voor die cursus in die sessie. |

Opmerking: Deze rol heette "coach" in Chamilo-versies vóór 3.0. Vanaf Chamilo 3.0 is "coach" overal in de interface en documentatie van het platform vervangen door "tutor" — een tutor is iemand die leerlingen door een cursus begeleidt, geen persoonlijke coach. De onderliggende instellingsnamen in `Configuration settings` bevatten nog steeds "coach" voor achterwaartse compatibiliteit (bijvoorbeeld `add_users_by_coach`), maar hun labels luiden nu "tutor".

## Rollen toewijzen

Bij het aanmaken of bewerken van een gebruikersaccount in het beheerpaneel selecteert u hun rol op platformniveau. Cursus- en sessierollen worden toegewezen bij het inschrijven van gebruikers in cursussen of sessies.

## Rolhiërarchie

Rollen met hogere rechten erven de mogelijkheden van rollen met lagere rechten:

* Een administrator kan alles doen wat een teacher kan doen
* Een teacher kan alles doen wat een student kan doen
* Rollen op sessieniveau (tutor) bieden extra mogelijkheden alleen binnen hun toegewezen sessie

## Tips

* **Pas het principe van minimale rechten toe** — Wijs gebruikers de minimale rol toe die ze nodig hebben om hun taken uit te voeren
* **Gebruik Sessions Administrators voor gedelegeerd beheer** — Als u medewerkers hebt die trainingssessies moeten beheren maar niet het hele platform, geef hun dan de rol Sessions Administrator in plaats van volledige administratorrechten
* **Gebruik HRM voor supervisors** — Human Resources Managers kunnen de trainingsvoortgang volgen zonder toegang te hebben tot het wijzigen van cursussen of platforminstellingen
* **Aanmaken van rollen** — Chamilo 3.x heeft de interne structuur klaar voor het aanmaken van nieuwe rollen, maar de functie heeft meer tests nodig voor een brede uitrol. Het kan worden ingeschakeld via [Official providers of Chamilo](https://chamilo.org/providers).