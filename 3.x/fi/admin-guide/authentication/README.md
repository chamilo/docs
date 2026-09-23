# Todentaminen

Chamilo tukee useita todentamismenetelmiä sisäänrakennetusta käyttäjätunnus/salasana-järjestelmästä yritystason kertakirjautumisratkaisuihin.

## Määritystiedosto

Kaikki ulkoiset todentamismenetelmät määritetään tiedostossa `config/authentication.yaml`. Mallipohja on saatavilla tiedostossa `config/authentication.dist.yaml`. Yleinen rakenne on:

```yaml
parameters:
  authentication:
    <access_url_id>:
      <auth_method>:
        <provider_name>:
          <config_key>: <value>
```

Tiedoston muokkauksen jälkeen tyhjennä ja lämmitä välimuisti:

```bash
php bin/console cache:clear
php bin/console cache:warmup
```

Ulkoiset kirjautumispainikkeet näkyvät kirjautumissivulla, kun välimuisti on päivitetty.

## Tuetut menetelmät

* **[OAuth2](oauth2.md)** — Azure AD, Keycloak, Facebook ja geneeriset OAuth2-tarjoajat
* **[Azure Entra ID](azure-entra-id.md)** — Yksityiskohtainen Azure/Entra ID -asennus: sovellusrekisteröinti, ryhmäpohjainen roolikartoitus, varmenteella todennus sekä käyttäjä-/ryhmäsynkronointikomennot
* **[LDAP](ldap.md)** — Todennus LDAP- tai Active Directory -palvelinta vasten
* **[CAS](cas.md)** — Central Authentication Service (vanhentunut, ei toimi versiossa 3.x)
* **[SCIM](scim.md)** — Automaattinen käyttäjien provisiointi ulkoisista identiteettitarjoajista
* **[SSO Configuration](sso-configuration.md)** — Vianmääritys ja menetelmien väliset huomiot

## Oletustodentaminen

Oletuksena Chamilo käyttää omaa sisäistä järjestelmäänsä — käyttäjät kirjautuvat Chamilo-tietokantaan tallennetulla käyttäjätunnuksella ja salasanalla. Ulkoiset menetelmät ovat lisäyksiä: vakio kirjautumislomake pysyy käytettävissä kaikkien määritettyjen tarjoajien rinnalla.

## Lisätietoa

Täydellinen parametrireferenssi ja edistyneet skenaariot löytyvät [External Authentication configuration -wikisivulta](https://github.com/chamilo/chamilo-lms/wiki/External-Authentication-configuration).