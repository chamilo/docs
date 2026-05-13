# Nettoyage des archives

Au fil du temps, Chamilo accumule des fichiers temporaires dans ses répertoires de cache et d'archives. Un nettoyage régulier permet d'éviter les problèmes d'espace disque.

## Ce qui peut être nettoyé

* **Cache Symfony** — Modèles compilés, configuration mise en cache et données de routage
* **Fichiers temporaires** — Fichiers générés lors des opérations d'exportation, d'importation et autres
* **Données de session** — Fichiers de session PHP expirés
* **Fichiers journaux** — Anciens fichiers journaux qui ne sont plus nécessaires

## Effectuer le nettoyage

### Depuis le panneau d'administration

Accédez à **Nettoyage des archives** dans le panneau d'administration. Cliquez sur le bouton de nettoyage pour supprimer les fichiers temporaires.

### Depuis la ligne de commande

Pour un contrôle plus précis, utilisez les commandes de la console Symfony :

```bash
# Vider le cache Symfony
php bin/console cache:clear

# Vider uniquement le cache de production
php bin/console cache:clear --env=prod
```

## Conseils

* **Planifiez des nettoyages réguliers** — Configurez une tâche cron hebdomadaire ou mensuelle pour vider les fichiers temporaires
* **Surveillez l'utilisation du disque** — Gardez un œil sur la taille du répertoire `var/`, car elle augmente avec les fichiers de cache et de journaux
* **Soyez prudent avec les journaux** — Avant de supprimer les fichiers journaux, vérifiez s'ils contiennent des informations dont vous pourriez avoir besoin pour le dépannage