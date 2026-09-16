# Flux de travail Git

## Dépôt

Le code source de Chamilo est hébergé sur GitHub : [github.com/chamilo/chamilo-lms](https://github.com/chamilo/chamilo-lms)

## Gestion des branches

* **`master`** — Branche principale de développement
* Les branches de fonctionnalités sont créées à partir de `master` pour les nouveaux développements
* Les branches de version sont créées pour les versions stables

## Contribuer à une modification

1. **Forkez** le dépôt sur GitHub
2. **Clonez** votre fork localement
3. **Créez une branche** pour votre modification : `git checkout -b feature/my-feature`
4. **Effectuez vos modifications** en respectant les conventions de codage
5. **Validez** avec des messages de commit clairs et descriptifs
6. **Poussez** vers votre fork : `git push origin feature/my-feature`
7. **Créez une pull request** vers la branche `master`

## Messages de commit

Rédigez des messages de commit clairs qui expliquent **quoi** et **pourquoi** :

```
Glossaire : Ajout de la génération de termes assistée par IA

Les enseignants peuvent désormais générer des termes de glossaire en utilisant les fournisseurs d'IA configurés. Prend en charge un prompt configurable et un nombre de termes.
```

### Convention de préfixe d'outil

La ligne de sujet est préfixée par l'**outil ou la zone** concernée par la modification, suivie d'un deux-points. Nous utilisons une terminologie courte et partagée afin que le journal des modifications et `git log --oneline` puissent être parcourus rapidement par outil. Le préfixe est toujours sous la forme **singulière** du nom canonique de l'outil.

Format : `<Préfixe> : <Résumé impératif au présent>`

Exemples :

```
Document : Correction de la liste pour la vue étudiant
Exercice : Empêcher les titres de questions en double dans un quiz
Learnpath : Permettre le réordonnancement des chapitres par glisser-déposer
Internal : Refactorisation de l'hydratation de ResourceNode dans le normaliseur API
CI : Mise en cache des téléchargements Composer dans le workflow GitHub Actions
```

Si une modification concerne plusieurs outils, choisissez celui qui est le plus impacté ; les modifications véritablement transversales qui ne touchent que la structure du code (sans impact sur un outil utilisateur final) sont classées sous `Internal`. Les modifications uniquement liées à la documentation (ce site, le journal des modifications, les docblocks en ligne purement destinés à la référence) sont classées sous `Documentation`.

#### Préfixes autorisés

| Préfixe              | Portée / notes                                                                       |
|----------------------|--------------------------------------------------------------------------------------|
| `Admin`              |                                                                                      |
| `Announcement`       | Annonce                                                                              |
| `Attendance`         | Présence                                                                             |
| `Authentication`     | Authentification                                                                     |
| `Blog`               | Blog                                                                                 |
| `Calendar`           | Calendrier (pas "Agenda")                                                            |
| `Career`             | Carrière                                                                             |
| `Catalogue`          | Catalogue de cours et de sessions, y compris les "cours populaires" sur la page d'accueil |
| `Chat`               | Chat                                                                                 |
| `CI`                 | Intégration Continue, tests automatisés, etc.                                        |
| `Course description` | Description de cours                                                                 |
| `Course Progress`    | Progression de cours (pas "Avancement thématique")                                   |
| `Course settings`    | Paramètres de cours                                                                  |
| `Cron`               | Tâches planifiées                                                                    |
| `Dashboard`          | Tableau de bord                                                                      |
| `Display`            | Affichage                                                                            |
| `Document`           | Document                                                                             |
| `Documentation`      | Tout ce qui concerne exclusivement la documentation de Chamilo ou du code, le journal des modifications, etc. |
| `Dropbox`            | Dropbox                                                                              |
| `Exercise`           | Exercice (pas "Quiz")                                                                |
| `Extra Fields`       | Champs supplémentaires                                                               |
| `Forum`              | Forum                                                                                |
| `Glossary`           | Glossaire                                                                            |
| `Gradebook`          | Carnet de notes (inclut les certificats)                                             |
| `Group`              | Groupe (inclut les groupes de cours, les groupes globaux et les classes)             |
| `Help`               | Aide                                                                                 |
| `Hook`               | Pour le mécanisme interne de hook                                                    |
| `Install`            | Inclut les éléments liés à la mise à jour                                            |
| `Internal`           | Pour les modifications et corrections qui affectent principalement le code lui-même ou qui sont très globales par nature |
| `Language`           | Langue                                                                               |
| `Link`               | Lien                                                                                 |
| `Learnpath`          | Pour LP / Parcours d'apprentissage                                                   |
| `Maintenance`        | Outil de maintenance de cours : copies de cours, sauvegarde, restauration, etc.      |
| `Message`            | Message                                                                              |
| `Notebook`           | Carnet de notes                                                                      |
| `Optimization`       | Optimisation                                                                         |
| `Portfolio`          | Portfolio                                                                            |
| `Privacy`            | Confidentialité                                                                      |
| `Script`             | Pour ce qui se trouve dans `tests/scripts/`                                          |
| `Search`             | Recherche en texte intégral                                                         |
| `Security`           | Sécurité                                                                             |
| `Session`            | Session                                                                              |
| `Skill`              | Compétence                                                                           |
| `Social`             | Réseau social                                                                        |
| `SSO`                | Méthodes de Single Sign-On                                                           |
| `Survey`             | Sondage                                                                              |
| `System`             | Éléments liés principalement à l'hébergement et à l'ajustement fin au niveau serveur  |
| `Template`           | Modèle                                                                               |
| `Ticket`             | Ticket                                                                               |
| `Tracking`           | Suivi                                                                                |
| `User`               | Utilisateur                                                                          |
| `Webservice`         | Service web                                                                          |
| `Wiki`               | Wiki                                                                                 |
| `Work`               | Travail                                                                              |
| `WYSIWYG`            | Éditeur WYSIWYG                                                                      |
| `XAPI`               | XAPI                                                                                 |

## Revue de code

Les pull requests sont examinées par l'équipe de maintenance. Soyez prêt à :

* Répondre aux retours et effectuer des révisions
* Maintenir votre branche à jour avec `master`
* Vous assurer que les tests passent

## Signalement de problèmes

Signalez les bugs et les demandes de fonctionnalités sur le suivi des problèmes GitHub.