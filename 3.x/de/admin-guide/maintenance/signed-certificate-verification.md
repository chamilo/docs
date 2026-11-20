# Verifizierung signierter Zertifikate

Chamilo kann **digital signierte Nachweise** für Notenbuch-Zertifikate ausstellen und optional einen Nachweis-Fingerabdruck im **Sepolia-Ethereum-Testnetz** verankern. Die Signatur und die Verifizierungsseite unterscheiden sich von gewöhnlichen PDF-Zertifikaten.

## Signierte Nachweise aktivieren

Aktivieren Sie unter **Administration > Konfigurationseinstellungen > Zertifikate** die Einstellung `certificate.blockchain_verification_enabled`, wenn Ihre Einrichtung diese Funktion nutzen möchte. Sie ist standardmäßig deaktiviert. Das Portal muss für die Ausstellung von Nachweisen HTTPS verwenden.

## Die Einwilligung der Lernenden hat Vorrang

Die Inhaberin oder der Inhaber eines Zertifikats öffnet **Meine Zertifikate** und wählt ausdrücklich **Veröffentlichung genehmigen**. Die Einwilligung umfasst einen öffentlich verifizierbaren Nachweis mit Name der Inhaberin oder des Inhabers, Kurs, Punktzahl und Ausstellungsdatum sowie optional den SHA-256-Fingerabdruck auf Sepolia. Die Genehmigung erfolgt nicht automatisch. Die lernende Person kann später **Einwilligung widerrufen** wählen; der Widerruf wirkt sich auf die von der Verifizierungsseite angezeigte Gültigkeit aus, **kann einen bereits bestätigten Blockchain-Fingerabdruck jedoch nicht löschen**.

## Ausstellen, verifizieren und widerrufen

Eine direkt authentifizierte Plattformadministration kann in der Notenbuch-Liste **Zertifikate** den signierten Nachweis ausstellen, sobald die Inhaberin oder der Inhaber eingewilligt hat. Der resultierende Verifizierungslink verwendet `/certificates/verify/{token}`; eine Verifizierungsantwort im Format `.json` ist ebenfalls verfügbar. Die Seite prüft die kryptografische Signatur, die Einwilligung, den Widerruf, das Ablaufdatum und ob die zugrunde liegenden Zertifikatsinformationen noch mit der signierten Quelle übereinstimmen.

Wird ein Nachweis widerrufen, die Einwilligung zurückgezogen, das Zertifikat geändert oder ist die Signatur ungültig, zeigt die Verifizierung diesen Status an, anstatt einen gültigen Nachweis zu melden.

## Optionale Verankerung auf Sepolia

Eine Administration kann **Auf Sepolia-Testnet verankern** über eine unterstützte Browser-Wallet wählen oder **Bestehende Sepolia-Transaktion bestätigen**, um eine ausstehende Transaktion abzugleichen. Die Wallet muss mit Sepolia verbunden sein (Chain-ID `11155111`). Die Anwendung bestätigt die Transaktion über einen serverseitig konfigurierten **HTTPS-Sepolia-RPC-Endpunkt** (`CHAMILO_CERTIFICATE_SEPOLIA_RPC_URL`). Eine in der Anfrage mitgelieferte RPC-URL wird nicht akzeptiert.

Verankert wird ausschließlich der Nachweis-Fingerabdruck; personenbezogene Daten werden nicht als Transaktionsdaten übermittelt. Sepolia ist ein **Testnet**. Seine Einträge und seine Verfügbarkeit dürfen nicht als produktionsreife Garantie einer öffentlichen Blockchain dargestellt werden. Bewahren Sie Einrichtungsschlüssel und die RPC-Konfiguration sicher auf und planen Sie Verfahren zur Schlüsselwiederherstellung und zum Widerruf von Nachweisen.

Implementierung: [Verifizierung von Zertifikatsnachweisen #9298](https://github.com/chamilo/chamilo-lms/pull/9298).