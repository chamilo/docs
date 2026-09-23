# Enkäter

Enkätverktyget låter dig skapa frågeformulär för att samla in återkoppling från dina deltagare. Enkäter är användbara för kursutvärderingar, behovsanalyser och opinionsundersökningar.

## Skapa en enkät

1. Öppna verktyget **Enkäter** <img src="../../.gitbook/assets/icons/mdi-form-dropdown.svg" alt="Enkäter" data-size="line"> från kursens startsida
2. Klicka på **Skapa enkät**
3. Fyll i enkätuppgifterna:
   * **Kod** — Detta är en unik kod för enkäten. Den används i e-postmeddelanden och länkar.
   * **Titel** — Enkätens namn
   * **Underrubrik** — En valfri sekundär rubrik
   * **Startdatum** — Från när enkäten är öppen för deltagande
   * **Slutdatum** — Till när enkäten är öppen för deltagande
   * **Anonym** — Om svaren är anonyma eller kopplade till enskilda deltagare
   * **Synlighet för resultat** — Vem som kan se resultaten (endast handledare, handledare och studenter, alla)
   * **Introduktion** — Ett meddelande som visas för deltagarna innan de påbörjar enkäten
   * **Tackmeddelande** — Ett meddelande som visas efter inlämning
4. Spara

### Avancerade inställningar

* **Betygsätt i bedömningsverktyget** — Om enkätens svarsstatus ska ingå i bedömningsverktyget (betygsboken). Alla som har slutfört enkäten får 100 %, alla andra får 0 %
* **Överordnad enkät** — Används egentligen inte för närvarande (äldre funktion)
* **En fråga per sida** — Presentationsstil för frågorna
* **Aktivera blandningsläge** — Om frågorna ska blandas
* **Visa frågenummer** — Om (automatiskt genererade) frågenummer ska visas

## Lägga till frågor

När enkäten är skapad, lägg till frågor:

1. Välj frågetyp:
   * **Ja/Nej** — Ett enkelt binärt val
   * **Flerval** — Välj ett svar bland flera alternativ
   * **Flera svar** — Välj ett eller flera svar bland flera alternativ
   * **Öppen fråga** — Fritextsvar
   * **Rullgardinslista** — Välj från en rullgardinslista
   * **Procent** — Välj ett procentvärde
   * **Poäng** — Betygsätt på en numerisk skala
   * **Kommentar** — Ett textblock (inte en fråga) för att lägga till instruktioner mellan frågor
   * **Flerval med alternativet "annat"** — Välj ett svar bland flera alternativ, med ett alternativt val
   * **Selektiv visning** — Speciell typ som gör att du kan anpassa frågeflödet utifrån tidigare svar
   * **Sidbrytning** — Lägg till sidbrytningar i frågeflödet. Endast användbart om "En fråga per sida" **inte** valdes i föregående steg
2. Konfigurera frågetexten och svarsalternativen
3. Spara

Varje fråga kan markeras som obligatorisk. Om du inte gör det är det acceptabelt att hoppa över vilken fråga som helst.

## Publicera en enkät

När alla frågor har lagts till:

1. Klicka på **Publicera**
2. Välj mottagare — Välj specifika deltagare eller grupper (du väljer dem). Knappen **Lägg till deltagare** lägger till alla deltagare med ett enda klick och lämnar lärarna utanför
3. Lägg till ytterligare användare — Låter dig bjuda in användare utanför Chamilo att delta i enkäten. De får ett e-postmeddelande med en länk och visas med sin e-postadress i enkätuppgifterna
4. E-postämne
5. E-posttext — Förklara vad enkäten handlar om och när/hur man ska svara
6. Olika alternativ för upprepade inbjudningar finns tillgängliga
7. Bekräfta

Deltagare får en inbjudan (som e-post) att slutföra enkäten.

En länk finns längst ned på publiceringssidan för att bjuda in ännu fler externa användare att delta. Deltagare som använder den här länken identifieras inte och visas som anonyma i enkätresultaten.

## Visa resultat

![Enkätresultat med diagram och procentfördelning för varje fråga](../../.gitbook/assets/survey-results-charts.png)

När deltagarna har svarat:

1. Öppna enkäten
2. Klicka på **Resultat** eller **Rapport**
3. Visa sammanfattningar av svar:
   * Diagram och procenttal för slutna frågor
   * Individuella textsvar för öppna frågor
   * Slutförandegrad (hur många inbjudna som svarade)

Du kan exportera resultaten till ett kalkylblad för vidare analys.

## Tips

* **Håll den kort** — Deltagare är mer benägna att slutföra kortare enkäter
* **Använd anonymt läge** — För ärlig återkoppling, aktivera anonyma svar
* **Tajma rätt** — Skicka enkäter mitt i kursen för att kunna göra justeringar, inte bara utvärderingar i slutet av kursen