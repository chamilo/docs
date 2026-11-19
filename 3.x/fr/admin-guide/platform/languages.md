# Langues

Cet outil gère les langues d'interface parmi lesquelles les utilisateurs peuvent choisir — il ne gère pas les chaînes de traduction elles-mêmes (celles-ci proviennent des packs de langues livrés avec Chamilo, et non de quoi que ce soit de modifiable ici).

## Accéder aux langues

Depuis le panneau d'administration, cliquez sur **Plateforme > Langues**.

## Ce que vous pouvez faire

* **Activer ou désactiver la disponibilité** — Activez ou désactivez chacune des langues livrées comme choix sur la page de connexion et dans les paramètres du profil utilisateur, au moyen d'un simple interrupteur marche/arrêt par ligne
* **Définir la langue par défaut de la plateforme** — Choisissez la langue utilisée lorsqu'aucune préférence utilisateur ne s'applique ; la langue par défaut actuelle est signalée par sa propre icône et ne peut pas être masquée
* **Désactiver toutes les langues sauf la langue par défaut** — Une action groupée unique pour réduire le sélecteur de langue à la seule langue par défaut de votre plateforme
* **Modifier le nom natif** — Ajustez la façon dont le nom propre d'une langue est affiché (son « nom d'origine ») dans le sélecteur

## Désactiver une langue en cours d'utilisation

Si vous désactivez une langue que des utilisateurs actifs ont déjà sélectionnée comme langue d'interface, Chamilo demande une confirmation et — si vous confirmez — fait migrer chaque utilisateur concerné vers la langue par défaut de la plateforme. Il n'existe aucun état partiel dans lequel un utilisateur conserverait une langue désormais masquée.

## Langues de droite à gauche

Les langues de droite à gauche (telles que l'arabe, l'hébreu ou le persan) basculent automatiquement l'interface vers une disposition de droite à gauche lorsqu'elles sont sélectionnées — rien n'est à configurer ici ni ailleurs pour que cela se produise. La prise en charge RTL a été considérablement améliorée dans les versions récentes.

## Sous-langues

Si le paramètre **Autoriser les sous-langues** est activé, des actions supplémentaires apparaissent pour créer des « sous-langues » — des substitutions partielles d'une langue parente, historiquement utilisées pour des dialectes régionaux ou des ajustements terminologiques propres à une organisation. Il s'agit d'une fonctionnalité héritée ; la plupart des installations n'en auront pas besoin.

## Ordre des noms de personnes

Chamilo affiche et trie les noms de personnes selon la convention de la langue d'interface utilisée.

* **Prénom en premier** (par exemple « Maria Garcia »), tri par prénom : espagnol (es, es_MX), galicien (gl), malais (ms_MY) et toutes les autres langues non énumérées ci-dessous.
* **Nom de famille en premier** (par exemple « Yamada Taro »), tri par nom de famille : japonais, coréen, chinois (simplifié et traditionnel), vietnamien et hongrois.

L'espagnol, l'espagnol (Mexique), le galicien et le malais étaient auparavant traités comme des langues plaçant le nom de famille en premier ; ils suivent désormais l'ordre prénom en premier. La convention est intégrée aux définitions de langues de la plateforme (elle n'est pas stockée par installation) ; aucune action de l'administrateur n'est donc nécessaire lors d'une mise à niveau.