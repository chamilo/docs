# System

Blocket **System** på administrationspanelen samlar underhållsverktyg på servernivå, arbetsflödet för självuppdatering, verktyg för inspektion av lagring/resurser samt plattformens varumärkesanpassning.

![Blocket System på administrationspanelen, med Clean temporary files, System status, System update, Colors, File info, Resources by type och List icons](../../.gitbook/assets/admin-system-block.png)

## Åtkomst till blocket System

Från administrationspanelen visas blocket **System** tillsammans med de övriga panelblocken. Klicka på någon av dess länkar för att öppna motsvarande verktyg.

## Vad som ingår i blocket

* **[Systemverktyg](system-tools.md)** — Rensa temporära filer, kör arbetsflödet för självuppdatering, inspektera lagrade filer och resurser samt bläddra i den inbyggda ikonuppsättningen
* **System status** — Behandlas i [Systemstatus](../maintenance/system-status.md), under Underhåll
* **[Varumärkesanpassning](branding/README.md)** — Färgteman (länken "Colors" i blocket öppnar samma sida för färgteman), anpassning av portalen och mallar

Två ytterligare objekt — **Data filler** och **E-mail tester** — visas endast när servern har en katalog `tests/` närvarande, vilket är en utvecklings-/QA-miljö, inte en produktionsmiljö. De visas inte på en typisk produktionsinstallation; se [Systemverktyg](system-tools.md#development-only-tools) för vad de gör när de finns.