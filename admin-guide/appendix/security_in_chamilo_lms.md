# Sicherheit bei Chamilo LMS

Während Chamilo Freie Software ist \(und damit jeder auf seinen Code zugreifen kann\), können Sie sicher sein, dass Sicherheit ein sehr wichtiges Element für das Entwicklungsteam und die offiziellen Anbieter ist. In diesem Abschnitt finden Sie einige Fakten zur Sicherheit, die Sie möglicherweise wissen möchten, ob Sie Chamilo jemals gegen proprietäre Software verteidigen müssen.

Die ersten Dinge zuerst. Proprietäre Software bedeutet im Allgemeinen, dass der Quellcode verborgen ist oder “obfuscated” durch Kompilierung. Dies bedeutet, dass Sie die Anwendung nicht von “just” herunterladen und den Code durchsehen können.

Open Source- und Freie-Software-Software bedeutet, dass Sie den Quellcode sehen können, was theoretisch auch bedeutet, dass Sie seine Schwächen leichter finden und letztendlich ausnutzen können.

An der Konzeption, die Menschen über proprietäre Software haben, stimmt inhärent nicht: Es ist **nicht schwer**, zum Quellcode zu gelangen. Wie viele Artikel erläutern werden, gibt es viele Tools zur De-Kompilierung, mit denen Sie den Code jeder kompilierten Anwendung analysieren können.

Ein weiterer Fall ist die Verwendung von Webanwendungen, bei denen Benutzer überhaupt keinen Zugriff auf den Code haben. Freie Software stellt diesen Code zum Download bereit, was bedeutet, dass eine kostenlose Software-Webanwendung einfacher analysiert werden kann als eine Closed Source-Anwendung. Und dieser Teil stimmt.

Das zweite große Missverständnis ist, dass eine Anwendung, die ihre Quelle nicht preisgibt, sicherer ist als eine Anwendung, die dies tut. Dies ist nicht wahr und ergibt sich in gewisser Weise aus dem “web 2.0” -Effekt: Ein System mit offenen Quellen lässt sich leichter von Personen überprüfen, die daran interessiert sind, es sicherer zu machen, und das Teilen gemeinsamer Sicherheitskonzepte für die verschiedenen Open-Source-Projekte erleichtert es, eine Software vor bösartig zu schützen -Angriffe.

Lassen Sie uns dies mit Fakten analysieren: Auf der Website von Secunia (einer auf Softwaresicherheit spezialisierten Agentur\) finden Sie alle öffentlich gemeldeten Sicherheitslücken. Jeder Bericht erhält, wenn er lange genug ungelöst bleibt, einen eindeutigen “CVE” -Code, der die Schwachstelle identifiziert und später Verweise darauf zulässt.

Chamilo hat seit seiner Gründung und bis jetzt nie mehr als 4 Kalendertage Zeit, um einen neuen Sicherheitslücken zu lösen, der ihnen gemeldet wurde. Sie können den Bericht hier einsehen: [http://secunia.com/advisories/product/34198/](http://secunia.com/advisories/product/34198/)

Ein proprietäres Produkt in der gleichen Kategorie, zum Beispiel Blackboard® Learn 9.x \(es ist die neueste Version\), muss noch ein im Juli 2012 veröffentlichtes Sicherheitsproblem beheben \(vor 8 Monaten\): [http://secunia.com/advisories/product/41718/?task=advisories](http://secunia.com/advisories/product/41718/?task=advisories). Es ist Academic Suite leidet immer noch unter einer Sicherheitslücke, die im Juli 2008 gemeldet wurde: [http://secunia.com/advisories/product/18189/?task=advisories](http://secunia.com/advisories/product/18189/?task=advisories)

Der Code von Blackboard ist nicht nur kompiliert: Er kann auch nicht heruntergeladen werden, sodass Angreifer nicht direkt darauf zugreifen können. Dennoch können Sicherheitslücken immer noch erkannt, gemeldet und über Jahre nicht behoben werden.

Die Stärke der Sicherheitskette ist die ihres schwächsten Gliedes, und meistens ist diese Verbindung die menschliche Faulheit. Bisher haben wir noch nie einen Bericht über Sicherheitslücken erhalten, die in Chamilo ausgenutzt werden, aber wir haben mehrere Berichte über Passwortdiebstahl erhalten, die durch eine schlechte Infrastruktur oder nur durch Ablenkung hervorgerufen wurden.

Zusammenfassend ist Chamilo genauso sicher, wenn nicht sogar sicherer als gleichwertige proprietäre Software. Wenn Sie Sicherheitsprobleme vermeiden möchten, stellen Sie sicher, dass Sie ein schwer zu erratendes Passwort verwenden und sich immer in einem sicheren Netzwerk verbinden. Im SSL-Kapitel auf Seite 88 finden Sie einige Tipps.