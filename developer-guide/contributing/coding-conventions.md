# Conventions de codage

## PHP

* **Standard** : Style de codage PSR-12
* **Déclarations de type** : Utiliser les déclarations de type de PHP 8.2 (types de paramètres, types de retour, types de propriétés)
* **Types stricts** : Tous les fichiers PHP doivent déclarer `strict_types=1`
* **Espaces de noms** : Suivre l'autoloading PSR-4 (par exemple, `Chamilo\CoreBundle\Entity\User`)
* **Standards Symfony** : Suivre les standards de codage et les bonnes pratiques de Symfony

## JavaScript/Vue

* **ESLint + Prettier** : Le code est vérifié avec ESLint et formaté avec Prettier ; la configuration se trouve dans `eslint.config.mjs` à la racine du projet. `prettier-plugin-tailwindcss` est également activé pour le tri automatique des classes Tailwind.
* **Composition API** : Utiliser la syntaxe `<script setup>` de Vue 3 pour les nouveaux composants
* **TypeScript** : TypeScript est pris en charge ; utilisez-le pour un code sécurisé par type

## CSS

* **Tailwind CSS** : Privilégier les classes utilitaires plutôt que du CSS personnalisé
* **Nommage BEM** : Lorsque du CSS personnalisé est nécessaire, utiliser la convention de nommage BEM
* **SCSS** : Utiliser SCSS pour les feuilles de style complexes

## Outils d'analyse statique et de refactoring PHP

Le projet fournit des configurations pour trois outils supplémentaires :

| Outil | Fichier de configuration | Objectif |
|-------|--------------------------|----------|
| **PHPStan** | `phpstan.neon` | Analyse statique (niveau 5, scanne les répertoires `src/` et de test) |
| **Psalm** | `psalm.xml` | Deuxième passe d'analyse statique ; exécuté dans CI à chaque push |
| **Rector** | `rector.php` | Transformations et mises à niveau automatisées du code |

Exécutez-les via des raccourcis Composer : `composer phpstan`, `composer psalm`. Consultez [Testing](../contributing/testing.md) pour les commandes complètes.

## Général

* **Anglais** : Tous les commentaires de code, noms de variables et documentation doivent être en anglais
* **Traductions** : Tout texte destiné aux utilisateurs doit utiliser le système de traduction (Vue I18n pour le frontend, Symfony Translator pour le backend)
* **Pas de valeurs magiques** : Utiliser des constantes ou des énumérations au lieu de valeurs codées en dur