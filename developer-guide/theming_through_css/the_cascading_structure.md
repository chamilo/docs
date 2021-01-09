
# Die kaskadierende Struktur

Wie unter dem Abschnitt „Seite' Illegale HTML“ -Tag entfernt: ** einer beliebigen Chamilo-Seite verstanden werden kann, werden CSS-Dateien wie folgt geladen \(wir haben den Domainnamen absichtlich durch den Marker „** \[.\] ** zur besseren Lesbarkeit ersetzt und den standardmäßigen aktiven Stil von main/css/chamilo/\ verwendet):

Oder, kurz gesagt, wir laden sie in dieser Reihenfolge:

1. web/assets/bootstrap/dist/css/bootstrap.min.css
2. web/assets/bootstrap-daterangepicker/daterangepicker-bs3.css
3. web/assets/fontawesome/css/font-awesome.min.css
4. jquery-Zeug
5. \(CSS mit minderwertiger Bedeutung hier\)
6. web/css/base.css \(der Kern des Chamilo Stils oben auf Bootstrap\)
7. web/css/themes/chamilo/default.css \(Anpassung des CSS-Themas, veränderbar in Chamilo\)
8. web/css/themes/chamilo/print.css \(eine spezielle Version des Stils, wenn Sie ihn drucken\)

Wir werden uns hier nicht mit den weniger wichtigen CSS-Dateien befassen, aber Sie sollten beachten, dass sie im Allgemeinen funktionsspezifisch sind, wie gewählt \(eine JS-, durchsuchbare Dropdown-Menüleiste\).

Wie CSS diktiert, wird zuerst ein CSS geladen, das zuerst in der Liste erscheint, dann werden die folgenden bei Bedarf die vorherigen Einstellungen « overwrite » geben.

## Frühere Versionen

Sie sollten auch wissen, dass wir in einigen Fällen in früheren Versionen von Chamilo die @import url\(\) -Funktion von CSS verwendet haben, um mehr « default » CSS zu laden. Zum Beispiel hätten Sie für alle Stile vom Typ Chamilo am Anfang einen Block wie diesen gefunden:

```text
/* Adding default style for the chamilo_X themes */

@import url('../base_chamilo.css');
```

Dies wurde seit 1.10.0 aus den Stilen entfernt, daher sollten Sie \(noch nicht mehr\) finden.

Mit all diesen Informationen sind wir bereit, den nächsten Abschnitt anzugehen: den Zweck jeder Datei zu analysieren.