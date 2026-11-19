# Plans d'étage des branches et cartes des salles

Chamilo 3.1 peut associer une image de plan d'étage à une branche et indiquer la position des salles sur cette image au moyen de polygones interactifs. Cette fonctionnalité aide les apprenants à localiser les salles qui leur sont attribuées ; il ne s'agit **pas** d'une carte géographique GPS.

## Associer un plan d'étage à une branche

1. Ouvrez la zone d'administration des **Branches** et modifiez la branche concernée.
2. Repérez le panneau **Plan d'étage**.
3. Choisissez ou téléversez l'image, puis sélectionnez **Associer le plan d'étage** (ou **Changer le plan d'étage** s'il en existe déjà un).
4. Enregistrez ou confirmez les modifications de la branche si nécessaire, puis vérifiez que l'image du plan d'étage se charge.

Si un plan n'est plus valide, utilisez **Supprimer le plan d'étage** après avoir vérifié quelles salles y font référence. Ne téléversez que du contenu de confiance et respectez les permissions de l'écran d'administration des branches.

## Tracer le contour des salles

1. Modifiez une salle affectée à cette branche.
2. Repérez **Salle sur le plan d'étage** dans le formulaire de la salle.
3. Utilisez l'outil polygone pour tracer le contour de la salle. Utilisez **Modifier** pour ajuster les sommets ; tous les points doivent rester à l'intérieur de l'image.
4. Sélectionnez **Enregistrer la zone de la salle**, puis enregistrez le formulaire de la salle afin de conserver les modifications.
5. Ouvrez une visionneuse de salle pour confirmer que la position est correcte. Utilisez **Effacer la zone de la salle** si le positionnement doit être retiré.

Une salle ne comporte qu'un seul polygone modifiable à la fois. Le positionnement des salles est distinct de l'image au niveau de la branche ; la mise à jour de l'image peut donc nécessiter de vérifier les contours de salles existants.

## Où les cartes apparaissent

Les utilisateurs autorisés peuvent consulter les plans d'étage des salles lorsque celles-ci sont sélectionnées ou affichées dans les informations de cours, les événements du calendrier et les flux liés aux présences. Vérifiez la visibilité à l'aide des rôles qui consulteront réellement ces informations, en particulier les étudiants et les participants aux sessions.

Les permissions d'accès aux branches et aux salles s'appliquent également aux ressources de plans d'étage. Dans les installations multi-URL, vérifiez la bonne isolation portail/branche avant de publier les cartes.

Voir [Gestion des salles](managing-rooms.md) et [Recherche de disponibilité des salles](room-availability-finder.md). Implémentations : [PR #9321](https://github.com/chamilo/chamilo-lms/pull/9321), [PR #9451](https://github.com/chamilo/chamilo-lms/pull/9451).