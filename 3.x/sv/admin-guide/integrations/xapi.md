# xAPI

**xAPI** (Experience API, även känt som Tin Can API) är en standard för att spåra lärandeupplevelser. Chamilo kan både generera och konsumera xAPI-satser.

## Vad xAPI gör

xAPI spårar lärandeaktiviteter som **satser** i formatet: "Aktör utförde Verb på Objekt." Till exempel:

* "Jane completed Module 1"
* "John scored 85% on the Final Exam"
* "Maria watched the Introduction Video"

Dessa satser lagras i ett **Learning Record Store (LRS)** och ger en heltäckande dokumentation av lärandeaktivitet.

## Konfiguration

1. I plattformsinställningarna, konfigurera **LRS-slutpunkten**:
   * **LRS URL** — Adressen till ditt Learning Record Store
   * **LRS-autentisering** — Uppgifter för att skicka data till LRS
2. Aktivera xAPI-spårning för de önskade aktiviteterna

## Vad Chamilo spårar via xAPI

Chamilo kan generera xAPI-satser för:

* Kursåtkomst och slutförande
* Övningsförsök och poäng
* Framsteg för objekt i lärstigar
* Portföljobjekt

Andra verktyg (såsom Dokument och Forum) skickas för närvarande inte som xAPI-händelser av pluginet.

## Användningsfall

* **Plattformsoberoende spårning** — Spåra lärandeaktivitet över flera verktyg och plattformar i ett enda LRS
* **Avancerad analys** — Använd LRS-analysverktyg för att generera insikter som går utöver Chamilos inbyggda rapportering
* **Efterlevnadsrapportering** — Generera revisionsspår av genomförd utbildning för regulatoriska krav