# Anpassa namn och ikoner för kursverktyg

Chamilo 3.1 gör det möjligt för behöriga kursredigerare att anpassa **namnet** och **SVG-ikonen** som visas för ett verktyg på en kursstartsida. Dessa ändringar gäller endast kursen och bevarar befintliga verktygsdestinationer.

## Anpassa ett verktyg

1. Öppna kursstartsidan som en användare med behörighet att redigera kursen.
2. Aktivera läget **Anpassa** i verktygsrutnätet.
3. Öppna anpassningsformuläret för det verktyg du vill ändra.
4. Ange önskat **Namn** och, om det behövs, välj en SVG-fil för **Ikon**.
5. Välj **Spara** och kontrollera det uppdaterade verktyget i startsidans rutnät.

Anpassning av verktyg skiljer sig från rutnätets lägen **Sortera**, **Visa alla** och **Dölj alla**. Att ändra ett verktygs etikett eller ikon skapar inte ett nytt verktyg, ändrar inte dess underliggande URL och ger inte deltagare ytterligare åtkomst.

## SVG-krav och säkerhet

Använd en SVG-fil från en betrodd källa. Chamilo validerar uppladdat SVG-innehåll och avvisar osäkra filer. Om en fil avvisas, förenkla eller exportera om den som en ren SVG i stället för att försöka kringgå valideringen.

Bekräfta den resulterande ikonen och namnet både som lärare och som student, och kontrollera att en annan kurs förblir oförändrad. Studenter kan inte anpassa verktyg om de inte har de behörigheter som krävs för att redigera kursen.

Se [Kursstartsida](course-homepage.md). Implementering: [PR #9374](https://github.com/chamilo/chamilo-lms/pull/9374).