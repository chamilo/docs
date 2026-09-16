# Vérification de version

La vérification de version indique si votre installation Chamilo est à jour et — si vous y consentez — enregistre votre plateforme auprès du projet Chamilo afin qu’elle soit comptabilisée dans les statistiques d’usage agrégées.

## Deux niveaux de vérification

**Non enregistré (état par défaut) :** Chamilo tente tout de même de contacter `version.chamilo.org` pour comparer votre version installée à la dernière version publiée, en n’utilisant rien de plus que la requête elle-même — aucun détail de la plateforme n’est envoyé. Le bloc affiche un formulaire d’enregistrement expliquant ce qu’apporte l’enregistrement, ainsi qu’un bouton **« Activer la vérification de version »** et une case **« Masquer le campus de la liste publique des plateformes »**.

**Enregistré :** Cliquer sur « Activer la vérification de version » ne fait que basculer deux paramètres locaux — cela n’envoie rien en soi. Dès lors, à chaque chargement de ce bloc du tableau de bord, votre plateforme envoie une requête à `version.chamilo.org` qui comprend :

| Données envoyées | Finalité indiquée |
|-----------|-----------------|
| URL et nom du site de votre plateforme | Identifie le portail qui se signale |
| Adresse e-mail de contact de l’administrateur | Explicitement pour que l’équipe Chamilo puisse joindre les administrateurs au sujet de problèmes de sécurité critiques |
| Version installée | Pour déterminer si vous êtes à jour |
| Nombre de cours, d’utilisateurs, d’utilisateurs actifs et de sessions | Agrégés en statistiques non personnelles sur `stats.chamilo.org` |
| Nom de l’organisation et langue de l’interface | Agrégation démographique uniquement |
| Nom de l’administrateur | Envoyé, bien que sa finalité ne soit pas clairement documentée dans le code lui-même |
| Adresse IP de votre serveur | Utilisée pour approximer la localisation de votre plateforme sur une carte mondiale des installations |
| Indicateur « Ne pas lister le campus », packager et identifiant unique d’instance | Contrôle votre apparition dans l’annuaire public et identifie les signalements répétés de la même installation |

Si vous laissez **« Masquer le campus de la liste publique des plateformes »** décochée, votre plateforme apparaît également dans la liste publique de la communauté à `version.chamilo.org/community.php`.

## Accéder à la vérification de version

Ce bloc apparaît directement sur le tableau de bord d’administration — aucune page distincte à consulter.

## Faut-il l’activer ?

Il s’agit d’un consentement explicite, et le compromis est simple : en échange du partage des informations ci-dessus, vous recevez une notification automatique lorsqu’une nouvelle version (y compris les correctifs de sécurité) est disponible, et vous contribuez aux statistiques publiques d’adoption de Chamilo. Si vous préférez ne partager aucun détail de la plateforme, ne cliquez simplement pas sur « Activer la vérification de version » — la vérification de base de la mise à jour s’exécute toujours sans enregistrement. Si vous souhaitez la notification de mise à jour mais pas le listage public, enregistrez-vous et cochez « Masquer le campus de la liste publique des plateformes ».