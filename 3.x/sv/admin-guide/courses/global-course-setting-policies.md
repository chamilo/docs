# Globala policyer för kursinställningar

Plattformsadministratörer kan definiera centraliserade standardvärden för kursinställningar och styra om lärare får åsidosätta dem. Policyerna gäller befintlig kursfunktionalitet samtidigt som kompatibla kursspecifika konfigurationer bevaras.

## Öppna policysidan

På **huvudåtkomst-URL:en**, öppna **Administration > Inställningar > Kursinställningar**, eller navigera till `/admin/settings/course-settings` på din installation. Den här administrationssidan är reserverad för behöriga plattformsadministratörer på huvudåtkomst-URL:en. Använd inte en sekundär portal för att redigera globala policyer.

## Konfigurera en policy

1. Använd fältet **Sök** om du behöver en specifik nyckel för kursinställning.
2. Kontrollera för varje inställning det exakta variabelnamnet som visas under dess rubrik.
3. Markera eller avmarkera **Redigerbar i kurs** för att styra om kursredigerare kan ändra den inställningen.
4. Välj eller ange ett **Standardvärde för plattformen**. Vissa inställningar erbjuder en rullgardinsmeny med tillåtna värden; andra accepterar text.
5. Spara ändringarna och verifiera det faktiska beteendet i en testkurs.

Inställningar som återanvänder samma variabelnamn i olika kategorier visas separat där det behövs. Utgå inte från att två visuellt liknande namn styr samma kursfunktion.

## Verifiera med två roller

Som administratör, bekräfta det lagrade standardvärdet och om det är redigerbart. Som kurslärare, öppna motsvarande kursinställning och kontrollera att det effektiva värdet och redigeringsbegränsningen överensstämmer med policyn. Testa både en befintlig kurs och en ny kurs där det är möjligt.

Att ändra ett globalt standardvärde kan påverka många kurser. Granska dess påverkan innan du inaktiverar lärares åsidosättningar, och notera de tidigare policyvärdena så att de kan återställas vid behov.

Se [Hantera kurser](managing-courses.md) och [Kursinställningar](../../teacher-guide/creating-your-course/course-settings.md). Implementering: [PR #9328](https://github.com/chamilo/chamilo-lms/pull/9328).