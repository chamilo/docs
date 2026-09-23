# Arkiston siivous

Ajan myötä Chamilo kerää tilapäisiä tiedostoja välimuisti- ja arkistohakemistoihinsa. Säännöllinen siivous ehkäisee levytilan loppumista.

## Mitä voidaan siivota

* **Tilapäiset lataustiedostot** — Viennin, tuonnin ja muiden toimintojen aikana syntyneet tiedostot sekä vanhentuneet vanhan käyttöliittymän käännöstiedostot
* **Symfony-sovelluksen välimuisti** — Käännetty kontti, välimuistiin tallennettu konfiguraatio ja reititystiedot. Tätä *ei* käsitellä alla kuvatulla hallintapaneelin toiminnolla — katso [Komentoriviltä](#from-the-command-line).
* **Istuntotiedot** — Vanhentuneet PHP-istuntotiedostot
* **Lokitiedostot** — Vanhat lokitiedostot, joita ei enää tarvita

## Siivouksen suorittaminen

### Hallintapaneelista

Siirry hallintapaneelissa kohtaan **Järjestelmä > Siivoa tilapäiset tiedostot** (katso [Järjestelmätyökalut](../system/system-tools.md#clean-temporary-files)). Se ilmoittaa, kuinka monta tilapäistä tiedostoa on olemassa ja kuinka paljon tilaa ne vievät, ja antaa sen jälkeen tyhjentää kaiken tai vain valittua ikää vanhemmat tiedostot, kuivakäyntiesikatselulla. Se myös poistaa vanhentuneet vanhan käännöksen tiedostot ja regeneroi käännetyt CSS-resurssit.

Tämä toiminto jättää tarkoituksella pois Symfonyn omat välimuistihakemistot (`var/cache/dev`, `var/cache/prod`, `var/cache/test` ja välimuistipoolit), joten se ei saa `.env`- tai `config/`-muutosta voimaan — käytä siihen komentoriviä.

### Komentoriviltä

Tarkempaa hallintaa varten ja Symfony-sovelluksen välimuistin varsinaiseen tyhjentämiseen käytä Symfony-konsolikomentoja:

```bash
# Clear the Symfony cache
php bin/console cache:clear

# Clear only the production cache
php bin/console cache:clear --env=prod
```

## Vinkkejä

* **Aikatauluta säännölliset siivoukset** — Määritä viikoittainen tai kuukausittainen cron-työ tilapäisten tiedostojen tyhjentämiseen
* **Seuraa levytilan käyttöä** — Pidä silmällä `var/`-hakemiston kokoa, sillä se kasvaa välimuisti- ja lokitiedostojen myötä
* **Ole varovainen lokien kanssa** — Ennen lokitiedostojen poistamista tarkista, sisältävätkö ne vianmäärityksessä tarvittavia tietoja