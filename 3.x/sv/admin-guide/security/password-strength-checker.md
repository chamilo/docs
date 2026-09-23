# Lösenordsstyrkekontroll

Lösenordsstyrkekontrollen jämför aktiva användares lagrade lösenordshashar mot en kort lista över vanligt använda lösenord (`123456`, `password`, `qwerty123` och liknande). Den visar eller överför aldrig själva lösenorden — endast om en användares aktuella lösenord matchar någon av de kända svaga kandidaterna.

## Öppna Lösenordsstyrkekontrollen

Från administrationspanelen klickar du på **Säkerhet > Lösenordsstyrkekontroll**.

## Köra en genomsökning

![Sidan Lösenordsstyrkekontroll, med ett fält för användar-ID:n att genomsöka och en knapp för att köra genomsökningen](../../.gitbook/assets/admin-security-password-strength.png)

* Lämna **Användar-ID:n att genomsöka** tomt för att genomsöka varje aktiv användare, eller ange en kommaseparerad lista med användar-ID:n för att kontrollera en delmängd
* Klicka på **Kör lösenordsstyrkegenomsökning**

Genomsökningen körs asynkront i bakgrunden så att sidan inte fryser, och visar liveförlopp (verifierade användare hittills, av totalt antal, och hur många svaga lösenord som har hittats). Eftersom varje kandidatlösenord måste kontrolleras mot varje vald användares hash kan genomsökning av alla användare på en stor plattform ta en stund — kandidatlistan hålls avsiktligt kort för att begränsa denna kostnad.

## Åtgärda resultat

![De färdiga genomsökningsresultaten, som listar en flaggad användare med kolumnerna Namn, Användarnamn och E-post, samt åtgärder per rad för att begära lösenordsbyte eller tvinga lösenordsåterställning](../../.gitbook/assets/admin-security-password-strength-results.png)

När genomsökningen är klar listas flaggade användare med två tillgängliga åtgärder, antingen per användare eller som en massåtgärd för alla valda användare:

* **Begär lösenordsbyte** (kuverticon) — Skickar användaren ett e-postmeddelande som ber dem att byta lösenord
* **Tvinga lösenordsåterställning** (återställningsikon) — Ogiltigförklarar omedelbart användarens aktuella lösenord och skickar dem ett nytt via e-post

Båda åtgärderna verifierar de valda användarna mot listan över svaga lösenord på nytt innan de utförs, så att en inaktuell eller manipulerad begäran inte kan användas för att återställa ett konto som inte längre har ett svagt lösenord.

## Rekommenderad användning

* Kör denna genomsökning regelbundet, särskilt efter en massimport av användare (importerade konton har ibland enkla standardlösenord)
* Kombinera den med inställningarna **Minimala syntaxkrav för lösenord** och **Intervall för lösenordsrotation** i [Säkerhetsinställningar](../platform-settings/security-settings.md) för att förhindra att svaga lösenord sätts från början, i stället för att bara fånga dem i efterhand