# Aktivitetsgranskning

Rapporten Aktivitetsgranskning låter dig bläddra bland viktiga administrativa och plattformsaktiviteter, filtrerade efter händelsetyp. Det är samma underliggande rapport som tidigare nåddes från **Spårning > Administrativ aktivitetsgranskning**; den är nu också länkad direkt från blocket Säkerhet, eftersom den främst är ett verktyg för säkerhet och ansvarsskyldighet.

## Åtkomst till Aktivitetsgranskning

Från administrationspanelen klickar du på **Säkerhet > Aktivitetsgranskning**.

## Vad den visar

![Sidan Aktivitetsgranskning som listar kategorier för händelsetyper såsom Kurs, Session, Användare, Socialt, Meddelande, Resurs, Wiki och Övrigt, var och en expanderbar till enskilda händelsetyper](../../.gitbook/assets/admin-security-activities-audit.png)

Händelser grupperas i kategorier:

* **Kurs** — Skapande, borttagning och inställningsändringar för kurser
* **Session** — Skapande, borttagning och inskrivningsändringar för sessioner och sessionskategorier
* **Användare** — Skapande och borttagning av konton, lösenordsuppdateringar, fältändringar med mera
* **Socialt** — Skapande, borttagning och medlemskapsändringar för sociala grupper
* **Meddelande** — Ändringar och borttagningar av meddelandedata
* **Resurs** — Skapande och borttagning av resurser och resurslänkar
* **Wiki** — Visningar av wikisidor
* **Övrigt** — Allt annat, inklusive pluginaktivitet, låsning av betygskatalog, borttagning av övningsförsök, tvingade inloggningsförsök och inställningsändringar på plattformsnivå

Klicka på ett chip för händelsetyp (till exempel **Försök till tvingad inloggning**) för att filtrera rapporten till en tabell med matchande poster. Du kan också söka direkt med nyckelord via fältet **Sök** ovanför listan över händelsetyper.

## Användningsfall

* Undersöka vem som tog bort en kurs, session eller ett användarkonto, och när
* Bekräfta om en specifik administrativ ändring (en inställningsuppdatering, en plugininstallation) gjordes av en förväntad administratör
* Följa upp händelser av typen **Försök till tvingad inloggning** tillsammans med rapporten [Inloggningsförsök](login-attempts.md)