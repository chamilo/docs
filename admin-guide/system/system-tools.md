# Outils système

Cette page décrit les utilitaires de maintenance et d’inspection du bloc Système.

## Nettoyer les fichiers temporaires

**Système > Nettoyer les fichiers temporaires** indique combien de fichiers temporaires de téléversement existent et l’espace qu’ils occupent, puis permet de les purger — soit tous, soit uniquement ceux plus anciens qu’un âge configurable. Un mode simulation (dry-run) permet d’apercevoir d’abord ce qui serait supprimé. La même action nettoie également les fichiers de compilation hérités obsolètes et régénère les ressources CSS compilées.

Cette action ignore volontairement les propres répertoires de cache de Symfony (`var/cache/dev`, `var/cache/prod`, `var/cache/test`, et les pools de cache) — elle ne nettoie que les fichiers égarés ailleurs sous `var/cache/`. Elle **ne** prendra **pas** en compte une modification effectuée dans `.env` ou sous `config/` (par exemple, l’activation de la documentation de l’API — voir [Activer la documentation de l’API](../installation/configuration.md#enable-the-api-documentation)). Pour cela, vous devez disposer d’un accès shell afin d’exécuter `php bin/console cache:clear`.

## Mise à jour du système

**Système > Mise à jour du système** exécute le flux de mise à jour autonome de Chamilo directement depuis le panneau d’administration, sous la forme d’une séquence d’étapes distinctes et reprises :

1. **Statut** — Indique la version installée et l’emplacement des répertoires de mise à jour/préparation/sauvegarde, ainsi que la clé de signature de confiance utilisée
2. **Vérification** — Recherche si une version plus récente est disponible depuis la source de mise à jour configurée
3. **Vérification d’intégrité** — Télécharge le paquet de mise à jour et sa signature, et les contrôle par rapport à la somme de contrôle du manifeste et à la clé publique de confiance
4. **Prévol** — Valide les prérequis système et la compatibilité avant toute modification
5. **Préparation** — Extrait le paquet vérifié dans un répertoire de préparation isolé ; rien ne change encore dans l’installation en production
6. **Plan d’application** — Construit un diff des fichiers à ajouter, remplacer ou supprimer, d’après le paquet préparé
7. **Application des fichiers** — Copie les fichiers en place. Cela exige une confirmation explicite, et crée une sauvegarde de chaque fichier écrasé ainsi qu’un fichier de verrouillage qui empêche l’exécution simultanée d’une seconde mise à jour
8. **Sécurité des migrations / contrôles post-application** — Valide les migrations de base de données en attente et l’état post-installation
9. **Exécuter le post-application** — Exécute les commandes console post-application (telles que les migrations de base de données), mais uniquement si la configuration du serveur autorise leur exécution depuis l’interface, et seulement après que vous ayez saisi une phrase de confirmation explicite et confirmé qu’une sauvegarde a été effectuée

Les étapes de longue durée indiquent la progression afin que la page puisse rester ouverte en toute sécurité pendant qu’elles se terminent. La combinaison de la vérification de signature, de la préparation avant application, des sauvegardes avant écrasement, d’un verrou de concurrence et de confirmations saisies avant les modifications de base de données vise à rendre ce flux sûr sans accès shell — toutefois, une sauvegarde manuelle avant de commencer reste une bonne pratique ; voir [Sauvegardes](../maintenance/backups.md).

## Informations sur les fichiers

**Système > Informations sur les fichiers** recense chaque fichier de ressource téléversé, recherchable par nom, en indiquant son chemin physique, s’il s’agit d’un orphelin (non lié à aucun cours ni session), et le nombre d’endroits qui le référencent. À partir de là, vous pouvez rattacher un fichier orphelin à une ressource, le détacher ou le supprimer — utile pour localiser et nettoyer un stockage qui n’appartient plus à aucun cours.

## Ressources par type

**Système > Ressources par type** permet de choisir un type de ressource et de voir, pour tous les cours et sessions, un décompte agrégé et une liste des éléments de ce type, leur date de création et (le cas échéant) les utilisateurs qui y sont associés. Utilisez-le pour répondre à des questions telles que « combien de forums existent sur toute la plateforme » ou « quels cours ont le plus de documents ».

## Liste des icônes

**Système > Liste des icônes** est un catalogue parcourable du jeu d’icônes intégré de Chamilo, regroupé par catégorie. Il est surtout utile lors du développement de plugins ou de thèmes, pour confirmer le nom exact d’une icône, mais il est exposé ici comme référence générale.

## Outils réservés au développement

Deux éléments supplémentaires peuvent apparaître dans ce bloc, mais uniquement lorsque le serveur possède un répertoire `tests/` — ce qui n’arrive normalement que sur une installation de développement ou de QA, jamais en production :

* **Remplisseur de données** génère de grands volumes d’utilisateurs, de cours et d’enregistrements d’utilisateurs en ligne fictifs, pour des tests de charge ou de QA.
* **Testeur d’e-mail** envoie un véritable e-mail de test via le mailer configuré de la plateforme, afin de confirmer que vos paramètres SMTP/mail fonctionnent réellement, et affiche les échecs d’envoi récents le cas échéant.

Si vous ne voyez pas ces deux liens, c’est normal — cela signifie que votre installation n’a pas de répertoire `tests/`, ce qui est l’état habituel et correct pour une plateforme de production.