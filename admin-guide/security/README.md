# Sécurité

Le bloc **Sécurité** du tableau de bord d'administration regroupe les outils intégrés de surveillance et d'audit de la sécurité de la plateforme. Il est distinct des [Paramètres de sécurité](../platform-settings/security-settings.md), qui configurent la *politique* de sécurité (règles de mot de passe, CAPTCHA, en-têtes de sécurité HTTP, etc.) — ce bloc vous fournit les *rapports et outils* qui surveillent la plateforme à la recherche d'activités suspectes et de modifications indésirables.

![Le bloc Sécurité du tableau de bord d'administration, listant Audit des activités, Tentatives de connexion, Simple IDS, Vérificateur de force des mots de passe et Intégrité des fichiers](/.gitbook/assets/admin-security-block.png)

Le bloc a été introduit dans Chamilo 2.0 avec quatre outils et étendu dans Chamilo 3.0 avec un cinquième, **Intégrité des fichiers**.

## Accéder au bloc Sécurité

Depuis le panneau d'administration, le bloc **Sécurité** apparaît aux côtés des autres blocs du tableau de bord (Utilisateurs, Cours, Gestion de la plateforme, Système, etc.). Cliquez sur l'un de ses liens pour ouvrir l'outil correspondant.

## Contenu du bloc

* **[Audit des activités](activities-audit.md)** — Parcourir les événements administratifs et de plateforme importants (modifications d'utilisateurs, de cours, de sessions et autres) par type d'événement
* **[Tentatives de connexion](login-attempts.md)** — Consulter les tentatives de connexion échouées et réussies, avec des graphiques et un journal consultable
* **[Simple IDS](simple-ids.md)** — Voir les requêtes signalées par le système de détection d'intrusion intégré et léger de Chamilo
* **[Vérificateur de force des mots de passe](password-strength-checker.md)** — Analyser les utilisateurs actifs à la recherche de mots de passe correspondant à une liste de mots de passe couramment utilisés
* **[Intégrité des fichiers](file-integrity.md)** *(nouveau dans Chamilo 3.0)* — Détecter les ajouts, modifications, suppressions ou changements de permissions inattendus dans les fichiers installés

## Qui peut y accéder

Les cinq outils nécessitent un accès **Administrateur du portail**. Les actions d'analyse, de pause et de nouvelle ligne de base de l'intégrité des fichiers nécessitent en outre un accès **Administrateur global**, et la mise en pause des alertes ou l'établissement d'une nouvelle ligne de base exige de ressaisir votre propre mot de passe — voir [Intégrité des fichiers](file-integrity.md#actions) pour plus de détails.