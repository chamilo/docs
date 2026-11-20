# Enkätmallar

Administratörer kan skapa återanvändbara enkätformulär och erbjuda dem till lärare eller tilldela dem direkt till kurser och sessioner. Funktionen implementerades i [PR #9208](https://github.com/chamilo/chamilo-lms/pull/9208) för [ärende #8760](https://github.com/chamilo/chamilo-lms/issues/8760).

## Skapa och underhålla mallar

1. I administrationspanelen öppnar du **Enkätmallar** och väljer **Skapa**.
2. Ange en titel och valfri undertitel; konfigurera anonymitet, frågelayout, blandning, varaktighet, introduktion och tacktext.
3. Spara och lägg till eller redigera de återanvändbara frågorna i mallens frågeredigerare.
4. Aktivera **Synlig som mall** om lärare ska kunna se och återanvända den. En osynlig mall förblir tillgänglig för administratören.

Mallar tillhör den aktuella åtkomst-URL:en. Endast plattformsadministratörer får skapa, redigera eller ta bort huvudmallen. Lärare kan använda synliga mallar men kan inte ändra deras huvuddefinition.

## Återanvänd en mall i en kurs eller session

I en behörig kurs eller session kan en lärare välja en synlig mall när en ny enkät skapas. Resultatet är en enkät i det kurskontextet, inte en ändring av den återanvändbara huvudmallen. Läraren kan granska frågorna och följa det vanliga arbetsflödet för publicering och inbjudan.

Från administrationslistan över mallar kan en administratör i stället tilldela en mall direkt till en vald **kurs** och, valfritt, en av den kursens **sessioner**. Chamilo kontrollerar att kursen tillhör den aktuella portalen och att den valda sessionen faktiskt innehåller kursen. Lärargränssnittet kan inte användas för att tilldela en mall till någon annans kurs eller session.

Den nya enkäten publiceras inte automatiskt enbart för att den skapades från en mall; granska den innan du bjuder in deltagare. Se [Enkäter](../teacher-guide/assessing-learners/surveys.md) för det vanliga enkätarbetsflödet.

## Dölj känsliga resultat för lärare eller handledare

När en faktisk enkät redigeras kan en plattformsadministratör aktivera **Resultat dolda för lärare/handledare**. Denna begränsning per enkät är avsedd för känsliga frågeformulär, till exempel utvärderingar av undervisande personal. Lärare och handledare kan fortfarande granska svarsantal och skicka påminnelser, men **kan inte öppna rapporteringsvyer eller exportera resultaten**. Plattformsadministratörer behåller rapporteringsåtkomst, med förbehåll för andra plattformsinställningar.

Detta alternativ skiljer sig från det vanliga fältet **Resultatens synlighet** och från den plattformsgemensamma inställningen **Dölj knappen för enkätrapportering**. Endast en administratör kan ändra flaggan för begränsade resultat.

## Behörigheter och omfattning

* **Administratör:** hantera mallar, ange mallens synlighet, tilldela till berättigade kurser/sessioner och styra begränsad resultatåtkomst.
* **Lärare / sessionslärare:** se och instansiera endast synliga mallar inom sitt behöriga kurskontext.
* **Åtkomst-URL:er:** mallkatalogen och tilldelningen tillämpar den aktuella åtkomst-URL:en; mallar från andra portaler kan inte instansieras över gränsen.

Om mallar inte visas för lärare, kontrollera **Synlig som mall** och deras kurs-/sessionskontext. Om en mall inte kan instansieras, kontrollera de globala begränsningarna för att skapa enkäter och den avsedda målkursen/sessionen.