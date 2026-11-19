# Appels vidéo en tête-à-tête

Chamilo inclut des **appels vidéo en tête-à-tête** optionnels dans le **chat flottant de la plateforme**. Ils utilisent la prise en charge WebRTC de votre navigateur pour connecter deux personnes qui utilisent Chamilo. Cette fonctionnalité est distincte de l'**outil Chat du cours** et des réunions créées avec BigBlueButton ou Zoom.

Cette fonctionnalité a été introduite et améliorée pour le [ticket #3777](https://github.com/chamilo/chamilo-lms/issues/3777) dans les PR [#9102](https://github.com/chamilo/chamilo-lms/pull/9102), [#9110](https://github.com/chamilo/chamilo-lms/pull/9110), [#9112](https://github.com/chamilo/chamilo-lms/pull/9112), [#9127](https://github.com/chamilo/chamilo-lms/pull/9127) et [#9128](https://github.com/chamilo/chamilo-lms/pull/9128).

## Avant de commencer

* L'administrateur doit autoriser l'utilisation du chat flottant de la plateforme et définir **Masquer l'option de chat vidéo dans le chat global** (`chat.hide_chat_video`) sur **Non**. Elle est masquée par défaut. Voir [Paramètres du chat](../admin-guide/platform-settings/chat-settings.md).
* Utilisez un navigateur qui prend en charge WebRTC, avec l'autorisation d'accéder à la caméra et au microphone. L'accès aux médias du navigateur exige généralement HTTPS (ou un contexte de développement local de confiance).
* Soyez connecté et définissez votre statut de chat sur **en ligne**. Choisissez un contact utilisateur ordinaire ; le bouton vidéo n'apparaît pas pour un bot ni lorsque la fonctionnalité est désactivée.
* L'autre utilisateur doit être disponible pour recevoir et accepter l'appel.

## Démarrer un appel

1. Ouvrez le **panneau de chat flottant** en bas de Chamilo (et non la page Chat propre au cours).
2. Sélectionnez la personne que vous souhaitez contacter.
3. Dans l'en-tête de la conversation, cliquez sur l'icône de caméra **Démarrer un appel vidéo**.
4. Accordez l'accès à la caméra et au microphone lorsque votre navigateur le demande.
5. L'appel affiche **Appel en cours...** pendant que Chamilo attend l'autre utilisateur. Lorsqu'il accepte, le statut passe par **Connexion...** puis à **Connecté** une fois la connexion pair à pair établie.

Un appel sans réponse expire plutôt que de se poursuivre indéfiniment. Si l'autre utilisateur refuse ou annule, le chat affiche un message de statut explicatif.

## Recevoir et gérer un appel

Lorsqu'un contact appelle, le chat flottant affiche une boîte de dialogue **Appel vidéo entrant**. Choisissez **Accepter** pour rejoindre ou **Refuser** pour décliner. L'acceptation peut également demander l'autorisation d'utiliser votre caméra et votre microphone.

Pendant un appel, vous pouvez **couper ou réactiver votre microphone**, **activer ou désactiver votre caméra** et **raccrocher**. Un petit aperçu affiche votre vidéo locale tandis que la zone principale affiche l'autre personne. Fermer ou terminer l'appel libère les flux audio/vidéo locaux.

Il s'agit d'un **appel privé entre deux utilisateurs**, et non d'une réunion à l'échelle du cours. Pour organiser une session de groupe planifiée avec enregistrement ou outils de collaboration, utilisez l'intégration [Vidéoconférence](../teacher-guide/collaboration-and-communication/video-conferencing.md) de votre organisation.

## Si l'appel vidéo n'est pas disponible

* **Aucune icône Démarrer un appel vidéo :** Vérifiez le paramètre `chat.hide_chat_video` de la plateforme, la disponibilité du chat flottant, votre statut en ligne et la prise en charge WebRTC du navigateur.
* **Erreur de caméra ou de microphone :** Autorisez les permissions multimédias dans le navigateur et vérifiez que le matériel est présent et n'est pas utilisé par une autre application.
* **Pas de réponse :** Demandez à votre contact d'ouvrir Chamilo et de vérifier sa disponibilité. La demande sortante a un délai d'expiration.
* **Échec de la connexion après acceptation :** Essayez un autre réseau et vérifiez les permissions du navigateur ou les restrictions du pare-feu. L'implémentation WebRTC actuelle utilise un serveur STUN public et ne configure pas de relais TURN ; la connectivité peut donc échouer sur des réseaux restrictifs. Le chat textuel peut toujours fonctionner si la signalisation vidéo échoue.

Il n'est pas nécessaire de configurer BigBlueButton ou Zoom pour cette fonctionnalité d'appel direct ; ces intégrations fournissent un type de réunion distinct.