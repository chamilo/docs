# Aankondigingen

Met het aankondigingengereedschap kunt u berichten sturen naar alle cursisten die voor uw cursus zijn ingeschreven, of naar specifieke personen of groepen.

Berichten die via aankondigingen worden verzonden, worden zowel per e-mail *als* naar de Chamilo-inbox van de cursisten gestuurd.

## Een aankondiging maken

1. Open het gereedschap **Aankondigingen** <img src="../../.gitbook/assets/icons/mdi-bullhorn.svg" alt="Aankondigingen" data-size="line"> vanaf de startpagina van de cursus
2. Klik opnieuw op het pictogram **Een aankondiging toevoegen** <img src="../../.gitbook/assets/icons/mdi-bullhorn.svg" alt="Aankondigingen" data-size="line">
3. Vul in:
   * **Ontvangers** — Kies wie de aankondiging ontvangt:
     * Alle ingeschreven cursisten
     * Specifieke cursisten
     * Specifieke groepen
   * **Onderwerp** — Een onderwerpregel voor de aankondiging
   * **Beschrijving** — De berichttekst (ondersteunt opgemaakte tekst met opmaak, links en afbeeldingen)
   * **Bijlage** — Een optionele bijlage die samen met de e-mail wordt verzonden
   * **Verzendopties** — Aankondigingen worden standaard per e-mail verzonden, maar u kunt ook kiezen (als u de rechten hebt) om ze te verzenden via alle sessies die deze cursus bevatten, een kopie naar uzelf te sturen of deze aankondiging te koppelen aan een agenda-item van de cursus.
     * Wanneer u **Gebeurtenis toevoegen aan cursuskalender** aanvinkt, stelt u de **Begindatum** en **Einddatum** van de gebeurtenis in. Elke klik op **Herinnering toevoegen** voegt een regel toe waarop u instelt hoe lang vóór de gebeurtenis de herinnering wordt verzonden (in minuten, uren of dagen). De herinneringen kunnen later worden gewijzigd door de gebeurtenis in de cursusagenda te bewerken.
4. Opslaan

Met de knop **Tags** kunt u een reeks markeringen aangeven die dynamisch worden vervangen in de **Inhoud** van de aankondiging. Deze zijn vrij intuïtief, dus we laten u raden wat ze doen.

De knop **Voorbeeld** is niet erg intuïtief: hiermee kunt u zien naar wie deze aankondiging wordt verzonden. Dit dient als bevestiging van de selectie van ontvangers die u hierboven hebt gemaakt.

## Aankondigingen beheren

* **Bewerken** <img src="../../.gitbook/assets/icons/mdi-pencil.svg" alt="Bewerken" data-size="line"> — Een bestaande aankondiging wijzigen
* **Verwijderen** <img src="../../.gitbook/assets/icons/mdi-delete.svg" alt="Verwijderen" data-size="line"> — Een aankondiging verwijderen
* **Zichtbaarheid** <img src="../../.gitbook/assets/icons/mdi-eye.svg" alt="Zichtbaarheid" data-size="line"> — Aankondigingen verbergen of tonen

Aankondigingen worden in omgekeerde chronologische volgorde weergegeven (nieuwste eerst).

## Configuratie van massamailbezorging

Beheerders kunnen een afzonderlijk mailtransport configureren voor aankondigingsuitzendingen van cursussen en het platform. Wanneer dit is ingeschakeld, beïnvloedt dit hoe aankondigings-e-mails worden verzonden; het wijzigt niet de aankondigingseditor, de keuzes van ontvangers of het normale transport dat wordt gebruikt voor individuele meldingen.

Als de bezorging verschilt tussen individuele berichten en aankondigingen, vraag dan een platformbeheerder om **Beheer > Configuratie-instellingen > E-mail > DSN voor massamailing** (`mail.mailer_dsn_massmailing`) te controleren. Als deze optionele instelling leeg is, gebruiken aankondigingen het hoofdtransport voor e-mail. Zie [PR #9406 over massamailtransport](https://github.com/chamilo/chamilo-lms/pull/9406).

## Tips

* **Welkomstbericht** — Maak aan het begin van de cursus een aankondiging om cursisten te verwelkomen en oriëntatie te bieden
* **E-mailbezorging gebruiken** — Schakel voor tijdkritische aankondigingen de e-mailoptie in, zodat cursisten het bericht ontvangen ook als ze op dat moment niet op het platform zijn aangemeld
* **Gerichte aankondigingen** — Stuur specifieke aankondigingen naar groepen of personen wanneer het bericht niet relevant is voor de hele klas