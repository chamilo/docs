# Tentatives de connexion

Le rapport Tentatives de connexion présente un historique des tentatives de connexion échouées, avec des graphiques permettant de repérer les schémas d'attaque par force brute ou de bourrage d'identifiants (credential stuffing).

## Accéder aux tentatives de connexion

Depuis le panneau d'administration, cliquez sur **Sécurité > Tentatives de connexion**.

## Contenu affiché

![La page Tentatives de connexion affichant des graphiques des tentatives par jour, des principales adresses IP, des tentatives échouées par mois, des connexions réussies et échouées, des tentatives par heure et des adresses IP uniques par jour, suivis d'un tableau des tentatives de connexion échouées](../../.gitbook/assets/admin-security-login-attempts.png)

* **Tentatives par jour (7 derniers jours)** — Nombre quotidien de tentatives échouées
* **Principales adresses IP (30 derniers jours)** — Adresses IP ayant généré le plus de tentatives
* **Tentatives échouées par mois (12 derniers mois)** — Tendance à plus long terme
* **Réussites et échecs (30 derniers jours)** — Répartition quotidienne des connexions réussies et échouées
* **Tentatives par heure (7 derniers jours)** — Répartition selon l'heure de la journée, utile pour repérer les tentatives automatisées ou scriptées
* **Adresses IP uniques par jour (30 derniers jours)** — Nombre d'adresses IP distinctes ayant tenté une connexion chaque jour
* **Tableau des tentatives de connexion échouées** — Chaque tentative échouée, avec la date, l'adresse IP et le nom d'utilisateur essayé

Utilisez les champs **Nom d'utilisateur**, **IP** et la plage de dates situés au-dessus des graphiques pour filtrer le rapport.

## Paramètres associés

Ce rapport est un outil de surveillance ; les protections effectives contre les attaques par force brute sont configurées dans les [Paramètres de sécurité](../platform-settings/security-settings.md) :

* **Nombre maximal de tentatives de connexion avant verrouillage** (`login_max_attempt_before_blocking_account`) — Verrouille un compte après un trop grand nombre de tentatives échouées
* **CAPTCHA** (`allow_captcha`) et **Tolérance d'erreurs CAPTCHA** (`captcha_number_mistakes_to_block_account`) — Ralentit les tentatives automatisées et verrouille les comptes qui échouent de façon répétée au CAPTCHA

Voir également le [Guide de sécurité](../appendix/security-guide.md) pour la protection contre les attaques par force brute au niveau du serveur (fail2ban).