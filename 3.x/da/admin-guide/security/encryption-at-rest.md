# Kryptering i hvile for brugerprofilfelter

Chamilo 3.1 kan valgfrit kryptere udvalgte personlige profilfelter, før de gemmes i databasen. Denne første implementering dækker **biografi**, **telefon** og **adresse**. Kryptering er **deaktiveret som standard** og kræver en privat krypteringsnøgle. Den krypterer ikke alle brugeroplysninger og erstatter ikke sikkerhed for disk, database, transport eller sikkerhedskopiering.

## Før kryptering aktiveres

Kun en platformsadministrator med serveradgang bør gennemføre udrulningen. Bekræft først, at installationen indeholder Chamilo 3.1-migreringerne til krypteret feltlagring, tag en gendannelig databasesikkerhedskopi, og planlæg en sikker sikkerhedskopi af krypteringsnøglen **adskilt fra databasen**. Test gendannelsesprocedurerne, før produktionsdata ændres.

Nøglen gemmes i `var/data-at-rest/master.key`, uden for den offentlige webrod. Offentliggør den aldrig, indsæt den ikke i en supportanmodning, og commit den ikke til Git. Hvis den oprindelige nøgle mistes, kan krypterede data blive ulæselige. Generer ikke en erstatningsnøgle, hvis brugerdata allerede er krypteret.

## Initialiser nøglen

Kør kommandoen én gang i forhåndsvisningstilstand:

```bash
php bin/console chamilo:security:initialize-at-rest-key
```

Hvis den rapporterer, at der ikke findes krypterede data, og at nøglen kan klargøres, skal den initialiseres eksplicit:

```bash
php bin/console chamilo:security:initialize-at-rest-key --apply
```

Hvis kommandoen rapporterer en eksisterende kompatibel nøgle, foretages der ingen erstatning. Hvis der findes krypterede rækker, men nøglen mangler eller ikke stemmer overens, skal du **stoppe** og gendanne den oprindelige nøgle.

## Vælg beskyttede felter

Åbn **Administration > Indstillinger > Sikkerhed**, og vælg **Biografi**, **Telefon** og/eller **Adresse** i indstillingen for krypterede brugerfelter. Vælg kun de felter, du har til hensigt at beskytte. Nye skrivninger til de valgte felter bruger autentificeret kryptering (libsodium XChaCha20-Poly1305); ældre klartekstposter forbliver læsbare, indtil de eksplicit efterfyldes.

## Inspicer og efterfyld eksisterende data

Efterfyldningskommandoerne ændrer ikke poster uden `--apply`. Foretræk en enkelt QA-bruger før et bredere batch:

```bash
php bin/console chamilo:security:encrypt-user-biographies --user-id=102
php bin/console chamilo:security:encrypt-user-profile-fields --field=phone --user-id=102
php bin/console chamilo:security:encrypt-user-profile-fields --field=address --user-id=102
```

Når nøgletilgængelighed, feltvalg, sikkerhedskopier og QA-kontoen er verificeret, skal du køre et bevidst pilotforløb:

```bash
php bin/console chamilo:security:encrypt-user-biographies --user-id=102 --apply
php bin/console chamilo:security:encrypt-user-profile-fields --field=phone --user-id=102 --apply
```

Erstat `102` med et faktisk testbruger-id. For større datasæt skal du bruge det valgfrie argument `--batch-size` (1–500), gennemgå kommandooutput og applikationsadfærd, og planlæg batches i et vedligeholdelsesvindue. Kør ikke en efterfyldning af hele databasen uden en testet tilbagerulningsstrategi.

## Driftsmæssige begrænsninger

- Dette er den første fase af kryptering på feltniveau, ikke fuld databasekryptering.
- Ældre direkte SQL-integrationer og eksporter ved muligvis ikke, hvordan krypterede værdier læses; verificer dem før udrulning.
- En databasesikkerhedskopi **uden** en tilsvarende gendannelig nøgle er utilstrækkelig.
- Log ikke rå feltindhold, og medtag ikke nøglemateriale i diagnostik.
- Tilbagerulning af applikationskode alene dekrypterer ikke gemte værdier.

Se [Sikkerhedsindstillinger](../platform-settings/security-settings.md) for generelle platformsikkerhedsindstillinger. Implementering: [Chamilo LMS PR #9491](https://github.com/chamilo/chamilo-lms/pull/9491).