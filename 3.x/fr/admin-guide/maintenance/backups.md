# Sauvegardes

Des sauvegardes régulières sont essentielles pour protéger vos données Chamilo. Cette page décrit ce qu’il faut sauvegarder et comment procéder.

## Quoi sauvegarder

### 1. Base de données

La base de données Chamilo contient toutes les données de la plateforme : utilisateurs, cours, suivi, notes, messages et paramètres. C’est le composant le plus critique à sauvegarder.

**Comment sauvegarder :**

```bash
mysqldump -u username -p chamilo_database > chamilo_backup_$(date +%Y%m%d).sql
```

### 2. Fichiers

Chamilo stocke les fichiers téléversés (documents, images, paquets SCORM) dans le système de fichiers. Les répertoires clés à sauvegarder :

* `var/` — Fichiers et ressources téléversés
* `public/plugin/` — Fichiers des plugins (uniquement si vous avez ajouté des plugins personnalisés)

Si vous utilisez un stockage cloud (S3, Azure Blob), assurez-vous que la sauvegarde/versioning de votre fournisseur cloud est activé.

### 3. Configuration

* `.env` — Votre configuration d’environnement
* `config/` — Tout fichier de configuration personnalisé

## Planning de sauvegarde

| Composant | Fréquence recommandée |
|-----------|---------------------|
| Base de données | Quotidienne |
| Fichiers | Quotidienne ou hebdomadaire (selon l’activité de téléversement) |
| Configuration | Après tout changement de configuration |

## Restauration

Pour restaurer à partir d’une sauvegarde :

1. Restaurer la base de données à partir du dump SQL
2. Restaurer les répertoires de fichiers
3. Restaurer les fichiers de configuration
4. Vider le cache Symfony : `php bin/console cache:clear`

## Conseils

* **Automatiser les sauvegardes** — Utilisez des tâches cron pour exécuter les sauvegardes automatiquement
* **Stocker hors site** — Conservez des copies de sauvegarde sur un serveur distinct ou un stockage cloud
* **Tester la restauration** — Testez périodiquement que vous pouvez restaurer une sauvegarde avec succès
* **Documenter votre processus** — Conservez des instructions écrites pour le processus de restauration afin que toute personne de l’équipe puisse l’effectuer