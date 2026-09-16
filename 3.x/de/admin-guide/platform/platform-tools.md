# Plattform-Werkzeuge

Diese Seite behandelt die übrigen, kleineren Einträge im Block Plattformverwaltung.

## Extrafelder

**Plattform > Extrafelder** ist ein Typwähler, keine Feldliste selbst — er zeigt jeden Objekttyp, der benutzerdefinierte Felder unterstützt, und ein Klick führt zum jeweiligen Feldeditor dieses Typs. Verfügbare Typen sind unter anderem: Benutzer, Kurs, Sitzung, Frage, Lernpfad (sowie Lernpfad-Element/Ansicht), Kompetenz, Aufgabe (Arbeit), Karriere, Benutzerzertifikat, Umfrage, Nutzungsbedingungen, Forenkategorie, Forenbeitrag, Übung, Übungsverfolgung, Kursankündigung, Nachricht, Dokument, Anwesenheitskalender, Glossar, Korrekturkommentar zur Arbeit, Kalenderereignis und Portfolio (plus geplante Ankündigungen, sofern diese Funktion aktiviert ist).

Für den häufigsten Fall — benutzerdefinierte Benutzerprofilfelder — siehe [Benutzerprofilierung](../users/user-profiling.md); dort wird dieselbe zugrunde liegende Funktion aus der Benutzerverwaltung beschrieben.

## E-Mail-Vorlagen

**Plattform > E-Mail-Vorlagen** ermöglicht es, den Wortlaut bestimmter System-E-Mails (Registrierungsbestätigung, Abonnement-Benachrichtigungen und Ähnliches) zu überschreiben, ohne Serverdateien zu ändern. Jede Vorlage hat einen Titel, einen **Typ**, der der jeweiligen integrierten E-Mail entspricht, den Vorlagentext selbst (Klartext/Twig, kein Rich-Editor) sowie eine Markierung „als Standard setzen“ — pro Typ kann nur eine Vorlage der aktive Standard sein. Vorlagen gelten je Zugriffs-URL; es gibt kein eigenes Sprachfeld, die Sprachbehandlung dieser E-Mails entspricht daher dem, was der umgebende Code bereits tut.

Vorlagen werden aus Sicherheitsgründen in einer **sandboxed** Twig-Umgebung gerendert: nur eine kleine Menge an Tags und Filtern ist erlaubt, und die einzigen verfügbaren Daten sind das `User`-Objekt des Empfängers, referenziert als `user.getEmail()`, `user.getFirstname()` und ähnliche Getter (`getId`, `getUsername`, `getLastname`, `getStatus`, `getOfficialCode`, `getPhone`). Alles außerhalb dieser Allowlist erzeugt keinen lauten Fehler — es wird still leer gerendert und fällt dann auf die ursprüngliche integrierte Vorlage zurück. Halten Sie benutzerdefinierte Vorlagen einfach und testen Sie sie nach dem Bearbeiten (mit einer echten Registrierung oder einem Benachrichtigungsauslöser).

## Kontaktformular-Kategorien

**Plattform > Kontaktformular-Kategorien** verwaltet die Auswahlliste auf dem öffentlichen Formular **Kontakt** Ihres Portals. Jede Kategorie besteht nur aus einem Titel und einer Ziel-E-Mail-Adresse — welche Kategorie ein Besucher wählt, bestimmt, in welches Postfach die Nachricht geleitet wird. Nutzen Sie dies, um unterschiedliche Themen (Support, Vertrieb, Zulassung) an verschiedene Teams zu leiten, ohne separate Formulare zu bauen.

## Verknüpfungen zu Einstellungskategorien

Einige Blockeinträge sind lediglich direkte Links in bestimmte Kategorien der [Plattformeinstellungen](../platform-settings/README.md), keine eigenständigen Werkzeuge:

* **Plugins** und **Systemvorlagen** öffnen die Konfigurationseinstellungen vorgefiltert auf diese Kategorien
* **Regionen** tut dasselbe für die Einstellungen der Plattformregionen

## Gelegentlich sichtbare Einträge

Einige Einträge erscheinen nur, wenn die zugehörige Einstellung oder das Plugin aktiv ist; auf Ihrer Installation sehen Sie sie daher möglicherweise nicht:

* **Nutzungsbedingungen** — erscheint, wenn **Nutzungsbedingungen zulassen** aktiviert ist, zur Verwaltung des Texts, den Benutzer akzeptieren müssen
* **Benachrichtigungen** — erscheint, wenn die Plattformfunktion für Benachrichtigungsereignisse aktiviert ist
* **CMS**, **Wörterbuch**, **Justification** — jeweils an das eigene optionale Plugin gebunden, das installiert und aktiviert sein muss