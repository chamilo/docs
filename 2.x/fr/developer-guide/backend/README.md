# Backend

Le backend de Chamilo 2.0 est construit sur Symfony 6.4 avec Doctrine ORM et API Platform.

* **[Architecture Symfony](symfony-architecture.md)** — Bundles, services et structure générale du backend
* **[Entités et Doctrine](entities-and-doctrine.md)** — Les classes d'entités Doctrine et leurs relations
* **[Système de ressources](resource-system.md)** — L'abstraction ResourceNode/ResourceFile (concept architectural clé)
* **[Contrôleurs](controllers.md)** — Organisation des contrôleurs et modèles de routage
* **[Événements et écouteurs](events-and-listeners.md)** — Comment Chamilo utilise le système d'événements de Symfony
* **[Système de paramètres](settings-system.md)** — Les schémas de paramètres dans `src/CoreBundle/Settings/` et le fonctionnement de la configuration de la plateforme