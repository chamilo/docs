# Hälsokontroll

Hälsokontroll är ett litet block på administrationspanelen som kör ett antal livekontroller av din installation och flaggar allt som behöver åtgärdas — du behöver inte gräva i konfigurationsfiler för att upptäcka vanliga felkonfigurationer.

![Blocket Hälsokontroll på administrationspanelen, som visar godkänd/underkänd-status för e-postinställningar, tilldelning av administratörs-URL och kontroller av filbehörigheter](../.gitbook/assets/admin-health-check-block.png)

## Åtkomst till Hälsokontroll

Från administrationspanelen visas blocket **Hälsokontroll** tillsammans med de övriga panelblocken — inget klick behövs, resultaten visas direkt.

## Kontrollerna

* **E-postinställningar** — Kontrollerar att en anslutningssträng för e-postserver och en avsändaradress/namn är konfigurerade. Om inte, länkas till E-postinställningar för att åtgärda det.
* **Alla URL:er har minst en tilldelad administratör** — På en installation med flera URL:er kontrolleras att varje åtkomst-URL har minst en administratör som kan hantera den. Om någon saknar det, länkas till sidan för tilldelning av åtkomst-URL/användare.
* **`.env` är inte skrivbar** — `.env` innehåller hemligheter och ska inte vara skrivbar för webbservern efter installationen. Flaggas som ett fel om den är det; länkar till Säkerhetsguiden.
* **`config/` är inte skrivbar** — Samma resonemang som för `.env`: den här katalogen ska inte vara skrivbar via webben vid normal drift. Länkar till Säkerhetsguiden.
* **`var/cache` är skrivbar** — Den omvända kontrollen: Symfony behöver skriva till sin cachekatalog, så den här flaggas som ett fel om den *inte* är skrivbar. Länkar till guiden Prestandajustering / optimering.
* **Installationsmappen finns inte** — Mappen `public/main/install` behövs bara under installationen och ska tas bort efteråt. Detta flaggas som en varning (inte ett hårt fel) om den fortfarande finns, eftersom det är en lägre allvarlighetsgrad än de två skrivbarhetskontrollerna ovan. Länkar till Säkerhetsguiden.

## Vad du ska göra åt det

Varje kontroll länkar direkt till där du åtgärdar det underliggande problemet — antingen en inställningssida eller den relevanta guiden. Gå igenom den här listan direkt efter installationen, och periodiskt därefter (till exempel efter en manuell filöverföring eller behörighetsändring), eftersom en godkänd kontroll idag inte garanterar att den förblir så. För en bredare checklista för produktionshärdning utöver dessa sex kontroller, se [Säkerhetsguiden](appendix/security-guide.md).