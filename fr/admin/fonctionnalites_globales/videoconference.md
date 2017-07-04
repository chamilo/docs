## Vidéoconférence {#vid-oconf-rence}

Comme indiqué antérieurement dans la section _plugins_ de ce guide, la vidéoconférence est un outil séparé de Chamilo. Vous pouvez facilement l&#039;installer et faire le lien avec Chamilo grâce au plugin _BigBlueButton_, mais cela requiert un serveur dédié (ou en tout cas un serveur dédié à autre chose sur lequel il vous reste suffisamment de ressources).

Pour installer le serveur de vidéoconférence _BigBlueButton_, nous vous recommandons de suivre les instructions (en anglais) sur la page du projet : [http://code.google.com/p/bigbluebutton/wiki/InstallationUbuntu](http://code.google.com/p/bigbluebutton/wiki/InstallationUbuntu)

Une fois la vidéoconférence installée et fonctionnelle, vous devrez en connaître l&#039;URL publique (parfois une simple adresse IP) et la clef secrète.

Vous trouverez la clef secrète dans _/var/lib/tomcat6/webapps/bigbluebutton/WEB-INF/classes/bigbluebutton.properties_ (cherchez _Salt_).

Une fois ces deux données connues, dirigez-vous vers la page de configuration des paramètres de Chamilo, section _Plugins._ Activez le plugin _BigBlueButton_ et sauvegardez. **Rechargez la page** (pour que le nouvel élément de menu apparaisse) et cliquez sur l&#039;icône de la nouvelle section appelée « Extra ». Là, entrez les informations de votre serveur de vidéoconférence.

Il ne vous reste plus qu&#039;à vous diriger dans l&#039;un de vos cours pour tester l&#039;intégration.

Les enseignants des cours sont les seuls à pouvoir démarrer une salle de vidéoconférence. Ils sont également les seuls à disposer du statut de modérateur dans Chamilo.

Les apprenants ne peuvent se connecter en vidéoconférence que si leur enseignant a démarré une salle précédemment (sinon, cliquer sur le lien vers la vidéoconférence n&#039;a aucun effet).

Si vous ne parvenez pas à l&#039;installer, n&#039;hésitez pas à faire appels aux fournisseurs officiels de Chamilo qui vous loueront volontiers un accès à leurs serveurs de vidéoconférence pré-configurés.