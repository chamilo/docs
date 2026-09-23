# System

**System**-blokken på administrasjonspanelet samler vedlikeholdsverktøy på servernivå, arbeidsflyten for selvoppdatering, verktøy for inspeksjon av lagring/ressurser og plattformens merkevarebygging.

![System-blokken på administrasjonspanelet, med Clean temporary files, System status, System update, Colors, File info, Resources by type og List icons](../../.gitbook/assets/admin-system-block.png)

## Tilgang til System-blokken

Fra administrasjonspanelet vises **System**-blokken sammen med de andre blokkene på dashbordet. Klikk på en av lenkene for å åpne det tilhørende verktøyet.

## Hva som finnes i blokken

* **[Systemverktøy](system-tools.md)** — Rydd midlertidige filer, kjør arbeidsflyten for selvoppdatering, inspiser lagrede filer og ressurser, og bla gjennom det innebygde ikonsettet
* **Systemstatus** — Dekket i [Systemstatus](../maintenance/system-status.md), under Vedlikehold
* **[Merkevarebygging](branding/README.md)** — Fargetemaer (lenken «Colors» i blokken åpner samme side for fargetemaer), tilpasning av portalen og maler

To ekstra elementer — **Data filler** og **E-mail tester** — vises bare når serveren har en `tests/`-katalog, som er et utviklings-/QA-oppsett, ikke et produksjonsoppsett. De vises ikke i en typisk produksjonsinstallasjon; se [Systemverktøy](system-tools.md#development-only-tools) for hva de gjør når de er til stede.