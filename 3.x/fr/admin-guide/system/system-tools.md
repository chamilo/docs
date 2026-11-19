# Outils système

Cette page présente les utilitaires de maintenance et d'inspection du bloc Système.

## Nettoyer les fichiers temporaires

**Système > Nettoyer les fichiers temporaires** indique combien de fichiers temporaires de téléversement existent et quel espace ils occupent, puis vous permet de les purger — soit la totalité, soit uniquement les fichiers plus anciens qu'un âge configurable. Un mode simulation vous permet de prévisualiser ce qui serait supprimé. La même action efface également les anciens fichiers de compilation hérités et régénère les ressources CSS compilées.

Cette action ignore délibérément les répertoires de cache propres à Symfony (`var/cache/dev`, `var/cache/prod`, `var/cache/test` et les pools de cache) — elle ne nettoie que les fichiers égarés qui se sont retrouvés ailleurs sous `var/cache/`. Elle ne **prendra pas** en compte une modification effectuée dans `.env` ou sous `config/` (par exemple, l'activation de la documentation de l'API — voir [Activer la documentation de l'API](../installation/configuration.md#enable-the-api-documentation)). Pour cela, vous devez disposer d'un accès shell afin d'exécuter `php bin/console cache:clear`.

## Mise à jour du système

**Système > Mise à jour du système** exécute le processus d'auto-mise à jour de Chamilo directement depuis le panneau d'administration, sous forme d'une séquence d'étapes distinctes et reprises :

1. **État** — Indique la version installée et l'emplacement des répertoires de mise à jour, de préparation et de sauvegarde, ainsi que la clé de signature de confiance utilisée
2. **Vérification de disponibilité** — Recherche si une version plus récente est disponible auprès de la source de mise à jour configurée
3. **Vérification** — Télécharge le paquet de mise à jour et sa signature, puis les contrôle par rapport à la somme de contrôle du manifeste et à la clé publique de confiance
4. **Contrôles préalables** — Valide les prérequis système et la compatibilité avant toute modification
5. **Préparation** — Extrait le paquet vérifié dans un répertoire de préparation isolé ; rien ne change encore dans l'installation en production
6. **Plan d'application** — Construit un différentiel des fichiers à ajouter, remplacer ou supprimer, à partir du paquet préparé
7. **Application des fichiers** — Copie les fichiers à leur emplacement. Cette étape exige une confirmation explicite et crée une sauvegarde de chaque fichier écrasé, ainsi qu'un fichier de verrouillage qui empêche une seconde mise à jour de s'exécuter en parallèle
8. **Sécurité des migrations / contrôles post-application** — Valide les migrations de base de données en attente et l'état post-installation
9. **Exécution post-application** — Exécute les commandes console post-application (telles que les migrations de base de données), mais uniquement si la configuration de votre serveur autorise leur exécution depuis l'interface, et seulement après que vous avez saisi une phrase de confirmation explicite et confirmé qu'une sauvegarde a été effectuée

Les étapes de longue durée indiquent leur progression, de sorte que la page peut rester ouverte en toute sécurité jusqu'à leur achèvement. La combinaison de la vérification de signature, de la préparation avant application, des sauvegardes avant écrasement, d'un verrouillage de concurrence et de confirmations saisies avant les modifications de base de données est conçue pour rendre ce processus sûr à exécuter sans accès shell — mais une sauvegarde manuelle avant de commencer reste une bonne pratique ; voir [Sauvegardes](../maintenance/backups.md).

## Informations sur les fichiers

**Système > Informations sur les fichiers** répertorie chaque fichier de ressource téléversé, recherchable par nom, en indiquant son chemin physique, s'il s'agit d'un orphelin (non lié à un cours ou à une session) et combien d'emplacements y font référence. Depuis cette page, vous pouvez rattacher un fichier orphelin à une ressource, le détacher ou le supprimer — utile pour localiser et nettoyer un espace de stockage qui n'appartient plus à aucun cours.

Pour savoir où un fichier est réellement utilisé, ouvrez ses détails **Informations sur les fichiers** et examinez **Emplacements du fichier**. Chamilo répertorie les emplacements connus de documents ou de fichiers personnels avec leurs chemins et, le cas échéant, des liens pour ouvrir ces emplacements. Les détails indiquent également séparément le chemin physique du fichier. Un fichier peut avoir plusieurs emplacements ; une liste vide signifie qu'aucun emplacement de document ou de fichier personnel n'a été trouvé pour cette ressource. Vérifiez les emplacements avant de détacher ou de supprimer définitivement un fichier partagé. Voir [PR #9438](https://github.com/chamilo/chamilo-lms/pull/9438).

## Ressources par type

**Système > Ressources par type** vous permet de choisir un type de ressource et de consulter, pour l'ensemble des cours et des sessions, un décompte agrégé et une liste des éléments de ce type, leur date de création et (le cas échéant) les utilisateurs qui leur sont associés. Utilisez-le pour répondre à des questions telles que « combien de forums existent sur l'ensemble de la plateforme » ou « quels cours contiennent le plus de documents ».

## Liste des icônes

**Système > Liste des icônes** est un catalogue consultable du jeu d'icônes intégré de Chamilo, regroupé par catégorie. Il est principalement utile lors du développement de plugins ou de thèmes, lorsqu'il faut confirmer le nom exact d'une icône, mais il est exposé ici comme référence générale.

## Outils réservés au développement

Deux éléments supplémentaires peuvent apparaître dans ce bloc, mais uniquement lorsque le serveur dispose d'un répertoire `tests/` — ce qui n'arrive normalement que sur une installation de développement ou d'assurance qualité, jamais en production :

* **Générateur de données (Data filler)** génère de grands volumes d'utilisateurs, de cours et d'enregistrements d'utilisateurs en ligne fictifs, à des fins de tests de charge ou d'assurance qualité.
* **Testeur de courriel (E-mail tester)** envoie un véritable courriel de test via le service de messagerie configuré de la plateforme, afin de confirmer que vos paramètres SMTP/messagerie fonctionnent réellement, et affiche les échecs d'envoi récents, le cas échéant.

Si vous ne voyez pas ces deux liens, c'est normal — cela signifie que votre installation ne comporte pas de répertoire `tests/`, ce qui constitue l'état normal et correct pour une plateforme de production.