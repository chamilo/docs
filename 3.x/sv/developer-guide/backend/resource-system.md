# Resurssystem

Resurssystemet är ett av de viktigaste arkitektoniska koncepten i Chamilo 3.0. Det tillhandahåller en enhetlig abstraktion för allt kursinnehåll — dokument, övningar, lärstigar, foruminlägg och mer.

## Kärnkoncept

Varje del av kursinnehåll representeras av en **ResourceNode**. Detta ger alla innehållstyper en gemensam uppsättning funktioner:

* **Synlighetsstyrning** — Visa/dölj för deltagare
* **Åtkomststyrning** — Säkerhetsväljare kontrollerar behörigheter via ResourceNode
* **Fillagring** — Bifogade filer lagras via ResourceFile
* **Trädstruktur** — ResourceNodes bildar ett träd (förälder–barn-relationer)
* **Revisionshistorik** — Skapare, skapelsedatum, spårning av ändringar

## Nyckelentiteter

### ResourceNode (`src/CoreBundle/Entity/ResourceNode.php`)

Den centrala entiteten. Varje innehållsentitet har en ett-till-ett-relation med en ResourceNode.

Nyckelfält:

| Field | Type | Description |
|-------|------|-------------|
| `id` | integer | Primärnyckel |
| `uuid` | UUID v4 | Unik identifierare för API-användning |
| `title` | string | Visningstitel |
| `creator` | User | Användaren som skapade denna resurs |
| `resourceFile` | ResourceFile | Den bifogade filen (om någon) |
| `resourceType` | ResourceType | Resurstypen (dokument, quiz, etc.) |
| `parent` | ResourceNode | Förälder i resursträdet |
| `children` | Collection | Underordnade ResourceNodes |
| `resourceLinks` | Collection | Länkar för synlighet och åtkomst |

Trädet använder Gedmos strategi **materialized path** för effektiva hierarkiska frågor.

### ResourceFile (`src/CoreBundle/Entity/ResourceFile.php`)

Lagrar den faktiska fildatan för en resurs:

| Field | Type | Description |
|-------|------|-------------|
| `id` | integer | Primärnyckel |
| `title` | string | Ursprungligt filnamn |
| `mimeType` | string | MIME-typ |
| `originalName` | string | Ursprungligt uppladdningsnamn |
| `size` | integer | Filstorlek i byte |
| `crop` | string | Beskärningsdata (för bilder) |

Fillagring hanteras av Flysystem, så filer kan ligga på lokal disk, S3, Azure eller GCS beroende på konfiguration.

### ResourceLink

Styr synlighet och åtkomst per kontext. Det finns 3 huvudsakliga kontexttyper:

1. Course
2. Session
3. Group (i en kurs)

Så entiteten ResourceLink återspeglar kombinationen av dessa 3 kontexttyper och fastställer en synlighet för den fullständiga kontexten:

| Field | Type | Description |
|-------|------|-------------|
| `course` | Course | Vilken kurs resursen tillhör |
| `session` | Session | Vilken session (null för baskurs) |
| `group` | CGroup | Vilken grupp (null för hela kursen) |
| `visibility` | integer | Synlig, osynlig eller raderad |

Detta gör att samma ResourceNode kan ha olika synlighet i olika kontexter (t.ex. synlig i en session men dold i en annan).

Detta sätts automatiskt när gränssnittet används och man till exempel beslutar att en resurs är en sessionsspecifik resurs som ska vara synlig för alla grupper i en given kurs i en given session, men osynlig i baskursen eller i en annan session.

Som standard är resurser som är synliga i en baskurs också synliga i alla sessioner för den kursen, men kursens handledare kan besluta att dölja en resurs från en specifik session. I det fallet hämtar vi den specifika synligheten för denna resurs i denna session och ser att den har synlighet 0, så objektet visas inte för deltagare i denna session, medan avsaknad av sessionsspecifik synlighet i andra sessioner gör att resursen använder baskursens synlighet (och resursen visas för deltagare).

## API Platform-integration

ResourceNode exponeras som en API Platform-resurs med säkerhet:

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

## Hur innehållsentiteter kopplas

Kursinnehållsentiteter (CDocument, CQuiz, CLp, etc.) utökar `AbstractResource` eller implementerar `ResourceInterface`, vilket ger dem en `resourceNode`-relation:

```php
// In CDocument entity:
#[ORM\OneToOne(targetEntity: ResourceNode::class)]
private ResourceNode $resourceNode;
```

När du skapar en CDocument skapas en ResourceNode automatiskt tillsammans med den, vilket ger enhetlig resurshantering.

## Praktiska konsekvenser

När du arbetar med kursinnehåll:

1. **Skapa innehåll** — Skapa både innehållsentiteten OCH dess ResourceNode
2. **Kontrollera behörigheter** — Använd ResourceNodes säkerhetsväljare
3. **Hantera filer** — Bifoga filer via ResourceFile
4. **Styra synlighet** — Skapa/ändra ResourceLinks
5. **Bygga träd** — Använd förälder–barn-relationen på ResourceNode för mappstrukturer (t.ex. dokumentmappar)