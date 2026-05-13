# Gestion des plugins

## Accéder au gestionnaire de plugins

![Le gestionnaire de plugins affichant une liste des plugins disponibles avec des interrupteurs d'activation et des options de configuration](/.gitbook/assets/admin-plugin-manager.png)

Depuis le panneau d'administration, cliquez sur **Gérer les plugins** pour voir la liste des plugins disponibles.

## États des plugins

Chaque plugin peut avoir l'un des deux états suivants :

* **Actif** — Le plugin est activé et ses fonctionnalités sont disponibles sur la plateforme
* **Inactif** — Le plugin est installé mais désactivé

## Activer un plugin

1. Trouvez le plugin dans la liste
2. Cliquez sur **Installer**, puis sur **Activer** ou activez-le via l'interrupteur
3. Configurez les paramètres du plugin (si applicable, trouvez le bouton **Configurer**)
4. Enregistrez
5. Si recommandé dans le README, activez-le dans une **région** spécifique

Certains plugins ajoutent des outils aux cours, de nouvelles pages à la plateforme ou des fonctionnalités supplémentaires aux fonctionnalités existantes.

## Configurer un plugin

De nombreux plugins disposent d'options de configuration. Après avoir activé un plugin :

1. Cliquez sur le bouton **Configurer** à côté du plugin
2. Remplissez la configuration requise (clés API, URL, options, etc.)
3. Enregistrez

## Désactiver un plugin

1. Trouvez le plugin dans la liste
2. Cliquez sur **Désactiver** ou désactivez-le via l'interrupteur
3. Les fonctionnalités du plugin sont immédiatement supprimées de la plateforme, mais le plugin reste installé et conserve sa configuration jusqu'à ce que vous le **Désinstalliez**

Désactiver un plugin ne supprime pas ses données. Si vous le réactivez ultérieurement, les données seront toujours disponibles.

## Conseils

* **N'activez que ce dont vous avez besoin** — Chaque plugin actif ajoute une certaine surcharge. Gardez les plugins inutilisés désactivés.
* **Testez avant la production** — Activez les nouveaux plugins dans un environnement de test d'abord
* **Vérifiez la compatibilité** — Après une mise à jour de Chamilo, assurez-vous que tous les plugins actifs fonctionnent toujours correctement