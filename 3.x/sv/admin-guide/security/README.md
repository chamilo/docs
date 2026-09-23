# Säkerhet

Blocket **Säkerhet** på administrationspanelen samlar plattformens inbyggda verktyg för säkerhetsövervakning och granskning. Det är skilt från [Säkerhetsinställningar](../platform-settings/security-settings.md), som konfigurerar säkerhets*policy* (lösenordsregler, CAPTCHA, HTTP-säkerhetsrubriker och så vidare) — det här blocket ger dig *rapporterna och verktygen* som övervakar plattformen för misstänkt aktivitet och oönskade ändringar.

![Blocket Säkerhet på administrationspanelen, med Aktivitetsgranskning, Inloggningsförsök, Simple IDS, Kontroll av lösenordsstyrka och Filintegritet](../../.gitbook/assets/admin-security-block.png)

Blocket infördes i Chamilo 2.0 med fyra verktyg och utökades i Chamilo 3.0 med ett femte, **Filintegritet**.

## Åtkomst till säkerhetsblocket

Från administrationspanelen visas blocket **Säkerhet** tillsammans med de övriga panelblocken (Användare, Kurser, Plattformshantering, System och så vidare). Klicka på någon av dess länkar för att öppna motsvarande verktyg.

## Vad som ingår i blocket

* **[Aktivitetsgranskning](activities-audit.md)** — Bläddra bland viktiga administrativa och plattformshändelser (användare, kurs, session och andra ändringar) efter händelsetyp
* **[Inloggningsförsök](login-attempts.md)** — Granska misslyckade och lyckade inloggningsförsök, med diagram och en sökbar logg
* **[Simple IDS](simple-ids.md)** — Se begäranden som flaggats av Chamilos inbyggda, lätta system för intrångsdetektering
* **[Kontroll av lösenordsstyrka](password-strength-checker.md)** — Skanna aktiva användare efter lösenord som matchar en lista över vanligt använda lösenord
* **[Filintegritet](file-integrity.md)** *(nytt i Chamilo 3.0)* — Upptäck oväntade tillägg, ändringar, borttagningar eller behörighetsändringar i de installerade filerna

## Vem som kan komma åt det

Alla fem verktyg kräver åtkomst som **Portaladministratör**. Filintegritetens åtgärder för skanning, paus och ny baslinje kräver dessutom åtkomst som **Global administratör**, och att pausa aviseringar eller etablera en ny baslinje kräver att du anger ditt eget lösenord på nytt — se [Filintegritet](file-integrity.md#actions) för detaljer.