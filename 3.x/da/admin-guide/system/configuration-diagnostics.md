# Sikker eksport af konfigurationsdiagnostik

Chamilo 3.1 leverer en JSON-rapport, der kan downloades, til diagnosticering af konfigurationsproblemer uden bevidst at eksportere fortrolige indstillingsværdier. Rapporten er begrænset til den **aktuelle adgangs-URL** og kræver en administratorrolle.

## Download rapporten

1. Åbn **Administration > Indstillinger** på den portal, du vil inspicere.
2. Vælg **Download konfiguration til fejlfinding**.
3. Gem den genererede fil `chamilo-configuration-dump.json` sikkert.
4. **Gennemgå hele filen, før du sender den til nogen**, også selvom den ser ud til at være renset.

Rapporten indeholder et eksporttidsstempel, adgangs-URL-omfang, rensede platformsindstillinger samt plugin-installations-/aktiv-status og renset plugin-konfiguration. Det er en skrivebeskyttet eksport; download ændrer ikke systemindstillinger.

## Fortrolighed og grænser for adgangs-URL

Følsomme værdier sløres af rensningslaget. Plugin-indstillinger behandles som fortrolige som standard, medmindre de udtrykkeligt er klassificeret til sikker eksport. Alligevel kan indstillingsnavne, plugin-navne og andre diagnostiske metadata afsløre implementeringsdetaljer, så distribuer kun filen til betroet supportpersonale.

I installationer med flere URL'er kontrollerer backend, at den opløste adgangs-URL matcher anmodningens vært, i stedet for lydløst at eksportere en anden portals konfiguration. Bekræft portaladressen, før du downloader.

## Fejlfinding

Hvis eksporten ikke er tilgængelig, skal du sikre, at kontoen har administratorrettigheder, og at den anmodede portal opløses til sin egen adgangs-URL. Gennemgå webserver- og applikationslogfiler uden at kopiere legitimationsoplysninger eller personoplysninger ind i supportsager.

Se [Systemværktøjer](system-tools.md) og [Sikkerhedsindstillinger](../platform-settings/security-settings.md). Implementering: [PR #9476](https://github.com/chamilo/chamilo-lms/pull/9476).