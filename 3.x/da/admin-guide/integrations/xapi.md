# xAPI

**xAPI** (Experience API, også kendt som Tin Can API) er en standard til at spore læringsoplevelser. Chamilo kan både generere og forbruge xAPI-udsagn.

## Hvad xAPI gør

xAPI sporer læringsaktiviteter som **udsagn** i formatet: "Aktør udførte Verb på Objekt." For eksempel:

* "Jane completed Module 1"
* "John scored 85% on the Final Exam"
* "Maria watched the Introduction Video"

Disse udsagn gemmes i et **Learning Record Store (LRS)** og giver et samlet overblik over læringsaktivitet.

## Konfiguration

1. I platformindstillingerne konfigureres **LRS-endepunktet**:
   * **LRS URL** — Adressen på dit Learning Record Store
   * **LRS-godkendelse** — Legitimationsoplysninger til at sende data til LRS
2. Aktivér xAPI-sporing for de ønskede aktiviteter

## Hvad Chamilo sporer via xAPI

Chamilo kan generere xAPI-udsagn for:

* Kursusadgang og -fuldførelse
* Øvelsesforsøg og -scorer
* Fremskridt for elementer i læringsstier
* Porteføljeelementer

Andre værktøjer (såsom Documents og Forums) udsendes i øjeblikket ikke som xAPI-hændelser af pluginnet.

## Anvendelsesområder

* **Sporing på tværs af platforme** — Spor læringsaktivitet på tværs af flere værktøjer og platforme i ét enkelt LRS
* **Avanceret analyse** — Brug LRS-analyseværktøjer til at generere indsigter, der går ud over Chamilos indbyggede rapportering
* **Overholdelsesrapportering** — Generér revisionsspor for gennemført træning til regulatoriske krav