# Säker export av konfigurationsdiagnostik

Chamilo 3.1 tillhandahåller en nedladdningsbar JSON-rapport för att diagnostisera konfigurationsproblem utan att avsiktligt exportera konfidentiella inställningsvärden. Rapporten är begränsad till den **aktuella åtkomst-URL:en** och kräver en administratörsroll.

## Ladda ned rapporten

1. Öppna **Administration > Inställningar** på den portal du vill granska.
2. Välj **Ladda ned konfiguration för felsökning**.
3. Spara den genererade filen `chamilo-configuration-dump.json` på ett säkert sätt.
4. **Granska hela filen innan du skickar den till någon**, även om den verkar ha sanerats.

Rapporten innehåller en exporttidsstämpel, åtkomst-URL-omfång, sanerade plattformsinställningar samt installations- och aktivt tillstånd för plugin samt sanerad plugin-konfiguration. Det är en skrivskyddad export; att ladda ned den ändrar inte systeminställningarna.

## Konfidentialitet och gränser för åtkomst-URL

Känsliga värden maskeras av saneringslagret. Plugin-inställningar behandlas som konfidentiella som standard om de inte uttryckligen har klassificerats för säker export. Trots detta kan inställningsnamn, plugin-namn och annan diagnostisk metadata avslöja implementeringsdetaljer, så distribuera filen endast till betrodd supportpersonal.

I installationer med flera URL:er kontrollerar backend att den upplösta åtkomst-URL:en matchar förfrågans värd i stället för att tyst exportera en annan portals konfiguration. Bekräfta portaladressen innan du laddar ned.

## Felsökning

Om exporten inte är tillgänglig, kontrollera att kontot har administratörsbehörighet och att den begärda portalen löses upp till sin egen åtkomst-URL. Granska webbserver- och programloggar utan att kopiera inloggningsuppgifter eller personuppgifter till supportärenden.

Se [Systemverktyg](system-tools.md) och [Säkerhetsinställningar](../platform-settings/security-settings.md). Implementering: [PR #9476](https://github.com/chamilo/chamilo-lms/pull/9476).