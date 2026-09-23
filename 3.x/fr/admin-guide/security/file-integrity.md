# Intégrité des fichiers

*Nouveau dans Chamilo 3.0.*

L’intégrité des fichiers compare les fichiers installés sur votre serveur à une référence de confiance, afin de détecter les ajouts, modifications, suppressions et changements de permissions inattendus — le type de traces qu’une intrusion réussie, une dépendance compromise ou une modification manuelle erronée laisseraient derrière elles.

## Accéder à l’intégrité des fichiers

Depuis le panneau d’administration, cliquez sur **Sécurité > Intégrité des fichiers**.

## Ce qu’elle affiche

![La page Intégrité des fichiers montrant les informations du dernier scan, les panneaux pour les fichiers Ajoutés, Modifiés, Supprimés et dont les Permissions ont changé, une liste d’Historique des alertes, et des Actions pour lancer un scan, mettre les alertes en pause ou établir une nouvelle référence](../../.gitbook/assets/admin-security-file-integrity.png)

* **Dernier scan** — Date et heure du scan le plus récent et nombre de fichiers contrôlés
* **Ajoutés / Modifiés / Supprimés** — Fichiers qui diffèrent de la référence, identifiés par comparaison des sommes de contrôle SHA-256 (chaque liste est limitée à 500 chemins, avec une mention si la liste complète est plus longue — consultez le journal CEF ci-dessous pour la liste complète)
* **Permissions modifiées** — Fichiers dont les permissions diffèrent de la référence. Sous Linux, cela compare directement les bits de mode POSIX (par exemple, un fichier devenu accessible en écriture pour tout le monde est signalé) ; sous Windows, seul l’attribut lecture seule est suivi, car `fileperms()` ne reflète pas les ACL NTFS réelles
* **Historique des alertes** — Journal durable, en ajout seulement, de chaque scan ayant trouvé quelque chose (jusqu’aux 50 derniers). Contrairement au rapport ci-dessus, cette liste n’est jamais effacée par un scan propre ou une nouvelle référence, de sorte que les alertes passées restent visibles même après que la dérive signalée a été résolue

Le contrôle parcourt l’arbre de fichiers installé dans son ensemble, à l’exception des répertoires `var/` et `.git/` — avec une exception : `.git/config` reste surveillé individuellement, précisément pour détecter qu’un dépôt distant Git a été silencieusement redirigé vers un serveur hostile. Les liens symboliques ne sont jamais suivis, afin d’éviter les boucles de parcours ou de sortir du répertoire d’installation.

Comme un scan complet d’une installation volumineuse peut prendre plusieurs minutes, le parcours est découpé (un répertoire de premier niveau à la fois) et sa progression est suivie dans un fichier de verrouillage — ainsi la page peut être rechargée en toute sécurité pour vérifier l’avancement, et un scan interrompu ou tué n’est jamais pris pour un scan encore en cours.

## Actions

* **Lancer un scan maintenant** — Compare immédiatement l’arbre de fichiers actuel à la référence
* **Pause d’1 heure** — Suspend temporairement les alertes (par exemple pendant le déploiement d’une mise à jour). Exige de ressaisir votre propre mot de passe. Pendant la pause, un scan adopte silencieusement l’arbre actuel comme nouvelle référence au lieu d’alerter, de sorte que la fenêtre de pause se ferme sans alertes résiduelles. La pause maximale est de 24 heures
* **Établir une nouvelle référence** — Adopte l’arbre de fichiers actuel comme nouvelle référence de confiance. Exige de ressaisir votre propre mot de passe

Mettre les alertes en pause ou établir une nouvelle référence peut masquer une intrusion en cours, c’est pourquoi les deux exigent à nouveau votre mot de passe — une session d’administrateur détournée ne suffit pas à elle seule à faire taire la détection pendant que des fichiers sont altérés.

## Exécution depuis Cron

Les mêmes contrôles sont disponibles sous forme de commandes console, destinées à être planifiées avec cron plutôt qu’exécutées depuis la page d’administration selon un calendrier :

```bash
# Scan for drift and alert admins if anything changed
0 3 * * * cd /var/www/chamilo/master && php bin/console app:file-integrity:scan

# Generate or regenerate the baseline (run once after install, or after a manual update)
php bin/console app:file-integrity:baseline

# Pause alerting from the command line (prompts for a global administrator's username and password)
php bin/console app:file-integrity:snooze
```

Si une pause est active, `app:file-integrity:scan` rétablit silencieusement la référence au lieu d’alerter, conformément au comportement d’un scan déclenché depuis la page d’administration.

## Paramètres

Un paramètre associé se trouve dans **Paramètres de configuration > Sécurité** :

* **`file_integrity_check_notify_admins`** — Une liste d’adresses e-mail à notifier lorsqu’une dérive est détectée ; si elle est laissée vide, chaque administrateur global est notifié

## Intégration SIEM

Chaque scan écrit également des lignes de journal CEF (Common Event Format) dans `var/logs/security/file_integrity.log`, adaptées à l’ingestion par un SIEM (Wazuh, Splunk, QRadar, ArcSight, Elastic/Filebeat et outils similaires). Chaque ligne est étiquetée avec un identifiant de signature indiquant le type de changement :

| Signature | Signification |
|-----------|---------|
| `FIM-ADDED` | Un nouveau fichier est apparu |
| `FIM-MODIFIED` | Le contenu d’un fichier a changé |
| `FIM-DELETED` | Un fichier a disparu |
| `FIM-GITCONFIG` | `.git/config` a changé (dépôt distant éventuellement détourné) |
| `FIM-PERMS` | Les permissions d’un fichier ont changé |
| `FIM-TRUNCATED` | Le rapport d’une catégorie a été plafonné ; consultez le journal pour la liste complète |

## Utilisation recommandée

1. Établissez une référence de base juste après l’installation, puis à nouveau après chaque mise à jour manuelle ou déploiement
2. Planifiez `app:file-integrity:scan` dans cron (par exemple, toutes les nuits)
3. Avant une fenêtre de maintenance planifiée qui modifiera des fichiers (une mise à jour, une migration), utilisez **Pause for 1 hour** plutôt que de supprimer complètement la tâche cron
4. Intégrez `var/logs/security/file_integrity.log` à votre surveillance des journaux ou à votre SIEM existant, si vous en disposez d’un