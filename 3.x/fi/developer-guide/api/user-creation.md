# Käyttäjän luominen

`POST /api/access_urls/{id}/user` luo alustan käyttäjän ja lisää hänet access URL:ään `{id}`. Se on Chamilo 3:n korvaaja 1.11.x-version `webservices/api/v2.php`-verkkopalvelun `save_user_json`-toiminnolle, ja se on tarkoitettu integraatioille, jotka luovat oppijatilejä (verkkokaupat, HR-järjestelmät, ilmoittautumisportaalit).

## Käyttöoikeus

| Kutsuja | Sallittu |
|--------|---------|
| `ROLE_ADMIN` | Kyllä |
| `ROLE_SESSION_MANAGER` | Kyllä |
| Kuka tahansa muu | `403 Forbidden` |

Tunnistaudu JWT:llä tai ulkoisella API-avaimella, kuten on kuvattu kohdassa [Todentaminen](authentication.md).

## Pyyntö

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

| Kenttä | Pakollinen | Kuvaus |
|-------|----------|-------------|
| `username` | Kyllä | Uuden käyttäjän kirjautumistunnus. Ei saa olla jo toisen tilin käytössä (vertailu ei huomioi kirjainkokoa). |
| `email` | Kyllä | Kelvollinen sähköpostiosoite. Useat tilit voivat jakaa saman osoitteen, ellei `checkEmailDuplicates` ole `true`. |
| `firstname`, `lastname` | Ei | Etu- ja sukunimi. |
| `password` | Ei | Alkuperäinen salasana. Kun se on tyhjä ja `sendEmail` on `true`, sähköposti sisältää sen sijaan linkin salasanan asettamiseen. |
| `locale` | Ei | Käyttöliittymän kieli, esim. `fr_FR`. Oletuksena alustan kieli. |
| `timezone` | Ei | Oletuksena alustan aikavyöhyke. |
| `status` | Ei | Oletuksena `5` (oppija); `1` opettajalle. |
| `sendEmail` | Ei | Oletuksena `true`. Lähettää käyttäjälle viestin ja sähköpostin, jossa on hänen käyttöoikeustietonsa. |
| `checkEmailDuplicates` | Ei | Oletuksena `false`. Kun arvo on `true`, pyyntö hylätään vastauksella `409 email_already_exists`, jos jokin tili käyttää jo tätä sähköpostiosoitetta (vertailu ei huomioi kirjainkokoa). Sama toiminta kuin `save_user_json`-toiminnon `check_email_duplicates`-parametrilla. |
| `extraFields` | Ei | Käyttäjän lisäkenttien arvot, avaimena kentän muuttuja. Jokaisen muuttujan on oltava olemassa oleva käyttäjän lisäkenttä. |

### Jaetut sähköpostiosoitteet

Chamilo ei edellytä sähköpostiosoitteiden olevan yksilöllisiä: ylläpitäjän käyttäjänluontilomake hyväksyy osoitteen, jota toinen tili jo käyttää, käyttäjien tuonti hylkää sen vain, kun sen **Tarkista yksilöllinen sähköposti** -asetus on valittuna, eikä tätä voi muuttaa alustan asetuksella. Yleinen tapaus on oppija, joka ilmoittautuu uudelleen uudella tunnisteella mutta säilyttää saman osoitteen. Lähetä `checkEmailDuplicates: true` vain, kun integraatiosi haluaa käsitellä olemassa olevan osoitteen virheenä.

Kun **Kirjautumistunnus on sähköposti** -asetus on käytössä, käyttäjätunnus on sähköpostiosoite, joten käyttäjätunnuksen tarkistus hylkää jo kaksoiskappaleet.

## Vastaus

`201 Created` ja uusi käyttäjä (`user:read`-sarjallistamisryhmä), mukaan lukien sen `id`.

## Virheet

| Tila | Runko | Milloin |
|--------|------|------|
| `401` | | Ei tunnistetietoja tai virheelliset tunnistetiedot |
| `403` | | Kutsuja ei ole ylläpitäjä eikä istunnon ylläpitäjä |
| `409` | `{"error": "username_already_exists"}` | Käyttäjätunnus on jo käytössä |
| `409` | `{"error": "email_already_exists"}` | `checkEmailDuplicates` on `true` ja sähköpostiosoite on jo käytössä |
| `422` | | Puuttuva `username` tai `email` tai virheellinen sähköpostiosoite |

## Toteutus

* Toiminto: `src/CoreBundle/Entity/User.php`-tiedostossa ilmoitettu `AccessUrlUser`-resurssi
* Syöte: `src/CoreBundle/Dto/CreateUserOnAccessUrlInput.php`
* Ohjain: `src/CoreBundle/Controller/Api/CreateUserOnAccessUrlAction.php`
* Istunnon ylläpitäjän **Rekisteröi opiskelija** -sivu (`/admin-dashboard/register/{courseId}`) käyttää tätä päätepistettä arvolla `checkEmailDuplicates: true`, joten se varoittaa, kun osoite on jo käytössä.