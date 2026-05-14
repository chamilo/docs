# Backend

Das Backend von Chamilo 2.0 basiert auf Symfony 6.4 mit Doctrine ORM und API Platform.

* **[Symfony-Architektur](symfony-architecture.md)** — Bundles, Dienste und die allgemeine Backend-Struktur
* **[Entitäten und Doctrine](entities-and-doctrine.md)** — Die Doctrine-Entitätsklassen und ihre Beziehungen
* **[Ressourcensystem](resource-system.md)** — Die Abstraktion von ResourceNode/ResourceFile (zentrales architektonisches Konzept)
* **[Controller](controllers.md)** — Organisation der Controller und Routing-Muster
* **[Ereignisse und Listener](events-and-listeners.md)** — Wie Chamilo das Symfony-Ereignissystem nutzt
* **[Einstellungssystem](settings-system.md)** — Die Einstellungsschemata in `src/CoreBundle/Settings/` und wie die Plattformkonfiguration funktioniert