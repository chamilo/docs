# Ressourcesystem

Ressourcesystemet er et af de vigtigste arkitektoniske begreber i Chamilo 3.0. Det giver en samlet abstraktion for alt kursusindhold — dokumenter, øvelser, læringsstier, forumindlæg og mere.

## Kernebegreb

Hvert stykke kursusindhold repræsenteres af en **ResourceNode**. Dette giver alle indholdstyper et fælles sæt af kapaciteter:

* **Synlighedsstyring** — Vis/skjul for kursister
* **Adgangskontrol** — Sikkerhedsvoters tjekker tilladelser via ResourceNode
* **Fillagring** — Vedhæftede filer lagres via ResourceFile
* **Træstruktur** — ResourceNodes danner et træ (forældre-barn-relationer)
* **Revisionsspor** — Opretter, oprettelsesdato, ændringssporing

## Nøgleentiteter

### ResourceNode (`src/CoreBundle/Entity/ResourceNode.php`)

Den centrale entitet. Hver indholdsentitet har et én-til-én-forhold til en ResourceNode.

Nøglefelter:

| Felt | Type | Beskrivelse |
|-------|------|-------------|
| `id` | integer | Primærnøgle |
| `uuid` | UUID v4 | Unik identifikator til API-brug |
| `title` | string | Visningstitel |
| `creator` | User | Brugeren, der oprettede denne ressource |
| `resourceFile` | ResourceFile | Den vedhæftede fil (hvis nogen) |
| `resourceType` | ResourceType | Ressourcetypen (dokument, quiz osv.) |
| `parent` | ResourceNode | Forælder i ressourcetræet |
| `children` | Collection | Underordnede ResourceNodes |
| `resourceLinks` | Collection | Synligheds- og adgangslinks |

Træet bruger Gedmos **materialized path**-strategi til effektive hierarkiske forespørgsler.

### ResourceFile (`src/CoreBundle/Entity/ResourceFile.php`)

Lagrer de faktiske fildata for en ressource:

| Felt | Type | Beskrivelse |
|-------|------|-------------|
| `id` | integer | Primærnøgle |
| `title` | string | Oprindeligt filnavn |
| `mimeType` | string | MIME-type |
| `originalName` | string | Oprindeligt uploadnavn |
| `size` | integer | Filstørrelse i bytes |
| `crop` | string | Beskæringsdata (for billeder) |

Fillagring håndteres af Flysystem, så filer kan ligge på lokal disk, S3, Azure eller GCS afhængigt af konfigurationen.

### ResourceLink

Styrer synlighed og adgang pr. kontekst. Der er 3 primære konteksttyper:

1. Course
2. Session
3. Group (i et kursus)

Så ResourceLink-entiteten afspejler kombinationen af disse 3 konteksttyper og fastlægger en synlighed for den samlede kontekst:

| Felt | Type | Beskrivelse |
|-------|------|-------------|
| `course` | Course | Hvilket kursus ressourcen tilhører |
| `session` | Session | Hvilken session (null for basiskursus) |
| `group` | CGroup | Hvilken gruppe (null for hele kurset) |
| `visibility` | integer | Synlig, usynlig eller slettet |

Dette gør det muligt for den samme ResourceNode at have forskellig synlighed i forskellige kontekster (f.eks. synlig i én session, men skjult i en anden).

Dette sættes automatisk, når man bruger grænsefladen og f.eks. beslutter, at en ressource er en sessionsspecifik ressource, som vil være synlig for alle grupper i et givet kursus i en given session, men usynlig i basiskurset eller i en anden session.

Som standard er ressourcer, der er synlige i et basiskursus, også synlige i alle sessioner for det kursus, men kursustutoren kan beslutte at skjule en ressource fra en specifik session. I så fald henter vi den specifikke synlighed for denne ressource i denne session og ser, at den har en synlighed på 0, så elementet vises ikke for kursister i denne session, mens manglende sessionsspecifik synlighed i andre sessioner får ressourcen til at bruge synligheden fra basiskurset (og ressourcen vises for kursister).

## API Platform-integration

ResourceNode eksponeres som en API Platform-ressource med sikkerhed:

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

## Hvordan indholdsentiteter forbindes

Kursusindholdsentiteter (CDocument, CQuiz, CLp osv.) udvider `AbstractResource` eller implementerer `ResourceInterface`, hvilket giver dem et `resourceNode`-forhold:

```php
// In CDocument entity:
#[ORM\OneToOne(targetEntity: ResourceNode::class)]
private ResourceNode $resourceNode;
```

Når du opretter et CDocument, oprettes der automatisk en ResourceNode sammen med det, hvilket giver samlet ressourcestyring.

## Praktiske implikationer

Når du arbejder med kursusindhold:

1. **Oprettelse af indhold** — Opret både indholdsentiteten OG dens ResourceNode
2. **Kontrol af tilladelser** — Brug ResourceNodes sikkerhedsvoters
3. **Håndtering af filer** — Vedhæft filer via ResourceFile
4. **Styring af synlighed** — Opret/ændr ResourceLinks
5. **Opbygning af træer** — Brug forældre-barn-relationen på ResourceNode til mappestrukturer (f.eks. dokumentmapper)