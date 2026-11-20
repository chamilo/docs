# BuyCourses: Zahlungen und wiederkehrende Dienste

Das Plugin **BuyCourses** verkauft den Zugang zu Kursen und Sitzungen und kann kostenpflichtige Dienste anbieten. Die Zahlungsmethoden hängen davon ab, welche Gateways für die Installation konfiguriert wurden.

## Zahlungskonfiguration

Öffnen Sie **Administration > Plugins > BuyCourses** und wechseln Sie in den Bereich der Zahlungskonfiguration. Pflegen Sie die Gateway-Zugangsdaten auf dem Server, nicht auf einer für Lernende sichtbaren Seite. Bestehende Methoden wie Stripe und PayPal funktionieren weiterhin unabhängig von BTCPay Server.

### BTCPay Server (Kurs- und Sitzungskäufe)

Das Plugin unterstützt außerdem **BTCPay Server** für den Kauf von Kursen und Sitzungen:

1. Aktivieren Sie die Zahlungsmethode BTCPay in der BuyCourses-Konfiguration.
2. Legen Sie die BTCPay-**Server-URL**, die **Store-ID**, den **Greenfield-API-Schlüssel** und das **Webhook-Geheimnis** fest.
3. Verwenden Sie den **Verbindungstest** der Zahlungskonfiguration, um den Zugriff auf die Greenfield-API zu bestätigen.
4. Konfigurieren Sie den Webhook auf der BTCPay-Seite mit der vom Plugin angezeigten Webhook-URL und demselben Geheimnis.
5. Führen Sie einen kleinen Testkauf durch, bevor Sie diese Option Lernenden anbieten.

Der Käufer wird zum von BTCPay gehosteten Checkout weitergeleitet. Chamilo prüft die Webhook-Signaturen und ruft die Rechnung erneut ab, um **Store, Betrag, Währung und Bestelldetails** zu validieren, bevor die Bestellung als bezahlt markiert und der Käufer eingeschrieben wird. Eine Rückkehr über den Browser kann einen verpassten oder verzögerten Webhook ausgleichen. Wiederholte Benachrichtigungen erzeugen keine doppelte Erfüllung.

Nur verifizierte, abgeschlossene Zahlungen (einschließlich akzeptierter Überzahlungen und ausdrücklich von Administratoren als abgeschlossen markierter Rechnungen) gewähren Zugang. **Teilweise, verspätete, abgelaufene oder ungültige Zahlungen dürfen nicht als automatisch erfüllt behandelt werden**; außergewöhnliche Zahlungen erfordern eine manuelle Prüfung.

**Bestehende Installationen:** Führen Sie das Aktualisierungsverfahren des Plugins einmal aus, um `plugin_buycourses_btcpay_account` anzulegen. Ein Administrator kann `/plugin/BuyCourses/update.php` öffnen oder die BTCPay-Zahlungskonfiguration speichern, wodurch auch sichergestellt wird, dass die Plugin-Tabelle vorhanden ist. Diese Aktualisierung gilt speziell für BuyCourses und ist keine globale Datenbankmigration.

BTCPay ist hier **nicht** als Gateway für wiederkehrende Dienste dokumentiert; gehen Sie nicht davon aus, dass es automatische Abonnementverlängerungen im Stil von Stripe/PayPal umsetzt.

## Lebenszyklus wiederkehrender Dienste

Lernende können **Meine Dienste** nutzen, um ihre aktiven wiederkehrenden Dienste sowie ihre Kauf- und Zahlungshistorie einzusehen. Für Dienste mit unterstützten automatischen Verlängerungen gilt:

* Jede Verlängerungszahlung hat einen eigenen historischen Datensatz und eine eigene Quittung.
* Das Kündigen einer Verlängerung verhindert künftige Abbuchungen, lässt den bezahlten Dienst jedoch bis zum Ablauf des aktuellen bezahlten Zeitraums zugänglich.
* Administratoren können Verlängerungen auch über den **Dienstverkaufsbericht** kündigen.
* Ein aktives, ausstehendes oder anderweitig laufendes wiederkehrendes Abonnement ist vor Doppelkäufen geschützt.
* Ein abgelaufener oder vollständig gekündigter Dienst kann erneut erworben werden.

**Kaufhistorie** und **Zahlungshistorie** sind getrennt: Ein einzelner Dienstkauf kann mehrere Verlängerungszahlungen umfassen. Schließen Sie nicht daraus, dass eine Verlängerungszahlung ein zweiter Kauf ist.

## Zahlungssummen im Dienstverkauf

Im **Dienstverkaufsbericht** für Administratoren helfen zwei Spalten, den ursprünglichen Bestellbetrag von den im Zeitverlauf eingezogenen Zahlungen zu unterscheiden:

* **Letzte Zahlung** zeigt das Datum der zuletzt erfassten erfolgreichen Zahlung für diesen Dienstverkauf. Ist kein Zahlungsdatum verfügbar, zeigt der Bericht einen Gedankenstrich.
* **Insgesamt eingezogen** zeigt den ursprünglich eingezogenen Kaufbetrag zuzüglich der erfassten erfolgreichen Verlängerungsbeträge, formatiert in der Dienstwährung. Dies entspricht nicht dem Preis eines einzelnen Abrechnungszeitraums.

Die Berechnung verwendet die Audit-Historie des Dienstverkaufs, vermeidet das Zählen doppelter Verlängerungsereignisse und berücksichtigt die anfängliche Stripe-Abonnementbelastung, ohne sie doppelt zu zählen. Gleichen Sie den Bericht bei außergewöhnlichen Zahlungs- oder Erstattungsfällen mit dem Zahlungsanbieter ab; der angezeigte Betrag ist keine Gateway-Auszahlung und kein separates Erstattungsbuch.

## Historische Stripe-Abonnements

BuyCourses kann die Stripe-Rechnungshistorie für ältere wiederkehrende Dienste abgleichen, deren Verlängerungstransaktionen im Audit-Protokoll des Plugins nicht vollständig erfasst wurden. Die Ansicht **Meine Dienste** und der Dienstverkaufsbericht können diese Datensätze aktualisieren und den lokal bekannten bezahlten Zeitraum sowie die Summen aktualisieren. Administratoren sollten außergewöhnliche Abweichungen in der Zahlungshistorie anhand von Stripe prüfen, anstatt Verkäufe direkt zu bearbeiten.

## Verkaufsberichte filtern

Der **Kurs- und Sitzungsverkaufsbericht** kann nach Bestellstatus, Benutzer, Datumsbereich oder E-Mail gefiltert werden. Optionale Produktfilter ermöglichen es, die Ergebnisse nach Produkttyp und Produktname einzugrenzen. Der **Dienstverkaufsbericht** unterstützt die Statusfilterung sowie die Suche nach Benutzer, E-Mail, Name und Bestellreferenz sowie eine Suche nach dem Dienstnamen. Prüfen Sie die aktiven Filter, bevor Sie Verkäufe exportieren oder abgleichen; die beiden Berichtsansichten haben unterschiedliche Filtersteuerungen.

Siehe [BuyCourses-Verkaufsfilter PR #9387](https://github.com/chamilo/chamilo-lms/pull/9387).

## Lebenszyklus abonnementgebundener Kurse und Schutzmechanismen bei der Löschung

BuyCourses kann Kurse, die mit wiederkehrenden Dienstabonnements verknüpft sind, schließen, ausblenden und reaktivieren, wenn sich ihr Zahlungsstatus ändert. Im **Subscription behavior JSON** eines Dienstes legt `hide_after_days` die Verzögerung nach dem Schließen fest, bevor ein Kurs ausgeblendet wird (Standard: 30 Tage), während `delete_after_days` die Verzögerung nach dem Ausblenden bis zur endgültigen Löschung angibt. Die Löschung ist standardmäßig deaktiviert (`null`); nur ein positiver Wert macht einen Kurs dafür geeignet.

Administratoren können geeignete, ausstehende und blockierte Kurse unter `/admin/buycourses/course-lifecycle` prüfen. Die Oberfläche unterstützt eine nicht destruktive Simulation und die gezielte Löschung von **einem geeigneten Kurs pro Ausführung**, abgesichert durch eine ausdrückliche Bestätigung. Der CLI-Prozessor `chamilo:buycourses:process-recurring-subscriptions` unterstützt außerdem `--dry-run`, `--delete-expired` und `--max-deletions` (1–25). Ohne `--delete-expired` löscht er keine Kurse endgültig.

**Die endgültige Löschung ist destruktiv.** Erstellen Sie Sicherungen und testen Sie zuerst mit entbehrlichen Kursen. Eignungsprüfungen schützen aktive Verkäufe, sitzungsgebundene Kurse und uneinheitliche Eigentumsverhältnisse; die automatische Löschung ist bei Installationen mit mehreren Zugriffs-URLs blockiert. Prüfen Sie das Verhalten bei gleichzeitiger Verlängerung und Löschung, bevor Sie eine destruktive Bereinigung in der Produktion planen. Siehe [PR zum Kurslebenszyklus bei Abonnements #9442](https://github.com/chamilo/chamilo-lms/pull/9442).

## Betriebliche Prüfungen

Testen Sie nach einem Upgrade einen vollständigen Kurskauf, einen Sitzungskauf, falls angeboten, einen verzögerten oder erneut zugestellten Webhook, abgelaufene und teilweise bezahlte BTCPay-Rechnungen, eine automatische Verlängerung sowie eine Kündigung mit Zugriff bis zum Ende des bezahlten Zeitraums. Halten Sie Zugangsdaten und Webhook-Geheimnisse aus Screenshots, Protokollen und Support-Tickets heraus.

## Absicherung von Zahlungen

### Betragsprüfung am Gateway (Redsys / Cecabank)

Wenn die Bank der Plattform mitteilt, dass eine Zahlung erfolgreich war, vergleicht BuyCourses den von der Bank belasteten Betrag (in Cent, aus der signierten Benachrichtigung) mit dem Preis des Verkaufs. Weichen sie voneinander ab, wird die Benachrichtigung abgelehnt, der Verkauf bleibt ausstehend und eine Zeile `[BuyCourses] Redsys notification refused` oder `[BuyCourses] Cecabank notification refused` wird in das PHP-Fehlerprotokoll geschrieben. Normale Zahlungen bleiben davon unberührt.

Bleibt ein Verkauf ausstehend, obwohl der Käufer bezahlt hat, prüfen Sie das Protokoll: Eine Preisänderung nach Erstellung der Bestellung oder eine Teilzahlung wird dort sichtbar. Schließen Sie einen solchen Verkauf nach Prüfung manuell über den Verkaufsbericht ab.

### Sicherheitstoken

* Coupon-Formulare (hinzufügen / konfigurieren), das öffentliche Formular der Tarifkarten und die Auszahlungsaktionen verwenden denselben BuyCourses-Admin-Token wie jede andere Admin-Seite des Plugins. Ein lange geöffnetes Formular funktioniert weiterhin, solange die Sitzung aktiv ist; nach dem Ab- und erneuten Anmelden laden Sie die Seite neu, bevor Sie speichern (andernfalls wird die Meldung „Not validated“ angezeigt).
* Die Seite „Rechnung anfordern“ (`request_invoice.php`) und der Web-Auslöser von `process_recurring_subscriptions.php` benötigen den Token im Link (`buycourses_admin_sec_token=...`). Links, die ohne ihn als Lesezeichen gespeichert oder per E-Mail versendet wurden, zeigen „Not validated“. Die Ausführung über die Befehlszeile bzw. Cron (`php .../process_recurring_subscriptions.php` oder der Konsolenbefehl) bleibt unverändert und benötigt keinen Token.
* Erfolgsseiten (PayPal, Stripe, Abonnements, Dienste) zeigen einen Verkauf nur dem Benutzer an, der ihn getätigt hat.
* Auszahlungsaktionen (PayPal-Massenzahlung, Stornierung einer Auszahlung) sind auf Plattformadministratoren beschränkt (Sitzungsadministratoren werden nicht mehr akzeptiert) und müssen als POST mit dem Token gesendet werden.

### Datumsangaben

Das Enddatum eines Abonnementverkaufs wird nun stets in UTC berechnet, ebenso wie das Verkaufsdatum, unabhängig von der Zeitzone des Servers.

### Grenzen bei mehreren URLs

Die bei Ablauf eines Dienstes angewendeten Grenzen für Kurserstellung und Hosting folgen derselben Regel wie der Rest der Plattform: Eine Einstellung, die auf der Haupt-URL gesperrt oder als nicht änderbar gekennzeichnet ist, kann von einer anderen URL nicht überschrieben werden.

Änderungen: [BTCPay #9286](https://github.com/chamilo/chamilo-lms/pull/9286), [wiederkehrende Dienste #9288](https://github.com/chamilo/chamilo-lms/pull/9288), [Stripe-Abgleich #9293](https://github.com/chamilo/chamilo-lms/pull/9293), [Summen von Dienstverkäufen #9220](https://github.com/chamilo/chamilo-lms/pull/9220).