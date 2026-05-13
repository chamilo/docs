# FAQ

Questions fréquemment posées pour les administrateurs de Chamilo 2.0.

## Installation et configuration

**Q : Quelle version de PHP est requise pour Chamilo 2.0 ?**  
R : PHP 8.2 ou supérieur. PHP 8.3 est recommandé. Voir [Exigences du serveur](../installation/server-requirements.md).

**Q : Puis-je exécuter Chamilo sur un hébergement partagé ?**  
R : C'est possible mais non recommandé. Chamilo 2.0 nécessite Composer, Node.js en mode développement, et un accès à la ligne de commande pour l'installation et la maintenance. Un VPS ou un serveur dédié offre une bien meilleure expérience.

**Q : Quelle base de données dois-je utiliser ?**  
R : MySQL 8.0+ ou MariaDB 10.4+ sont les plus couramment utilisées et les mieux testées.

**Q : Puis-je installer Chamilo sans utiliser la ligne de commande ?**  
R : Oui, si vous utilisez la version packagée (.zip ou .tar.gz). Sinon, vous aurez besoin de la ligne de commande pour installer les dépendances Composer, construire les ressources frontend et exécuter les migrations de base de données. L'assistant basé sur le web gère la configuration de la base de données et les paramètres initiaux, mais les étapes environnantes nécessitent un accès shell en mode développement.

## Utilisateurs et authentification

**Q : Comment réinitialiser le mot de passe d'un utilisateur ?**  
R : Allez dans **Administration > Liste des utilisateurs**, trouvez l'utilisateur, cliquez sur modifier et définissez un nouveau mot de passe. Alternativement, l'utilisateur peut utiliser le lien "Mot de passe oublié" sur la page de connexion (si le courriel est configuré).

**Q : Puis-je importer des utilisateurs en masse ?**  
R : Oui. Allez dans **Administration > Importer des utilisateurs** et téléversez un fichier CSV ou XML avec les données des utilisateurs. L'importation permet de créer de nouveaux utilisateurs et de mettre à jour ceux existants.

**Q : Comment intégrer Chamilo avec LDAP ou Active Directory ?**  
R : Configurez les paramètres LDAP dans la configuration d'authentification. Voir [LDAP](../authentication/ldap.md). Les utilisateurs sont synchronisés à la connexion ou via une synchronisation planifiée.

**Q : Les utilisateurs peuvent-ils appartenir à plusieurs sessions en même temps ?**  
R : Oui. Les utilisateurs peuvent être inscrits à un nombre quelconque de sessions simultanément. Chaque session suit la progression de manière indépendante.

## Cours et contenu

**Q : Comment sauvegarder un seul cours ?**  
R : Dans le cours, allez dans **Maintenance > Créer une sauvegarde**. Cela génère une archive téléchargeable du contenu et des paramètres du cours. Vous pouvez la restaurer sur la même instance Chamilo ou sur une autre.

**Q : Puis-je copier un cours ?**  
R : Oui. Utilisez **Administration > Copier un cours** ou l'outil de maintenance du cours à l'intérieur du cours. Vous pouvez copier le contenu entre des cours ou créer un nouveau cours à partir d'un cours existant.

**Q : Quelles versions de SCORM sont prises en charge ?**  
R : Chamilo prend en charge SCORM 1.2. Les packages SCORM sont importés en tant que parcours d'apprentissage.

**Q : Comment limiter qui peut créer des cours ?**  
R : Allez dans **Administration > Paramètres de configuration > Cours** et désactivez **Autoriser les non-administrateurs (enseignants) à créer de nouveaux cours** (`allow_users_to_create_courses`). Lorsqu'elle est désactivée, seuls les administrateurs peuvent créer des cours. Alternativement, vous pouvez définir une limite au nombre de cours qu'un enseignant peut créer.

## Performance et maintenance

**Q : La plateforme est lente. Que dois-je vérifier en premier ?**  
R : Par ordre d'impact : (1) Assurez-vous que `APP_ENV=prod` et `APP_DEBUG=0` dans `.env`. (2) Vérifiez que PHP OPcache est activé. (3) Vérifiez les performances de la base de données. (4) Voir [Optimisation des performances](../platform-settings/performance-tuning.md).

**Q : Comment vider le cache ?**  
R : Exécutez `php bin/console cache:clear --env=prod` depuis la ligne de commande. Ne supprimez pas manuellement le répertoire `var/cache/` pendant que l'application est en cours d'exécution.

**Q : De combien d'espace disque Chamilo a-t-il besoin ?**  
R : L'application elle-même nécessite environ 2 Go décompressés. L'espace total dépend du contenu téléversé (documents, vidéos, packages SCORM). Surveillez l'utilisation du disque et planifiez en conséquence.

**Q : Comment configurer des sauvegardes automatisées ?**  
R : Voir [Sauvegardes](../maintenance/backups.md). Au minimum, planifiez un dump quotidien de la base de données et des sauvegardes régulières au niveau des fichiers du répertoire de téléversement.

## Courriel

**Q : Les utilisateurs ne reçoivent pas de courriels. Que dois-je vérifier ?**  
R : (1) Vérifiez `MAILER_DSN` dans `.env`. (2) Exécutez `php bin/console mailer:test someone@example.com` pour tester. (3) Vérifiez les dossiers de spam. (4) Vérifiez les enregistrements DNS SPF/DKIM. Voir [Configuration des courriels](../installation/email-configuration.md).

**Q : Puis-je utiliser Gmail pour envoyer des courriels ?**  
R : Oui, pour les petites plateformes ou le développement. Utilisez un mot de passe d'application et soyez conscient des limites d'envoi quotidiennes de Gmail (500 courriels/jour pour les comptes réguliers).

## Sécurité

**Q : Comment forcer l'utilisation de HTTPS ?**  
R : Configurez votre serveur web pour rediriger HTTP vers HTTPS. De plus, activez le paramètre "Forcer HTTPS" dans **Administration > Paramètres de configuration > Sécurité**. Voir [Paramètres de sécurité](../platform-settings/security-settings.md).

**Q : Comment bloquer les attaques par force brute sur la connexion ?**  
R : Configurez le nombre maximal de tentatives de connexion et le CAPTCHA dans les paramètres de sécurité. Envisagez également d'utiliser fail2ban au niveau du serveur pour une protection supplémentaire.

**Q : Un utilisateur a oublié son mot de passe et le courriel ne fonctionne pas. Comment puis-je l'aider ?**  
R : En tant qu'administrateur, modifiez directement le compte de l'utilisateur et définissez un nouveau mot de passe. Allez dans **Administration > Liste des utilisateurs**, trouvez le compte et mettez à jour le champ du mot de passe.

## Mises à jour

**Q : Puis-je passer directement de Chamilo 1.11.x à 2.0 ?**  
R : Oui, mais il s'agit d'une migration majeure, pas d'une simple mise à jour. Voir [Mise à niveau](../installation/upgrading.md). Testez toujours sur un serveur de staging d'abord.

**Q : Mes plugins fonctionneront-ils après la mise à niveau vers 2.0 ?**  
R : Non. Les plugins de la version 1.11.x ne sont pas compatibles avec 2.0 et doivent être réécrits ou remplacés par des fonctionnalités équivalentes de la version 2.0.