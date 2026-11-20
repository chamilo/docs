# Afslutning af fastlåste afsluttende elementer i læringsstier

En læringsstis sidste trin — siden "Tillykke", som indeholder certifikat- og kompetenceblokkene — tæller først som gennemført, når en kursist faktisk åbner den. En kursist, der gennemfører alle andre trin, men aldrig klikker videre til den sidste side, forbliver fastlåst lige under 100 % for evigt, og da berettigelse til præstationscertifikater (og tildeling af kompetencer) er betinget af, at læringsstien når 100 %, modtager de aldrig et certifikat eller en kompetence, som de ellers har optjent.

```bash
php bin/console chamilo:learning-path:complete-final-items [options]
```

For hver læringssti på platformen, hvis sidste trin er af typen **Final item**, kontrollerer kommandoen hver kursist med et igangværende forsøg (under 100 %), som har gennemført alle andre trin — på tværs af hvert kursus og hver session, der genbruger læringsstien. Hvis det er tilfældet, afslutter den det afsluttende element for dem, præcis som hvis de selv havde åbnet det: den registrerer den samme elementvisning, kører den samme genberegning af fremskridt og udløser den samme certifikatgenerering og kompetencetildeling, som et reelt besøg ville.

Ligesom `chamilo:gradebook:process-achievement-certificates` (se [Præstationscertifikater](achievement-certificates.md)) arbejder den i afgrænsede batches, understøtter en tørkørsel og kan genoptages sikkert, hvis den afbrydes — en kursist, hvis afsluttende element allerede er gennemført, berøres aldrig igen ved en senere kørsel.

## Indstillinger

| Option                 | Formål                                                                                                            |
| ----------------------- | -------------------------------------------------------------------------------------------------------------------- |
| `--dry-run`             | Evaluer og rapportér uden at gennemføre noget. Kør altid denne først.                                           |
| `--sender-id=<id>`      | ID for en aktiv platformadministrator, der bruges som ressourceopretter, når gennemførelse af et afsluttende element udløser certifikatgenerering eller kompetencetildeling. Påkrævet ved en reel (ikke-tør) kørsel. |
| `--limit=<n>`           | Maksimalt antal afsluttende elementer, der gennemføres (eller, ved tørkørsel, rapporteres) i én kørsel. `0` = ubegrænset. Standard `500`.              |
| `--scan-limit=<n>`      | Maksimalt antal kursistfremskridtsregistreringer, der scannes i én kørsel, på tværs af alle læringsstier. `0` = ubegrænset. Standard `5000`. |
| `--batch-size=<n>`      | Kursistfremskridtsregistreringer indlæst pr. databasebatch inden for én læringssti. Standard `50`.                       |
| `--lp-batch-size=<n>`   | Læringsstier indlæst pr. databasebatch. Standard `50`.                                                            |
| `--after-lp-id=<id>`    | Genoptag scanning efter dette læringssti-ID.                                                                       |

## Eksempler

Kør først en tørkørsel for hele platformen for at se, hvem der ville blive gennemført:

```bash
php bin/console chamilo:learning-path:complete-final-items --dry-run
```

Reel kørsel med administrator med ID 1 som ressourceopretter:

```bash
php bin/console chamilo:learning-path:complete-final-items --sender-id=1
```

Genoptag en afbrudt kørsel efter læringssti 480:

```bash
php bin/console chamilo:learning-path:complete-final-items --sender-id=1 --after-lp-id=480
```

## Afslutningskoder

Kommandoen afsluttes med en fejlstatus, hvis mindst ét afsluttende element faktisk ikke kunne gennemføres under en reel kørsel — oversigtstabellen angiver læringsstien, kursisten og årsagen; applikationsloggen indeholder den fulde undtagelse. En kursist, der korrekt er udelukket (det afsluttende element er allerede gennemført, eller et andet trin er stadig ufuldstændigt), er ikke en fejl og medfører aldrig en fejl-afslutningskode.

## Karakterbogsscore efter gennemførelse

Den score, der vises for en læringssti i karakterbogstabellen, gemmes aldrig — den beregnes live ud fra kursistens aktuelle fremskridt, hver gang siden indlæses, så den afspejler 100 % med det samme, uden yderligere trin.

En kursists **certifikat**, hvis et allerede fandtes, før de nåede 100 % (med en ældre, lavere score indlejret i det), får kun sin gemte score og gengivne HTML opdateret, hvis selve certifikatregenereringen lykkes, når denne kommando gennemfører deres afsluttende element — det samme kald, som et faktisk besøg ville udløse. Hvis certifikatgenerering mislykkes af en hvilken som helst årsag (se [Præstationscertifikater](achievement-certificates.md) for almindelige årsager, f.eks. filopbevaringstilladelser), når kursistens fremskridt stadig korrekt 100 %, og karakterbogstabellen viser det stadig — kun deres certifikat viser fortsat den gamle score, og da kommandoen aldrig genbesøger en kursist, der allerede er på 100 %, forsøger den ikke igen ved en senere kørsel. Regenerér certifikatet manuelt (handlingen **Generate** på certifikatlisten), når det underliggende problem er løst.

`--sender-id` findes specifikt for at undgå en almindelig årsag til den fejl: gennemførelse af et afsluttende element uden for en reel forespørgsel har ingen indlogget bruger, som certifikatressourcen kan registrere som sin opretter, og genereringen mislykkes helt uden en sådan.