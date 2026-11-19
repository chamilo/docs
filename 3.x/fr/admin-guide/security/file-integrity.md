# Intégrité des fichiers

*Nouveau dans Chamilo 3.0.*

L'intégrité des fichiers compare les fichiers installés sur votre serveur à une ligne de base de confiance, afin de détecter les ajouts, modifications, suppressions et changements de permissions que vous n'attendiez pas — le type de changement qu'une intrusion réussie, une dépendance compromise ou une modification manuelle erronée laisserait derrière elle.

## Accéder à l'intégrité des fichiers

Depuis le panneau d'administration, cliquez sur **Sécurité > Intégrité des fichiers**.

## Ce qu'elle affiche

![La page Intégrité des fichiers affichant les informations de la dernière analyse, les panneaux des fichiers ajoutés, modifiés, supprimés et dont les permissions ont changé, une liste d'historique des alertes, ainsi que les actions pour lancer une analyse, suspendre les alertes ou établir une nouvelle ligne de base](../../.gitbook/assets/admin-security-file-integrity.png)

* **Dernière analyse** — Date et heure de l'analyse la plus récente et nombre de fichiers vérifiés
* **Ajoutés / Modifiés / Supprimés** — Fichiers qui diffèrent de la ligne de base, identifiés par comparaison des sommes de contrôle SHA-256 (chaque liste est plafonnée à 500 chemins, avec une mention si la liste complète est plus longue — voir le journal CEF ci-dessous pour la liste complète)
* **Permissions modifiées** — Fichiers dont les permissions diffèrent de la ligne de base. Sous Linux, les bits de mode POSIX sont comparés directement (par exemple, un fichier devenant accessible en écriture par tous est signalé) ; sous Windows, seul l'attribut lecture seule est suivi, car `fileperms()` ne reflète pas les véritables ACL NTFS
* **Historique des alertes** — Un journal durable, en ajout seul, de chaque analyse ayant détecté quelque chose (jusqu'aux 50 dernières). Contrairement au rapport ci-dessus, cette liste n'est jamais effacée par une analyse sans écart ni par une nouvelle ligne de base ; les alertes passées restent donc visibles même après la résolution de la dérive qu'elles avaient signalée

Le contrôle parcourt l'intégralité de l'arborescence de fichiers installée, à l'exception des répertoires `var/` et `.git/` — avec une exception : `.git/config` continue d'être surveillé individuellement, précisément pour détecter un dépôt distant Git silencieusement redirigé vers un serveur hostile. Les liens symboliques ne sont jamais suivis, afin d'éviter les boucles de parcours ou une sortie du répertoire d'installation.

Comme une analyse complète d'une installation volumineuse peut prendre plusieurs minutes, le parcours est découpé (un répertoire de premier niveau à la fois) et sa progression est suivie dans un fichier de verrou — la page peut donc être rechargée en toute sécurité pour vérifier l'avancement, et une analyse interrompue ou tuée n'est jamais confondue avec une analyse encore en cours.

## Actions

* **Lancer une analyse maintenant** — Compare immédiatement l'arborescence de fichiers actuelle à la ligne de base
* **Suspendre pendant 1 heure** — Suspend temporairement les alertes (par exemple, pendant le déploiement d'une mise à jour). Nécessite de saisir à nouveau votre propre mot de passe. Pendant la suspension, une analyse adopte silencieusement l'arborescence actuelle comme nouvelle ligne de base au lieu d'émettre une alerte, de sorte que la fenêtre de suspension se referme sans alertes résiduelles. La durée maximale de suspension est de 24 heures
* **Établir une nouvelle ligne de base** — Adopte l'arborescence de fichiers actuelle comme nouvelle référence de confiance. Nécessite de saisir à nouveau votre propre mot de passe

Suspendre les alertes ou établir une nouvelle ligne de base peut masquer une intrusion en cours, c'est pourquoi les deux actions exigent de saisir à nouveau votre mot de passe — une session d'administration détournée ne suffit pas, à elle seule, à faire taire la détection pendant que des fichiers sont altérés.

## Exécution depuis cron

Les mêmes contrôles sont disponibles sous forme de commandes console, destinées à être planifiées avec cron plutôt qu'exécutées depuis la page d'administration selon un calendrier :

```bash
# Scan for drift and alert admins if anything changed
0 3 * * * cd /var/www/chamilo/master && php bin/console app:file-integrity:scan

# Generate or regenerate the baseline (run once after install, or after a manual update)
php bin/console app:file-integrity:baseline

# Pause alerting from the command line (prompts for a global administrator's username and password)
php bin/console app:file-integrity:snooze
```

Si une suspension est active, `app:file-integrity:scan` reconstitue silencieusement la ligne de base au lieu d'émettre une alerte, conformément au comportement d'une analyse déclenchée depuis la page d'administration.

## Paramètres

Un paramètre associé se trouve dans **Paramètres de configuration > Sécurité** :

* **`file_integrity_check_notify_admins`** — Liste d'adresses e-mail à notifier lorsqu'une dérive est détectée ; si elle est laissée vide, chaque administrateur global est notifié

## Intégration SIEM

Chaque analyse écrit également des lignes de journal au format CEF (Common Event Format) dans `var/logs/security/file_integrity.log`, adaptées à l'ingestion par un SIEM (Wazuh, Splunk, QRadar, ArcSight, Elastic/Filebeat et outils similaires). Chaque ligne est marquée d'un identifiant de signature indiquant le type de changement :

| Signature | Signification |
|-----------|---------|
| `FIM-ADDED` | Un nouveau fichier est apparu |
| `FIM-MODIFIED` | Le contenu d'un fichier a changé |
| `FIM-DELETED` | Un fichier a disparu |
| `FIM-GITCONFIG` | `.git/config` a changé (dépôt distant éventuellement détourné) |
| `FIM-PERMS` | Les permissions d'un fichier ont changé |
| `FIM-TRUNCATED` | Le rapport d'une catégorie a été plafonné ; consultez le journal pour la liste complète |

---
## Utilisation recommandée

1. Établir une ligne de base juste après l'installation, puis à nouveau après chaque mise à jour manuelle ou déploiement
2. Planifier `app:file-integrity:scan` dans cron (par exemple, chaque nuit)
3. Avant une fenêtre de maintenance planifiée qui modifiera des fichiers (une mise à jour, une migration), utiliser **Pause pendant 1 heure** plutôt que de supprimer purement et simplement la tâche cron
4. Transmettre `var/logs/security/file_integrity.log` à votre dispositif existant de surveillance des journaux ou à votre SIEM, si vous en disposez