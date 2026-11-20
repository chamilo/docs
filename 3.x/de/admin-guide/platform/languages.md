# Sprachen

Dieses Werkzeug verwaltet, welche Oberflächensprachen Benutzer auswählen können — es verwaltet nicht die Übersetzungszeichenfolgen selbst (diese stammen aus den mit Chamilo ausgelieferten Sprachpaketen und nicht aus etwas, das hier bearbeitet werden kann).

## Zugriff auf Sprachen

Klicken Sie im Administrationsbereich auf **Plattform > Sprachen**.

## Was Sie tun können

* **Verfügbarkeit umschalten** — Aktivieren oder deaktivieren Sie jede der mitgelieferten Sprachen als Auswahlmöglichkeit auf der Anmeldeseite und in den Benutzerprofileinstellungen, mit einem einfachen Ein-/Aus-Schalter pro Zeile
* **Plattformstandard festlegen** — Wählen Sie, welche Sprache verwendet wird, wenn keine Benutzereinstellung greift; der aktuelle Standard ist mit einem eigenen Symbol gekennzeichnet und kann nicht ausgeblendet werden
* **Alle außer dem Standard deaktivieren** — Eine einzelne Sammelaktion, um die Sprachauswahl auf die Standardsprache Ihrer Plattform zu reduzieren
* **Eigenbezeichnung bearbeiten** — Passen Sie an, wie der eigene Name einer Sprache (ihr „ursprünglicher Name“) in der Auswahl angezeigt wird

## Deaktivieren einer verwendeten Sprache

Wenn Sie eine Sprache deaktivieren, die aktive Benutzer bereits als ihre Oberflächensprache ausgewählt haben, fordert Chamilo eine Bestätigung an und — wenn Sie bestätigen — migriert jeden betroffenen Benutzer auf die Standardsprache der Plattform. Es gibt keinen Zwischenzustand, in dem einem Benutzer eine nun ausgeblendete Sprache zugeordnet bleibt.

## Rechts-nach-links-Sprachen

Rechts-nach-links-Sprachen (wie Arabisch, Hebräisch oder Persisch) schalten die Oberfläche bei Auswahl automatisch auf ein Rechts-nach-links-Layout um — hierfür ist weder hier noch an anderer Stelle etwas zu konfigurieren. Die RTL-Unterstützung wurde in neueren Versionen erheblich verbessert.

## Untersprachen

Wenn die Einstellung **Untersprachen zulassen** aktiviert ist, erscheinen zusätzliche Aktionen zum Erstellen von „Untersprachen“ — teilweise Überschreibungen einer übergeordneten Sprache, die historisch für regionale Dialekte oder organisationsspezifische Terminologieanpassungen verwendet wurden. Dies ist eine Legacy-Funktion; die meisten Installationen benötigen sie nicht.

## Reihenfolge von Personennamen

Chamilo zeigt Personennamen an und sortiert sie gemäß der Konvention der jeweils verwendeten Oberflächensprache.

* **Vorname zuerst** (zum Beispiel „Maria Garcia“), sortiert nach dem Vornamen: Spanisch (es, es_MX), Galicisch (gl), Malaiisch (ms_MY) und alle anderen Sprachen, die unten nicht aufgeführt sind.
* **Familienname zuerst** (zum Beispiel „Yamada Taro“), sortiert nach dem Familiennamen: Japanisch, Koreanisch, Chinesisch (vereinfacht und traditionell), Vietnamesisch und Ungarisch.

Spanisch, Spanisch (Mexiko), Galicisch und Malaiisch wurden zuvor als familienname-zuerst behandelt; sie folgen nun der Reihenfolge Vorname zuerst. Die Konvention ist in den Sprachdefinitionen der Plattform fest verankert (sie wird nicht pro Installation gespeichert), sodass beim Upgrade keine Aktion durch die Administration erforderlich ist.