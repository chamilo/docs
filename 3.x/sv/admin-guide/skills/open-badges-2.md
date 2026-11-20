# Utfärdande och verifiering av Open Badges 2.0

Chamilo 3.1 kan publicera **Open Badges 2.0**-meriter för förvärvade färdigheter, inklusive en badge-bild som bär en inbakad assertion i PNG-metadata. Badge-verifiering använder offentliga endpoints för badge, assertion och utfärdare.

## Konfigurera utfärdaren och färdigheterna

1. Ange plattformens **institutionsnamn** och en giltig **e-postadress till administratören**; båda krävs av utfärdarprofilen.
2. Konfigurera färdigheten med en titel, en beskrivning och badge-kriterier.
3. Bifoga en giltig PNG-badge-bild där det är lämpligt. Chamilo kan också använda sin standardbadge-bild om färdigheten saknar en anpassad resurs.
4. Tilldela eller validera att den lärande har förvärvat färdigheten via det vanliga arbetsflödet för färdigheter.

Meriter beror på relationen till den förvärvade färdigheten. En assertion för en återkallad eller inte längre förvärvad färdighet rapporteras som återkallad. Färdighets- och badge-resurser är avgränsade till rätt åtkomst-URL.

## Offentliga verifieringsdata

Varje utfärdande har en hostad assertion. De relaterade URL:erna härleds från applikationens offentliga rot och omfattar:

- `main/skills/assertion.php?issue=<issue-id>` — JSON-assertion för ett specifikt utfärdande av en färdighet.
- `main/skills/class.php?id=<skill-id>` — metadata för badge-klassen, inklusive kriterier och referens till utfärdaren.
- `main/skills/issuer.php` — profil för den utfärdande institutionen.
- `main/skills/image.php?id=<skill-id>` — badge-bildresurs.

De exakt genererade URL:erna beror på installationens offentliga bassökväg. Assertionen innehåller en saltad hash av mottagarens e-postadress i stället för att publicera e-postadressen i klartext, och identifierar utfärdaren och den förvärvade färdigheten. Badge-PNG-filen kan inkludera assertionen i en `openbadges`-iTXt-chunk.

## Validera ett utfärdat badge

Öppna de hostade endpoints för assertion, badge-klass och utfärdare utan en inloggad session. De ska returnera en konsekvent länkad merit. Ladda ned den utfärdade PNG-filen via färdighetens stödda exportflöde och verifiera att dess inbäddade assertion överensstämmer med den hostade representationen. Om färdigheten är återkallad, kontrollera att verifieringen återspeglar dess återkallade status.

En PNG med enbart visuellt badge-motiv bevisar **inte** en giltig merit. Blanda inte ihop utfärdande av Open Badges 2.0 med orelaterad certifikat- eller signerad PDF-funktionalitet.

Se [Hantera färdigheter](managing-skills.md) och [Verifiering av signerade certifikat](../maintenance/signed-certificate-verification.md). Implementering: [PR #9346](https://github.com/chamilo/chamilo-lms/pull/9346).