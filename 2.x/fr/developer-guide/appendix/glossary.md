# Glossaire

Termes axés sur les développeurs utilisés tout au long de ce guide.

| Terme | Définition |
|-------|------------|
| **API Platform** | Un framework PHP pour la création d'API REST et GraphQL, intégré à Symfony. Chamilo l'utilise pour générer automatiquement des points de terminaison API à partir des entités Doctrine. |
| **Bundle** | Une unité organisationnelle de Symfony similaire à un plugin ou un module. Chamilo en possède trois : CoreBundle, CourseBundle, LtiBundle. |
| **Composable** | Un modèle de Vue 3 pour extraire et réutiliser la logique réactive. Stocké dans `assets/vue/composables/`. |
| **Doctrine ORM** | Le mappeur objet-relationnel PHP utilisé par Chamilo. Il associe les classes d'entités PHP aux tables de la base de données. |
| **Entity** | Une classe PHP annotée avec des attributs Doctrine qui correspond à une table de base de données. |
| **Encore** | Symfony Webpack Encore — un wrapper autour de Webpack qui simplifie la configuration de la construction frontend. |
| **Flysystem** | Une bibliothèque d'abstraction de système de fichiers PHP. Chamilo l'utilise pour prendre en charge le stockage local, S3, Azure et GCS. |
| **JWT** | JSON Web Token — le mécanisme d'authentification pour l'API REST. |
| **Pinia** | La bibliothèque de gestion d'état recommandée pour Vue 3. Utilisée pour les nouveaux stores dans Chamilo ; les anciens stores Vuex coexistent avec elle. |
| **PrimeVue** | La bibliothèque de composants d'interface utilisateur Vue 3 utilisée par Chamilo. Fournit des boutons, des tableaux, des boîtes de dialogue, etc. |
| **ResourceNode** | L'entité centrale du système de ressources de Chamilo. Chaque élément de contenu de cours possède un ResourceNode. |
| **ResourceFile** | Une entité représentant un fichier attaché à un ResourceNode. Stocké via Flysystem. |
| **ResourceLink** | Une entité contrôlant la visibilité et l'accès par contexte de cours/session/groupe. |
| **SCORM** | Sharable Content Object Reference Model. Une norme d'e-learning pour l'empaquetage de contenu. |
| **Settings Schema** | Une classe PHP définissant une catégorie de paramètres de la plateforme (par exemple, SecuritySettingsSchema). |
| **Voter** | Un composant de sécurité Symfony qui décide si un utilisateur peut effectuer une action sur une ressource. |
| **Webpack** | Le bundler de modules JavaScript qui compile les composants Vue, SCSS et TypeScript en bundles prêts pour le navigateur. |