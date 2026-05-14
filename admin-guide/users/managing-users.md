# Gebruikers beheren

Deze pagina behandelt de dagelijkse taken voor het aanmaken, bewerken en beheren van gebruikersaccounts.

## Gebruikerslijst

![De gebruikerslijst met accounts, inclusief kolommen voor naam, e-mail, rol en status](/.gitbook/assets/admin-user-list.png)

Klik in het beheerderspaneel op **Gebruikerslijst** om alle gebruikers op het platform te bekijken. De lijst toont:

* Avatar
* Naam
* Gebruikersnaam
* E-mailadres
* Rollen
* Actieve/inactieve status
* Registratiedatum
* Datum van laatste aanmelding

Gebruik de **Geavanceerd zoeken**-tool om specifieke gebruikers te vinden op basis van naam, e-mail, rol of andere criteria.

## Een gebruiker aanmaken

![Het formulier voor het aanmaken van een gebruiker met velden voor naam, e-mail, gebruikersnaam, wachtwoord, rol en taal](/.gitbook/assets/admin-user-create-form.png)

1. Klik op **Gebruiker toevoegen** in het beheerderspaneel
2. Vul de verplichte velden in:
   * **Voornaam** en **Achternaam**
   * **E-mail** — Moet uniek zijn op het platform
   * **Gebruikersnaam** — De inlognaam (moet uniek zijn)
   * **Wachtwoord** — Stel een initieel wachtwoord in
   * **Rollen** — Selecteer de platformrol(len) van de gebruiker (student, docent, beheerder, enz.)
   * **Taal** — De voorkeurstaal van de gebruiker voor de interface
3. Vul optioneel aanvullende velden in:
   * Officiële code (bijv. unieke ID binnen de organisatie)
   * Telefoonnummer
   * Vervaldatum — Deactiveer het account automatisch na een bepaalde datum
   * Actieve/inactieve status
   * Extra profielvelden (indien geconfigureerd)
4. Opslaan

## Gebruikers importeren

![De interface voor het importeren van gebruikers door CSV- of XML-bestanden met gebruikersgegevens te uploaden](/.gitbook/assets/admin-user-import.png)

Voor het aanmaken van meerdere gebruikers tegelijk kunt u gebruikers importeren vanuit een bestand:

1. Klik op **Gebruikers importeren** in het beheerderspaneel
2. Upload een **CSV**- of **XML**-bestand met gebruikersgegevens
3. Koppel de kolommen van het bestand aan de gebruikersvelden van Chamilo
4. Kies hoe bestaande gebruikers moeten worden behandeld (bijwerken of overslaan)
5. Importeren

Het importbestand moet minimaal kolommen bevatten voor: voornaam, achternaam, e-mail, gebruikersnaam en wachtwoord.

Opmerking: De kolom **Status** is de oude benaming voor **Rol** en accepteert slechts enkele waarden, zoals 1 voor docent, 5 voor student. Verdere aanpassing van de rollen kan later alleen handmatig worden gedaan door de gebruiker te bewerken.

## Gebruikers exporteren

Klik op **Gebruikers exporteren** om de gebruikerslijst te downloaden als CSV- of XML-bestand. U kunt filteren welke gebruikers u wilt exporteren op basis van rol, registratiedatum of andere criteria.

## Een gebruiker bewerken

Klik op de naam van een gebruiker in de gebruikerslijst om hun account te bewerken. U kunt het volgende aanpassen:

* Persoonlijke informatie (naam, e-mail, telefoon)
* Rollen
* Wachtwoord (resetten)
* Actieve/inactieve status
* Vervaldatum
* Extra profielvelden

## Een gebruiker verwijderen

Bij het verwijderen van gebruikers (meestal docenten) die inhoud op het platform hebben aangemaakt, kan het systeem voorkomen dat u de gebruikers permanent verwijdert. Er wordt dan een waarschuwingsbericht weergegeven dat de gebruiker nog steeds aan bepaalde bronnen is gekoppeld. Als u de verwijdering bevestigt, zal het systeem de inhoud niet verwijderen, maar deze koppelen aan een neutrale gebruiker (de zogenaamde "Fallback user") om de consistentie van gegevens te waarborgen.

Om dit te vermijden, controleert u de gebruikersdetails, verwijdert u hun cursussen een voor een en verwijdert u vervolgens de gebruiker.

## Gebruikersacties

| Actie | Beschrijving |
|-------|--------------|
| **Deactiveren** | Schakel een gebruikersaccount uit zonder deze te verwijderen. De gebruiker kan niet inloggen, maar de gegevens blijven behouden. |
| **Activeren** | Activeer een eerder gedeactiveerd account opnieuw. |
| **Inloggen als** | Log in op het platform als deze gebruiker (imitatie). Handig voor het oplossen van problemen. |
| **Anonimiseren** | Verwijder alle persoonlijke informatie van het account, zoals gedefinieerd door de GDPR van de EU. |
| **Verwijderen** | Voer een zachte verwijdering van het gebruikersaccount uit. Gebruik het tabblad **Verwijderde gebruikers** om het account en de bijbehorende gegevens permanent te verwijderen. |

> **Inloggen als** is een krachtige functie. Gebruik deze verantwoordelijk en alleen voor legitieme ondersteuningsdoeleinden.

## Batchbewerkingen

Selecteer meerdere gebruikers in de gebruikerslijst om batchacties uit te voeren:

* Activeer of deactiveer meerdere gebruikers tegelijk
* Verwijder meerdere gebruikers
* Wijs gebruikers toe aan een cursus of sessie

## Tips

* **Gebruik CSV-import voor grote inschrijvingen** — Bij het onboarden van veel gebruikers aan het begin van een trainingsprogramma, bereid een CSV-bestand voor en importeer in bulk
* **Stel vervaldata in** — Voor tijdelijke gebruikers (workshopdeelnemers, proefgebruikers), stel een vervaldatum in om hun accounts automatisch te deactiveren
* **Deactiveer in plaats van verwijderen** — Wanneer een gebruiker vertrekt, deactiveer eerst hun account. Dit behoudt hun trainingsgegevens. Verwijder alleen als u zeker weet dat de gegevens niet langer nodig zijn.