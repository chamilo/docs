# Bot de support (assistant à arbre de décision)

Le **bot de support** est un assistant d'aide configurable fondé sur un arbre de décision fixe. Il a été mis en œuvre dans la [PR #9224](https://github.com/chamilo/chamilo-lms/pull/9224) pour l'[issue #8754](https://github.com/chamilo/chamilo-lms/issues/8754). Ce n'est **pas un chatbot d'IA générative** : les administrateurs rédigent des questions et des réponses sélectionnables qui orientent les utilisateurs vers une explication, une page ou un ticket de support.

## L'activer

1. Dans **Administration > Paramètres de configuration > Tickets**, activez `ticket.ticket_support_bot_enabled` (désactivé par défaut).
2. Ouvrez **Administration > Bot de support** et créez un arbre de décision en **brouillon**. Indiquez un titre et au moins un nœud d'entrée avec des options.
3. Définissez la question ou l'information de chaque nœud et reliez les options à l'action suivante.
4. Publiez un arbre valide. Seul un arbre publié disposant d'un nœud d'entrée valide et d'options sélectionnables est disponible pour les utilisateurs.

Le moteur sélectionne l'arbre publié pour l'URL d'accès courante ; sa disponibilité est donc limitée au portail. Un administrateur doit disposer de `ROLE_ADMIN` pour gérer les arbres.

## Concevoir un parcours de support

Chaque option peut exécuter l'une des quatre actions suivantes :

| Action | Résultat |
| --- | --- |
| **Aller à un autre nœud** | Poursuivre la conversation vers une autre question du même arbre |
| **Ouvrir un lien** | Lien vers une page Chamilo au moyen d'un chemin relatif du même site, par exemple `/tickets` |
| **Terminer la conversation** | Marquer le problème comme résolu et, éventuellement, afficher un message de clôture |
| **Créer un ticket de support** | Escalader la conversation vers le système de tickets |

Pour l'escalade vers un ticket, sélectionnez un **projet de tickets par défaut** et une catégorie appartenant à ce projet. Les catégories qui exigent un cours ne peuvent pas être utilisées pour cette escalade du bot de support. Le ticket créé contient la transcription de l'arbre de décision de l'utilisateur, afin que l'équipe de support puisse voir les choix ayant conduit à l'escalade.

L'éditeur valide la structure de l'arbre avant publication. Les versions **Publié** et **Archivé** sont en lecture seule ; utilisez **Dupliquer** pour créer un nouveau brouillon modifiable. La publication d'un remplacement archive la version précédemment publiée dans le même périmètre. Depuis la liste, les administrateurs peuvent également importer ou exporter un arbre et consulter son historique de conversations. Un arbre publié doit être archivé avant suppression, et un arbre comportant un historique de conversations ne peut pas être supprimé.

## Importer des exemples et consulter les conversations

Ouvrez **Administration > Bot de support** et sélectionnez **Importer**. La boîte de dialogue d'importation propose **Télécharger l'exemple JSON** et **Télécharger l'exemple CSV**. Téléchargez un exemple, remplacez ses questions et ses options par les vôtres, puis sélectionnez le fichier `.json` ou `.csv` modifié et importez-le. Chaque arbre importé commence comme un **nouveau brouillon** ; relisez-le et publiez-le explicitement lorsqu'il est prêt.

Les exemples n'exigent pas de projet de tickets existant. Si votre processus doit créer des tickets, configurez le projet requis et la catégorie éligible après l'importation.

Dans la liste des arbres, utilisez **Voir les conversations** pour examiner les journaux de conversation d'un arbre donné, y compris les arbres dont le nombre de conversations est nul. Les historiques de conversations restent limités à l'utilisateur et au portail concernés. Voir la [PR #9419](https://github.com/chamilo/chamilo-lms/pull/9419).

## Comment les utilisateurs y accèdent

Lorsque le paramètre est activé et que le portail dispose d'un arbre publié valide, les utilisateurs connectés voient un contact **Bot de support** dans le chat ancré. Ils répondent en choisissant les options proposées. Le bot peut résoudre la conversation, ouvrir une page du même site, ou créer un ticket et afficher le lien vers celui-ci. Les utilisateurs peuvent démarrer une nouvelle conversation après la fin d'une précédente.

Ceci est distinct du **tuteur IA**, qui répond à des questions d'apprentissage ouvertes. Le bot de support ne suit que les parcours et les options configurés par les administrateurs.

## Dépannage et sécurité

* **Aucun bot dans le chat :** vérifiez le paramètre Tickets, qu'un arbre est publié pour le portail courant et que son nœud d'entrée comporte des options.
* **Impossible de publier :** examinez les nœuds manquants, les nœuds de destination non résolus et les actions non valides dans le brouillon.
* **Impossible de créer le ticket :** vérifiez le projet de tickets et la catégorie sélectionnés. N'utilisez pas une catégorie de tickets qui exige un cours.
* **Conversations plus anciennes manquantes :** les administrateurs peuvent consulter l'historique des conversations à partir de l'arbre correspondant ; les conversations sont liées à un utilisateur et à une URL d'accès.

Pour le paramètre associé, voir [Paramètres des tickets](platform-settings/ticket-settings.md).