# Annonces

L'outil d'annonces vous permet d'envoyer des messages à tous les apprenants inscrits à votre cours, ou à des personnes ou des groupes spécifiques.

Les messages envoyés via les annonces sont transmis aux apprenants à la fois par courriel *et* dans leur boîte de réception Chamilo.

## Créer une annonce

1. Ouvrez l'outil **Annonces** <img src="../../.gitbook/assets/icons/mdi-bullhorn.svg" alt="Annonces" data-size="line"> depuis la page d'accueil du cours
2. Cliquez à nouveau sur l'icône **Ajouter une annonce** <img src="../../.gitbook/assets/icons/mdi-bullhorn.svg" alt="Annonces" data-size="line">
3. Renseignez :
   * **Destinataires** — Choisissez qui reçoit l'annonce :
     * Tous les apprenants inscrits
     * Des apprenants spécifiques
     * Des groupes spécifiques
   * **Sujet** — Une ligne d'objet pour l'annonce
   * **Description** — Le corps du message (prend en charge le texte enrichi avec mise en forme, liens et images)
   * **Pièce jointe** — Une pièce jointe facultative envoyée avec le courriel
   * **Options d'envoi** — Les annonces sont envoyées par courriel par défaut, mais vous pouvez également choisir (si vous disposez des autorisations) de les envoyer via toutes les sessions qui incluent ce cours, de vous en envoyer une copie ou de joindre cette annonce à un événement du calendrier du cours.
     * Lorsque vous cochez **Ajouter un événement au calendrier du cours**, définissez la **Date de début** et la **Date de fin** de l'événement. Chaque clic sur **Ajouter un rappel** ajoute une ligne où vous indiquez combien de temps avant l'événement le rappel est envoyé (en minutes, heures ou jours). Les rappels peuvent être modifiés ultérieurement en éditant l'événement dans l'agenda du cours.
4. Enregistrer

Le bouton **Étiquettes** vous permet d'identifier une série de marqueurs qui seront remplacés dynamiquement dans le **Contenu** de l'annonce. Ils sont relativement intuitifs ; nous vous laissons donc deviner leur fonction.

Le bouton **Aperçu** n'est pas très intuitif : il vous permet de voir à qui cette annonce sera envoyée. Il sert de confirmation de la sélection des destinataires effectuée ci-dessus.

## Gérer les annonces

* **Modifier** <img src="../../.gitbook/assets/icons/mdi-pencil.svg" alt="Modifier" data-size="line"> — Modifier une annonce existante
* **Supprimer** <img src="../../.gitbook/assets/icons/mdi-delete.svg" alt="Supprimer" data-size="line"> — Retirer une annonce
* **Visibilité** <img src="../../.gitbook/assets/icons/mdi-eye.svg" alt="Visibilité" data-size="line"> — Masquer ou afficher les annonces

Les annonces sont affichées dans l'ordre chronologique inverse (les plus récentes en premier).

## Configuration de l'envoi en masse

Les administrateurs peuvent configurer un transport de courrier distinct pour les diffusions d'annonces de cours et de plateforme. Lorsqu'il est activé, cela affecte la manière dont les courriels d'annonce sont envoyés ; cela ne modifie pas l'éditeur d'annonces, les choix de destinataires ni le transport normal utilisé par les notifications individuelles.

Si la livraison diffère entre les messages individuels et les annonces, demandez à un administrateur de la plateforme de vérifier **Administration > Paramètres de configuration > Courrier > DSN d'envoi en masse** (`mail.mailer_dsn_massmailing`). Si ce paramètre facultatif est vide, les annonces utilisent le transport de courriel principal. Voir [PR sur le transport d'envoi en masse n° 9406](https://github.com/chamilo/chamilo-lms/pull/9406).

## Conseils

* **Message de bienvenue** — Créez une annonce au début du cours pour accueillir les apprenants et leur fournir une orientation
* **Utiliser l'envoi par courriel** — Pour les annonces urgentes, activez l'option de courriel afin que les apprenants reçoivent le message même s'ils ne sont pas connectés à la plateforme
* **Annonces ciblées** — Envoyez des annonces spécifiques à des groupes ou à des personnes lorsque le message ne concerne pas l'ensemble de la classe