# Entités et Doctrine

Chamilo 3.0 compte 314 entités Doctrine réparties dans deux bundles. Seules les principales sont mentionnées ci-dessous.

## Organisation des entités

### Entités du CoreBundle (213)

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

### Entités du CourseBundle (101)

Entités de contenu de cours — toutes préfixées par `C` :

| Catégorie | Exemples |
|----------|---------|
| **Documents** | `CDocument` |
| **Exercices** | `CQuiz`, `CQuizQuestion`, `CQuizAnswer`, `CQuizQuestionCategory` |
| **Parcours d'apprentissage** | `CLp`, `CLpItem`, `CLpView`, `CLpItemView`, `CLpCategory` |
| **Forums** | `CForum`, `CForumCategory`, `CForumThread`, `CForumPost` |
| **Travaux** | `CStudentPublication`, `CStudentPublicationAssignment`, `CStudentPublicationComment` |
| **Enquêtes** | `CSurvey`, `CSurveyQuestion`, `CSurveyAnswer`, `CSurveyInvitation` |
| **Présence** | `CAttendance`, `CAttendanceCalendar`, `CAttendanceResult` |
| **Blogs** | `CBlog`, `CBlogPost`, `CBlogComment`, `CBlogTask` |
| **Autres** | `CCalendarEvent`, `CGlossary`, `CLink`, `CLinkCategory`, `CNotebook`, `CWiki` |

## Convention de nommage

* Entités du CoreBundle : PascalCase standard (par ex. `User`, `Course`, `Session`)
* Entités du CourseBundle : préfixées par `C` (par ex. `CDocument`, `CQuiz`, `CLp`)

Ce préfixe distingue les entités de contenu liées à un cours des entités au niveau de la plateforme (conformément au nommage historique des tables de base de données). Cette distinction pourrait disparaître à long terme, à mesure que davantage d'outils seront convertis en outils globaux sans lien fort avec un cours spécifique.

## Relations clés

Les relations sont généralement indiquées par le séparateur `Rel`.

### User ↔ Course

```
User --[CourseRelUser]--> Course
```

`CourseRelUser` stocke le statut d'inscription (TEACHER = 1, STUDENT = 5).

### User ↔ Session ↔ Course

```
User --[SessionRelUser]--> Session --[SessionRelCourse]--> Course
User --[SessionRelCourseRelUser]--> (Session + Course)
```

### ResourceNode (abstraction du contenu)

Toutes les entités de contenu de cours se rattachent au système de ressources via `ResourceNode` :

```
CDocument --> ResourceNode --> ResourceFile
CQuiz ------> ResourceNode
CLp --------> ResourceNode
```

Voir [Système de ressources](resource-system.md) pour plus de détails.

## Extensions Doctrine

Chamilo utilise Gedmo Doctrine Extensions (via `stof/doctrine-extensions-bundle`) :

* **Tree** — Données hiérarchiques (ResourceNode utilise un chemin matérialisé)
* **Timestampable** — Champs `createdAt`/`updatedAt` automatiques
* **Sluggable** — Slugs adaptés aux URL
* **Sortable** — Collections ordonnables