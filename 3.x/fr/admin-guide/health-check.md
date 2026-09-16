# Contrôle de santé

Le contrôle de santé (Health Check) est un petit bloc du tableau de bord d’administration qui exécute quelques vérifications en direct sur votre installation et signale tout ce qui nécessite une attention — sans avoir à parcourir les fichiers de configuration pour détecter les erreurs de paramétrage courantes.

![Le bloc Contrôle de santé du tableau de bord d’administration, affichant le statut réussite/échec pour les paramètres de messagerie, l’affectation d’URL d’administration et les vérifications des permissions de fichiers](/.gitbook/assets/admin-health-check-block.png)

## Accéder au contrôle de santé

Depuis le panneau d’administration, le bloc **Contrôle de santé** apparaît aux côtés des autres blocs du tableau de bord — aucun clic n’est nécessaire, les résultats s’affichent directement.

## Les vérifications

* **Paramètres de messagerie** — Vérifie qu’une chaîne de connexion du mailer et une adresse/nom d’expéditeur (« from ») sont configurés. Dans le cas contraire, un lien vers les paramètres de messagerie permet de corriger.
* **Toutes les URL ont au moins un administrateur affecté** — Sur une installation multi-URL, vérifie que chaque URL d’accès dispose d’au moins un administrateur pouvant la gérer. Si ce n’est pas le cas, un lien mène vers la page d’affectation URL d’accès/utilisateur.
* **`.env` n’est pas accessible en écriture** — `.env` contient des secrets et ne doit pas être accessible en écriture par le serveur web après l’installation. Signalé comme une erreur s’il l’est ; lien vers le Guide de sécurité.
* **`config/` n’est pas accessible en écriture** — Même logique que pour `.env` : ce répertoire ne doit pas être accessible en écriture par le web en fonctionnement normal. Lien vers le Guide de sécurité.
* **`var/cache` est accessible en écriture** — Vérification inverse : Symfony doit pouvoir écrire dans son répertoire de cache, donc celle-ci est signalée comme une erreur s’il *n’est pas* accessible en écriture. Lien vers le guide d’optimisation / Performance Tuning.
* **Le dossier d’installation n’est pas présent** — Le dossier `public/main/install` n’est nécessaire que pendant l’installation et doit être supprimé ensuite. Ceci est signalé comme un avertissement (et non une erreur bloquante) s’il existe encore, car le risque est moins grave que les deux vérifications d’écriture ci-dessus. Lien vers le Guide de sécurité.

## Que faire

Chaque vérification renvoie directement vers l’endroit où corriger le problème sous-jacent — une page de paramètres ou le guide concerné. Parcourez cette liste juste après l’installation, puis périodiquement (par exemple après un transfert manuel de fichiers ou un changement de permissions), car une vérification réussie aujourd’hui ne garantit pas qu’elle le restera. Pour une liste de durcissement en production plus large que ces six vérifications, consultez le [Guide de sécurité](appendix/security-guide.md).