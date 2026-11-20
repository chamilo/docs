# Gebruikers aanmaken

`POST /api/access_urls/{id}/user` maakt een platformgebruiker aan en voegt deze toe aan de access-URL `{id}`. Het is de vervanging in Chamilo 3 voor de actie `save_user_json` van de webservice `webservices/api/v2.php` uit 1.11.x, en is bedoeld voor integraties die leeraccounts aanmaken (webshops, HR-systemen, inschrijvingsportalen).

## Toegang

| Aanroeper | Toegestaan |
|--------|---------|
| `ROLE_ADMIN` | Ja |
| `ROLE_SESSION_MANAGER` | Ja |
| Iedereen anders | `403 Forbidden` |

Authenticeer met een JWT of een externe API-sleutel, zoals beschreven in [Authenticatie](authentication.md).

## Verzoek

```http
POST /api/access_urls/1/user
Authorization: Bearer <token>
Content-Type: application/json
```

```json
{
  "username": "jdoe-20261022",
  "email": "jane.doe@example.com",
  "firstname": "Jane",
  "lastname": "Doe",
  "password": "S3cret!pass",
  "sendEmail": true,
  "extraFields": { "my_user_field": "value" }
}
```

| Veld | Verplicht | Beschrijving |
|-------|----------|-------------|
| `username` | Ja | Aanmeldnaam van de nieuwe gebruiker. Mag nog niet in gebruik zijn door een ander account (vergelijking is niet hoofdlettergevoelig). |
| `email` | Ja | Een geldig e-mailadres. Meerdere accounts mogen hetzelfde adres delen, tenzij `checkEmailDuplicates` `true` is. |
| `firstname`, `lastname` | Nee | Voor- en achternaam. |
| `password` | Nee | Initiële wachtwoord. Wanneer dit leeg is en `sendEmail` `true` is, bevat de e-mail in plaats daarvan een koppeling om een wachtwoord in te stellen. |
| `locale` | Nee | Interfacetaal, bijv. `fr_FR`. Standaard de platformtaal. |
| `timezone` | Nee | Standaard de tijdzone van het platform. |
| `status` | Nee | Standaard `5` (leerling); `1` voor een docent. |
| `sendEmail` | Nee | Standaard `true`. Stuurt de gebruiker een bericht en een e-mail met de toegangsgegevens. |
| `checkEmailDuplicates` | Nee | Standaard `false`. Wanneer `true`, wordt het verzoek geweigerd met `409 email_already_exists` als een account dit e-mailadres al gebruikt (vergelijking is niet hoofdlettergevoelig). Hetzelfde gedrag als de parameter `check_email_duplicates` van `save_user_json`. |
| `extraFields` | Nee | Waarden van extra gebruikersvelden, gekoppeld aan de variabele van het veld. Elke variabele moet een bestaand extra gebruikersveld zijn. |

### Gedeelde e-mailadressen

Chamilo vereist niet dat e-mailadressen uniek zijn: het formulier voor het aanmaken van gebruikers van de beheerder accepteert een adres dat een ander account al gebruikt, de gebruikersimport weigert het alleen wanneer de optie **Uniek e-mailadres controleren** is aangevinkt, en er is geen platforminstelling om dit te wijzigen. Een veelvoorkomend geval is een leerling die onder een nieuwe identificatie opnieuw wordt ingeschreven en hetzelfde adres behoudt. Stuur `checkEmailDuplicates: true` alleen wanneer uw integratie een bestaand adres als fout wil behandelen.

Wanneer de instelling **Aanmelden is e-mail** is ingeschakeld, is de gebruikersnaam het e-mailadres, zodat de controle op de gebruikersnaam duplicaten al afwijst.

## Antwoord

`201 Created` met de nieuwe gebruiker (serialisatiegroep `user:read`), inclusief de `id`.

## Fouten

| Status | Body | Wanneer |
|--------|------|------|
| `401` | | Geen of ongeldige referenties |
| `403` | | De aanroeper is noch een beheerder noch een sessiebeheerder |
| `409` | `{"error": "username_already_exists"}` | De gebruikersnaam is al in gebruik |
| `409` | `{"error": "email_already_exists"}` | `checkEmailDuplicates` is `true` en het e-mailadres is al in gebruik |
| `422` | | Ontbrekende `username` of `email`, of ongeldig e-mailadres |

## Implementatie

* Bewerking: de resource `AccessUrlUser`, gedeclareerd op `src/CoreBundle/Entity/User.php`
* Invoer: `src/CoreBundle/Dto/CreateUserOnAccessUrlInput.php`
* Controller: `src/CoreBundle/Controller/Api/CreateUserOnAccessUrlAction.php`
* De pagina **Student registreren** van de sessiebeheerder (`/admin-dashboard/register/{courseId}`) gebruikt dit eindpunt met `checkEmailDuplicates: true`, zodat er een waarschuwing verschijnt wanneer het adres al in gebruik is.