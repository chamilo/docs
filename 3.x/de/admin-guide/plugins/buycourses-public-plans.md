# Öffentliche und Aktionspläne von BuyCourses

Das Plugin **BuyCourses** kann einen öffentlichen kostenlosen Plan zusammen mit Aktionskarten anzeigen, die zu externen Angeboten führen. Dies ist vom kostenpflichtigen Kurs-/Sitzungskaufablauf des Plugins und von der Konfiguration wiederkehrender Dienstzahlungen getrennt.

## Öffentliche Pläne konfigurieren

1. Öffnen Sie den Administrationsbereich von BuyCourses und den Editor für die Karte des öffentlichen Plans.
2. Wählen Sie unter dem Plan **Kostenlos**, ob **Kostenlos anzeigen** aktiviert ist.
3. Geben Sie den übersetzten Titel, die Beschreibung und die Funktionsliste des kostenlosen Plans über die Sprachregisterkarten ein.
4. Fügen Sie bei Bedarf Aktionskarten hinzu. Konfigurieren Sie für jede Karte den Aktivierungsstatus, die Position, die Ziel-URL, eine optionale Bild-URL sowie den übersetzten Titel, die Beschreibung, die Funktionen und den Schaltflächentext.
5. Speichern Sie und verwenden Sie anschließend den verfügbaren Vorschau-/Kataloglink, um die öffentliche Darstellung in jeder konfigurierten Sprache zu prüfen.

Der Editor speichert die übersetzten Inhalte für mehrere Sprachen. Eine Aktionskarte ist ein **Link zu einem externen Angebot**, kein Nachweis einer abgeschlossenen Zahlung oder eines automatischen Abonnements in Chamilo.

## Grenzen bei der Kurserstellung

Der kostenlose Plan verwendet die standardmäßigen Grenzen der Plattform für die Kurserstellung. BuyCourses unterscheidet standardmäßige Kurskontingente von kostenpflichtigen Kurskontingenten. Wenn eine endliche Grenze konfiguriert ist, kann die Oberfläche zur Kurserstellung Nutzung und Fortschritt anzeigen; unbegrenzte Pläne benötigen keinen Prozentindikator.

Testen Sie die Grenzen mit einem Konto, das nur das Standardkontingent besitzt, und mit einem Konto, das das zutreffende kostenpflichtige Kontingent besitzt. Eine öffentliche Aktionskarte darf serverseitige Berechtigungen zur Kurserstellung niemals umgehen.

## Zahlungsverhalten

Karten öffentlicher Pläne ersetzen weder BTCPay, Stripe, PayPal noch die etablierten Abläufe des Plugins für Kurskäufe und wiederkehrende Dienste. Verwalten und testen Sie Zahlungsgateways weiterhin in der bestehenden BuyCourses-Konfiguration.

Siehe [BuyCourses: Zahlungen und wiederkehrende Dienste](buycourses.md). Implementierung: [PR #9369](https://github.com/chamilo/chamilo-lms/pull/9369).