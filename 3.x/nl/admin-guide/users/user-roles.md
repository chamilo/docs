# Gebruikersrollen

Chamilo gebruikt een op rollen gebaseerd machtigingssysteem. Aan elke gebruiker wordt een rol toegewezen die bepaalt wat die gebruiker op het platform kan zien en doen.

## Rollen op platformniveau

Deze rollen bepalen de toegang tot platformbrede functies:

| Rol |  Beschrijving |
|------|------------|
| **Lerner (Student)** | De standaardrol. Kan zich inschrijven voor cursussen, leermateriaal openen, opdrachten indienen en oefeningen maken. |
| **Docent (Trainer)** | Kan cursussen aanmaken en beheren, inhoud toevoegen, studenten beoordelen en rapporten op cursusniveau bekijken. |
| **Sessiebeheerder** | Kan sessies aanmaken en beheren (d.w.z. op tijd gebaseerde cursuspakketten), gebruikers in sessies inschrijven en tutors toewijzen. Heeft geen toegang tot de algemene platforminstellingen. |
| **Human Resources Manager (HRM)** | Kan tracking- en rapportagegegevens bekijken voor toegewezen gebruikers. Bedoeld voor leidinggevenden die de opleiding van medewerkers moeten volgen, maar geen inhoud of het platform beheren. |
| **Portaalbeheerder** | Volledige toegang tot alle beheerfuncties van het platform. Kan gebruikers, cursussen, sessies, plugins en alle instellingen beheren. |
| **Globale beheerder** | Hetzelfde als Portaalbeheerder, maar met toegang tot alle toegangs-URL's in een multi-URL-configuratie (d.w.z. multi-tenant) — of, indien geregistreerd op een niet-root-URL, beperkt tot alleen de tak van die URL. Zie [Subtree-beheerders](../multi-url/access-urls.md#subtree-administrators). |
| **Anoniem** | Een speciale rol voor bezoekers die niet zijn aangemeld. Kan openbare cursussen en inhoud openen indien ingeschakeld. |

## Rollen op cursusniveau

Binnen een cursus hebben gebruikers specifieke rollen:

| Rol | Beschrijving |
|------|-------------|
| **Student** | Standaardrol in de cursus. Kan inhoud openen, oefeningen maken en opdrachten indienen. |
| **Cursusassistent** | Heeft beperkte beheerrechten binnen de cursus. Kan helpen bij het beheren van inhoud en het modereren van forums. |
| **Docent** | Volledige controle over de cursus: inhoud, tools, instellingen en inschrijvingen beheren. |

## Rollen op sessieniveau

Binnen een sessie bestaan aanvullende rollen:

| Rol | Beschrijving |
|------|-------------|
| **Sessietutor** | Houdt toezicht op alle cursussen binnen een sessie. Kan tracking bekijken voor alle cursussen in de sessie. |
| **Cursustutor** | Geeft een specifieke cursus binnen een sessie. Kan inhoud beheren en lerenden volgen voor die cursus in die sessie. |

Opmerking: deze rol heette "coach" in Chamilo-versies vóór 3.0. Vanaf Chamilo 3.0 is "coach" overal in de interface en documentatie van het platform vervangen door "tutor" — een tutor is iemand die lerenden begeleidt bij een cursus, geen persoonlijke coach. De onderliggende instellingsnamen in `Configuration settings` bevatten nog steeds "coach" voor achterwaartse compatibiliteit (bijvoorbeeld `add_users_by_coach`), maar hun labels luiden nu "tutor".

## HRM-terminologie en compatibiliteit

Chamilo 3.x gebruikt **HRM** (Human Resources Manager) in plaats van de oudere aanduiding **DRH**. Bestaande HR-relaties en sessietoewijzingen behouden hun opgeslagen waarden; de wijziging creëert geen andere rol en vereist geen hertoewijzing van gebruikers. Sommige oudere integraties en configuratie-items kunnen nog steeds `DRH` of `ROLE_DRH` gebruiken; de huidige rol is `ROLE_HR`, met compatibiliteitsafhandeling voor verouderde verwijzingen.

Gebruik voor nieuwe configuratie `HRM` in op rollen gebaseerde instellingen zoals `registration.redirect_after_login` en `security.mcp_allowed_roles`. De oudere sleutel `DRH` wordt nog steeds geaccepteerd voor bestaande configuraties, maar `HRM` heeft voorrang wanneer beide sleutels zijn opgegeven. De canonieke platforminstellingen zijn `registration.hrm_autosubscribe`, `session.hrm_can_access_all_session_content` en `workflows.hrm_allow_access_to_all_students`; verouderde `drh_*`-sleutels blijven herkend voor compatibiliteit.

Zie [Registratie-instellingen](../platform-settings/registration-settings.md), [Sessie-instellingen](../platform-settings/session-settings.md) en [Workflow-instellingen](../platform-settings/workflows-settings.md) voor configuratiedetails.

## Rollen toewijzen

Bij het aanmaken of bewerken van een gebruikersaccount in het beheerpaneel selecteert u de rol op platformniveau. Cursus- en sessierollen worden toegewezen bij het inschrijven van gebruikers voor cursussen of sessies.

## Rollenhiërarchie

Rollen met hogere rechten erven de mogelijkheden van rollen met lagere rechten:

* Een beheerder kan alles doen wat een docent kan doen
* Een docent kan alles doen wat een student kan doen
* Rollen op sessieniveau (tutor) bieden aanvullende mogelijkheden alleen binnen de toegewezen sessie

## Tips

* **Pas het principe van minimale rechten toe** — Wijs gebruikers de minimale rol toe die zij nodig hebben om hun taken uit te voeren
* **Gebruik Sessiebeheerders** voor gedelegeerd beheer — Als u medewerkers hebt die trainingssessies moeten beheren maar niet het hele platform, geef hen dan de rol Sessiebeheerder in plaats van volledige beheerdersrechten
* **Gebruik HRM voor leidinggevenden** — Human Resources Managers kunnen de voortgang van trainingen volgen zonder toegang te hebben om cursussen of platforminstellingen te wijzigen
* **Aanmaken van rollen** — Chamilo 3.x heeft de interne structuur klaar voor het aanmaken van nieuwe rollen, maar de functie heeft meer tests nodig voor een brede release. Deze kan worden ingeschakeld via [Officiële aanbieders van Chamilo](https://chamilo.org/providers).