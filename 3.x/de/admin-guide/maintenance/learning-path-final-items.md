# Abschluss hängender abschließender Elemente von Lernpfaden

Der letzte Schritt eines Lernpfads — die Seite „Congratulations“ mit den Blöcken für Zertifikat und Kompetenzen — gilt erst als abgeschlossen, wenn ein Lernender sie tatsächlich öffnet. Ein Lernender, der alle anderen Schritte abschließt, aber nie zu dieser letzten Seite weiterklickt, bleibt dauerhaft knapp unter 100 % hängen. Da die Berechtigung für Leistungszertifikate (und die Vergabe von Kompetenzen) davon abhängt, dass der Lernpfad 100 % erreicht, erhalten sie nie ein Zertifikat oder eine Kompetenz, die sie ansonsten erworben haben.

```bash
php bin/console chamilo:learning-path:complete-final-items [options]
```

Für jeden Lernpfad auf der Plattform, dessen letzter Schritt vom Typ **Final item** ist, prüft der Befehl jeden Lernenden mit einem laufenden Versuch (unter 100 %), der alle anderen Schritte abgeschlossen hat — über jeden Kurs und jede Sitzung hinweg, die den Lernpfad wiederverwenden. Trifft dies zu, schließt er das abschließende Element für sie genau so ab, als hätten sie es selbst geöffnet: Er zeichnet dieselbe Elementansicht auf, führt dieselbe Neuberechnung des Fortschritts aus und löst dieselbe Zertifikatserzeugung und Kompetenzvergabe aus, die ein echter Besuch auslösen würde.

Wie `chamilo:gradebook:process-achievement-certificates` (siehe
[Leistungszertifikate](achievement-certificates.md)) arbeitet er in begrenzten Stapeln, unterstützt einen
Probelauf und kann bei Unterbrechung sicher fortgesetzt werden — ein Lernender, dessen abschließendes Element bereits abgeschlossen ist, wird bei einem späteren Lauf nie erneut angefasst.

## Optionen

| Option                 | Zweck                                                                                                            |
| ----------------------- | -------------------------------------------------------------------------------------------------------------------- |
| `--dry-run`             | Auswerten und berichten, ohne etwas abzuschließen. Immer zuerst ausführen.                                           |
| `--sender-id=<id>`      | ID eines aktiven Plattformadministrators, die als Ersteller der Ressource verwendet wird, wenn der Abschluss eines abschließenden Elements die Zertifikatserzeugung oder die Kompetenzvergabe auslöst. Für eine echte Ausführung (kein Probelauf) erforderlich. |
| `--limit=<n>`           | Maximale Anzahl abgeschlossener abschließender Elemente (oder im Probelauf gemeldeter Elemente) in einem Lauf. `0` = unbegrenzt. Standard `500`.              |
| `--scan-limit=<n>`      | Maximale Anzahl in einem Lauf geprüfter Fortschrittsdatensätze von Lernenden, über alle Lernpfade hinweg. `0` = unbegrenzt. Standard `5000`. |
| `--batch-size=<n>`      | Fortschrittsdatensätze von Lernenden, die pro Datenbankstapel innerhalb eines Lernpfads geladen werden. Standard `50`.                       |
| `--lp-batch-size=<n>`   | Lernpfade, die pro Datenbankstapel geladen werden. Standard `50`.                                                            |
| `--after-lp-id=<id>`    | Prüfung nach dieser Lernpfad-ID fortsetzen.                                                                       |

## Beispiele

Zuerst einen Probelauf für die gesamte Plattform ausführen, um zu sehen, wer abgeschlossen würde:

```bash
php bin/console chamilo:learning-path:complete-final-items --dry-run
```

Echter Lauf, Administrator mit der ID 1 als Ersteller der Ressource:

```bash
php bin/console chamilo:learning-path:complete-final-items --sender-id=1
```

Einen unterbrochenen Lauf nach Lernpfad 480 fortsetzen:

```bash
php bin/console chamilo:learning-path:complete-final-items --sender-id=1 --after-lp-id=480
```

## Exit-Codes

Der Befehl beendet sich mit einem Fehlerstatus, wenn während eines echten Laufs mindestens ein abschließendes Element tatsächlich nicht abgeschlossen werden konnte — die Übersichtstabelle nennt den Lernpfad, den Lernenden und den Grund; das Anwendungsprotokoll enthält die vollständige Ausnahme. Ein korrekt ausgeschlossener Lernender (abschließendes Element bereits erledigt oder ein anderer Schritt noch unvollständig) ist kein Fehler und führt nie zu einem Fehler-Exit-Code.

## Bewertung im Gradebook nach dem Abschluss

Die für einen Lernpfad in der Gradebook-Tabelle angezeigte Bewertung wird nie gespeichert — sie wird bei jedem Laden der Seite live aus dem aktuellen Fortschritt des Lernenden berechnet und spiegelt daher die 100 % sofort wider, ohne zusätzlichen Schritt.

Das **Zertifikat** eines Lernenden erhält, falls es bereits vor dem Erreichen von 100 % existierte (mit einer älteren, niedrigeren darin festgeschriebenen Bewertung), seine gespeicherte Bewertung und das gerenderte HTML nur dann aktualisiert, wenn die Zertifikatsneuerzeugung selbst erfolgreich ist, wenn dieser Befehl das abschließende Element abschließt — derselbe Aufruf, den ein tatsächlicher Besuch auslösen würde. Schlägt die Zertifikatserzeugung aus irgendeinem Grund fehl (siehe
[Leistungszertifikate](achievement-certificates.md) zu häufigen Ursachen, z. B. Dateispeicherberechtigungen), erreicht der Fortschritt des Lernenden weiterhin korrekt 100 %, und die Gradebook-Tabelle zeigt dies weiterhin an — nur das Zertifikat zeigt weiterhin die alte Bewertung. Da der Befehl einen Lernenden, der bereits bei 100 % ist, nie erneut besucht, wird er dies bei einem späteren Lauf nicht erneut versuchen. Erzeugen Sie dieses Zertifikat manuell neu (die Aktion **Generate** in der Zertifikatsliste), sobald das zugrunde liegende Problem behoben ist.

`--sender-id` existiert speziell, um eine häufige Ursache dieses Fehlers zu vermeiden: Der Abschluss eines abschließenden Elements außerhalb einer echten Anfrage hat keinen angemeldeten Benutzer, den die Zertifikatsressource als ihren Ersteller aufzeichnen könnte, und die Erzeugung schlägt ohne einen solchen vollständig fehl.