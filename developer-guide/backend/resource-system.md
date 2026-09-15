# Système de ressources

Le système de ressources est l’un des concepts architecturaux les plus importants de Chamilo 3.0. Il fournit une abstraction unifiée pour tout le contenu de cours — documents, exercices, parcours d’apprentissage, messages de forum, et plus encore.

## Concept central

Chaque élément de contenu de cours est représenté par un **ResourceNode**. Cela confère à tous les types de contenu un ensemble commun de capacités :

* **Contrôle de visibilité** — Afficher/masquer pour les apprenants
* **Contrôle d’accès** — Les voters de sécurité vérifient les permissions via le ResourceNode
* **Stockage de fichiers** — Les fichiers joints sont stockés via ResourceFile
* **Structure arborescente** — Les ResourceNodes forment un arbre (relations parent-enfant)
* **Piste d’audit** — Créateur, date de création, suivi des modifications

## Entités clés

### ResourceNode (`src/CoreBundle/Entity/ResourceNode.php`)

L’entité centrale. Chaque entité de contenu a une relation un-à-un avec un ResourceNode.

Champs clés :

| Field | Type | Description |
|-------|------|-------------|
| `id` | integer | Clé primaire |
| `uuid` | UUID v4 | Identifiant unique pour l’usage API |
| `title` | string | Titre d’affichage |
| `creator` | User | L’utilisateur qui a créé cette ressource |
| `resourceFile` | ResourceFile | Le fichier joint (le cas échéant) |
| `resourceType` | ResourceType | Le type de ressource (document, quiz, etc.) |
| `parent` | ResourceNode | Parent dans l’arbre des ressources |
| `children` | Collection | ResourceNodes enfants |
| `resourceLinks` | Collection | Liens de visibilité et d’accès |

L’arbre utilise la stratégie **materialized path** de Gedmo pour des requêtes hiérarchiques efficaces.

### ResourceFile (`src/CoreBundle/Entity/ResourceFile.php`)

Stocke les données de fichier réelles d’une ressource :

| Field | Type | Description |
|-------|------|-------------|
| `id` | integer | Clé primaire |
| `title` | string | Nom de fichier d’origine |
| `mimeType` | string | Type MIME |
| `originalName` | string | Nom d’origine du téléversement |
| `size` | integer | Taille du fichier en octets |
| `crop` | string | Données de recadrage (pour les images) |

Le stockage des fichiers est géré par Flysystem, de sorte que les fichiers peuvent se trouver sur le disque local, S3, Azure ou GCS selon la configuration.

### ResourceLink

Contrôle la visibilité et l’accès par contexte. Il existe 3 types de contexte principaux :

1. Course
2. Session
3. Group (dans un cours)

Ainsi, l’entité ResourceLink reflète la combinaison de ces 3 types de contexte et établit une visibilité pour ce contexte complet :

| Field | Type | Description |
|-------|------|-------------|
| `course` | Course | Le cours auquel appartient la ressource |
| `session` | Session | La session (null pour le cours de base) |
| `group` | CGroup | Le groupe (null pour l’ensemble du cours) |
| `visibility` | integer | Visible, invisible ou supprimé |

Cela permet au même ResourceNode d’avoir une visibilité différente selon les contextes (par ex. visible dans une session mais masqué dans une autre).

Cela est défini automatiquement lors de l’utilisation de l’interface et de la décision, par exemple, qu’une ressource est spécifique à une session, visible pour tous les groupes d’un cours donné dans une session donnée, mais invisible dans le cours de base ou dans une autre session.

Par défaut, les ressources visibles dans un cours de base le sont aussi dans toutes les sessions de ce cours, mais le tuteur du cours peut décider de masquer une ressource d’une session particulière. Dans ce cas, on récupère la visibilité spécifique de cette ressource dans cette session et on constate qu’elle a une visibilité de 0, de sorte que l’élément n’apparaîtra pas aux apprenants dans cette session, tandis que l’absence de visibilité spécifique à la session dans les autres sessions fera que la ressource utilisera la visibilité du cours de base (et la ressource s’affichera pour les apprenants).

## Intégration API Platform

ResourceNode est exposé comme ressource API Platform avec de la sécurité :

```php
#[ApiResource(
    operations: [
        new Get(security: "is_granted('VIEW', object)"),
        new Put(security: "is_granted('EDIT', object)"),
        new Delete(security: "is_granted('DELETE', object)"),
        new GetCollection(security: "is_granted('ROLE_USER')"),
    ]
)]
```

## Comment les entités de contenu se connectent

Les entités de contenu de cours (CDocument, CQuiz, CLp, etc.) étendent `AbstractResource` ou implémentent `ResourceInterface`, ce qui leur confère une relation `resourceNode` :

```php
// In CDocument entity:
#[ORM\OneToOne(targetEntity: ResourceNode::class)]
private ResourceNode $resourceNode;
```

Lorsque vous créez un CDocument, un ResourceNode est automatiquement créé en parallèle, offrant une gestion unifiée des ressources.

## Implications pratiques

Lorsque vous travaillez avec le contenu de cours :

1. **Création de contenu** — Créer à la fois l’entité de contenu ET son ResourceNode
2. **Vérification des permissions** — Utiliser les voters de sécurité du ResourceNode
3. **Gestion des fichiers** — Joindre les fichiers via ResourceFile
4. **Contrôle de la visibilité** — Créer/modifier des ResourceLinks
5. **Construction d’arbres** — Utiliser la relation parent-enfant sur ResourceNode pour les structures de dossiers (par ex. dossiers de documents)