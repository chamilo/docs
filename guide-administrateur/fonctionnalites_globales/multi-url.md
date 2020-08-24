# Multi-URL

Chamilo offre une fonctionnalité discrète mais pratique dans le cas de l'utilisation du portail pour plusieurs catégories d'utilisateurs, pour lesquels il faut considérer la disponibilité du portail sur un nom de domaine distinct, avec un style visuel distinct et une pré-sélection de seulement certains cours et certains utilisateurs.

## Cas pratique universitaire <a id="cas-pratique-universitaire"></a>

Imaginez que les 12 facultés de votre université veuillent montrer leur portail sous une apparence distincte \(chacune veut sa variation de logo dans l'en-tête et une couleur de fond légèrement différente\). De plus, chacune d'entre elles dispose de ses propres enseignants, qui « parfois » donnent cours dans plus d'une faculté. Les étudiants également sont des étudiants uniquement de cette faculté \(sauf exceptions\). Enfin, les cours sont différents, sauf dans certains cas particuliers pour des cours très génériques.

## Cas pratique corporatif <a id="cas-pratique-corporatif"></a>

Imaginez que votre entreprise propose des cours de sécurité du travail à plusieurs clients. Imaginez maintenant que l'un de ces clients soit _Coca-Cola_, et que l'autre soit _Pepsi_. Évidemment, vous voulez éviter que ces deux clients se rendent compte que vous utilisez le même portail pour leur enseigner la sécurité du travail. Évidemment aussi, vous voudriez réutiliser le même cours, mais sans que les apprenants ne voient les contributions des apprenants de l'autre entreprise.

## La solution <a id="la-solution"></a>

Nous appelons cette solution le multi-URL. En activant le multi-URL, vous activez en réalité le mécanisme suivant :

* vous utilisez la même base de code
* vous utilisez la même base de données
* un portail « maître » \(qui n'est pas utilisé directement par vos clients\) permet de définir les portails « esclaves »
* chaque cours est créé dans un portail « esclave » et n'est visible que dans ce portail esclave
* chaque utilisateur est créé dans un portail esclave, et n'est visible que dans ce portail esclave et n'a accès qu'à ce portail
* chaque portail esclave utilise un nom de domaine \(ou de sous-domaine\) différent
* chaque portail peut utiliser son propre style graphique
* un \(ou plusieurs\) administrateur peut être assigné à chaque portail esclave. Cet administrateur n'a pas accès aux paramètres de configuration globaux ni aux utilisateurs des autres portails
* une session peut utiliser un cours global, mais chaque session n'existe jamais que dans un et un seul portail

L'utilisation de la même base de données permet cependant certaines fonctionnalités « bonus ».

* un cours peut être rendu « global » et accessible depuis d'autres plates-formes \(selon sélection\) par l'administrateur global
* un utilisateur \(apprenant, enseignant ou administrateur\) peut se voir donner accès à d'autres portails par l'administrateur global

## Installer <a id="installer"></a>

Pour configurer le mode multi-URL, vous aurez besoin

* d'un accès à la configuration de votre serveur Web
* d'un accès à la définition de vos noms de domaines
* d'un accès au fichier de configuration de Chamilo

La marche à suivre est :

* de modifier app/conf/configuration.php et dé-commenter la ligne qui dit : _$\_configuration\['multiple\_access\_urls'\] = true;_
* d'ajouter des directives _SiteAlias_ dans votre VirtualHost d'Apache HTTPd \(rien de plus\)
* de définir les noms de domaines ou sous-domaines pour qu'ils dirigent vers le même serveur
* d'aller dans votre page d'administration de Chamilo et de suivre le lien « Configurer l'accès via URLs différents \(branding\) »
* de définir votre URL principal \(renommer _localhost_\)
* d'ajouter les sous-portails voulus et y activer un administrateur local pour chacun

![](../../.gitbook/assets/graficos97.png)_Illustration 82: Administration - Multi-URLs_

