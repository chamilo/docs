# Certificat personnalisé

Le plugin Certificat personnalisé <img src="../../.gitbook/assets/icons/mdi-certificate.svg" alt="Certificat personnalisé" data-size="line"> vous permet de remplacer le [certificat du carnet de notes](../assessing-learners/gradebook.md) standard par votre propre conception — logos, un sceau, jusqu'à quatre images de signature avec légendes, une image d'arrière-plan, des marges et un contenu élaboré à partir de balises de substitution.

## Activation pour votre cours

Une fois que votre administrateur a activé le plugin et défini un modèle par défaut, activez-le cours par cours depuis les **Paramètres du cours** :

* **Activer le certificat personnalisé dans le cours** — Active la fonctionnalité pour ce cours
* **Utiliser le certificat personnalisé par défaut** — Utilise le modèle par défaut de la plateforme au lieu de concevoir le vôtre (ces deux options s'excluent mutuellement ; Chamilo vous avertit si vous tentez d'activer les deux)

Cela rend disponible, dans votre cours, l'outil **Paramètres du certificat**, où vous concevez ou modifiez le modèle.

## Conception du certificat

L'éditeur de certificat utilise des balises qui sont remplacées par des données réelles lors de la génération du certificat d'un apprenant, par exemple `((user_firstname))`, `((course_title))`, `((gradebook_grade))` et `((date_certificate))`. Au-delà du contenu, vous pouvez définir :

* Jusqu'à trois logos, une image de sceau et une image d'arrière-plan
* Jusqu'à quatre images de signature, chacune avec sa propre légende
* Les marges ainsi que la date et le lieu de délivrance/d'expédition affichés sur le certificat

Utilisez **Certificat** pour prévisualiser votre conception, ou **Supprimer le certificat** pour retirer le modèle personnalisé d'un cours.

## Conseils

* **Les étudiants ne voient aucune différence** — Ils téléchargent toujours leur certificat de la manière habituelle depuis le carnet de notes ; celui-ci utilise simplement votre modèle
* **Prévisualisez avant de vous y fier** — Vérifiez l'aperçu avec de vraies données de substitution afin de détecter les problèmes de mise en page avant que les apprenants ne commencent à générer des certificats
* **Coordonnez-vous avec votre administrateur** — Si vous souhaitez un modèle par défaut à l'échelle de la plateforme plutôt qu'un modèle ponctuel par cours, celui-ci est d'abord configuré par votre administrateur