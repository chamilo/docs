# Sauvegardes

Des sauvegardes régulières sont essentielles pour protéger vos données Chamilo. Cette page décrit ce qu'il faut sauvegarder et comment procéder.

## Éléments à sauvegarder

### 1. Base de données

La base de données Chamilo contient toutes les données de la plateforme : utilisateurs, cours, suivi, notes, messages et paramètres. Il s'agit du composant le plus critique à sauvegarder.

**Comment effectuer la sauvegarde :**

```bash
mysqldump -u username -p chamilo_database > chamilo_backup_$(date +%Y%m%d).sql
```

### 2. Fichiers

Chamilo stocke les fichiers téléversés (documents, images, paquets SCORM) dans le système de fichiers. Les répertoires clés à sauvegarder sont les suivants :

* `var/` — Fichiers et ressources téléversés. Il inclut `var/certificate-issuer/`, la clé qui signe les justificatifs de certificats et les [relevés de notes officiels](../users/academic-transcripts.md) : sans elle, les documents déjà émis ne peuvent plus être vérifiés
* `public/plugin/` — Fichiers des plugins (uniquement si vous avez ajouté des plugins personnalisés)

Si vous utilisez un stockage cloud (S3, Azure Blob), assurez-vous que la sauvegarde et le versionnement de votre fournisseur cloud sont activés.

### 3. Configuration

* `.env` — Votre configuration d'environnement
* `config/` — Tout fichier de configuration personnalisé

## Calendrier de sauvegarde

| Composant | Fréquence recommandée |
|-----------|---------------------|
| Base de données | Quotidienne |
| Fichiers | Quotidienne ou hebdomadaire (selon l'activité de téléversement) |
| Configuration | Après toute modification de la configuration |

## Restauration

Pour restaurer à partir d'une sauvegarde :

1. Restaurer la base de données à partir de l'export SQL
2. Restaurer les répertoires de fichiers
3. Restaurer les fichiers de configuration
4. Vider le cache Symfony : `php bin/console cache:clear`

## Conseils

* **Automatiser les sauvegardes** — Utiliser des tâches cron pour exécuter les sauvegardes automatiquement
* **Stocker hors site** — Conserver des copies de sauvegarde sur un serveur distinct ou un stockage cloud
* **Tester la restauration** — Vérifier périodiquement que vous pouvez restaurer avec succès à partir d'une sauvegarde
* **Documenter votre processus** — Conserver des instructions écrites pour le processus de restauration afin que toute personne de l'équipe puisse l'effectuer