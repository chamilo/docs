# Kryptering i hvile for brukerprofilfelt

Chamilo 3.1 kan valgfritt kryptere utvalgte personlige profilfelt før de lagres i databasen. Denne første implementeringen dekker **biografi**, **telefon** og **adresse**. Kryptering er **deaktivert som standard** og krever en privat krypteringsnøkkel. Den krypterer ikke all brukerinformasjon og erstatter ikke sikkerhet for disk, database, transport eller sikkerhetskopier.

## Før du aktiverer kryptering

Bare en plattformadministrator med servertilgang bør utføre utrullingen. Bekreft først at installasjonen inkluderer Chamilo 3.1-migreringene for kryptert feltlagring, ta en gjenopprettbar databasesikkerhetskopi, og planlegg en sikker sikkerhetskopi av krypteringsnøkkelen **atskilt fra databasen**. Test gjenopprettingsprosedyrene før du endrer produksjonsdata.

Nøkkelen lagres på `var/data-at-rest/master.key`, utenfor den offentlige webroten. Publiser den aldri, lim den inn i en støtteforespørsel, eller commit den til Git. Å miste den opprinnelige nøkkelen kan gjøre krypterte data uleselige. Ikke generer en erstatningsnøkkel hvis brukerdata allerede er kryptert.

## Initialiser nøkkelen

Kjør kommandoen én gang i forhåndsvisningsmodus:

```bash
php bin/console chamilo:security:initialize-at-rest-key
```

Hvis den rapporterer at det ikke finnes krypterte data og at nøkkelen kan klargjøres, initialiser den eksplisitt:

```bash
php bin/console chamilo:security:initialize-at-rest-key --apply
```

Hvis kommandoen rapporterer en eksisterende kompatibel nøkkel, utføres ingen erstatning. Hvis krypterte rader finnes, men nøkkelen mangler eller ikke stemmer overens, **stopp** og gjenopprett den opprinnelige nøkkelen.

## Velg beskyttede felt

Åpne **Administrasjon > Innstillinger > Sikkerhet** og velg **Biografi**, **Telefon** og/eller **Adresse** i innstillingen for krypterte brukerfelt. Velg bare feltene du har til hensikt å beskytte. Nye skriveoperasjoner til valgte felt bruker autentisert kryptering (libsodium XChaCha20-Poly1305); eldre klartekstposter forblir lesbare til de eksplisitt etterfylles.

## Inspiser og etterfyll eksisterende data

Etterfyllingskommandoene endrer ikke poster uten `--apply`. Foretrekk én QA-bruker før en bredere batch:

```bash
php bin/console chamilo:security:encrypt-user-biographies --user-id=102
php bin/console chamilo:security:encrypt-user-profile-fields --field=phone --user-id=102
php bin/console chamilo:security:encrypt-user-profile-fields --field=address --user-id=102
```

Etter å ha verifisert nøkkeltilgjengelighet, feltvalg, sikkerhetskopier og QA-kontoen, kjør en bevisst pilot:

```bash
php bin/console chamilo:security:encrypt-user-biographies --user-id=102 --apply
php bin/console chamilo:security:encrypt-user-profile-fields --field=phone --user-id=102 --apply
```

Erstatt `102` med en faktisk testbruker-ID. For større datasett, bruk det valgfrie argumentet `--batch-size` (1–500), gjennomgå kommandoutdata og applikasjonsatferd, og planlegg batcher i et vedlikeholdsvindu. Ikke kjør en etterfylling av hele databasen uten en testet tilbakerullingsstrategi.

## Operasjonelle begrensninger

- Dette er den første fasen av feltnivåkryptering, ikke full databasekryptering.
- Eldre direkte SQL-integrasjoner og eksporter vet kanskje ikke hvordan de skal lese krypterte verdier; verifiser dem før utrulling.
- En databasesikkerhetskopi **uten** en tilsvarende gjenopprettbar nøkkel er utilstrekkelig.
- Ikke logg rått feltinnhold eller inkluder nøkkelmateriale i diagnostikk.
- Å rulle tilbake applikasjonskode alene dekrypterer ikke lagrede verdier.

Se [Sikkerhetsinnstillinger](../platform-settings/security-settings.md) for generelle plattformsikkerhetsalternativer. Implementering: [Chamilo LMS PR #9491](https://github.com/chamilo/chamilo-lms/pull/9491).