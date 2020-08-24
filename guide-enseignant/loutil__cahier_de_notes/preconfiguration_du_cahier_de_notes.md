# Préconfiguration du cahier de notes

L'outil de cahier de notes, pour fonctionner dans son intégralité, exige la configuration de règles de score, de pondérations et d'un modèle de certificat.

## Poids total et score minimum <a id="poids-total-et-score-minimum"></a>

Jetez un œil sur les paramètres génériques du cahier de notes en cliquant sur l'icône de crayon **en haut à droite** de l'écran.

![](../../.gitbook/assets/image168%20%281%29.png)Illustration 107: Cahier de notes - Édition

L'élément « Catégorie » représente en fait le cahier de note en soi, et le cahier de note de plus haut niveau \(nous verrons plus tard qu'il est possible d'en créer d'autres\) utilise le code du cours par défaut.

Le poids total est important pour les pondérations \(voir ci-après\). Le score minimum est ce qui définit si l'apprenant a atteint l'objectif pédagogique du cours.

L'option de génération de certificats a été placée là pour empêcher la génération automatique de certificats si elle n'est pas souhaitée lors de l'obtention du score minimum par un apprenant.

Une description peut être ajoutée au cahier de notes, mais c'est rarement nécessaire.

## Poids total <a id="poids-total"></a>

La pondération permet de définir le poids relatif de chacune des évaluations \(présentielles ou non\) au sein du cahier de notes. Cliquez sur l'icône de pourcentage \(« _Pondération_ »\) depuis la page principale de l'outil pour aller à la page de configuration des pondérations.

![](../../.gitbook/assets/image169%20%281%29.png)Illustration 108: Cahier de notes - Pondérations

Il est toujours recommandé de définir les pondérations comme ayant un total de 100 \(ou de la valeur configurée au chapitre précédent\), sinon il peut être vraiment compliqué de résoudre tous les problèmes de poids relatifs. Une fois plus habitué à la gestion de ces cahiers de notes, n'hésitez pas à donner libre cours à vos règles d'évaluations.

Notez qu'une section « Auto-pondération » est disponible, qui permet de répartir la pondération de façon égale pour toutes les ressources, option pratique lorsque vous disposez de nombreuses ressources dans votre cahier de notes. Il est possible d'encore modifier ces pondérations une fois cette option sélectionnée.

## Règles de scores <a id="r-gles-de-scores"></a>

Cette option doit tout d'abord être activée par l'administrateur, sans quoi l'icône correspondante n'apparaîtra pas dans votre cours. Pour cela, l'administrateur devra activer les options telles qu'indiquées dans la capture d'écran ci-dessous

![](../../.gitbook/assets/image170%20%281%29.png)

Il n'y a pas de conséquences négative à proprement parler du fait d'activer la coloration et le paramétrage des scores, mais certains administrateurs pourraient juger que les options additionnelles activées sont peu utiles et génèrent de la confusion. C'est probablement un thème à débattre en petit comité...

Les règles de score permettent de définir des rangs de scores de telle sorte qu'ils puissent être représentés littéralement et graphiquement.

Cliquez sur l'icône symbolisant un podium \(si vous ne la voyez pas, indiquez la section ci-dessus à votre administrateur\).

La façon la plus rapide de configurer l'écran suivant est d'indiquer « 50 » comme valeur de coloration en rouge, puis de cliquer 5 fois sur l'icône de « + » vert. Ensuite, complétez comme indiqué sur la capture d'écran suivante.

Le même écran se charge à nouveau avec des options additionnelles. Complétez-les selon vos besoins. Inspirez-vous si nécessaire de la capture d'écran de l'Illustration 110. L'idée du système est permettre une catégorisation des notes, comme nous allons le voir ci-après.

![](../../.gitbook/assets/image171%20%281%29.png)Illustration 109: Cahier de notes - Règles de scores

Une fois ces règles de scores mises à jour, la vue linéaire des résultats \(voir section 19.4Vue linéaire en page 118\) devient beaucoup plus visuelle.

## Modèle de certificat <a id="mod-le-de-certificat"></a>

Il est possible de créer un certificat qui puisse être généré automatiquement avec les données des utilisateurs. Pour cela, cliquez sur la grande icône de certificat. Vous arrivez dans un outil similaire à l'outil de documents.

![](../../.gitbook/assets/image172%20%281%29.png)Illustration 110: Cahier de notes - Liste de certificats

Vous pouvez y éditer le certificat par défaut, créer un nouveau certificat ou en télécharger un depuis votre ordinateur \(au format HTML\) sur le serveur.

Si vous décidez d'en créer un nouveau, cliquez sur la première icône en haut à gauche.

![](../../.gitbook/assets/image173%20%281%29.png)Illustration 111: Cahier de note - Création d'un modèle de certificat

Vous trouverez quelques marqueurs dans la partie supérieure de la page.

Si vous placez n'importe lequel de ces marqueurs dans votre modèle de certificat, celui-ci sera automatiquement remplacé par la valeur qui lui correspond, selon le contexte. Par exemple, _\(\(user\_firstname\)\)_ sera remplacé par le prénom de l'utilisateur dont le certificat est généré.

![](../../.gitbook/assets/image174%20%281%29.png)Illustration 112: Cahier de notes - Sélection du certificat actif

Une fois de retour dans la liste de certificats, cliquez sur l'icône de sélection du certificat actif \(icône encadrée dans l'illustration\) pour qu'elle se colore. Enfin, revenez à l'écran du cahier de notes grâce à la navigation horizontale.

