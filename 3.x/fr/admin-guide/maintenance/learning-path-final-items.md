# Finaliser les derniers éléments bloqués d'un parcours d'apprentissage

La dernière étape d'un parcours d'apprentissage — la page « Félicitations » qui contient les blocs de certificat et de compétence — n'est comptée comme terminée que lorsqu'un apprenant l'ouvre réellement. Un apprenant qui termine toutes les autres étapes mais ne clique jamais jusqu'à cette dernière page reste bloqué juste en dessous de 100 % indéfiniment, et comme l'éligibilité au certificat de réussite (et l'attribution des compétences) est conditionnée par l'atteinte de 100 % du parcours d'apprentissage, il ne reçoit jamais un certificat ou une compétence qu'il a pourtant obtenus.

```bash
php bin/console chamilo:learning-path:complete-final-items [options]
```

Pour chaque parcours d'apprentissage de la plateforme dont la dernière étape est de type **Final item**, la commande vérifie chaque apprenant dont une tentative est en cours (en dessous de 100 %) et qui a terminé toutes les autres étapes — dans chaque cours et chaque session qui réutilisent le parcours d'apprentissage. Si c'est le cas, elle finalise le dernier élément pour lui exactement comme s'il l'avait ouvert lui-même : elle enregistre la même consultation d'élément, exécute le même recalcul de progression et déclenche la même génération de certificat et la même attribution de compétences qu'une visite réelle.

Comme `chamilo:gradebook:process-achievement-certificates` (voir
[Certificats de réussite](achievement-certificates.md)), elle fonctionne par lots bornés, prend en charge un essai à blanc et peut être reprise en toute sécurité en cas d'interruption — un apprenant dont le dernier élément est déjà terminé n'est plus jamais modifié lors d'une exécution ultérieure.

## Options

| Option                 | Purpose                                                                                                            |
| ----------------------- | -------------------------------------------------------------------------------------------------------------------- |
| `--dry-run`             | Évalue et signale sans rien finaliser. Exécutez toujours cette option en premier.                                 |
| `--sender-id=<id>`      | Identifiant d'un administrateur actif de la plateforme, utilisé comme créateur de la ressource lorsque la finalisation d'un dernier élément déclenche la génération d'un certificat ou l'attribution d'une compétence. Obligatoire pour une exécution réelle (hors essai à blanc). |
| `--limit=<n>`           | Nombre maximal de derniers éléments finalisés (ou, en essai à blanc, signalés) lors d'une exécution. `0` = illimité. Valeur par défaut : `500`. |
| `--scan-limit=<n>`      | Nombre maximal d'enregistrements de progression d'apprenant analysés lors d'une exécution, pour tous les parcours d'apprentissage. `0` = illimité. Valeur par défaut : `5000`. |
| `--batch-size=<n>`      | Enregistrements de progression d'apprenant chargés par lot de base de données, au sein d'un même parcours d'apprentissage. Valeur par défaut : `50`. |
| `--lp-batch-size=<n>`   | Parcours d'apprentissage chargés par lot de base de données. Valeur par défaut : `50`.                             |
| `--after-lp-id=<id>`    | Reprendre l'analyse après cet identifiant de parcours d'apprentissage.                                            |

## Exemples

Essai à blanc sur l'ensemble de la plateforme, afin de voir qui serait finalisé :

```bash
php bin/console chamilo:learning-path:complete-final-items --dry-run
```

Exécution réelle, l'administrateur d'identifiant 1 étant le créateur de la ressource :

```bash
php bin/console chamilo:learning-path:complete-final-items --sender-id=1
```

Reprendre une exécution interrompue après le parcours d'apprentissage 480 :

```bash
php bin/console chamilo:learning-path:complete-final-items --sender-id=1 --after-lp-id=480
```

## Codes de sortie

La commande se termine avec un statut d'échec si au moins un dernier élément n'a pas pu être finalisé lors d'une exécution réelle — le tableau récapitulatif indique le parcours d'apprentissage, l'apprenant et la raison ; le journal de l'application contient l'exception complète. Un apprenant correctement exclu (dernier élément déjà terminé, ou une autre étape encore inachevée) ne constitue pas une erreur et ne provoque jamais un code de sortie d'échec.

## Score du carnet de notes après finalisation

Le score affiché pour un parcours d'apprentissage dans le tableau du carnet de notes n'est jamais stocké — il est calculé en direct à partir de la progression actuelle de l'apprenant à chaque chargement de la page, de sorte qu'il reflète immédiatement les 100 %, sans étape supplémentaire.

Le **certificat** d'un apprenant, s'il existait déjà avant qu'il n'atteigne 100 % (avec un score plus ancien et plus bas intégré), ne voit son score stocké et son HTML rendu actualisés que si la régénération du certificat elle-même réussit lorsque cette commande finalise son dernier élément — le même appel qu'une visite réelle déclencherait. Si la génération du certificat échoue pour une raison quelconque (voir
[Certificats de réussite](achievement-certificates.md) pour les causes courantes, p. ex. les permissions de stockage des fichiers), la progression de l'apprenant atteint tout de même correctement 100 % et le tableau du carnet de notes l'affiche toujours — seul son certificat continue d'afficher l'ancien score, et comme la commande ne revisite jamais un apprenant déjà à 100 %, elle ne réessaiera pas lors d'une exécution ultérieure. Régénérez ce certificat manuellement (l'action **Générer** dans la liste des certificats) une fois le problème sous-jacent corrigé.

`--sender-id` existe précisément pour éviter une cause courante de cet échec : finaliser un dernier élément en dehors d'une requête réelle ne fournit aucun utilisateur connecté que la ressource de certificat puisse enregistrer comme créateur, et la génération échoue purement et simplement sans celui-ci.