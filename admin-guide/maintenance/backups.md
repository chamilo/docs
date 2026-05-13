# Sauvegardes

Les sauvegardes régulières sont essentielles pour protéger vos données Chamilo. Cette page explique ce qu'il faut sauvegarder et comment procéder.

## Ce qu'il faut sauvegarder

### 1. Base de données

La base de données Chamilo contient toutes les données de la plateforme : utilisateurs, cours, suivi, notes, messages et paramètres. C'est l'élément le plus critique à sauvegarder.

**Comment sauvegarder :**

```bash
mysqldump -u username -p chamilo_database > chamilo_backup_$(date +%Y%m%d).sql
```

### 2. Fichiers

Chamilo stocke les fichiers téléversés (documents, images, packages SCORM) dans le système de fichiers. Les répertoires clés à sauvegarder sont :

* `var/` — Fichiers téléversés et ressources
* `public/plugin/` — Fichiers des plugins (uniquement si vous avez ajouté des plugins personnalisés)

Si vous utilisez un stockage cloud (S3, Azure Blob), assurez-vous que la sauvegarde ou la gestion des versions de votre fournisseur cloud est activée.

### 3. Configuration

* `.env` — Votre configuration d'environnement
* `config/` — Tous les fichiers de configuration personnalisés

## Calendrier de sauvegarde

| Composant | Fréquence recommandée |
|-----------|-----------------------|
| Base de données | Quotidienne |
| Fichiers | Quotidienne ou hebdomadaire (selon l'activité de téléversement) |
| Configuration | Après chaque modification de configuration |

## Restauration

Pour restaurer à partir d'une sauvegarde :

1. Restaurez la base de données à partir du fichier SQL dump
2. Restaurez les répertoires de fichiers
3. Restaurez les fichiers de configuration
4. Videz le cache Symfony : `php bin/console cache:clear`

## Conseils

* **Automatisez les sauvegardes** — Utilisez des tâches cron pour exécuter les sauvegardes automatiquement
* **Stockez hors site** — Conservez des copies de sauvegarde sur un serveur distinct ou un stockage cloud
* **Testez la restauration** — Vérifiez périodiquement que vous pouvez restaurer à partir d'une sauvegarde avec succès
* **Documentez votre processus** — Gardez des instructions écrites pour le processus de restauration afin que n'importe quel membre de l'équipe puisse le réaliser