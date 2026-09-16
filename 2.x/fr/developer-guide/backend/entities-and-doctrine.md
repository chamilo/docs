# Entités et Doctrine

Chamilo 2.0 compte 314 entités Doctrine réparties sur deux bundles. Ce qui suit ne mentionne que les principales.

## Organisation des Entités

### Entités de CoreBundle (213)

Entités au niveau de la plateforme :

| Catégorie | Exemples |
|----------|---------|
| **Utilisateurs** | `User`, `UserRelUser`, `AccessUrl`, `AccessUrlRelUser` |
| **Cours** | `Course`, `CourseCategory`, `CourseRelUser` |
| **Sessions** | `Session`, `SessionRelUser`, `SessionRelCourse`, `SessionRelCourseRelUser` |
| **Ressources** | `ResourceNode`, `ResourceFile`, `ResourceLink`, `ResourceType` |
| **Paramètres** | `SettingsCurrent`, `SettingsOptions` |
| **Messages** | `Message`, `MessageRelUser`, `MessageAttachment` |
| **Suivi** | `TrackELogin`, `TrackEOnline`, `TrackEDefault` |
| **Compétences** | `Skill`, `SkillRelUser`, `SkillRelProfile` |
| **IA** | `AiRequests` |
| **Plugins** | `Plugin`, `AccessUrlRelPlugin` |
| **Social** | `Usergroup`, `UsergroupRelUser` |
| **xAPI** | `XApiObject`, `XApiResult`, `XApiActivityState` |

### Entités de CourseBundle (101)

Entités de contenu de cours — toutes préfixées par `C` :

| Catégorie | Exemples |
|----------|---------|
| **Documents** | `CDocument` |
| **Exercices** | `CQuiz`, `CQuizQuestion`, `CQuizAnswer`, `CQuizQuestionCategory` |
| **Parcours d'apprentissage** | `CLp`, `CLpItem`, `CLpView`, `CLpItemView`, `CLpCategory` |
| **Forums** | `CForum`, `CForumCategory`, `CForumThread`, `CForumPost` |
| **Devoirs** | `CStudentPublication`, `CStudentPublicationAssignment`, `CStudentPublicationComment` |
| **Sondages** | `CSurvey`, `CSurveyQuestion`, `CSurveyAnswer`, `CSurveyInvitation` |
| **Présences** | `CAttendance`, `CAttendanceCalendar`, `CAttendanceResult` |
| **Blogs** | `CBlog`, `CBlogPost`, `CBlogComment`, `CBlogTask` |
| **Autres** | `CCalendarEvent`, `CGlossary`, `CLink`, `CLinkCategory`, `CNotebook`, `CWiki` |

## Convention de Nommage

* Entités de CoreBundle : PascalCase standard (par exemple, `User`, `Course`, `Session`)
* Entités de CourseBundle : préfixées par `C` (par exemple, `CDocument`, `CQuiz`, `CLp`)

Ce préfixe distingue les entités de contenu spécifiques à un cours des entités au niveau de la plateforme (en accord avec la nomenclature des tables de base de données héritées). Cette distinction pourrait disparaître à long terme à mesure que davantage d'outils seront convertis en outils globaux sans lien fort avec un cours spécifique.

## Relations Clés

Les relations sont généralement indiquées par le séparateur `Rel`.

### Utilisateur ↔ Cours

```
User --[CourseRelUser]--> Course
```

`CourseRelUser` stocke le statut d'inscription (TEACHER = 1, STUDENT = 5).

### Utilisateur ↔ Session ↔ Cours

```
User --[SessionRelUser]--> Session --[SessionRelCourse]--> Course
User --[SessionRelCourseRelUser]--> (Session + Course)
```

### ResourceNode (Abstraction de Contenu)

Toutes les entités de contenu de cours se connectent au système de ressources via `ResourceNode` :

```
CDocument --> ResourceNode --> ResourceFile
CQuiz ------> ResourceNode
CLp --------> ResourceNode
```

Voir [Système de Ressources](resource-system.md) pour plus de détails.

## Extensions Doctrine

Chamilo utilise les extensions Doctrine de Gedmo (via `stof/doctrine-extensions-bundle`) :

* **Tree** — Données hiérarchiques (ResourceNode utilise le chemin matérialisé)
* **Timestampable** — Champs automatiques `createdAt`/`updatedAt`
* **Sluggable** — Slugs adaptés aux URL
* **Sortable** — Collections ordonnables