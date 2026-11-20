# Ausstellung und Verifizierung von Open Badges 2.0

Chamilo 3.1 kann **Open Badges 2.0**-Nachweise für erworbene Kompetenzen veröffentlichen, einschließlich eines Badge-Bildes, das eine eingebettete Assertion in den PNG-Metadaten enthält. Die Badge-Verifizierung verwendet öffentliche Endpunkte für Badge, Assertion und Aussteller.

## Aussteller und Kompetenzen konfigurieren

1. Legen Sie den **Institutionsnamen** der Plattform und eine gültige **Kontakt-E-Mail-Adresse des Administrators** fest; beide werden vom Ausstellerprofil benötigt.
2. Konfigurieren Sie die Kompetenz mit Titel, Beschreibung und Badge-Kriterien.
3. Fügen Sie gegebenenfalls ein gültiges PNG-Badge-Bild hinzu. Chamilo kann auch sein Standard-Badge-Bild verwenden, wenn die Kompetenz kein eigenes Asset besitzt.
4. Vergeben oder bestätigen Sie den Erwerb der Kompetenz für die lernende Person über den normalen Kompetenz-Workflow.

Die Nachweise hängen von der Beziehung zur erworbenen Kompetenz ab. Eine widerrufene oder nicht mehr erworbene Kompetenz-Assertion wird als widerrufen gemeldet. Kompetenz- und Badge-Ressourcen sind auf die entsprechende Zugriffs-URL beschränkt.

## Öffentliche Verifizierungsdaten

Jede Ausstellung verfügt über eine gehostete Assertion. Die zugehörigen URLs werden vom öffentlichen Stammverzeichnis der Anwendung abgeleitet und umfassen:

- `main/skills/assertion.php?issue=<issue-id>` — JSON-Assertion für eine bestimmte Kompetenzausstellung.
- `main/skills/class.php?id=<skill-id>` — Metadaten der Badge-Klasse, einschließlich Kriterien und Ausstellerreferenz.
- `main/skills/issuer.php` — Profil der ausstellenden Institution.
- `main/skills/image.php?id=<skill-id>` — Badge-Bildressource.

Die genau erzeugten URLs hängen vom öffentlichen Basispfad der Installation ab. Die Assertion enthält einen gesalzenen Hash der E-Mail-Adresse der empfangenden Person, anstatt die Klartext-E-Mail-Adresse zu veröffentlichen, und identifiziert den Aussteller sowie die erworbene Kompetenz. Das Badge-PNG kann die Assertion in einem `openbadges`-iTXt-Chunk enthalten.

## Ein ausgestelltes Badge validieren

Öffnen Sie die Endpunkte der gehosteten Assertion, der Badge-Klasse und des Ausstellers ohne angemeldete Sitzung. Sie sollten einen konsistent verknüpften Nachweis zurückgeben. Laden Sie das ausgestellte PNG über den unterstützten Exportablauf der Kompetenz herunter und prüfen Sie, ob die eingebettete Assertion mit der gehosteten Darstellung übereinstimmt. Wenn die Kompetenz widerrufen wurde, prüfen Sie, ob die Verifizierung den widerrufenen Status widerspiegelt.

Ein PNG mit ausschließlich visueller Badge-Grafik belegt **keinen** gültigen Nachweis. Verwechseln Sie die Ausstellung von Open Badges 2.0 nicht mit der davon unabhängigen Zertifikats- oder signierten PDF-Funktionalität.

Siehe [Kompetenzen verwalten](managing-skills.md) und [Verifizierung signierter Zertifikate](../maintenance/signed-certificate-verification.md). Implementierung: [PR #9346](https://github.com/chamilo/chamilo-lms/pull/9346).