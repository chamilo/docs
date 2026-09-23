# Resurssijärjestelmä

Resurssijärjestelmä on yksi Chamilo 3.0:n tärkeimmistä arkkitehtuurikonsepteista. Se tarjoaa yhtenäisen abstraktion kaikelle kurssisisällölle — asiakirjoille, harjoituksille, oppimispoluille, foorumiviesteille ja muulle.

## Ydinajatus

Jokainen kurssisisällön osa esitetään **ResourceNode**-entiteettinä. Tämä antaa kaikille sisältötyypeille yhteisen joukon ominaisuuksia:

* **Näkyvyyden hallinta** — Näytä/piilota oppijoilta
* **Pääsynhallinta** — Turvallisuusäänestäjät tarkistavat oikeudet ResourceNoden kautta
* **Tiedostojen tallennus** — Liitetiedostot tallennetaan ResourceFilen kautta
* **Puurakenne** — ResourceNodet muodostavat puun (vanhempi–lapsi-suhteet)
* **Tarkistusjälki** — Luoja, luontipäivä, muutosten seuranta

## Keskeiset entiteetit

### ResourceNode (`src/CoreBundle/Entity/ResourceNode.php`)

Keskeinen entiteetti. Jokaisella sisältöentiteetillä on yksi-yhteen-suhde ResourceNodeen.

Keskeiset kentät:

| Field | Type | Description |
|-------|------|-------------|
| `id` | integer | Primary key |
| `uuid` | UUID v4 | Unique identifier for API use |
| `title` | string | Display title |
| `creator` | User | The user who created this resource |
| `resourceFile` | ResourceFile | The attached file (if any) |
| `resourceType` | ResourceType | The type of resource (document, quiz, etc.) |
| `parent` | ResourceNode | Parent in the resource tree |
| `children` | Collection | Child ResourceNodes |
| `resourceLinks` | Collection | Visibility and access links |

Puu käyttää Gedmon **materialized path** -strategiaa tehokkaisiin hierarkkisiin kyselyihin.

### ResourceFile (`src/CoreBundle/Entity/ResourceFile.php`)

Tallentaa resurssin varsinaisen tiedostodatan:

| Field | Type | Description |
|-------|------|-------------|
| `id` | integer | Primary key |
| `title` | string | Original filename |
| `mimeType` | string | MIME type |
| `originalName` | string | Original upload name |
| `size` | integer | File size in bytes |
| `crop` | string | Crop data (for images) |

Tiedostojen tallennuksen hoitaa Flysystem, joten tiedostot voivat sijaita paikallisella levyllä, S3:ssa, Azuressa tai GCS:ssä konfiguraatiosta riippuen.

### ResourceLink

Hallitsee näkyvyyttä ja pääsyä kontekstikohtaisesti. Pääkontekstityyppejä on 3:

1. Course
2. Session
3. Group (kurssissa)

ResourceLink-entiteetti heijastaa näiden 3 kontekstityypin yhdistelmää ja määrittää näkyvyyden tälle täydelliselle kontekstille:

| Field | Type | Description |
|-------|------|-------------|
| `course` | Course | Which course the resource belongs to |
| `session` | Session | Which session (null for base course) |
| `group` | CGroup | Which group (null for whole course) |
| `visibility` | integer | Visible, invisible, or deleted |

Näin sama ResourceNode voi olla eri näkyvyydessä eri konteksteissa (esim. näkyvä yhdessä sessiossa mutta piilotettu toisessa).

Tämä asetetaan automaattisesti, kun käyttöliittymässä päätetään esimerkiksi, että resurssi on sessiospesifinen resurssi, joka on näkyvissä kaikille ryhmille annetussa kurssissa annetussa sessiossa, mutta näkymätön peruskurssissa tai toisessa sessiossa.

Oletuksena peruskurssissa näkyvät resurssit ovat näkyvissä myös kaikissa kyseisen kurssin sessioissa, mutta kurssin tuutori voi päättää piilottaa resurssin tietystä sessiosta. Tällöin haetaan resurssin sessiospesifinen näkyvyys, ja jos sen arvo on 0, kohde ei näy oppijoille tässä sessiossa, kun taas muissa sessioissa sessiospesifisen näkyvyyden puute saa resurssin käyttämään peruskurssin näkyvyyttä (ja resurssi näkyy oppijoille).

## API Platform -integraatio

ResourceNode on julkaistu API Platform -resurssina turvamäärityksineen:

```php
#[ApiResource(
    operations: [
        new Get(security: "is_granted('VIEW', object)"),
        new Put(security: "is_granted('EDIT', object)"),
        new Delete(security: "is_granted('DELETE', object)"),
        new GetCollection(security: "is_granted('ROLE_USER')"),
    ]
)]
```

## Miten sisältöentiteetit kytkeytyvät

Kurssisisältöentiteetit (CDocument, CQuiz, CLp jne.) laajentavat `AbstractResource`-luokkaa tai toteuttavat `ResourceInterface`-rajapinnan, mikä antaa niille `resourceNode`-suhteen:

```php
// In CDocument entity:
#[ORM\OneToOne(targetEntity: ResourceNode::class)]
private ResourceNode $resourceNode;
```

Kun luot CDocumentin, sen rinnalle luodaan automaattisesti ResourceNode, mikä tarjoaa yhtenäisen resurssienhallinnan.

## Käytännön seuraukset

Kurssisisällön kanssa työskenneltäessä:

1. **Sisällön luominen** — Luo sekä sisältöentiteetti ETTÄ sen ResourceNode
2. **Oikeuksien tarkistus** — Käytä ResourceNoden turvallisuusäänestäjiä
3. **Tiedostojen hallinta** — Liitä tiedostot ResourceFilen kautta
4. **Näkyvyyden hallinta** — Luo/muokkaa ResourceLinkejä
5. **Puiden rakentaminen** — Käytä ResourceNoden vanhempi–lapsi-suhdetta kansiorakenteisiin (esim. asiakirjakansiot)