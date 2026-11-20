# Planritningar för filialer och rumskartor

Chamilo 3.1 kan koppla en planritningsbild till en filial och markera rumspositioner på den bilden med interaktiva polygoner. Funktionen hjälper deltagare att hitta tilldelade rum; det är **inte** en geografisk GPS-karta.

## Bifoga en planritning för en filial

1. Öppna administrationsområdet för **Filialer** och redigera den avsedda filialen.
2. Leta upp panelen **Planritning**.
3. Välj eller ladda upp bilden och välj **Bifoga planritning** (eller **Byt planritning** om en redan finns).
4. Spara eller bekräfta filialändringarna enligt behov och kontrollera sedan att planritningsbilden laddas.

Om en planritning inte längre är giltig, använd **Ta bort planritning** efter att ha kontrollerat vilka rum som refererar till den. Ladda endast upp betrott innehåll och följ behörigheterna på filialens administrationsskärm.

## Rita in rum

1. Redigera ett rum som är tilldelat den filialen.
2. Hitta **Rum på planritning** i rumsformuläret.
3. Använd polygonverktyget för att rita rummets gräns. Använd **Redigera** för att justera hörnpunkter; alla punkter måste ligga inom bilden.
4. Välj **Spara rumsyta** och spara sedan rumsformuläret för att bevara ändringarna.
5. Öppna en rumsvisare för att bekräfta rätt position. Använd **Rensa rumsyta** om mappningen ska tas bort.

Ett rum har en redigerbar polygon åt gången. Rumsmappningen är separat från bilden på filialnivå, så en uppdatering av bilden kan kräva att befintliga rumsgränser kontrolleras.

## Var kartorna visas

Behöriga användare kan visa rumsplanritningar när rum väljs eller visas i kursinformation, kalenderhändelser och närvarorelaterade flöden. Kontrollera synligheten med de roller som faktiskt kommer att se informationen, särskilt studenter och sessionsdeltagare.

Behörigheter för filial- och rumsåtkomst gäller även planritningsresurser. I installationer med flera URL:er, kontrollera korrekt isolering mellan portal och filial innan kartor publiceras.

Se [Hantera rum](managing-rooms.md) och [Sök rumstillgänglighet](room-availability-finder.md). Implementationer: [PR #9321](https://github.com/chamilo/chamilo-lms/pull/9321), [PR #9451](https://github.com/chamilo/chamilo-lms/pull/9451).