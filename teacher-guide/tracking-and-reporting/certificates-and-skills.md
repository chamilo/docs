# Certificats et compétences

Chamilo vous permet d’attribuer des certificats aux apprenants qui remplissent des critères de réussite spécifiques, et de valider les compétences associées à ces réussites.

## Fonctionnement des certificats

Les certificats sont liés aux **évaluations** (également appelées carnet de notes). Lorsque la note d’un apprenant atteint ou dépasse le seuil minimal que vous définissez, un certificat devient disponible au téléchargement.

Le déroulement est le suivant :

1. Configurez les [évaluations](../assessing-learners/gradebook.md) avec vos exercices, devoirs et autres activités notées
2. Définissez un **score minimal de certification** (par ex. 70 %)
3. Lorsqu’un apprenant atteint ce score, il peut télécharger son certificat (soit depuis l’outil Évaluations lui-même, soit depuis un parcours d’apprentissage si vous avez configuré l’étape finale à cet effet). En tant qu’enseignant, vous pouvez également utiliser l’action **Générer les certificats** dans le carnet de notes pour créer les PDF en lot pour tous les apprenants éligibles.

## Modèles de certificats

Les certificats utilisent des modèles définis par l’administrateur de la plateforme. Le modèle comprend généralement :

* Le nom de l’apprenant
* Le nom du cours
* La date d’achèvement
* Le score obtenu
* Un code QR ou une URL pour la vérification en ligne

## Validité et expiration des certificats

Les certificats peuvent être configurés pour expirer après un nombre de jours donné. Dans les paramètres des [évaluations](../assessing-learners/gradebook.md) de la catégorie racine, une fois **Générer les certificats** activé, un champ **Validité du certificat (jours)** apparaît. Laissez-le à `0` (valeur par défaut) pour des certificats qui n’expirent jamais, ou définissez un nombre de jours pour qu’un certificat expire autant de jours après son émission.

La date d’expiration de chaque certificat est calculée automatiquement à partir de ce paramètre lors de sa génération (ou régénération) — vous ne la définissez pas certificat par certificat. La liste **Certificats** affiche une colonne **Date d’expiration** pour chaque apprenant, indiquant **N’expire jamais** lorsqu’aucune période de validité ne s’applique.

Si la catégorie n’a aucune période de validité configurée, vous pouvez tout de même définir (ou modifier) manuellement la date d’expiration d’un apprenant : cliquez sur le bouton crayon **Modifier la date d’expiration** à côté de son entrée et choisissez une date. Ce bouton n’est disponible que lorsque la catégorie elle-même n’a pas de période de validité — une fois une période de validité définie, les dates d’expiration sont gérées automatiquement et ne peuvent plus être modifiées certificat par certificat.

![La liste des certificats affichant la colonne Date d’expiration pour trois apprenants](/.gitbook/assets/gradebook-certificates-expiry-dates.png)

### Rappeler aux apprenants une expiration imminente ou passée

Ouvrez la liste **Certificats** de votre évaluation et cliquez sur le bouton **Certificats expirant** <img src="/.gitbook/assets/icons/mdi-calendar-clock.svg" alt="Certificats expirant" data-size="line"> pour voir quels certificats d’apprenants ont expiré ou sont sur le point d’expirer. La page affiche, pour chaque apprenant : la **Date d’expiration** du certificat, son **Statut** (**Expiré** ou **Expire bientôt**), et la date du **Dernier rappel envoyé** (ou **Jamais**). Utilisez **Jours d’avance** pour élargir ou réduire l’horizon de « expire bientôt ».

![La page Certificats expirant listant un certificat expiré et un certificat bientôt expiré](/.gitbook/assets/gradebook-certificate-expirations.png)

Pour notifier vous-même les apprenants :

1. Sélectionnez les apprenants à qui vous souhaitez envoyer un rappel (ou sélectionnez tous)
2. Cliquez sur **Envoyer une notification**
3. Vérifiez l’aperçu de l’e-mail qui sera envoyé — des aperçus distincts sont affichés pour les formulations « expire bientôt » et « expiré », selon le cas de chacun des apprenants sélectionnés
4. Confirmez en cliquant à nouveau sur **Envoyer une notification** dans la boîte de dialogue

![La boîte de dialogue de confirmation Envoyer une notification prévisualisant les formulations d’e-mail pour expiration imminente et expirée](/.gitbook/assets/gradebook-certificate-expiry-notification.png)

Chaque apprenant est notifié dans sa langue configurée, à la fois par e-mail et par un message interne Chamilo. Renvoyer pour le même certificat et la même date d’expiration est sans risque — Chamilo suit ce qui a déjà été envoyé par certificat et n’enverra pas de rappels en double à un apprenant, sauf si vous renvoyez explicitement.

Les administrateurs peuvent également planifier ces mêmes rappels automatiquement, de façon récurrente, sans qu’un enseignant ait à les déclencher manuellement — voir [Paramètres des tâches cron](../../admin-guide/platform-settings/crons-settings.md#certificate-expiry-reminders).

## Compétences

Les compétences représentent les savoir-faire que les apprenants acquièrent. Dans Chamilo :

* Les compétences peuvent être liées aux réussites du carnet de notes
* Lorsqu’un apprenant obtient un certificat, les compétences associées sont automatiquement validées
* Les compétences s’accumulent sur le profil de l’apprenant, constituant un dossier de compétences
* Les compétences peuvent être organisées de façon hiérarchique (par ex. « Analyse de données » sous « Méthodes de recherche »)
* Les compétences peuvent être évaluées plus avant par les pairs (évaluation 360°)

## Consultation du statut des certificats et des compétences

En tant qu’enseignant, vous pouvez voir :

* Quels apprenants ont obtenu des certificats dans votre cours
* Quelles compétences ont été validées
* La progression des apprenants vers le seuil de certification
* Quels certificats ont expiré ou vont bientôt expirer, et si un rappel a déjà été envoyé pour ceux-ci

Les apprenants peuvent consulter leurs propres certificats et compétences validées depuis leur profil, et accéder à la Roue des compétences pour vérifier quelles compétences sont demandées dans leur organisation.

## Conseils

* **Fixez des attentes claires** — Indiquez aux apprenants dès le début du cours ce qu’ils doivent accomplir pour obtenir un certificat
* **Utilisez des noms de compétences parlants** — Les compétences doivent décrire ce que l’apprenant est capable de faire, et non seulement le nom du cours
* **Associez-les aux portfolios** — Encouragez les apprenants à ajouter leurs certificats à leur portfolio
* **Enrichissez les certificats** — Demandez à votre administrateur d’activer le plugin [Custom Certificate](../plugins/custom-certificate.md) pour disposer d’une puissance encore plus grande de création de modèles de certificats
* **Définissez une période de validité pour les certifications liées à la conformité** — Si une certification doit être renouvelée périodiquement (par ex. une formation à la sécurité), définissez **Validité du certificat (jours)** afin que les apprenants soient rappelés avant son expiration