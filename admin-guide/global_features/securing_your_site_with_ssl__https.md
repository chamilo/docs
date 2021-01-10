# Sicherung Ihrer Website mit SSL/HTTPS

Da Chamilo LMS in den letzten 12 Monaten immer beliebter geworden ist \(Erhöhung der Benutzeranzahl um 400%\), haben wir mehrere Hinweise auf Passwortdiebstahl erhalten und dass die Sicherheit von Chamilo in Frage gestellt werden könnte. Weitere Informationen zur Sicherheit in Chamilo in Chamilo LMS \(10.2\) im Anhang finden Sie weitere Informationen zur Sicherheit in Chamilo.

Das bisher schwächste Glied zu unseren Chamilo-Portalen war die Infrastruktur, in der Schüler (relativ leicht\) Zugriffe von einem Lehrer stehlen können, der über denselben Computerraum mit der Plattform verbunden ist\ \(aufgrund einiger Merkmale der Netzwerkausrüstung\). Es gibt viele Möglichkeiten, bei der Kommunikation eines anderen Benutzers mit dem Server zu “spy” zu gelangen, und eine der sichersten Möglichkeiten, diese Art von Diebstahl zu vermeiden, besteht darin, die gesamte Kommunikation zwischen dem Benutzer und dem Chamilo Server zu verschlüsseln.

Dies kann über SSL \(oder häufiger als HTTPS für das Erscheinen eines “s” in der URL dieser Portale\) geschehen, eine sichere und standardmäßige Möglichkeit, HTTP-Kommunikation im Internet zu verschlüsseln.

Leider muss aufgrund der inhärenten Sicherheit des Systems ein SSL-Zertifikat \(das für die sichere Kommunikation erforderlich ist\) für eine begrenzte Zeit “signed” \(virtuell) von einer anerkannten Behörde sein. Dies impliziert \(in den meisten Fällen bis jetzt\) Zahlung einer Gebühr zur Unterzeichnung des Zertifikats an diese Behörde. Mit anderen Worten, ein Zertifikat ist nicht kostenlos und nicht dauerhaft. Zum Beispiel könnte ein einfaches \(Lost Level of Security\) -Zertifikat, nur für einen einzelnen Domainnamen, zwischen 25 und 100 US-Dollar pro Jahr kosten.

Sie können “self-sign” Ihre Zertifikate, aber dies zeigt allen Benutzern beim ersten Zugriff auf das Portal einen beängstigenden Bildschirm an und fordert sie auf, eine Entscheidung zu treffen. Die Benutzer müssen mindestens dreimal in sehr spezifischen Optionen klicken, um auf die Website zu gelangen, wie die folgenden Screenshots zeigen.

![](../../.gitbook/assets/images52%20%281%29.png)Illustration 90: Browser warnen Benutzer von selbstsignierten SSL-Zertifikaten: Schritt 1/3: Klicken Sie auf den “I Understand the Risks” -Link \(Beispiel mit Mozilla Firefox\)

![](../../.gitbook/assets/images53%20%281%29.png)Illustration 91: Browser warnen Benutzer vor selbstsignierten SSL-Zertifikaten: Schritt 2/3: Klicken Sie auf die Schaltfläche "Add Exception"

![](../../.gitbook/assets/images60%20%281%29.png)Illustration 92: Browser warnen Benutzer vor selbstsignierten SSL-Zertifikaten: Schritt 3/3: Klick "Confirm Security Exception"

Diese ziemlich beängstigenden drei Schritte sind abgeschlossen, Ihr Benutzer hat Zugriff auf Ihre Website mit einer verschlüsselten Verbindung, aber der Prozess wird nicht für alle funktionieren.

Um diese Nachrichten zu vermeiden, müssen Sie ein SSL-Zertifikat erwerben \(wir hatten bisher einen vernünftigen Erfolg mit _RapidSSL_, aber es liegt ganz bei Ihnen, den richtigen Anbieter für SSL-Zertifikate für Sie zu wählen\).

Wenn Sie sich lieber für ein selbstsigniertes Zertifikat entscheiden möchten, weil Ihr Team eine begrenzte Anzahl von Personen ist, die es verwenden, und Sie wissen, dass sie die 3 Schritte der Zertifikatsannahme verwalten können, können Sie diesen Artikel befolgen, um es einzurichten: [https://beeznest.wordpress.com/2008/04/25/how-to-configure-https-on-apache-2/](https://beeznest.wordpress.com/2008/04/25/how-to-configure-https-on-apache-2/)

Es gibt keine sicherere und praktischere Möglichkeit, Ihre Verbindungen zu sichern als SSL. Versuchen Sie daher nicht, Ihren eigenen Sicherheitsmechanismus zu implementieren. Wenn Sie Kommentare zu SSL haben, sollten Sie sich direkt an die Community wenden, die den Standard verwaltet.