# Glossaire

Termes destinés aux développeurs utilisés tout au long de ce guide.

| Terme | Définition |
|------|-----------|
| **API Platform** | Un framework PHP pour construire des API REST et GraphQL, intégré à Symfony. Chamilo l’utilise pour générer automatiquement les points de terminaison d’API à partir des entités Doctrine. |
| **Bundle** | Une unité d’organisation Symfony comparable à un plugin ou un module. Chamilo en compte trois : CoreBundle, CourseBundle, LtiBundle. |
| **Composable** | Un modèle Vue 3 permettant d’extraire et de réutiliser une logique réactive. Stocké dans `assets/vue/composables/`. |
| **Doctrine ORM** | Le mappeur objet-relationnel PHP utilisé par Chamilo. Il associe les classes d’entités PHP aux tables de la base de données. |
| **Entity** | Une classe PHP annotée avec des attributs Doctrine qui correspond à une table de base de données. |
| **Encore** | Symfony Webpack Encore — une surcouche autour de Webpack qui simplifie la configuration de compilation du frontend. |
| **Flysystem** | Une bibliothèque PHP d’abstraction du système de fichiers. Chamilo l’utilise pour prendre en charge le stockage local, S3, Azure et GCS. |
| **JWT** | JSON Web Token — le mécanisme d’authentification de l’API REST. |
| **Pinia** | La bibliothèque de gestion d’état recommandée pour Vue 3. Utilisée pour les nouveaux stores dans Chamilo ; les stores Vuex hérités coexistent encore à ses côtés. |
| **PrimeVue** | La bibliothèque de composants d’interface Vue 3 utilisée par Chamilo. Fournit boutons, tableaux, dialogues, etc. |
| **ResourceNode** | L’entité centrale du système de ressources de Chamilo. Chaque élément de contenu de cours possède un ResourceNode. |
| **ResourceFile** | Une entité représentant un fichier attaché à un ResourceNode. Stocké via Flysystem. |
| **ResourceLink** | Une entité contrôlant la visibilité et l’accès selon le contexte cours/session/groupe. |
| **SCORM** | Sharable Content Object Reference Model. Une norme e-learning pour l’empaquetage de contenus. |
| **Settings Schema** | Une classe PHP définissant une catégorie de paramètres de la plateforme (par ex. SecuritySettingsSchema). |
| **Voter** | Un composant de sécurité Symfony qui décide si un utilisateur peut effectuer une action sur une ressource. |
| **Webpack** | Le bundler de modules JavaScript qui compile les composants Vue, le SCSS et le TypeScript en paquets prêts pour le navigateur. |