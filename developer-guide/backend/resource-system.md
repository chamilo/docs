# Resource Systeem

Het resource systeem is een van de belangrijkste architecturale concepten in Chamilo 2.0. Het biedt een uniforme abstractie voor alle cursusinhoud — documenten, oefeningen, leerpaden, forumposts en meer.

## Kernconcept

Elk stuk cursusinhoud wordt vertegenwoordigd door een **ResourceNode**. Dit geeft alle inhoudstypen een gemeenschappelijke set van mogelijkheden:

* **Zichtbaarheidscontrole** — Tonen/verbergen voor leerlingen
* **Toegangscontrole** — Beveiligingsstemmers controleren rechten via de ResourceNode
* **Bestandsopslag** — Bijgevoegde bestanden worden opgeslagen via ResourceFile
* **Boomstructuur** — ResourceNodes vormen een boom (ouder-kind relaties)
* **Audittrail** — Maker, aanmaakdatum, wijzigingsregistratie

## Belangrijke Entiteiten

### ResourceNode (`src/CoreBundle/Entity/ResourceNode.php`)

De centrale entiteit. Elke inhoudsentiteit heeft een een-op-een relatie met een ResourceNode.

Belangrijke velden:

| Veld | Type | Beschrijving |
|-------|------|-------------|
| `id` | integer | Primaire sleutel |
| `uuid` | UUID v4 | Unieke identificator voor API-gebruik |
| `title` | string | Weergavetitel |
| `creator` | User | De gebruiker die deze resource heeft gemaakt |
| `resourceFile` | ResourceFile | Het bijgevoegde bestand (indien aanwezig) |
| `resourceType` | ResourceType | Het type resource (document, quiz, enz.) |
| `parent` | ResourceNode | Ouder in de resourceboom |
| `children` | Collection | Kind ResourceNodes |
| `resourceLinks` | Collection | Zichtbaarheids- en toegangslinks |

De boom gebruikt Gedmo's **materialized path** strategie voor efficiënte hiërarchische queries.

### ResourceFile (`src/CoreBundle/Entity/ResourceFile.php`)

Slaat de daadwerkelijke bestandsgegevens op voor een resource:

| Veld | Type | Beschrijving |
|-------|------|-------------|
| `id` | integer | Primaire sleutel |
| `title` | string | Originele bestandsnaam |
| `mimeType` | string | MIME-type |
| `originalName` | string | Originele uploadnaam |
| `size` | integer | Bestandsgrootte in bytes |
| `crop` | string | Bijsnijdgegevens (voor afbeeldingen) |

Bestandsopslag wordt afgehandeld door Flysystem, dus bestanden kunnen op lokale schijf, S3, Azure of GCS staan, afhankelijk van de configuratie.

### ResourceLink

Beheert zichtbaarheid en toegang per context. Er zijn 3 hoofdcontexttypen:

1. Cursus
2. Sessie
3. Groep (in een cursus)

De ResourceLink-entiteit weerspiegelt de combinatie van deze 3 contexttypen en stelt een zichtbaarheid vast voor die volledige context:

| Veld | Type | Beschrijving |
|-------|------|-------------|
| `course` | Course | Bij welke cursus de resource hoort |
| `session` | Session | Bij welke sessie (null voor basiscursus) |
| `group` | CGroup | Bij welke groep (null voor hele cursus) |
| `visibility` | integer | Zichtbaar, onzichtbaar of verwijderd |

Dit maakt het mogelijk dat dezelfde ResourceNode verschillende zichtbaarheid heeft in verschillende contexten (bijvoorbeeld zichtbaar in één sessie maar verborgen in een andere).

Dit wordt automatisch ingesteld bij gebruik van de interface en het beslissen, bijvoorbeeld, dat een resource een sessie-specifieke resource is die zichtbaar zal zijn voor alle groepen in een bepaalde cursus in een bepaalde sessie, maar onzichtbaar in de basiscursus of in een andere sessie.

Standaard zijn resources die zichtbaar zijn in een basiscursus ook zichtbaar in alle sessies van die cursus, maar de cursusbegeleider kan beslissen om een resource te verbergen voor een specifieke sessie. In dit geval zullen we de specifieke zichtbaarheid voor deze resource in deze sessie ophalen en zien dat deze een zichtbaarheid van 0 heeft, waardoor het item niet aan leerlingen in deze sessie wordt getoond, terwijl een gebrek aan sessie-specifieke zichtbaarheid in andere sessies ervoor zorgt dat de resource de zichtbaarheid van de basiscursus gebruikt (en de resource aan leerlingen wordt getoond).

## API Platform Integratie

ResourceNode wordt blootgesteld als een API Platform resource met beveiliging:

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

## Hoe Inhoudsentiteiten Verbinden

Cursusinhoudsentiteiten (CDocument, CQuiz, CLp, enz.) breiden `AbstractResource` uit of implementeren `ResourceInterface`, wat hen een `resourceNode` relatie geeft:

```php
// In CDocument entity:
#[ORM\OneToOne(targetEntity: ResourceNode::class)]
private ResourceNode $resourceNode;
```

Wanneer je een CDocument aanmaakt, wordt automatisch een ResourceNode naast deze aangemaakt, wat uniform resourcebeheer biedt.

## Praktische Implicaties

Bij het werken met cursusinhoud:

1. **Inhoud aanmaken** — Maak zowel de inhoudsentiteit ALS de bijbehorende ResourceNode aan
2. **Rechten controleren** — Gebruik de beveiligingsstemmers van de ResourceNode
3. **Bestanden beheren** — Voeg bestanden toe via ResourceFile
4. **Zichtbaarheid beheren** — Maak/wijzig ResourceLinks
5. **Boomstructuren bouwen** — Gebruik de ouder-kind relatie op ResourceNode voor mapstructuren (bijvoorbeeld documentmappen)