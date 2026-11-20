# Sikker eksport av konfigurasjonsdiagnostikk

Chamilo 3.1 tilbyr en nedlastbar JSON-rapport for å diagnostisere konfigurasjonsproblemer uten å eksportere konfidensielle innstillingsverdier med vilje. Rapporten er begrenset til **gjeldende tilgangs-URL** og krever en administratorrolle.

## Last ned rapporten

1. Åpne **Administrasjon > Innstillinger** på portalen du vil inspisere.
2. Velg **Last ned konfigurasjon for feilsøking**.
3. Lagre den genererte filen `chamilo-configuration-dump.json` på en sikker måte.
4. **Gå gjennom hele filen før du sender den til noen**, selv om den ser ut til å ha blitt sanert.

Rapporten inneholder et eksporttidsstempel, omfang for tilgangs-URL, sanerte plattforminnstillinger og installasjons-/aktiv status for plugin samt sanert plugin-konfigurasjon. Det er en skrivebeskyttet eksport; nedlasting endrer ikke systeminnstillingene.

## Konfidensialitet og grenser for tilgangs-URL

Sensitive verdier sladdes av saneringslaget. Plugin-innstillinger behandles som konfidensielle som standard med mindre de er eksplisitt klassifisert for sikker eksport. Likevel kan innstillingsnavn, plugin-navn og andre diagnostiske metadata avsløre implementeringsdetaljer, så distribuer filen bare til betrodde støttepersoner.

I installasjoner med flere URL-er kontrollerer backend at den oppløste tilgangs-URL-en samsvarer med forespørselens vert, i stedet for å eksportere en annen portals konfigurasjon i stillhet. Bekreft portaladressen før nedlasting.

## Feilsøking

Hvis eksporten ikke er tilgjengelig, sørg for at kontoen har administratorrettigheter og at den forespurte portalen løses til sin egen tilgangs-URL. Gå gjennom webserver- og applikasjonslogger uten å kopiere legitimasjon eller personopplysninger inn i støttesaker.

Se [Systemverktøy](system-tools.md) og [Sikkerhetsinnstillinger](../platform-settings/security-settings.md). Implementering: [PR #9476](https://github.com/chamilo/chamilo-lms/pull/9476).