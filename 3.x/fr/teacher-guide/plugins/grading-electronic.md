# Grading Electronic

Grading Electronic <img src="../../.gitbook/assets/icons/mdi-export.svg" alt="Grading Electronic" data-size="line"> exporte les apprenants qui ont réussi votre cours, avec leur score du carnet de notes, vers le fichier qu'un organisme de certification externe importe : soit un fichier texte au format fixe, soit un tableur de liste des inscrits.

## Ouverture du bloc d'exportation

Une fois la fonction activée, la barre d'outils de l'outil **Évaluations** (carnet de notes) de votre cours affiche une icône **Exporter**. Cliquez dessus pour afficher le bloc **Grading Electronic** sur la même page ; cliquez à nouveau pour le masquer.

Le bloc comporte trois champs :

* **Aperçu** — coché par défaut. Tant qu'il est coché, rien n'est enregistré : le bloc montre uniquement ce que l'exportation contiendrait
* **Plage de dates** — les dates de début et de fin du cours. La date de début figure dans la ligne d'en-tête du fichier texte, la date de fin est la date à laquelle chaque apprenant a réussi
* **Identifiant du cours** — l'identifiant du cours auprès de l'organisme de certification. Il est prérempli avec la valeur utilisée pour l'exportation précédente

## Aperçu de l'exportation

Lorsque **Aperçu** est coché, le bloc propose un seul bouton **Aperçu**. Il liste chaque apprenant du cours (ou de la session dans laquelle vous vous trouvez) avec son score et un statut **PASS** ou **SKIP**, et affiche le contenu du fichier texte. Seuls les apprenants qui satisfont aux critères de réussite du carnet de notes sont marqués **PASS** ; les autres sont exclus de l'exportation.

## Génération du fichier

Décochez **Aperçu** pour remplacer le bouton **Aperçu** par deux boutons :

* **Générer TXT** — télécharge le fichier texte au format fixe : une ligne d'en-tête avec l'identifiant du prestataire, l'identifiant du cours et la date de début, puis une ligne par apprenant ayant réussi
* **Générer XLSX** — télécharge le tableur de la liste des inscrits, avec une ligne par apprenant ayant réussi et les colonnes **FireTRAQ ID**, **First Name**, **Last Name**, **Score**, **Grade**, **Date Earned** et **Comment**

Les deux boutons font la même chose en dehors du fichier : ils enregistrent l'**identifiant du cours** pour la prochaine exportation et, si le carnet de notes génère des certificats, génèrent le certificat de chaque apprenant ayant réussi.

## Contenu du tableur

* **FireTRAQ ID** — l'identifiant de l'apprenant auprès de l'organisme de certification, lu dans son champ de profil `fcdice_or_acadis_student_id`
* **Score** — le score du carnet de notes sous forme de pourcentage entier (0 à 100), quelle que soit la pondération totale du carnet de notes
* **Grade** — toujours **Pass**, puisque seuls les apprenants ayant réussi sont exportés. La cellule propose tout de même les choix **Pass**, **Fail** et **Incomplete** si vous devez modifier le fichier
* **Date Earned** — la date de fin de la plage de dates
* **Comment** — laissé vide

## Conseils

* **Vérifiez d'abord les identifiants des apprenants** — Un apprenant sans identifiant dans son profil est tout de même exporté, avec un **FireTRAQ ID** vide. Utilisez l'aperçu pour les repérer avant de générer le fichier
* **L'identifiant du prestataire et les heures de cours** proviennent des champs supplémentaires du cours, définis par votre administrateur lors de l'installation du plugin