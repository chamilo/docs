# URLs d'accès

Les URLs d'accès permettent à une seule installation de Chamilo de servir plusieurs portails distincts.

## Cas d'utilisation

* **Déploiements multi-locataires** — Héberger des portails de formation séparés pour différentes organisations sur un seul serveur
* **Portails départementaux** — Offrir à chaque département son propre portail personnalisé (par exemple, `hr.formation.entreprise.com`, `it.formation.entreprise.com`)
* **Portails régionaux** — Séparer les portails selon les régions ou les langues

## Fonctionnement

Chaque URL d'accès constitue un point d'entrée distinct vers la même installation de Chamilo :

* Les utilisateurs peuvent être assignés à une ou plusieurs URLs d'accès
* Les cours et les sessions appartiennent à des URLs d'accès spécifiques
* Les paramètres de la plateforme peuvent être personnalisés par URL d'accès
* L'image de marque et les thèmes peuvent différer selon l'URL
* Les utilisateurs d'un portail ne peuvent pas voir les utilisateurs ou les cours d'un autre portail (sauf si un partage explicite est configuré)

## Configuration

### Activation du multi-URL

Le multi-URL doit être activé dans la configuration de Chamilo (généralement dans les paramètres d'environnement). Cela est habituellement fait lors de la configuration initiale.

### Création d'une URL d'accès

1. Depuis le panneau d'administration, accédez à **URLs d'accès**
2. Cliquez sur **Ajouter une URL**
3. Saisissez l'URL (par exemple, `https://portail2.votresite.com`)
4. Configurez les paramètres spécifiques à cette URL
5. Enregistrez

### Attribution des utilisateurs et des cours

* **Utilisateurs** — Assignez des utilisateurs à des URLs d'accès spécifiques. Un utilisateur peut appartenir à plusieurs URLs.
* **Cours** — Assignez des cours à des URLs d'accès spécifiques
* **Sessions** — Assignez des sessions à des URLs d'accès spécifiques

### Paramètres par URL

Chaque URL d'accès peut avoir ses propres :

* **Thème de couleur** — Une image de marque visuelle différente
* **Nom et logo de la plateforme** — Une identité personnalisée
* **Paramètres personnalisés** — Certains paramètres de la plateforme peuvent être adaptés par URL

## Conseils

* **Décidez tôt** — Si vous optez pour une configuration multi-URL, il est préférable de le faire dès le début de votre projet Chamilo, car cela nécessite de laisser la première URL relativement vide de contenu. Activer le multi-URL par la suite est plus complexe (nécessite des modifications manuelles dans les bases de données).
* **Planifiez la structure des URLs** — Décidez de votre schéma d'URL avant de créer des URLs d'accès, car modifier les URLs ultérieurement affecte tous les liens et signets existants
* **Configuration DNS** — Chaque URL d'accès doit pointer vers le même serveur Chamilo. Configurez les enregistrements DNS en conséquence.
* **Administrateur global** — Utilisez le rôle d'Administrateur Global pour gérer l'ensemble des URLs d'accès