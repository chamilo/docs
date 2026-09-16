# Gebruikers beheren

Deze pagina behandelt de dagelijkse taken voor het aanmaken, bewerken en beheren van gebruikersaccounts.

## Gebruikerslijst

![De gebruikerslijst met accounts en kolommen voor naam, e-mail, rol en status](/.gitbook/assets/admin-user-list.png)

Klik in het beheerpaneel op **Gebruikerslijst** om alle gebruikers op het platform te zien. De lijst toont:

* Avatar
* Naam
* Gebruikersnaam
* E-mailadres
* Rollen
* Actieve/inactieve status
* Registratiedatum
* Datum laatste aanmelding

Gebruik het hulpmiddel **Geavanceerd zoeken** om specifieke gebruikers te vinden op naam, e-mail, rol of andere criteria.

## Een gebruiker aanmaken

![Het formulier voor het aanmaken van een gebruiker met velden voor naam, e-mail, gebruikersnaam, wachtwoord, rol en taal](/.gitbook/assets/admin-user-create-form.png)

1. Klik in het beheerpaneel op **Gebruiker toevoegen**
2. Vul de verplichte velden in:
   * **Voornaam** en **Achternaam**
   * **E-mail** — Moet uniek zijn op het platform
   * **Gebruikersnaam** — De aanmeldnaam (moet uniek zijn)
   * **Wachtwoord** — Stel een initieel wachtwoord in
   * **Rollen** — Selecteer de platformrol(len) van de gebruiker (student, docent, beheerder, enz.)
   * **Taal** — De voorkeurstaal van de gebruikersinterface
3. Vul optioneel extra velden in:
   * Officiële code (bijv. uniek ID in de organisatie)
   * Telefoonnummer
   * Vervaldatum — Deactiveer het account automatisch na een bepaalde datum
   * Actieve/inactieve status
   * Extra profielvelden (indien geconfigureerd)
4. Opslaan

## Gebruikers importeren

![De interface voor het importeren van gebruikers voor het uploaden van CSV- of XML-bestanden met gebruikersgegevens](/.gitbook/assets/admin-user-import.png)

Voor het in bulk aanmaken van gebruikers kunt u gebruikers importeren vanuit een bestand:

1. Klik in het beheerpaneel op **Gebruikers importeren**
2. Upload een **CSV**- of **XML**-bestand met gebruikersgegevens
3. Koppel de bestandskolommen aan de gebruikersvelden van Chamilo
4. Kies hoe bestaande gebruikers moeten worden behandeld (bijwerken of overslaan)
5. Importeren

Het importbestand moet minstens kolommen bevatten voor: voornaam, achternaam, e-mail, gebruikersnaam en wachtwoord.

Opmerking: De kolom **Status** is de oude naam voor **Rol** en accepteert slechts enkele waarden, zoals 1 voor docent en 5 voor student. Verdere afstemming van de rollen kan later alleen handmatig gebeuren, door de gebruiker te bewerken.

## Gebruikers exporteren

Klik op **Gebruikers exporteren** om de gebruikerslijst te downloaden als CSV- of XML-bestand. U kunt filteren welke gebruikers u wilt exporteren op rol, registratiedatum of andere criteria.

## Een gebruiker bewerken

Klik op de naam van een gebruiker in de gebruikerslijst om het account te bewerken. U kunt het volgende wijzigen:

* Persoonlijke gegevens (naam, e-mail, telefoon)
* Rollen
* Wachtwoord (resetten)
* Actieve/inactieve status
* Vervaldatum
* Extra profielvelden

## Een gebruiker verwijderen

Bij het verwijderen van gebruikers (meestal docenten) die inhoud op het platform hebben aangemaakt, kan het systeem voorkomen dat u de gebruikers definitief verwijdert, en een waarschuwing tonen dat de gebruiker nog aan bepaalde resources is gekoppeld. Als u de verwijdering bevestigt, verwijdert het systeem de inhoud zelf niet, maar koppelt het die om redenen van gegevensconsistentie aan een neutrale gebruiker (we noemen deze de "Fallback user").

Om dit te voorkomen, controleert u de gebruikersgegevens, verwijdert u hun cursussen één voor één en verwijdert u daarna de gebruiker.

## Gebruikersacties

| Actie | Beschrijving |
|--------|-------------|
| **Deactiveren** | Schakel het account van een gebruiker uit zonder het te verwijderen. De gebruiker kan niet inloggen, maar de gegevens blijven bewaard. |
| **Activeren** | Schakel een eerder gedeactiveerd account weer in. |
| **Inloggen als** | Meld u aan op het platform als deze gebruiker (impersonatie). Nuttig voor het oplossen van problemen. |
| **Anonimiseren** | Wis alle persoonsgegevens van het account, zoals gedefinieerd door de AVG van de EU. |
| **Verwijderen** | Soft delete van het gebruikersaccount. Gebruik het tabblad **Verwijderde gebruikers** om het account en de bijbehorende gegevens definitief te verwijderen. |

> **Inloggen als** is een krachtige functie. Gebruik deze verantwoord en alleen voor legitieme ondersteuningsdoeleinden.

## Batchbewerkingen

Selecteer meerdere gebruikers in de gebruikerslijst om batchacties uit te voeren:

* Meerdere gebruikers tegelijk activeren of deactiveren
* Meerdere gebruikers verwijderen
* Gebruikers toewijzen aan een cursus of sessie

## Tips

* **Gebruik CSV-import voor grote inschrijvingen** — Wanneer u veel gebruikers aanmeldt aan het begin van een opleidingsprogramma, bereidt u een CSV-bestand voor en importeert u in bulk
* **Stel vervaldatums in** — Voor tijdelijke gebruikers (workshopdeelnemers, proefgebruikers) stelt u een vervaldatum in om hun accounts automatisch te deactiveren
* **Deactiveren in plaats van verwijderen** — Wanneer een gebruiker vertrekt, deactiveert u het account eerst. Zo blijven de opleidingsgegevens bewaard. Verwijder alleen als u zeker weet dat de gegevens niet meer nodig zijn.