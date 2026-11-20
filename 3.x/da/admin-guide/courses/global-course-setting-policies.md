# Globale politikker for kursusindstillinger

Platformadministratorer kan definere centraliserede standardværdier for kursusindstillinger og styre, om undervisere må tilsidesætte dem. Politikkerne gælder for eksisterende kursusfunktionalitet, samtidig med at kompatible kursspecifikke konfigurationer bevares.

## Åbn politiksiden

På **hovedadgangs-URL'en** skal du åbne **Administration > Indstillinger > Kursusindstillinger**, eller navigere til `/admin/settings/course-settings` på din installation. Denne administrationsside er forbeholdt autoriserede platformadministratorer på hovedadgangs-URL'en. Brug ikke en sekundær portal til at redigere globale politikker.

## Konfigurer en politik

1. Brug feltet **Søg**, hvis du har brug for en bestemt nøgle til kursusindstillinger.
2. For hver indstilling skal du kontrollere det nøjagtige variabelnavn, der vises under dens overskrift.
3. Markér eller fjern markeringen af **Redigerbar i kursus** for at styre, om kursusredaktører kan ændre den pågældende indstilling.
4. Vælg eller indtast en **Standardværdi for platformen**. Nogle indstillinger tilbyder en rullemenu med tilladte værdier; andre accepterer tekst.
5. Gem ændringerne, og verificer den effektive adfærd i et testkursus.

Indstillinger, der genbruger det samme variabelnavn i forskellige kategorier, vises separat, hvor det er nødvendigt. Antag ikke, at to visuelt ens navne styrer den samme kursusfunktion.

## Verificer med to roller

Som administrator skal du bekræfte den gemte standardværdi, og om den kan redigeres. Som kursusunderviser skal du åbne den tilsvarende kursusindstilling og kontrollere, at den effektive værdi og redigeringsbegrænsningen stemmer overens med politikken. Test både et eksisterende kursus og et nyt kursus, hvor det er muligt.

Ændring af en global standardværdi kan påvirke mange kurser. Gennemgå konsekvenserne, før du deaktiverer underviseres tilsidesættelser, og registrer de tidligere politikværdier, så de kan gendannes, hvis det er nødvendigt.

Se [Håndtering af kurser](managing-courses.md) og [Kursusindstillinger](../../teacher-guide/creating-your-course/course-settings.md). Implementering: [PR #9328](https://github.com/chamilo/chamilo-lms/pull/9328).