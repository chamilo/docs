# Flux de travail Git

## Dépôt

Le code source de Chamilo est hébergé sur GitHub : [github.com/chamilo/chamilo-lms](https://github.com/chamilo/chamilo-lms)

## Branches

* **`master`** — Branche principale de développement
* Les branches de fonctionnalité sont créées à partir de `master` pour les nouveaux développements
* Les branches de version sont créées pour les versions stables

## Contribuer une modification

1. **Forkez** le dépôt sur GitHub
2. **Clonez** votre fork en local
3. **Créez une branche** pour votre modification : `git checkout -b feature/my-feature`
4. **Effectuez vos modifications** en suivant les conventions de codage
5. **Commitez** avec des messages de commit clairs et descriptifs
6. **Poussez** vers votre fork : `git push origin feature/my-feature`
7. **Créez une pull request** vers la branche `master`

## Messages de commit

Rédigez des messages de commit clairs qui expliquent **quoi** et **pourquoi** :

```
Glossary: Add AI-assisted term generation

Teachers can now generate glossary terms using configured AI
providers. Supports configurable prompt and term count.
```

### Convention de préfixe d’outil

La ligne de sujet est préfixée par l’**outil ou le domaine** concerné par la modification, suivi d’un deux-points. Nous utilisons une terminologie courte et partagée afin que le journal des modifications et `git log --oneline` puissent être parcourus par outil. Le préfixe est toujours la forme **singulière** du nom canonique de l’outil.

Format : `<Prefix>: <Imperative summary in the present tense>`

Exemples :

```
Document: Fix list for student view
Exercise: Prevent duplicate question titles within a quiz
Learnpath: Allow reordering chapters via drag and drop
Internal: Refactor ResourceNode hydration in the API normalizer
CI: Cache Composer downloads in the GitHub Actions workflow
```

Si une modification concerne plusieurs outils, choisissez celui qui est le plus affecté ; les modifications véritablement transversales qui ne touchent que la structure du code (aucun outil destiné à l’utilisateur final) relèvent de `Internal`. Les modifications portant uniquement sur la documentation (ce site, le journal des modifications, les docblocks inline destinés uniquement à servir de référence) relèvent de `Documentation`.

#### Préfixes autorisés

| Prefix               | Scope / notes                                                                        |
|----------------------|--------------------------------------------------------------------------------------|
| `Admin`              |                                                                                      |
| `Announcement`       |                                                                                      |
| `Attendance`         |                                                                                      |
| `Authentication`     |                                                                                      |
| `Blog`               |                                                                                      |
| `Calendar`           | Pas « Agenda »                                                                       |
| `Career`             |                                                                                      |
| `Catalogue`          | Catalogue des cours et des sessions, y compris les « cours populaires » sur la page d'accueil |
| `Chat`               |                                                                                      |
| `CI`                 | Intégration continue, tests automatisés, etc.                                        |
| `Course description` |                                                                                      |
| `Course Progress`    | Pas « Avance thématique »                                                            |
| `Course settings`    |                                                                                      |
| `Cron`               |                                                                                      |
| `Dashboard`          |                                                                                      |
| `Display`            |                                                                                      |
| `Document`           |                                                                                      |
| `Documentation`      | Tout ce qui concerne exclusivement la documentation de Chamilo ou du code, le journal des modifications, etc. |
| `Dropbox`            |                                                                                      |
| `Exercise`           | Pas « Quiz »                                                                         |
| `Extra Fields`       |                                                                                      |
| `Forum`              |                                                                                      |
| `Glossary`           |                                                                                      |
| `Gradebook`          | Inclut les certificats                                                               |
| `Group`              | Inclut les groupes de cours, les groupes globaux et les classes                      |
| `Help`               |                                                                                      |
| `Hook`               | Pour le mécanisme interne de hooks                                                   |
| `Install`            | Inclut les éléments liés à la mise à niveau                                          |
| `Internal`           | Pour les modifications et correctifs qui affectent principalement le code lui-même ou qui sont de nature très globale |
| `Language`           |                                                                                      |
| `Link`               |                                                                                      |
| `Learnpath`          | Pour les LP / parcours d'apprentissage                                               |
| `Maintenance`        | L'outil de maintenance des cours : copies de cours, sauvegarde, restauration, etc.   |
| `Message`            |                                                                                      |
| `Notebook`           |                                                                                      |
| `Optimization`       |                                                                                      |
| `Portfolio`          |                                                                                      |
| `Privacy`            |                                                                                      |
| `Script`             | Pour ce qui se trouve dans `tests/scripts/`                                          |
| `Search`             | Recherche en texte intégral                                                          |
| `Security`           |                                                                                      |
| `Session`            |                                                                                      |
| `Skill`              |                                                                                      |
| `Social`             | Réseau social                                                                        |
| `SSO`                | Méthodes d'authentification unique (SSO)                                             |
| `Survey`             |                                                                                      |
| `System`             | Éléments liés principalement à l'hébergement et au réglage fin au niveau du serveur  |
| `Template`           |                                                                                      |
| `Ticket`             |                                                                                      |
| `Tracking`           |                                                                                      |
| `User`               |                                                                                      |
| `Webservice`         |                                                                                      |
| `Wiki`               |                                                                                      |
| `Work`               |                                                                                      |
| `WYSIWYG`            |                                                                                      |
| `XAPI`               |                                                                                      |

## Revue de code

Les pull requests sont examinées par l’équipe des mainteneurs. Soyez prêt à :

* Prendre en compte les retours et effectuer des révisions
* Maintenir votre branche à jour avec `master`
* Vous assurer que les tests passent

## Signalement des problèmes

Signalez les bogues et les demandes de fonctionnalités sur le suivi des issues GitHub.