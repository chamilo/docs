# Certificats de réussite (génération par lots)

Chamilo peut générer automatiquement le certificat de réussite d’un cours pour chaque étudiant qui l’a
terminé — dans un cours de base et dans toute session qui le réutilise — sans qu’un enseignant
ait à ouvrir chaque cours individuellement. Deux commandes console couvrent ce besoin, l’une pour un cours unique
et l’autre pour l’ensemble de la plateforme, et aucune des deux n’est une opération lourde pour la base de données qu’il faudrait surveiller en permanence :
toutes deux fonctionnent par lots bornés, prennent en charge un essai à blanc et peuvent être reprises en toute sécurité en cas d’interruption.

## Commande à l’échelle de la plateforme

```bash
php bin/console chamilo:gradebook:process-achievement-certificates [options]
```

Pour chaque cours qui possède une catégorie racine de carnet de notes éligible — de premier niveau, et non une sous-catégorie,
avec **Générer les certificats** activé — la commande évalue chaque étudiant inscrit qui ne
possède pas déjà un certificat pour cette catégorie, et en génère un pour toute personne ayant satisfait à
l’exigence d’achèvement. Un cours peut contribuer **plus d’un** contexte : son inscription de base, et
séparément, un contexte par session qui le réutilise, puisqu’une session peut avoir sa propre catégorie racine
et son propre seuil de réussite.

Un cours, ou l’un de ses contextes de session, est ignoré — et non traité comme une erreur — lorsqu’il n’est pas
éligible au traitement automatisé : aucune règle d’achèvement configurée, plus d’une catégorie racine éligible
pour ce contexte (ambigu, nécessite un choix manuel), ou contenu de notification de certificat manquant. Le résumé d’exécution à la fin indique combien de contextes relèvent de chaque cas, de sorte que rien n’est
ignoré sans être signalé.

### Source d’achèvement

* `--completion-mode=course-rule` (par défaut) : utilise la règle d’achèvement configurée pour le cours.
* `--completion-mode=gradebook` : utilise directement le score natif du carnet de notes pour ce contexte.
  Seul un contexte comportant exactement une catégorie racine éligible est retenu dans ce mode — un contexte qui en comporte plusieurs
  est ignoré et signalé, afin d’être traité individuellement (voir ci-dessous).

### Options de sécurité

| Option                     | Objet                                                                                                                                 |
| --------------------------- | ---------------------------------------------------------------------------------------------------------------------------------------- |
| `--dry-run`                 | Évalue et signale sans créer de certificats ni envoyer de notifications. Exécutez toujours cette option en premier.                                      |
| `--send-notification`       | Requis pour une exécution réelle (hors essai à blanc). Envoie le message interne et le courriel configurés pour le cours après la création de chaque certificat. |
| `--sender-id=<id>`          | Administrateur actif de la plateforme utilisé comme expéditeur des notifications. Requis conjointement avec `--send-notification`.                            |
| `--limit=<n>`                | Nombre maximal de certificats générés (ou, en essai à blanc, signalés) lors d’une exécution. `0` = illimité. Valeur par défaut : `100`.                                    |
| `--scan-limit=<n>`           | Nombre maximal d’étudiants évalués lors d’une exécution, sur l’ensemble des cours et des sessions. `0` = illimité. Valeur par défaut : `1000`.                                 |
| `--batch-size=<n>`           | Étudiants chargés par lot de base de données au sein d’un contexte cours/session. Valeur par défaut : `25`.                                                     |
| `--course-batch-size=<n>`    | Cours chargés par lot de base de données. Valeur par défaut : `50`.                                                                                         |
| `--after-course-id=<id>`     | Reprend l’analyse après cet identifiant de cours. Peut être réutilisé en toute sécurité après une exécution interrompue — un cours ne régénère jamais un certificat pour un étudiant qui en possède déjà un. |
| `--user-id=<id>`             | Limite l’exécution à un seul étudiant, vérifié dans chaque cours et session éligibles — utile pour valider le comportement avant une exécution à l’échelle de la plateforme. |
| `--regenerate-empty`         | Traite également les étudiants dont l’enregistrement de certificat existe mais ne comporte aucun fichier de certificat stocké — par exemple après une génération interrompue en cours de route — et génère à nouveau ce certificat. Les étudiants disposant d’un certificat complet ne sont jamais modifiés. |

### Exemples

Effectuez d'abord un essai à blanc sur l'ensemble de la plateforme, afin de voir ce qui serait généré :

```bash
php bin/console chamilo:gradebook:process-achievement-certificates --dry-run
```

Exécution réelle, avec notification des étudiants, l'administrateur dont l'identifiant est 1 étant l'expéditeur :

```bash
php bin/console chamilo:gradebook:process-achievement-certificates \
  --send-notification --sender-id=1
```

Reprise d'une exécution interrompue après le cours 480 :

```bash
php bin/console chamilo:gradebook:process-achievement-certificates \
  --send-notification --sender-id=1 --after-course-id=480
```

Régénérez les certificats dont l'enregistrement existe mais dont le fichier n'a jamais été stocké (effectuez d'abord un essai à blanc
pour les lister) :

```bash
php bin/console chamilo:gradebook:process-achievement-certificates \
  --regenerate-empty --dry-run
php bin/console chamilo:gradebook:process-achievement-certificates \
  --regenerate-empty --send-notification --sender-id=1
```

### Planification en tant que tâche cron

```cron
# Every night at 2 AM
0 2 * * * php /path/to/chamilo/bin/console chamilo:gradebook:process-achievement-certificates --send-notification --sender-id=1 -e prod --no-interaction >> /path/to/chamilo/var/log/achievement-certificates.log 2>&1
```

## Traitement d'un cours individuellement

`chamilo:migration:process-achievement-certificates --course-id=<id>` offre les mêmes options d'essai à blanc,
de notification et de pagination que la commande à l'échelle de la plateforme, limitées au cours de base uniquement
(et non à ses sessions), avec un `--category-id` explicite pour lever l'ambiguïté lorsqu'un cours possède plus d'une
catégorie racine éligible :

```bash
php bin/console chamilo:migration:process-achievement-certificates \
  --course-id=42 --category-id=7 --dry-run
```

Utilisez-la pour tester un seul cours avant une exécution à l'échelle de la plateforme, ou pour traiter un cours que l'exécution à l'échelle de la plateforme
a signalé comme ignoré en raison d'une catégorie ambiguë.

## Codes de sortie

Les deux commandes se terminent avec un statut d'échec si au moins une génération de certificat a effectivement échoué
lors d'une exécution réelle (consultez `var/log/dev.log` — ou le journal de production équivalent — pour l'erreur
sous-jacente). Les contextes ignorés pour des raisons structurelles (absence de règle, catégorie ambiguë, configuration de notification
manquante) ne provoquent pas un code de sortie d'échec ; ils sont signalés dans le résumé.

## Voir aussi : apprenants bloqués en dessous de 100 % sur un parcours d'apprentissage prérequis

Si la règle d'achèvement d'un cours exige qu'un parcours d'apprentissage atteigne 100 %, un apprenant qui a terminé chaque
étape mais n'a jamais ouvert la page finale « Félicitations » du parcours reste bloqué juste en dessous de 100 % et ne
devient jamais éligible ici. Voir
[Finaliser les éléments finaux de parcours d'apprentissage bloqués](learning-path-final-items.md) — exécutez-le d'abord si
des étudiants n'ont pas les certificats que vous vous attendriez à ce qu'ils aient obtenus.

## Remplacé : l'ancien script cron

`public/main/cron/add_gradebook_certificates.php` n'est plus recommandé. Il charge tous les
résultats du carnet de notes de la plateforme en mémoire dans une seule requête non bornée et ne les libère jamais
pendant la boucle, de sorte qu'il peut épuiser la mémoire sur une instance comportant un nombre non négligeable de cours ou
d'exercices, et il n'envoie jamais la notification « vous avez obtenu un certificat ». Utilisez
`chamilo:gradebook:process-achievement-certificates` à la place.