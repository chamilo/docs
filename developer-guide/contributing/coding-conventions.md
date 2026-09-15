# Conventions de codage

## PHP

* **Standard** : style de codage PSR-12
* **Déclarations de types** : utiliser les déclarations de types PHP 8.3 (types de paramètres, types de retour, types de propriétés)
* **Types stricts** : tous les fichiers PHP doivent déclarer `strict_types=1`
* **Espaces de noms** : suivre l'autoloading PSR-4 (par ex. `Chamilo\CoreBundle\Entity\User`)
* **Standards Symfony** : suivre les standards de codage et les bonnes pratiques de Symfony

## JavaScript/Vue

* **ESLint + Prettier** : le code est analysé avec ESLint et formaté avec Prettier ; la configuration se trouve dans `eslint.config.mjs` à la racine du projet. `prettier-plugin-tailwindcss` est également activé pour le tri automatique des classes Tailwind.
* **Composition API** : utiliser la syntaxe `<script setup>` de Vue 3 pour les nouveaux composants
* **TypeScript** : TypeScript est pris en charge ; l'utiliser pour un code typé de manière sûre

## CSS

* **Tailwind CSS** : préférer les classes utilitaires au CSS personnalisé
* **Nommage BEM** : lorsque du CSS personnalisé est nécessaire, utiliser la convention de nommage BEM
* **SCSS** : utiliser SCSS pour les feuilles de style complexes

## Outils d'analyse statique PHP et de refactoring

Le projet fournit une configuration pour trois outils supplémentaires :

| Outil | Fichier de configuration | Objectif |
|------|------------|---------|
| **PHPStan** | `phpstan.neon` | Analyse statique (niveau 5, analyse `src/` et les répertoires de tests) |
| **Psalm** | `psalm.xml` | Second passage d'analyse statique ; s'exécute en CI à chaque push |
| **Rector** | `rector.php` | Transformations et mises à niveau automatisées du code |

Les exécuter via les raccourcis Composer : `composer phpstan`, `composer psalm`. Voir [Tests](../contributing/testing.md) pour les commandes complètes.

## Général

* **Anglais** : tous les commentaires de code, noms de variables et documentation doivent être en anglais
* **Traductions** : tout le texte visible par l'utilisateur doit utiliser le système de traduction (Vue I18n pour le frontend, Symfony Translator pour le backend)
* **Pas de valeurs magiques** : utiliser des constantes ou des énumérations plutôt que des valeurs en dur