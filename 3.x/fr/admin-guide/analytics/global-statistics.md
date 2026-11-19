# Statistiques globales

Les statistiques globales constituent le centre des statistiques de la plateforme — un menu de rapports à l'échelle de la plateforme, regroupés par thème, plutôt qu'un rapport unique.

## Accéder aux statistiques globales

Depuis le panneau d'administration, cliquez sur **Analytique > Statistiques globales**.

## Organisation

L'ouverture de la page sans rapport sélectionné affiche un menu des statistiques disponibles, regroupées en Cours, Utilisateurs, Système, Social et Session. La sélection d'une entrée du menu charge ce rapport précis sur la même page. Chacun est une vue à l'échelle de la plateforme, réservée aux administrateurs — il n'y a ici aucun périmètre de cours ou de session ; pour cela, voir [Analytique d'apprentissage](learning-analytics.md).

## Cours

* **Cours** — Nombre total de cours, ventilé par catégorie de cours
* **Accès aux outils** — Nombre, à l'échelle de la plateforme, d'événements d'accès aux outils (annonces, documents, forums, tests, chat, etc.)
* **Nombre de ressources par outil** — Choisissez un ou plusieurs outils et consultez chaque cours/session qui les utilise, avec un nombre de ressources et une date de dernière mise à jour, triés par usage
* **Dernier accès** — Cours avec leur date de dernier accès, limités à ceux visités dans un nombre de jours configurable (60 par défaut)
* **Nombre de cours par langue** — Cours regroupés selon la langue de leur interface
* **Utilisation des cours** — Nombre de visites par cours sur des périodes glissantes (aujourd'hui, cette semaine, ce mois, 6 mois, 1 an, 2 ans, depuis le début), réparti entre les visites à l'intérieur et à l'extérieur des sessions

## Utilisateurs

* **Nombre d'utilisateurs** — Total des formateurs et des apprenants à l'échelle de la plateforme, et la même ventilation par catégorie de cours
* **Connexions** — Nombre de connexions pour aujourd'hui, les 7 derniers jours, les 31 derniers jours et depuis le début, à la fois pour le total des connexions et pour les utilisateurs distincts ; peut être filtré selon une durée minimale de session
* **Connexions (mois)** — Les mêmes données de connexion totalisées par mois calendaire sur l'ensemble de l'historique
* **Connexions (jour)** — Totaux de connexions par jour de la semaine, plus une ventilation distincte pour les 7 derniers jours uniquement
* **Connexions (heure)** — Totaux de connexions par heure de la journée, plus une ventilation distincte pour les 24 dernières heures uniquement
* **Nombre d'utilisateurs (photo)** — Combien de comptes actifs ont téléversé une photo de profil, par rapport à ceux qui ne l'ont pas fait
* **Connexions par date** — Temps total de connexion de chaque utilisateur (de la connexion à la déconnexion) sur une plage de dates choisie, exportable en XLS
* **Non connectés depuis un certain temps** — Combien d'utilisateurs ne se sont pas connectés dans des fenêtres glissantes (aujourd'hui, 7 jours, 31 jours, 6 mois), et combien ne se sont jamais connectés
* **Zombies** — Comptes dont la dernière connexion est antérieure ou égale à une date limite que vous choisissez (il n'y a pas de seuil fixe — vous choisissez la date à chaque fois), éventuellement limités aux comptes actifs, avec des boutons pour activer, désactiver ou supprimer directement les comptes listés
* **Statistiques des utilisateurs** — Utilisateurs inscrits dans une plage de dates choisie, avec les détails complets du profil et des graphiques de synthèse, exportables en XLS
* **Utilisateurs en ligne** — Nombre en direct d'utilisateurs actuellement en ligne et d'utilisateurs en train de passer un test, chacun affiché sur quatre fenêtres temporelles (3, 5, 30 et 120 minutes)
* **Nouvelles inscriptions d'utilisateurs** — Nouvelles inscriptions sur une plage de dates choisie (quotidiennes si la plage est d'un mois ou moins, mensuelles avec exploration détaillée sinon), plus une ventilation de qui a créé chaque compte
* **Inscriptions aux cours/sessions par jour** — Inscriptions et désinscriptions par jour sur une plage de dates choisie
* **Utilisateurs en double** — Trouve les comptes partageant le même nom, la même adresse e-mail ou la valeur d'un champ de profil choisi ; permet de désactiver, d'activer ou d'unifier (fusionner) les doublons — la fusion supprime définitivement les comptes intégrés dans celui que vous conservez

## Système

* **Statistiques des sessions utilisateur du portail** — Une grille des nombres d'utilisateurs ventilés par URL d'accès (sur les portails multi-URL), session et cours, pour une plage de dates choisie, exportable en XLS

L'entrée **Rapport trimestriel**, qui apparaît également sous Système, est traitée séparément dans [Rapports d'entreprise](corporate-reports.md).

## Social

* **Nombre de messages reçus** — Messages internes reçus, par utilisateur
* **Nombre de messages envoyés** — Messages internes envoyés, par utilisateur
* **Nombre de contacts** — Contacts du réseau social par utilisateur (à l'exclusion des relations de type RH/superviseur)

## Session

* **Sessions par date** — Sessions commençant ou se terminant dans une plage de dates choisie (éventuellement filtrées par statut) : nombre, moyenne de sessions par semaine, moyenne d'utilisateurs par session, moyenne de sessions par tuteur, ventilations par catégorie/langue/statut, et un tableau du nombre de sessions par cours

## Rapports supplémentaires dans Chamilo 3.1

### Utilisateurs par langue

La statistique **Utilisateurs par langue** regroupe les utilisateurs de la plateforme selon leur langue configurée. Utilisez-la pour comprendre la répartition linguistique lors de la planification de communications ou de contenus localisés. Il s'agit d'un rapport sur la langue des utilisateurs, et non d'un décompte des langues des cours (qui figure séparément sous Cours). Voir [la PR utilisateurs par langue n° 9397](https://github.com/chamilo/chamilo-lms/pull/9397).

### Certificats expirés (Rapports globaux)

Le rapport administrateur **Certificats expirés** est disponible depuis les Rapports globaux plutôt que sous la forme d'une liste de certificats limitée au cours, destinée à l'enseignant. Filtrez par mot-clé, session de cours, cours, mois ou année, et consultez la date d'expiration ainsi que le lien du certificat. Cette vue est destinée à l'examen des certificats à l'échelle du portail et se distingue des rappels concernant les certificats qui expireront bientôt. Voir [PR certificats expirés globaux n° 9372](https://github.com/chamilo/chamilo-lms/pull/9372) et [Certificats et compétences](../../teacher-guide/tracking-and-reporting/certificates-and-skills.md).