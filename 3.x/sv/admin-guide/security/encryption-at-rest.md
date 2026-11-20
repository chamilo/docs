# Kryptering i vila för användarprofilfält

Chamilo 3.1 kan valfritt kryptera utvalda personliga profilfält innan de lagras i databasen. Denna första implementation omfattar **biografi**, **telefon** och **adress**. Kryptering är **inaktiverad som standard** och kräver en privat krypteringsnyckel. Den krypterar inte all användarinformation och ersätter inte säkerhet för disk, databas, transport eller säkerhetskopior.

## Innan kryptering aktiveras

Endast en plattformsadministratör med serveråtkomst bör genomföra utrullningen. Bekräfta först att installationen innehåller Chamilo 3.1-migreringarna för krypterad fältlagring, ta en återställningsbar databassäkerhetskopia och planera en säker säkerhetskopia av krypteringsnyckeln **separat från databasen**. Testa återställningsprocedurer innan produktionsdata ändras.

Nyckeln lagras i `var/data-at-rest/master.key`, utanför den publika webbroten. Publicera den aldrig, klistra inte in den i en supportförfrågan och committa den inte till Git. Om den ursprungliga nyckeln förloras kan krypterade data bli oläsbara. Generera inte en ersättningsnyckel om användardata redan är krypterade.

## Initiera nyckeln

Kör kommandot en gång i förhandsgranskningsläge:

```bash
php bin/console chamilo:security:initialize-at-rest-key
```

Om det rapporterar att inga krypterade data finns och att nyckeln kan provisioneras, initiera den uttryckligen:

```bash
php bin/console chamilo:security:initialize-at-rest-key --apply
```

Om kommandot rapporterar en befintlig kompatibel nyckel utförs ingen ersättning. Om krypterade rader finns men nyckeln saknas eller inte stämmer överens, **avbryt** och återställ den ursprungliga nyckeln.

## Välj skyddade fält

Öppna **Administration > Inställningar > Säkerhet** och välj **Biografi**, **Telefon** och/eller **Adress** i inställningen för krypterade användarfält. Välj endast de fält du avser att skydda. Nya skrivningar till valda fält använder autentiserad kryptering (libsodium XChaCha20-Poly1305); äldre klartextposter förblir läsbara tills de uttryckligen fylls på i efterhand.

## Granska och fyll på befintliga data

Påfyllningskommandona ändrar inte poster utan `--apply`. Föredra en enskild QA-användare före en större batch:

```bash
php bin/console chamilo:security:encrypt-user-biographies --user-id=102
php bin/console chamilo:security:encrypt-user-profile-fields --field=phone --user-id=102
php bin/console chamilo:security:encrypt-user-profile-fields --field=address --user-id=102
```

När nyckeltillgänglighet, fältval, säkerhetskopior och QA-kontot har verifierats, kör en avsiktlig pilot:

```bash
php bin/console chamilo:security:encrypt-user-biographies --user-id=102 --apply
php bin/console chamilo:security:encrypt-user-profile-fields --field=phone --user-id=102 --apply
```

Ersätt `102` med ett faktiskt testanvändar-ID. För större datamängder, använd det valfria argumentet `--batch-size` (1–500), granska kommandoutdata och applikationsbeteende, och planera batchar under ett underhållsfönster. Kör inte en påfyllning av hela databasen utan en testad återställningsstrategi.

## Operativa begränsningar

- Detta är den första fasen av kryptering på fältnivå, inte fullständig databaskryptering.
- Äldre direkta SQL-integrationer och exporter kanske inte kan läsa krypterade värden; verifiera dem före utrullning.
- En databassäkerhetskopia **utan** en motsvarande återställningsbar nyckel är otillräcklig.
- Logga inte rått fältinnehåll och inkludera inte nyckelmaterial i diagnostik.
- Att enbart återställa applikationskod dekrypterar inte lagrade värden.

Se [Säkerhetsinställningar](../platform-settings/security-settings.md) för allmänna säkerhetsalternativ för plattformen. Implementation: [Chamilo LMS PR #9491](https://github.com/chamilo/chamilo-lms/pull/9491).