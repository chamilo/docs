# Resourcesysteem

Het resourcesysteem is een van de belangrijkste architecturale concepten in Chamilo 3.0. Het biedt een uniforme abstractie voor alle cursusinhoud — documenten, oefeningen, leerpaden, forumberichten en meer.

## Kernconcept

Elk stuk cursusinhoud wordt vertegenwoordigd door een **ResourceNode**. Dit geeft alle inhoudstypen een gemeenschappelijke set mogelijkheden:

* **Zichtbaarheidsbeheer** — Tonen/verbergen voor cursisten
* **Toegangsbeheer** — Security voters controleren machtigingen via de ResourceNode
* **Bestandsopslag** — Bijgevoegde bestanden worden opgeslagen via ResourceFile
* **Boomstructuur** — ResourceNodes vormen een boom (ouder-kindrelaties)
* **Audittrail** — Maker, aanmaakdatum, wijzigingsregistratie

## Belangrijke entiteiten

### ResourceNode (`src/CoreBundle/Entity/ResourceNode.php`)

De centrale entiteit. Elke inhoudsentiteit heeft een een-op-eenrelatie met een ResourceNode.

Belangrijke velden:

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

De boom gebruikt de **materialized path**-strategie van Gedmo voor efficiënte hiërarchische query's.

### ResourceFile (`src/CoreBundle/Entity/ResourceFile.php`)

Slaat de daadwerkelijke bestandsgegevens voor een resource op:

| Field | Type | Description |
|-------|------|-------------|
| `id` | integer | Primary key |
| `title` | string | Original filename |
| `mimeType` | string | MIME type |
| `originalName` | string | Original upload name |
| `size` | integer | File size in bytes |
| `crop` | string | Crop data (for images) |

Bestandsopslag wordt afgehandeld door Flysystem, zodat bestanden afhankelijk van de configuratie op lokale schijf, S3, Azure of GCS kunnen staan.

### ResourceLink

Stuurt zichtbaarheid en toegang per context. Er zijn 3 hoofdcontexttypen:

1. Course
2. Session
3. Group (in a course)

De ResourceLink-entiteit weerspiegelt dus de combinatie van die 3 contexttypen en stelt een zichtbaarheid in voor die volledige context:

| Field | Type | Description |
|-------|------|-------------|
| `course` | Course | Which course the resource belongs to |
| `session` | Session | Which session (null for base course) |
| `group` | CGroup | Which group (null for whole course) |
| `visibility` | integer | Visible, invisible, or deleted |

Hierdoor kan dezelfde ResourceNode in verschillende contexten een andere zichtbaarheid hebben (bijv. zichtbaar in de ene sessie maar verborgen in een andere).

Dit wordt automatisch ingesteld wanneer u de interface gebruikt en bijvoorbeeld besluit dat een resource een sessiespecifieke resource is die zichtbaar is voor alle groepen in een bepaalde cursus in een bepaalde sessie, maar onzichtbaar in de basiscursus of in een andere sessie.

Standaard zijn resources die zichtbaar zijn in een basiscursus ook zichtbaar in alle sessies van die cursus, maar de cursusbegeleider kan besluiten een resource voor een specifieke sessie te verbergen. In dat geval halen we de specifieke zichtbaarheid voor deze resource in deze sessie op en zien we dat die een zichtbaarheid van 0 heeft, zodat het item niet aan cursisten in deze sessie wordt getoond, terwijl het ontbreken van sessiespecifieke zichtbaarheid in andere sessies ervoor zorgt dat de resource de zichtbaarheid van de basiscursus gebruikt (en de resource aan cursisten wordt getoond).

## API Platform-integratie

ResourceNode wordt als API Platform-resource blootgesteld met beveiliging:

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

## Hoe inhoudsentiteiten koppelen

Cursusinhoudsentiteiten (CDocument, CQuiz, CLp, enz.) breiden `AbstractResource` uit of implementeren `ResourceInterface`, wat hen een `resourceNode`-relatie geeft:

```php
// In CDocument entity:
#[ORM\OneToOne(targetEntity: ResourceNode::class)]
private ResourceNode $resourceNode;
```

Wanneer u een CDocument aanmaakt, wordt automatisch een ResourceNode ernaast aangemaakt, wat uniform resourcebeheer biedt.

## Praktische implicaties

Bij het werken met cursusinhoud:

1. **Inhoud aanmaken** — Maak zowel de inhoudsentiteit ALS de bijbehorende ResourceNode aan
2. **Machtigingen controleren** — Gebruik de security voters van de ResourceNode
3. **Bestanden beheren** — Koppel bestanden via ResourceFile
4. **Zichtbaarheid sturen** — Maak ResourceLinks aan of wijzig ze
5. **Bomen opbouwen** — Gebruik de ouder-kindrelatie op ResourceNode voor mapstructuren (bijv. documentmappen)