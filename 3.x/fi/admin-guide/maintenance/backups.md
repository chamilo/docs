# Varmuuskopiot

Säännölliset varmuuskopiot ovat välttämättömiä Chamilo-tietojesi suojaamiseksi. Tällä sivulla käsitellään, mitä varmuuskopioidaan ja miten.

## Mitä varmuuskopioidaan

### 1. Tietokanta

Chamilo-tietokanta sisältää kaiken alustan datan: käyttäjät, kurssit, seuranta, arvosanat, viestit ja asetukset. Tämä on kriittisin varmuuskopioitava osa.

**Varmuuskopiointi:**

```bash
mysqldump -u username -p chamilo_database > chamilo_backup_$(date +%Y%m%d).sql
```

### 2. Tiedostot

Chamilo tallentaa ladatut tiedostot (asiakirjat, kuvat, SCORM-paketit) tiedostojärjestelmään. Tärkeimmät varmuuskopioitavat hakemistot:

* `var/` — Ladatut tiedostot ja resurssit
* `public/plugin/` — Liitännäistiedostot (vain jos olet lisännyt mukautettuja liitännäisiä)

Jos käytät pilvitallennusta (S3, Azure Blob), varmista, että pilvipalveluntarjoajan varmuuskopiointi/versiointi on käytössä.

### 3. Kokoonpano

* `.env` — Ympäristön kokoonpano
* `config/` — Mahdolliset mukautetut kokoonpanotiedostot

## Varmuuskopiointiaikataulu

| Komponentti | Suositeltu tiheys |
|-----------|---------------------|
| Tietokanta | Päivittäin |
| Tiedostot | Päivittäin tai viikoittain (latausaktiivisuudesta riippuen) |
| Kokoonpano | Jokaisen kokoonpanomuutoksen jälkeen |

## Palautus

Varmuuskopiosta palauttaminen:

1. Palauta tietokanta SQL-vedoksesta
2. Palauta tiedostohakemistot
3. Palauta kokoonpanotiedostot
4. Tyhjennä Symfony-välimuisti: `php bin/console cache:clear`

## Vinkkejä

* **Automatisoi varmuuskopiot** — Käytä cron-töitä varmuuskopioiden automaattiseen suorittamiseen
* **Säilytä muualla** — Pidä varmuuskopiot erillisellä palvelimella tai pilvitallennuksessa
* **Testaa palautus** — Testaa säännöllisesti, että varmuuskopiosta voidaan palauttaa onnistuneesti
* **Dokumentoi prosessi** — Pidä kirjalliset ohjeet palautusprosessista, jotta kuka tahansa tiimissä voi suorittaa sen