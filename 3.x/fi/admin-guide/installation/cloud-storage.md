# Pilvitallennus

Chamilo 3.0 tukee pilvitallennusta käyttäjien lataamille tiedostoille **Flysystemin** kautta. Flysystem on PHP:n tiedostojärjestelmäabstraktiokirjasto, joka on integroitu Symfonyyn. Näin tiedostoja voidaan tallentaa pilvipalveluihin paikallisen tiedostojärjestelmän sijaan (tai sen lisäksi).

## Miksi käyttää pilvitallennusta?

* **Skaalautuvuus** -- Pilvitallennus kasvaa alustan mukana ilman levytilan hallintaa.
* **Monipalvelinasennukset** -- Kun useita verkkopalvelimia ajetaan kuormantasaajan takana, pilvitallennus varmistaa, että kaikki palvelimet käyttävät samoja tiedostoja.
* **Kestävyys** -- Pilvipalveluntarjoajat tarjoavat sisäänrakennettua redundanssia ja varmuuskopiointia.
* **Kustannukset** -- Objektitallennus on usein gigatavua kohden edullisempaa kuin palvelimiin liitetty lohkotallennus.

## Tuetut palveluntarjoajat

| Palveluntarjoaja | Flysystem-sovitin |
|----------|-------------------|
| **Amazon S3** | `league/flysystem-aws-s3-v3` |
| **Google Cloud Storage** | `league/flysystem-google-cloud-storage` |
| **Azure Blob Storage** | `azure-oss/storage-blob-flysystem` |
| **MinIO** (S3-yhteensopiva) | Käyttää S3-sovitinta mukautetulla päätepisteellä |
| **DigitalOcean Spaces** (S3-yhteensopiva) | Käyttää S3-sovitinta mukautetulla päätepisteellä |
| **Paikallinen tiedostojärjestelmä** | Oletus, lisäpaketteja ei tarvita |

## Asennus

Chamilossa on valmiiksi asennettuna seuraavat palveluntarjoajat:

```bash
# Amazon S3
league/flysystem-aws-s3-v3

# Google Cloud Storage
league/flysystem-google-cloud-storage

# Azure Blob Storage
azure-oss/storage-blob-flysystem
```

## Määritys

Chamilo jakaa tiedostonsa useisiin Flysystem-liitoksiin — **assets**, **assets cache**, **resources**, **resources cache**, **themes** ja **plugins**. Kukin liitos voi osoittaa eri bucketiin tai säilöön. Pilvimääritys tiedostossa `config/packages/oneup_flysystem.yaml` valitaan ympäristön mukaan `when@`-ehdoilla ja lukee `.env`-tiedostossa asettamasi muuttujat.

### Amazon S3

```bash
# .env — common credentials
AWS_S3_STORAGE_VERSION=latest
AWS_S3_STORAGE_REGION=eu-central-1
AWS_S3_STORAGE_ACCESS_KEY=your-access-key
AWS_S3_STORAGE_ACCESS_SECRET=your-secret-key

# Per-mount buckets (each mount can be a different bucket)
AWS_S3_STORAGE_ASSET_BUCKET=chamilo-assets
AWS_S3_STORAGE_ASSET_CACHE_BUCKET=chamilo-asset-cache
AWS_S3_STORAGE_RESOURCE_BUCKET=chamilo-resources
AWS_S3_STORAGE_RESOURCE_CACHE_BUCKET=chamilo-resource-cache
AWS_S3_STORAGE_THEMES_BUCKET=chamilo-themes
AWS_S3_STORAGE_PLUGINS_BUCKET=chamilo-plugins

# Optional path prefixes inside a bucket — useful to share buckets across portals
AWS_S3_STORAGE_ASSET_PREFIX=portal1/assets
AWS_S3_STORAGE_RESOURCE_PREFIX=portal1/resources
```

### Azure Blob Storage

```bash
# .env
AZURE_STORAGE_CONNECTION_STRING='DefaultEndpointsProtocol=https;AccountName=...;AccountKey=...'
AZURE_STORAGE_ASSET_CONTAINER=asset-container
AZURE_STORAGE_ASSET_CACHE_CONTAINER=asset-cache-container
AZURE_STORAGE_RESOURCE_CONTAINER=resources-container
AZURE_STORAGE_RESOURCE_CACHE_CONTAINER=resources-cache-container
AZURE_STORAGE_THEMES_CONTAINER=themes-container
# Optional prefixes
AZURE_STORAGE_ASSET_PREFIX=optional/prefix
```

### Google Cloud Storage

Määritä GCS samalla tavalla kuin S3, käyttämällä GCS-kohtaisia ympäristömuuttujia ja yhtä bucketia liitosta kohden. Tarkat muuttujanimet löytyvät julkaisuun sisältyvästä `oneup_flysystem.yaml`-tiedostosta — ne on dokumentoitu myös `.env`-tiedostossa.

### MinIO (S3-yhteensopiva)

MinIO toimii S3-sovittimen kautta mukautetulla päätepisteellä ja polkutyylisellä osoitteistuksella — aseta `AWS_S3_STORAGE_*` kuten S3:lle ja lisää MinIO-päätepiste sekä paketin tukemat polkutyyliliput.

### DigitalOcean Spaces (S3-yhteensopiva)

DigitalOcean Spaces on erillinen, isännöity palvelu MinIOsta — se ei ole MinIO taustalla, mutta se tarjoaa saman S3-yhteensopivan API:n, joten sekin toimii S3-sovittimen kautta: aseta `AWS_S3_STORAGE_*` kuten S3:lle ja osoita `AWS_S3_STORAGE_ENDPOINT` (tai paketin vastaava päätepistemuuttuja) Spacen alueelliseen päätepisteeseen, esim. `https://<region>.digitaloceanspaces.com`.

> Täydellinen muuttujanimien joukko on lueteltu Chamilon mukana toimitetussa `.env.dist`-tiedostossa. Kopioi `.env`-tiedostoosi vain käyttämäsi palveluntarjoajan rivit ja poista niiden kommentointi.

## Teemat

**Teemat**-liitospiste toimii toisin kuin muut: Chamilon mukana toimitetut teemat (`chamilo`, `chamilo3`) ovat osa koodia ja sijaitsevat hakemistossa `var/themes`, joka on juuri se hakemisto, jota oletusarvoinen paikallinen adapteri palvelee. Kun teemat-liitospiste osoitetaan pilvisäiliöön, säiliö on aluksi tyhjä, joten logot, värit ja teeman kuvat puuttuvat ja käyttöliittymä renderöityy ilman tyylejä.

Lataa mukana tulevat teemat määritettyyn tallennustilaan komennolla:

```bash
php bin/console chamilo:remote-storage:upload-themes
```

| Valitsin | Vaikutus |
|--------|--------|
| `--dry-run` | Ilmoittaa, mitä ladattaisiin, kirjoittamatta mitään |
| `--overwrite` | Korvaa tiedostot, jotka ovat jo etätallennustilassa |

Teemojen tiedostojärjestelmässä jo olevat tiedostot säilytetään, ellei anneta valitsinta `--overwrite`, joten komennon uudelleenajaminen ei koskaan poista logoja tai väriteemoja, jotka ylläpitäjä on ladannut kohdasta **Ylläpito > Asetukset > Värit**. Kun teemojen tiedostojärjestelmä on paikallinen `var/themes`-hakemisto, komento tunnistaa sen eikä tee mitään, joten se on turvallista ajaa millä tahansa asennuksella.

Chamilo suorittaa tämän komennon itse asennusvelhon lopussa ja uudelleen onnistuneen tietokantamigraation jälkeen päivityksen yhteydessä, joten uudet teematiedostot päätyvät pilvitallennustilaan ilman manuaalisia vaiheita.

Kaksi tilannetta edellyttää silti komennon ajamista käsin:

* **Olemassa olevan alustan siirtäminen pilvitallennustilaan**, koska asennusta tai päivitystä ei tällöin tapahdu.
* **Uudessa julkaisussa muuttuneiden teematiedostojen päivittäminen** valitsimella `--overwrite`. Automaattiset ajot eivät koskaan ylikirjoita, juuri siksi etteivät ne palauta logoa, jonka ylläpitäjä on ladannut mukana tulevaan teemaan; hinta on se, että uuden julkaisun mukana tuleva `colors.css` tai `tiny-settings.js` ei korvaa säiliössä jo olevaa kopiota.

## Olemassa olevien tiedostojen migraatio

Jos vaihdat paikallisesta tallennustilasta pilvitallennustilaan olemassa olevalla alustalla, olemassa olevat tiedostot on migroitava:

1. Määritä uusi tallennusadapteri kuten edellä on kuvattu.
2. Kopioi olemassa olevat tiedostot paikallisesta `var/upload/`-hakemistosta pilvitallennustilan säilöön säilyttäen hakemistorakenne.
3. Aja `php bin/console chamilo:remote-storage:upload-themes` ladataksesi mukana tulevat teemat, kuten edellä on kuvattu.
4. Varmista, että tiedostot ovat käytettävissä alustan kautta migraation jälkeen.

## Käyttöoikeudet ja pääsy

Varmista, että pilvitallennustilan säilö **ei ole julkisesti käytettävissä**, ellet nimenomaisesti tarvitse julkisia tiedosto-URL-osoitteita. Chamilo palvelee tiedostoja oman käyttöoikeuskerroksensa kautta, joten suora julkinen pääsy säilöön on tarpeeton ja tietoturvariski.

S3:ssa käytä säilökäytäntöä, joka rajoittaa pääsyn edellä määritettyihin IAM-tunnuksiin.

## Vinkkejä

* **Testaa MinIO:lla paikallisesti** ennen käyttöönottoa pilvipalveluntarjoajalla -- MinIO on ilmainen, S3-yhteensopiva palvelin, jonka voit ajaa omalla koneellasi.
* **DigitalOcean Spaces** on isännöity S3-yhteensopiva vaihtoehto Amazon S3:lle, ja sen on vahvistettu toimivan Chamilon S3-adapterin kanssa.
* **Käytä Chamilolle omaa säilöä** sen sijaan, että jakaisit säilön muiden sovellusten kanssa.
* **Määritä elinkaarikäytännöt** pilvisäilöön tallennuskustannusten hallitsemiseksi (esim. siirrä vanhat tiedostot edullisempiin tallennustasoihin).