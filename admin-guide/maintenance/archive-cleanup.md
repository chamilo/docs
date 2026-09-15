# Nettoyage des archives

Au fil du temps, Chamilo accumule des fichiers temporaires dans ses répertoires de cache et d’archives. Un nettoyage régulier permet d’éviter les problèmes d’espace disque.

## Éléments pouvant être nettoyés

* **Fichiers temporaires de téléversement** — Fichiers générés lors des opérations d’export, d’import et autres, ainsi que les fichiers de compilation du frontend hérités devenus obsolètes
* **Cache de l’application Symfony** — Conteneur compilé, configuration mise en cache et données de routage. Ceci n’est *pas* couvert par l’action du panneau d’administration ci-dessous — voir [Depuis la ligne de commande](#from-the-command-line).
* **Données de session** — Fichiers de session PHP expirés
* **Fichiers journaux** — Anciens fichiers journaux qui ne sont plus nécessaires

## Effectuer le nettoyage

### Depuis le panneau d’administration

Accédez à **Système > Nettoyer les fichiers temporaires** dans le panneau d’administration (voir [Outils système](../system/system-tools.md#clean-temporary-files)). L’outil indique le nombre de fichiers temporaires existants et l’espace qu’ils occupent, puis vous permet de tout purger ou uniquement les fichiers plus anciens qu’un âge choisi, avec un aperçu en mode simulation. Il supprime également les fichiers de compilation hérités obsolètes et régénère les ressources CSS compilées.

Cette action exclut volontairement les répertoires de cache propres à Symfony (`var/cache/dev`, `var/cache/prod`, `var/cache/test` et les pools de cache), de sorte qu’elle ne fera pas prendre effet une modification de `.env` ou de `config/` — utilisez la ligne de commande pour cela.

### Depuis la ligne de commande

Pour un contrôle plus fin, et pour réellement vider le cache de l’application Symfony, utilisez les commandes de la console Symfony :

```bash
# Clear the Symfony cache
php bin/console cache:clear

# Clear only the production cache
php bin/console cache:clear --env=prod
```

## Conseils

* **Planifier des nettoyages réguliers** — Configurez une tâche cron hebdomadaire ou mensuelle pour vider les fichiers temporaires
* **Surveiller l’utilisation du disque** — Surveillez la taille du répertoire `var/`, car elle augmente avec le cache et les fichiers journaux
* **Être prudent avec les journaux** — Avant de supprimer des fichiers journaux, vérifiez s’ils contiennent des informations dont vous pourriez avoir besoin pour le dépannage