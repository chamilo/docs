# FAQ

Questions fréquemment posées pour les administrateurs de Chamilo 3.0.

## Installation and Setup

**Q : Quelle version de PHP Chamilo 3.0 exige-t-il ?**
A : PHP 8.3, 8.4 ou 8.5. Voir [Prérequis serveur](../installation/server-requirements.md).

**Q : Puis-je exécuter Chamilo sur un hébergement mutualisé ?**
A : C’est possible mais non recommandé. Chamilo 3.0 nécessite Composer, Node.js en mode développement, ainsi qu’un accès en ligne de commande pour l’installation et la maintenance. Un VPS ou un serveur dédié offre une bien meilleure expérience.

**Q : Quelle base de données dois-je utiliser ?**
A : MySQL 8.0+ ou MariaDB 10.4+ sont les plus couramment utilisées et les mieux testées.

**Q : Puis-je installer Chamilo sans la ligne de commande ?**
A : Oui, si vous utilisez la version empaquetée (.zip ou .tar.gz). Sinon, vous aurez besoin de la ligne de commande pour installer les dépendances Composer, compiler les ressources frontend et exécuter les migrations de base de données. L’assistant web gère la configuration de la base de données et la configuration initiale, mais les étapes périphériques nécessitent un accès shell en mode développement.

## Users and Authentication

**Q : Comment réinitialiser le mot de passe d’un utilisateur ?**
A : Allez dans **Administration > Liste des utilisateurs**, trouvez l’utilisateur, cliquez sur modifier et définissez un nouveau mot de passe. Alternativement, l’utilisateur peut utiliser le lien « Mot de passe oublié » sur la page de connexion (si le courriel est configuré).

**Q : Puis-je importer des utilisateurs en masse ?**
A : Oui. Allez dans **Administration > Importer des utilisateurs** et téléversez un fichier CSV ou XML contenant les données utilisateurs. L’import permet de créer de nouveaux utilisateurs et de mettre à jour ceux qui existent déjà.

**Q : Comment m’intégrer avec LDAP ou Active Directory ?**
A : Configurez les paramètres LDAP dans la configuration de l’authentification. Voir [LDAP](../authentication/ldap.md). Les utilisateurs sont synchronisés à la connexion ou via une synchronisation planifiée.

**Q : Les utilisateurs peuvent-ils appartenir à plusieurs sessions en même temps ?**
A : Oui. Les utilisateurs peuvent être inscrits à un nombre quelconque de sessions simultanément. Chaque session suit la progression de manière indépendante.

## Courses and Content

**Q : Comment sauvegarder un cours unique ?**
A : Dans le cours, allez dans **Maintenance > Créer une sauvegarde**. Cela génère une archive téléchargeable du contenu et des paramètres du cours. Vous pouvez la restaurer sur la même instance Chamilo ou sur une autre.

**Q : Puis-je copier un cours ?**
A : Oui. Utilisez **Administration > Copier un cours** ou l’outil de maintenance du cours à l’intérieur du cours. Vous pouvez copier du contenu entre cours ou créer un nouveau cours à partir d’un cours existant.

**Q : Quelles versions de SCORM sont prises en charge ?**
A : Chamilo prend en charge SCORM 1.2. Les paquets SCORM sont importés en tant que parcours d’apprentissage.

**Q : Comment limiter qui peut créer des cours ?**
A : Allez dans **Administration > Paramètres de configuration > Cours** et désactivez **Autoriser les non-administrateurs (enseignants) à créer de nouveaux cours** (`allow_users_to_create_courses`). Lorsque cette option est désactivée, seuls les administrateurs peuvent créer des cours. Vous pouvez également fixer une limite au nombre de cours qu’un enseignant peut créer.

## Performance and Maintenance

**Q : La plateforme est lente. Que dois-je vérifier en premier ?**
A : Par ordre d’impact : (1) Assurez-vous que `APP_ENV=prod` et `APP_DEBUG=0` dans `.env`. (2) Vérifiez que PHP OPcache est activé. (3) Contrôlez les performances de la base de données. (4) Voir [Optimisation des performances](../platform-settings/performance-tuning.md).

**Q : Comment vider le cache ?**
A : Exécutez `php bin/console cache:clear --env=prod` depuis la ligne de commande. Ne supprimez pas manuellement le répertoire `var/cache/` pendant que l’application est en cours d’exécution.

**Q : De combien d’espace disque Chamilo a-t-il besoin ?**
A : L’application elle-même nécessite environ 2 Go non compressés. L’espace total dépend du contenu téléversé (documents, vidéos, paquets SCORM). Surveillez l’utilisation du disque et planifiez en conséquence.

**Q : Comment mettre en place des sauvegardes automatisées ?**
A : Voir [Sauvegardes](../maintenance/backups.md). Au minimum, planifiez une dump quotidien de la base de données et des sauvegardes régulières au niveau des fichiers du répertoire de téléversement.

## Email

**Q : Les utilisateurs ne reçoivent pas les courriels. Que dois-je vérifier ?**
A : (1) Vérifiez `MAILER_DSN` dans `.env`. (2) Exécutez `php bin/console mailer:test someone@example.com` pour tester. (3) Vérifiez les dossiers de courrier indésirable. (4) Vérifiez les enregistrements DNS SPF/DKIM. Voir [Configuration du courriel](../installation/email-configuration.md).

**Q : Puis-je utiliser Gmail pour envoyer des courriels ?**
A : Oui, pour de petites plateformes ou le développement. Utilisez un mot de passe d’application et tenez compte des limites d’envoi quotidiennes de Gmail (500 courriels/jour pour les comptes ordinaires).

## Security

**Q : Comment forcer HTTPS ?**
A : Configurez votre serveur web pour rediriger HTTP vers HTTPS. En outre, activez le paramètre « Forcer HTTPS » dans **Administration > Paramètres de configuration > Sécurité**. Voir [Paramètres de sécurité](../platform-settings/security-settings.md).

**Q : Comment bloquer les attaques par force brute sur la connexion ?**
A : Configurez le nombre maximal de tentatives de connexion et le CAPTCHA dans les paramètres de sécurité. Envisagez également d’utiliser fail2ban au niveau du serveur pour une protection supplémentaire.

**Q : Un utilisateur a oublié son mot de passe et le courriel ne fonctionne pas. Comment l’aider ?**
A : En tant qu’administrateur, modifiez directement le compte utilisateur et définissez un nouveau mot de passe. Allez dans **Administration > Liste des utilisateurs**, trouvez le compte et mettez à jour le champ mot de passe.

## Mises à niveau

**Q : Puis-je passer directement de Chamilo 2.x à 3.0 ?**
R : Oui, mais il s'agit d'une migration majeure, et non d'une simple mise à jour. Consultez [Mise à niveau](../installation/upgrading.md). Testez toujours d'abord sur un serveur de préproduction.

**Q : Mes plugins fonctionneront-ils après la mise à niveau vers 3.0 ?**
R : Non. Les plugins de la version 2.x ne sont pas compatibles avec la version 3.0 et doivent être réécrits ou remplacés par des fonctionnalités équivalentes de la version 3.0.