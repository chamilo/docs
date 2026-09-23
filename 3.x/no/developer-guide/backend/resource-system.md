# Ressurssystem

Ressurssystemet er et av de viktigste arkitektoniske konseptene i Chamilo 3.0. Det gir en enhetlig abstraksjon for alt kursinnhold — dokumenter, øvelser, læringsstier, foruminnlegg og mer.

## Kjernekonsept

Hvert stykke kursinnhold representeres av en **ResourceNode**. Dette gir alle innholdstyper et felles sett med evner:

* **Synlighetskontroll** — Vis/skjul for lærende
* **Tilgangskontroll** — Sikkerhetsvelgere sjekker tillatelser via ResourceNode
* **Fillagring** — Vedlagte filer lagres via ResourceFile
* **Trestruktur** — ResourceNodes danner et tre (foreldre-barn-relasjoner)
* **Revisjonsspor** — Oppretter, opprettelsesdato, sporingsendringer

## Nøkkelentiteter

### ResourceNode (`src/CoreBundle/Entity/ResourceNode.php`)

Den sentrale entiteten. Hver innholdsentitet har et én-til-én-forhold til en ResourceNode.

Nøkkelfelt:

| Felt | Type | Beskrivelse |
|-------|------|-------------|
| `id` | integer | Primærnøkkel |
| `uuid` | UUID v4 | Unik identifikator for API-bruk |
| `title` | string | Visningstittel |
| `creator` | User | Brukeren som opprettet denne ressursen |
| `resourceFile` | ResourceFile | Den vedlagte filen (hvis noen) |
| `resourceType` | ResourceType | Ressurstypen (dokument, quiz, osv.) |
| `parent` | ResourceNode | Forelder i ressurstreet |
| `children` | Collection | Underordnede ResourceNodes |
| `resourceLinks` | Collection | Synlighets- og tilgangslenker |

Treet bruker Gedmos **materialized path**-strategi for effektive hierarkiske spørringer.

### ResourceFile (`src/CoreBundle/Entity/ResourceFile.php`)

Lagrer de faktiske fildataene for en ressurs:

| Felt | Type | Beskrivelse |
|-------|------|-------------|
| `id` | integer | Primærnøkkel |
| `title` | string | Opprinnelig filnavn |
| `mimeType` | string | MIME-type |
| `originalName` | string | Opprinnelig opplastingsnavn |
| `size` | integer | Filstørrelse i byte |
| `crop` | string | Beskjæringsdata (for bilder) |

Fillagring håndteres av Flysystem, slik at filer kan ligge på lokal disk, S3, Azure eller GCS avhengig av konfigurasjon.

### ResourceLink

Styrer synlighet og tilgang per kontekst. Det finnes 3 hovedkonteksttyper:

1. Course
2. Session
3. Group (i et kurs)

ResourceLink-entiteten gjenspeiler dermed kombinasjonen av disse 3 konteksttypene og etablerer en synlighet for den komplette konteksten:

| Felt | Type | Beskrivelse |
|-------|------|-------------|
| `course` | Course | Hvilket kurs ressursen tilhører |
| `session` | Session | Hvilken økt (null for basiskurs) |
| `group` | CGroup | Hvilken gruppe (null for hele kurset) |
| `visibility` | integer | Synlig, usynlig eller slettet |

Dette gjør at samme ResourceNode kan ha ulik synlighet i ulike kontekster (f.eks. synlig i én økt, men skjult i en annen).

Dette settes automatisk når grensesnittet brukes og man for eksempel beslutter at en ressurs er en øktspesifikk ressurs som skal være synlig for alle grupper i et gitt kurs i en gitt økt, men usynlig i basiskurset eller i en annen økt.

Som standard er ressurser som er synlige i et basiskurs også synlige i alle økter av det kurset, men kursveilederen kan velge å skjule en ressurs fra en spesifikk økt. I så fall henter vi den spesifikke synligheten for denne ressursen i denne økten og ser at den har synlighet 0, slik at elementet ikke vises for lærende i denne økten, mens manglende øktspesifikk synlighet i andre økter gjør at ressursen bruker synligheten til basiskurset (og ressursen vises for lærende).

## API Platform-integrasjon

ResourceNode eksponeres som en API Platform-ressurs med sikkerhet:

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

## Hvordan innholdsentiteter kobles

Kursinnholdsentiteter (CDocument, CQuiz, CLp, osv.) utvider `AbstractResource` eller implementerer `ResourceInterface`, som gir dem et `resourceNode`-forhold:

```php
// In CDocument entity:
#[ORM\OneToOne(targetEntity: ResourceNode::class)]
private ResourceNode $resourceNode;
```

Når du oppretter et CDocument, opprettes automatisk en ResourceNode sammen med det, som gir enhetlig ressursadministrasjon.

## Praktiske implikasjoner

Når du arbeider med kursinnhold:

1. **Opprette innhold** — Opprett både innholdsentiteten OG dens ResourceNode
2. **Sjekke tillatelser** — Bruk ResourceNodes sikkerhetsvelgere
3. **Administrere filer** — Knytt filer via ResourceFile
4. **Styre synlighet** — Opprett/endre ResourceLinks
5. **Bygge trær** — Bruk foreldre-barn-relasjonen på ResourceNode for mappestrukturer (f.eks. dokumentmapper)