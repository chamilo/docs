# Système de Ressources

Le système de ressources est l'un des concepts architecturaux les plus importants de Chamilo 2.0. Il fournit une abstraction unifiée pour tout le contenu des cours — documents, exercices, parcours d'apprentissage, messages de forum, et bien plus encore.

## Concept Central

Chaque élément de contenu de cours est représenté par un **ResourceNode**. Cela confère à tous les types de contenu un ensemble commun de capacités :

- **Contrôle de visibilité** — Afficher/masquer pour les apprenants
- **Contrôle d'accès** — Les votants de sécurité vérifient les permissions via le ResourceNode
- **Stockage de fichiers** — Les fichiers attachés sont stockés via ResourceFile
- **Structure arborescente** — Les ResourceNodes forment un arbre (relations parent-enfant)
- **Piste d'audit** — Créateur, date de création, suivi des modifications

## Entités Clés

### ResourceNode (`src/CoreBundle/Entity/ResourceNode.php`)

L'entité centrale. Chaque entité de contenu a une relation un-à-un avec un ResourceNode.

Champs clés :

| Champ | Type | Description |
|-------|------|-------------|
| `id` | integer | Clé primaire |
| `uuid` | UUID v4 | Identifiant unique pour l'utilisation de l'API |
| `title` | string | Titre affiché |
| `creator` | User | L'utilisateur qui a créé cette ressource |
| `resourceFile` | ResourceFile | Le fichier attaché (si existant) |
| `resourceType` | ResourceType | Le type de ressource (document, quiz, etc.) |
| `parent` | ResourceNode | Parent dans l'arbre des ressources |
| `children` | Collection | ResourceNodes enfants |
| `resourceLinks` | Collection | Liens de visibilité et d'accès |

L'arbre utilise la stratégie de **chemin matérialisé** de Gedmo pour des requêtes hiérarchiques efficaces.

### ResourceFile (`src/CoreBundle/Entity/ResourceFile.php`)

Stocke les données réelles du fichier pour une ressource :

| Champ | Type | Description |
|-------|------|-------------|
| `id` | integer | Clé primaire |
| `title` | string | Nom de fichier original |
| `mimeType` | string | Type MIME |
| `originalName` | string | Nom d'origine lors du téléversement |
| `size` | integer | Taille du fichier en octets |
| `crop` | string | Données de recadrage (pour les images) |

Le stockage des fichiers est géré par Flysystem, permettant ainsi de stocker les fichiers sur un disque local, S3, Azure ou GCS selon la configuration.

### ResourceLink

Contrôle la visibilité et l'accès par contexte. Il existe 3 types de contextes principaux :

1. Cours
2. Session
3. Groupe (dans un cours)

Ainsi, l'entité ResourceLink reflète la combinaison de ces 3 types de contextes et établit une visibilité pour ce contexte complet :

| Champ | Type | Description |
|-------|------|-------------|
| `course` | Course | À quel cours la ressource appartient |
| `session` | Session | Quelle session (null pour le cours de base) |
| `group` | CGroup | Quel groupe (null pour l'ensemble du cours) |
| `visibility` | integer | Visible, invisible ou supprimé |

Cela permet au même ResourceNode d'avoir une visibilité différente selon les contextes (par exemple, visible dans une session mais masqué dans une autre).

Cela est défini automatiquement lors de l'utilisation de l'interface et en décidant, par exemple, qu'une ressource est spécifique à une session et sera visible pour tous les groupes d'un cours donné dans une session donnée, mais invisible dans le cours de base ou dans une autre session.

Par défaut, les ressources visibles dans un cours de base sont également visibles dans toutes les sessions de ce cours, mais le tuteur du cours peut décider de masquer une ressource pour une session spécifique. Dans ce cas, nous récupérerons la visibilité spécifique pour cette ressource dans cette session et constaterons qu'elle a une visibilité de 0, donc l'élément n'apparaîtra pas aux apprenants dans cette session, tandis qu'une absence de visibilité spécifique à la session dans d'autres sessions fera que la ressource utilisera la visibilité du cours de base (et la ressource sera visible pour les apprenants).

## Intégration avec API Platform

ResourceNode est exposé comme une ressource API Platform avec sécurité :

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

## Connexion des Entités de Contenu

Les entités de contenu de cours (CDocument, CQuiz, CLp, etc.) étendent `AbstractResource` ou implémentent `ResourceInterface`, ce qui leur confère une relation `resourceNode` :

```php
// Dans l'entité CDocument :
#[ORM\OneToOne(targetEntity: ResourceNode::class)]
private ResourceNode $resourceNode;
```

Lorsque vous créez un CDocument, un ResourceNode est automatiquement créé en parallèle, offrant une gestion unifiée des ressources.

## Implications Pratiques

Lorsque vous travaillez avec du contenu de cours :

1. **Création de contenu** — Créez à la fois l'entité de contenu ET son ResourceNode
2. **Vérification des permissions** — Utilisez les votants de sécurité du ResourceNode
3. **Gestion des fichiers** — Attachez les fichiers via ResourceFile
4. **Contrôle de la visibilité** — Créez/modifiez les ResourceLinks
5. **Construction d'arbres** — Utilisez la relation parent-enfant sur ResourceNode pour les structures de dossiers (par exemple, dossiers de documents)