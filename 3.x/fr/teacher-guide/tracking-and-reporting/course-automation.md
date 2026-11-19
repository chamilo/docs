# Automatisation du cours (déclenchements manuels)

La section **Automatisation** des rapports de cours permet aux enseignants autorisés de configurer des actions pour le début et la fin d’un cours. Dans l’implémentation actuelle de Chamilo 3.1, les actions sont **déclenchées manuellement** : ne supposez pas qu’elles s’exécutent automatiquement à une date du calendrier ou via cron.

## Configurer les actions

1. Ouvrez un cours en tant qu’enseignant ou en tant qu’autre utilisateur autorisé à gérer les rapports de cours.
2. Ouvrez **Rapports** et localisez la section **Automatisation**.
3. Sélectionnez l’événement (**Le cours s’ouvre maintenant** ou **Le cours se termine maintenant**) et un type d’action.
4. Indiquez la cible requise par cette action, puis sélectionnez **Ajouter une action**.
5. Consultez la liste **Actions configurées** ; supprimez une entrée indésirable au moyen de son action **Supprimer**.

Les actions prises en charge comprennent la publication ou le masquage de ressources du cours, l’envoi d’invitations à des enquêtes, la délivrance de certificats existants et la modification de la visibilité du cours. Les ressources, enquêtes, options du carnet de notes et valeurs de visibilité disponibles dépendent du cours et des permissions de l’utilisateur actuel.

## Exécuter l’événement configuré

Choisissez **Le cours s’ouvre maintenant** ou **Le cours se termine maintenant** et confirmez l’opération. Examinez le résultat indiqué. Chamilo suit les exécutions terminées, empêche les configurations en double et ignore, lors des exécutions suivantes, les actions déjà menées à bien. Un second clic ne doit pas être considéré comme un moyen de renvoyer une action déjà terminée.

Pour la délivrance de certificats, préparez et testez d’abord le certificat concerné. Pour les invitations à une enquête, vérifiez que l’enquête est configurée et que les apprenants visés appartiennent au contexte du cours ou de la session en cours.

## Limitations importantes

- Cette interface fournit une **exécution manuelle**, et non une automatisation planifiée.
- Les actions s’exécutent dans le contexte du cours ou de la session en cours ; testez l’accès et les cibles pour les deux contextes, le cas échéant.
- Les actions menées à bien ne sont pas automatiquement répétées lors des exécutions ultérieures.
- Au moment de la PR de la fonctionnalité, la délivrance de certificats, les modifications de visibilité du cours et l’exécution propre à une session avaient fait l’objet d’une revue de code, mais n’avaient pas été vérifiées fonctionnellement dans cette PR. Testez-les sur votre installation avant de vous y fier en exploitation.

Voir [Rapports de cours](course-reports.md) et [Certificats et compétences](certificates-and-skills.md). Implémentation : [PR #9464](https://github.com/chamilo/chamilo-lms/pull/9464).