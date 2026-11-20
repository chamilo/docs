# Versleuteling in rust voor gebruikersprofielvelden

Chamilo 3.1 kan optioneel geselecteerde persoonlijke profielvelden versleutelen voordat ze in de database worden opgeslagen. Deze eerste implementatie dekt **biografie**, **telefoon** en **adres**. Versleuteling is **standaard uitgeschakeld** en vereist een privésleutel voor versleuteling. Het versleutelt niet alle gebruikersinformatie en vervangt geen beveiliging van schijf, database, transport of back-ups.

## Voordat u versleuteling inschakelt

Alleen een platformbeheerder met servertoegang mag de uitrol uitvoeren. Bevestig eerst dat de installatie de Chamilo 3.1-migraties voor versleutelde veldopslag bevat, maak een herstelbare databaseback-up en plan een beveiligde back-up van de versleutelingssleutel **gescheiden van de database**. Test herstelprocedures voordat u productiegegevens wijzigt.

De sleutel wordt opgeslagen op `var/data-at-rest/master.key`, buiten de openbare webroot. Publiceer deze nooit, plak deze niet in een ondersteuningsverzoek en commit deze niet naar Git. Verlies van de oorspronkelijke sleutel kan versleutelde gegevens onleesbaar maken. Genereer geen vervangende sleutel als er al gebruikersgegevens zijn versleuteld.

## De sleutel initialiseren

Voer de opdracht eenmaal uit in voorbeeldmodus:

```bash
php bin/console chamilo:security:initialize-at-rest-key
```

Als wordt gemeld dat er geen versleutelde gegevens bestaan en de sleutel kan worden ingericht, initialiseer deze dan expliciet:

```bash
php bin/console chamilo:security:initialize-at-rest-key --apply
```

Als de opdracht een bestaande compatibele sleutel meldt, wordt geen vervanging uitgevoerd. Als er versleutelde rijen bestaan maar de sleutel ontbreekt of niet overeenkomt, **stop** dan en herstel de oorspronkelijke sleutel.

## Beveiligde velden kiezen

Open **Beheer > Instellingen > Beveiliging** en selecteer **Biografie**, **Telefoon** en/of **Adres** in de instelling voor versleutelde gebruikersvelden. Selecteer alleen de velden die u wilt beschermen. Nieuwe schrijfbewerkingen naar geselecteerde velden gebruiken geauthenticeerde versleuteling (libsodium XChaCha20-Poly1305); bestaande records in leesbare tekst blijven leesbaar totdat ze expliciet worden aangevuld.

## Bestaande gegevens inspecteren en aanvullen

De aanvullingsopdrachten wijzigen geen records zonder `--apply`. Geef de voorkeur aan één QA-gebruiker vóór een bredere batch:

```bash
php bin/console chamilo:security:encrypt-user-biographies --user-id=102
php bin/console chamilo:security:encrypt-user-profile-fields --field=phone --user-id=102
php bin/console chamilo:security:encrypt-user-profile-fields --field=address --user-id=102
```

Nadat u de beschikbaarheid van de sleutel, de veldselectie, de back-ups en het QA-account hebt gecontroleerd, voert u een bewuste pilot uit:

```bash
php bin/console chamilo:security:encrypt-user-biographies --user-id=102 --apply
php bin/console chamilo:security:encrypt-user-profile-fields --field=phone --user-id=102 --apply
```

Vervang `102` door een werkelijke testgebruikers-ID. Gebruik voor grotere datasets het optionele argument `--batch-size` (1–500), controleer de opdrachtuitvoer en het toepassingsgedrag, en plan batches tijdens een onderhoudsvenster. Voer geen aanvulling van de volledige database uit zonder een geteste terugdraaistrategie.

## Operationele beperkingen

- Dit is de eerste fase van versleuteling op veldniveau, geen volledige databaseversleuteling.
- Oudere directe SQL-integraties en exports weten mogelijk niet hoe versleutelde waarden moeten worden gelezen; controleer deze vóór de uitrol.
- Een databaseback-up **zonder** een bijbehorende herstelbare sleutel is onvoldoende.
- Log geen ruwe veldinhoud en neem geen sleutelmateriaal op in diagnostiek.
- Alleen toepassingscode terugdraaien ontsleutelt opgeslagen waarden niet.

Zie [Beveiligingsinstellingen](../platform-settings/security-settings.md) voor algemene beveiligingsopties van het platform. Implementatie: [Chamilo LMS PR #9491](https://github.com/chamilo/chamilo-lms/pull/9491).